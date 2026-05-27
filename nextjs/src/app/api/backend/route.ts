import { createHash } from "node:crypto";
import { readdir, stat, unlink } from "node:fs/promises";
import path from "node:path";

import { badRequest, serverError } from "@/lib/api";
import { getPool, query } from "@/lib/db";

type Payload = Record<string, string>;

function scriptRedirect(message: string, location: string) {
  const escaped = message.replaceAll("'", "\\'");
  const html = `<script type="text/javascript">alert('${escaped}');document.location='${location}';</script>`;

  return new Response(html, {
    status: 200,
    headers: { "content-type": "text/html; charset=utf-8" },
  });
}

function redirect(location: string) {
  return new Response(null, {
    status: 302,
    headers: { location },
  });
}

function getLegacyAction(request: Request) {
  const { searchParams } = new URL(request.url);
  return (searchParams.get("legacy") ?? searchParams.get("action") ?? "").trim();
}

async function parsePayload(request: Request) {
  const contentType = request.headers.get("content-type") ?? "";

  if (contentType.includes("application/json")) {
    return (await request.json()) as Payload;
  }

  if (
    contentType.includes("multipart/form-data") ||
    contentType.includes("application/x-www-form-urlencoded")
  ) {
    const formData = await request.formData();
    return Object.fromEntries(formData.entries()) as Payload;
  }

  return {};
}

function getCookie(request: Request, name: string) {
  const cookieHeader = request.headers.get("cookie") ?? "";
  const cookies = cookieHeader.split(";").map((part) => part.trim());
  const cookie = cookies.find((part) => part.startsWith(`${name}=`));
  return cookie?.slice(name.length + 1) ?? "";
}

function requireAuth(request: Request) {
  return Boolean(getCookie(request, "backend_auth"));
}

function backendAuthRedirect(request: Request) {
  if (requireAuth(request)) return null;
  return redirect("login.php");
}

function getValue(searchParams: URLSearchParams, payload: Payload, key: string) {
  return String(payload[key] ?? searchParams.get(key) ?? "").trim();
}

function shuffledRange(size: number) {
  const values = Array.from({ length: size }, (_, index) => index + 1);
  for (let index = values.length - 1; index > 0; index -= 1) {
    const swapIndex = Math.floor(Math.random() * (index + 1));
    [values[index], values[swapIndex]] = [values[swapIndex], values[index]];
  }
  return values;
}

async function removeFolderFiles(folderName: string) {
  const targetPath = path.resolve(process.cwd(), "..", folderName);
  const entries = await readdir(targetPath, { withFileTypes: true });
  await Promise.all(
    entries.map(async (entry) => {
      const filePath = path.join(targetPath, entry.name);
      const fileStat = await stat(filePath);
      if (fileStat.isFile()) {
        await unlink(filePath);
      }
    }),
  );
}

export async function GET(request: Request) {
  const legacy = getLegacyAction(request);
  const { searchParams } = new URL(request.url);

  if (!legacy) {
    return badRequest("legacy wajib diisi");
  }

  if (legacy === "logout.php") {
    return new Response(null, {
      status: 302,
      headers: {
        "set-cookie": "backend_auth=; Max-Age=0; Path=/; HttpOnly; SameSite=Lax",
        location: "login.php",
      },
    });
  }

  const authRedirect = backendAuthRedirect(request);
  if (authRedirect) return authRedirect;

  try {
    switch (legacy) {
      case "admin_do_del_peserta.php": {
        const idPeserta = getValue(searchParams, {}, "ID_peserta");
        if (!idPeserta) return scriptRedirect("Data Gagal Dihapus!", "index.php");

        await getPool().execute("DELETE FROM peserta WHERE ID_peserta = ?", [idPeserta]);
        return scriptRedirect("Data Berhasil Dihapus", "index.php");
      }
      case "admin_do_paid.php": {
        const idPeserta = getValue(searchParams, {}, "ID_peserta");
        if (!idPeserta) return scriptRedirect("Approve Failed!", "index.php");

        await getPool().execute("UPDATE peserta SET status='PAID' WHERE ID_peserta = ?", [
          idPeserta,
        ]);
        return scriptRedirect("Data Approved.", "index.php");
      }
      case "del_partai.php": {
        const idPartai = getValue(searchParams, {}, "id_partai");
        if (!idPartai) return scriptRedirect("Data Gagal Dihapus!", "jadwal_partai_tanding.php");

        await getPool().execute("DELETE FROM jadwal_tanding WHERE id_partai = ?", [idPartai]);
        return scriptRedirect("Data Berhasil Dihapus", "jadwal_partai_tanding.php");
      }
      case "del_partai_tgr.php": {
        const idPartai = getValue(searchParams, {}, "id_partai");
        if (!idPartai) return scriptRedirect("Data Gagal Dihapus!", "jadwal_partai_tgr.php");

        await getPool().execute("DELETE FROM jadwal_tgr WHERE id_partai = ?", [idPartai]);
        return scriptRedirect("Data Berhasil Dihapus", "jadwal_partai_tgr.php");
      }
      case "admin_do_del_undian.php": {
        const idUndian = getValue(searchParams, {}, "id_undian");
        if (!idUndian) return scriptRedirect("Data Gagal Dihapus!", "admin_undian_tanding.php");

        await getPool().execute("DELETE FROM undian WHERE id_undian = ?", [idUndian]);
        return scriptRedirect("Data Berhasil Dihapus", "admin_undian_tanding.php");
      }
      case "admin_do_del_undian_tgr.php": {
        const idUndianTgr = getValue(searchParams, {}, "id_undiantgr");
        if (!idUndianTgr) return scriptRedirect("Data Gagal Dihapus!", "admin_undian_tgr.php");

        await getPool().execute("DELETE FROM undian_tgr WHERE id_undiantgr = ?", [idUndianTgr]);
        return scriptRedirect("Data Berhasil Dihapus", "admin_undian_tgr.php");
      }
      case "admin_del_medali.php": {
        const idMedali = getValue(searchParams, {}, "id_medali");
        const idPartai = getValue(searchParams, {}, "id_partai_FK");
        if (!idMedali) return scriptRedirect("Data Gagal Dihapus!", "admin_medali.php");

        await getPool().execute("DELETE FROM medali WHERE id_medali = ?", [idMedali]);
        if (idPartai) {
          await getPool().execute("UPDATE jadwal_tanding SET medali='0' WHERE id_partai = ?", [
            idPartai,
          ]);
        }
        return scriptRedirect("Data Berhasil Dihapus", "admin_medali.php");
      }
      default:
        return badRequest(`Legacy endpoint ${legacy} belum dimigrasikan`);
    }
  } catch {
    return serverError();
  }
}

export async function POST(request: Request) {
  const legacy = getLegacyAction(request);
  const { searchParams } = new URL(request.url);

  if (!legacy) {
    return badRequest("legacy wajib diisi");
  }

  try {
    const payload = await parsePayload(request);

    if (legacy === "verifylogin.php") {
      const username = getValue(searchParams, payload, "username");
      const password = getValue(searchParams, payload, "password");
      const hashed = createHash("md5").update(password).digest("hex");

      const [found] = await query<{ userID: number }>(
        "SELECT userID FROM admin WHERE username = ? AND password = ? LIMIT 1",
        [username, hashed],
      );

      if (found) {
        return new Response(null, {
          status: 302,
          headers: {
            "set-cookie": `backend_auth=${hashed}; Path=/; HttpOnly; SameSite=Lax`,
            location: "index.php",
          },
        });
      }

      return redirect("login.php");
    }

    const authRedirect = backendAuthRedirect(request);
    if (authRedirect) return authRedirect;

    switch (legacy) {
      case "update_password.php": {
        const nextPassword = getValue(searchParams, payload, "txtpassword");
        if (!nextPassword) return scriptRedirect("Password gagal diubah", "index.php");

        const hashed = createHash("md5").update(nextPassword).digest("hex");
        await getPool().execute("UPDATE admin SET password = ? WHERE userID = '1'", [hashed]);
        return redirect("logout.php");
      }
      case "admin_do_edit_peserta.php": {
        const idPeserta = getValue(searchParams, payload, "ID_peserta");
        const nama = getValue(searchParams, payload, "nama");
        const jenisKelamin = getValue(searchParams, payload, "jenis_kelamin");
        const golongan = getValue(searchParams, payload, "golongan");
        const kelasTanding = getValue(searchParams, payload, "kelas_tanding");
        const kontingen = getValue(searchParams, payload, "kontingen").toUpperCase();

        await getPool().execute(
          `UPDATE peserta
           SET nm_lengkap = ?, jenis_kelamin = ?, golongan = ?, kelas_tanding_FK = ?, kontingen = ?
           WHERE ID_peserta = ?`,
          [nama, jenisKelamin, golongan, kelasTanding, kontingen, idPeserta],
        );
        return scriptRedirect("Data berhasil diubah.", "index.php");
      }
      case "admin_do_edit_peserta_tgr.php": {
        const idPeserta = getValue(searchParams, payload, "ID_peserta");
        const nama = getValue(searchParams, payload, "nama");
        const jenisKelamin = getValue(searchParams, payload, "jenis_kelamin");
        const golongan = getValue(searchParams, payload, "golongan");
        const kontingen = getValue(searchParams, payload, "kontingen").toUpperCase();

        await getPool().execute(
          `UPDATE peserta
           SET nm_lengkap = ?, jenis_kelamin = ?, golongan = ?, kontingen = ?
           WHERE ID_peserta = ?`,
          [nama, jenisKelamin, golongan, kontingen, idPeserta],
        );
        return scriptRedirect("Data berhasil diubah.", "index.php");
      }
      case "admin_do_medali.php": {
        const nama = getValue(searchParams, payload, "nama");
        const kontingen = getValue(searchParams, payload, "kontingen");
        const kelas = getValue(searchParams, payload, "kelas");
        const medali = getValue(searchParams, payload, "medali");
        const idJadwal = getValue(searchParams, payload, "idjadwal");

        if (!nama || !kontingen || !kelas || !medali || !idJadwal) {
          return scriptRedirect("Data kosong!", "admin_medali.php");
        }

        const [dup] = await query<{ total: number }>(
          "SELECT COUNT(*) AS total FROM medali WHERE nama = ? AND kontingen = ? AND kelas = ?",
          [nama, kontingen, kelas],
        );
        if ((dup?.total ?? 0) >= 1) {
          return scriptRedirect("GAGAL! DATA SUDAH ADA DI DATABASE", "admin_medali.php");
        }

        if (medali === "Emas") {
          const [jadwal] = await query<{ medali: number }>(
            "SELECT medali FROM jadwal_tanding WHERE id_partai = ? LIMIT 1",
            [idJadwal],
          );
          if ((jadwal?.medali ?? 0) === 0) {
            return scriptRedirect("GAGAL! Tentukan Medali Perak Terlebih Dahulu.", "admin_medali.php");
          }
        }

        await getPool().execute(
          "INSERT INTO medali (nama, kontingen, kelas, medali, id_partai_FK) VALUES (?, ?, ?, ?, ?)",
          [nama, kontingen, kelas, medali, idJadwal],
        );
        const status = medali === "Perunggu" ? 1 : medali === "Perak" ? 2 : 3;
        await getPool().execute("UPDATE jadwal_tanding SET medali = ? WHERE id_partai = ?", [
          status,
          idJadwal,
        ]);
        return scriptRedirect("BERHASIL!", "admin_medali.php");
      }
      case "do_post_jadwal_tanding.php": {
        const tanggal = getValue(searchParams, payload, "tanggal");
        const kelas = getValue(searchParams, payload, "kelas");
        const gelanggang = getValue(searchParams, payload, "gelanggang");
        const noPartai = getValue(searchParams, payload, "nopartai");
        const nmMerah = getValue(searchParams, payload, "nm_merah");
        const kontMerah = getValue(searchParams, payload, "kont_merah");
        const nmBiru = getValue(searchParams, payload, "nm_biru");
        const kontBiru = getValue(searchParams, payload, "kont_biru");
        const babak = getValue(searchParams, payload, "babak");

        if (
          !tanggal ||
          !kelas ||
          !gelanggang ||
          !noPartai ||
          !nmMerah ||
          !kontMerah ||
          !nmBiru ||
          !kontBiru ||
          !babak
        ) {
          return scriptRedirect("GAGAL ! Data masih ada yangkosong!", "jadwal_partai_tanding.php");
        }

        await getPool().execute(
          `INSERT INTO jadwal_tanding
            (tgl, kelas, gelanggang, partai, nm_merah, kontingen_merah, nm_biru, kontingen_biru, status, pemenang, babak)
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, '-', '-', ?)`,
          [tanggal, kelas, gelanggang, noPartai, nmMerah, kontMerah, nmBiru, kontBiru, babak],
        );
        return scriptRedirect("Berhasil Diinput", "jadwal_partai_tanding.php");
      }
      case "admin_do_edit_partai.php": {
        const idPartai = getValue(searchParams, payload, "id_partai");
        const tgl = getValue(searchParams, payload, "tgl");
        const kelas = getValue(searchParams, payload, "kelas");
        const gelanggang = getValue(searchParams, payload, "gelanggang");
        const partai = getValue(searchParams, payload, "partai");
        const nmMerah = getValue(searchParams, payload, "nm_merah");
        const kontingenMerah = getValue(searchParams, payload, "kontingen_merah");
        const nmBiru = getValue(searchParams, payload, "nm_biru");
        const kontingenBiru = getValue(searchParams, payload, "kontingen_biru");
        const status = getValue(searchParams, payload, "status");
        const pemenang = getValue(searchParams, payload, "pemenang");
        const babak = getValue(searchParams, payload, "babak");

        if (!idPartai || !tgl || !kelas || !partai || !nmMerah || !nmBiru) {
          return scriptRedirect("Data harus diisi semua!", "jadwal_partai_tanding.php");
        }

        await getPool().execute(
          `UPDATE jadwal_tanding
           SET tgl = ?, kelas = ?, gelanggang = ?, partai = ?, nm_merah = ?, kontingen_merah = ?,
               nm_biru = ?, kontingen_biru = ?, status = ?, pemenang = ?, babak = ?
           WHERE id_partai = ?`,
          [
            tgl,
            kelas,
            gelanggang,
            partai,
            nmMerah,
            kontingenMerah,
            nmBiru,
            kontingenBiru,
            status,
            pemenang,
            babak,
            idPartai,
          ],
        );
        return scriptRedirect("Data berhasil diubah.", "jadwal_partai_tanding.php");
      }
      case "do_post_jadwal_tunggal.php":
      case "do_post_jadwal_regu.php":
      case "do_post_jadwal_ganda.php": {
        const golongan = getValue(searchParams, payload, "golongan");
        const noUndian = getValue(searchParams, payload, "no_undian");
        const kontingen = getValue(searchParams, payload, "kontingen");
        const kategori =
          legacy === "do_post_jadwal_tunggal.php"
            ? "Tunggal"
            : legacy === "do_post_jadwal_regu.php"
              ? "Regu"
              : "Ganda";
        const nama =
          legacy === "do_post_jadwal_tunggal.php"
            ? getValue(searchParams, payload, "nama")
            : legacy === "do_post_jadwal_regu.php"
              ? `${getValue(searchParams, payload, "nama1")}<br>${getValue(searchParams, payload, "nama2")}<br>${getValue(searchParams, payload, "nama3")}`
              : `${getValue(searchParams, payload, "nama1")}<br>${getValue(searchParams, payload, "nama2")}`;

        if (!golongan || !noUndian || !nama || !kontingen) {
          return scriptRedirect("GAGAL ! Data masih ada yang kosong!", "jadwal_partai_tanding.php");
        }

        await getPool().execute(
          "INSERT INTO jadwal_tgr (kategori, golongan, noundian, nama, kontingen) VALUES (?, ?, ?, ?, ?)",
          [kategori, golongan, noUndian, nama, kontingen],
        );
        return scriptRedirect("Berhasil Diinput", "jadwal_partai_tgr.php");
      }
      case "approve_konfirmasi.php": {
        const idKonfirmasi = getValue(searchParams, payload, "ID_konfirmasi");
        if (!idKonfirmasi) return scriptRedirect("Gagal disetujui", "admin_konfirmasi.php");

        await getPool().execute("UPDATE konfirmasi SET status='CLOSED' WHERE ID_konfirmasi = ?", [
          idKonfirmasi,
        ]);
        return scriptRedirect("Berhasil disetujui.", "admin_konfirmasi.php");
      }
      case "admin_do_undian_tanding.php": {
        const golongan = getValue(searchParams, payload, "golongan");
        const jenisKelamin = getValue(searchParams, payload, "jenis_kelamin");
        const kelasTanding = getValue(searchParams, payload, "kelas_tanding");
        await new Promise((resolve) => setTimeout(resolve, 5000));

        if (!golongan || !jenisKelamin || !kelasTanding) {
          return scriptRedirect("GAGAL. Filter Data Tidak Lengkap!", "admin_undian_tanding.php");
        }

        const existed = await query<{ id_peserta: number }>(
          `SELECT undian.id_peserta
           FROM undian
           INNER JOIN peserta ON undian.id_peserta = peserta.ID_peserta
           WHERE peserta.golongan = ? AND peserta.jenis_kelamin = ? AND peserta.kelas_tanding_FK = ?
           LIMIT 1`,
          [golongan, jenisKelamin, kelasTanding],
        );
        if (existed.length > 0) {
          return scriptRedirect(
            "GAGAL. Ditemukan data peserta sudah pernah diundi.",
            "admin_undian_tanding.php",
          );
        }

        const peserta = await query<{ ID_peserta: number }>(
          `SELECT ID_peserta
           FROM peserta
           WHERE golongan = ? AND jenis_kelamin = ? AND kelas_tanding_FK = ? AND status = 'PAID'
           ORDER BY ID_peserta ASC`,
          [golongan, jenisKelamin, kelasTanding],
        );
        if (peserta.length === 0) {
          return scriptRedirect(
            "GAGAL. Peserta tidak ditemukan pada kelompok tersebut.",
            "admin_undian_tanding.php",
          );
        }

        const numbers = shuffledRange(peserta.length);
        await Promise.all(
          peserta.map((item, index) =>
            getPool().execute("INSERT INTO undian (ID_peserta, no_undian) VALUES (?, ?)", [
              item.ID_peserta,
              numbers[index],
            ]),
          ),
        );

        return scriptRedirect("Data peserta berhasil diundi.", "admin_undian_tanding.php");
      }
      case "admin_do_undian_tgr.php": {
        const golongan = getValue(searchParams, payload, "golongan");
        const jenisKelamin = getValue(searchParams, payload, "jenis_kelamin");
        const kategoriTanding = getValue(searchParams, payload, "kategori_tanding");
        await new Promise((resolve) => setTimeout(resolve, 5000));

        if (!golongan || !jenisKelamin || !kategoriTanding) {
          return scriptRedirect("GAGAL. Filter Data Tidak Lengkap!", "admin_undian_tgr.php");
        }

        const existed = await query<{ idpesertatgr: string }>(
          `SELECT undian_tgr.idpesertatgr
           FROM undian_tgr
           INNER JOIN peserta ON undian_tgr.idpesertatgr = peserta.kode_gr
           WHERE peserta.golongan = ? AND peserta.jenis_kelamin = ? AND peserta.kategori_tanding = ?
           LIMIT 1`,
          [golongan, jenisKelamin, kategoriTanding],
        );
        if (existed.length > 0) {
          return scriptRedirect(
            "GAGAL. Ditemukan data peserta sudah pernah diundi.",
            "admin_undian_tgr.php",
          );
        }

        const peserta = await query<{ kode_gr: string }>(
          `SELECT DISTINCT kode_gr
           FROM peserta
           WHERE golongan = ? AND jenis_kelamin = ? AND kategori_tanding = ? AND status = 'PAID'
           ORDER BY ID_peserta ASC`,
          [golongan, jenisKelamin, kategoriTanding],
        );
        if (peserta.length === 0) {
          return scriptRedirect(
            "GAGAL. Peserta tidak ditemukan pada kelompok tersebut.",
            "admin_undian_tgr.php",
          );
        }

        const numbers = shuffledRange(peserta.length);
        await Promise.all(
          peserta.map((item, index) =>
            getPool().execute("INSERT INTO undian_tgr (idpesertatgr, no_undian) VALUES (?, ?)", [
              item.kode_gr,
              numbers[index],
            ]),
          ),
        );

        return scriptRedirect("Data peserta berhasil diundi.", "admin_undian_tgr.php");
      }
      case "do_clear_undian_tanding.php": {
        await getPool().execute("TRUNCATE TABLE undian");
        return scriptRedirect("Data Berhasil Dihapus", "admin_undian_tanding.php");
      }
      case "do_clear_undian_tgr.php": {
        await getPool().execute("TRUNCATE TABLE undian_tgr");
        return scriptRedirect("Data Berhasil Dihapus", "admin_undian_tgr.php");
      }
      case "do_clear_jadwal_tanding.php": {
        await getPool().execute("TRUNCATE TABLE jadwal_tanding");
        await getPool().execute("TRUNCATE TABLE nilai_tanding");
        return scriptRedirect("Data Terhapus.", "jadwal_partai_tanding.php");
      }
      case "do_clear_jadwal_tgr.php": {
        await getPool().execute("TRUNCATE TABLE jadwal_tgr");
        await getPool().execute("TRUNCATE TABLE nilai_tunggal");
        await getPool().execute("TRUNCATE TABLE nilai_ganda");
        await getPool().execute("TRUNCATE TABLE nilai_regu");
        return scriptRedirect("Data Terhapus.", "jadwal_partai_tgr.php");
      }
      case "do_clear_db.php": {
        await getPool().execute("TRUNCATE TABLE jadwal_tanding");
        await getPool().execute("TRUNCATE TABLE jadwal_tgr");
        await getPool().execute("TRUNCATE TABLE konfirmasi");
        await getPool().execute("TRUNCATE TABLE nilai_tanding");
        await getPool().execute("TRUNCATE TABLE nilai_tunggal");
        await getPool().execute("TRUNCATE TABLE nilai_ganda");
        await getPool().execute("TRUNCATE TABLE nilai_regu");
        await getPool().execute("TRUNCATE TABLE peserta");
        await getPool().execute("TRUNCATE TABLE undian");
        await getPool().execute("TRUNCATE TABLE undian_tgr");
        await getPool().execute("TRUNCATE TABLE medali");

        await removeFolderFiles("peserta_akta");
        await removeFolderFiles("peserta_foto");
        await removeFolderFiles("peserta_ijazah");
        await removeFolderFiles("peserta_ktp");
        await removeFolderFiles("buktibayar");

        return scriptRedirect("Database berhasil terhapus seluruhnya", "index.php");
      }
      default:
        return badRequest(`Legacy endpoint ${legacy} belum dimigrasikan`);
    }
  } catch {
    return serverError();
  }
}

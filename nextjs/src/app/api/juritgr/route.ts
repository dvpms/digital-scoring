import { createHash } from "node:crypto";

import { badRequest, ok, serverError } from "@/lib/api";
import { getPool, query } from "@/lib/db";

type Payload = Record<string, string>;

type JuriRow = {
  id_juri: number;
  nm_juri: string;
};

type JadwalTgrRow = {
  id_partai: number;
  noundian: string;
  golongan: string;
  nama: string;
  kontingen: string;
};

type NilaiReguRow = {
  jurus1: number;
  jurus2: number;
  jurus3: number;
  jurus4: number;
  jurus5: number;
  jurus6: number;
  jurus7: number;
  jurus8: number;
  jurus9: number;
  jurus10: number;
  jurus11: number;
  jurus12: number;
  kemantapan: number;
  hukum_1: number;
  hukum_2: number;
  hukum_3: number;
  hukum_4: number;
};

type NilaiTunggalRow = {
  jurus1: number;
  jurus2: number;
  jurus3: number;
  jurus4: number;
  jurus5: number;
  jurus6: number;
  jurus7: number;
  jurus8: number;
  jurus9: number;
  jurus10: number;
  jurus11: number;
  jurus12: number;
  jurus13: number;
  jurus14: number;
  kemantapan: number;
  hukum_1: number;
  hukum_2: number;
  hukum_3: number;
  hukum_4: number;
  hukum_5: number;
};

type NilaiGandaRow = {
  teknik_serang: number;
  mantap_kompak: number;
  serasi: number;
  hukum_1: number;
  hukum_2: number;
  hukum_3: number;
  hukum_4: number;
  hukum_5: number;
  hukum_6: number;
};

const REGU_JURUS_COLUMNS = [
  "jurus1",
  "jurus2",
  "jurus3",
  "jurus4",
  "jurus5",
  "jurus6",
  "jurus7",
  "jurus8",
  "jurus9",
  "jurus10",
  "jurus11",
  "jurus12",
] as const;

const TUNGGAL_JURUS_COLUMNS = [
  "jurus1",
  "jurus2",
  "jurus3",
  "jurus4",
  "jurus5",
  "jurus6",
  "jurus7",
  "jurus8",
  "jurus9",
  "jurus10",
  "jurus11",
  "jurus12",
  "jurus13",
  "jurus14",
] as const;

function htmlResponse(html: string) {
  return new Response(html, {
    status: 200,
    headers: { "content-type": "text/html; charset=utf-8" },
  });
}

function escapeHtml(value: string) {
  return value
    .replaceAll("&", "&amp;")
    .replaceAll("<", "&lt;")
    .replaceAll(">", "&gt;")
    .replaceAll('"', "&quot;")
    .replaceAll("'", "&#39;");
}

function sum(values: number[]) {
  return values.reduce((acc, item) => acc + item, 0);
}

function totalAfterTrim(total: number, scores: number[]) {
  if (!scores.length) return 0;
  return total - Math.min(...scores) - Math.max(...scores);
}

async function getMonitorBase(kategori: "Tunggal" | "Regu" | "Ganda") {
  const [jadwalRows, juriRows] = await Promise.all([
    query<JadwalTgrRow>(
      `SELECT id_partai, noundian, golongan, nama, kontingen
       FROM jadwal_tgr
       WHERE kategori = ?
       ORDER BY id_partai, golongan ASC`,
      [kategori],
    ),
    query<JuriRow>("SELECT id_juri, nm_juri FROM wasit_juri"),
  ]);

  return { jadwalRows, juriRows };
}

async function getDataViewGanda() {
  const { jadwalRows, juriRows } = await getMonitorBase("Ganda");

  const body = await Promise.all(
    jadwalRows.map(async (jadwal) => {
      const nilaiRows = await query<
        NilaiGandaRow & {
          id_juri: number;
        }
      >(
        `SELECT id_juri, teknik_serang, mantap_kompak, serasi, hukum_1, hukum_2, hukum_3, hukum_4, hukum_5, hukum_6
         FROM nilai_ganda
         WHERE id_jadwal = ?`,
        [jadwal.id_partai],
      );
      const nilaiByJuri = new Map(nilaiRows.map((row) => [row.id_juri, row]));

      let totalNilai = 0;
      const tempNilai: number[] = [];

      const serangLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          return `${escapeHtml(juri.nm_juri)} : ${row?.teknik_serang ?? 0}<br />`;
        })
        .join("");
      const kompakLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          return `${escapeHtml(juri.nm_juri)} : ${row?.mantap_kompak ?? 0}<br />`;
        })
        .join("");
      const serasiLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          return `${escapeHtml(juri.nm_juri)} : ${row?.serasi ?? 0}<br />`;
        })
        .join("");
      const hukumLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const hukum = row
            ? sum([row.hukum_1, row.hukum_2, row.hukum_3, row.hukum_4, row.hukum_5, row.hukum_6])
            : 0;
          return `${escapeHtml(juri.nm_juri)} : ${hukum}<br />`;
        })
        .join("");
      const nilaiLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const hukum = row
            ? sum([row.hukum_1, row.hukum_2, row.hukum_3, row.hukum_4, row.hukum_5, row.hukum_6])
            : 0;
          const nilai = row
            ? row.teknik_serang + row.mantap_kompak + row.serasi - -hukum
            : 0;
          tempNilai.push(nilai);
          totalNilai += nilai;
          return `${escapeHtml(juri.nm_juri)} : ${nilai}<br />`;
        })
        .join("");

      const minNilai = tempNilai.length ? Math.min(...tempNilai) : 0;
      const maxNilai = tempNilai.length ? Math.max(...tempNilai) : 0;

      return `<tr class="text-center">
        <td>${escapeHtml(jadwal.noundian)}</td>
        <td>${escapeHtml(jadwal.golongan)}</td>
        <td>${escapeHtml(jadwal.nama)}</td>
        <td>${escapeHtml(jadwal.kontingen)}</td>
        <td>${serangLines}</td>
        <td>${kompakLines}</td>
        <td>${serasiLines}</td>
        <td>${hukumLines}</td>
        <td>${nilaiLines}</td>
        <td>${totalAfterTrim(totalNilai, tempNilai)}<br>MIN : ${minNilai}<br>MAX : ${maxNilai}</td>
      </tr>`;
    }),
  );

  return `<table class="table table-bordered">
    <tr class="text-center" bgcolor="#FFFF00">
      <td rowspan="2">UNDIAN</td>
      <td rowspan="2">GOLONGAN</td>
      <td rowspan="2">NAMA PESILAT</td>
      <td rowspan="2">KONTINGEN</td>
      <td colspan="3">UNSUR NILAI</td>
      <td rowspan="2">HUKUMAN</td>
      <td rowspan="2">NILAI /JURI</td>
      <td rowspan="2"> TOTAL NILAI</td>
    </tr>
    <tr class="text-center" bgcolor="#FFFF00">
      <td>SERANG/BELA</td>
      <td>KEMANTAPAN</td>
      <td>SERASI</td>
    </tr>
    ${body.join("")}
  </table>`;
}

async function getDataViewRegu() {
  const { jadwalRows, juriRows } = await getMonitorBase("Regu");

  const body = await Promise.all(
    jadwalRows.map(async (jadwal) => {
      const nilaiRows = await query<
        NilaiReguRow & {
          id_juri: number;
        }
      >(
        `SELECT id_juri, jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12,
                kemantapan, hukum_1, hukum_2, hukum_3, hukum_4
         FROM nilai_regu
         WHERE id_jadwal = ?`,
        [jadwal.id_partai],
      );
      const nilaiByJuri = new Map(nilaiRows.map((row) => [row.id_juri, row]));

      let totalNilai = 0;
      const tempNilai: number[] = [];

      const kebenaranLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const totalJurus = row
            ? sum([
                row.jurus1,
                row.jurus2,
                row.jurus3,
                row.jurus4,
                row.jurus5,
                row.jurus6,
                row.jurus7,
                row.jurus8,
                row.jurus9,
                row.jurus10,
                row.jurus11,
                row.jurus12,
              ])
            : 0;
          const kebenaran = totalJurus !== 0 ? 100 - -totalJurus : 0;
          return `${escapeHtml(juri.nm_juri)} : ${kebenaran}<br />`;
        })
        .join("");
      const kemantapanLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          return `${escapeHtml(juri.nm_juri)} : ${row?.kemantapan ?? 0}<br />`;
        })
        .join("");
      const hukumLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const hukum = row ? sum([row.hukum_1, row.hukum_2, row.hukum_3, row.hukum_4]) : 0;
          return `${escapeHtml(juri.nm_juri)} : ${hukum}<br />`;
        })
        .join("");
      const nilaiLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const totalJurus = row
            ? sum([
                row.jurus1,
                row.jurus2,
                row.jurus3,
                row.jurus4,
                row.jurus5,
                row.jurus6,
                row.jurus7,
                row.jurus8,
                row.jurus9,
                row.jurus10,
                row.jurus11,
                row.jurus12,
              ])
            : 0;
          const kebenaran = totalJurus !== 0 ? 100 - -totalJurus : 0;
          const hukum = row ? sum([row.hukum_1, row.hukum_2, row.hukum_3, row.hukum_4]) : 0;
          const nilai = row ? kebenaran + (row.kemantapan ?? 0) - -hukum : 0;
          tempNilai.push(nilai);
          totalNilai += nilai;
          return `${escapeHtml(juri.nm_juri)} : ${nilai}<br />`;
        })
        .join("");

      const minNilai = tempNilai.length ? Math.min(...tempNilai) : 0;
      const maxNilai = tempNilai.length ? Math.max(...tempNilai) : 0;

      return `<tr class="text-center">
        <td>${escapeHtml(jadwal.noundian)}</td>
        <td>${escapeHtml(jadwal.golongan)}</td>
        <td>${escapeHtml(jadwal.nama)}</td>
        <td>${escapeHtml(jadwal.kontingen)}</td>
        <td>${kebenaranLines}</td>
        <td>${kemantapanLines}</td>
        <td>${hukumLines}</td>
        <td>${nilaiLines}</td>
        <td>${totalAfterTrim(totalNilai, tempNilai)}<br>MIN : ${minNilai}<br>MAX : ${maxNilai}</td>
      </tr>`;
    }),
  );

  return `<table class="table table-bordered">
    <tr class="text-center" bgcolor="#FFFF00">
      <td rowspan="2">NO UNDIAN</td>
      <td rowspan="2">GOLONGAN</td>
      <td rowspan="2">NAMA PESILAT</td>
      <td rowspan="2">KONTINGEN</td>
      <td colspan="2">UNSUR NILAI</td>
      <td rowspan="2">HUKUMAN</td>
      <td rowspan="2">NILAI /JURI</td>
      <td rowspan="2">TOTAL NILAI</td>
    </tr>
    <tr class="text-center" bgcolor="#FFFF00">
      <td>KEBENARAN</td>
      <td>KEMANTAPAN</td>
    </tr>
    ${body.join("")}
  </table>`;
}

async function getDataViewTunggal() {
  const { jadwalRows, juriRows } = await getMonitorBase("Tunggal");

  const body = await Promise.all(
    jadwalRows.map(async (jadwal) => {
      const nilaiRows = await query<
        NilaiTunggalRow & {
          id_juri: number;
        }
      >(
        `SELECT id_juri, jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12, jurus13, jurus14,
                kemantapan, hukum_1, hukum_2, hukum_3, hukum_4, hukum_5
         FROM nilai_tunggal
         WHERE id_jadwal = ?`,
        [jadwal.id_partai],
      );
      const nilaiByJuri = new Map(nilaiRows.map((row) => [row.id_juri, row]));

      let totalNilai = 0;
      const tempNilai: number[] = [];

      const kebenaranLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const totalJurus = row
            ? sum([
                row.jurus1,
                row.jurus2,
                row.jurus3,
                row.jurus4,
                row.jurus5,
                row.jurus6,
                row.jurus7,
                row.jurus8,
                row.jurus9,
                row.jurus10,
                row.jurus11,
                row.jurus12,
                row.jurus13,
                row.jurus14,
              ])
            : 0;
          const kebenaran = totalJurus !== 0 ? 100 - -totalJurus : 0;
          return `${escapeHtml(juri.nm_juri)} : ${kebenaran}<br />`;
        })
        .join("");
      const kemantapanLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          return `${escapeHtml(juri.nm_juri)} : ${row?.kemantapan ?? 0}<br />`;
        })
        .join("");
      const hukumLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const hukum = row
            ? sum([row.hukum_1, row.hukum_2, row.hukum_3, row.hukum_4, row.hukum_5])
            : 0;
          return `${escapeHtml(juri.nm_juri)} : ${hukum}<br />`;
        })
        .join("");
      const nilaiLines = juriRows
        .map((juri) => {
          const row = nilaiByJuri.get(juri.id_juri);
          const totalJurus = row
            ? sum([
                row.jurus1,
                row.jurus2,
                row.jurus3,
                row.jurus4,
                row.jurus5,
                row.jurus6,
                row.jurus7,
                row.jurus8,
                row.jurus9,
                row.jurus10,
                row.jurus11,
                row.jurus12,
                row.jurus13,
                row.jurus14,
              ])
            : 0;
          const kebenaran = totalJurus !== 0 ? 100 - -totalJurus : 0;
          const hukum = row
            ? sum([row.hukum_1, row.hukum_2, row.hukum_3, row.hukum_4, row.hukum_5])
            : 0;
          const nilai = row ? kebenaran + (row.kemantapan ?? 0) - -hukum : 0;
          tempNilai.push(nilai);
          totalNilai += nilai;
          return `${escapeHtml(juri.nm_juri)} : ${nilai}<br />`;
        })
        .join("");

      const minNilai = tempNilai.length ? Math.min(...tempNilai) : 0;
      const maxNilai = tempNilai.length ? Math.max(...tempNilai) : 0;

      return `<tr class="text-center">
        <td>${escapeHtml(jadwal.noundian)}</td>
        <td>${escapeHtml(jadwal.golongan)}</td>
        <td>${escapeHtml(jadwal.nama)}</td>
        <td>${escapeHtml(jadwal.kontingen)}</td>
        <td>${kebenaranLines}</td>
        <td>${kemantapanLines}</td>
        <td>${hukumLines}</td>
        <td>${nilaiLines}</td>
        <td>${totalAfterTrim(totalNilai, tempNilai)}<br>MIN : ${minNilai}<br>MAX : ${maxNilai}</td>
      </tr>`;
    }),
  );

  return `<table class="table table-bordered">
    <tr class="text-center" bgcolor="#FFFF00">
      <td rowspan="2">NO UNDIAN</td>
      <td rowspan="2">GOLONGAN</td>
      <td rowspan="2">NAMA PESILAT</td>
      <td rowspan="2">KONTINGEN</td>
      <td colspan="2">UNSUR NILAI</td>
      <td rowspan="2">HUKUMAN</td>
      <td rowspan="2">NILAI /JURI</td>
      <td rowspan="2"> TOTAL NILAI</td>
    </tr>
    <tr class="text-center" bgcolor="#FFFF00">
      <td>KEBENARAN</td>
      <td>KEMANTAPAN</td>
    </tr>
    ${body.join("")}
  </table>`;
}

function toNumber(value: string | undefined, defaultValue = 0) {
  const parsed = Number(value);
  return Number.isFinite(parsed) ? parsed : defaultValue;
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

function requiredFields(payload: Payload, fields: string[]) {
  for (const field of fields) {
    if (!String(payload[field] ?? "").trim()) {
      return field;
    }
  }

  return null;
}

async function findRegu(idJadwal: string, idJuri: string) {
  const [row] = await query<NilaiReguRow>(
    `SELECT jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12,
            kemantapan, hukum_1, hukum_2, hukum_3, hukum_4
     FROM nilai_regu
     WHERE id_jadwal = ? AND id_juri = ?
     LIMIT 1`,
    [idJadwal, idJuri],
  );

  return row;
}

async function findTunggal(idJadwal: string, idJuri: string) {
  const [row] = await query<NilaiTunggalRow>(
    `SELECT jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12, jurus13, jurus14,
            kemantapan, hukum_1, hukum_2, hukum_3, hukum_4, hukum_5
     FROM nilai_tunggal
     WHERE id_jadwal = ? AND id_juri = ?
     LIMIT 1`,
    [idJadwal, idJuri],
  );

  return row;
}

async function findGanda(idJadwal: string, idJuri: string) {
  const [row] = await query<NilaiGandaRow>(
    `SELECT teknik_serang, mantap_kompak, serasi, hukum_1, hukum_2, hukum_3, hukum_4, hukum_5, hukum_6
     FROM nilai_ganda
     WHERE id_jadwal = ? AND id_juri = ?
     LIMIT 1`,
    [idJadwal, idJuri],
  );

  return row;
}

async function ensureRegu(idJadwal: string, idJuri: string) {
  const existing = await findRegu(idJadwal, idJuri);
  if (existing) {
    return existing;
  }

  await getPool().execute(
    `INSERT INTO nilai_regu (
      id_jadwal, id_juri, jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12,
      kemantapan, hukum_1, hukum_2, hukum_3, hukum_4
    ) VALUES (?, ?, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)`,
    [idJadwal, idJuri],
  );

  return findRegu(idJadwal, idJuri);
}

async function ensureTunggal(idJadwal: string, idJuri: string) {
  const existing = await findTunggal(idJadwal, idJuri);
  if (existing) {
    return existing;
  }

  await getPool().execute(
    `INSERT INTO nilai_tunggal (
      id_jadwal, id_juri, jurus1, jurus2, jurus3, jurus4, jurus5, jurus6, jurus7, jurus8, jurus9, jurus10, jurus11, jurus12, jurus13, jurus14,
      kemantapan, hukum_1, hukum_2, hukum_3, hukum_4, hukum_5
    ) VALUES (?, ?, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)`,
    [idJadwal, idJuri],
  );

  return null;
}

async function ensureGanda(idJadwal: string, idJuri: string) {
  const existing = await findGanda(idJadwal, idJuri);
  if (existing) {
    return existing;
  }

  await getPool().execute(
    `INSERT INTO nilai_ganda (
      id_jadwal, id_juri, teknik_serang, mantap_kompak, serasi, hukum_1, hukum_2, hukum_3, hukum_4, hukum_5, hukum_6
    ) VALUES (?, ?, 0, 0, 0, 0, 0, 0, 0, 0, 0)`,
    [idJadwal, idJuri],
  );

  return findGanda(idJadwal, idJuri);
}

async function updateComponent(
  table: "nilai_ganda" | "nilai_regu" | "nilai_tunggal",
  column: string,
  idJadwal: string,
  idJuri: string,
  value: number,
) {
  await getPool().execute(
    `UPDATE ${table} SET ${column} = ? WHERE id_jadwal = ? AND id_juri = ?`,
    [value, idJadwal, idJuri],
  );
}

export async function GET(request: Request) {
  const { searchParams } = new URL(request.url);
  const action = searchParams.get("a") ?? searchParams.get("action") ?? "";

  if (!action) {
    return badRequest("Action wajib diisi");
  }

  try {
    switch (action) {
      case "partai": {
        const kategori = (searchParams.get("kategori") ?? "").trim();
        const golongan = (searchParams.get("golongan") ?? "").trim();
        if (!kategori || !golongan) {
          return badRequest("kategori dan golongan wajib diisi");
        }

        const rows = await query<{
          id_partai: number;
          noundian: string;
          kontingen: string;
          nama: string;
        }>(
          `SELECT id_partai, noundian, kontingen, nama
           FROM jadwal_tgr
           WHERE kategori = ? AND golongan = ?
           ORDER BY id_partai ASC`,
          [kategori, golongan],
        );

        return ok(
          rows.map((row) => ({
            id: row.id_partai,
            name: `${row.noundian} - ${row.kontingen}`,
            nama_pemain: row.nama,
            undian: row.noundian,
          })),
        );
      }
      case "juri": {
        const rows = await query<{ id_juri: number; nm_juri: string }>(
          "SELECT id_juri, nm_juri FROM wasit_juri",
        );

        return ok(rows.map((row) => ({ id: row.id_juri, name: row.nm_juri })));
      }
      case "login": {
        const idJuri = (searchParams.get("id") ?? "").trim();
        const password = searchParams.get("password") ?? "";
        const idPartai = (searchParams.get("id_partai") ?? "").trim();

        if (!idJuri || !password) {
          return badRequest("id dan password wajib diisi");
        }

        const hashed = createHash("md5").update(password).digest("hex");
        const [found] = await query<{ id_juri: number }>(
          "SELECT id_juri FROM wasit_juri WHERE id_juri = ? AND pass_juri = ? LIMIT 1",
          [idJuri, hashed],
        );

        if (!found) {
          return ok({ status: "error" });
        }

        const [jadwal] = await query<{ kontingen: string }>(
          "SELECT kontingen FROM jadwal_tgr WHERE id_partai = ? LIMIT 1",
          [idPartai || 0],
        );

        return ok({ status: "success", kontingen: jadwal?.kontingen ?? "" });
      }
      case "get_golongan_tgr": {
        const kategori = (searchParams.get("kategori") ?? "").trim();
        if (!kategori) {
          return badRequest("kategori wajib diisi");
        }

        const rows = await query<{ golongan: string; id_partai: number }>(
          "SELECT golongan, MIN(id_partai) AS id_partai FROM jadwal_tgr WHERE kategori = ? GROUP BY golongan",
          [kategori],
        );

        return ok(rows.map((row) => ({ id: row.id_partai, name: row.golongan })));
      }
      case "get_data_view_tunggal":
        return htmlResponse(await getDataViewTunggal());
      case "get_data_view_regu":
        return htmlResponse(await getDataViewRegu());
      case "get_data_view_ganda":
        return htmlResponse(await getDataViewGanda());
      default:
        return badRequest(`Action ${action} belum dimigrasikan`);
    }
  } catch {
    return serverError();
  }
}

export async function POST(request: Request) {
  const { searchParams } = new URL(request.url);
  const action = searchParams.get("a") ?? searchParams.get("action") ?? "";

  if (!action) {
    return badRequest("Action wajib diisi");
  }

  try {
    const payload = await parsePayload(request);

    switch (action) {
      case "add_disk_ganda": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await getPool().execute(
          `UPDATE nilai_ganda
           SET teknik_serang=0, mantap_kompak=0, serasi=0,
               hukum_1=0, hukum_2=0, hukum_3=0, hukum_4=0, hukum_5=0, hukum_6=0
           WHERE id_jadwal=? AND id_juri=?`,
          [payload.id_jadwal, payload.id_juri],
        );

        return ok({ status: "success" });
      }
      case "clear_hukuman_ganda": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await getPool().execute(
          "UPDATE nilai_ganda SET hukum_1=0, hukum_2=0, hukum_3=0, hukum_4=0, hukum_5=0, hukum_6=0 WHERE id_jadwal=? AND id_juri=?",
          [payload.id_jadwal, payload.id_juri],
        );

        return ok({ status: "success" });
      }
      case "add_disk_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await getPool().execute(
          `UPDATE nilai_tunggal
           SET jurus1=0, jurus2=0, jurus3=0, jurus4=0, jurus5=0, jurus6=0, jurus7=0, jurus8=0,
               jurus9=0, jurus10=0, jurus11=0, jurus12=0, jurus13=0, jurus14=0,
               kemantapan=0, hukum_1=0, hukum_2=0, hukum_3=0, hukum_4=0, hukum_5=0
           WHERE id_jadwal=? AND id_juri=?`,
          [payload.id_jadwal, payload.id_juri],
        );

        return ok({ status: "success" });
      }
      case "clear_hukuman_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await getPool().execute(
          "UPDATE nilai_tunggal SET hukum_1=0, hukum_2=0, hukum_3=0, hukum_4=0, hukum_5=0 WHERE id_jadwal=? AND id_juri=?",
          [payload.id_jadwal, payload.id_juri],
        );

        return ok({ status: "success" });
      }
      case "add_disk_regu": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await getPool().execute(
          `UPDATE nilai_regu
           SET jurus1=0, jurus2=0, jurus3=0, jurus4=0, jurus5=0, jurus6=0,
               jurus7=0, jurus8=0, jurus9=0, jurus10=0, jurus11=0, jurus12=0,
               kemantapan=0, hukum_1=0, hukum_2=0, hukum_3=0, hukum_4=0
           WHERE id_jadwal=? AND id_juri=?`,
          [payload.id_jadwal, payload.id_juri],
        );

        return ok({ status: "success" });
      }
      case "clear_hukuman_regu": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await getPool().execute(
          "UPDATE nilai_regu SET hukum_1=0, hukum_2=0, hukum_3=0, hukum_4=0 WHERE id_jadwal=? AND id_juri=?",
          [payload.id_jadwal, payload.id_juri],
        );

        return ok({ status: "success" });
      }
      case "insert_first_regu": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await ensureRegu(payload.id_jadwal, payload.id_juri);
        if (!row) {
          return ok({ status: "success" });
        }

        const subTotal =
          row.jurus1 +
          row.jurus2 +
          row.jurus3 +
          row.jurus4 +
          row.jurus5 +
          row.jurus6 +
          row.jurus7 +
          row.jurus8 +
          row.jurus9 +
          row.jurus10 +
          row.jurus11 +
          row.jurus12;

        return ok({
          status: "success",
          sub_total: subTotal,
          kemantapan: row.kemantapan,
          hukum_1: row.hukum_1,
          hukum_2: row.hukum_2,
          hukum_3: row.hukum_3,
          hukum_4: row.hukum_4,
          jurus_1: row.jurus1,
          jurus_2: row.jurus2,
          jurus_3: row.jurus3,
          jurus_4: row.jurus4,
          jurus_5: row.jurus5,
          jurus_6: row.jurus6,
          jurus_7: row.jurus7,
          jurus_8: row.jurus8,
          jurus_9: row.jurus9,
          jurus_10: row.jurus10,
          jurus_11: row.jurus11,
          jurus_12: row.jurus12,
        });
      }
      case "insert_first_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const existing = await ensureTunggal(payload.id_jadwal, payload.id_juri);
        if (!existing) {
          return ok({ status: "success", total_minus: 0, kemantapan: 50 });
        }

        const totalMinus =
          existing.jurus1 +
          existing.jurus2 +
          existing.jurus3 +
          existing.jurus4 +
          existing.jurus5 +
          existing.jurus6 +
          existing.jurus7 +
          existing.jurus8 +
          existing.jurus9 +
          existing.jurus10 +
          existing.jurus11 +
          existing.jurus12 +
          existing.jurus13 +
          existing.jurus14;

        return ok({
          status: "success",
          total_minus: totalMinus,
          kemantapan: existing.kemantapan,
          hukum_1: existing.hukum_1,
          hukum_2: existing.hukum_2,
          hukum_3: existing.hukum_3,
          hukum_4: existing.hukum_4,
          hukum_5: existing.hukum_5,
          jurus_1: existing.jurus1,
          jurus_2: existing.jurus2,
          jurus_3: existing.jurus3,
          jurus_4: existing.jurus4,
          jurus_5: existing.jurus5,
          jurus_6: existing.jurus6,
          jurus_7: existing.jurus7,
          jurus_8: existing.jurus8,
          jurus_9: existing.jurus9,
          jurus_10: existing.jurus10,
          jurus_11: existing.jurus11,
          jurus_12: existing.jurus12,
          jurus_13: existing.jurus13,
          jurus_14: existing.jurus14,
        });
      }
      case "insert_first_ganda": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await ensureGanda(payload.id_jadwal, payload.id_juri);
        if (!row) {
          return ok({ status: "success" });
        }

        return ok({
          status: "success",
          sub_total: row.teknik_serang + row.mantap_kompak + row.serasi,
          teknik: row.teknik_serang,
          mantap: row.mantap_kompak,
          serasi: row.serasi,
          hukum_1: row.hukum_1,
          hukum_2: row.hukum_2,
          hukum_3: row.hukum_3,
          hukum_4: row.hukum_4,
          hukum_5: row.hukum_5,
          hukum_6: row.hukum_6,
        });
      }
      case "plus_regu":
      case "minus_regu": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "jurus"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findRegu(payload.id_jadwal, payload.id_juri);
        if (!row) {
          return ok({ status: "success" });
        }

        const jurusIndex = toNumber(payload.jurus) - 1;
        const column = REGU_JURUS_COLUMNS[jurusIndex];
        if (!column) {
          return badRequest("jurus tidak valid");
        }

        const current = row[column] ?? 0;
        const next = action === "plus_regu" ? current + 1 : current - 1;

        await updateComponent("nilai_regu", column, payload.id_jadwal, payload.id_juri, next);
        return ok({ status: "success", nilai: next });
      }
      case "add_hukuman_waktu_regu":
      case "add_hukuman_waktu_ganda":
      case "add_hukuman_waktu_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "nilai"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const table =
          action === "add_hukuman_waktu_regu"
            ? "nilai_regu"
            : action === "add_hukuman_waktu_ganda"
              ? "nilai_ganda"
              : "nilai_tunggal";

        await updateComponent(
          table,
          "hukum_1",
          payload.id_jadwal,
          payload.id_juri,
          toNumber(payload.nilai),
        );

        return ok({ status: "success" });
      }
      case "add_hukuman_regu_pakaian": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "nilai"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        await updateComponent(
          "nilai_regu",
          "hukum_3",
          payload.id_jadwal,
          payload.id_juri,
          toNumber(payload.nilai),
        );

        return ok({ status: "success" });
      }
      case "add_hukuman_regu": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "hukuman", "nilai"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findRegu(payload.id_jadwal, payload.id_juri);
        if (!row) return ok({ status: "success" });

        const hukuman = toNumber(payload.hukuman);
        const nilai = toNumber(payload.nilai);

        if (hukuman === 2) {
          await updateComponent(
            "nilai_regu",
            "hukum_2",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_2 - nilai,
          );
        } else if (hukuman === 3) {
          await updateComponent(
            "nilai_regu",
            "hukum_3",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_3 - nilai,
          );
        } else if (hukuman === 4) {
          await updateComponent(
            "nilai_regu",
            "hukum_4",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_4 - nilai,
          );
        }

        return ok({ status: "success" });
      }
      case "add_hukuman_ganda": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "hukuman", "nilai"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findGanda(payload.id_jadwal, payload.id_juri);
        if (!row) return ok({ status: "success" });

        const hukuman = toNumber(payload.hukuman);
        const nilai = toNumber(payload.nilai);

        if (hukuman === 2) {
          await updateComponent(
            "nilai_ganda",
            "hukum_2",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_2 + nilai,
          );
        } else if (hukuman === 3) {
          await updateComponent(
            "nilai_ganda",
            "hukum_3",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_3 + nilai,
          );
        } else if (hukuman === 4) {
          await updateComponent(
            "nilai_ganda",
            "hukum_4",
            payload.id_jadwal,
            payload.id_juri,
            nilai,
          );
        } else if (hukuman === 5) {
          await updateComponent(
            "nilai_ganda",
            "hukum_5",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_5 + nilai,
          );
        } else if (hukuman === 6) {
          await updateComponent(
            "nilai_ganda",
            "hukum_6",
            payload.id_jadwal,
            payload.id_juri,
            nilai,
          );
        }

        return ok({ status: "success" });
      }
      case "add_hukuman_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "hukuman", "nilai"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findTunggal(payload.id_jadwal, payload.id_juri);
        if (!row) return ok({ status: "success" });

        const hukuman = toNumber(payload.hukuman);
        const nilai = toNumber(payload.nilai);

        if (hukuman === 2) {
          await updateComponent(
            "nilai_tunggal",
            "hukum_2",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_2 - nilai,
          );
        } else if (hukuman === 3) {
          await updateComponent(
            "nilai_tunggal",
            "hukum_3",
            payload.id_jadwal,
            payload.id_juri,
            -nilai,
          );
        } else if (hukuman === 4) {
          await updateComponent(
            "nilai_tunggal",
            "hukum_4",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_4 - nilai,
          );
        } else if (hukuman === 5) {
          await updateComponent(
            "nilai_tunggal",
            "hukum_5",
            payload.id_jadwal,
            payload.id_juri,
            row.hukum_5 - nilai,
          );
        }

        return ok({ status: "success" });
      }
      case "plus_kemantapan_regu":
      case "minus_kemantapan_regu": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findRegu(payload.id_jadwal, payload.id_juri);
        if (!row) return ok({ status: "success" });

        let next = row.kemantapan;
        if (action === "plus_kemantapan_regu") {
          if (row.kemantapan !== 60) {
            next = row.kemantapan === 0 ? 50 : row.kemantapan + 1;
          }
          await updateComponent(
            "nilai_regu",
            "kemantapan",
            payload.id_jadwal,
            payload.id_juri,
            next,
          );
          return ok({ status: "success", kemantapan: next });
        }

        if (row.kemantapan !== 50) {
          next = row.kemantapan === 0 ? 50 : row.kemantapan - 1;
        }

        await updateComponent(
          "nilai_regu",
          "kemantapan",
          payload.id_jadwal,
          payload.id_juri,
          next,
        );

        return ok({ status: "success" });
      }
      case "plus_kemantapan_tunggal":
      case "minus_kemantapan_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findTunggal(payload.id_jadwal, payload.id_juri);
        if (!row) return ok({ status: "success" });

        let next = row.kemantapan;
        if (action === "plus_kemantapan_tunggal") {
          if (row.kemantapan !== 60) {
            next = row.kemantapan === 0 ? 50 : row.kemantapan + 1;
          }

          await updateComponent(
            "nilai_tunggal",
            "kemantapan",
            payload.id_jadwal,
            payload.id_juri,
            next,
          );
          return ok({ status: "success", kemantapan: next });
        }

        if (row.kemantapan !== 50) {
          next = row.kemantapan === 0 ? 50 : row.kemantapan - 1;
        }

        await updateComponent(
          "nilai_tunggal",
          "kemantapan",
          payload.id_jadwal,
          payload.id_juri,
          next,
        );

        return ok({ status: "success" });
      }
      case "add_undo_minus_tunggal":
      case "add_minus_tunggal": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri", "jurus"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findTunggal(payload.id_jadwal, payload.id_juri);
        if (!row) {
          return ok({ status: "success" });
        }

        const jurusIndex = toNumber(payload.jurus) - 1;
        const column = TUNGGAL_JURUS_COLUMNS[jurusIndex];
        if (!column) {
          return badRequest("jurus tidak valid");
        }

        const current = row[column] ?? 0;
        const next = action === "add_undo_minus_tunggal" ? current + 1 : current - 1;

        await updateComponent(
          "nilai_tunggal",
          column,
          payload.id_jadwal,
          payload.id_juri,
          next,
        );

        return ok({ status: "success", nilai: next });
      }
      case "plus_nilai_serang_ganda":
      case "minus_nilai_serang_ganda":
      case "plus_nilai_mantap_ganda":
      case "minus_nilai_mantap_ganda":
      case "plus_nilai_serasi_ganda":
      case "minus_nilai_serasi_ganda": {
        const missing = requiredFields(payload, ["id_jadwal", "id_juri"]);
        if (missing) return badRequest(`${missing} wajib diisi`);

        const row = await findGanda(payload.id_jadwal, payload.id_juri);
        if (!row) return ok({ status: "success" });

        const isSerang = action.includes("serang");
        const isMantap = action.includes("mantap");
        const column = isSerang ? "teknik_serang" : isMantap ? "mantap_kompak" : "serasi";

        const min = isSerang ? 60 : 50;
        const max = isSerang ? 80 : 60;
        const current = row[column];
        const isPlus = action.startsWith("plus");

        let next = current;

        if (current !== (isPlus ? max : min)) {
          if (current === 0) {
            next = min;
          } else {
            next = isPlus ? current + 1 : current - 1;
          }
        }

        await updateComponent("nilai_ganda", column, payload.id_jadwal, payload.id_juri, next);

        return ok({ status: "success" });
      }
      default:
        return badRequest(`Action ${action} belum dimigrasikan`);
    }
  } catch {
    return serverError();
  }
}

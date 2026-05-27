import { createHash } from "node:crypto";

import { badRequest, ok, serverError } from "@/lib/api";
import { getPool, query } from "@/lib/db";

type PartaiRow = {
  id_partai: number;
  partai: string;
  kelas: string;
  gelanggang: string;
};

type JuriRow = {
  id_juri: number;
  nm_juri: string;
};

type JadwalRow = Record<string, unknown>;

type HistoryRow = {
  id_nilai: number;
  id_jadwal: string;
  id_juri: string;
  button: string;
  nilai: number;
  sudut: string;
  babak: string;
  nm_juri: string;
};

async function parsePayload(request: Request) {
  const contentType = request.headers.get("content-type") ?? "";
  if (contentType.includes("application/json")) {
    return (await request.json()) as Record<string, string>;
  }

  if (
    contentType.includes("multipart/form-data") ||
    contentType.includes("application/x-www-form-urlencoded")
  ) {
    const formData = await request.formData();
    return Object.fromEntries(formData.entries()) as Record<string, string>;
  }

  return {};
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
        const rows = await query<PartaiRow>(
          "SELECT id_partai, partai, kelas, gelanggang FROM jadwal_tanding WHERE status='-' ORDER BY CAST(partai AS UNSIGNED) ASC",
        );

        return ok(
          rows.map((row) => ({
            id: row.id_partai,
            name: row.partai,
            kelas: row.kelas,
            gelanggang: row.gelanggang,
          })),
        );
      }
      case "juri": {
        const rows = await query<JuriRow>("SELECT id_juri, nm_juri FROM wasit_juri");
        return ok(rows.map((row) => ({ id: row.id_juri, name: row.nm_juri })));
      }
      case "login": {
        const id = searchParams.get("id") ?? "";
        const rawPassword = searchParams.get("password") ?? "";

        if (!id || !rawPassword) {
          return badRequest("id dan password wajib diisi");
        }

        const hashed = createHash("md5").update(rawPassword).digest("hex");
        const [row] = await query<{ id_juri: number }>(
          "SELECT id_juri FROM wasit_juri WHERE id_juri = ? AND pass_juri = ? LIMIT 1",
          [id, hashed],
        );

        return ok({ status: row ? "success" : "error" });
      }
      case "jadwal": {
        const idPartai = searchParams.get("id_partai") ?? "";
        if (!idPartai) {
          return badRequest("id_partai wajib diisi");
        }

        const [row] = await query<JadwalRow>(
          "SELECT * FROM jadwal_tanding WHERE id_partai = ? LIMIT 1",
          [idPartai],
        );

        return ok(row ?? {});
      }
      case "history": {
        const idJuri = searchParams.get("id_juri") ?? "";
        const idJadwal = searchParams.get("id_jadwal") ?? "";
        const sudut = searchParams.get("sudut") ?? "";
        const babak = searchParams.get("babak") ?? "";

        if (!idJuri || !idJadwal || !sudut || !babak) {
          return badRequest("id_juri, id_jadwal, sudut, dan babak wajib diisi");
        }

        const rows = await query<HistoryRow>(
          `SELECT nilai_tanding.*, w.nm_juri
           FROM nilai_tanding
           INNER JOIN wasit_juri w ON w.id_juri = nilai_tanding.id_juri
           WHERE nilai_tanding.id_jadwal = ?
             AND nilai_tanding.id_juri = ?
             AND nilai_tanding.sudut = ?
             AND nilai_tanding.babak = ?
           ORDER BY id_nilai DESC`,
          [idJadwal, idJuri, sudut, babak],
        );

        return ok(rows);
      }
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
      case "submit_skor": {
        const { id_jadwal, id_juri, button, nilai, sudut, babak } = payload;
        if (!id_jadwal || !id_juri || !button || !nilai || !sudut || !babak) {
          return badRequest("Semua field submit skor wajib diisi");
        }

        await getPool().execute(
          `INSERT INTO nilai_tanding (id_jadwal, id_juri, button, nilai, sudut, babak)
           VALUES (?, ?, ?, ?, ?, ?)`,
          [id_jadwal, id_juri, button, Number(nilai), sudut, babak],
        );

        return ok({ message: "success" });
      }
      case "delete_nilai": {
        const idNilai = payload.id_nilai ?? searchParams.get("id_nilai") ?? "";
        if (!idNilai) {
          return badRequest("id_nilai wajib diisi");
        }

        await getPool().execute("DELETE FROM nilai_tanding WHERE id_nilai = ?", [
          Number(idNilai),
        ]);
        return ok({ status: "success" });
      }
      default:
        return badRequest(`Action ${action} belum dimigrasikan`);
    }
  } catch {
    return serverError();
  }
}

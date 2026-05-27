import { badRequest, ok, serverError } from "@/lib/api";
import { query } from "@/lib/db";

type SearchRow = {
  ID_peserta: number;
  nm_lengkap: string;
  jenis_kelamin: string;
  tb: number;
  bb: number;
  asal_sekolah: string;
  kelas: string;
  kontingen: string;
  kategori_tanding: string;
  golongan: string;
  status: string;
  nm_kelastanding?: string;
};

export async function GET(request: Request) {
  const { searchParams } = new URL(request.url);
  const nama = (searchParams.get("nama") ?? "").trim();
  const kontingen = (searchParams.get("kontingen") ?? "").trim();
  const kategori = (searchParams.get("kategori") ?? "tanding").toLowerCase();

  if (!["tanding", "tgr"].includes(kategori)) {
    return badRequest("Kategori harus tanding atau tgr");
  }

  try {
    if (kategori === "tanding") {
      const rows = await query<SearchRow>(
        `SELECT peserta.*, kelastanding.nm_kelastanding
         FROM peserta
         INNER JOIN kelastanding ON peserta.kelas_tanding_FK = kelastanding.ID_kelastanding
         WHERE peserta.nm_lengkap LIKE ?
           AND peserta.kontingen LIKE ?
           AND peserta.kategori_tanding = 'Tanding'
         ORDER BY peserta.kontingen ASC`,
        [`%${nama}%`, `%${kontingen}%`],
      );

      return ok(rows);
    }

    const rows = await query<SearchRow>(
      `SELECT *
       FROM peserta
       WHERE nm_lengkap LIKE ?
         AND kontingen LIKE ?
         AND kategori_tanding <> 'Tanding'
       ORDER BY kontingen ASC, kode_gr ASC`,
      [`%${nama}%`, `%${kontingen}%`],
    );

    return ok(rows);
  } catch {
    return serverError();
  }
}

import { ok, serverError } from "@/lib/api";
import { query } from "@/lib/db";

type KontingenRow = { kontingen: string };

export async function GET() {
  try {
    const rows = await query<KontingenRow>(
      "SELECT DISTINCT(kontingen) as kontingen FROM peserta ORDER BY kontingen ASC",
    );

    return ok(rows.map((row) => row.kontingen).filter(Boolean));
  } catch {
    return serverError();
  }
}

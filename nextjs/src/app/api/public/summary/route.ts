import { ok, serverError } from "@/lib/api";
import { query } from "@/lib/db";

type CountRow = { total: number };

export async function GET() {
  try {
    const [all] = await query<CountRow>(
      "SELECT COUNT(*) AS total FROM peserta",
    );
    const [paid] = await query<CountRow>(
      "SELECT COUNT(*) AS total FROM peserta WHERE status = 'PAID'",
    );

    return ok({
      totalPeserta: Number(all?.total ?? 0),
      totalPaid: Number(paid?.total ?? 0),
      updatedAt: new Date().toISOString(),
    });
  } catch {
    return serverError();
  }
}

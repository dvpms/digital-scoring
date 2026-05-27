import { createHash, randomUUID } from "node:crypto";
import fs from "node:fs/promises";
import path from "node:path";

import { badRequest, ok, serverError } from "@/lib/api";
import { getPool } from "@/lib/db";

const ALLOWED_TYPES = new Set([
  "image/gif",
  "image/jpeg",
  "image/jpg",
  "image/pjpeg",
  "image/x-png",
  "image/png",
]);

const MAX_FILE_SIZE = 1_000_000;

const REQUIRED_FIELDS = [
  "banktujuan",
  "bankpengirim",
  "norekening",
  "nama",
  "kontak",
  "tgltransfer",
  "jumlah",
] as const;

function sanitizeFileName(fileName: string) {
  return fileName.replace(/\s+/g, "_").replace(/[^a-zA-Z0-9._-]/g, "");
}

export async function POST(request: Request) {
  try {
    const formData = await request.formData();
    const payload = Object.fromEntries(formData.entries());

    for (const field of REQUIRED_FIELDS) {
      if (!String(payload[field] ?? "").trim()) {
        return badRequest(`Field ${field} wajib diisi`);
      }
    }

    const bukti = formData.get("buktipembayaran");
    if (!(bukti instanceof File)) {
      return badRequest("Bukti pembayaran wajib diunggah");
    }

    if (!ALLOWED_TYPES.has(bukti.type)) {
      return badRequest("Format berkas tidak diizinkan");
    }

    if (bukti.size > MAX_FILE_SIZE) {
      return badRequest("Ukuran berkas melebihi 1MB");
    }

    const safeOriginalName = sanitizeFileName(bukti.name || `bukti-${randomUUID()}.png`);
    const hashedName =
      createHash("md5")
        .update(`${payload.norekening}${safeOriginalName}`)
        .digest("hex") + safeOriginalName;

    const absoluteUploadDir = path.join(process.cwd(), "uploads", "buktibayar");

    await fs.mkdir(absoluteUploadDir, { recursive: true });

    const filePath = path.join(absoluteUploadDir, hashedName);
    const fileBuffer = Buffer.from(await bukti.arrayBuffer());
    await fs.writeFile(filePath, fileBuffer);

    const now = new Date();
    const jakartaNow = new Date(now.getTime() + 7 * 60 * 60 * 1000)
      .toISOString()
      .slice(0, 19)
      .replace("T", " ");

    await getPool().execute(
      `INSERT INTO konfirmasi (
        bank_tujuan,
        bank_pengirim,
        norek_pengirim,
        nm_pengirim,
        kontak,
        tgl_transfer,
        jumlah,
        bukti,
        catatan,
        datetime
      ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`,
      [
        String(payload.banktujuan),
        String(payload.bankpengirim),
        String(payload.norekening),
        String(payload.nama),
        String(payload.kontak),
        String(payload.tgltransfer),
        String(payload.jumlah),
        hashedName,
        String(payload.catatan ?? ""),
        jakartaNow,
      ],
    );

    return ok({ status: "success", message: "Konfirmasi terkirim" });
  } catch {
    return serverError();
  }
}

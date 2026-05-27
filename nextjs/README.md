# Digital Scoring - Next.js Migration

Migrasi bertahap aplikasi **Digital Scoring** dari PHP legacy ke **Next.js App Router + API Route**.

## Status Tahap Saat Ini

Tahap awal sudah aktif di folder ini (`/nextjs`):

- Baseline Next.js + TypeScript + ESLint
- Koneksi MySQL terpusat (`src/lib/db.ts`)
- API route publik:
  - `GET /api/public/summary`
  - `GET /api/public/kontingen`
  - `GET /api/public/search?kategori=tanding|tgr&nama=&kontingen=`
  - `POST /api/public/confirmation` (upload bukti pembayaran)
- API route tanding inti:
  - `GET /api/nilai?a=partai|juri|login|jadwal|history`
  - `POST /api/nilai?action=submit_skor|delete_nilai`
- Halaman Next.js awal:
  - `/`
  - `/pencarian`
  - `/konfirmasi`
- Kompatibilitas URL awal:
  - `/index.php -> /`
  - `/pencarian.php -> /pencarian`
  - `/konfirmasi.php -> /konfirmasi`
  - `/nilai/api.php -> /api/nilai`

## Menjalankan Lokal

1. Salin env:

```bash
cp .env.example .env.local
```

2. Sesuaikan koneksi database di `.env.local`.
3. Jalankan:

```bash
npm install
npm run dev
```

## Catatan Migrasi

- Repo root masih berisi aplikasi PHP legacy untuk mode transisi (dual-run).
- Fokus tahap berikutnya: API TGR, autentikasi sesi terpusat, form pendaftaran penuh, dan dashboard admin.
- Dokumen status rinci ada di `docs/migration-status.md`.

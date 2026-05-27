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
- API route TGR inti (juritgr):
  - `GET /api/juritgr?a=partai|juri|login|get_golongan_tgr`
  - `GET /api/juritgr?a=get_data_view_tunggal|get_data_view_regu|get_data_view_ganda`
  - `POST /api/juritgr?action=<aksi-skor-inti>`
- API route backend admin proses:
  - `POST /api/backend?legacy=verifylogin.php|update_password.php|...`
  - `GET /api/backend?legacy=logout.php|admin_do_del_peserta.php|...`
- Halaman Next.js awal:
  - `/`
  - `/pencarian`
  - `/konfirmasi`
- Kompatibilitas URL awal:
  - `/index.php -> /`
  - `/pencarian.php -> /pencarian`
  - `/konfirmasi.php -> /konfirmasi`
  - `/nilai/api.php -> /api/nilai`
  - `/juritgr/api.php -> /api/juritgr`
  - endpoint proses di `/backend/*.php` utama sudah di-rewrite ke `/api/backend`

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
- Fokus tahap berikutnya: autentikasi sesi terpusat, form pendaftaran penuh, dan dashboard admin.
- Dokumen status rinci ada di `docs/migration-status.md`.

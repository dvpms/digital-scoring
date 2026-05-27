# Migration Status

## 1) Ruang Migrasi

- **Sumber utama kode legacy:** direktori root repository.
- **Duplikasi:** terdapat copy penuh di `/digital-scoring` (nested) dan diperlakukan sebagai artefak lama.
- **Kelompok modul:**
  - Publik pendaftaran
  - Backend admin
  - Scoring tanding (`nilai`)
  - Scoring TGR (`juritgr`, `nilaitgr`)
  - Upload berkas peserta

## 2) Arsitektur Target Next.js

- Next.js App Router pada folder `/nextjs`
- Struktur:
  - `src/app/*` untuk halaman
  - `src/app/api/*` untuk API route
  - `src/lib/*` untuk utilitas DB dan helper API
- Koneksi DB terpusat lewat `mysql2/promise` pool.

## 3) Migrasi Backend (Selesai Tahap Awal)

Sudah dimigrasikan:

- `nilai/api.php` (aksi prioritas): `partai`, `juri`, `login`, `jadwal`, `history`, `submit_skor`, `delete_nilai`
- Endpoint publik:
  - ringkasan peserta
  - daftar kontingen
  - pencarian peserta tanding/TGR
  - konfirmasi pembayaran + upload bukti

Belum dimigrasikan penuh:

- seluruh aksi kompleks `juritgr/api.php`
- endpoint admin lain di `backend/*`

## 4) Migrasi UI (Selesai Tahap Awal)

Sudah dimigrasikan:

- Home
- Pencarian peserta
- Konfirmasi pembayaran

Belum dimigrasikan:

- Form pendaftaran tunggal/ganda/regu/tanding
- Dashboard admin
- Layar juri/monitor nilai lengkap

## 5) Auth, Session, Upload

- Upload bukti pembayaran sudah dipindah ke endpoint Next.js.
- Sesi/captcha legacy belum dipindah; akan masuk tahap autentikasi terpusat.

## 6) Paritas & Dual-Run

- Strategi aktif: Next.js berjalan paralel dengan PHP legacy.
- URL penting mulai diberi redirect/rewrite untuk kompatibilitas bertahap.

## 7) Cutover

Cutover penuh belum dilakukan. Akan dilakukan setelah seluruh modul kritikal lulus uji paritas.

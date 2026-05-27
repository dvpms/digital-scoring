"use client";

import { FormEvent, useState } from "react";

export default function KonfirmasiPage() {
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState("");
  const [error, setError] = useState("");

  const onSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setLoading(true);
    setMessage("");
    setError("");

    try {
      const formData = new FormData(event.currentTarget);
      const response = await fetch("/api/public/confirmation", {
        method: "POST",
        body: formData,
      });

      const body = (await response.json()) as { message?: string };

      if (!response.ok) {
        throw new Error(body.message ?? "Konfirmasi gagal dikirim");
      }

      event.currentTarget.reset();
      setMessage(body.message ?? "Konfirmasi terkirim");
    } catch (err) {
      setError(err instanceof Error ? err.message : "Konfirmasi gagal dikirim");
    } finally {
      setLoading(false);
    }
  };

  return (
    <section className="card">
      <h2>Konfirmasi Pembayaran</h2>
      <p className="note">
        Tahap migrasi awal: captcha belum dipindahkan. Endpoint baru sudah mendukung upload bukti pembayaran.
      </p>

      <form onSubmit={onSubmit}>
        <div className="form-grid">
          <div>
            <label htmlFor="banktujuan">Bank Tujuan</label>
            <input id="banktujuan" name="banktujuan" required />
          </div>

          <div>
            <label htmlFor="bankpengirim">Bank Pengirim</label>
            <input id="bankpengirim" name="bankpengirim" required />
          </div>

          <div>
            <label htmlFor="norekening">Nomor Rekening</label>
            <input id="norekening" name="norekening" required />
          </div>

          <div>
            <label htmlFor="nama">Nama Pengirim</label>
            <input id="nama" name="nama" required />
          </div>

          <div>
            <label htmlFor="kontak">Kontak</label>
            <input id="kontak" name="kontak" required />
          </div>

          <div>
            <label htmlFor="tgltransfer">Tanggal Transfer</label>
            <input id="tgltransfer" name="tgltransfer" required />
          </div>

          <div>
            <label htmlFor="jumlah">Jumlah</label>
            <input id="jumlah" name="jumlah" required />
          </div>

          <div>
            <label htmlFor="buktipembayaran">Bukti Pembayaran (max 1MB)</label>
            <input
              id="buktipembayaran"
              name="buktipembayaran"
              type="file"
              accept="image/png,image/jpeg,image/jpg,image/gif"
              required
            />
          </div>
        </div>

        <div style={{ marginTop: 12 }}>
          <label htmlFor="catatan">Catatan</label>
          <textarea id="catatan" name="catatan" rows={4} />
        </div>

        <div style={{ marginTop: 12 }}>
          <button type="submit" disabled={loading}>
            {loading ? "Mengirim..." : "Kirim Konfirmasi"}
          </button>
        </div>
      </form>

      {message ? <p>{message}</p> : null}
      {error ? <p>{error}</p> : null}
    </section>
  );
}

"use client";

import { useEffect, useState } from "react";

type Summary = {
  totalPeserta: number;
  totalPaid: number;
  updatedAt: string;
};

export default function HomePage() {
  const [summary, setSummary] = useState<Summary | null>(null);
  const [error, setError] = useState<string>("");

  useEffect(() => {
    const load = async () => {
      try {
        const response = await fetch("/api/public/summary", { cache: "no-store" });
        if (!response.ok) {
          throw new Error("Gagal memuat ringkasan");
        }

        const data = (await response.json()) as Summary;
        setSummary(data);
      } catch (err) {
        setError(err instanceof Error ? err.message : "Gagal memuat data");
      }
    };

    void load();
  }, []);

  return (
    <>
      <section className="card">
        <h2>Digital Scoring Next.js (Tahap 1)</h2>
        <p>
          Ini adalah baseline migrasi bertahap dari aplikasi PHP legacy ke Next.js dengan API Route.
        </p>
        <p className="note">
          Modul aktif saat ini: ringkasan peserta, pencarian peserta, API tanding inti, dan konfirmasi pembayaran.
        </p>
      </section>

      <section className="card">
        <h3>Total Pendaftar</h3>
        {error ? <p>{error}</p> : null}
        {!summary ? (
          <p>Memuat data...</p>
        ) : (
          <div className="grid">
            <div className="stat">
              <strong>Total Registrasi</strong>
              <p>{summary.totalPeserta}</p>
            </div>
            <div className="stat">
              <strong>Total Terverifikasi (PAID)</strong>
              <p>{summary.totalPaid}</p>
            </div>
            <div className="stat">
              <strong>Pembaruan</strong>
              <p>{new Date(summary.updatedAt).toLocaleString("id-ID")}</p>
            </div>
          </div>
        )}
      </section>
    </>
  );
}

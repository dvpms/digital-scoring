"use client";

import { FormEvent, useEffect, useState } from "react";

type Peserta = {
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

export default function PencarianPage() {
  const [kategori, setKategori] = useState<"tanding" | "tgr">("tanding");
  const [nama, setNama] = useState("");
  const [kontingen, setKontingen] = useState("");
  const [kontingenOptions, setKontingenOptions] = useState<string[]>([]);
  const [items, setItems] = useState<Peserta[]>([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  useEffect(() => {
    const loadKontingen = async () => {
      try {
        const response = await fetch("/api/public/kontingen", { cache: "no-store" });
        if (!response.ok) {
          return;
        }

        const data = (await response.json()) as string[];
        setKontingenOptions(data);
      } catch {
        setKontingenOptions([]);
      }
    };

    void loadKontingen();
  }, []);

  const onSubmit = async (event: FormEvent) => {
    event.preventDefault();
    setError("");
    setLoading(true);

    try {
      const params = new URLSearchParams({
        kategori,
        nama,
        kontingen,
      });

      const response = await fetch(`/api/public/search?${params.toString()}`, {
        cache: "no-store",
      });

      if (!response.ok) {
        const body = (await response.json()) as { message?: string };
        throw new Error(body.message ?? "Gagal melakukan pencarian");
      }

      const data = (await response.json()) as Peserta[];
      setItems(data);
    } catch (err) {
      setError(err instanceof Error ? err.message : "Gagal melakukan pencarian");
    } finally {
      setLoading(false);
    }
  };

  return (
    <section className="card">
      <h2>Pencarian Data Peserta</h2>
      <form onSubmit={onSubmit}>
        <div className="form-grid">
          <div>
            <label htmlFor="kategori">Kategori</label>
            <select
              id="kategori"
              value={kategori}
              onChange={(event) => setKategori(event.target.value as "tanding" | "tgr")}
            >
              <option value="tanding">Tanding</option>
              <option value="tgr">TGR</option>
            </select>
          </div>

          <div>
            <label htmlFor="nama">Nama Peserta</label>
            <input
              id="nama"
              value={nama}
              onChange={(event) => setNama(event.target.value)}
              placeholder="Input nama / kosongkan"
            />
          </div>

          <div>
            <label htmlFor="kontingen">Kontingen</label>
            <input
              id="kontingen"
              list="kontingen-list"
              value={kontingen}
              onChange={(event) => setKontingen(event.target.value)}
              placeholder="Input kontingen / kosongkan"
            />
            <datalist id="kontingen-list">
              {kontingenOptions.map((option) => (
                <option key={option} value={option} />
              ))}
            </datalist>
          </div>
        </div>

        <div style={{ marginTop: 12 }}>
          <button type="submit" disabled={loading}>
            {loading ? "Mencari..." : "Cari"}
          </button>
        </div>
      </form>

      {error ? <p>{error}</p> : null}

      <div className="table-wrap" style={{ marginTop: 16 }}>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>TB</th>
              <th>BB</th>
              <th>Keterangan</th>
              <th>Kontingen</th>
              <th>{kategori === "tanding" ? "Kelas Tanding" : "Kategori"}</th>
              <th>Golongan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            {items.map((item, index) => (
              <tr key={item.ID_peserta}>
                <td>{index + 1}</td>
                <td>{item.nm_lengkap}</td>
                <td>{item.jenis_kelamin}</td>
                <td>{item.tb}</td>
                <td>{item.bb}</td>
                <td>{`${item.asal_sekolah}${item.asal_sekolah ? ", Kelas " : ""}${item.kelas}`}</td>
                <td>{item.kontingen}</td>
                <td>{kategori === "tanding" ? item.nm_kelastanding : item.kategori_tanding}</td>
                <td>{item.golongan}</td>
                <td>{item.status}</td>
              </tr>
            ))}
            {!items.length ? (
              <tr>
                <td colSpan={10}>Tidak ada data.</td>
              </tr>
            ) : null}
          </tbody>
        </table>
      </div>
    </section>
  );
}

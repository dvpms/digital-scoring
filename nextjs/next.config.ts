import type { NextConfig } from "next";

const backendProcessEndpoints = [
  "verifylogin.php",
  "logout.php",
  "update_password.php",
  "admin_do_edit_peserta.php",
  "admin_do_edit_peserta_tgr.php",
  "admin_do_del_peserta.php",
  "admin_do_paid.php",
  "admin_do_medali.php",
  "admin_del_medali.php",
  "do_post_jadwal_tanding.php",
  "admin_do_edit_partai.php",
  "del_partai.php",
  "do_post_jadwal_ganda.php",
  "do_post_jadwal_regu.php",
  "do_post_jadwal_tunggal.php",
  "del_partai_tgr.php",
  "admin_do_undian_tanding.php",
  "admin_do_del_undian.php",
  "admin_do_undian_tgr.php",
  "admin_do_del_undian_tgr.php",
  "approve_konfirmasi.php",
  "do_clear_db.php",
  "do_clear_jadwal_tanding.php",
  "do_clear_jadwal_tgr.php",
  "do_clear_undian_tanding.php",
  "do_clear_undian_tgr.php",
] as const;

const nextConfig: NextConfig = {
  async redirects() {
    return [
      { source: "/index.php", destination: "/", permanent: false },
      { source: "/pencarian.php", destination: "/pencarian", permanent: false },
      { source: "/konfirmasi.php", destination: "/konfirmasi", permanent: false },
    ];
  },
  async rewrites() {
    return [
      { source: "/nilai/api.php", destination: "/api/nilai" },
      { source: "/juritgr/api.php", destination: "/api/juritgr" },
      ...backendProcessEndpoints.map((endpoint) => ({
        source: `/backend/${endpoint}`,
        destination: `/api/backend?legacy=${endpoint}`,
      })),
    ];
  },
};

export default nextConfig;

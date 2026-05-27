import type { NextConfig } from "next";

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
    ];
  },
};

export default nextConfig;

import type { Metadata } from "next";
import Link from "next/link";

import "./globals.css";

export const metadata: Metadata = {
  title: "Digital Scoring - Next.js Migration",
  description: "Migrasi bertahap Digital Scoring ke Next.js dengan API Route",
};

const menu = [
  { href: "/", label: "Home" },
  { href: "/pencarian", label: "Pencarian Data" },
  { href: "/konfirmasi", label: "Konfirmasi Pembayaran" },
];

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="id">
      <body>
        <header className="topbar">
          <div className="container navwrap">
            <h1 className="brand">Digital Scoring</h1>
            <nav>
              {menu.map((item) => (
                <Link key={item.href} href={item.href} className="navlink">
                  {item.label}
                </Link>
              ))}
            </nav>
          </div>
        </header>
        <main className="container main">{children}</main>
      </body>
    </html>
  );
}

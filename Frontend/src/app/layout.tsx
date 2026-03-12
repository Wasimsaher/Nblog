import type { Metadata } from "next";
import Link from "next/link";
import "./globals.css";

export const metadata: Metadata = {
  title: "NBlog — Modern Blog Platform",
  description: "A sleek blog platform built with Next.js and Laravel",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body>
        <nav className="navbar">
          <Link href="/" className="navbar-brand">
            NBlog
          </Link>
          <div className="navbar-links">
            <Link href="/" className="navbar-link">
              Posts
            </Link>
            <Link href="/posts/create" className="navbar-link navbar-link--primary">
              + New Post
            </Link>
          </div>
        </nav>
        {children}
      </body>
    </html>
  );
}

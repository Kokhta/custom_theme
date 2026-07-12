import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  variable: "--font-vazir",
  subsets: ["arabic", "latin"],
});

export const metadata: Metadata = {
  title: "آتی‌سافت | آژانس طراحی و توسعه",
  description: "آژانس طراحی آتی‌سافت - ارائه دهنده راهکارهای نوین طراحی و توسعه",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fa" dir="rtl" className={`${vazir.variable} h-full`}>
      <body className="h-full bg-black text-white font-vazir antialiased">
        {children}
      </body>
    </html>
  );
}

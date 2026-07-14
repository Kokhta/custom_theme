import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  variable: "--font-vazir",
  subsets: ["arabic"],
});

export const metadata: Metadata = {
  title: "آتی‌سافت | آژانس طراحی و توسعه",
  description: "آژانس طراحی و توسعه آتی‌سافت - تجربه‌ای سه بعدی و تعاملی",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html
      lang="fa"
      dir="rtl"
      className={`${vazir.variable} h-full antialiased`}
    >
      <body className="font-vazir min-h-full flex flex-col">{children}</body>
    </html>
  );
}

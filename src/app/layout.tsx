import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  variable: "--font-vazir",
  subsets: ["arabic"],
});

export const metadata: Metadata = {
  title: "آتی‌سافت | آژانس طراحی غوطه‌ور ۳‌بعدی",
  description: "آتی‌سافت - پیشرو در طراحی و توسعه وب‌سایت‌های مدرن و سه-بعدی",
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
      <body className="min-h-full font-vazir">{children}</body>
    </html>
  );
}

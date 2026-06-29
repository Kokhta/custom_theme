import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  subsets: ["arabic"],
  variable: "--font-vazir",
});

export const metadata: Metadata = {
  title: "آتی‌سافت | آژانس طراحی و توسعه",
  description: "آژانس خلاق طراحی و توسعه نرم‌افزار آتی‌سافت",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fa" dir="rtl">
      <body className={`${vazir.variable} font-sans antialiased`}>
        {children}
      </body>
    </html>
  );
}

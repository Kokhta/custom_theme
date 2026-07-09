import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  subsets: ["arabic", "latin"],
  variable: "--font-vazir",
});

export const metadata: Metadata = {
  title: "آتی‌سافت | آژانس طراحی سه بعدی",
  description: "آژانس طراحی آتی‌سافت - متخصص در طراحی‌های سه بعدی و تعاملی",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fa" dir="rtl" className={`${vazir.variable} font-sans`}>
      <body className="antialiased bg-[#000814] text-white">
        {children}
      </body>
    </html>
  );
}

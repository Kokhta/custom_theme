import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  subsets: ["arabic", "latin"],
  variable: "--font-vazir",
});

export const metadata: Metadata = {
  title: "آتی‌سافت - آژانس طراحی ۳ بعدی",
  description: "آژانس طراحی آتی‌سافت، پیشرو در طراحی‌های سه بعدی و تعاملی",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fa" dir="rtl" className={`${vazir.variable} font-sans`}>
      <body className="bg-slate-950 text-white selection:bg-cyan-500/30">
        {children}
      </body>
    </html>
  );
}

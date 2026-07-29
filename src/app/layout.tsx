import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazir = Vazirmatn({
  variable: "--font-vazir",
  subsets: ["arabic", "latin"],
});

export const metadata: Metadata = {
  title: "آتی‌سافت - آژانس طراحی سه‌بعدی",
  description: "آژانس طراحی آتی‌سافت (Atisoft) - توسعه‌دهنده وب‌سایت‌های سه‌بعدی و تعاملی مدرن",
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
      <body className="min-h-full flex flex-col bg-slate-950 text-slate-100 selection:bg-[#00A4FF]/30 selection:text-white">
        {children}
      </body>
    </html>
  );
}

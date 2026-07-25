import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazirmatn = Vazirmatn({
  variable: "--font-vazir",
  subsets: ["arabic"],
});

export const metadata: Metadata = {
  title: "آتی‌سافت | آژانس طراحی و توسعه سه بعدی",
  description: "آژانس طراحی آتی‌سافت - تجربه دنیای سه بعدی و نوآورانه",
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
      className={`${vazirmatn.variable} h-full antialiased`}
    >
      <body className="min-h-full flex flex-col bg-slate-950 text-white font-vazir select-none overflow-x-hidden">
        {children}
      </body>
    </html>
  );
}

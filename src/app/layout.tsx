import type { Metadata } from "next";
import { Vazirmatn } from "next/font/google";
import "./globals.css";

const vazirmatn = Vazirmatn({
  subsets: ["arabic"],
  variable: "--font-vazirmatn",
  weight: ["300", "400", "500", "700", "900"],
});

export const metadata: Metadata = {
  title: "آتی‌سافت - آژانس طراحی سه بعدی و تعاملی",
  description: "آژانس طراحی آتی‌سافت - تجربه‌های سه بعدی، تعاملی و غوطه‌ورکننده برای وب",
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
      <body className="min-h-full flex flex-col bg-slate-950 text-white overflow-x-hidden font-vazir">
        {children}
      </body>
    </html>
  );
}

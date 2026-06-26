import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: "آتی‌سافت | Atisoft",
  description: "آژانس طراحی آتی‌سافت - تجربه‌ای غوطه‌ور در دنیای سه بعدی",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="fa" dir="rtl">
      <body>
        {children}
      </body>
    </html>
  );
}

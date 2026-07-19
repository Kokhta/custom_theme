"use client";

import dynamic from "next/dynamic";

const Experience = dynamic(() => import("../components/Experience"), {
  ssr: false,
  loading: () => (
    <div className="flex h-screen w-screen items-center justify-center bg-slate-950 text-white">
      <div className="flex flex-col items-center gap-4">
        <div className="h-12 w-12 animate-spin rounded-full border-4 border-brand-cyan border-t-transparent"></div>
        <p className="text-xl font-medium font-vazir animate-pulse">درحال بارگذاری آتی‌سافت...</p>
      </div>
    </div>
  ),
});

export default function Home() {
  return (
    <main className="flex-1 w-full h-full relative">
      <Experience />
    </main>
  );
}

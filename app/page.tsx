"use client";

import dynamic from "next/dynamic";

const Experience = dynamic(() => import("@/components/Experience"), {
  ssr: false,
  loading: () => (
    <div className="fixed inset-0 flex items-center justify-center bg-[#050a15] text-white">
      <div className="flex flex-col items-center gap-4">
        <div className="w-12 h-12 border-4 border-primary-cyan border-t-transparent rounded-full animate-spin"></div>
        <p className="text-xl font-bold font-vazir">در حال بارگذاری آتی‌سافت...</p>
      </div>
    </div>
  ),
});

export default function Home() {
  return (
    <main className="h-screen w-full">
      <Experience />
    </main>
  );
}

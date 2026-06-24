import Experience from "@/components/Experience";

export default function Home() {
  return (
    <main className="relative w-full h-full">
      <Experience />

      {/* Overlay UI elements */}
      <div className="pointer-events-none fixed top-0 left-0 w-full p-10 flex justify-between items-start z-10">
        <h1 className="text-3xl font-black text-white">آتی‌سافت</h1>
        <nav className="pointer-events-auto flex gap-8 text-white/70">
          <a href="#" className="hover:text-primary-cyan transition-colors">خانه</a>
          <a href="#" className="hover:text-primary-cyan transition-colors">خدمات</a>
          <a href="#" className="hover:text-primary-cyan transition-colors">نمونه‌کارها</a>
          <a href="#" className="hover:text-primary-cyan transition-colors">درباره ما</a>
        </nav>
      </div>

      <div className="pointer-events-none fixed bottom-10 left-1/2 -translate-x-1/2 text-white/30 animate-bounce">
        اسکرول کنید
      </div>
    </main>
  );
}

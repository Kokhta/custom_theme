import Experience from "@/components/Experience";

export default function Home() {
  return (
    <main className="relative h-screen w-full bg-[#000814]">
      {/* 3D Scene */}
      <Experience />

      {/* HTML UI Overlays (Fixed) */}
      <nav className="fixed top-0 left-0 w-full p-8 flex justify-between items-center z-10 pointer-events-none">
        <div className="text-white font-bold text-2xl pointer-events-auto cursor-pointer">
          آتی‌سافت
        </div>
        <div className="flex gap-8 pointer-events-auto">
          <a href="#" className="text-white/70 hover:text-primary transition-colors font-vazir">خدمات</a>
          <a href="#" className="text-white/70 hover:text-primary transition-colors font-vazir">پروژه‌ها</a>
          <a href="#" className="text-white/70 hover:text-primary transition-colors font-vazir">درباره ما</a>
          <button className="bg-primary/20 border border-primary/50 text-primary px-6 py-2 rounded-full hover:bg-primary hover:text-white transition-all font-vazir">
            تماس با ما
          </button>
        </div>
      </nav>

      {/* Scroll Indicator */}
      <div className="fixed bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-10 opacity-50">
        <div className="w-px h-12 bg-gradient-to-b from-transparent to-white"></div>
        <span className="text-[10px] text-white uppercase tracking-widest font-vazir">اسکرول کنید</span>
      </div>
    </main>
  );
}

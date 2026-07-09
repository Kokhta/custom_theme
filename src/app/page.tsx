import Scene from "@/components/Scene";

export default function Home() {
  return (
    <main className="relative w-full h-screen">
      <Scene />

      {/* Optional: Add a subtle loading indicator or top-level UI here */}
      <div className="fixed top-8 left-8 z-10 pointer-events-none">
        <h1 className="text-xl font-bold text-cyan-primary opacity-50">آتی‌سافت</h1>
      </div>
    </main>
  );
}

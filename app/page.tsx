import Experience from "./components/Experience";

export default function Home() {
  return (
    <main className="flex-1 w-full h-screen relative overflow-hidden bg-[#010614]">
      {/* Immersive 3D Experience canvas with full layout overlay */}
      <Experience />
    </main>
  );
}

"use client";

import { Canvas } from "@react-three/fiber";
import { ScrollControls, ContactShadows, Loader } from "@react-three/drei";
import { EffectComposer, Bloom } from "@react-three/postprocessing";
import { CameraRig } from "./components/CameraRig";
import { SpaceBackground } from "./components/SpaceBackground";
import { HeroSection } from "./components/HeroSection";
import { AboutSection } from "./components/AboutSection";
import { ClientsSection } from "./components/ClientsSection";
import { StatsSection } from "./components/StatsSection";
import { PortfolioSection } from "./components/PortfolioSection";

export default function Home() {
  return (
    <div className="relative w-full min-h-screen bg-slate-950 text-white overflow-hidden font-sans">
      {/* 2D Overlay HUD (Static Header/Navigation) */}
      <header className="fixed top-0 left-0 w-full z-50 px-6 py-4 flex items-center justify-between bg-gradient-to-b from-slate-950/80 to-transparent backdrop-blur-sm border-b border-slate-900/40">
        {/* Call to Action Button */}
        <div>
          <a
            href="#contact"
            onClick={(e) => {
              // Smooth scroll helper for 3D ScrollControls
              e.preventDefault();
              window.scrollTo({
                top: window.innerHeight * 0.1, // Scroll down slightly to focus contact form
                behavior: "smooth",
              });
            }}
            className="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-extrabold text-xs px-4 py-2.5 rounded-full transition-all duration-300 shadow-lg shadow-emerald-950/30 cursor-pointer"
          >
            مشاوره رایگان
          </a>
        </div>

        {/* Navigation Middle Tabs */}
        <nav className="hidden md:flex items-center gap-6 text-xs font-semibold text-slate-300">
          <a href="#" className="hover:text-cyan-400 transition-colors">
            خانه
          </a>
          <a href="#" className="hover:text-cyan-400 transition-colors">
            خدمات
          </a>
          <a href="#" className="hover:text-cyan-400 transition-colors">
            مشتریان
          </a>
          <a href="#" className="hover:text-cyan-400 transition-colors">
            آمار ما
          </a>
          <a href="#" className="hover:text-cyan-400 transition-colors">
            نمونه‌کارها
          </a>
        </nav>

        {/* Brand Logo text */}
        <div className="flex items-center gap-2">
          <span className="text-sm font-black tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-emerald-400">
            آتی‌سافت
          </span>
          <div className="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-pulse" />
        </div>
      </header>

      {/* Floating interactive instructions tooltip at the bottom */}
      <div className="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 flex flex-col items-center gap-1 pointer-events-none select-none">
        <span className="text-[10px] text-slate-400 font-medium tracking-wide">
          به پایین اسکرول کنید
        </span>
        <div className="w-5 h-8 border-2 border-slate-700 rounded-full flex justify-center p-1">
          <div className="w-1 h-2 bg-cyan-400 rounded-full animate-bounce" />
        </div>
      </div>

      {/* R3F immersive 3D Canvas */}
      <div className="fixed inset-0 w-full h-full z-0">
        <Canvas
          shadows
          camera={{ position: [0, 0, 11], fov: 45 }}
          gl={{ antialias: true, alpha: false, stencil: false, depth: true }}
        >
          <color attach="background" args={["#020617"]} />

          {/* Realistic global illumination lights */}
          <ambientLight intensity={0.65} />
          <directionalLight
            position={[5, 10, 5]}
            intensity={1.2}
            castShadow
            shadow-mapSize={[1024, 1024]}
          />
          <pointLight position={[-10, -10, -10]} intensity={0.5} />
          <pointLight position={[10, 10, 10]} intensity={0.5} />

          {/* Unified Scroll Controls container */}
          {/* pages=5 means 5 full screens of scrolling depth */}
          <ScrollControls pages={5} damping={0.25} distance={1.2}>
            {/* Unified camera & scroll manager */}
            <CameraRig />

            {/* Immersive space starry environment */}
            <SpaceBackground />

            {/* Scroll Sections: Stacked vertically with 20 units height increments */}
            {/* 1. Hero & Form (Y: 0) */}
            <HeroSection />

            {/* 2. About & Services Pedestals (Y: -20) */}
            <AboutSection />

            {/* 3. Clients Carousel (Y: -40) */}
            <ClientsSection />

            {/* 4. Stats Dashboard (Y: -60) */}
            <StatsSection />

            {/* 5. Portfolio & low-poly footer landscape (Y: -80) */}
            <PortfolioSection />

            {/* Soft shadows projection under meshes */}
            <ContactShadows
              position={[0, -85.5, 0]}
              opacity={0.4}
              scale={40}
              blur={2.5}
              far={10}
            />
          </ScrollControls>

          {/* High-end post-processing bloom effect */}
          <EffectComposer>
            <Bloom
              intensity={1.0}
              luminanceThreshold={0.15}
              luminanceSmoothing={0.9}
              mipmapBlur
            />
          </EffectComposer>
        </Canvas>
      </div>

      {/* Preloader to show progressive asset loading */}
      <Loader />
    </div>
  );
}

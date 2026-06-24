"use client";

import { Canvas, useFrame, useThree } from "@react-three/fiber";
import { ScrollControls, useScroll, Environment, ContactShadows, Html, Stars } from "@react-three/drei";
import { Suspense, useRef } from "react";
import * as THREE from "three";
import { Bloom, EffectComposer } from "@react-three/postprocessing";
import { Hero } from "./Hero";
import { Services } from "./Services";
import { Clients } from "./Clients";
import { Stats } from "./Stats";
import { Portfolio } from "./Portfolio";

const Scene = () => {
  const scroll = useScroll();
  const { camera } = useThree();
  const groupRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (!groupRef.current) return;

    // Smooth camera Y position based on scroll
    const targetY = (scroll.offset || 0) * 50;
    groupRef.current.position.y = THREE.MathUtils.lerp(groupRef.current.position.y, targetY, 0.1);

    // Zoom out logic
    const zoomProgress = scroll.range(0.9, 0.1);
    const easedZoom = THREE.MathUtils.smoothstep(zoomProgress, 0, 1);

    camera.position.z = THREE.MathUtils.lerp(8, 60, easedZoom);
    if ((camera as THREE.PerspectiveCamera).isPerspectiveCamera) {
      const targetFov = THREE.MathUtils.lerp(60, 40, easedZoom);
      if (Math.abs((camera as THREE.PerspectiveCamera).fov - targetFov) > 0.1) {
        (camera as THREE.PerspectiveCamera).fov = targetFov;
        camera.updateProjectionMatrix();
      }
    }

    groupRef.current.rotation.y = easedZoom * Math.PI * 0.2;
  });

  return (
    <group ref={groupRef}>
      <Stars radius={100} depth={50} count={5000} factor={4} saturation={0} fade speed={1} />
      <Hero />
      <Services />
      <Clients />
      <Stats />
      <Portfolio />
    </group>
  );
};

export default function Experience() {
  const fontUrl = "https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf";

  return (
    <div className="fixed inset-0 font-[Vazir]">
      <Canvas shadows camera={{ position: [0, 0, 8], fov: 60 }} gl={{ preserveDrawingBuffer: true, alpha: true }}>
        <color attach="background" args={["#001529"]} />
        <fog attach="fog" args={["#001529", 10, 100]} />
        <Suspense fallback={
          <Html center>
            <div className="text-white text-xl whitespace-nowrap bg-black/50 p-4 rounded-xl backdrop-blur-sm" dir="rtl">
              در حال بارگذاری دنیای ۳بعدی...
            </div>
          </Html>
        }>
          <ScrollControls pages={6} damping={0.2}>
            <Scene />

            <Html fullscreen pointerEvents="none">
              <nav className="fixed top-0 left-0 w-full p-4 md:p-8 flex justify-between items-center bg-gradient-to-b from-[#001529] to-transparent" dir="rtl">
                <h1 className="text-white text-2xl md:text-4xl font-bold pointer-events-auto drop-shadow-[0_0_10px_rgba(0,164,255,0.5)]">
                  آتی‌سافت
                </h1>
                <div className="space-x-4 md:space-x-8 space-x-reverse text-white/70 pointer-events-auto flex text-sm md:text-base">
                  <a href="#" className="hover:text-[#00A4FF] transition-all hover:scale-110">خانه</a>
                  <a href="#" className="hover:text-[#00A4FF] transition-all hover:scale-110">خدمات</a>
                  <a href="#" className="hover:text-[#00A4FF] transition-all hover:scale-110 hidden sm:inline">نمونه‌کارها</a>
                  <a href="#" className="hover:text-[#00A4FF] transition-all hover:scale-110 hidden sm:inline">درباره ما</a>
                </div>
              </nav>

              <div className="fixed bottom-10 left-1/2 -translate-x-1/2 text-white/30 animate-bounce text-[10px] md:text-sm uppercase tracking-widest text-center whitespace-nowrap">
                اسکرول کنید <br className="md:hidden" /> Scroll to Explore
              </div>
            </Html>
          </ScrollControls>

          <ambientLight intensity={1.0} />
          <pointLight position={[10, 10, 10]} intensity={1.5} />
          <pointLight position={[-10, -10, -10]} color="#004E8C" intensity={1} />
          <Environment preset="city" />
          <ContactShadows opacity={0.4} scale={40} blur={2} far={10} color="#000" />

          <EffectComposer>
            <Bloom intensity={1.5} luminanceThreshold={0.9} radius={0.5} />
          </EffectComposer>
        </Suspense>
      </Canvas>

      <style jsx global>{`
        @font-face {
          font-family: 'Vazir';
          src: url('${fontUrl}') format('truetype');
          font-weight: normal;
          font-style: normal;
        }
        body {
          margin: 0;
          background: #001529;
          overflow: hidden;
        }
      `}</style>
    </div>
  );
}

"use client";

import { useRef } from "react";
import { Canvas, useFrame } from "@react-three/fiber";
import { ScrollControls, Scroll, Environment, ContactShadows, useScroll } from "@react-three/drei";
import { EffectComposer, Bloom } from "@react-three/postprocessing";
import * as THREE from "three";
import Hero from "./Hero";
import AboutServices from "./AboutServices";
import Clients from "./Clients";
import Stats from "./Stats";
import Portfolio from "./Portfolio";

function Scene() {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    const offset = scroll.offset;

    // Smoothly transition between sections
    // Total 5 pages, using 20 units spacing
    if (groupRef.current) {
      groupRef.current.position.y = THREE.MathUtils.lerp(
        groupRef.current.position.y,
        offset * 80,
        0.1
      );
    }

    // Camera follow and space zoom out
    if (offset > 0.95) {
      state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, 30, 0.05);
      state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, -70, 0.05);
      state.camera.lookAt(0, -80, 0);
    } else {
      state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, 12, 0.05);
      state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, 0, 0.05);
      state.camera.lookAt(0, 0, 0);
    }
  });

  return (
    <group ref={groupRef}>
      <group position={[0, 0, 0]}>
        <Hero />
      </group>
      <group position={[0, -20, 0]}>
        <AboutServices />
      </group>
      <group position={[0, -40, 0]}>
        <Clients />
      </group>
      <group position={[0, -60, 0]}>
        <Stats />
      </group>
      <group position={[0, -80, 0]}>
        <Portfolio />
      </group>
    </group>
  );
}

export default function Experience() {
  return (
    <div className="h-screen w-full bg-[#020205]">
      <Canvas
        shadows
        camera={{ position: [0, 0, 12], fov: 45 }}
        gl={{ preserveDrawingBuffer: true, antialias: true }}
        dpr={[1, 2]}
      >
        <color attach="background" args={["#020205"]} />
        <fog attach="fog" args={["#020205", 5, 40]} />

        <ambientLight intensity={1.0} />
        <pointLight position={[10, 10, 10]} intensity={1.5} color="#00A4FF" />
        <pointLight position={[-10, -10, -10]} intensity={1} color="#004E8C" />

        <ScrollControls pages={5} damping={0.2} infinite={false}>
          <Scene />

          <Scroll html>
            <div className="fixed top-0 left-0 w-full p-8 flex flex-row-reverse justify-between items-center pointer-events-none z-50" dir="rtl">
              <div className="text-[#00A4FF] font-bold text-2xl pointer-events-auto cursor-pointer">
                آتی‌سافت
              </div>
              <div className="hidden md:flex gap-8 text-white/70 text-sm pointer-events-auto">
                <a href="#" className="hover:text-[#00A4FF] transition-colors">خانه</a>
                <a href="#" className="hover:text-[#00A4FF] transition-colors">خدمات</a>
                <a href="#" className="hover:text-[#00A4FF] transition-colors">مشتریان</a>
                <a href="#" className="hover:text-[#00A4FF] transition-colors">درباره ما</a>
              </div>
              <button className="bg-[#22C55E] px-6 py-2 rounded-full text-sm font-bold pointer-events-auto hover:bg-[#1ea34d] transition-all transform hover:scale-105">
                تماس با ما
              </button>
            </div>

            {/* Scroll Indicator */}
            <div className="fixed bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50">
              <div className="w-[1px] h-12 bg-gradient-to-b from-transparent to-white"></div>
              <span className="text-[10px] uppercase tracking-widest text-white">بچرخانید</span>
            </div>
          </Scroll>
        </ScrollControls>

        <Environment preset="city" />
        <ContactShadows
          position={[0, -82, 0]}
          opacity={0.4}
          scale={20}
          blur={2}
          far={10}
        />

        <EffectComposer>
          <Bloom
            luminanceThreshold={1.0}
            mipmapBlur
            intensity={1.0}
            radius={0.4}
          />
        </EffectComposer>
      </Canvas>
    </div>
  );
}

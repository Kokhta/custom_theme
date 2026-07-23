"use client";

import React, { useRef } from "react";
import { Canvas, useFrame, useThree } from "@react-three/fiber";
import { ScrollControls, useScroll, Environment, ContactShadows } from "@react-three/drei";
import { EffectComposer, Bloom } from "@react-three/postprocessing";
import * as THREE from "three";

import HeroSection from "./HeroSection";
import ServicesSection from "./ServicesSection";
import ClientSection from "./ClientSection";
import StatsSection from "./StatsSection";
import PortfolioFooterSection from "./PortfolioFooterSection";

// CameraController translates scrolling position to 3D Camera Movement & Fly-through
function CameraController() {
  const scroll = useScroll();
  const { camera } = useThree();

  useFrame((state) => {
    const r = scroll.offset; // 0 to 1

    // Section 1 (Hero): offset 0 to 0.2
    // Section 2 (Services): offset 0.2 to 0.4
    // Section 3 (Clients): offset 0.4 to 0.6
    // Section 4 (Stats): offset 0.6 to 0.8
    // Section 5 (Portfolio/Footer): offset 0.8 to 1.0

    // Fly-through logic:
    // We position sections at different vertical/depth depths in R3F space:
    // Hero: y = 0, z = 0
    // Services: y = -20, z = -5
    // Clients: y = -40, z = 5
    // Stats: y = -60, z = 0
    // Portfolio: y = -80, z = -10 (zooms out to show landscape/space)

    let targetX = 0;
    let targetY = 0;
    let targetZ = 12;

    let targetLookAtY = 0;
    let targetLookAtZ = 0;

    if (r < 0.25) {
      // Transition from Hero to Services
      const t = r / 0.25;
      targetX = THREE.MathUtils.lerp(0, 0, t);
      targetY = THREE.MathUtils.lerp(0, -20, t);
      targetZ = THREE.MathUtils.lerp(12, 14, t);
      targetLookAtY = THREE.MathUtils.lerp(0, -20, t);
    } else if (r < 0.5) {
      // Transition from Services to Clients
      const t = (r - 0.25) / 0.25;
      targetX = THREE.MathUtils.lerp(0, 0, t);
      targetY = THREE.MathUtils.lerp(-20, -40, t);
      targetZ = THREE.MathUtils.lerp(14, 13, t);
      targetLookAtY = THREE.MathUtils.lerp(-20, -40, t);
    } else if (r < 0.75) {
      // Transition from Clients to Stats
      const t = (r - 0.5) / 0.25;
      targetX = THREE.MathUtils.lerp(0, 0, t);
      targetY = THREE.MathUtils.lerp(-40, -60, t);
      targetZ = THREE.MathUtils.lerp(13, 15, t);
      targetLookAtY = THREE.MathUtils.lerp(-40, -60, t);
    } else {
      // Transition from Stats to Portfolio / Footer (with ultimate Zoom Out to outer space)
      const t = (r - 0.75) / 0.25;
      targetX = THREE.MathUtils.lerp(0, 0, t);
      targetY = THREE.MathUtils.lerp(-60, -80, t);
      // Zoom out extremely at the very end to show the outer space floating look
      targetZ = THREE.MathUtils.lerp(15, 32, t);
      targetLookAtY = THREE.MathUtils.lerp(-60, -82, t);
      targetLookAtZ = THREE.MathUtils.lerp(0, -5, t);
    }

    // Smoothly interpolate camera position
    camera.position.x = THREE.MathUtils.lerp(camera.position.x, targetX, 0.08);
    camera.position.y = THREE.MathUtils.lerp(camera.position.y, targetY, 0.08);
    camera.position.z = THREE.MathUtils.lerp(camera.position.z, targetZ, 0.08);

    // Smooth lookAt point recalculation
    const lookAtTarget = new THREE.Vector3(0, targetLookAtY, targetLookAtZ);
    camera.lookAt(lookAtTarget);
  });

  return null;
}

function SceneContent() {
  return (
    <>
      <CameraController />

      {/* Lighting */}
      <ambientLight intensity={0.8} />
      <directionalLight position={[10, 10, 10]} intensity={2.0} castShadow />
      <pointLight position={[-10, -10, -10]} intensity={1.0} />
      <spotLight position={[0, 20, 0]} intensity={3} angle={0.6} penumbra={1} castShadow />

      {/* Environment preset & shadows for realistic style */}
      <Environment preset="city" />
      <ContactShadows
        position={[0, -5, 0]}
        opacity={0.6}
        scale={25}
        blur={2}
        far={10}
      />

      {/* 3D Diorama Sections organized vertically */}
      <group position={[0, 0, 0]}>
        <HeroSection />
      </group>

      <group position={[0, -20, 0]}>
        <ServicesSection />
      </group>

      <group position={[0, -40, 0]}>
        <ClientSection />
      </group>

      <group position={[0, -60, 0]}>
        <StatsSection />
      </group>

      <group position={[0, -80, 0]}>
        <PortfolioFooterSection />
      </group>

      {/* Floating Space dust/particles to enhance outer space fly-through feeling */}
      <SpaceDust count={250} />
    </>
  );
}

// Procedural Particle Background for Outer Space Floating Vibe
function SpaceDust({ count }: { count: number }) {
  const meshRef = useRef<THREE.Points>(null);

  const particles = React.useMemo(() => {
    const temp = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
      temp[i * 3] = (Math.random() - 0.5) * 40;     // X range
      temp[i * 3 + 1] = -100 + Math.random() * 110;  // Y range span across sections
      temp[i * 3 + 2] = (Math.random() - 0.5) * 40;   // Z range
    }
    return temp;
  }, [count]);

  useFrame((state) => {
    if (meshRef.current) {
      meshRef.current.rotation.y = state.clock.getElapsedTime() * 0.02;
    }
  });

  return (
    <points ref={meshRef}>
      <bufferGeometry>
        <bufferAttribute
          attach="attributes-position"
          count={count}
          array={particles}
          itemSize={3}
          args={[particles, 3]}
        />
      </bufferGeometry>
      <pointsMaterial
        color="#00A4FF"
        size={0.12}
        sizeAttenuation
        transparent
        opacity={0.6}
        depthWrite={false}
        blending={THREE.AdditiveBlending}
      />
    </points>
  );
}

export default function Experience() {
  return (
    <div className="w-full h-screen relative bg-[#010614] overflow-hidden select-none">
      {/* Three.js Canvas */}
      <Canvas
        shadows
        camera={{ position: [0, 0, 12], fov: 60 }}
        style={{ position: "absolute", top: 0, left: 0, width: "100%", height: "100%" }}
      >
        <ScrollControls pages={5} damping={0.25} infinite={false}>
          <SceneContent />
        </ScrollControls>

        {/* Bloom post-processing effect to make Cyan and CTAs beautifully glow */}
        <EffectComposer>
          <Bloom
            intensity={1.2}
            luminanceThreshold={0.2}
            luminanceSmoothing={0.9}
            mipmapBlur
          />
        </EffectComposer>
      </Canvas>

      {/* Decorative HTML Overlay Grid (Atisoft branding look) */}
      <div className="absolute inset-0 pointer-events-none z-10 border-[16px] border-[#010614]/80 flex flex-col justify-between p-6">
        <div className="flex justify-between items-center">
          <div className="text-white font-extrabold text-xl tracking-wider select-none">
            آتی‌سافت <span className="text-[#00A4FF]">ATISOFT</span>
          </div>
          <div className="text-[#00A4FF] text-xs font-mono tracking-widest hidden md:block">
            IM-DIORAMA // ENGINE_R3F_V1.0
          </div>
        </div>

        {/* Scroll Indicator indicator */}
        <div className="flex flex-col items-center gap-1 self-center mb-4">
          <span className="text-white/60 text-[10px] font-medium uppercase tracking-widest animate-pulse font-sans">
            اسکرول کنید برای کاوش
          </span>
          <div className="w-[1px] h-10 bg-gradient-to-b from-[#00A4FF] to-transparent animate-bounce" />
        </div>
      </div>
    </div>
  );
}

"use client";

import React, { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Html } from "@react-three/drei";
import { useSpring, animated } from "@react-spring/three";
import * as THREE from "three";

// Colors definitions
const primaryCyan = "#00A4FF";
const deepBlue = "#004E8C";
const white = "#FFFFFF";
const ctaGreen = "#22C55E";

interface PortfolioScreenProps {
  position: [number, number, number];
  rotation: [number, number, number];
  title: string;
  category: string;
  desc: string;
  imageEmoji: string;
  mockUrl: string;
}

// Glow & Tilt on Hover Portfolio Screen Component (representing portfolio_screen.glb)
function PortfolioScreen({ position, rotation, title, category, desc, imageEmoji, mockUrl }: PortfolioScreenProps) {
  const [hovered, setHovered] = useState(false);
  const meshRef = useRef<THREE.Group>(null);

  // Smooth spring-based tilt and glow emission animation on hover
  const { tiltX, tiltY, glowIntensity, scale } = useSpring({
    tiltX: hovered ? -0.15 : 0,
    tiltY: hovered ? 0.2 : 0,
    glowIntensity: hovered ? 0.9 : 0.1,
    scale: hovered ? 1.15 : 1.0,
    config: { mass: 1, tension: 180, friction: 12 }
  });

  useFrame((state) => {
    if (meshRef.current) {
      // Slow background float oscillation
      meshRef.current.position.y = position[1] + Math.sin(state.clock.getElapsedTime() * 1.5 + position[0]) * 0.1;
    }
  });

  return (
    <group position={position} rotation={rotation}>
      <animated.group
        ref={meshRef}
        scale={scale as any}
        rotation-x={tiltX}
        rotation-y={tiltY}
        onPointerOver={() => setHovered(true)}
        onPointerOut={() => setHovered(false)}
      >
        {/* 3D Slim Monitor Case (The screen chassis) */}
        <mesh castShadow receiveShadow>
          <boxGeometry args={[3.2, 2.2, 0.15]} />
          <meshStandardMaterial
            color="#090f22"
            roughness={0.1}
            metalness={0.9}
            emissive={primaryCyan}
            emissiveIntensity={glowIntensity as any}
          />
        </mesh>

        {/* 3D Stand and base of screen */}
        <mesh position={[0, -1.3, -0.2]}>
          <boxGeometry args={[0.3, 0.6, 0.3]} />
          <meshStandardMaterial color="#090f22" roughness={0.1} metalness={0.9} />
        </mesh>
        <mesh position={[0, -1.6, -0.1]}>
          <cylinderGeometry args={[0.8, 0.9, 0.1, 16]} />
          <meshStandardMaterial color="#090f22" roughness={0.1} metalness={0.9} />
        </mesh>

        {/* Glossy Black screen panel border/bezel */}
        <mesh position={[0, 0, 0.08]}>
          <planeGeometry args={[3.0, 2.0]} />
          <meshStandardMaterial color="#020617" roughness={0.0} metalness={0.9} />
        </mesh>

        {/* HTML high fidelity display overlay containing Portfolio Design representation */}
        <Html
          position={[0, 0, 0.1]}
          transform
          distanceFactor={3.2}
          className="w-[300px] h-[200px] pointer-events-none select-none"
        >
          <div
            dir="rtl"
            className="w-full h-full p-4 flex flex-col justify-between bg-cover bg-center rounded-sm font-sans relative overflow-hidden"
            style={{
              backgroundImage: `linear-gradient(to top, rgba(1, 6, 20, 0.95) 40%, rgba(1, 6, 20, 0.2) 100%), url(${mockUrl})`,
            }}
          >
            {/* Visual Screen glow layer when hovered */}
            <div className={`absolute inset-0 bg-[#00A4FF]/10 transition-opacity duration-300 pointer-events-none ${
              hovered ? "opacity-100" : "opacity-0"
            }`} />

            {/* Top Bar with mock dots */}
            <div className="flex justify-between items-center relative z-10">
              <div className="flex gap-1">
                <span className="w-2 h-2 rounded-full bg-red-500/80" />
                <span className="w-2 h-2 rounded-full bg-yellow-500/80" />
                <span className="w-2 h-2 rounded-full bg-green-500/80" />
              </div>
              <span className="text-[9px] bg-slate-900/80 text-white/50 border border-white/5 px-1.5 py-0.5 rounded font-mono">
                {category}
              </span>
            </div>

            {/* Huge centered emoji graphic placeholder */}
            <div className="text-4xl text-center self-center my-1 filter drop-shadow-[0_0_12px_rgba(0,164,255,0.4)] animate-pulse">
              {imageEmoji}
            </div>

            {/* Footer with Title and Description */}
            <div className="relative z-10 text-right mt-auto">
              <h4 className="text-white text-xs font-black tracking-wide flex items-center gap-1">
                <span className="w-1.5 h-1.5 rounded-full bg-[#00A4FF] animate-ping" />
                {title}
              </h4>
              <p className="text-[9px] text-white/50 leading-relaxed font-semibold mt-0.5">
                {desc}
              </p>
            </div>
          </div>
        </Html>
      </animated.group>
    </group>
  );
}

// 3D low-poly landscape plane representing mountain and valley terrain at the bottom footer
function LowPolyTerrain() {
  const geomRef = useRef<THREE.PlaneGeometry>(null);

  // Custom vertex displacements to create nice low-poly floating islands/mountains
  React.useEffect(() => {
    if (geomRef.current) {
      const pos = geomRef.current.attributes.position;
      for (let i = 0; i < pos.count; i++) {
        const x = pos.getX(i);
        const y = pos.getY(i);
        // Sin/Cos waves combined with random heights to make low-poly mountain shapes
        const height = Math.sin(x * 0.4) * Math.cos(y * 0.4) * 0.8 + Math.cos(x * 0.15) * 1.2;
        pos.setZ(i, height);
      }
      geomRef.current.computeVertexNormals();
    }
  }, []);

  return (
    <group position={[0, -6.5, -4]} rotation={[-Math.PI / 2.3, 0, 0]}>
      {/* Mountain base wireframe */}
      <mesh castShadow receiveShadow>
        <planeGeometry ref={geomRef} args={[35, 20, 15, 12]} />
        <meshStandardMaterial
          color={deepBlue}
          wireframe
          transparent
          opacity={0.3}
        />
      </mesh>

      {/* Mountain solid colored faces */}
      <mesh receiveShadow position={[0, 0, -0.05]}>
        <planeGeometry ref={geomRef} args={[35, 20, 15, 12]} />
        <meshStandardMaterial
          color="#03081c"
          roughness={0.8}
          metalness={0.2}
          flatShading
          transparent
          opacity={0.9}
        />
      </mesh>
    </group>
  );
}

export default function PortfolioFooterSection() {
  return (
    <group>
      {/* Section Title Header */}
      <Html
        position={[0, 4.4, 0]}
        center
        distanceFactor={11}
        className="pointer-events-none select-none text-center w-[300px]"
      >
        <div dir="rtl" className="font-sans">
          <span className="text-[#00A4FF] text-[10px] font-bold tracking-[0.25em] uppercase">نمونه کارها</span>
          <h2 className="text-white text-2xl font-extrabold mt-1">پروژه‌های برجسته آتی‌سافت</h2>
          <p className="text-white/50 text-xs mt-1">ماوس خود را روی نمایشگرها حرکت دهید</p>
        </div>
      </Html>

      {/* 1. 3 Floating high-gloss screens with blue/cyan glowing hover */}
      <group position={[0, 0.4, 0]}>
        <PortfolioScreen
          position={[-3.6, 0.2, -0.5]}
          rotation={[0, 0.2, 0]}
          title="پلتفرم تجارت الکترونیک دیجی‌لند"
          category="e-Commerce UI"
          desc="تجربه کاربری بی‌نظیر خرید آنلاین با سرعت لود فوق‌العاده بالا."
          imageEmoji="🛍️"
          mockUrl="https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=400&q=80"
        />

        <PortfolioScreen
          position={[0, -0.2, 0.2]}
          rotation={[0, 0, 0]}
          title="سیستم اتوماسیون سازمانی کارا"
          category="Web Platform"
          desc="مدیریت وظایف سازمانی، نمودارها و آمار با داشبورد کاملاً تعاملی."
          imageEmoji="📊"
          mockUrl="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=400&q=80"
        />

        <PortfolioScreen
          position={[3.6, 0.2, -0.5]}
          rotation={[0, -0.2, 0]}
          title="شبکه اجتماعی پزشک‌آرا"
          category="Mobile Application"
          desc="مشاوره تخصصی آنلاین پزشکی و سلامت در سرتاسر کشور."
          imageEmoji="🩺"
          mockUrl="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=400&q=80"
        />
      </group>

      {/* 2. Low-poly terrain plane at the very footer */}
      <LowPolyTerrain />

      {/* 3. HTML Footer Content Overlay (at the bottom-most end) */}
      <Html
        position={[0, -4.5, 2.5]}
        center
        distanceFactor={10}
        className="w-full max-w-[500px]"
      >
        <div
          dir="rtl"
          className="backdrop-blur-md bg-slate-950/60 border border-white/5 rounded-2xl p-5 shadow-2xl text-center font-sans flex flex-col items-center gap-3"
        >
          <div className="flex items-center gap-2">
            <span className="w-2.5 h-2.5 rounded-full bg-[#22C55E] animate-pulse" />
            <span className="text-white text-[11px] font-bold tracking-wider">آماده همکاری با برندهای بزرگ ایرانی و بین‌المللی</span>
          </div>

          <h3 className="text-white text-base font-extrabold">
            امروز پروژه بعدی خود را با <span className="text-[#00A4FF]">آتی‌سافت</span> آغاز کنید
          </h3>

          <div className="flex gap-3 justify-center w-full mt-1">
            <a
              href="tel:+9821000000"
              className="px-4 py-2 bg-[#22C55E] hover:bg-[#1ebd56] text-white text-[11px] font-bold rounded-lg transition-all duration-300 shadow-[0_0_15px_rgba(34,197,94,0.25)] pointer-events-auto"
            >
              تماس مستقیم با مشاورین ما
            </a>
            <a
              href="#register"
              className="px-4 py-2 bg-white/5 hover:bg-white/10 text-white text-[11px] font-bold rounded-lg border border-white/10 transition-all duration-300 pointer-events-auto"
            >
              ارسال پیام آنلاین
            </a>
          </div>

          <div className="text-[9px] text-white/40 mt-2 border-t border-white/5 pt-2 w-full flex justify-between px-2">
            <span>© ۱۴۰۲ آتی‌سافت - آژانس طراحی و مهندسی ۳ بعدی دیجیتال</span>
            <span>طراحی شده با عشق و React R3F</span>
          </div>
        </div>
      </Html>
    </group>
  );
}

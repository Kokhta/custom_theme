"use client";

import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import * as THREE from "three";
import { Float, Html } from "@react-three/drei";
import { useSpring, animated, config } from "@react-spring/three";

const SocialIcon = ({ label, position }: { label: string, position: [number, number, number] }) => {
  return (
    <Float speed={2} rotationIntensity={0.5} floatIntensity={0.5}>
      <mesh position={position}>
        <sphereGeometry args={[0.3, 32, 32]} />
        <meshStandardMaterial color="#00A4FF" transparent opacity={0.6} />
        <Html center>
          <div className="p-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-[10px] text-white hover:scale-110 transition-transform cursor-pointer whitespace-nowrap">
            {label}
          </div>
        </Html>
      </mesh>
    </Float>
  );
};

export default function Hero() {
  const logoRef = useRef<THREE.Group>(null);

  // Use react-spring for pulsing/floating effect
  const { springY } = useSpring({
    from: { springY: -0.15 },
    to: async (next) => {
      while (true) {
        await next({ springY: 0.15 });
        await next({ springY: -0.15 });
      }
    },
    config: config.slow,
  });

  useFrame((state) => {
    if (logoRef.current) {
      logoRef.current.rotation.y += 0.01;
    }
  });

  return (
    <group position={[0, 0, 0]}>
      {/* 3D Logo Placeholder - Animated with Spring */}
      <animated.group ref={logoRef} position-y={springY}>
        <mesh castShadow>
          <icosahedronGeometry args={[1.5, 1]} />
          <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} wireframe />
        </mesh>
        <mesh scale={[0.8, 0.8, 0.8]}>
          <icosahedronGeometry args={[1.5, 0]} />
          <meshStandardMaterial color="#004E8C" />
        </mesh>
      </animated.group>

      {/* Orbiting Social Icons */}
      <SocialIcon label="INSTAGRAM" position={[3, 2, 0]} />
      <SocialIcon label="TELEGRAM" position={[-3, -1, 1]} />
      <SocialIcon label="WEBSITE" position={[2, -2, -2]} />

      {/* Glassmorphism Panel */}
      <group position={[0, -4, 0]}>
        <mesh>
          <planeGeometry args={[6, 4]} />
          <meshPhysicalMaterial
            transparent
            opacity={0.1}
            roughness={0}
            metalness={0.1}
            transmission={0.9}
            thickness={0.5}
          />
          <Html transform distanceFactor={8} position={[0, 0, 0.1]} portal={{ current: undefined }}>
            <div className="w-[600px] p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 shadow-2xl flex flex-col gap-6 text-white font-vazir" dir="rtl">
              <h1 className="text-4xl font-bold text-[#00A4FF]">آتی‌سافت</h1>
              <p className="text-lg text-white/70">خلق تجربه‌های دیجیتال غوطه‌ور و مدرن</p>

              <div className="grid grid-cols-2 gap-4">
                <input
                  type="text"
                  placeholder="نام و نام خانوادگی"
                  className="bg-white/10 border border-white/20 rounded-xl px-4 py-3 outline-none focus:border-[#00A4FF] transition-colors"
                />
                <input
                  type="email"
                  placeholder="ایمیل یا شماره تماس"
                  className="bg-white/10 border border-white/20 rounded-xl px-4 py-3 outline-none focus:border-[#00A4FF] transition-colors"
                />
              </div>

              <button className="bg-[#22C55E] hover:bg-[#22C55E]/80 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-[#22C55E]/20">
                مشاوره رایگان
              </button>
            </div>
          </Html>
        </mesh>
      </group>
    </group>
  );
}

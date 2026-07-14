"use client";

import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import * as THREE from "three";
import { Float, Html, Text } from "@react-three/drei";
import { useSpring, animated, config } from "@react-spring/three";

export const Hero = () => {
  const logoRef = useRef<THREE.Group>(null!);

  const { scale } = useSpring({
    from: { scale: 0.8 },
    to: async (next) => {
      while (true) {
        await next({ scale: 1.2 });
        await next({ scale: 0.8 });
      }
    },
    config: config.slow,
  });

  useFrame((state) => {
    const t = state.clock.getElapsedTime();
    logoRef.current.position.y = Math.sin(t) * 0.2 + 1.5;
    logoRef.current.rotation.y = t * 0.5;
  });

  return (
    <group position={[0, 0, 0]}>
      {/* 3D Logo Placeholder (Atisoft) */}
      <animated.group ref={logoRef} scale={scale}>
        <mesh>
          <torusKnotGeometry args={[0.4, 0.15, 128, 32]} />
          <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} />
        </mesh>
        <Text
          position={[0, -0.8, 0]}
          fontSize={0.4}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
      </animated.group>

      {/* Orbiting Social Icons */}
      <Float speed={2} rotationIntensity={1} floatIntensity={1}>
        <mesh position={[2, 1.5, 0]}>
          <sphereGeometry args={[0.1, 32, 32]} />
          <meshStandardMaterial color="#00A4FF" />
          <Html distanceFactor={10}>
            <div className="text-white text-[10px] bg-black/50 px-2 py-1 rounded-full whitespace-nowrap backdrop-blur-sm border border-white/20">Instagram</div>
          </Html>
        </mesh>
      </Float>
      <Float speed={3} rotationIntensity={2} floatIntensity={1.5}>
        <mesh position={[-2, 1, 1]}>
          <boxGeometry args={[0.15, 0.15, 0.15]} />
          <meshStandardMaterial color="#00A4FF" />
          <Html distanceFactor={10}>
            <div className="text-white text-[10px] bg-black/50 px-2 py-1 rounded-full whitespace-nowrap backdrop-blur-sm border border-white/20">Telegram</div>
          </Html>
        </mesh>
      </Float>

      {/* Registration Form - Glassmorphism Panel */}
      <Html position={[0, -1.2, 0]} center transform distanceFactor={10}>
        <div className="bg-white/10 backdrop-blur-xl p-8 rounded-3xl border border-white/20 w-96 text-right shadow-2xl" dir="rtl">
          <h2 className="text-2xl font-bold mb-6 text-white text-center">ثبت‌نام در خبرنامه</h2>
          <div className="space-y-4">
            <div className="space-y-1">
              <label className="text-white/70 text-sm mr-1">نام و نام خانوادگی</label>
              <input
                type="text"
                placeholder="مثلا: علی محمدی"
                className="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-[#00A4FF] transition-all"
              />
            </div>
            <div className="space-y-1">
              <label className="text-white/70 text-sm mr-1">ایمیل</label>
              <input
                type="email"
                placeholder="info@example.com"
                className="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-[#00A4FF] transition-all"
              />
            </div>
            <button className="w-full bg-[#22C55E] hover:bg-[#1ea34d] text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-green-500/20 active:scale-95 mt-2">
              ارسال اطلاعات
            </button>
          </div>
        </div>
      </Html>
    </group>
  );
};

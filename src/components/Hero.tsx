"use client";

import { useScroll, ScrollControls, Scroll, Environment, ContactShadows, Float, Text, MeshDistortMaterial, Html } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef, useMemo } from "react";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

export const Hero = () => {
  const scroll = useScroll();
  const logoRef = useRef<THREE.Group>(null);

  const { logoPos, logoRot } = useSpring({
    from: { logoPos: [0, 1.3, 0], logoRot: [0, 0, 0] },
    to: async (next) => {
      while (true) {
        await next({ logoPos: [0, 1.7, 0], logoRot: [0, Math.PI * 2, 0] });
        await next({ logoPos: [0, 1.3, 0], logoRot: [0, Math.PI * 4, 0] });
      }
    },
    config: { duration: 4000 },
  });

  const { orbitRot } = useSpring({
    from: { orbitRot: 0 },
    to: { orbitRot: Math.PI * 2 },
    loop: true,
    config: { duration: 10000 },
  });

  return (
    <group>
      {/* Animated Logo Placeholder */}
      <animated.group position={logoPos as any} rotation={logoRot as any}>
        <mesh>
          <torusKnotGeometry args={[0.6, 0.22, 128, 16]} />
          <MeshDistortMaterial color="#00A4FF" speed={2} distort={0.4} />
        </mesh>
        <Text
          position={[0, -1.2, 0]}
          fontSize={0.4}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          آتی‌سافت
        </Text>
      </animated.group>

      {/* Social Icons Orbiting */}
      <animated.group rotation-y={orbitRot}>
        <Float speed={2} rotationIntensity={1} floatIntensity={1}>
          <mesh position={[3, 0, 0]}>
            <sphereGeometry args={[0.2, 32, 32]} />
            <meshStandardMaterial color="#22C55E" emissive="#22C55E" emissiveIntensity={0.5} />
          </mesh>
        </Float>
        <Float speed={1.5} rotationIntensity={2} floatIntensity={0.5}>
          <mesh position={[-3, 1, 0]}>
            <boxGeometry args={[0.3, 0.3, 0.3]} />
            <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} />
          </mesh>
        </Float>
      </animated.group>

      {/* Glassmorphism Registration Form */}
      <Html
        position={[2.5, 0.5, 0]}
        transform
        distanceFactor={2.5}
        occlude="blending"
      >
        <div
          className="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 shadow-2xl w-64 text-right"
          dir="rtl"
        >
          <h3 className="text-white font-bold mb-4 text-lg">ثبت‌نام پروژه</h3>
          <div className="space-y-3">
            <input
              type="text"
              placeholder="نام و نام خانوادگی"
              className="w-full bg-white/5 border border-white/10 rounded-lg p-2 text-white text-sm focus:outline-none focus:border-[#00A4FF] transition-colors placeholder:text-white/30"
            />
            <input
              type="email"
              placeholder="ایمیل یا شماره تماس"
              className="w-full bg-white/5 border border-white/10 rounded-lg p-2 text-white text-sm focus:outline-none focus:border-[#00A4FF] transition-colors placeholder:text-white/30"
            />
            <button className="w-full bg-[#22C55E] hover:bg-[#1da850] text-white font-bold py-2 rounded-lg transition-all transform active:scale-95 shadow-lg shadow-green-500/20">
              ارسال درخواست
            </button>
          </div>
        </div>
      </Html>
    </group>
  );
};

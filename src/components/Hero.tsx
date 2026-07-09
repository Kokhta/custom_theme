"use client";

import { Float, Html, Text } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

// Manual SVG Icons to avoid Turbopack resolution issues with lucide-react
const InstagramIcon = () => (
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
);
const SendIcon = () => (
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
);
const GlobeIcon = () => (
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
);

export function Hero({ position }: { position: [number, number, number] }) {
  const logoRef = useRef<THREE.Group>(null);

  // Spring for logo pulse
  const { scale } = useSpring({
    from: { scale: 0.8 },
    to: async (next) => {
      while (true) {
        await next({ scale: 1.1 });
        await next({ scale: 0.8 });
      }
    },
    config: { duration: 2000 },
  });

  useFrame((state) => {
    if (logoRef.current) {
      logoRef.current.rotation.y += 0.01;
      logoRef.current.position.y = Math.sin(state.clock.elapsedTime) * 0.2;
    }
  });

  const icons = [
    { Icon: InstagramIcon, color: "#E4405F", position: [2, 1, 0] },
    { Icon: SendIcon, color: "#0088cc", position: [-2, 1.5, -1] },
    { Icon: GlobeIcon, color: "#00A4FF", position: [1.5, -1.5, 1] },
  ];

  return (
    <group position={position}>
      {/* Logo Placeholder */}
      <animated.group ref={logoRef} scale={scale}>
        <mesh>
          <torusKnotGeometry args={[0.8, 0.3, 128, 16]} />
          <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} roughness={0.1} metalness={0.8} />
        </mesh>
        <Text
          position={[0, 0, 1.2]}
          fontSize={0.4}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
      </animated.group>

      {/* Floating Social Icons */}
      {icons.map((item, idx) => (
        <Float key={idx} speed={2} rotationIntensity={1} floatIntensity={2}>
          <Html position={item.position as [number, number, number]} center transform distanceFactor={10}>
            <div
              className="p-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 cursor-pointer hover:scale-110 transition-transform"
              style={{ color: item.color }}
            >
              <item.Icon />
            </div>
          </Html>
        </Float>
      ))}

      {/* Glassmorphism Form */}
      <Html position={[0, -4, 0]} center transform distanceFactor={8}>
        <div className="glass p-8 w-[400px] flex flex-col gap-4 text-right" dir="rtl">
          <h2 className="text-2xl font-bold text-[var(--color-cyan-primary)] mb-2">ثبت‌نام در خبرنامه</h2>
          <input
            type="text"
            placeholder="نام و نام خانوادگی"
            className="bg-white/5 border border-white/10 rounded-lg p-3 outline-none focus:border-[var(--color-cyan-primary)] transition-colors"
          />
          <input
            type="email"
            placeholder="ایمیل شما"
            className="bg-white/5 border border-white/10 rounded-lg p-3 outline-none focus:border-[var(--color-cyan-primary)] transition-colors"
          />
          <button className="bg-[var(--color-cta-green)] hover:bg-green-600 text-white font-bold py-3 rounded-lg transition-colors cursor-pointer">
            عضویت
          </button>
        </div>
      </Html>
    </group>
  );
}

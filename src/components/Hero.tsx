"use client";

import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { Float, Html, Text } from "@react-three/drei";
import * as THREE from "three";

export default function Hero() {
  const logoRef = useRef<THREE.Mesh>(null);
  const orbitRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (logoRef.current) {
      logoRef.current.rotation.y += 0.01;
      logoRef.current.position.y = Math.sin(state.clock.elapsedTime) * 0.2 + 2.2;
    }
    if (orbitRef.current) {
      orbitRef.current.rotation.y += 0.005;
    }
  });

  return (
    <group>
      {/* Animated Logo Proxy */}
      <mesh ref={logoRef} position={[0, 2.2, 0]}>
        <torusKnotGeometry args={[0.6, 0.2, 128, 16]} />
        <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} />
      </mesh>

      <Text
        position={[0, 0.2, 0]}
        fontSize={0.6}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        آتی‌سافت
      </Text>
      <Text
        position={[0, -0.5, 0]}
        fontSize={0.25}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        آینده طراحی و توسعه در دستان شما
      </Text>

      {/* Orbiting Social Icons */}
      <group ref={orbitRef} position={[0, 2.2, 0]}>
        <SocialIcon
          position={[2.5, 0, 0]}
          icon={
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
          }
          label="اینستاگرام"
        />
        <SocialIcon
          position={[-2.5, 0, 0]}
          icon={
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          }
          label="تلگرام"
        />
        <SocialIcon
          position={[0, 0, 2.5]}
          icon={
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
          }
          label="وب‌سایت"
        />
      </group>

      {/* Registration Form */}
      <Html position={[0, -2.8, 0]} center transform distanceFactor={3}>
        <div className="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 w-80 text-right shadow-2xl" dir="rtl">
          <h2 className="text-xl font-bold mb-4 text-white">درخواست مشاوره</h2>
          <div className="space-y-4">
            <input
              type="text"
              placeholder="نام و نام خانوادگی"
              className="w-full bg-black/30 border border-white/10 rounded-lg p-2 text-white placeholder-white/50 focus:outline-none focus:border-cyan-500 transition-colors"
            />
            <input
              type="email"
              placeholder="ایمیل یا شماره تماس"
              className="w-full bg-black/30 border border-white/10 rounded-lg p-2 text-white placeholder-white/50 focus:outline-none focus:border-cyan-500 transition-colors"
            />
            <button className="w-full bg-[#22C55E] hover:bg-[#1ea34d] text-white font-bold py-2 rounded-lg transition-all transform hover:scale-105">
              ارسال درخواست
            </button>
          </div>
        </div>
      </Html>
    </group>
  );
}

function SocialIcon({ position, icon, label }: { position: [number, number, number]; icon: React.ReactNode; label: string }) {
  return (
    <group position={position}>
      <Float speed={2} rotationIntensity={1} floatIntensity={1}>
        <Html center>
          <div className="flex flex-col items-center group cursor-pointer text-white">
            <div className="p-2 bg-white/10 rounded-full border border-white/20 group-hover:bg-[#00A4FF] group-hover:border-transparent transition-all duration-300">
              {icon}
            </div>
            <span className="text-[10px] mt-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">{label}</span>
          </div>
        </Html>
      </Float>
    </group>
  );
}

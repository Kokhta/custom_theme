"use client";

import { useFrame } from "@react-three/fiber";
import { Float, Html, Text, MeshDistortMaterial } from "@react-three/drei";
import { useRef, useMemo } from "react";
import * as THREE from "three";
interface HeroProps {
  position: [number, number, number];
}

export default function Hero({ position }: HeroProps) {
  const logoRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (logoRef.current) {
      const t = state.clock.getElapsedTime();
      logoRef.current.position.y = Math.sin(t) * 0.2;
      logoRef.current.rotation.y = t * 0.5;
    }
  });

  const socialIcons = [
    {
      icon: (
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
      ),
      label: "تلگرام"
    },
    {
      icon: (
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
      ),
      label: "اینستاگرام"
    },
    {
      icon: (
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg>
      ),
      label: "توییتر"
    },
    {
      icon: (
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
      ),
      label: "وب‌سایت"
    },
  ];

  return (
    <group position={position}>
      {/* 3D Logo Placeholder (Icosahedron for tech look) */}
      <group ref={logoRef}>
        <mesh>
          <icosahedronGeometry args={[2, 15]} />
          <MeshDistortMaterial
            color="#00A4FF"
            speed={2}
            distort={0.3}
            radius={1}
          />
        </mesh>
        <Text
          position={[0, 0, 2.1]}
          fontSize={0.5}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
      </group>

      {/* Orbiting Icons */}
      {socialIcons.map((item, idx) => (
        <Float key={idx} speed={2} rotationIntensity={1} floatIntensity={1}>
          <Html
            position={[
              Math.cos((idx / socialIcons.length) * Math.PI * 2) * 4,
              Math.sin((idx / socialIcons.length) * Math.PI * 2) * 4,
              0
            ]}
            center
          >
            <div className="p-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-primary-cyan transition-colors cursor-pointer">
              {item.icon}
            </div>
          </Html>
        </Float>
      ))}

      {/* Registration Form Overlay */}
      <Html position={[0, -5, 0]} center>
        <div className="glass p-8 rounded-2xl w-[350px] md:w-[450px] flex flex-col gap-4 animate-in fade-in slide-in-from-bottom-4 duration-1000">
          <h2 className="text-2xl font-bold text-white text-center">مشاوره رایگان</h2>
          <input
            type="text"
            placeholder="نام و نام خانوادگی"
            className="bg-white/5 border border-white/10 rounded-lg p-3 text-white focus:outline-none focus:border-primary-cyan transition-colors"
          />
          <input
            type="tel"
            placeholder="شماره تماس"
            className="bg-white/5 border border-white/10 rounded-lg p-3 text-white focus:outline-none focus:border-primary-cyan transition-colors"
          />
          <button className="bg-cta-green hover:bg-green-600 text-white font-bold py-3 rounded-lg transition-colors">
            ثبت درخواست
          </button>
        </div>
      </Html>
    </group>
  );
}

"use client";

import React, { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Float, Html } from "@react-three/drei";
import { useSpring, animated } from "@react-spring/three";
import * as THREE from "three";

// Pre-define colors
const primaryCyan = "#00A4FF";
const deepBlue = "#004E8C";
const white = "#FFFFFF";

export default function HeroSection() {
  const logoGroupRef = useRef<THREE.Group>(null);
  const orbitalRef = useRef<THREE.Group>(null);
  const [formSubmitted, setFormSubmitted] = useState(false);
  const [name, setName] = useState("");
  const [phone, setPhone] = useState("");

  // Spring animation for Logo continuous pulsing/floating up & down
  const { logoScale } = useSpring({
    from: { logoScale: 1.0 },
    to: async (next) => {
      while (true) {
        await next({ logoScale: 1.15 });
        await next({ logoScale: 1.0 });
      }
    },
    config: { mass: 2, tension: 120, friction: 14 },
  });

  // Rotate orbital and animate floating logo inside useFrame
  useFrame((state) => {
    const elapsed = state.clock.getElapsedTime();

    if (logoGroupRef.current) {
      // Float up and down smoothly
      logoGroupRef.current.position.y = Math.sin(elapsed * 1.5) * 0.45;
      logoGroupRef.current.rotation.y = elapsed * 0.3;
    }

    if (orbitalRef.current) {
      // Rotation of orbital social icons around logo
      orbitalRef.current.rotation.y = -elapsed * 0.4;
    }
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (name && phone) {
      setFormSubmitted(true);
    }
  };

  return (
    <group>
      {/* 1. Centered 3D Procedural Logo simulating logo.glb */}
      <animated.group
        ref={logoGroupRef}
        scale={logoScale as any}
        position={[0, 1.5, 0]}
      >
        {/* Core Center - Glowing Cyan Icosahedron */}
        <mesh castShadow receiveShadow>
          <icosahedronGeometry args={[1, 1]} />
          <meshStandardMaterial
            color={primaryCyan}
            emissive={primaryCyan}
            emissiveIntensity={0.6}
            roughness={0.1}
            metalness={0.9}
            flatShading
          />
        </mesh>

        {/* Glossy inner core */}
        <mesh>
          <sphereGeometry args={[0.5, 32, 32]} />
          <meshStandardMaterial
            color={deepBlue}
            roughness={0.0}
            metalness={0.8}
            transparent
            opacity={0.8}
          />
        </mesh>

        {/* Orbiting Ring (part of Logo) */}
        <mesh rotation={[Math.PI / 3, 0, 0]}>
          <torusGeometry args={[1.5, 0.08, 16, 100]} />
          <meshStandardMaterial
            color={white}
            emissive={primaryCyan}
            emissiveIntensity={0.2}
            roughness={0.2}
          />
        </mesh>
      </animated.group>

      {/* 2. Floating social icons orbiting around the logo */}
      <group ref={orbitalRef} position={[0, 1.5, 0]}>
        {/* Telegram Icon Orbiting */}
        <Float speed={2} rotationIntensity={1} floatIntensity={1}>
          <mesh position={[2.8, 0, 1.5]} scale={0.4}>
            <sphereGeometry args={[0.6, 16, 16]} />
            <meshStandardMaterial color="#0088cc" emissive="#0088cc" emissiveIntensity={0.3} roughness={0.1} />
            <Html distanceFactor={10} center>
              <div
                style={{ width: "80px" }}
                className="bg-[#0088cc]/90 text-white text-[10px] px-2 py-0.5 rounded-full font-sans shadow-lg pointer-events-none select-none text-center"
              >
                تلگرام
              </div>
            </Html>
          </mesh>
        </Float>

        {/* Instagram Icon Orbiting */}
        <Float speed={2.5} rotationIntensity={1.2} floatIntensity={1.2}>
          <mesh position={[-2.8, 0.5, -1.5]} scale={0.4}>
            <boxGeometry args={[1, 1, 1]} />
            <meshStandardMaterial color="#e1306c" emissive="#e1306c" emissiveIntensity={0.3} roughness={0.1} />
            <Html distanceFactor={10} center>
              <div
                style={{ width: "80px" }}
                className="bg-[#e1306c]/90 text-white text-[10px] px-2 py-0.5 rounded-full font-sans shadow-lg pointer-events-none select-none text-center"
              >
                اینستاگرام
              </div>
            </Html>
          </mesh>
        </Float>

        {/* Linkedin/Web Icon Orbiting */}
        <Float speed={1.8} rotationIntensity={0.8} floatIntensity={0.9}>
          <mesh position={[0, -0.8, -2.8]} scale={0.4}>
            <octahedronGeometry args={[0.7]} />
            <meshStandardMaterial color={primaryCyan} emissive={primaryCyan} emissiveIntensity={0.3} roughness={0.1} />
            <Html distanceFactor={10} center>
              <div
                style={{ width: "80px" }}
                className="bg-[#0077b5]/90 text-white text-[10px] px-2 py-0.5 rounded-full font-sans shadow-lg pointer-events-none select-none text-center"
              >
                لینکدین
              </div>
            </Html>
          </mesh>
        </Float>
      </group>

      {/* 3. Floating glassmorphism registration form HTML overlay via <Html> */}
      <Html
        position={[0, -2.5, 0]}
        center
        distanceFactor={11}
        pointerEvents="auto"
      >
        <div
          dir="rtl"
          style={{ width: "350px" }}
          className="backdrop-blur-xl bg-slate-950/70 border border-white/10 rounded-2xl p-6 shadow-[0_0_50px_-12px_rgba(0,164,255,0.25)] text-right"
        >
          {/* Main Title */}
          <h2 className="text-white text-xl font-bold mb-1 font-sans text-center">
            آژانس طراحی خلاق <span className="text-[#00A4FF]">آتی‌سافت</span>
          </h2>
          <p className="text-white/60 text-xs mb-5 font-sans text-center">
            پیاده‌سازی ایده‌های بلندپروازانه شما در قالب هنر و تکنولوژی ۳ بعدی
          </p>

          {formSubmitted ? (
            <div className="flex flex-col items-center justify-center py-6 text-center animate-fade-in">
              <div className="w-12 h-12 bg-emerald-500/10 border border-emerald-500/20 rounded-full flex items-center justify-center mb-3">
                <svg className="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p className="text-white text-sm font-semibold font-sans">
                درخواست شما با موفقیت ثبت شد!
              </p>
              <p className="text-white/50 text-[11px] font-sans mt-1">
                کارشناسان آتی‌سافت به‌زودی با شما تماس خواهند گرفت.
              </p>
            </div>
          ) : (
            <form onSubmit={handleSubmit} className="flex flex-col gap-3 font-sans">
              <div>
                <label className="block text-[11px] text-white/70 mb-1 mr-1">نام و نام خانوادگی</label>
                <input
                  type="text"
                  required
                  placeholder="مثال: سهراب سپهری"
                  value={name}
                  onChange={(e) => setName(e.target.value)}
                  className="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-white text-xs focus:outline-none focus:border-[#00A4FF] transition"
                />
              </div>

              <div>
                <label className="block text-[11px] text-white/70 mb-1 mr-1">شماره تماس (همراه)</label>
                <input
                  type="tel"
                  required
                  placeholder="مثال: ۰۹۱۲۳۴۵۶۷۸۹"
                  value={phone}
                  onChange={(e) => setPhone(e.target.value)}
                  className="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-white text-xs text-left focus:outline-none focus:border-[#00A4FF] transition"
                />
              </div>

              <button
                type="submit"
                className="w-full bg-[#22C55E] hover:bg-[#1ebd56] text-white text-xs font-bold py-2.5 rounded-lg mt-2 transition shadow-[0_0_15px_rgba(34,197,94,0.3)] cursor-pointer"
              >
                ثبت درخواست مشاوره رایگان
              </button>
            </form>
          )}
        </div>
      </Html>
    </group>
  );
}

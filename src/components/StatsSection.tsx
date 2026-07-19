"use client";

import React, { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { Html, useScroll } from "@react-three/drei";
import * as THREE from "three";

interface StatItem {
  number: string;
  label: string;
  sub: string;
  color: string;
}

const STATS_DATA: StatItem[] = [
  {
    number: "۱۳۹۸",
    label: "سال تاسیس آتی‌سافت",
    sub: "بیش از ۵ سال تجربه نوآوری",
    color: "#00A4FF",
  },
  {
    number: "۳",
    label: "دفاتر و شعب فعال",
    sub: "تهران، دبی و استانبول",
    color: "#22C55E",
  },
  {
    number: "۹۵",
    label: "رضایت مشتریان دائم",
    sub: "بر اساس آخرین نظرسنجی سالانه",
    color: "#ffffff",
  },
  {
    number: "۷",
    label: "پلتفرم و محصول بومی",
    sub: "طراحی شده با تکنولوژی WebGL",
    color: "#004E8C",
  },
];

export default function StatsSection() {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);
  const cardRefs = useRef<(THREE.Group | null)[]>([]);

  useFrame((state) => {
    const time = state.clock.getElapsedTime();

    // Calculate section scroll range (Y = -60 is roughly 0.55 to 0.80 depth)
    // scroll.range returns a value between 0 and 1
    const sectionProgress = scroll.range(0.55, 0.22);

    // Apply "explode/fly-in" animation based on scroll progress
    STATS_DATA.forEach((_, i) => {
      const card = cardRefs.current[i];
      if (card) {
        // When not in viewport (progress = 0), fly-in Y offset is high. Settle to 0 as progress goes to 1.
        // We want a staggered effect where they drop one by one.
        const staggerDelay = i * 0.12;
        const cardProgress = Math.min(1, Math.max(0, (sectionProgress - staggerDelay) / (1 - staggerDelay)));

        // Settle from +12 Y-offset to 0 Y-offset
        const targetY = (1 - cardProgress) * 15;
        // Settle scale from 0.2 to 1.0
        const targetScale = 0.2 + cardProgress * 0.8;
        // Fade in from transparent to opaque
        const targetOpacity = cardProgress;

        card.position.y = THREE.MathUtils.lerp(card.position.y, targetY, 0.1);
        card.scale.setScalar(THREE.MathUtils.lerp(card.scale.x, targetScale, 0.1));

        // Add subtle continuous floating rotation when settled
        if (cardProgress > 0.9) {
          card.rotation.y = Math.sin(time * 1.2 + i) * 0.08;
          card.rotation.x = Math.cos(time * 0.8 + i) * 0.05;
        } else {
          card.rotation.set(0, 0, 0);
        }
      }
    });

    if (groupRef.current) {
      // Bob entire section slightly
      groupRef.current.position.y = -60 + Math.sin(time * 0.5) * 0.15;
    }
  });

  return (
    <group ref={groupRef} position={[0, -60, 0]}>
      {/* Title */}
      <Html position={[0, 6.2, 0]} center distanceFactor={10}>
        <div className="text-center select-none" dir="rtl">
          <span className="text-brand-cyan text-xs font-bold tracking-widest uppercase bg-brand-cyan/10 px-3.5 py-1.5 rounded-full border border-brand-cyan/20">آمار و ارقام</span>
          <h2 className="text-3xl md:text-4xl font-extrabold text-white mt-4 drop-shadow-[0_4px_10px_rgba(0,164,255,0.25)]">
            کارنامه موفق آتی‌سافت در یک نگاه
          </h2>
          <p className="text-xs md:text-sm text-slate-400 mt-2 max-w-[420px] mx-auto leading-relaxed">
            ورود به این بخش باعث پرواز اعداد و فرود آنها بر روی داشبورد شیشه‌ای آتی‌سافت می‌شود.
          </p>
        </div>
      </Html>

      {/* Curved dashboard backplate (primitive stats_panel.glb representation) */}
      <mesh receiveShadow position={[0, -0.5, -1.5]} rotation={[0, 0, 0]}>
        <boxGeometry args={[11.5, 3.8, 0.35]} />
        <meshStandardMaterial
          color="#0f172a"
          roughness={0.15}
          metalness={0.9}
          transparent
          opacity={0.8}
        />
      </mesh>

      {/* Decorative cybernetic lines behind dashboard */}
      <mesh position={[0, -0.5, -1.6]}>
        <boxGeometry args={[11.7, 4.0, 0.1]} />
        <meshStandardMaterial
          color="#00A4FF"
          emissive="#00A4FF"
          emissiveIntensity={0.3}
          wireframe
        />
      </mesh>

      {/* Four Dashboard Metric Cards */}
      {STATS_DATA.map((stat, i) => {
        // Space them horizontally
        const xPos = -4.5 + i * 3.0;

        return (
          <group
            key={stat.label}
            ref={(el) => {
              cardRefs.current[i] = el;
            }}
            position={[xPos, 15, 0.2]} // Initial spawn Y is high (will fly down)
          >
            {/* 3D Glass panel background for each card */}
            <mesh castShadow receiveShadow>
              <boxGeometry args={[2.4, 2.8, 0.2]} />
              <meshStandardMaterial
                color="#1e293b"
                roughness={0.05}
                metalness={0.95}
                transparent
                opacity={0.7}
              />
            </mesh>

            {/* Neon Accent Border */}
            <mesh position={[0, 0, -0.05]}>
              <boxGeometry args={[2.5, 2.9, 0.1]} />
              <meshStandardMaterial
                color={stat.color}
                emissive={stat.color}
                emissiveIntensity={0.5}
                transparent
                opacity={0.6}
              />
            </mesh>

            {/* Metric Content Overlaid inside HTML */}
            <Html transform distanceFactor={5.0} position={[0, 0, 0.12]} center occlude>
              <div
                className="flex flex-col items-center justify-center p-4 w-[160px] h-[200px] select-none text-center pointer-events-none"
                dir="rtl"
              >
                {/* Neon Number Glow */}
                <div
                  className="text-4xl font-extrabold tracking-tight mb-2 select-none"
                  style={{
                    color: stat.color,
                    textShadow: `0 0 15px ${stat.color}80, 0 0 30px ${stat.color}40`,
                  }}
                >
                  {stat.number}
                </div>

                {/* Horizontal divider */}
                <div className="w-12 h-[2px] bg-white/20 rounded-full mb-3" />

                <div className="text-white font-bold text-xs leading-snug mb-1">
                  {stat.label}
                </div>
                <div className="text-slate-400 text-[9px] font-light leading-relaxed">
                  {stat.sub}
                </div>
              </div>
            </Html>
          </group>
        );
      })}
    </group>
  );
}

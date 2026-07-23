"use client";

import React, { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { useScroll, Html } from "@react-three/drei";
import * as THREE from "three";

// Colors definitions
const primaryCyan = "#00A4FF";
const deepBlue = "#004E8C";

// Stats numbers: "۱۳۹۸" (Start Year), "۳" (Branches), "۹۵" (Projects), "۷" (Country Rank)
const statsData = [
  { value: "۱۳۹۸", label: "سال تاسیس آتی‌سافت", emoji: "📅" },
  { value: "۳", label: "شعبه‌های بین‌المللی", emoji: "🏢" },
  { value: "۹۵+", label: "پروژه موفق تحت وب", emoji: "🚀" },
  { value: "۷", label: "رتبه کشوری خدمات خلاق", emoji: "🏆" },
];

export default function StatsSection() {
  const scroll = useScroll();
  const dashboardRef = useRef<THREE.Group>(null);

  // Array of refs for each stat item to control fly-in explode animation
  const itemsRefs = useRef<Array<THREE.Group | null>>([]);

  useFrame((state) => {
    // Scroll offset (0 to 1)
    const r = scroll.offset;

    // We target StatsSection between scroll offset 0.55 to 0.78
    // Let's compute a local activation progress (0 to 1)
    const statsStart = 0.52;
    const statsEnd = 0.76;

    let progress = 0;
    if (r > statsStart && r < statsEnd) {
      progress = (r - statsStart) / (statsEnd - statsStart);
    } else if (r >= statsEnd) {
      progress = 1.0;
    }

    // Gentle floating for the curved dashboard panel
    if (dashboardRef.current) {
      dashboardRef.current.position.y = Math.sin(state.clock.getElapsedTime() * 1.2) * 0.25;
      dashboardRef.current.rotation.y = Math.sin(state.clock.getElapsedTime() * 0.4) * 0.05;
    }

    // "Explode / Fly-in" scroll-triggered animation
    // When section is not yet entered (progress == 0), the numbers fly in from top (high Y, rotated)
    // As progress goes from 0 to 1, they settle neatly onto their dashboard spots
    itemsRefs.current.forEach((item, idx) => {
      if (item) {
        // Individual offsets to stagger the entries
        const staggerFactor = idx * 0.12;
        const localProgress = Math.min(1.0, Math.max(0.0, (progress - staggerFactor) / (1.0 - staggerFactor)));

        // Smooth easing
        const t = THREE.MathUtils.smoothstep(localProgress, 0, 1);

        // Fly in parameters:
        // Position: fly from y = +7 to y = 0
        item.position.y = THREE.MathUtils.lerp(7, 0, t);
        // Position X offset: fly in towards center slot
        const baseOffsetDirection = idx % 2 === 0 ? -1.5 : 1.5;
        item.position.x = THREE.MathUtils.lerp(baseOffsetDirection * (4 - idx), 0, t);

        // Rotation: spinning into place
        item.rotation.x = THREE.MathUtils.lerp(Math.PI * 1.5, 0, t);
        item.rotation.y = THREE.MathUtils.lerp(Math.PI * 1.0, 0, t);

        // Scale: pop up scale
        const scaleVal = THREE.MathUtils.lerp(0.1, 1.0, t);
        item.scale.set(scaleVal, scaleVal, scaleVal);
      }
    });
  });

  return (
    <group>
      {/* Visual Header */}
      <Html
        position={[0, 4.5, 0]}
        center
        distanceFactor={11}
        pointerEvents="none"
        className="select-none text-center"
      >
        <div dir="rtl" style={{ width: "300px" }} className="font-sans">
          <span className="text-[#00A4FF] text-[10px] font-bold tracking-[0.25em] uppercase">کارنامه و آمار</span>
          <h2 className="text-white text-2xl font-extrabold mt-1">افتخارات آتی‌سافت در یک نگاه</h2>
        </div>
      </Html>

      {/* Curved Dashboard Platform (Dashboard Base panel representing stats_panel.glb) */}
      <group ref={dashboardRef}>
        {/* Curved backdrop panel */}
        <mesh position={[0, -0.5, -1.5]} castShadow receiveShadow>
          <cylinderGeometry args={[8, 8.2, 3.8, 32, 1, true, -Math.PI / 3, Math.PI * 2 / 3]} />
          <meshStandardMaterial
            color={deepBlue}
            roughness={0.15}
            metalness={0.9}
            side={THREE.DoubleSide}
            transparent
            opacity={0.85}
          />
        </mesh>

        {/* Dashboard bottom curved floor ledge */}
        <mesh position={[0, -2.4, -1.2]} rotation={[Math.PI / 2, 0, 0]} receiveShadow>
          <torusGeometry args={[8, 0.2, 16, 100, Math.PI * 2 / 3]} />
          <meshStandardMaterial
            color={primaryCyan}
            emissive={primaryCyan}
            emissiveIntensity={0.3}
            roughness={0.1}
          />
        </mesh>

        {/* 4 Stat panels positioned across the dashboard curve */}
        {statsData.map((stat, idx) => {
          // Space out the 4 stats panels horizontally on the dashboard
          const xPos = -4.8 + idx * 3.2;
          const zPos = -Math.cos((idx - 1.5) * 0.4) * 0.5;

          return (
            <group
              key={idx}
              position={[xPos, 0, zPos]}
              ref={(el) => {
                itemsRefs.current[idx] = el;
              }}
            >
              {/* Individual 3D curved frame dashboard module */}
              <mesh castShadow receiveShadow>
                <boxGeometry args={[2.5, 3.2, 0.2]} />
                <meshStandardMaterial
                  color="#030712"
                  roughness={0.2}
                  metalness={0.8}
                  transparent
                  opacity={0.9}
                  emissive={primaryCyan}
                  emissiveIntensity={0.05}
                />
              </mesh>

              {/* Glowing status light on each frame */}
              <mesh position={[0, 1.4, 0.11]}>
                <sphereGeometry args={[0.08, 16, 16]} />
                <meshBasicMaterial color={primaryCyan} />
              </mesh>

              {/* HTML Stat Counter details & typography */}
              <Html
                position={[0, 0, 0.12]}
                transform
                distanceFactor={4.5}
                pointerEvents="none"
                className="select-none"
              >
                <div
                  dir="rtl"
                  style={{ width: "180px" }}
                  className="flex flex-col items-center justify-between h-[180px] p-3 text-center font-sans"
                >
                  {/* Decorative Icon */}
                  <span className="text-2xl mt-1 filter drop-shadow-[0_0_8px_rgba(0,164,255,0.3)]">
                    {stat.emoji}
                  </span>

                  {/* Big Number - simulates 3D Text counter perfectly aligned */}
                  <div className="flex flex-col items-center">
                    <span className="text-4xl font-extrabold text-[#00A4FF] tracking-tight font-sans select-none animate-pulse">
                      {stat.value}
                    </span>
                    <div className="w-12 h-0.5 bg-gradient-to-r from-transparent via-[#00A4FF] to-transparent mt-1" />
                  </div>

                  {/* Metric Label */}
                  <span className="text-[10px] text-white/70 leading-relaxed font-bold mb-1">
                    {stat.label}
                  </span>
                </div>
              </Html>
            </group>
          );
        })}
      </group>
    </group>
  );
}

"use client";

import React, { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Html } from "@react-three/drei";
import * as THREE from "three";

interface ClientBrand {
  name: string;
  engName: string;
  color: string;
  logoSvg: React.ReactNode;
}

const BRANDS: ClientBrand[] = [
  {
    name: "دیجی‌کالا",
    engName: "Digikala",
    color: "#ED2024",
    logoSvg: (
      <svg className="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
      </svg>
    ),
  },
  {
    name: "اسنپ",
    engName: "Snapp",
    color: "#22C55E",
    logoSvg: (
      <svg className="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
      </svg>
    ),
  },
  {
    name: "دیوار",
    engName: "Divar",
    color: "#A62626",
    logoSvg: (
      <svg className="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
      </svg>
    ),
  },
  {
    name: "تپسی",
    engName: "Tapsi",
    color: "#FF5722",
    logoSvg: (
      <svg className="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z" />
      </svg>
    ),
  },
  {
    name: "آپارات",
    engName: "Aparat",
    color: "#DF0054",
    logoSvg: (
      <svg className="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
        <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
      </svg>
    ),
  },
  {
    name: "بازار",
    engName: "CafeBazaar",
    color: "#178E3B",
    logoSvg: (
      <svg className="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
      </svg>
    ),
  },
];

export default function ClientsSection() {
  const carouselRef = useRef<THREE.Group>(null);
  const targetRotationY = useRef(0);
  const isDragging = useRef(false);
  const prevPointerX = useRef(0);

  const radius = 5.0; // Radius of the 3D Cylinder
  const count = BRANDS.length;

  // Track dragging to spin carousel
  const handlePointerDown = (e: any) => {
    e.stopPropagation();
    isDragging.current = true;
    prevPointerX.current = e.clientX || (e.touches && e.touches[0].clientX) || 0;
  };

  const handlePointerMove = (e: any) => {
    if (!isDragging.current) return;
    e.stopPropagation();
    const currentX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
    const deltaX = currentX - prevPointerX.current;

    // Rotate 3D cylinder based on dragging speed
    targetRotationY.current += deltaX * 0.008;
    prevPointerX.current = currentX;
  };

  const handlePointerUp = () => {
    isDragging.current = false;
  };

  useFrame((state) => {
    const time = state.clock.getElapsedTime();

    if (carouselRef.current) {
      // If NOT dragging, spin slowly automatically
      if (!isDragging.current) {
        targetRotationY.current += 0.003;
      }

      // Smooth lerp to target rotation
      carouselRef.current.rotation.y = THREE.MathUtils.lerp(
        carouselRef.current.rotation.y,
        targetRotationY.current,
        0.08
      );

      // Slight wavy bobbing motion
      carouselRef.current.position.y = -40 + Math.sin(time * 0.8) * 0.2;
    }
  });

  return (
    <group position={[0, -40, 0]}>
      {/* Title */}
      <Html position={[0, 6.2, 0]} center distanceFactor={10}>
        <div className="text-center select-none" dir="rtl">
          <span className="text-brand-cyan text-xs font-bold tracking-widest uppercase bg-brand-cyan/10 px-3.5 py-1.5 rounded-full border border-brand-cyan/20">همکاران ما</span>
          <h2 className="text-3xl md:text-4xl font-extrabold text-white mt-4 drop-shadow-[0_4px_10px_rgba(0,164,255,0.25)]">
            مشتریان ارزشمند آتی‌سافت
          </h2>
          <p className="text-xs md:text-sm text-slate-400 mt-2 max-w-[420px] mx-auto">
            کشیدن ماوس به چپ یا راست باعث چرخش سه‌بعدی زنجیره مشتریان ما می‌شود.
          </p>
        </div>
      </Html>

      {/* Invisible Interactive Zone for Dragging */}
      <mesh
        position={[0, 0, 0]}
        onPointerDown={handlePointerDown}
        onPointerMove={handlePointerMove}
        onPointerUp={handlePointerUp}
        onPointerOut={handlePointerUp}
      >
        <sphereGeometry args={[radius + 1.2, 16, 16]} />
        <meshBasicMaterial visible={false} />
      </mesh>

      {/* 3D Rotating Carousel Cylinder */}
      <group
        ref={carouselRef}
        onPointerDown={handlePointerDown}
        onPointerMove={handlePointerMove}
        onPointerUp={handlePointerUp}
        onPointerOut={handlePointerUp}
      >
        {BRANDS.map((brand, i) => {
          const angle = (i / count) * Math.PI * 2;
          const x = Math.sin(angle) * radius;
          const z = Math.cos(angle) * radius;

          return (
            <group key={brand.engName} position={[x, 0, z]} rotation={[0, angle, 0]}>
              {/* Rounded 3D Box Plate representing logo card */}
              <mesh castShadow receiveShadow>
                <boxGeometry args={[1.9, 2.5, 0.25]} />
                <meshStandardMaterial
                  color="#0f172a"
                  roughness={0.1}
                  metalness={0.95}
                  envMapIntensity={1}
                />
              </mesh>

              {/* Glowing Outline Ring */}
              <mesh position={[0, 0, -0.01]}>
                <boxGeometry args={[2.0, 2.6, 0.2]} />
                <meshStandardMaterial
                  color={brand.color}
                  emissive={brand.color}
                  emissiveIntensity={0.6}
                  transparent
                  opacity={0.8}
                />
              </mesh>

              {/* Floating SVG Brand Contents via HTML Overlay */}
              <Html transform distanceFactor={5.5} position={[0, 0, 0.14]} center occlude>
                <div
                  className="flex flex-col items-center justify-center p-3 select-none pointer-events-none w-[110px] h-[150px]"
                  style={{ color: brand.color }}
                >
                  <div className="p-3 bg-white/5 rounded-2xl border border-white/10 shadow-lg text-white mb-2">
                    {brand.logoSvg}
                  </div>
                  <span className="text-white font-bold text-xs">{brand.name}</span>
                  <span className="text-slate-400 text-[9px] mt-0.5 tracking-wider uppercase">
                    {brand.engName}
                  </span>
                </div>
              </Html>
            </group>
          );
        })}
      </group>

      {/* Decorative center glowing platform inside cylinder */}
      <mesh position={[0, -2.0, 0]} rotation={[-Math.PI / 2, 0, 0]}>
        <cylinderGeometry args={[2.8, 3.2, 0.4, 32]} />
        <meshStandardMaterial
          color="#004E8C"
          emissive="#004E8C"
          emissiveIntensity={0.3}
          roughness={0}
        />
      </mesh>
    </group>
  );
}

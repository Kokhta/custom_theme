"use client";

import React, { useRef, useState } from "react";
import { useFrame, useThree } from "@react-three/fiber";
import { RoundedBox, Html } from "@react-three/drei";
import * as THREE from "three";

// client data with colors, names and visual placeholder styling
const clients = [
  { name: "دیجی‌کالا", color: "#ED2024", emoji: "🛒", description: "بزرگترین فروشگاه اینترنتی" },
  { name: "اسنپ", color: "#22C55E", emoji: "🚗", description: "سامانه هوشمند حمل و نقل" },
  { name: "تپسی", color: "#FF5E00", emoji: "🚕", description: "تاکسی اینترنتی مدرن" },
  { name: "آپارات", color: "#DF0054", emoji: "📺", description: "سرویس اشتراک ویدیو" },
  { name: "دیوار", color: "#A62626", emoji: "🧱", description: "نیازمندی‌های آنلاین" },
  { name: "کافه‌بازار", color: "#16A34A", emoji: "🟩", description: "فروشگاه نرم‌افزار اندروید" },
];

export default function ClientSection() {
  const carouselRef = useRef<THREE.Group>(null);
  const { size } = useThree();
  const [isDragging, setIsDragging] = useState(false);
  const pointerStartX = useRef(0);
  const rotationStartX = useRef(0);
  const velocity = useRef(0);

  // Radius of the cylinder carousel layout
  const radius = 5.5;

  // Track Pointer drag on the carousel
  const handlePointerDown = (e: any) => {
    e.stopPropagation();
    setIsDragging(true);
    pointerStartX.current = e.clientX || (e.touches && e.touches[0].clientX) || 0;
    if (carouselRef.current) {
      rotationStartX.current = carouselRef.current.rotation.y;
    }
    velocity.current = 0;
  };

  const handlePointerMove = (e: any) => {
    if (!isDragging || !carouselRef.current) return;
    const clientX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
    const deltaX = clientX - pointerStartX.current;

    // Scale dragging speed by size of screen
    const factor = (Math.PI * 2) / size.width;
    const targetRotation = rotationStartX.current + deltaX * factor * 1.5;

    const prevRotation = carouselRef.current.rotation.y;
    carouselRef.current.rotation.y = targetRotation;

    // Calculate simple swipe velocity
    velocity.current = targetRotation - prevRotation;
  };

  const handlePointerUpOrLeave = () => {
    setIsDragging(false);
  };

  useFrame(() => {
    if (carouselRef.current) {
      if (!isDragging) {
        // Continuous slow rotation
        carouselRef.current.rotation.y += 0.003;

        // Add velocity inertia
        carouselRef.current.rotation.y += velocity.current;
        velocity.current *= 0.92; // Friction damping
      } else {
        velocity.current *= 0.5; // Damping during dragging
      }
    }
  });

  return (
    <group position={[0, 0, 0]}>
      {/* Visual Header */}
      <Html
        position={[0, 4.0, 0]}
        center
        distanceFactor={11}
        pointerEvents="none"
        className="select-none text-center"
      >
        <div dir="rtl" style={{ width: "300px" }} className="font-sans">
          <span className="text-[#00A4FF] text-[10px] font-bold tracking-[0.25em] uppercase">اعتماد برندها</span>
          <h2 className="text-white text-2xl font-extrabold mt-1">همکاران و مشتریان ما</h2>
          <p className="text-white/50 text-xs mt-1">جهت چرخش، کاروسل را با ماوس بکشید</p>
        </div>
      </Html>

      {/* Interactive 3D Cylinder Carousel */}
      <group
        ref={carouselRef}
        position={[0, -0.5, 0]}
        onPointerDown={handlePointerDown}
        onPointerMove={handlePointerMove}
        onPointerUp={handlePointerUpOrLeave}
        onPointerLeave={handlePointerUpOrLeave}
      >
        {clients.map((client, idx) => {
          const angle = (idx / clients.length) * Math.PI * 2;
          const x = Math.sin(angle) * radius;
          const z = Math.cos(angle) * radius;

          return (
            <group
              key={idx}
              position={[x, 0, z]}
              rotation={[0, angle + Math.PI, 0]}
            >
              {/* RoundedBox representing the custom textured client card */}
              <RoundedBox
                args={[2.2, 3.0, 0.25]} // Width, Height, Depth
                radius={0.12} // Corner radius
                smoothness={4}
                castShadow
                receiveShadow
              >
                <meshStandardMaterial
                  color="#0a0f24"
                  roughness={0.2}
                  metalness={0.8}
                  emissive={client.color}
                  emissiveIntensity={0.12}
                />
              </RoundedBox>

              {/* Decorative inner panel with client identity details */}
              <mesh position={[0, 0, 0.13]}>
                <planeGeometry args={[2.0, 2.8]} />
                <meshStandardMaterial
                  color="#111827"
                  transparent
                  opacity={0.9}
                  roughness={0.1}
                />
              </mesh>

              {/* HTML Logo Content Layer */}
              <Html
                position={[0, 0, 0.16]}
                transform
                distanceFactor={4.5}
                pointerEvents="none"
                className="select-none"
              >
                <div
                  dir="rtl"
                  style={{ width: "180px" }}
                  className="flex flex-col items-center justify-between h-[220px] p-4 text-center font-sans"
                >
                  {/* Glowing icon circle of client */}
                  <div
                    className="w-14 h-14 rounded-full flex items-center justify-center text-3xl shadow-lg border"
                    style={{
                      backgroundColor: `${client.color}15`,
                      borderColor: `${client.color}40`,
                    }}
                  >
                    {client.emoji}
                  </div>

                  {/* Client Name */}
                  <div className="flex flex-col gap-1">
                    <h4 className="text-white text-base font-extrabold tracking-wide">
                      {client.name}
                    </h4>
                    <p className="text-[10px] text-white/50 leading-relaxed font-medium">
                      {client.description}
                    </p>
                  </div>

                  {/* Technology Badge */}
                  <div className="text-[9px] bg-white/5 text-[#00A4FF] border border-[#00A4FF]/20 rounded px-2 py-0.5 uppercase tracking-wider font-mono font-bold">
                    Partnership
                  </div>
                </div>
              </Html>
            </group>
          );
        })}
      </group>
    </group>
  );
}

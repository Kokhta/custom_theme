"use client";

import React, { useState, useRef, useMemo } from "react";
import { useFrame } from "@react-three/fiber";
import { RoundedBox, Html } from "@react-three/drei";
import * as THREE from "three";

interface ScreenProps {
  position: [number, number, number];
  title: string;
  category: string;
  link: string;
  glowColor: string;
}

function PortfolioScreen({ position, title, category, link, glowColor }: ScreenProps) {
  const [hovered, setHovered] = useState(false);
  const meshRef = useRef<THREE.Group>(null);

  // Dynamic procedural placeholder canvas texture
  const dynamicTexture = useMemo(() => {
    if (typeof window === "undefined") return null;
    const canvas = document.createElement("canvas");
    canvas.width = 512;
    canvas.height = 340;
    const ctx = canvas.getContext("2d");
    if (ctx) {
      // Dark futuristic overlay gradient
      const grad = ctx.createLinearGradient(0, 0, 512, 340);
      grad.addColorStop(0, "#020617");
      grad.addColorStop(1, "#0f172a");
      ctx.fillStyle = grad;
      ctx.fillRect(0, 0, 512, 340);

      // Neon grid visualizer
      ctx.strokeStyle = "#1e293b";
      ctx.lineWidth = 2;
      for (let i = 0; i < 512; i += 40) {
        ctx.beginPath();
        ctx.moveTo(i, 0);
        ctx.lineTo(i, 340);
        ctx.stroke();
      }
      for (let j = 0; j < 340; j += 40) {
        ctx.beginPath();
        ctx.moveTo(0, j);
        ctx.lineTo(512, j);
        ctx.stroke();
      }

      // Glowing dot grid
      ctx.fillStyle = glowColor;
      for (let i = 20; i < 512; i += 80) {
        for (let j = 20; j < 340; j += 80) {
          ctx.beginPath();
          ctx.arc(i, j, 4, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      // Title & category styling
      ctx.fillStyle = "#ffffff";
      ctx.font = "bold 38px Vazirmatn, Arial";
      ctx.textAlign = "center";
      ctx.textBaseline = "middle";
      ctx.fillText(title, 256, 150);

      ctx.fillStyle = glowColor;
      ctx.font = "24px Courier New, monospace";
      ctx.fillText(category, 256, 220);
    }
    const texture = new THREE.CanvasTexture(canvas);
    texture.needsUpdate = true;
    return texture;
  }, [title, category, glowColor]);

  useFrame((state) => {
    if (meshRef.current) {
      const elapsed = state.clock.getElapsedTime();

      // Floating animation
      meshRef.current.position.y = position[1] + Math.sin(elapsed * 1.5 + position[0]) * 0.15;

      if (hovered) {
        // Tilt towards the user and rotate slightly
        meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, -0.2, 0.1);
        meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, 0.15, 0.1);
        meshRef.current.scale.lerp(new THREE.Vector3(1.15, 1.15, 1.15), 0.1);
      } else {
        // Normal state
        meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, 0, 0.1);
        meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, 0, 0.1);
        meshRef.current.scale.lerp(new THREE.Vector3(1.0, 1.0, 1.0), 0.1);
      }
    }
  });

  return (
    <group
      ref={meshRef}
      position={position}
      onPointerOver={(e) => {
        e.stopPropagation();
        setHovered(true);
      }}
      onPointerOut={() => setHovered(false)}
    >
      {/* Curved display screen mockup representing portfolio_screen.glb */}
      <RoundedBox args={[4.2, 2.8, 0.2]} radius={0.12} smoothness={4} castShadow receiveShadow>
        <meshStandardMaterial
          attach="material-4" // Front screen texture
          map={dynamicTexture || undefined}
          roughness={0.05}
          metalness={0.9}
        />
        <meshStandardMaterial attach="material-0" color="#1e293b" />
        <meshStandardMaterial attach="material-1" color="#1e293b" />
        <meshStandardMaterial attach="material-2" color="#1e293b" />
        <meshStandardMaterial attach="material-3" color="#1e293b" />
        <meshStandardMaterial attach="material-5" color="#1e293b" />
      </RoundedBox>

      {/* Sleek support stand for aesthetic weight */}
      <mesh position={[0, -1.6, -0.1]} castShadow>
        <cylinderGeometry args={[0.1, 0.15, 0.5, 16]} />
        <meshStandardMaterial color="#334155" roughness={0.4} metalness={0.8} />
      </mesh>
      <mesh position={[0, -1.85, -0.1]} castShadow>
        <cylinderGeometry args={[0.8, 0.9, 0.1, 32]} />
        <meshStandardMaterial color="#1e293b" roughness={0.3} metalness={0.7} />
      </mesh>

      {/* Back glow overlay when hovered */}
      <mesh position={[0, 0, -0.15]}>
        <planeGeometry args={[4.5, 3.1]} />
        <meshBasicMaterial
          color={glowColor}
          transparent
          opacity={hovered ? 0.35 : 0.05}
        />
      </mesh>

      {/* Direct CTA Hover action text */}
      {hovered && (
        <Html position={[0, 0, 0.2]} center distanceFactor={8} className="pointer-events-none">
          <div className="px-4 py-2 bg-[#22C55E] text-white text-xs font-extrabold rounded-lg shadow-lg transform scale-110 animate-pulse font-sans">
            مشاهده پروژه 🔗
          </div>
        </Html>
      )}
    </group>
  );
}

export default function PortfolioSection() {
  const groundRef = useRef<THREE.Mesh>(null);

  // Generate low-poly landscape ground plane (Footer)
  const [vertices, indices] = useMemo(() => {
    const size = 30;
    const segments = 20;
    const verts: number[] = [];
    const ind: number[] = [];

    for (let i = 0; i <= segments; i++) {
      for (let j = 0; j <= segments; j++) {
        const x = (i / segments) * size - size / 2;
        const z = (j / segments) * size - size / 2;

        // Low-poly landscape coordinate variation logic
        const dist = Math.sqrt(x * x + z * z);
        let y = -2.5 + Math.sin(x * 0.4) * Math.cos(z * 0.4) * 0.8;
        if (dist > 10) {
          y += (dist - 10) * 0.35; // elevate sides for valley appearance
        }

        verts.push(x, y, z);
      }
    }

    // Connect vertices to faces
    for (let i = 0; i < segments; i++) {
      for (let j = 0; j < segments; j++) {
        const row1 = i * (segments + 1);
        const row2 = (i + 1) * (segments + 1);

        ind.push(row1 + j, row1 + j + 1, row2 + j);
        ind.push(row1 + j + 1, row2 + j + 1, row2 + j);
      }
    }

    return [new Float32Array(verts), new Uint32Array(ind)];
  }, []);

  useFrame((state) => {
    if (groundRef.current) {
      // Very soft terrain breathing motion
      groundRef.current.rotation.y = state.clock.getElapsedTime() * 0.02;
    }
  });

  const portfolioItems = [
    {
      title: "صرافی رمزارز نیک‌پی",
      category: "NEXT.js / WEBGL",
      glowColor: "#00A4FF",
      position: [-5.0, 1.5, 0] as [number, number, number],
    },
    {
      title: "متاورس پارسیان",
      category: "THREE.js / R3F",
      glowColor: "#22C55E",
      position: [0, 2.5, -2] as [number, number, number],
    },
    {
      title: "سامانه هوشمند ترافیک",
      category: "REACT / MAPBOX",
      glowColor: "#a855f7",
      position: [5.0, 1.5, 0] as [number, number, number],
    },
  ];

  return (
    <group>
      {/* 1. Low-poly Footer Landscape Plane */}
      <mesh ref={groundRef} position={[0, -4.5, 0]} receiveShadow>
        <bufferGeometry>
          <bufferAttribute
            attach="attributes-position"
            count={vertices.length / 3}
            array={vertices}
            itemSize={3}
            args={[vertices, 3]}
          />
          <bufferAttribute
            attach="index"
            count={indices.length}
            array={indices}
            itemSize={1}
            args={[indices, 1]}
          />
        </bufferGeometry>
        <meshStandardMaterial
          color="#060d1d"
          wireframe
          roughness={0.9}
          metalness={0.1}
          flatShading
        />
      </mesh>

      {/* 2. Floating Portfolio Screens */}
      {portfolioItems.map((item) => (
        <PortfolioScreen
          key={item.title}
          position={item.position}
          title={item.title}
          category={item.category}
          glowColor={item.glowColor}
          link="#"
        />
      ))}
    </group>
  );
}

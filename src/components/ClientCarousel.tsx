"use client";

import React, { useRef, useState, useMemo } from "react";
import { useFrame, useThree } from "@react-three/fiber";
import { RoundedBox } from "@react-three/drei";
import * as THREE from "three";

interface ClientLogoProps {
  index: number;
  total: number;
  radius: number;
  name: string;
  engName: string;
  color: string;
}

function CarouselCard({ index, total, radius, name, engName, color }: ClientLogoProps) {
  const meshRef = useRef<THREE.Group>(null);
  const [hovered, setHovered] = useState(false);

  // We determine the angle position of the card on the cylinder carousel
  const angle = (index / total) * Math.PI * 2;

  useFrame((state) => {
    if (meshRef.current) {
      // The parent carousel will rotate, but we can make individual cards float slightly
      meshRef.current.position.y = Math.sin(state.clock.getElapsedTime() * 2 + index) * 0.1;

      if (hovered) {
        meshRef.current.scale.lerp(new THREE.Vector3(1.2, 1.2, 1.2), 0.1);
      } else {
        meshRef.current.scale.lerp(new THREE.Vector3(1.0, 1.0, 1.0), 0.1);
      }
    }
  });

  // Render text into a canvas texture dynamically to act as the logo representation
  const canvasTexture = useMemo(() => {
    if (typeof window === "undefined") return null;
    const canvas = document.createElement("canvas");
    canvas.width = 512;
    canvas.height = 256;
    const ctx = canvas.getContext("2d");
    if (ctx) {
      // Dark cyber background
      ctx.fillStyle = "#090d16";
      ctx.fillRect(0, 0, 512, 256);

      // Elegant inner border
      ctx.strokeStyle = color;
      ctx.lineWidth = 8;
      ctx.strokeRect(16, 16, 480, 224);

      // Draw client name in Persian
      ctx.fillStyle = "#ffffff";
      ctx.font = "bold 56px Vazirmatn, Arial";
      ctx.textAlign = "center";
      ctx.textBaseline = "middle";
      ctx.fillText(name, 256, 100);

      // Draw secondary English/cyber handle
      ctx.fillStyle = color;
      ctx.font = "32px Courier New, monospace";
      ctx.fillText(engName, 256, 170);
    }
    const texture = new THREE.CanvasTexture(canvas);
    texture.needsUpdate = true;
    return texture;
  }, [name, engName, color]);

  // Position on the outer boundary of the cylinder carousel
  const x = Math.sin(angle) * radius;
  const z = Math.cos(angle) * radius;

  return (
    <group
      ref={meshRef}
      position={[x, 0, z]}
      // Rotate the card to always face outwards from the carousel's center
      rotation={[0, angle, 0]}
      onPointerOver={(e) => {
        e.stopPropagation();
        setHovered(true);
      }}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[2.8, 1.6, 0.25]} radius={0.08} smoothness={4} castShadow receiveShadow>
        <meshStandardMaterial
          attach="material-4" // Front face texture mapping
          map={canvasTexture || undefined}
          roughness={0.1}
          metalness={0.8}
        />
        <meshStandardMaterial
          attach="material-0" // Other faces
          color="#0f172a"
          roughness={0.3}
          metalness={0.7}
        />
        <meshStandardMaterial attach="material-1" color="#0f172a" />
        <meshStandardMaterial attach="material-2" color="#0f172a" />
        <meshStandardMaterial attach="material-3" color="#0f172a" />
        <meshStandardMaterial attach="material-5" color="#0f172a" />
      </RoundedBox>

      {/* Halo outline behind the card when hovered */}
      {hovered && (
        <mesh position={[0, 0, -0.05]}>
          <planeGeometry args={[3.0, 1.8]} />
          <meshBasicMaterial color={color} transparent opacity={0.3} />
        </mesh>
      )}
    </group>
  );
}

export default function ClientCarousel() {
  const groupRef = useRef<THREE.Group>(null);
  const { size } = useThree();
  const radius = 6.5;

  // Manual horizontal drag state
  const isDragging = useRef(false);
  const previousMouseX = useRef(0);
  const carouselRotation = useRef(0);

  const clients = [
    { name: "دیجی‌کالا", engName: "DIGIKALA", color: "#FF375F" },
    { name: "اسنپ", engName: "SNAPP", color: "#22C55E" },
    { name: "تپسی", engName: "TAPSI", color: "#FF7A00" },
    { name: "آپارات", engName: "APARAT", color: "#ED145B" },
    { name: "کافه‌بازار", engName: "BAZAAR", color: "#17A24A" },
    { name: "دیوار", engName: "DIVAR", color: "#A62626" },
  ];

  useFrame((state) => {
    if (groupRef.current) {
      if (!isDragging.current) {
        // Auto slow rotation when idle
        carouselRotation.current += 0.003;
      }
      groupRef.current.rotation.y = carouselRotation.current;
    }
  });

  const handlePointerDown = (e: any) => {
    e.stopPropagation();
    isDragging.current = true;
    previousMouseX.current = e.clientX || (e.touches && e.touches[0].clientX) || 0;
  };

  const handlePointerMove = (e: any) => {
    if (!isDragging.current) return;
    e.stopPropagation();
    const currentX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
    const deltaX = currentX - previousMouseX.current;
    previousMouseX.current = currentX;

    // Convert mouse movement to horizontal angular rotation
    carouselRotation.current += (deltaX / size.width) * Math.PI * 1.5;
  };

  const handlePointerUpOrLeave = () => {
    isDragging.current = false;
  };

  return (
    <group
      ref={groupRef}
      onPointerDown={handlePointerDown}
      onPointerMove={handlePointerMove}
      onPointerUp={handlePointerUpOrLeave}
      onPointerLeave={handlePointerUpOrLeave}
    >
      {/* Visual core wireframe column for premium feeling */}
      <mesh position={[0, 0, 0]}>
        <cylinderGeometry args={[radius - 1, radius - 1, 3, 32, 1, true]} />
        <meshBasicMaterial color="#00A4FF" wireframe transparent opacity={0.06} />
      </mesh>

      {clients.map((client, index) => (
        <CarouselCard
          key={client.engName}
          index={index}
          total={clients.length}
          radius={radius}
          name={client.name}
          engName={client.engName}
          color={client.color}
        />
      ))}
    </group>
  );
}

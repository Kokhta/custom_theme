"use client";

import { useRef, useState, useMemo } from "react";
import { useFrame, useThree } from "@react-three/fiber";
import { RoundedBox, Text } from "@react-three/drei";
import * as THREE from "three";

function LogoCard({ position, rotation, label, color }: { position: [number, number, number], rotation: [number, number, number], label: string, color: string }) {
  return (
    <group position={position} rotation={rotation}>
      <RoundedBox args={[1.5, 1, 0.1]} radius={0.05} smoothness={4}>
        <meshStandardMaterial color={color} metalness={0.5} roughness={0.5} />
      </RoundedBox>
      <Text
        position={[0, 0, 0.06]}
        fontSize={0.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {label}
      </Text>
    </group>
  );
}

export function ClientLogos({ position }: { position: [number, number, number] }) {
  const groupRef = useRef<THREE.Group>(null);
  const [isDragging, setIsDragging] = useState(false);
  const [prevMouseX, setPrevMouseX] = useState(0);
  const rotationVelocity = useRef(0.005);

  const { size } = useThree();

  const logos = [
    { label: "دیجی‌کالا", color: "#ef4056" },
    { label: "آپارات", color: "#ed145b" },
    { label: "اسنپ", color: "#22C55E" },
    { label: "تپسی", color: "#ff8b00" },
    { label: "فیلیمو", color: "#f9ad1a" },
    { label: "دیوار", color: "#a62626" },
  ];

  const radius = 4;

  useFrame(() => {
    if (groupRef.current && !isDragging) {
      groupRef.current.rotation.y += rotationVelocity.current;
      rotationVelocity.current *= 0.95; // Friction
      if (Math.abs(rotationVelocity.current) < 0.001) rotationVelocity.current = 0.002;
    }
  });

  const handlePointerDown = (e: any) => {
    setIsDragging(true);
    setPrevMouseX(e.clientX);
  };

  const handlePointerMove = (e: any) => {
    if (isDragging && groupRef.current) {
      const deltaX = e.clientX - prevMouseX;
      groupRef.current.rotation.y += deltaX * 0.01;
      rotationVelocity.current = deltaX * 0.01;
      setPrevMouseX(e.clientX);
    }
  };

  const handlePointerUp = () => {
    setIsDragging(false);
  };

  return (
    <group
      position={position}
      onPointerDown={handlePointerDown}
      onPointerMove={handlePointerMove}
      onPointerUp={handlePointerUp}
      onPointerOut={handlePointerUp}
    >
      <Text
        position={[0, 3, 0]}
        fontSize={0.6}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        مشتریان ما
      </Text>

      <group ref={groupRef}>
        {logos.map((logo, index) => {
          const angle = (index / logos.length) * Math.PI * 2;
          const x = Math.sin(angle) * radius;
          const z = Math.cos(angle) * radius;
          return (
            <LogoCard
              key={index}
              position={[x, 0, z]}
              rotation={[0, angle, 0]}
              label={logo.label}
              color={logo.color}
            />
          );
        })}
      </group>
    </group>
  );
}

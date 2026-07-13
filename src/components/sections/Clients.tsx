"use client";

import { useFrame } from "@react-three/fiber";
import { useRef, useState } from "react";
import * as THREE from "three";
import { RoundedBox, Text } from "@react-three/drei";

const LogoCard = ({ angle, name, color }: { angle: number, name: string, color: string }) => {
  const radius = 6;
  const x = Math.cos(angle) * radius;
  const z = Math.sin(angle) * radius;

  return (
    <group position={[x, 0, z]} rotation={[0, -angle + Math.PI / 2, 0]}>
      <RoundedBox args={[2, 1.2, 0.1]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color={color} metalness={0.5} roughness={0.1} />
        <Text
          position={[0, 0, 0.06]}
          fontSize={0.2}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          {name}
        </Text>
      </RoundedBox>
    </group>
  );
};

export default function Clients() {
  const groupRef = useRef<THREE.Group>(null);
  const [rotation, setRotation] = useState(0);
  const [isDragging, setIsDragging] = useState(false);
  const lastX = useRef(0);

  const clients = [
    { name: "دیجی‌کالا", color: "#ef4056" },
    { name: "اسنپ", color: "#22c55e" },
    { name: "تپسی", color: "#ff8b00" },
    { name: "بازار", color: "#16a34a" },
    { name: "آپارات", color: "#df0056" },
    { name: "فیلیمو", color: "#f9a825" },
  ];

  useFrame((state) => {
    if (groupRef.current && !isDragging) {
      groupRef.current.rotation.y += 0.005;
    }
  });

  const handlePointerDown = (e: any) => {
    e.stopPropagation();
    setIsDragging(true);
    lastX.current = e.clientX;
  };

  const handlePointerUp = () => {
    setIsDragging(false);
  };

  const handlePointerMove = (e: any) => {
    if (isDragging && groupRef.current) {
      const deltaX = e.clientX - lastX.current;
      groupRef.current.rotation.y += deltaX * 0.01;
      lastX.current = e.clientX;
    }
  };

  return (
    <group
      position={[0, -40, 0]}
      onPointerDown={handlePointerDown}
      onPointerUp={handlePointerUp}
      onPointerLeave={handlePointerUp}
      onPointerMove={handlePointerMove}
    >
      <Text
        position={[0, 3, 0]}
        fontSize={0.8}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        مشتریان ما
      </Text>

      <group ref={groupRef}>
        {clients.map((client, i) => (
          <LogoCard
            key={i}
            angle={(i / clients.length) * Math.PI * 2}
            name={client.name}
            color={client.color}
          />
        ))}
      </group>

      {/* Decorative center piece */}
      <mesh>
        <cylinderGeometry args={[4, 4, 0.1, 64]} />
        <meshStandardMaterial color="#004E8C" transparent opacity={0.2} />
      </mesh>
    </group>
  );
}

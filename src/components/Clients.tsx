"use client";

import { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { RoundedBox, Text } from "@react-three/drei";
import * as THREE from "three";

const clients = [
  { name: "دیجی‌کالا", color: "#ef4056" },
  { name: "اسنپ", color: "#22c55e" },
  { name: "تپسی", color: "#ff8b00" },
  { name: "آپارات", color: "#ed145b" },
  { name: "فیلیمو", color: "#f9ad01" },
  { name: "دیوار", color: "#a62626" },
];

export default function Clients() {
  const groupRef = useRef<THREE.Group>(null);
  const [isDragging, setIsDragging] = useState(false);
  const [prevMouseX, setPrevMouseX] = useState(0);
  const [rotationVelocity, setRotationVelocity] = useState(0.005);

  useFrame(() => {
    if (groupRef.current && !isDragging) {
      groupRef.current.rotation.y += rotationVelocity;
      // Friction
      setRotationVelocity(v => v * 0.98 + 0.0001);
    }
  });

  const handlePointerDown = (e: any) => {
    setIsDragging(true);
    setPrevMouseX(e.clientX);
  };

  const handlePointerUp = () => {
    setIsDragging(false);
  };

  const handlePointerMove = (e: any) => {
    if (isDragging && groupRef.current) {
      const deltaX = e.clientX - prevMouseX;
      groupRef.current.rotation.y += deltaX * 0.01;
      setRotationVelocity(deltaX * 0.01);
      setPrevMouseX(e.clientX);
    }
  };

  return (
    <group>
      <Text
        position={[0, 3, 0]}
        fontSize={0.4}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        مشتریان ما
      </Text>

      <group
        ref={groupRef}
        onPointerDown={handlePointerDown}
        onPointerUp={handlePointerUp}
        onPointerMove={handlePointerMove}
        onPointerLeave={handlePointerUp}
      >
        {clients.map((client, index) => {
          const angle = (index / clients.length) * Math.PI * 2;
          const radius = 4;
          const x = Math.cos(angle) * radius;
          const z = Math.sin(angle) * radius;

          return (
            <group key={index} position={[x, 0, z]} rotation={[0, -angle + Math.PI / 2, 0]}>
              <RoundedBox args={[1.5, 1, 0.2]} radius={0.1} smoothness={4}>
                <meshStandardMaterial color={client.color} metalness={0.5} roughness={0.1} />
                <Text
                  position={[0, 0, 0.11]}
                  fontSize={0.2}
                  color="white"
                  font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
                >
                  {client.name}
                </Text>
              </RoundedBox>
            </group>
          );
        })}
      </group>
    </group>
  );
}

"use client";

import { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { RoundedBox, Text } from "@react-three/drei";
import * as THREE from "three";

export const Clients = () => {
  const groupRef = useRef<THREE.Group>(null);
  const [rotation, setRotation] = useState(0);
  const [isDragging, setIsDragging] = useState(false);
  const [startX, setStartX] = useState(0);

  useFrame(() => {
    if (groupRef.current && !isDragging) {
      groupRef.current.rotation.y += 0.005;
    }
  });

  const onPointerDown = (e: any) => {
    e.stopPropagation();
    setIsDragging(true);
    setStartX(e.clientX);
  };

  const onPointerUp = () => {
    setIsDragging(false);
  };

  const onPointerMove = (e: any) => {
    if (isDragging && groupRef.current) {
      const deltaX = e.clientX - startX;
      groupRef.current.rotation.y += deltaX * 0.01;
      setStartX(e.clientX);
    }
  };

  const clients = ["دیجی‌کالا", "اسنپ", "تپسی", "آپ", "فیلیمو", "نماوا"];

  return (
    <group position={[0, -20, 0]}>
      <Text
        position={[0, 4, 0]}
        fontSize={0.8}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        مشتریان ما
      </Text>
      <group
        ref={groupRef}
        onPointerDown={onPointerDown}
        onPointerUp={onPointerUp}
        onPointerMove={onPointerMove}
        onPointerLeave={onPointerUp}
      >
        {clients.map((name, i) => {
          const angle = (i / clients.length) * Math.PI * 2;
          const x = Math.cos(angle) * 5;
          const z = Math.sin(angle) * 5;
          return (
            <group key={i} position={[x, 0, z]} rotation={[0, -angle + Math.PI / 2, 0]}>
              <RoundedBox args={[2, 1, 0.1]} radius={0.1} smoothness={4}>
                <meshStandardMaterial color="white" metalness={0.5} roughness={0.1} />
              </RoundedBox>
              <Text
                position={[0, 0, 0.06]}
                fontSize={0.3}
                color="#004E8C"
                font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
              >
                {name}
              </Text>
            </group>
          );
        })}
      </group>
    </group>
  );
};

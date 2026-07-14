"use client";

import { useScroll, Text } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import * as THREE from "three";

const STATS = [
  { value: "۱۳۹۸", label: "تاسیس", pos: [-3, 0, 0] },
  { value: "۳", label: "کشور", pos: [-1, 0, 0] },
  { value: "۹۵", label: "پروژه موفق", pos: [1, 0, 0] },
  { value: "۷", label: "تیم تخصصی", pos: [3, 0, 0] },
];

export const Stats = ({ position = [0, 0, 0] }: { position?: [number, number, number] }) => {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null!);

  useFrame(() => {
    const offset = scroll.offset;
    // Stats section is at -60. Total range 80.
    // 60/80 = 0.75
    const sectionStart = 0.65;
    const sectionEnd = 0.85;
    const sectionOffset = Math.max(0, Math.min(1, (offset - sectionStart) / (sectionEnd - sectionStart)));

    groupRef.current.children.forEach((child, i) => {
      if (child instanceof THREE.Group) {
        const targetY = 0;
        const startY = 10;
        child.position.y = startY * (1 - sectionOffset) + targetY;
        child.scale.setScalar(sectionOffset);
        child.rotation.x = (1 - sectionOffset) * Math.PI;
      }
    });
  });

  return (
    <group position={position}>
      <mesh rotation={[0, 0, 0]} position={[0, 0, -1]}>
        <boxGeometry args={[10, 4, 0.1]} />
        <meshStandardMaterial color="#004E8C" transparent opacity={0.3} />
      </mesh>

      <group ref={groupRef}>
        {STATS.map((stat, i) => (
          <group key={i} position={stat.pos as [number, number, number]}>
            <Text
              fontSize={0.8}
              color="#00A4FF"
              font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
              position={[0, 0.5, 0]}
            >
              {stat.value}
            </Text>
            <Text
              fontSize={0.3}
              color="white"
              font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
              position={[0, -0.5, 0]}
            >
              {stat.label}
            </Text>
          </group>
        ))}
      </group>
    </group>
  );
};

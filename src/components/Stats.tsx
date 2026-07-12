"use client";

import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { useScroll, Text, Float } from "@react-three/drei";
import * as THREE from "three";

interface StatItem {
  value: string;
  label: string;
  position: [number, number, number];
}

const stats: StatItem[] = [
  { value: "۱۳۹۸", label: "سال تاسیس", position: [-1.5, 0.5, 0] },
  { value: "۳", label: "دفتر فعال", position: [1.5, 0.5, 0] },
  { value: "۹۵", label: "پروژه موفق", position: [-1.5, -1.5, 0] },
  { value: "۷", label: "کشور هدف", position: [1.5, -1.5, 0] },
];

export default function Stats() {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  useFrame(() => {
    const sectionStart = 0.6;
    const sectionEnd = 0.8;
    const offset = scroll.offset;

    if (groupRef.current) {
      if (offset > sectionStart && offset < sectionEnd) {
        const progress = (offset - sectionStart) / (sectionEnd - sectionStart);
        groupRef.current.children.forEach((child, i) => {
          const targetY = stats[i % stats.length].position[1];
          child.position.y = THREE.MathUtils.lerp(targetY + 5, targetY, Math.min(progress * 2, 1));
          child.scale.setScalar(THREE.MathUtils.lerp(0, 1, Math.min(progress * 2, 1)));
        });
      }
    }
  });

  return (
    <group>
      <Text
        position={[0, 3, 0]}
        fontSize={0.4}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        آمار و ارقام
      </Text>

      {/* Dashboard Backdrop */}
      <mesh position={[0, -0.5, -0.5]}>
        <cylinderGeometry args={[4, 4, 3, 32, 1, true, Math.PI, Math.PI]} />
        <meshStandardMaterial color="#004E8C" transparent opacity={0.2} side={THREE.DoubleSide} />
      </mesh>

      <group ref={groupRef}>
        {stats.map((stat, index) => (
          <group key={index} position={stat.position}>
            <Float speed={2} rotationIntensity={0.5} floatIntensity={0.5}>
              <mesh>
                <boxGeometry args={[2, 1.2, 0.1]} />
                <meshStandardMaterial color="#ffffff" transparent opacity={0.1} />
              </mesh>
              <Text
                position={[0, 0.2, 0.06]}
                fontSize={0.4}
                color="#00A4FF"
                font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
              >
                {stat.value}
              </Text>
              <Text
                position={[0, -0.3, 0.06]}
                fontSize={0.15}
                color="white"
                font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
              >
                {stat.label}
              </Text>
            </Float>
          </group>
        ))}
      </group>
    </group>
  );
}

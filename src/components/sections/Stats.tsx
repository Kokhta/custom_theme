"use client";

import { useFrame } from "@react-three/fiber";
import { useRef, useMemo } from "react";
import * as THREE from "three";
import { Text, useScroll } from "@react-three/drei";

const StatItem = ({ position, value, label, index }: { position: [number, number, number], value: string, label: string, index: number }) => {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  // Section range is roughly 0.6 to 0.75
  const sectionStart = 0.6;
  const sectionEnd = 0.75;

  useFrame(() => {
    if (groupRef.current) {
      const offset = scroll.offset;
      // Normalized progress within this section (0 to 1)
      const progress = Math.max(0, Math.min(1, (offset - sectionStart) / (sectionEnd - sectionStart)));

      // Explode animation: come from above
      const startY = 10 + index * 2;
      const targetY = position[1];
      groupRef.current.position.y = THREE.MathUtils.lerp(startY, targetY, progress);

      // Fade in and scale up
      groupRef.current.scale.setScalar(progress);
    }
  });

  return (
    <group ref={groupRef} position={[position[0], 0, position[2]]}>
      <Text
        position={[0, 0, 0]}
        fontSize={1}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {value}
      </Text>
      <Text
        position={[0, -0.8, 0]}
        fontSize={0.3}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        {label}
      </Text>
    </group>
  );
};

export default function Stats() {
  const dashboardRef = useRef<THREE.Mesh>(null);

  useFrame((state) => {
    if (dashboardRef.current) {
      dashboardRef.current.rotation.x = Math.sin(state.clock.elapsedTime * 0.5) * 0.1;
    }
  });

  const stats = [
    { value: "۱۳۹۸", label: "سال تاسیس" },
    { value: "۳", label: "شعبه فعال" },
    { value: "۹۵", label: "پروژه موفق" },
    { value: "۷", label: "تیم تخصصی" },
  ];

  return (
    <group position={[0, -60, 0]}>
      {/* Curved Dashboard Placeholder */}
      <mesh ref={dashboardRef} position={[0, 0, -2]}>
        <sphereGeometry args={[10, 32, 32, 0, Math.PI * 2, 0, Math.PI / 6]} />
        <meshStandardMaterial
          color="#004E8C"
          transparent
          opacity={0.3}
          side={THREE.DoubleSide}
          wireframe
        />
      </mesh>

      {/* Stats Numbers */}
      <group position={[0, 0, 0]}>
        {stats.map((stat, i) => (
          <StatItem
            key={i}
            index={i}
            position={[(i - 1.5) * 3, 0, 0]}
            value={stat.value}
            label={stat.label}
          />
        ))}
      </group>
    </group>
  );
}

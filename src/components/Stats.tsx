"use client";

import { useRef, useMemo } from "react";
import { useFrame } from "@react-three/fiber";
import { Text, useScroll, RoundedBox } from "@react-three/drei";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

function StatItem({ position, value, label, delay }: { position: [number, number, number], value: string, label: string, delay: number }) {
  const scroll = useScroll();
  const ref = useRef<THREE.Group>(null);

  useFrame(() => {
    // Section enters around 0.6 - 0.8
    // scroll.offset is 0 to 1
    const sectionStart = 0.55;
    const sectionEnd = 0.75;
    const progress = Math.max(0, Math.min(1, (scroll.offset - sectionStart) / (sectionEnd - sectionStart)));

    if (ref.current) {
      // Explode animation
      const yOffset = (1 - progress) * 5 * (1 + delay);
      ref.current.position.y = position[1] + yOffset;
      ref.current.scale.setScalar(THREE.MathUtils.lerp(0, 1, progress));
    }
  });

  return (
    <group ref={ref} position={position}>
      <Text
        fontSize={0.8}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        position={[0, 0.5, 0]}
      >
        {value}
      </Text>
      <Text
        fontSize={0.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        position={[0, -0.2, 0]}
      >
        {label}
      </Text>
    </group>
  );
}

export function Stats({ position }: { position: [number, number, number] }) {
  const stats = [
    { value: "۱۳۹۸", label: "سال تاسیس", pos: [-3, 0, 0] },
    { value: "۳", label: "کشور فعال", pos: [-1, 0, 0] },
    { value: "۹۵", label: "پروژه موفق", pos: [1, 0, 0] },
    { value: "۷", label: "رتبه برتر", pos: [3, 0, 0] },
  ];

  return (
    <group position={position}>
      {/* Dashboard Panel */}
      <mesh rotation={[-Math.PI / 10, 0, 0]} position={[0, 0, -1]}>
        <cylinderGeometry args={[8, 8, 3, 32, 1, true, -Math.PI / 4, Math.PI / 2]} />
        <meshStandardMaterial
          color="#004E8C"
          transparent
          opacity={0.2}
          side={THREE.DoubleSide}
          metalness={0.9}
          roughness={0.1}
        />
      </mesh>

      <Text
        position={[0, 2.5, 0]}
        fontSize={0.6}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        آمار و ارقام
      </Text>

      {stats.map((stat, index) => (
        <StatItem
          key={index}
          position={stat.pos as [number, number, number]}
          value={stat.value}
          label={stat.label}
          delay={index * 0.2}
        />
      ))}
    </group>
  );
}

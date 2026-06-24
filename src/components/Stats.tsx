"use client";

import { useScroll, Text, Text3D, Center } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef, useMemo } from "react";
import * as THREE from "three";

export const Stats = () => {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  // Using standard Text (Troika) for Persian numbers to ensure correct glyph rendering
  // as most JSON fonts don't support Persian.

  const stats = useMemo(() => [
    { label: "سال تاسیس", value: "۱۳۹۸", pos: [-3, 0, 0], color: "#00A4FF", delay: 0 },
    { label: "پروژه‌ها", value: "۹۵", pos: [-1, 0, 0], color: "#00A4FF", delay: 0.1 },
    { label: "تیم ما", value: "۷", pos: [1, 0, 0], color: "#00A4FF", delay: 0.2 },
    { label: "کشورها", value: "۳", pos: [3, 0, 0], color: "#00A4FF", delay: 0.3 },
  ], []);

  useFrame(() => {
    if (groupRef.current) {
      stats.forEach((stat, i) => {
        const child = groupRef.current!.children[i];
        // Individual range for each stat to create a staggered effect
        const start = 0.6 + stat.delay * 0.2;
        const r = scroll.range(start, 0.1);

        // Fly in from random-ish directions and settle
        child.position.y = THREE.MathUtils.lerp(15, 0, THREE.MathUtils.smoothstep(r, 0, 1));
        child.position.x = stat.pos[0] + (1 - r) * (i % 2 === 0 ? -2 : 2);
        child.scale.setScalar(THREE.MathUtils.lerp(0.001, 1, r));
        child.rotation.x = (1 - r) * Math.PI * 4;
        child.rotation.y = (1 - r) * Math.PI;
      });
    }
  });

  return (
    <group position={[0, -32, 0]}>
      {/* Curved Dashboard Background */}
      <mesh rotation={[-0.2, 0, 0]} position={[0, -1, -2]}>
        <cylinderGeometry args={[15, 15, 8, 32, 1, true, Math.PI * 0.35, Math.PI * 0.3]} />
        <meshStandardMaterial color="#004E8C" side={THREE.DoubleSide} transparent opacity={0.4} />
      </mesh>

      <group ref={groupRef}>
        {stats.map((stat, i) => (
          <group key={i} position={[stat.pos[0], 0, stat.pos[2]]}>
            <Text
              position={[0, 1.5, 0]}
              fontSize={1.2}
              color={stat.color}
              font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
              anchorX="center"
              anchorY="middle"
            >
              {stat.value}
              <meshStandardMaterial color={stat.color} emissive={stat.color} emissiveIntensity={2} />
            </Text>
            <Text
              position={[0, 0, 0]}
              fontSize={0.4}
              color="white"
              anchorX="center"
              anchorY="top"
                font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
            >
              {stat.label}
            </Text>
          </group>
        ))}
      </group>
    </group>
  );
};

"use client";

import { useFrame } from "@react-three/fiber";
import { Text, useScroll, Center, MeshTransmissionMaterial } from "@react-three/drei";
import { useRef, useState } from "react";
import * as THREE from "three";

interface StatsProps {
  position: [number, number, number];
}

const STATS_DATA = [
  { value: "۱۳۹۸", label: "سال تاسیس", color: "#00A4FF" },
  { value: "۳", label: "کشور فعال", color: "#22C55E" },
  { value: "۹۵", label: "رضایت مشتری", color: "#00A4FF" },
  { value: "۷", label: "رتبه برتر", color: "#22C55E" },
];

function StatItem({ val, label, color, index, scrollOffset }: { val: string, label: string, color: string, index: number, scrollOffset: number }) {
  const itemRef = useRef<THREE.Group>(null);

  const startScroll = 0.55;
  const endScroll = 0.7;

  useFrame(() => {
    if (itemRef.current) {
      const progress = Math.max(0, Math.min(1, (scrollOffset - startScroll) / (endScroll - startScroll)));
      const targetX = (index - 1.5) * 4;
      const initialY = 10;
      const targetY = 0;

      itemRef.current.position.x = THREE.MathUtils.lerp(0, targetX, progress);
      itemRef.current.position.y = THREE.MathUtils.lerp(initialY, targetY, progress);
      itemRef.current.scale.setScalar(THREE.MathUtils.lerp(0, 1, progress));
      itemRef.current.rotation.z = THREE.MathUtils.lerp(Math.PI, 0, progress);
    }
  });

  return (
    <group ref={itemRef}>
      <mesh>
        <boxGeometry args={[3, 2, 0.5]} />
        <MeshTransmissionMaterial
          backside
          samples={4}
          thickness={1}
          chromaticAberration={0.02}
          anisotropy={0.1}
          distortion={0.1}
          distortionScale={0.1}
          temporalDistortion={0.1}
          color="#004E8C"
        />
      </mesh>
      <Center position={[0, 0.3, 0.3]}>
        <Text
          fontSize={0.8}
          color={color}
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          {val}
        </Text>
      </Center>
      <Center position={[0, -0.5, 0.3]}>
        <Text
          fontSize={0.3}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          {label}
        </Text>
      </Center>
    </group>
  );
}

export default function Stats({ position }: StatsProps) {
  const scroll = useScroll();
  const [scrollOffset, setScrollOffset] = useState(0);

  useFrame(() => {
    setScrollOffset(scroll.offset);
  });

  return (
    <group position={position}>
      <mesh rotation={[0, 0, 0]}>
        <cylinderGeometry args={[12, 12, 5, 32, 1, true, -Math.PI / 4, Math.PI / 2]} />
        <meshStandardMaterial color="#00A4FF" side={THREE.DoubleSide} transparent opacity={0.2} wireframe />
      </mesh>

      <group position={[0, 0, 2]}>
        {STATS_DATA.map((stat, idx) => (
          <StatItem
            key={idx}
            val={stat.value}
            label={stat.label}
            color={stat.color}
            index={idx}
            scrollOffset={scrollOffset}
          />
        ))}
      </group>
    </group>
  );
}

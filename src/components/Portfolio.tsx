"use client";

import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { useScroll, Text, Float, MeshDistortMaterial } from "@react-three/drei";
import * as THREE from "three";

export const Portfolio = () => {
  const scroll = useScroll();

  const projects = [
    { title: "اپلیکیشن بانکی", pos: [-4, 0, 0] },
    { title: "پنل مدیریت", pos: [0, 0, 0] },
    { title: "فروشگاه آنلاین", pos: [4, 0, 0] },
  ];

  return (
    <group position={[0, -40, 0]}>
      <Text
        position={[0, 4, 0]}
        fontSize={1}
        color="#22C55E"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        نمونه کارها
      </Text>

      {projects.map((p, i) => (
        <PortfolioScreen key={i} position={p.pos as [number, number, number]} title={p.title} />
      ))}

      {/* Footer Landscape */}
      <mesh position={[0, -10, -10]} rotation={[-Math.PI / 2, 0, 0]}>
        <planeGeometry args={[100, 100, 50, 50]} />
        <meshStandardMaterial color="#002E5C" wireframe />
      </mesh>
    </group>
  );
};

const PortfolioScreen = ({ position, title }: { position: [number, number, number], title: string }) => {
  const meshRef = useRef<THREE.Mesh>(null);

  useFrame((state) => {
    if (meshRef.current) {
      meshRef.current.rotation.y = Math.sin(state.clock.elapsedTime + position[0]) * 0.1;
    }
  });

  return (
    <group position={position}>
      <mesh
        ref={meshRef}
        onPointerOver={() => { if (meshRef.current) meshRef.current.scale.set(1.1, 1.1, 1.1); }}
        onPointerOut={() => { if (meshRef.current) meshRef.current.scale.set(1, 1, 1); }}
      >
        <boxGeometry args={[3, 2, 0.1]} />
        <meshStandardMaterial color="#111" />
        <mesh position={[0, 0, 0.06]}>
          <planeGeometry args={[2.8, 1.8]} />
          <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} />
        </mesh>
      </mesh>
      <Text
        position={[0, -1.5, 0]}
        fontSize={0.3}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        {title}
      </Text>
    </group>
  );
};

"use client";

import { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { RoundedBox, Text, useScroll } from "@react-three/drei";
import * as THREE from "three";

export const Portfolio = ({ position = [0, 0, 0] }: { position?: [number, number, number] }) => {
  const scroll = useScroll();
  const landscapeRef = useRef<THREE.Mesh>(null!);

  return (
    <group position={position}>
      <Text
        position={[0, 4, 0]}
        fontSize={1}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      <group position={[0, 0, 0]}>
        <ProjectScreen position={[-4, 0, 0]} title="پروژه اول" color="#22C55E" />
        <ProjectScreen position={[0, 0, 1]} title="پروژه دوم" color="#00A4FF" />
        <ProjectScreen position={[4, 0, 0]} title="پروژه سوم" color="#004E8C" />
      </group>

      {/* Footer Landscape */}
      <mesh ref={landscapeRef} rotation={[-Math.PI / 2, 0, 0]} position={[0, -5, 0]}>
        <planeGeometry args={[200, 200, 50, 50]} />
        <meshStandardMaterial color="#00A4FF" wireframe />
      </mesh>

      <Text
        position={[0, -4, 5]}
        fontSize={0.5}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        آتی‌سافت - ۱۴۰۳
      </Text>
    </group>
  );
};

const ProjectScreen = ({ position, title, color }: { position: [number, number, number], title: string, color: string }) => {
  const meshRef = useRef<THREE.Group>(null!);
  const [hovered, setHovered] = useState(false);

  useFrame((state) => {
    if (hovered) {
      meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, (state.mouse.x * Math.PI) / 10, 0.1);
      meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, (-state.mouse.y * Math.PI) / 10, 0.1);
    } else {
      meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, 0, 0.1);
      meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, 0, 0.1);
    }
  });

  return (
    <group
      position={position}
      ref={meshRef}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[3, 2, 0.1]} radius={0.05}>
        <meshStandardMaterial
          color="#111"
          emissive={hovered ? "#00A4FF" : "#000"}
          emissiveIntensity={hovered ? 2 : 0}
        />
      </RoundedBox>
      <Text
        position={[0, 0, 0.06]}
        fontSize={0.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {title}
      </Text>
    </group>
  );
};

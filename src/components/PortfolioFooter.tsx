"use client";

import { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Text, RoundedBox, Float, useScroll } from "@react-three/drei";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

function PortfolioScreen({ position, title, color }: { position: [number, number, number], title: string, color: string }) {
  const [hovered, setHovered] = useState(false);
  const { rotationX, rotationY, scale, glowIntensity } = useSpring({
    rotationX: hovered ? -0.2 : 0,
    rotationY: hovered ? 0.2 : 0,
    scale: hovered ? 1.1 : 1,
    glowIntensity: hovered ? 2 : 0.5,
  });

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation-x={rotationX}
      rotation-y={rotationY}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[3, 2, 0.1]} radius={0.1}>
        <meshStandardMaterial color="#111111" metalness={0.9} roughness={0.1} />
      </RoundedBox>
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[2.8, 1.8]} />
        <animated.meshStandardMaterial
          color={color}
          emissive={color}
          emissiveIntensity={glowIntensity}
        />
      </mesh>
      <Text
        position={[0, -1.3, 0]}
        fontSize={0.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {title}
      </Text>
    </animated.group>
  );
}

export function PortfolioFooter({ position }: { position: [number, number, number] }) {
  const scroll = useScroll();
  const footerRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (footerRef.current) {
      // Zoom out at the very end
      const progress = Math.max(0, (scroll.offset - 0.9) * 10);
      state.camera.position.z = 5 + progress * 20;
    }
  });

  const projects = [
    { title: "پروژه الف", color: "#00A4FF", pos: [-4, 2, 0] },
    { title: "پروژه ب", color: "#004E8C", pos: [0, 2, 0] },
    { title: "پروژه ج", color: "#22C55E", pos: [4, 2, 0] },
  ];

  return (
    <group position={position} ref={footerRef}>
      <Text
        position={[0, 5, 0]}
        fontSize={0.8}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      {projects.map((project, index) => (
        <Float key={index} speed={2} rotationIntensity={0.5} floatIntensity={0.5}>
          <PortfolioScreen
            position={project.pos as [number, number, number]}
            title={project.title}
            color={project.color}
          />
        </Float>
      ))}

      {/* Footer Landscape */}
      <group position={[0, -5, -5]}>
        <mesh rotation={[-Math.PI / 2, 0, 0]}>
          <planeGeometry args={[100, 100, 50, 50]} />
          <meshStandardMaterial
            color="#000814"
            wireframe
            transparent
            opacity={0.2}
          />
        </mesh>

        <Text
          position={[0, 1, 0]}
          fontSize={1}
          color="#00A4FF"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
        <Text
          position={[0, 0.2, 0]}
          fontSize={0.3}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          تمامی حقوق محفوظ است © ۱۴۰۳
        </Text>
      </group>
    </group>
  );
}

"use client";

import { useRef, useState, useMemo } from "react";
import { useFrame } from "@react-three/fiber";
import { Text, Float, RoundedBox, useScroll } from "@react-three/drei";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

export default function Portfolio() {
  const scroll = useScroll();
  const footerRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (footerRef.current) {
      const offset = scroll.offset;
      if (offset > 0.9) {
        const progress = (offset - 0.9) / 0.1;
        // Space zoom out effect handled in Experience.tsx camera logic eventually,
        // but here we can fade things out or move them.
      }
    }
  });

  return (
    <group>
      <Text
        position={[0, 4, 0]}
        fontSize={0.4}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      <group position={[0, 1, 0]}>
        <PortfolioScreen position={[-3, 0, 0]} title="اپلیکیشن بانکی" />
        <PortfolioScreen position={[0, 1, -1]} title="پلتفرم تجارت الکترونیک" />
        <PortfolioScreen position={[3, 0, 0]} title="داشبورد مدیریتی" />
      </group>

      <group ref={footerRef} position={[0, -5, -2]}>
        <Landscape />
        <Text
          position={[0, 1, 0]}
          fontSize={0.3}
          color="#00A4FF"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت - ۱۴۰۳
        </Text>
        <Text
          position={[0, 0.5, 0]}
          fontSize={0.15}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          طراحی شده با عشق در فضای سه بعدی
        </Text>
      </group>
    </group>
  );
}

function PortfolioScreen({ position, title }: { position: [number, number, number]; title: string }) {
  const [hovered, setHovered] = useState(false);
  const meshRef = useRef<THREE.Group>(null);

  const { rotationX, rotationY, scale, glowIntensity } = useSpring({
    rotationX: hovered ? -0.2 : 0,
    rotationY: hovered ? 0.2 : 0,
    scale: hovered ? 1.1 : 1,
    glowIntensity: hovered ? 2 : 0.5,
  });

  return (
    <animated.group
      ref={meshRef}
      position={position}
      scale={scale}
      rotation-x={rotationX}
      rotation-y={rotationY}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[2.5, 1.6, 0.1]} radius={0.05}>
        <meshStandardMaterial color="#111" metalness={0.9} roughness={0.1} />
      </RoundedBox>
      {/* Screen "Glow" */}
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[2.4, 1.5]} />
        <animated.meshStandardMaterial
          color="#00A4FF"
          emissive="#00A4FF"
          emissiveIntensity={glowIntensity}
          transparent
          opacity={0.8}
        />
      </mesh>
      <Text
        position={[0, -1, 0]}
        fontSize={0.15}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        {title}
      </Text>
    </animated.group>
  );
}

function Landscape() {
  const geom = useMemo(() => {
    const g = new THREE.PlaneGeometry(20, 20, 50, 50);
    const pos = g.attributes.position;
    for (let i = 0; i < pos.count; i++) {
      const x = pos.getX(i);
      const y = pos.getY(i);
      pos.setZ(i, Math.sin(x * 0.5) * Math.cos(y * 0.5) * 0.5);
    }
    g.computeVertexNormals();
    return g;
  }, []);

  return (
    <mesh geometry={geom} rotation={[-Math.PI / 2, 0, 0]}>
      <meshStandardMaterial color="#001a33" wireframe />
    </mesh>
  );
}

"use client";

import { useFrame } from "@react-three/fiber";
import { Text, useScroll, RoundedBox, Float, Points, PointMaterial } from "@react-three/drei";
import { useRef, useState, useMemo } from "react";
import * as THREE from "three";
import { animated, useSpring } from "@react-spring/three";

interface PortfolioProps {
  position: [number, number, number];
}

function PortfolioScreen({ position, index }: { position: [number, number, number], index: number }) {
  const [hovered, setHovered] = useState(false);
  const { scale, rotation, color } = useSpring({
    scale: hovered ? 1.1 : 1,
    rotation: hovered ? [0, (Math.PI / 12) * (index % 2 === 0 ? 1 : -1), 0] : [0, 0, 0],
    color: hovered ? "#00A4FF" : "#004E8C",
  });

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation={rotation as any}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[4, 2.5, 0.1]} radius={0.1}>
        <animated.meshStandardMaterial color={color} metalness={0.8} roughness={0.2} />
      </RoundedBox>
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[3.8, 2.3]} />
        <meshStandardMaterial color="#050a15" emissive="#00A4FF" emissiveIntensity={hovered ? 0.5 : 0} />
      </mesh>
      <Text
        position={[0, 0, 0.07]}
        fontSize={0.2}
        color="white"
      >
        Project {index + 1}
      </Text>
    </animated.group>
  );
}

function Landscape() {
  const geometry = useMemo(() => {
    const geo = new THREE.PlaneGeometry(50, 50, 32, 32);
    const vertices = geo.attributes.position.array;
    for (let i = 0; i < vertices.length; i += 3) {
      vertices[i + 2] = Math.sin(vertices[i] * 0.5) * Math.cos(vertices[i + 1] * 0.5) * 2;
    }
    geo.computeVertexNormals();
    return geo;
  }, []);

  return (
    <mesh geometry={geometry} rotation={[-Math.PI / 2, 0, 0]} position={[0, -10, 0]}>
      <meshStandardMaterial color="#001a35" wireframe />
    </mesh>
  );
}

export default function Portfolio({ position }: PortfolioProps) {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  const starPositions = useMemo(() => {
    const pos = new Float32Array(500 * 3);
    for(let i=0; i<500*3; i++) pos[i] = (Math.random() - 0.5) * 100;
    return pos;
  }, []);


  return (
    <group position={position} ref={groupRef}>
      <Text
        position={[0, 5, 0]}
        fontSize={1}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      <group position={[0, 0, 0]}>
        <PortfolioScreen position={[-5, 0, 0]} index={0} />
        <PortfolioScreen position={[0, 2, -2]} index={1} />
        <PortfolioScreen position={[5, 0, 0]} index={2} />
      </group>

      <Landscape />

      <group position={[0, -15, 0]}>
        <Text
          fontSize={0.5}
          color="#00A4FF"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          تمامی حقوق محفوظ است © ۱۴۰۲ آتی‌سافت
        </Text>
      </group>

      {/* Stars for Space Effect */}
      <Float speed={4} rotationIntensity={0.5} floatIntensity={1}>
        <Points positions={starPositions} stride={3}>
          <PointMaterial transparent color="white" size={0.1} sizeAttenuation />
        </Points>
      </Float>
    </group>
  );
}

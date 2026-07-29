"use client";

import React, { useState, useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { useSpring, animated } from "@react-spring/three";
import { Html } from "@react-three/drei";
import * as THREE from "three";

interface PedestalProps {
  position: [number, number, number];
  title: string;
  description: string;
  icon: string;
  color: string;
}

export default function Pedestal({ position, title, description, icon, color }: PedestalProps) {
  const [hovered, setHovered] = useState(false);
  const meshRef = useRef<THREE.Group>(null);

  // Animated scale and rotation using react-spring for supreme smoothness
  const { scale, rotationY } = useSpring({
    scale: hovered ? [1.25, 1.25, 1.25] : [1.0, 1.0, 1.0],
    rotationY: hovered ? Math.PI / 4 : 0,
    config: { mass: 1, tension: 170, friction: 26 },
  });

  useFrame((state) => {
    if (meshRef.current && !hovered) {
      // Gently idle rotate and float when not hovered
      meshRef.current.rotation.y = Math.sin(state.clock.getElapsedTime() * 0.5) * 0.15;
      meshRef.current.position.y = position[1] + Math.sin(state.clock.getElapsedTime() * 1.5) * 0.1;
    }
  });

  return (
    <animated.group
      ref={meshRef}
      position={position}
      scale={scale as any}
      rotation-y={rotationY}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      {/* 3D Cylinder representation of the service pedestal */}
      <mesh castShadow receiveShadow>
        <cylinderGeometry args={[1.2, 1.4, 1.0, 32]} />
        <meshStandardMaterial
          color={hovered ? color : "#1e293b"}
          roughness={0.1}
          metalness={0.8}
        />
      </mesh>

      {/* Decorative ring on the pedestal top */}
      <mesh position={[0, 0.51, 0]} rotation={[Math.PI / 2, 0, 0]}>
        <ringGeometry args={[1.0, 1.15, 32]} />
        <meshBasicMaterial color={color} side={THREE.DoubleSide} />
      </mesh>

      {/* Glowing inner core visible on top */}
      <mesh position={[0, 0.52, 0]}>
        <cylinderGeometry args={[0.95, 0.95, 0.05, 32]} />
        <meshStandardMaterial
          color={color}
          emissive={color}
          emissiveIntensity={hovered ? 2.5 : 0.8}
        />
      </mesh>

      {/* HTML details rendered above the pedestal using CSS2D equivalent inside R3F Canvas */}
      <Html
        position={[0, 1.5, 0]}
        center
        distanceFactor={6}
        className="pointer-events-none"
      >
        <div
          dir="rtl"
          style={{ width: "240px" }}
          className={`p-4 bg-slate-950/95 border-2 rounded-xl text-center text-white font-sans transition-all duration-300 shadow-2xl ${
            hovered ? "border-[#00A4FF] scale-105" : "border-slate-800"
          }`}
        >
          <div className="text-3xl mb-1">{icon}</div>
          <h3 className="text-base font-black mb-1" style={{ color }}>{title}</h3>
          <p className="text-xs text-slate-300 leading-relaxed font-light">{description}</p>
        </div>
      </Html>
    </animated.group>
  );
}

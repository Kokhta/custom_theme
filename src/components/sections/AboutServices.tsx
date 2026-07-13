"use client";

import { useFrame } from "@react-three/fiber";
import { useRef, useMemo, useState } from "react";
import * as THREE from "three";
import { Html, Points, PointMaterial } from "@react-three/drei";
import { useSpring, animated, config } from "@react-spring/three";

const Pedestal = ({ position, title, content, color }: { position: [number, number, number], title: string, content: string, color: string }) => {
  const [hovered, setHovered] = useState(false);
  const meshRef = useRef<THREE.Mesh>(null);

  // Use react-spring for hover scaling
  const { scale } = useSpring({
    scale: hovered ? 1.2 : 1,
    config: config.wobbly,
  });

  useFrame((state) => {
    if (meshRef.current) {
      meshRef.current.rotation.y += 0.005;
    }
  });

  return (
    <group position={position}>
      <animated.mesh
        ref={meshRef}
        onPointerOver={() => setHovered(true)}
        onPointerOut={() => setHovered(false)}
        castShadow
        scale={scale}
      >
        <cylinderGeometry args={[1.5, 1.8, 0.5, 6]} />
        <meshStandardMaterial color={color} metalness={0.8} roughness={0.2} />
      </animated.mesh>

      <Html position={[0, 1.5, 0]} center distanceFactor={10}>
        <div className={`w-48 p-4 rounded-2xl backdrop-blur-lg border transition-all duration-300 ${hovered ? 'bg-white/20 border-white/40 scale-110' : 'bg-black/20 border-white/10'} text-white text-center font-vazir`} dir="rtl">
          <h3 className="text-xl font-bold mb-2" style={{ color }}>{title}</h3>
          <p className="text-sm opacity-80">{content}</p>
        </div>
      </Html>
    </group>
  );
};

export default function AboutServices() {
  const pointsRef = useRef<THREE.Points>(null);

  const particleCount = 2000;
  const positions = useMemo(() => {
    const pos = new Float32Array(particleCount * 3);
    for (let i = 0; i < particleCount; i++) {
      // Improved particle distribution: Icosahedron-ish
      const phi = Math.acos(-1 + (2 * i) / particleCount);
      const theta = Math.sqrt(particleCount * Math.PI) * phi;
      const radius = 5 + (Math.random() - 0.5) * 0.5;

      pos[i * 3] = radius * Math.cos(theta) * Math.sin(phi);
      pos[i * 3 + 1] = radius * Math.sin(theta) * Math.sin(phi);
      pos[i * 3 + 2] = radius * Math.cos(phi);
    }
    return pos;
  }, []);

  useFrame((state) => {
    if (pointsRef.current) {
      pointsRef.current.rotation.y += 0.002;
      pointsRef.current.rotation.x += 0.001;
    }
  });

  return (
    <group position={[0, -20, 0]}>
      {/* Particle System Logo Shape */}
      <Points ref={pointsRef} positions={positions} stride={3}>
        <PointMaterial
          transparent
          color="#00A4FF"
          size={0.05}
          sizeAttenuation={true}
          depthWrite={false}
          blending={THREE.AdditiveBlending}
        />
      </Points>

      {/* Service Pedestals */}
      <Pedestal
        position={[-5, -2, 0]}
        title="طراحی مدرن"
        content="رابط کاربری منحصر به فرد و جذاب"
        color="#00A4FF"
      />
      <Pedestal
        position={[0, -2, 2]}
        title="توسعه حرفه‌ای"
        content="استفاده از آخرین تکنولوژی‌های روز"
        color="#004E8C"
      />
      <Pedestal
        position={[5, -2, 0]}
        title="پشتیبانی"
        content="همراه شما در تمام مراحل پروژه"
        color="#22C55E"
      />
    </group>
  );
}

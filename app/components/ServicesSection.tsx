"use client";

import React, { useRef, useState, useMemo } from "react";
import { useFrame } from "@react-three/fiber";
import { Html } from "@react-three/drei";
import { useSpring, animated } from "@react-spring/three";
import * as THREE from "three";

// Colors definitions
const primaryCyan = "#00A4FF";
const deepBlue = "#004E8C";
const white = "#FFFFFF";

interface PedestalProps {
  position: [number, number, number];
  title: string;
  description: string;
  icon: string;
}

// Interactive hoverable Pedestal Component
function Pedestal({ position, title, description, icon }: PedestalProps) {
  const [hovered, setHovered] = useState(false);
  const meshRef = useRef<THREE.Group>(null);

  // Smooth hover animations using react-spring
  const { scale, rotationY, emissiveIntensity } = useSpring({
    scale: hovered ? 1.25 : 1.0,
    rotationY: hovered ? Math.PI / 4 : 0,
    emissiveIntensity: hovered ? 0.8 : 0.2,
    config: { mass: 1, tension: 170, friction: 18 }
  });

  useFrame((state) => {
    if (meshRef.current) {
      // Gentle idle oscillation
      meshRef.current.position.y = position[1] + Math.sin(state.clock.getElapsedTime() * 2 + position[0]) * 0.15;
    }
  });

  return (
    <group position={position}>
      {/* 3D Pedestal Body - represents service_platform.glb */}
      <animated.group
        ref={meshRef}
        scale={scale as any}
        rotation-y={rotationY}
        onPointerOver={() => setHovered(true)}
        onPointerOut={() => setHovered(false)}
      >
        {/* Main Base cylinder/hexagon */}
        <mesh castShadow receiveShadow>
          <cylinderGeometry args={[1.2, 1.4, 0.4, 6]} />
          <meshStandardMaterial
            color={deepBlue}
            roughness={0.1}
            metalness={0.9}
            transparent
            opacity={0.8}
          />
        </mesh>

        {/* Top glossy ring */}
        <mesh position={[0, 0.25, 0]}>
          <cylinderGeometry args={[1.0, 1.0, 0.1, 6]} />
          <meshStandardMaterial
            color={primaryCyan}
            emissive={primaryCyan}
            emissiveIntensity={emissiveIntensity as any}
            roughness={0.0}
            metalness={1.0}
          />
        </mesh>

        {/* CSS2D HTML overlay for fully responsive, RTL text rendering */}
        <Html
          position={[0, 1.5, 0]}
          center
          distanceFactor={10}
          pointerEvents="none"
          className="select-none"
        >
          <div
            dir="rtl"
            style={{ width: "200px" }}
            className={`transition-all duration-300 text-center font-sans ${
              hovered ? "scale-105 opacity-100" : "scale-100 opacity-90"
            }`}
          >
            {/* Visual Icon indicator */}
            <div className={`w-10 h-10 mx-auto rounded-full flex items-center justify-center text-lg mb-2 border ${
              hovered
                ? "bg-[#00A4FF]/20 border-[#00A4FF] text-[#00A4FF] shadow-[0_0_15px_rgba(0,164,255,0.4)]"
                : "bg-slate-900/60 border-white/10 text-white/80"
            }`}>
              {icon}
            </div>

            {/* Title */}
            <h3 className={`text-sm font-extrabold mb-1 tracking-wide ${hovered ? "text-[#00A4FF]" : "text-white"}`}>
              {title}
            </h3>

            {/* Description */}
            <p className="text-[11px] text-white/60 leading-relaxed font-medium">
              {description}
            </p>
          </div>
        </Html>
      </animated.group>
    </group>
  );
}

// 3D Particles forming Logo Shape
function LogoParticleSystem() {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 1800;

  // Compute points in circular / spherical double torus logo shape (procedural logo shape)
  const [positions] = useMemo(() => {
    const arr = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
      // Shape particles into an icosahedron shell combined with a torus ring
      if (i < 800) {
        // Core Icosahedron/Sphere distribution
        const u = Math.random();
        const v = Math.random();
        const theta = u * 2.0 * Math.PI;
        const phi = Math.acos(2.0 * v - 1.0);
        const r = 1.3 + Math.random() * 0.2; // slight thickness

        arr[i * 3] = r * Math.sin(phi) * Math.cos(theta);
        arr[i * 3 + 1] = r * Math.sin(phi) * Math.sin(theta);
        arr[i * 3 + 2] = r * Math.cos(phi);
      } else {
        // Torus Ring distribution
        const u = Math.random() * 2 * Math.PI;
        const v = Math.random() * 2 * Math.PI;
        const R = 2.4; // Torus major radius
        const r = 0.2 + Math.random() * 0.1; // Torus minor radius

        arr[i * 3] = (R + r * Math.cos(v)) * Math.cos(u);
        arr[i * 3 + 1] = (R + r * Math.cos(v)) * Math.sin(u);
        arr[i * 3 + 2] = r * Math.sin(v);
      }
    }
    return [arr];
  }, []);

  useFrame((state) => {
    if (pointsRef.current) {
      // Rotate particle logo slowly
      pointsRef.current.rotation.z = state.clock.getElapsedTime() * 0.15;
      pointsRef.current.rotation.x = Math.sin(state.clock.getElapsedTime() * 0.2) * 0.2;
    }
  });

  return (
    <points ref={pointsRef}>
      <bufferGeometry>
        <bufferAttribute
          attach="attributes-position"
          count={count}
          array={positions}
          itemSize={3}
          args={[positions, 3]}
        />
      </bufferGeometry>
      <pointsMaterial
        color={primaryCyan}
        size={0.06}
        sizeAttenuation
        transparent
        opacity={0.8}
        depthWrite={false}
        blending={THREE.AdditiveBlending}
      />
    </points>
  );
}

export default function ServicesSection() {
  return (
    <group>
      {/* Visual Header of Services Section */}
      <Html
        position={[0, 4.5, 0]}
        center
        distanceFactor={11}
        pointerEvents="none"
        className="select-none text-center"
      >
        <div dir="rtl" style={{ width: "300px" }} className="font-sans">
          <span className="text-[#00A4FF] text-[10px] font-bold tracking-[0.25em] uppercase">خدمات و چشم‌انداز</span>
          <h2 className="text-white text-2xl font-extrabold mt-1">تخصص‌های ما در آتی‌سافت</h2>
        </div>
      </Html>

      {/* 1. 3D particle system forming the shape of the Logo in the background */}
      <group position={[0, 1.2, -2]}>
        <LogoParticleSystem />
      </group>

      {/* 2. Three 3D Pedestals showcasing Design Services (RTL) */}
      <Pedestal
        position={[-3.2, -1.5, 0]}
        title="طراحی مدرن ۳ بعدی"
        description="خلق رابط‌های کاربری نسل جدید، تعاملی، مدرن و کاملاً واکنش‌گرا به سبک سه بعدی."
        icon="🎨"
      />

      <Pedestal
        position={[0, -1.8, 0.5]}
        title="توسعه و مهندسی نرم‌افزار"
        description="پیاده‌سازی پلتفرم‌ها و سرویس‌های وب پیشرفته با استفاده از فناوری‌های روزآمد دنیا."
        icon="⚡"
      />

      <Pedestal
        position={[3.2, -1.5, 0]}
        title="پشتیبانی و توسعه مداوم"
        description="پشتیبانی همه جانبه و بهینه‌سازی مداوم عملکرد پروژه جهت تضمین موفقیت کسب‌وکار شما."
        icon="🛠️"
      />
    </group>
  );
}

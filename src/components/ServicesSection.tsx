"use client";

import React, { useMemo, useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Html } from "@react-three/drei";
import * as THREE from "three";

// Individual Pedestal Component
function Pedestal({
  position,
  title,
  description,
  color,
  iconSvg,
}: {
  position: [number, number, number];
  title: string;
  description: string;
  color: string;
  iconSvg: React.ReactNode;
}) {
  const groupRef = useRef<THREE.Group>(null);
  const [hovered, setHovered] = useState(false);

  // Smooth hover transitions using useFrame lerping
  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (groupRef.current) {
      // Hover scale factor (1.0 to 1.15)
      const targetScale = hovered ? 1.15 : 1.0;
      groupRef.current.scale.lerp(new THREE.Vector3(targetScale, targetScale, targetScale), 0.1);

      // Hover rotation (slight tilt and continuous slow spin on hover)
      const targetRotY = hovered ? Math.sin(time * 1.5) * 0.2 : 0;
      const targetRotX = hovered ? 0.1 : 0;
      groupRef.current.rotation.y = THREE.MathUtils.lerp(groupRef.current.rotation.y, targetRotY, 0.1);
      groupRef.current.rotation.x = THREE.MathUtils.lerp(groupRef.current.rotation.x, targetRotX, 0.1);

      // Floating up/down
      groupRef.current.position.y = position[1] + Math.sin(time * 1.0 + position[0]) * 0.15;
    }
  });

  return (
    <group ref={groupRef} position={position}>
      {/* 3D Pedestal Platform */}
      {/* Upper cylinder cap */}
      <mesh castShadow receiveShadow position={[0, 0.2, 0]}>
        <cylinderGeometry args={[1.3, 1.4, 0.3, 32]} />
        <meshStandardMaterial
          color={hovered ? "#00A4FF" : "#1e293b"}
          emissive={hovered ? "#00A4FF" : "#090d16"}
          emissiveIntensity={hovered ? 0.4 : 0.1}
          roughness={0.1}
          metalness={0.9}
        />
      </mesh>

      {/* Main pedestal body */}
      <mesh castShadow receiveShadow position={[0, -0.6, 0]}>
        <cylinderGeometry args={[1.1, 1.3, 1.2, 32]} />
        <meshStandardMaterial
          color="#0f172a"
          roughness={0.2}
          metalness={0.8}
        />
      </mesh>

      {/* Glowing base ring */}
      <mesh position={[0, -1.2, 0]} rotation={[-Math.PI / 2, 0, 0]}>
        <ringGeometry args={[1.2, 1.4, 32]} />
        <meshBasicMaterial color={hovered ? color : "#004E8C"} side={THREE.DoubleSide} />
      </mesh>

      {/* Interactive HTML Card floating on top of the pedestal */}
      <Html position={[0, 1.3, 0]} center distanceFactor={8.5}>
        <div
          onPointerOver={() => setHovered(true)}
          onPointerOut={() => setHovered(false)}
          className={`glass-panel w-[230px] p-5 rounded-2xl border text-center transition-all duration-300 select-none cursor-pointer ${
            hovered
              ? "border-brand-cyan shadow-[0_0_20px_rgba(0,164,255,0.3)] scale-105"
              : "border-white/10"
          }`}
          dir="rtl"
        >
          {/* Circular Icon Container */}
          <div
            className={`w-12 h-12 mx-auto rounded-xl flex items-center justify-center mb-3.5 transition-all ${
              hovered ? "bg-brand-cyan text-slate-950" : "bg-slate-900 text-brand-cyan"
            }`}
          >
            {iconSvg}
          </div>

          <h3 className="text-base font-bold text-white mb-2">{title}</h3>
          <p className="text-xs text-slate-400 leading-relaxed">{description}</p>
        </div>
      </Html>
    </group>
  );
}

// Particle System forming the Logo/Core shape
function ParticleLogo() {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 2200;

  // Generate spherical coordinate positions
  const positions = useMemo(() => {
    const arr = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
      const u = Math.random();
      const v = Math.random();
      const theta = u * 2.0 * Math.PI;
      const phi = Math.acos(2.0 * v - 1.0);

      // Spherical shell with thickness
      const r = 1.8 + Math.random() * 0.5;

      const x = r * Math.sin(phi) * Math.cos(theta);
      const y = r * Math.sin(phi) * Math.sin(theta);
      const z = r * Math.cos(phi);

      arr[i * 3] = x;
      arr[i * 3 + 1] = y;
      arr[i * 3 + 2] = z;
    }
    return arr;
  }, []);

  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (pointsRef.current) {
      // Rotation
      pointsRef.current.rotation.y = time * 0.15;
      pointsRef.current.rotation.x = time * 0.08;

      // Pulsing scale
      const scale = 1.0 + Math.sin(time * 1.5) * 0.08;
      pointsRef.current.scale.set(scale, scale, scale);
    }
  });

  return (
    <group position={[0, 4.0, -1]}>
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
          size={0.065}
          color="#00A4FF"
          transparent
          opacity={0.8}
          sizeAttenuation
          depthWrite={false}
          blending={THREE.AdditiveBlending}
        />
      </points>

      {/* Internal core sphere inside the particles */}
      <mesh>
        <sphereGeometry args={[0.9, 16, 16]} />
        <meshStandardMaterial
          color="#004E8C"
          emissive="#004E8C"
          emissiveIntensity={0.5}
          wireframe
        />
      </mesh>
    </group>
  );
}

export default function ServicesSection() {
  return (
    <group position={[0, -20, 0]}>
      {/* Floating 3D Particles forming Logo core */}
      <ParticleLogo />

      {/* Main Title Section */}
      <Html position={[0, 7.2, 0]} center distanceFactor={10}>
        <div className="text-center select-none" dir="rtl">
          <span className="text-brand-cyan text-xs font-bold tracking-widest uppercase bg-brand-cyan/10 px-3.5 py-1.5 rounded-full border border-brand-cyan/20">خدمات آتی‌سافت</span>
          <h2 className="text-3xl md:text-4xl font-extrabold text-white mt-4 drop-shadow-[0_4px_10px_rgba(0,164,255,0.25)]">
            ارائه سرویس‌های مدرن سه بعدی تحت وب
          </h2>
          <p className="text-xs md:text-sm text-slate-400 mt-2 max-w-[450px] mx-auto leading-relaxed">
            ما رویای کسب‌وکار شما را به یک واقعیت سه بعدی تعاملی و قابل لمس تبدیل می‌کنیم.
          </p>
        </div>
      </Html>

      {/* 3 Pedestals with custom HTML info cards */}
      <Pedestal
        position={[-3.6, -1.0, 0]}
        title="مأموریت آتی‌سافت"
        description="تسریع و بهبود حضور شما در وب نوین با طراحی سه بعدی تعاملی، افزایش فروش و جذب چندین برابری مخاطبان هدف شما."
        color="#00A4FF"
        iconSvg={
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
            <polygon points="12 2 2 7 12 12 22 7 12 2" />
            <polyline points="2 17 12 22 22 17" />
            <polyline points="2 12 12 17 22 12" />
          </svg>
        }
      />

      <Pedestal
        position={[0, -1.0, 0.5]}
        title="طراحی مدرن و خلاق"
        description="پیاده‌سازی رابط کاربری مدرن با WebGL و React Three Fiber بدون نیاز به نصب هرگونه افزونه اضافه روی مرورگر گوشی یا دسکتاپ."
        color="#22C55E"
        iconSvg={
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
            <path d="M2 12h20" />
          </svg>
        }
      />

      <Pedestal
        position={[3.6, -1.0, 0]}
        title="پشتیبانی دائم‌العمر"
        description="همراهی گام به گام پس از لانچ، بهینه‌سازی سرعت و لود فایل‌های سه‌بعدی و ارائه آپدیت‌های زمان‌بندی شده به صورت کاملاً حرفه‌ای."
        color="#004E8C"
        iconSvg={
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
            <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
            <line x1="12" y1="22.08" x2="12" y2="12" />
          </svg>
        }
      />
    </group>
  );
}

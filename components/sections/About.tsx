"use client";

import { useMemo, useRef } from "react";
import * as THREE from "three";
import { useFrame } from "@react-three/fiber";
import { Html, Points, PointMaterial } from "@react-three/drei";

export const About = ({ position = [0, 0, 0] }: { position?: [number, number, number] }) => {
  const pointsRef = useRef<THREE.Points>(null!);

  const particleCount = 2000;
  const positions = useMemo(() => {
    const pos = new Float32Array(particleCount * 3);
    for (let i = 0; i < particleCount; i++) {
      const u = Math.random() * Math.PI * 2;
      const v = Math.random() * Math.PI * 2;
      const r1 = 1.5;
      const r2 = 0.5;
      pos[i * 3] = (r1 + r2 * Math.cos(v)) * Math.cos(u);
      pos[i * 3 + 1] = (r1 + r2 * Math.cos(v)) * Math.sin(u);
      pos[i * 3 + 2] = r2 * Math.sin(v);
    }
    return pos;
  }, []);

  useFrame((state) => {
    const t = state.clock.getElapsedTime();
    pointsRef.current.rotation.y = t * 0.2;
    pointsRef.current.rotation.x = t * 0.1;
  });

  return (
    <group position={position}>
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

      <group position={[0, -3, 0]}>
        <Pedestal position={[-3, 0, 0]} title="ماموریت" text="ارائه راهکارهای خلاقانه" />
        <Pedestal position={[0, 0, 0]} title="طراحی" text="تجربه کاربری بی‌نظیر" />
        <Pedestal position={[3, 0, 0]} title="پشتیبانی" text="همراهی همیشگی شما" />
      </group>
    </group>
  );
};

const Pedestal = ({ position, title, text }: { position: [number, number, number], title: string, text: string }) => {
  const ref = useRef<THREE.Group>(null!);

  return (
    <group
      position={position}
      ref={ref}
      onPointerOver={() => (ref.current.scale.set(1.2, 1.2, 1.2))}
      onPointerOut={() => (ref.current.scale.set(1, 1, 1))}
    >
      <mesh position={[0, -1, 0]}>
        <cylinderGeometry args={[1, 1.2, 0.5, 32]} />
        <meshStandardMaterial color="#004E8C" />
      </mesh>
      <Html position={[0, 0, 0]} center transform distanceFactor={5}>
        <div className="text-center text-white bg-black/40 p-4 rounded-xl backdrop-blur-sm border border-white/10 w-40" dir="rtl">
          <h3 className="text-lg font-bold mb-1">{title}</h3>
          <p className="text-xs opacity-80">{text}</p>
        </div>
      </Html>
    </group>
  );
};

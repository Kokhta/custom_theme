"use client";

import React, { useMemo, useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { useScroll, Html } from "@react-three/drei";
import * as THREE from "three";

export default function CurvedDashboard() {
  const scroll = useScroll();

  // Create curved sleek 3D dashboard segment representing stats_panel.glb
  const curveGeometry = useMemo(() => {
    // We can use a cylinder segment (thetaLength) to form a perfect futuristic curved dashboard panel
    return new THREE.CylinderGeometry(5.0, 5.2, 2.5, 32, 1, true, -Math.PI / 4, Math.PI / 2);
  }, []);

  const stats = [
    { label: "سال تاسیس", targetNum: "۱۳۹۸", index: 0, color: "#00A4FF" },
    { label: "شعبه فعال", targetNum: "۳", index: 1, color: "#22C55E" },
    { label: "پروژه موفق", targetNum: "۹۵+", index: 2, color: "#004E8C" },
    { label: "متخصص خلاق", targetNum: "۷+", index: 3, color: "#a855f7" },
  ];

  // We'll compute the "explode/assemble" transition using useFrame with useScroll offset.
  // The numbers float down from the top (+10) into their spots as the user reaches this section.
  const animatedPositions = useMemo(() => {
    return stats.map((_, idx) => {
      // Map horizontal spacing on the curved panel [-3.5 to 3.5]
      const t = idx / (stats.length - 1);
      const x = -3.5 + t * 7.0;
      const y = 0.5;
      const z = -Math.sin(t * Math.PI) * 0.8;
      return new THREE.Vector3(x, y, z);
    });
  }, []);

  return (
    <group>
      {/* 1. Curved Dashboard Panel */}
      <mesh geometry={curveGeometry} position={[0, -0.4, -0.5]}>
        <meshStandardMaterial
          color="#0b1329"
          roughness={0.2}
          metalness={0.9}
          side={THREE.DoubleSide}
          transparent
          opacity={0.85}
        />
      </mesh>

      {/* Decorative cyber line on top border of dashboard */}
      <mesh position={[0, 0.86, -0.5]} rotation={[Math.PI / 2, 0, 0]}>
        <ringGeometry args={[4.95, 5.05, 32, 1, -Math.PI / 4, Math.PI / 2]} />
        <meshBasicMaterial color="#00A4FF" side={THREE.DoubleSide} />
      </mesh>

      {/* 2. Interactive Exploding Numbers using useFrame interpolation based on Scroll offset */}
      {stats.map((stat, idx) => (
        <StatNumber
          key={stat.label}
          label={stat.label}
          targetNum={stat.targetNum}
          targetPos={animatedPositions[idx]}
          color={stat.color}
          scroll={scroll}
        />
      ))}
    </group>
  );
}

interface StatNumberProps {
  label: string;
  targetNum: string;
  targetPos: THREE.Vector3;
  color: string;
  scroll: any;
}

function StatNumber({ label, targetNum, targetPos, color, scroll }: StatNumberProps) {
  const currentPos = useMemo(() => new THREE.Vector3(targetPos.x, targetPos.y + 12, targetPos.z), [targetPos]);
  const groupRef = useRef<THREE.Group>(null);

  useFrame(() => {
    // Stats section viewport target: scrollOffset around 0.65 to 0.78
    // We interpolate the "fall and settle" transition based on scroll offset.
    const scrollOffset = scroll.offset; // 0 to 1
    const startOffset = 0.58;
    const endOffset = 0.72;

    let progress = 0;
    if (scrollOffset >= startOffset) {
      progress = Math.min((scrollOffset - startOffset) / (endOffset - startOffset), 1.0);
    }

    // Elastic bounce ease-out interpolation
    const easeOutElastic = (x: number): number => {
      const c4 = (2 * Math.PI) / 3;
      return x === 0
        ? 0
        : x === 1
        ? 1
        : Math.pow(2, -10 * x) * Math.sin((x * 10 - 0.75) * c4) + 1;
    };

    const animatedT = easeOutElastic(progress);

    // Lerp from floating top down to the targets
    const lerpedY = THREE.MathUtils.lerp(targetPos.y + 12, targetPos.y, animatedT);
    currentPos.set(targetPos.x, lerpedY, targetPos.z);

    if (groupRef.current) {
      groupRef.current.position.copy(currentPos);
      // Soft orbit tilt based on scroll
      groupRef.current.rotation.y = (1.0 - progress) * 1.5;
    }
  });

  return (
    <group ref={groupRef}>
      {/* Dynamic high-fidelity CSS text formatting on top of 3D Dashboard */}
      <Html center distanceFactor={8} className="pointer-events-none">
        <div
          dir="rtl"
          style={{ width: "160px" }}
          className="flex flex-col items-center justify-center p-4 bg-slate-950/90 border border-slate-800 rounded-2xl shadow-xl backdrop-blur-md select-none transition-transform hover:scale-110 duration-300"
        >
          <span
            className="text-4xl font-extrabold tracking-tight filter drop-shadow"
            style={{ color }}
          >
            {targetNum}
          </span>
          <span className="text-xs text-slate-300 font-bold mt-2 text-center whitespace-nowrap">
            {label}
          </span>
        </div>
      </Html>
    </group>
  );
}

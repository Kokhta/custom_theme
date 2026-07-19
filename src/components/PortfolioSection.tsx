"use client";

import React, { useMemo, useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Html } from "@react-three/drei";
import * as THREE from "three";

interface PortfolioItem {
  title: string;
  category: string;
  tech: string;
  imageColor: string;
  accentColor: string;
  link: string;
}

const PORTFOLIOS: PortfolioItem[] = [
  {
    title: "صرافی رمزارز سه بعدی",
    category: "پلتفرم مالی تعاملی",
    tech: "React + Three.js + Node",
    imageColor: "#004E8C",
    accentColor: "#00A4FF",
    link: "#",
  },
  {
    title: "شخصی‌ساز سه بعدی خودرو",
    category: "فروشگاهی نسل جدید",
    tech: "Next.js + R3F + Tailwind",
    imageColor: "#0f172a",
    accentColor: "#22C55E",
    link: "#",
  },
  {
    title: "متاورس گالری آثار هنری",
    category: "گالری واقعیت مجازی",
    tech: "Three.js + Blender + GLSL",
    imageColor: "#1e1b4b",
    accentColor: "#EC4899",
    link: "#",
  },
];

// Individual Floating/Tilting Screen Component
function PortfolioScreen({
  position,
  item,
}: {
  position: [number, number, number];
  item: PortfolioItem;
}) {
  const meshRef = useRef<THREE.Group>(null);
  const [hovered, setHovered] = useState(false);
  const pointerPos = useRef({ x: 0, y: 0 });

  const handlePointerMove = (e: any) => {
    if (!hovered) return;
    // Map pointer coordinates to range [-0.5, 0.5]
    pointerPos.current.x = e.uv.x - 0.5;
    pointerPos.current.y = e.uv.y - 0.5;
  };

  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (meshRef.current) {
      // Floating motion
      meshRef.current.position.y = position[1] + Math.sin(time * 1.5 + position[0]) * 0.15;

      // Tilting effect on hover towards mouse cursor
      const targetRotX = hovered ? -pointerPos.current.y * 0.4 : 0;
      const targetRotY = hovered ? pointerPos.current.x * 0.4 : 0;
      const targetRotZ = hovered ? pointerPos.current.x * 0.1 : 0;

      meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, targetRotX, 0.1);
      meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, targetRotY, 0.1);
      meshRef.current.rotation.z = THREE.MathUtils.lerp(meshRef.current.rotation.z, targetRotZ, 0.1);

      // Scale pulse on hover
      const targetScale = hovered ? 1.08 : 1.0;
      meshRef.current.scale.lerp(new THREE.Vector3(targetScale, targetScale, targetScale), 0.1);
    }
  });

  return (
    <group
      ref={meshRef}
      position={position}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => {
        setHovered(false);
        pointerPos.current = { x: 0, y: 0 };
      }}
      onPointerMove={handlePointerMove}
    >
      {/* 3D Screen Frame (Bezel) */}
      <mesh castShadow receiveShadow>
        <boxGeometry args={[3.2, 2.0, 0.15]} />
        <meshStandardMaterial
          color={hovered ? "#00A4FF" : "#1e293b"}
          emissive={hovered ? "#004E8C" : "#020617"}
          emissiveIntensity={hovered ? 0.8 : 0.1}
          roughness={0.15}
          metalness={0.9}
        />
      </mesh>

      {/* Screen Face (Dark Placeholder Web Layout with Neon Blue Glow) */}
      <mesh position={[0, 0, 0.08]}>
        <planeGeometry args={[3.0, 1.8]} />
        <meshStandardMaterial
          color={hovered ? "#020617" : "#020617"}
          emissive={hovered ? "#00A4FF" : "#020617"}
          emissiveIntensity={hovered ? 0.35 : 0.0}
          roughness={0.2}
          metalness={0.8}
        />
      </mesh>

      {/* Back Screen Stand Pedestal */}
      <mesh position={[0, -1.1, -0.2]} castShadow>
        <cylinderGeometry args={[0.15, 0.25, 0.4, 16]} />
        <meshStandardMaterial color="#0f172a" roughness={0.3} metalness={0.7} />
      </mesh>
      <mesh position={[0, -1.3, -0.2]} castShadow>
        <cylinderGeometry args={[0.6, 0.7, 0.1, 16]} />
        <meshStandardMaterial color="#0f172a" roughness={0.3} metalness={0.7} />
      </mesh>

      {/* Overlaid UI Portfolio contents inside Screen face */}
      <Html transform distanceFactor={4.5} position={[0, 0, 0.1]} center occlude>
        <div
          className={`w-[290px] h-[170px] rounded-lg p-4 select-none pointer-events-none transition-all duration-300 flex flex-col justify-between ${
            hovered ? "bg-slate-950/95" : "bg-slate-900/90"
          }`}
          dir="rtl"
        >
          {/* Mock Browser Header */}
          <div className="flex items-center justify-between border-b border-white/5 pb-2 mb-2">
            <div className="flex gap-1">
              <span className="w-2 h-2 rounded-full bg-red-500" />
              <span className="w-2 h-2 rounded-full bg-yellow-500" />
              <span className="w-2 h-2 rounded-full bg-green-500" />
            </div>
            <div className="text-[8px] text-slate-500 bg-white/5 px-4 py-0.5 rounded-full font-mono max-w-[120px] truncate">
              {item.title === "صرافی رمزارز سه بعدی" ? "atisoft.io/exchange" : item.title === "شخصی‌ساز سه بعدی خودرو" ? "atisoft.io/configurator" : "atisoft.io/metaverse"}
            </div>
          </div>

          {/* Main Portfolio Metadata */}
          <div className="flex-1 flex flex-col justify-center">
            <span
              className="text-[9px] font-bold tracking-widest uppercase mb-1.5"
              style={{ color: item.accentColor }}
            >
              {item.category}
            </span>
            <h3 className="text-sm font-black text-white leading-relaxed mb-1.5">
              {item.title}
            </h3>
            <span className="text-[8px] text-slate-400 font-mono">
              تکنولوژی: {item.tech}
            </span>
          </div>

          {/* Mock CTA Button */}
          <div className="flex items-center justify-between mt-2 border-t border-white/5 pt-2">
            <span className="text-[8px] text-slate-500">طراحی شده توسط آتی‌سافت</span>
            <button
              style={{
                backgroundColor: item.accentColor + "20",
                color: item.accentColor,
                borderColor: item.accentColor + "40",
              }}
              className="px-2.5 py-1 rounded-md text-[8px] font-bold border transition-all"
            >
              مشاهده دمو آنلاین ↗
            </button>
          </div>
        </div>
      </Html>
    </group>
  );
}

// Low-poly landscape representing space colony terrain (Footer)
function SpaceLandscape() {
  const meshRef = useRef<THREE.Mesh>(null);
  const wireframeRef = useRef<THREE.LineSegments>(null);

  // Generate deterministic low-poly mountain vertices
  const { geometry, wireframeGeometry } = useMemo(() => {
    const geo = new THREE.PlaneGeometry(60, 40, 24, 24);

    // Perturb vertices
    const pos = geo.attributes.position;
    for (let i = 0; i < pos.count; i++) {
      const x = pos.getX(i);
      const y = pos.getY(i);

      // Use combination of sin waves for a natural mountain feel
      const z = Math.sin(x * 0.15) * Math.cos(y * 0.15) * 2.5 +
                Math.sin(x * 0.05) * 1.5 +
                Math.cos(y * 0.05) * 1.5;

      pos.setZ(i, z);
    }
    geo.computeVertexNormals();

    const wire = new THREE.WireframeGeometry(geo);
    return { geometry: geo, wireframeGeometry: wire };
  }, []);

  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (meshRef.current) {
      // Slow rotation to represent space motion
      meshRef.current.rotation.z = time * 0.015;
    }
    if (wireframeRef.current) {
      wireframeRef.current.rotation.z = time * 0.015;
    }
  });

  return (
    <group position={[0, -11.0, -10]} rotation={[-Math.PI / 2.3, 0, 0]}>
      {/* Mountain Solid Mesh */}
      <mesh ref={meshRef} geometry={geometry}>
        <meshStandardMaterial
          color="#090d16"
          roughness={0.8}
          metalness={0.2}
          flatShading
        />
      </mesh>

      {/* Futuristic Grid Overlay on top of mountains */}
      <lineSegments ref={wireframeRef} geometry={wireframeGeometry}>
        <lineBasicMaterial color="#00A4FF" transparent opacity={0.22} />
      </lineSegments>
    </group>
  );
}

export default function PortfolioSection() {
  return (
    <group position={[0, -80, 0]}>
      {/* Title */}
      <Html position={[0, 6.4, 0]} center distanceFactor={10}>
        <div className="text-center select-none" dir="rtl">
          <span className="text-brand-cyan text-xs font-bold tracking-widest uppercase bg-brand-cyan/10 px-3.5 py-1.5 rounded-full border border-brand-cyan/20">نمونه کارها</span>
          <h2 className="text-3xl md:text-4xl font-extrabold text-white mt-4 drop-shadow-[0_4px_10px_rgba(0,164,255,0.25)]">
            شاهکارهای تعاملی آتی‌سافت
          </h2>
          <p className="text-xs md:text-sm text-slate-400 mt-2 max-w-[420px] mx-auto">
            مکان‌نمای ماوس را روی مانیتورها حرکت دهید تا به سمت شما بچرخند و بدرخشند.
          </p>
        </div>
      </Html>

      {/* Three Floating Portfolio Screens */}
      {PORTFOLIOS.map((item, i) => {
        const xPos = -4.0 + i * 4.0;
        const zPos = i === 1 ? 0.8 : 0; // Middle screen is closer
        return (
          <PortfolioScreen
            key={item.title}
            position={[xPos, 1.2, zPos]}
            item={item}
          />
        );
      })}

      {/* 3D Low-Poly Landscape Plane fading into the cosmos */}
      <SpaceLandscape />

      {/* Stars particles in the back to establish outer space atmosphere */}
      <StarsParticles />

      {/* Absolute Ending Footer Notice */}
      <Html position={[0, -10.5, 0]} center distanceFactor={10}>
        <div className="text-center select-none mt-12 whitespace-nowrap" dir="rtl">
          <p className="text-slate-500 text-[11px] uppercase tracking-wider font-mono">
            تمامی حقوق مادی و معنوی محفوظ است © ۱۴۰۳ آتی‌سافت (Atisoft)
          </p>
          <p className="text-[9px] text-slate-600 mt-1">
            قدرت گرفته از تکنولوژی‌های سه بعدی وب تحت مدیریت و نظارت تیم فنی آتی‌سافت
          </p>
        </div>
      </Html>
    </group>
  );
}

// Sparkly space background particles
function StarsParticles() {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 400;

  const positions = useMemo(() => {
    const arr = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
      // Scatter randomly around space Y=[-88, -72], X=[-30, 30], Z=[-30, 10]
      arr[i * 3] = (Math.random() - 0.5) * 60;
      arr[i * 3 + 1] = (Math.random() - 0.5) * 20 - 5;
      arr[i * 3 + 2] = (Math.random() - 0.5) * 40 - 15;
    }
    return arr;
  }, []);

  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (pointsRef.current) {
      pointsRef.current.rotation.y = time * 0.03;
    }
  });

  return (
    <points ref={pointsRef} position={[0, 0, 0]}>
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
        size={0.12}
        color="#ffffff"
        transparent
        opacity={0.6}
        sizeAttenuation
      />
    </points>
  );
}

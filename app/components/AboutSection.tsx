import { useRef, useMemo, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Html } from "@react-three/drei";
import * as THREE from "three";

// Individual Pedestal Component
function Pedestal({
  position,
  title,
  subtitle,
  desc,
  color,
  emissive,
}: {
  position: [number, number, number];
  title: string;
  subtitle: string;
  desc: string;
  color: string;
  emissive: string;
}) {
  const meshRef = useRef<THREE.Group>(null);
  const [hovered, setHovered] = useState(false);

  useFrame((state) => {
    if (meshRef.current) {
      const t = state.clock.getElapsedTime();

      // Smooth hover scale scaling
      const targetScale = hovered ? 1.15 : 1.0;
      meshRef.current.scale.lerp(
        new THREE.Vector3(targetScale, targetScale, targetScale),
        0.15
      );

      // Smooth hover rotation & hover drift
      const targetRotY = hovered
        ? Math.sin(t * 1.8) * 0.15 + 0.3
        : Math.sin(t * 0.4) * 0.06;
      meshRef.current.rotation.y = THREE.MathUtils.lerp(
        meshRef.current.rotation.y,
        targetRotY,
        0.1
      );

      // Float position oscillation
      meshRef.current.position.y =
        position[1] + Math.sin(t * 1.2 + position[0]) * 0.12;
    }
  });

  return (
    <group
      ref={meshRef}
      position={[position[0], position[1], position[2]]}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      {/* Hexagonal cybernetic pillar platform */}
      <mesh castShadow receiveShadow>
        <cylinderGeometry args={[1.1, 1.3, 1.4, 6]} />
        <meshStandardMaterial
          color="#0b1329"
          roughness={0.12}
          metalness={0.9}
          transparent
          opacity={0.85}
        />
      </mesh>

      {/* Cybernetic neon rim wireframe */}
      <mesh position={[0, 0.71, 0]}>
        <cylinderGeometry args={[1.11, 1.11, 0.08, 6, 1, true]} />
        <meshStandardMaterial
          color={color}
          emissive={emissive}
          emissiveIntensity={2.5}
          wireframe
        />
      </mesh>

      {/* Interactive glowing core sphere inside platform */}
      <mesh position={[0, 0.1, 0]}>
        <sphereGeometry args={[0.3, 12, 12]} />
        <meshStandardMaterial
          color={color}
          emissive={emissive}
          emissiveIntensity={2.0}
        />
      </mesh>

      {/* Floating Holographic Content Card */}
      <Html position={[0, 1.6, 0]} distanceFactor={8} center transform>
        <div
          className={`glassmorphism rounded-2xl p-4 text-right transition-all duration-300 pointer-events-none select-none border-t-2 relative overflow-hidden`}
          style={{
            width: "240px",
            borderColor: hovered ? color : "rgba(0, 164, 255, 0.2)",
            boxShadow: hovered
              ? `0 10px 25px -5px ${emissive}40`
              : "0 8px 32px 0 rgba(0, 0, 0, 0.37)",
          }}
        >
          {/* Subtle neon spotlight background */}
          <div
            className="absolute top-0 right-0 w-12 h-12 rounded-full blur-xl pointer-events-none"
            style={{ backgroundColor: `${emissive}15` }}
          />

          <div className="flex items-center justify-between mb-2">
            <span
              className="w-2 h-2 rounded-full animate-ping"
              style={{ backgroundColor: color }}
            />
            <h4 className="text-[10px] font-semibold text-slate-400 tracking-wide">
              {subtitle}
            </h4>
          </div>
          <h3 className="text-sm font-bold text-white mb-2">{title}</h3>
          <p className="text-[11px] text-slate-300 leading-relaxed font-light">
            {desc}
          </p>
        </div>
      </Html>
    </group>
  );
}

// 3D Particle System representing Atisoft Logo structure
function LogoParticles() {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 1200;

  const [positions, colors] = useMemo(() => {
    const pos = new Float32Array(count * 3);
    const col = new Float32Array(count * 3);

    for (let i = 0; i < count; i++) {
      // Uniform spherical coordinate generation (icosahedron/sphere surface approximation)
      const phi = Math.acos(-1 + (2 * i) / count);
      const theta = Math.sqrt(count * Math.PI) * phi;

      const radius = 3.2;
      const x = radius * Math.sin(phi) * Math.cos(theta);
      const y = radius * Math.sin(phi) * Math.sin(theta);
      const z = radius * Math.cos(phi);

      // Create a layered double-shell structure
      const shell = i % 3 === 0 ? 0.75 : 1.0;

      pos[i * 3] = x * shell;
      pos[i * 3 + 1] = y * shell;
      pos[i * 3 + 2] = z * shell;

      // Color scheme distribution: Primary Cyan, Deep Blue, and Emerald Green
      if (i % 3 === 0) {
        col[i * 3] = 0.0; // R
        col[i * 3 + 1] = 0.64; // G
        col[i * 3 + 2] = 1.0; // B (cyan #00A4FF)
      } else if (i % 3 === 1) {
        col[i * 3] = 0.0; // R
        col[i * 3 + 1] = 0.3; // G
        col[i * 3 + 2] = 0.55; // B (deep blue #004E8C)
      } else {
        col[i * 3] = 0.13; // R
        col[i * 3 + 1] = 0.77; // G
        col[i * 3 + 2] = 0.36; // B (emerald green #22C55E)
      }
    }

    return [pos, col];
  }, []);

  useFrame((state) => {
    if (pointsRef.current) {
      const t = state.clock.getElapsedTime();
      pointsRef.current.rotation.y = t * 0.08;
      pointsRef.current.rotation.x = t * 0.04;

      const breathe = 1.0 + Math.sin(t * 1.5) * 0.06;
      pointsRef.current.scale.set(breathe, breathe, breathe);
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
        <bufferAttribute
          attach="attributes-color"
          count={count}
          array={colors}
          itemSize={3}
          args={[colors, 3]}
        />
      </bufferGeometry>
      <pointsMaterial
        size={0.08}
        vertexColors
        transparent
        opacity={0.8}
        sizeAttenuation={true}
        depthWrite={false}
      />
    </points>
  );
}

export function AboutSection() {
  return (
    <group position={[0, -20, 0]}>
      {/* Background Neon Logo Particle Core */}
      <group position={[0, 2.2, -3]}>
        <LogoParticles />
      </group>

      {/* About Section Header Title */}
      <group position={[0, 4.0, 0]}>
        <Html distanceFactor={10} center transform>
          <div className="text-center" style={{ width: "350px" }}>
            <h2 className="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-1">
              خدمات آتی‌سافت
            </h2>
            <p className="text-xs text-slate-400 leading-relaxed font-light">
              پیشرو در توسعه ایده‌های بلندپروازانه با فناوری‌های پیشتاز
            </p>
          </div>
        </Html>
      </group>

      {/* 3 Pedestals with Hologram Cards */}
      <Pedestal
        position={[-3.3, -1.2, 1.2]}
        title="ماموریت ما"
        subtitle="MISSION & VALUES"
        desc="خلق پلتفرم‌های دیجیتال هوشمند و سه بعدی که فراتر از استانداردهای روز پرواز کرده و برند شما را در قله‌های نوآوری قرار می‌دهند."
        color="#00A4FF"
        emissive="#004E8C"
      />

      <Pedestal
        position={[0, -1.5, 2.2]}
        title="طراحی خلاق و ۳ بعدی"
        subtitle="3D INTERACTION"
        desc="تلفیق معماری سه بعدی، انیمیشن‌های تعاملی و فناوری R3F جهت تبدیل صفحات ایستای اینترنتی به تجربیات فراموش‌نشدنی و غوطه‌ور ساز."
        color="#22C55E"
        emissive="#15803d"
      />

      <Pedestal
        position={[3.3, -1.2, 1.2]}
        title="پشتیبانی دائم"
        subtitle="DELIVERY & SUPPORT"
        desc="همراهی گام به گام از خلق سناریو تا استقرار کامل سرور، همراه با گارانتی عملکرد پرسرعت و بهینه‌سازی مداوم سئو و تجربه کاربر."
        color="#00A4FF"
        emissive="#004E8C"
      />
    </group>
  );
}

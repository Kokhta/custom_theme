import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { useScroll, Html, RoundedBox } from "@react-three/drei";
import * as THREE from "three";

export function StatsSection() {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  const stats = [
    {
      number: "۱۳۹۸",
      label: "سال تاسیس آتی‌سافت",
      desc: "آغاز پیشتازی در وب ۳ بعدی",
      color: "#00A4FF",
      glow: "#00A4FF",
    },
    {
      number: "۳",
      label: "دفاتر فعال کشوری",
      desc: "تهران، اصفهان و کیش",
      color: "#22C55E",
      glow: "#22C55E",
    },
    {
      number: "۹۵",
      label: "پروژه‌های موفق",
      desc: "سامانه‌ها و پورتال‌های تعاملی",
      color: "#00A4FF",
      glow: "#00A4FF",
    },
    {
      number: "۷",
      label: "افتخارات برتر سال",
      desc: "تندیس نوآوری وب ملی",
      color: "#22C55E",
      glow: "#22C55E",
    },
  ];

  // Store references to the individual stats nodes to animate them dynamically
  const statNodesRefs = useRef<Array<THREE.Group | null>>([]);

  useFrame((state) => {
    const offset = scroll.offset; // Ranges from 0 to 1

    // Apply staggered scroll-based fly-in 'explode' calculations
    statNodesRefs.current.forEach((node, idx) => {
      if (node) {
        // Stats fly in staggered from the top based on current scroll depth
        // This triggers when scroll.offset enters the 0.55 to 0.75 range
        const baseOffset = 0.55;
        const stagger = idx * 0.05;
        const progress = Math.max(
          0,
          Math.min(1, (offset - baseOffset - stagger) / 0.12)
        );

        // Exponential smoothing/bouncing effect
        const easeProgress = 1 - Math.pow(2, -10 * progress);

        // Explode Offset: starts at 12 units and settles smoothly to 0
        const explodeY = (1 - easeProgress) * 12;

        node.position.y = -explodeY;
        node.scale.setScalar(easeProgress);
      }
    });

    if (groupRef.current) {
      // Gentle ambient floating dashboard drift
      const t = state.clock.getElapsedTime();
      groupRef.current.position.y = -60 + Math.sin(t * 1.1) * 0.12;
      groupRef.current.rotation.y = Math.sin(t * 0.35) * 0.04;
    }
  });

  return (
    <group ref={groupRef}>
      {/* Section Header Title */}
      <group position={[0, 4.0, 0]}>
        <Html distanceFactor={10} center transform>
          <div className="text-center" style={{ width: "350px" }}>
            <h2 className="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-1">
              آمار و افتخارات آتی‌سافت
            </h2>
            <p className="text-xs text-slate-400 leading-relaxed font-light">
              ثمره سال‌ها کار تیمی متمرکز بر کیفیت، سرعت و خلاقیت بصری
            </p>
          </div>
        </Html>
      </group>

      {/* Curved 3D Dashboard backplate representing stats_panel.glb */}
      <group position={[0, 0.4, -0.6]}>
        <RoundedBox args={[11.5, 3.4, 0.25]} radius={0.15} smoothness={4}>
          <meshStandardMaterial
            color="#070b16"
            roughness={0.15}
            metalness={0.9}
            transparent
            opacity={0.8}
          />
        </RoundedBox>

        {/* Dashboard grid lines overlay */}
        <mesh position={[0, 0, 0.14]}>
          <planeGeometry args={[11.2, 3.1]} />
          <meshStandardMaterial
            color="#00A4FF"
            wireframe
            transparent
            opacity={0.06}
          />
        </mesh>

        {/* Glowing holographic glass border */}
        <mesh position={[0, 1.7, 0.15]}>
          <boxGeometry args={[11.6, 0.06, 0.2]} />
          <meshBasicMaterial color="#00A4FF" transparent opacity={0.65} />
        </mesh>
      </group>

      {/* Individual Stat nodes arranged beautifully in a curve */}
      {stats.map((stat, idx) => {
        // Curved path coordinates matching curved stats dashboard
        const xPos = -4.5 + idx * 3.0;
        const zPos = -Math.pow(idx - 1.5, 2) * 0.25 + 0.1;

        return (
          <group key={stat.label} position={[xPos, 0.4, zPos]}>
            <group
              ref={(el) => {
                statNodesRefs.current[idx] = el;
              }}
            >
              {/* Stat card backplate representing service_platform / stats rounded boxes */}
              <RoundedBox args={[2.6, 2.4, 0.12]} radius={0.1} smoothness={2}>
                <meshStandardMaterial
                  color="#0a1022"
                  roughness={0.1}
                  metalness={0.85}
                  transparent
                  opacity={0.8}
                />
              </RoundedBox>

              {/* Neon border shadow halo */}
              <mesh position={[0, 0, -0.07]} scale={[1.04, 1.04, 1.0]}>
                <planeGeometry args={[2.6, 2.4]} />
                <meshBasicMaterial
                  color={stat.color}
                  transparent
                  opacity={0.15}
                />
              </mesh>

              {/* Farsi statistics values HTML overlay */}
              <Html distanceFactor={7} center transform position={[0, 0, 0.08]}>
                <div
                  className="flex flex-col items-center justify-center p-3 select-none text-right"
                  style={{ width: "170px" }}
                >
                  {/* Glowing 3D Stats Value */}
                  <div
                    className="text-4xl font-extrabold tracking-wide mb-1 transition-all duration-300 hover:scale-105"
                    style={{
                      color: stat.color,
                      textShadow: `0 0 15px ${stat.color}90`,
                    }}
                  >
                    {stat.number}
                  </div>

                  {/* Horizontal neon divider */}
                  <div
                    className="w-10 h-0.5 rounded-full mb-2.5"
                    style={{ backgroundColor: stat.color }}
                  />

                  {/* Label */}
                  <h3 className="text-xs font-bold text-white mb-1">
                    {stat.label}
                  </h3>
                  {/* Detailed Description */}
                  <p className="text-[9px] text-slate-300 font-light leading-snug text-center">
                    {stat.desc}
                  </p>
                </div>
              </Html>
            </group>
          </group>
        );
      })}
    </group>
  );
}

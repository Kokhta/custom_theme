"use client";

import { useMemo, useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Points, PointMaterial, Html, Text } from "@react-three/drei";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

export default function AboutServices() {
  const pointsCount = 3000;

  const positions = useMemo(() => {
    const pos = new Float32Array(pointsCount * 3);
    for (let i = 0; i < pointsCount; i++) {
      const angle = Math.random() * Math.PI * 2;
      const radius = 1.5 + Math.random() * 0.5;
      pos[i * 3] = Math.cos(angle) * radius;
      pos[i * 3 + 1] = Math.sin(angle) * radius;
      pos[i * 3 + 2] = (Math.random() - 0.5) * 1;
    }
    return pos;
  }, []);

  const pointsRef = useRef<THREE.Points>(null);

  useFrame((state) => {
    if (pointsRef.current) {
      pointsRef.current.rotation.z = state.clock.elapsedTime * 0.1;
      pointsRef.current.rotation.y = Math.sin(state.clock.elapsedTime * 0.2) * 0.2;
    }
  });

  return (
    <group>
      <group position={[0, 0, -2]}>
        <Points ref={pointsRef} positions={positions} stride={3} frustumCulled={false}>
          <PointMaterial
            transparent
            color="#00A4FF"
            size={0.05}
            sizeAttenuation={true}
            depthWrite={false}
            blending={THREE.AdditiveBlending}
          />
        </Points>
      </group>

      <Text
        position={[0, 2.5, 0]}
        fontSize={0.4}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        خدمات ما
      </Text>

      <group position={[0, -1, 0]}>
        <Pedestal
          position={[-2.5, 0, 0]}
          color="#004E8C"
          title="پشتیبانی"
          description="همراهی همیشگی در تمام مراحل"
        />
        <Pedestal
          position={[0, 0, 0]}
          color="#00A4FF"
          title="طراحی مدرن"
          description="خلق تجربه‌های بصری منحصر به فرد"
        />
        <Pedestal
          position={[2.5, 0, 0]}
          color="#004E8C"
          title="ماموریت ما"
          description="تحول دیجیتال کسب و کار شما"
        />
      </group>
    </group>
  );
}

function Pedestal({ position, color, title, description }: { position: [number, number, number]; color: string; title: string; description: string }) {
  const [hovered, setHovered] = useState(false);

  const { scale, rotationY } = useSpring({
    scale: hovered ? 1.2 : 1,
    rotationY: hovered ? Math.PI / 4 : 0,
    config: { mass: 1, tension: 170, friction: 26 }
  });

  return (
    <animated.group
      position={position}
      scale={scale}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <mesh>
        <cylinderGeometry args={[0.8, 1, 0.4, 32]} />
        <meshStandardMaterial color={color} metalness={0.8} roughness={0.2} />
      </mesh>

      <Html position={[0, 0.5, 0]} center distanceFactor={4}>
        <div className="text-center w-48 select-none pointer-events-none" dir="rtl">
          <h3 className="text-white font-bold text-lg mb-1">{title}</h3>
          <p className="text-white/70 text-xs leading-relaxed">{description}</p>
        </div>
      </Html>
    </animated.group>
  );
}

"use client";

import { useFrame } from "@react-three/fiber";
import { Points, PointMaterial, Html } from "@react-three/drei";
import { useRef, useMemo, useState } from "react";
import * as THREE from "three";
import { animated, useSpring } from "@react-spring/three";

interface AboutProps {
  position: [number, number, number];
}

function LogoParticles() {
  const count = 2000;
  const positions = useMemo(() => {
    const pos = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
      // Form a sphere-like shape for the logo placeholder
      const phi = Math.acos(-1 + (2 * i) / count);
      const theta = Math.sqrt(count * Math.PI) * phi;
      pos[i * 3] = 3 * Math.cos(theta) * Math.sin(phi);
      pos[i * 3 + 1] = 3 * Math.sin(theta) * Math.sin(phi);
      pos[i * 3 + 2] = 3 * Math.cos(phi);
    }
    return pos;
  }, []);

  const pointsRef = useRef<THREE.Points>(null);
  useFrame((state) => {
    if (pointsRef.current) {
      pointsRef.current.rotation.y = state.clock.getElapsedTime() * 0.2;
    }
  });

  return (
    <Points ref={pointsRef} positions={positions} stride={3} frustumCulled={false}>
      <PointMaterial
        transparent
        color="#00A4FF"
        size={0.05}
        sizeAttenuation={true}
        depthWrite={false}
      />
    </Points>
  );
}

function Pedestal({ position, title, content }: { position: [number, number, number], title: string, content: string }) {
  const [hovered, setHovered] = useState(false);
  const { scale, rotation } = useSpring({
    scale: hovered ? 1.2 : 1,
    rotation: hovered ? [0, Math.PI / 4, 0] : [0, 0, 0],
    config: { mass: 1, tension: 170, friction: 26 }
  });

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation={rotation as any}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <mesh>
        <cylinderGeometry args={[1.5, 1.8, 0.5, 32]} />
        <meshStandardMaterial color="#004E8C" metalness={0.8} roughness={0.2} />
      </mesh>
      <Html position={[0, 1.5, 0]} center>
        <div className="glass p-4 rounded-xl text-center w-48 pointer-events-none select-none">
          <h3 className="text-primary-cyan font-bold mb-2">{title}</h3>
          <p className="text-white text-xs">{content}</p>
        </div>
      </Html>
    </animated.group>
  );
}

export default function About({ position }: AboutProps) {
  return (
    <group position={position}>
      <LogoParticles />

      <group position={[0, -5, 0]}>
        <Pedestal
          position={[-5, 0, 0]}
          title="ماموریت ما"
          content="ارائه راهکارهای خلاقانه و مدرن در دنیای دیجیتال"
        />
        <Pedestal
          position={[0, 0, 0]}
          title="طراحی اختصاصی"
          content="خلق تجربه‌های بصری منحصر به فرد برای برند شما"
        />
        <Pedestal
          position={[5, 0, 0]}
          title="پشتیبانی ۲۴/۷"
          content="همیشه در کنار شما برای رشد و توسعه کسب‌وکار"
        />
      </group>
    </group>
  );
}

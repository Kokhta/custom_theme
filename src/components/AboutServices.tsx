"use client";

import { useMemo, useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Text, RoundedBox } from "@react-three/drei";
import * as THREE from "three";
import { useSpring, animated } from "@react-spring/three";

function Pedestal({ position, title, content, color }: { position: [number, number, number], title: string, content: string, color: string }) {
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
      rotation-y={rotationY}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[2, 0.5, 2]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color={color} metalness={0.8} roughness={0.2} />
      </RoundedBox>

      <group position={[0, 1.5, 0]}>
        <Text
          fontSize={0.3}
          color="white"
          anchorY="middle"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
          position={[0, 0.5, 0]}
        >
          {title}
        </Text>
        <Text
          fontSize={0.15}
          color="#cccccc"
          maxWidth={1.5}
          textAlign="center"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          {content}
        </Text>
      </group>
    </animated.group>
  );
}

export function AboutServices({ position }: { position: [number, number, number] }) {
  const pointsRef = useRef<THREE.Points>(null);

  const count = 2000;
  const positions = useMemo(() => {
    const pos = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
      const theta = THREE.MathUtils.randFloatSpread(2 * Math.PI);
      const phi = THREE.MathUtils.randFloatSpread(Math.PI);
      const distance = 2 + Math.random() * 0.5;

      pos[i * 3] = distance * Math.sin(theta) * Math.cos(phi);
      pos[i * 3 + 1] = distance * Math.sin(theta) * Math.sin(phi);
      pos[i * 3 + 2] = distance * Math.cos(theta);
    }
    return pos;
  }, []);

  useFrame((state) => {
    if (pointsRef.current) {
      pointsRef.current.rotation.y += 0.002;
      pointsRef.current.rotation.z += 0.001;
    }
  });

  const services = [
    { title: "ماموریت ما", content: "ارائه راهکارهای خلاقانه و مدرن برای کسب و کار شما در دنیای دیجیتال.", color: "#004E8C", pos: [-3, -4, 0] },
    { title: "طراحی مدرن", content: "خلق تجربه‌های کاربری منحصر به فرد با استفاده از آخرین تکنولوژی‌های روز.", color: "#00A4FF", pos: [0, -4, 0] },
    { title: "پشتیبانی", content: "همراهی همیشگی ما با شما برای اطمینان از عملکرد عالی پروژه‌ها.", color: "#22C55E", pos: [3, -4, 0] },
  ];

  return (
    <group position={position}>
      {/* Particle System Logo */}
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
          size={0.05}
          color="#00A4FF"
          transparent
          opacity={0.6}
          sizeAttenuation
          blending={THREE.AdditiveBlending}
        />
      </points>

      <Text
        position={[0, 4, 0]}
        fontSize={0.8}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        خدمات ما
      </Text>

      {/* Service Pedestals */}
      {services.map((service, index) => (
        <Pedestal
          key={index}
          position={service.pos as [number, number, number]}
          title={service.title}
          content={service.content}
          color={service.color}
        />
      ))}
    </group>
  );
}

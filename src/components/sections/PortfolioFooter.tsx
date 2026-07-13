"use client";

import { useFrame } from "@react-three/fiber";
import { useRef, useState } from "react";
import * as THREE from "three";
import { Text, Float, RoundedBox, useScroll } from "@react-three/drei";

const PortfolioItem = ({ position, title, color }: { position: [number, number, number], title: string, color: string }) => {
  const [hovered, setHovered] = useState(false);
  const groupRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (groupRef.current) {
      const targetRotationY = hovered ? -0.5 : 0;
      const targetRotationX = hovered ? 0.2 : 0;
      groupRef.current.rotation.y = THREE.MathUtils.lerp(groupRef.current.rotation.y, targetRotationY, 0.1);
      groupRef.current.rotation.x = THREE.MathUtils.lerp(groupRef.current.rotation.x, targetRotationX, 0.1);

      const targetZ = hovered ? position[2] + 1 : position[2];
      groupRef.current.position.z = THREE.MathUtils.lerp(groupRef.current.position.z, targetZ, 0.1);
    }
  });

  return (
    <group
      ref={groupRef}
      position={position}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <Float speed={2} rotationIntensity={0.2} floatIntensity={0.5}>
        <RoundedBox args={[4, 2.5, 0.1]} radius={0.1}>
          <meshStandardMaterial
            color={hovered ? "#00A4FF" : "#111111"}
            emissive="#00A4FF"
            emissiveIntensity={hovered ? 0.5 : 0.05}
          />
        </RoundedBox>
        <Text
          position={[0, 0, 0.1]}
          fontSize={0.3}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          {title}
        </Text>
      </Float>
    </group>
  );
};

export default function PortfolioFooter() {
  const scroll = useScroll();
  const footerRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (footerRef.current) {
      const offset = scroll.offset;
      // Final zoom out effect at the end of scroll
      if (offset > 0.9) {
        const zoomProgress = (offset - 0.9) * 10;
        state.camera.position.z = 10 + zoomProgress * 20;
        state.camera.lookAt(0, -90, 0);
      }
    }
  });

  return (
    <group position={[0, -80, 0]}>
      <Text
        position={[0, 5, -2]}
        fontSize={1.5}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      <PortfolioItem position={[-5, 2, 0]} title="پروژه اول" color="#00A4FF" />
      <PortfolioItem position={[0, 0, 1]} title="پروژه دوم" color="#004E8C" />
      <PortfolioItem position={[5, 2, 0]} title="پروژه سوم" color="#22C55E" />

      {/* Footer Landscape */}
      <group position={[0, -10, 0]} ref={footerRef}>
        <mesh rotation={[-Math.PI / 2, 0, 0]} receiveShadow>
          <planeGeometry args={[100, 100, 50, 50]} />
          <meshStandardMaterial color="#000814" wireframe />
        </mesh>

        {/* Stars/Dust in space */}
        <points>
          <bufferGeometry>
            <bufferAttribute
              attach="attributes-position"
              count={1000}
              array={new Float32Array(3000).map(() => (Math.random() - 0.5) * 100)}
              itemSize={3}
            />
          </bufferGeometry>
          <pointsMaterial size={0.1} color="white" transparent opacity={0.5} />
        </points>

        <Text
          position={[0, 2, -10]}
          fontSize={2}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
        <Text
          position={[0, 0, -10]}
          fontSize={0.5}
          color="#00A4FF"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          همراه شما در دنیای سه-بعدی
        </Text>
      </group>
    </group>
  );
}

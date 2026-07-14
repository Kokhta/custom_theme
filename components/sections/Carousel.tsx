"use client";

import { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { RoundedBox, Text } from "@react-three/drei";
import * as THREE from "three";

const LOGOS = ["Digikala", "Snapp", "Tapsi", "Divar", "Zarinpal", "Bamilo"];

export const Carousel = ({ position = [0, 0, 0] }: { position?: [number, number, number] }) => {
  const groupRef = useRef<THREE.Group>(null!);
  const [rotation, setRotation] = useState(0);
  const isDragging = useRef(false);
  const lastMouseX = useRef(0);

  useFrame((state) => {
    if (!isDragging.current) {
      groupRef.current.rotation.y += 0.005;
    }
  });

  const onPointerDown = (e: any) => {
    e.stopPropagation();
    isDragging.current = true;
    lastMouseX.current = e.clientX;
  };

  const onPointerUp = () => {
    isDragging.current = false;
  };

  const onPointerMove = (e: any) => {
    if (isDragging.current) {
      const deltaX = e.clientX - lastMouseX.current;
      groupRef.current.rotation.y += deltaX * 0.01;
      lastMouseX.current = e.clientX;
    }
  };

  return (
    <group
        position={position}
        onPointerDown={onPointerDown}
        onPointerUp={onPointerUp}
        onPointerMove={onPointerMove}
        onPointerLeave={onPointerUp}
    >
      <Text
        position={[0, 4, 0]}
        fontSize={0.8}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        مشتریان ما
      </Text>
      <group ref={groupRef}>
        {LOGOS.map((name, i) => (
          <LogoBox
            key={name}
            index={i}
            total={LOGOS.length}
            name={name}
          />
        ))}
      </group>
    </group>
  );
};

const LogoBox = ({ index, total, name }: { index: number, total: number, name: string }) => {
  const angle = (index / total) * Math.PI * 2;
  const radius = 5;

  return (
    <group position={[Math.cos(angle) * radius, 0, Math.sin(angle) * radius]} rotation={[0, -angle + Math.PI / 2, 0]}>
      <RoundedBox args={[2, 1, 0.1]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color="white" />
      </RoundedBox>
      <Text
        position={[0, 0, 0.06]}
        fontSize={0.3}
        color="#004E8C"
        anchorX="center"
        anchorY="middle"
      >
        {name}
      </Text>
    </group>
  );
};

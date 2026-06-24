"use client";

import { useMemo, useRef } from "react";
import { useFrame } from "@react-three/fiber";
import * as THREE from "three";
import { Text } from "@react-three/drei";

export const Services = () => {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 3000;

  const [positions, colors, initialPositions] = useMemo(() => {
    const geo = new THREE.TorusKnotGeometry(1.5, 0.4, 250, 40);
    const posAttr = geo.getAttribute("position");
    const pos = new Float32Array(posAttr.count * 3);
    const col = new Float32Array(posAttr.count * 3);
    const initial = new Float32Array(posAttr.count * 3);

    for (let i = 0; i < posAttr.count; i++) {
      const x = posAttr.getX(i);
      const y = posAttr.getY(i);
      const z = posAttr.getZ(i);
      pos[i * 3] = initial[i * 3] = x;
      pos[i * 3 + 1] = initial[i * 3 + 1] = y;
      pos[i * 3 + 2] = initial[i * 3 + 2] = z;

      col[i * 3] = 0;
      col[i * 3 + 1] = 0.64 + Math.random() * 0.2;
      col[i * 3 + 2] = 1;
    }
    geo.dispose();
    return [pos, col, initial];
  }, []);

  useFrame((state) => {
    if (pointsRef.current) {
      const time = state.clock.getElapsedTime();
      const posAttr = pointsRef.current.geometry.getAttribute("position") as THREE.BufferAttribute;
      const mouse = state.pointer;

      for (let i = 0; i < initialPositions.length / 3; i++) {
        const x = initialPositions[i * 3];
        const y = initialPositions[i * 3 + 1];
        const z = initialPositions[i * 3 + 2];

        // Organic movement
        const noiseX = Math.sin(time + x * 0.5) * 0.1;
        const noiseY = Math.cos(time + y * 0.5) * 0.1;

        // Mouse interaction (world coords roughly)
        const dx = mouse.x * 5 - x;
        const dy = mouse.y * 5 - (y - 10); // Offset for section Y
        const dist = Math.sqrt(dx * dx + dy * dy);

        const push = dist < 2 ? (2 - dist) * 0.5 : 0;

        posAttr.setXYZ(
          i,
          x + noiseX - (dx / dist) * push,
          y + noiseY - (dy / dist) * push,
          z + Math.sin(time + i) * 0.1
        );
      }
      posAttr.needsUpdate = true;
      pointsRef.current.rotation.y += 0.002;
    }
  });

  return (
    <group position={[0, -10, 0]}>
      <points ref={pointsRef}>
        <bufferGeometry>
          <bufferAttribute
            attach="attributes-position"
            args={[positions, 3]}
          />
          <bufferAttribute
            attach="attributes-color"
            args={[colors, 3]}
          />
        </bufferGeometry>
        <pointsMaterial size={0.05} vertexColors transparent opacity={0.8} />
      </points>

      {/* Pedestals */}
      <group position={[0, -4, 0]}>
        <Pedestal position={[-3, 0, 0]} title="پشتیبانی" color="#22C55E" />
        <Pedestal position={[0, 0, 0]} title="طراحی" color="#00A4FF" />
        <Pedestal position={[3, 0, 0]} title="ماموریت" color="#004E8C" />
      </group>
    </group>
  );
};

const Pedestal = ({ position, title, color }: { position: [number, number, number], title: string, color: string }) => {
  const meshRef = useRef<THREE.Mesh>(null);

  useFrame((state) => {
    if (meshRef.current && meshRef.current.scale.x > 1.1) {
      meshRef.current.rotation.y += 0.05;
    }
  });

  return (
    <group position={position}>
      <mesh
        ref={meshRef}
        onPointerOver={() => { if (meshRef.current) meshRef.current.scale.set(1.2, 1.2, 1.2); }}
        onPointerOut={() => {
          if (meshRef.current) {
            meshRef.current.scale.set(1, 1, 1);
            meshRef.current.rotation.y = 0;
          }
        }}
      >
        <cylinderGeometry args={[1, 1.2, 0.5, 32]} />
        <meshStandardMaterial color={color} metalness={0.8} roughness={0.2} />
      </mesh>
      <Text
        position={[0, 1, 0]}
        fontSize={0.4}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        {title}
      </Text>
    </group>
  );
};

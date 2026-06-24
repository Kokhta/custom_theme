"use client";

import { useMemo, useRef } from "react";
import { useFrame } from "@react-three/fiber";
import * as THREE from "three";
import { Text } from "@react-three/drei";

export const Services = () => {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 2000;

  const [positions, colors] = useMemo(() => {
    const geo = new THREE.TorusKnotGeometry(1.5, 0.4, 200, 32);
    const posAttr = geo.getAttribute("position");
    const pos = new Float32Array(posAttr.count * 3);
    const col = new Float32Array(posAttr.count * 3);

    for (let i = 0; i < posAttr.count; i++) {
      pos[i * 3] = posAttr.getX(i);
      pos[i * 3 + 1] = posAttr.getY(i);
      pos[i * 3 + 2] = posAttr.getZ(i);

      col[i * 3] = 0;
      col[i * 3 + 1] = 0.64;
      col[i * 3 + 2] = 1;
    }
    geo.dispose();
    return [pos, col];
  }, []);

  useFrame((state) => {
    if (pointsRef.current) {
      pointsRef.current.rotation.y += 0.005;
      pointsRef.current.rotation.x += 0.002;
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
  return (
    <group position={position}>
      <mesh
        ref={meshRef}
        onPointerOver={() => { if (meshRef.current) meshRef.current.scale.set(1.2, 1.2, 1.2); }}
        onPointerOut={() => { if (meshRef.current) meshRef.current.scale.set(1, 1, 1); }}
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

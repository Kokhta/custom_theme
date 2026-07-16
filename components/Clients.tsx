"use client";

import { useFrame } from "@react-three/fiber";
import { RoundedBox, Text } from "@react-three/drei";
import { useRef, useState, useMemo } from "react";
import * as THREE from "three";

interface ClientsProps {
  position: [number, number, number];
}

const CLIENTS = [
  { name: "Digikala", color: "#ef4056" },
  { name: "Snapp", color: "#22c55e" },
  { name: "Tap30", color: "#ff8c00" },
  { name: "Bazaar", color: "#4caf50" },
  { name: "Divar", color: "#a62626" },
  { name: "Filimo", color: "#ffa500" },
];

function ClientLogo({ client, angle, radius }: { client: typeof CLIENTS[0], angle: number, radius: number }) {
  // Create a procedural texture to simulate a logo texture
  const texture = useMemo(() => {
    const canvas = document.createElement('canvas');
    canvas.width = 256;
    canvas.height = 128;
    const ctx = canvas.getContext('2d')!;
    ctx.fillStyle = client.color;
    ctx.fillRect(0, 0, 256, 128);
    ctx.fillStyle = 'white';
    ctx.font = 'bold 48px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(client.name, 128, 64);

    // Add some "logo" details
    ctx.strokeStyle = 'white';
    ctx.lineWidth = 4;
    ctx.strokeRect(10, 10, 236, 108);

    return new THREE.CanvasTexture(canvas);
  }, [client]);

  return (
    <group
      position={[Math.cos(angle) * radius, 0, Math.sin(angle) * radius]}
      rotation={[0, -angle + Math.PI / 2, 0]}
    >
      <RoundedBox args={[2, 1.2, 0.2]} radius={0.1} smoothness={4}>
        <meshStandardMaterial map={texture} metalness={0.5} roughness={0.1} />
      </RoundedBox>
    </group>
  );
}

export default function Clients({ position }: ClientsProps) {
  const groupRef = useRef<THREE.Group>(null);
  const [isDragging, setIsDragging] = useState(false);
  const [lastMouseX, setLastMouseX] = useState(0);
  const rotationVelocity = useRef(0.005);

  useFrame(() => {
    if (groupRef.current && !isDragging) {
      groupRef.current.rotation.y += rotationVelocity.current;
      rotationVelocity.current *= 0.95;
      if (Math.abs(rotationVelocity.current) < 0.001) rotationVelocity.current = 0.005;
    }
  });

  const handlePointerDown = (e: any) => {
    setIsDragging(true);
    setLastMouseX(e.clientX);
  };

  const handlePointerMove = (e: any) => {
    if (isDragging && groupRef.current) {
      const deltaX = e.clientX - lastMouseX;
      groupRef.current.rotation.y += deltaX * 0.01;
      rotationVelocity.current = deltaX * 0.01;
      setLastMouseX(e.clientX);
    }
  };

  const handlePointerUp = () => {
    setIsDragging(false);
  };

  return (
    <group position={position}>
      <Text
        position={[0, 6, 0]}
        fontSize={1}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        مشتریان ما
      </Text>

      <group
        ref={groupRef}
        onPointerDown={handlePointerDown}
        onPointerMove={handlePointerMove}
        onPointerUp={handlePointerUp}
        onPointerOut={handlePointerUp}
      >
        {CLIENTS.map((client, idx) => {
          const angle = (idx / CLIENTS.length) * Math.PI * 2;
          const radius = 6;
          return (
            <ClientLogo key={idx} client={client} angle={angle} radius={radius} />
          );
        })}
      </group>

      <mesh rotation={[Math.PI / 2, 0, 0]}>
        <torusGeometry args={[6, 0.05, 16, 100]} />
        <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={2} />
      </mesh>
    </group>
  );
}

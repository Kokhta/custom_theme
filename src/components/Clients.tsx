'use client'

import { useRef, useState, useMemo } from 'react'
import { useFrame, useThree } from '@react-three/fiber'
import { RoundedBox, Text } from '@react-three/drei'
import * as THREE from 'three'

function ClientCard({ index, total, radius, name, color }: { index: number, total: number, radius: number, name: string, color: string }) {
  const angle = (index / total) * Math.PI * 2
  const x = Math.cos(angle) * radius
  const z = Math.sin(angle) * radius

  return (
    <group position={[x, 0, z]} rotation={[0, -angle + Math.PI / 2, 0]}>
      <RoundedBox args={[2, 1, 0.1]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color="#111" metalness={0.8} roughness={0.2} />
      </RoundedBox>
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[1.8, 0.8]} />
        <meshStandardMaterial color={color} transparent opacity={0.8} emissive={color} emissiveIntensity={0.2} />
      </mesh>
      <Text
        position={[0, 0, 0.07]}
        fontSize={0.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Medium.ttf"
      >
        {name}
      </Text>
    </group>
  )
}

export function Clients({ position }: { position: [number, number, number] }) {
  const groupRef = useRef<THREE.Group>(null)
  const [rotation, setRotation] = useState(0)
  const [isDragging, setIsDragging] = useState(false)
  const lastX = useRef(0)

  const clients = [
    { name: 'دیجی‌کالا', color: '#ef4056' },
    { name: 'اسنپ', color: '#22c55e' },
    { name: 'تپسی', color: '#ff8b00' },
    { name: 'آپارات', color: '#ed145b' },
    { name: 'بازار', color: '#16a34a' },
    { name: 'ایران‌سل', color: '#ffcc00' },
  ]

  const radius = 5

  useFrame((state) => {
    if (groupRef.current && !isDragging) {
      groupRef.current.rotation.y += 0.005
    }
  })

  const handlePointerDown = (e: any) => {
    setIsDragging(true)
    lastX.current = e.clientX
  }

  const handlePointerMove = (e: any) => {
    if (isDragging && groupRef.current) {
      const deltaX = e.clientX - lastX.current
      groupRef.current.rotation.y += deltaX * 0.01
      lastX.current = e.clientX
    }
  }

  const handlePointerUp = () => {
    setIsDragging(false)
  }

  return (
    <group position={position}>
      <Text
        position={[0, 3, 0]}
        fontSize={0.8}
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
        onPointerLeave={handlePointerUp}
      >
        {clients.map((client, i) => (
          <ClientCard
            key={i}
            index={i}
            total={clients.length}
            radius={radius}
            name={client.name}
            color={client.color}
          />
        ))}
      </group>

      {/* Decorative center piece */}
      <mesh>
        <cylinderGeometry args={[radius - 0.5, radius - 0.5, 0.1, 64]} />
        <meshStandardMaterial color="#00A4FF" transparent opacity={0.1} wireframe />
      </mesh>
    </group>
  )
}

'use client'

import { useRef, useState } from 'react'
import { useFrame } from '@react-three/fiber'
import { RoundedBox, Text } from '@react-three/drei'
import * as THREE from 'three'

function ClientLogo({ index, total, name }: { index: number, total: number, name: string }) {
  const radius = 5
  const angle = (index / total) * Math.PI * 2
  const x = Math.cos(angle) * radius
  const z = Math.sin(angle) * radius

  return (
    <group position={[x, 0, z]} rotation={[0, -angle + Math.PI / 2, 0]}>
      <RoundedBox args={[2, 1, 0.1]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color="#ffffff" metalness={0.5} roughness={0.1} />
      </RoundedBox>
      <group position={[0, 0, 0.06]}>
        <Text
          fontSize={0.3}
          color="#004E8C"
          anchorX="center"
          anchorY="middle"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          {name}
        </Text>
      </group>
    </group>
  )
}

export default function Clients() {
  const groupRef = useRef<THREE.Group>(null!)
  const isDragging = useRef(false)
  const lastMouseX = useRef(0)

  const clients = [
    "دیجی‌کالا",
    "اسنپ",
    "تپسی",
    "آپارات",
    "دیوار",
    "فیلیمو",
    "کافه بازار",
    "جابینجا"
  ]

  useFrame((state, delta) => {
    if (!isDragging.current) {
      groupRef.current.rotation.y += delta * 0.2
    }
  })

  const handlePointerDown = (e: any) => {
    isDragging.current = true
    lastMouseX.current = e.clientX
  }

  const handlePointerUp = () => {
    isDragging.current = false
  }

  const handlePointerMove = (e: any) => {
    if (isDragging.current) {
      const deltaX = e.clientX - lastMouseX.current
      groupRef.current.rotation.y += deltaX * 0.01
      lastMouseX.current = e.clientX
    }
  }

  return (
    <group
      position={[0, -35, -5]}
      onPointerDown={handlePointerDown}
      onPointerUp={handlePointerUp}
      onPointerLeave={handlePointerUp}
      onPointerMove={handlePointerMove}
    >
      <group position={[0, 3, 0]}>
        <Text
          fontSize={1}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          مشتریان ما
        </Text>
      </group>
      <group ref={groupRef}>
        {clients.map((name, i) => (
          <ClientLogo key={i} index={i} total={clients.length} name={name} />
        ))}
      </group>
    </group>
  )
}

'use client'

import { useRef, useState, useMemo } from 'react'
import { useFrame } from '@react-three/fiber'
import { RoundedBox, Text } from '@react-three/drei'
import * as THREE from 'three'

const CarouselItem = ({ index, count, radius, title }: { index: number, count: number, radius: number, title: string }) => {
  const angle = (index / count) * Math.PI * 2
  const x = Math.cos(angle) * radius
  const z = Math.sin(angle) * radius

  return (
    <group position={[x, 0, z]} rotation={[0, -angle + Math.PI / 2, 0]}>
      <RoundedBox args={[3, 1.8, 0.1]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color="#004E8C" />
      </RoundedBox>
      <Text
        position={[0, 0, 0.06]}
        fontSize={0.3}
        color="white"
        anchorX="center"
        anchorY="middle"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {title}
      </Text>
    </group>
  )
}

export const ClientCarousel = () => {
  const groupRef = useRef<THREE.Group>(null!)
  const isDragging = useRef(false)
  const previousMouseX = useRef(0)

  const clients = [
    "دیجی‌کالا",
    "اسنپ",
    "تپسی",
    "آپارات",
    "فیلیمو",
    "کافه بازار",
    "دیوار",
    "جاباما"
  ]

  useFrame((state) => {
    if (!isDragging.current) {
      groupRef.current.rotation.y += 0.005
    }
  })

  const handlePointerDown = (e: any) => {
    isDragging.current = true
    previousMouseX.current = e.clientX
    e.stopPropagation()
    // Set cursor style
    document.body.style.cursor = 'grabbing'
  }

  const handlePointerUp = () => {
    isDragging.current = false
    document.body.style.cursor = 'auto'
  }

  const handlePointerMove = (e: any) => {
    if (isDragging.current) {
      const delta = e.clientX - previousMouseX.current
      groupRef.current.rotation.y += delta * 0.01
      previousMouseX.current = e.clientX
    }
  }

  return (
    <group
      onPointerDown={handlePointerDown}
      onPointerUp={handlePointerUp}
      onPointerLeave={handlePointerUp}
      onPointerMove={handlePointerMove}
    >
      <Text
        position={[0, 6, -5]}
        fontSize={1.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        مشتریان ما
      </Text>
      <group ref={groupRef}>
        {clients.map((client, i) => (
          <CarouselItem
            key={i}
            index={i}
            count={clients.length}
            radius={8}
            title={client}
          />
        ))}
      </group>
      {/* Decorative rings */}
      <mesh rotation={[Math.PI / 2, 0, 0]}>
        <torusGeometry args={[8, 0.05, 16, 100]} />
        <meshStandardMaterial color="#00A4FF" transparent opacity={0.2} />
      </mesh>
    </group>
  )
}

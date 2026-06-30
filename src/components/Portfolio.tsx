'use client'

import { useRef, useState } from 'react'
import { useFrame } from '@react-three/fiber'
import { RoundedBox, Text, Float } from '@react-three/drei'
import * as THREE from 'three'

function PortfolioScreen({ position, title, index }: { position: [number, number, number], title: string, index: number }) {
  const [hovered, setHovered] = useState(false)
  const meshRef = useRef<THREE.Group>(null!)

  useFrame((state) => {
    if (hovered) {
      meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, (state.mouse.x * Math.PI) / 10, 0.1)
      meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, -(state.mouse.y * Math.PI) / 10, 0.1)
      meshRef.current.scale.lerp(new THREE.Vector3(1.1, 1.1, 1.1), 0.1)
    } else {
      meshRef.current.rotation.y = THREE.MathUtils.lerp(meshRef.current.rotation.y, 0, 0.1)
      meshRef.current.rotation.x = THREE.MathUtils.lerp(meshRef.current.rotation.x, 0, 0.1)
      meshRef.current.scale.lerp(new THREE.Vector3(1, 1, 1), 0.1)
    }
  })

  return (
    <Float speed={2} rotationIntensity={0.2} floatIntensity={0.5}>
      <group position={position} ref={meshRef} onPointerOver={() => setHovered(true)} onPointerOut={() => setHovered(false)}>
        <RoundedBox args={[4, 2.5, 0.2]} radius={0.1} smoothness={4}>
          <meshStandardMaterial
            color={hovered ? "#00A4FF" : "#111111"}
            emissive={hovered ? "#00A4FF" : "#000000"}
            emissiveIntensity={hovered ? 0.5 : 0}
            metalness={0.8}
            roughness={0.2}
          />
        </RoundedBox>
        <group position={[0, 0, 0.11]}>
          <Text
            fontSize={0.4}
            color="white"
            font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
          >
            {title}
          </Text>
        </group>
      </group>
    </Float>
  )
}

export default function Portfolio() {
  const projects = [
    { title: "پروژه آلفا", pos: [-5, 2, 0] as [number, number, number] },
    { title: "پروژه بتا", pos: [0, 0, -2] as [number, number, number] },
    { title: "پروژه گاما", pos: [5, -2, 0] as [number, number, number] },
  ]

  return (
    <group position={[0, -75, -5]}>
      <group position={[0, 6, 0]}>
        <Text
          fontSize={1.5}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          نمونه کارهای ما
        </Text>
      </group>
      {projects.map((p, i) => (
        <PortfolioScreen key={i} index={i} title={p.title} position={p.pos} />
      ))}
    </group>
  )
}

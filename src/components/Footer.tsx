'use client'

import { useRef, useMemo } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, Float, useScroll, Stars } from '@react-three/drei'
import * as THREE from 'three'

function LowPolyLandscape() {
  const meshRef = useRef<THREE.Mesh>(null)

  const geometry = useMemo(() => {
    const geo = new THREE.PlaneGeometry(100, 100, 50, 50)
    const pos = geo.attributes.position
    for (let i = 0; i < pos.count; i++) {
      const x = pos.getX(i)
      const y = pos.getY(i)
      // Create some low poly mountains
      const z = Math.sin(x * 0.1) * Math.cos(y * 0.1) * 2 + Math.random() * 0.5
      pos.setZ(i, z)
    }
    geo.computeVertexNormals()
    return geo
  }, [])

  return (
    <mesh ref={meshRef} geometry={geometry} rotation={[-Math.PI / 2.5, 0, 0]}>
      <meshStandardMaterial
        color="#002244"
        wireframe
        transparent
        opacity={0.3}
      />
    </mesh>
  )
}

export function Footer({ position }: { position: [number, number, number] }) {
  const groupRef = useRef<THREE.Group>(null)

  return (
    <group position={position} ref={groupRef}>
      <LowPolyLandscape />

      <Float speed={1} rotationIntensity={0.5} floatIntensity={0.5}>
        <group position={[0, 5, 0]}>
          <Text
            fontSize={1.2}
            color="#00A4FF"
            font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
          >
            آتی‌سافت
          </Text>
          <Text
            position={[0, -1, 0]}
            fontSize={0.4}
            color="white"
            font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Light.ttf"
          >
            آینده را با ما تجربه کنید
          </Text>

          <group position={[0, -3, 0]}>
            <mesh>
              <capsuleGeometry args={[0.5, 1.5, 4, 16]} />
              <meshStandardMaterial color="#22C55E" emissive="#22C55E" emissiveIntensity={0.5} />
            </mesh>
            <Text
              position={[0, 0, 0.6]}
              fontSize={0.3}
              color="white"
              font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
            >
              شروع همکاری
            </Text>
          </group>
        </group>
      </Float>

      <Stars radius={100} depth={50} count={5000} factor={4} saturation={0} fade speed={1} />
    </group>
  )
}

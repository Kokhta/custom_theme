'use client'

import { useRef, useMemo } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text } from '@react-three/drei'
import * as THREE from 'three'

function Landscape() {
  const meshRef = useRef<THREE.Mesh>(null!)

  const vertices = useMemo(() => {
    const size = 100
    const segments = 50
    const geometry = new THREE.PlaneGeometry(size, size, segments, segments)
    const pos = geometry.attributes.position
    for (let i = 0; i < pos.count; i++) {
      const x = pos.getX(i)
      const y = pos.getY(i)
      const dist = Math.sqrt(x*x + y*y)
      const z = Math.sin(x * 0.2) * Math.cos(y * 0.2) * 2 + (Math.random() - 0.5) * 0.5 - (dist * 0.1)
      pos.setZ(i, z)
    }
    geometry.computeVertexNormals()
    return geometry
  }, [])

  return (
    <mesh ref={meshRef} geometry={vertices} rotation={[-Math.PI / 2, 0, 0]} position={[0, -15, 0]} receiveShadow>
      <meshStandardMaterial color="#004E8C" wireframe transparent opacity={0.5} />
    </mesh>
  )
}

function Stars() {
  const points = useMemo(() => {
    const p = new Float32Array(5000 * 3)
    for (let i = 0; i < 5000; i++) {
      p[i * 3] = (Math.random() - 0.5) * 200
      p[i * 3 + 1] = (Math.random() - 0.5) * 200
      p[i * 3 + 2] = (Math.random() - 0.5) * 200
    }
    return p
  }, [])

  const ref = useRef<THREE.Points>(null!)
  useFrame((state) => {
    ref.current.rotation.y = state.clock.getElapsedTime() * 0.05
  })

  return (
    <points ref={ref}>
      <bufferGeometry>
        <bufferAttribute
          attach="attributes-position"
          count={5000}
          array={points}
          itemSize={3}
          args={[points, 3]}
        />
      </bufferGeometry>
      <pointsMaterial size={0.15} color="white" transparent opacity={0.8} sizeAttenuation />
    </points>
  )
}

export default function Footer() {
  return (
    <group position={[0, -95, -10]}>
      <Landscape />
      <Stars />
      <group position={[0, 5, 0]}>
        <Text
          fontSize={3}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
      </group>
      <group position={[0, 1, 0]}>
        <Text
          fontSize={0.8}
          color="#00A4FF"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          خلق آینده در فضای سه بعدی
        </Text>
      </group>

      <group position={[0, -4, 0]}>
        <Text
          fontSize={0.4}
          color="gray"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          تمامی حقوق محفوظ است ۱۴۰۳ ©
        </Text>
      </group>
    </group>
  )
}

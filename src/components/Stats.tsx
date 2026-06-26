'use client'

import { useRef, useMemo } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, useScroll, Float } from '@react-three/drei'
import * as THREE from 'three'

function StatItem({ position, value, label, delay = 0 }: { position: [number, number, number], value: string, label: string, delay?: number }) {
  const scroll = useScroll()
  const groupRef = useRef<THREE.Group>(null)

  // Section is at 65% depth (approx 0.6 to 0.75 range)
  const start = 0.6
  const end = 0.75

  useFrame((state) => {
    if (groupRef.current) {
      const sectionScroll = scroll.range(start, end - start)
      const animatedValue = Math.max(0, (sectionScroll - delay) * (1 / (1 - delay)))

      // Explode animation: fly in from top
      groupRef.current.position.y = position[1] + (1 - animatedValue) * 10
      groupRef.current.scale.setScalar(animatedValue)
      groupRef.current.rotation.x = (1 - animatedValue) * Math.PI
    }
  })

  return (
    <group ref={groupRef} position={position}>
      <mesh>
        <boxGeometry args={[2.5, 1.5, 0.2]} />
        <meshStandardMaterial color="#111" metalness={0.9} roughness={0.1} />
      </mesh>
      <mesh position={[0, 0, 0.11]}>
        <planeGeometry args={[2.3, 1.3]} />
        <meshStandardMaterial color="#00A4FF" transparent opacity={0.1} />
      </mesh>

      <Text
        position={[0, 0.2, 0.15]}
        fontSize={0.6}
        color="#00A4FF"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {value}
      </Text>
      <Text
        position={[0, -0.4, 0.15]}
        fontSize={0.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Light.ttf"
      >
        {label}
      </Text>
    </group>
  )
}

export function Stats({ position }: { position: [number, number, number] }) {
  return (
    <group position={position}>
      {/* Dashboard background panel */}
      <mesh rotation={[-0.2, 0, 0]} position={[0, 0, -1]}>
        <cylinderGeometry args={[10, 10, 5, 32, 1, true, Math.PI * 0.75, Math.PI * 0.5]} />
        <meshStandardMaterial color="#004E8C" transparent opacity={0.1} side={THREE.DoubleSide} wireframe />
      </mesh>

      <Text
        position={[0, 3, 0]}
        fontSize={0.8}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        آمار و ارقام
      </Text>

      <group position={[0, 0, 0]}>
        <StatItem position={[-3, 0.5, 0]} value="۱۳۹۸" label="سال تاسیس" delay={0} />
        <StatItem position={[-1, -1, 0]} value="۳" label="دفتر فعال" delay={0.1} />
        <StatItem position={[1, 0.5, 0]} value="۹۵" label="پروژه موفق" delay={0.2} />
        <StatItem position={[3, -1, 0]} value="۷" label="تیم تخصصی" delay={0.3} />
      </group>
    </group>
  )
}

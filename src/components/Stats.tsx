'use client'

import { useRef } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, useScroll, RoundedBox } from '@react-three/drei'
import * as THREE from 'three'

const StatItem = ({ position, endPosition, value, label, scrollRange }: {
  position: [number, number, number],
  endPosition: [number, number, number],
  value: string,
  label: string,
  scrollRange: [number, number]
}) => {
  const meshRef = useRef<THREE.Group>(null!)
  const scroll = useScroll()

  useFrame(() => {
    // scroll.range(from, distance)
    const r1 = scroll.range(scrollRange[0], scrollRange[1])
    // Explode effect: start from scattered and settle into endPosition
    meshRef.current.position.x = THREE.MathUtils.lerp(position[0], endPosition[0], r1)
    meshRef.current.position.y = THREE.MathUtils.lerp(position[1], endPosition[1], r1)
    meshRef.current.position.z = THREE.MathUtils.lerp(position[2], endPosition[2], r1)

    meshRef.current.rotation.x = THREE.MathUtils.lerp(Math.PI, 0, r1)
    meshRef.current.rotation.y = THREE.MathUtils.lerp(Math.PI, 0, r1)
    meshRef.current.scale.setScalar(THREE.MathUtils.lerp(0.001, 1, r1))
  })

  return (
    <group ref={meshRef}>
      <RoundedBox args={[3.5, 4.5, 0.2]} radius={0.1} smoothness={4}>
        <meshStandardMaterial color="#00A4FF" transparent opacity={0.1} />
      </RoundedBox>
      <Text
        position={[0, 0.8, 0.11]}
        fontSize={1.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {value}
      </Text>
      <Text
        position={[0, -1.2, 0.11]}
        fontSize={0.4}
        color="#22C55E"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        {label}
      </Text>
    </group>
  )
}

export const Stats = () => {
  const stats = [
    { value: "۱۳۹۸", label: "سال تاسیس", pos: [-20, 20, -10], end: [-6, 0, 0] },
    { value: "۳", label: "دفتر فعال", pos: [-10, 30, -20], end: [-2, 0, 2] },
    { value: "۹۵", label: "پروژه موفق", pos: [10, 30, -20], end: [2, 0, 2] },
    { value: "۷", label: "جایزه بین‌المللی", pos: [20, 20, -10], end: [6, 0, 0] }
  ]

  return (
    <group>
      <Text
        position={[0, 8, -5]}
        fontSize={1.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        آمار و ارقام
      </Text>

      {/* Curved Dashboard Background */}
      <mesh rotation={[0, 0, 0]} position={[0, 0, -2]}>
        <cylinderGeometry args={[15, 15, 10, 32, 1, true, Math.PI * 0.7, Math.PI * 0.6]} />
        <meshStandardMaterial color="#004E8C" side={THREE.DoubleSide} transparent opacity={0.05} />
      </mesh>

      <group>
        {stats.map((stat, i) => (
          <StatItem
            key={i}
            position={stat.pos as [number, number, number]}
            endPosition={stat.end as [number, number, number]}
            value={stat.value}
            label={stat.label}
            scrollRange={[0.6, 0.2]} // Settle in between 60-80%
          />
        ))}
      </group>
    </group>
  )
}

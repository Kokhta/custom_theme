'use client'

import { useRef } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, useScroll } from '@react-three/drei'
import * as THREE from 'three'

function StatItem({ value, label, position, index }: { value: string, label: string, position: [number, number, number], index: number }) {
  const scroll = useScroll()
  const ref = useRef<THREE.Group>(null!)

  // Section is around 0.6 - 0.8
  const sectionStart = 0.65
  const sectionEnd = 0.85

  useFrame(() => {
    const offset = scroll.offset
    const t = Math.max(0, Math.min(1, (offset - sectionStart) / (sectionEnd - sectionStart)))

    const initialY = 10 + index * 2
    const targetY = position[1]

    ref.current.position.y = THREE.MathUtils.lerp(initialY, targetY, t)
    ref.current.position.x = position[0]
    ref.current.position.z = position[2]

    ref.current.children.forEach((child: any) => {
      if (child.material) {
        child.material.opacity = t
        child.material.transparent = true
      }
    })
  })

  return (
    <group ref={ref}>
      <group position={[0, 0.5, 0]}>
        <Text
          fontSize={1.5}
          color="#22C55E"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          {value}
        </Text>
      </group>
      <group position={[0, -0.5, 0]}>
        <Text
          fontSize={0.5}
          color="white"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
        >
          {label}
        </Text>
      </group>
    </group>
  )
}

export default function Stats() {
  const stats = [
    { value: "۱۳۹۸", label: "سال تاسیس", pos: [-4.5, 0, 0] as [number, number, number] },
    { value: "۳", label: "قاره فعالیت", pos: [-1.5, 0, 0] as [number, number, number] },
    { value: "۹۵", label: "رضایت مشتری", pos: [1.5, 0, 0] as [number, number, number] },
    { value: "۷", label: "جایزه بین‌المللی", pos: [4.5, 0, 0] as [number, number, number] },
  ]

  return (
    <group position={[0, -55, -5]}>
      <mesh position={[0, 0, -1]}>
        <cylinderGeometry args={[8, 8, 4, 32, 1, true, Math.PI, Math.PI]} />
        <meshStandardMaterial color="#004E8C" side={THREE.DoubleSide} transparent opacity={0.2} />
      </mesh>
      {stats.map((s, i) => (
        <StatItem key={i} index={i} value={s.value} label={s.label} position={s.pos} />
      ))}
    </group>
  )
}

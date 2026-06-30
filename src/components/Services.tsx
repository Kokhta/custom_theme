'use client'

import { useRef, useMemo, useState } from 'react'
import { useFrame } from '@react-three/fiber'
import { Points, PointMaterial, Html, Float } from '@react-three/drei'
import * as THREE from 'three'

function ParticleLogo() {
  const points = useMemo(() => {
    const p = new Float32Array(2000 * 3)
    for (let i = 0; i < 2000; i++) {
      const theta = THREE.MathUtils.randFloatSpread(360)
      const phi = THREE.MathUtils.randFloatSpread(360)
      const r = 2 + Math.sin(theta * 10) * 0.5
      p[i * 3] = r * Math.sin(theta) * Math.cos(phi)
      p[i * 3 + 1] = r * Math.sin(theta) * Math.sin(phi)
      p[i * 3 + 2] = r * Math.cos(theta)
    }
    return p
  }, [])

  const ref = useRef<THREE.Points>(null!)
  useFrame((state) => {
    ref.current.rotation.y = state.clock.getElapsedTime() * 0.2
    ref.current.rotation.z = state.clock.getElapsedTime() * 0.1
  })

  return (
    <group position={[-5, 0, 0]}>
      <Points ref={ref} positions={points} stride={3} frustumCulled={false}>
        <PointMaterial
          transparent
          color="#00A4FF"
          size={0.05}
          sizeAttenuation={true}
          depthWrite={false}
          blending={THREE.AdditiveBlending}
        />
      </Points>
    </group>
  )
}

function Pedestal({ position, title, content }: { position: [number, number, number], title: string, content: string }) {
  const [hovered, setHovered] = useState(false)
  const ref = useRef<THREE.Group>(null!)

  useFrame((state) => {
    if (hovered) {
      ref.current.scale.lerp(new THREE.Vector3(1.2, 1.2, 1.2), 0.1)
      ref.current.rotation.y += 0.01
    } else {
      ref.current.scale.lerp(new THREE.Vector3(1, 1, 1), 0.1)
    }
  })

  return (
    <group position={position} ref={ref} onPointerOver={() => setHovered(true)} onPointerOut={() => setHovered(false)}>
      <mesh position={[0, -1, 0]}>
        <cylinderGeometry args={[1, 1.2, 0.5, 32]} />
        <meshStandardMaterial color="#004E8C" metalness={0.8} roughness={0.2} />
      </mesh>
      <Float speed={2} rotationIntensity={0.5} floatIntensity={0.5}>
        <Html position={[0, 1, 0]} center distanceFactor={10}>
          <div className="glass p-4 w-48 text-center transition-all duration-300 pointer-events-none">
            <h3 className="text-xl font-bold text-cyan-400 mb-2">{title}</h3>
            <p className="text-sm text-gray-300 leading-relaxed">{content}</p>
          </div>
        </Html>
      </Float>
    </group>
  )
}

export default function Services() {
  const services = [
    { title: "ماموریت ما", content: "خلق تجربه‌های دیجیتال منحصر به فرد و فراتر از انتظار", pos: [2, 0, 0] as [number, number, number] },
    { title: "طراحی خلاق", content: "استفاده از جدیدترین متدهای طراحی سه بعدی و تعاملی", pos: [5, 1, -2] as [number, number, number] },
    { title: "پشتیبانی", content: "همراهی همیشگی ما در مسیر رشد کسب و کار شما", pos: [4, -1, 2] as [number, number, number] },
  ]

  return (
    <group position={[0, -15, -5]}>
      <ParticleLogo />
      {services.map((s, i) => (
        <Pedestal key={i} position={s.pos} title={s.title} content={s.content} />
      ))}
    </group>
  )
}

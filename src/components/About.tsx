'use client'

import { useRef, useMemo, useState } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, Float, Html, PointMaterial, Points as R3FPoints } from '@react-three/drei'
import * as THREE from 'three'
import { useSpring, animated } from '@react-spring/three'

function Pedestal({ position, title, description, color }: { position: [number, number, number], title: string, description: string, color: string }) {
  const [hovered, setHovered] = useState(false)

  const { scale, rotationY } = useSpring({
    scale: hovered ? 1.2 : 1,
    rotationY: hovered ? Math.PI / 4 : 0,
    config: { mass: 1, tension: 170, friction: 26 }
  })

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation-y={rotationY}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      {/* Platform */}
      <mesh position={[0, -0.5, 0]}>
        <cylinderGeometry args={[1, 1.2, 0.5, 32]} />
        <meshStandardMaterial color="#111" />
      </mesh>
      <mesh position={[0, -0.2, 0]}>
        <cylinderGeometry args={[1.05, 1.05, 0.1, 32]} />
        <meshStandardMaterial color={color} emissive={color} emissiveIntensity={hovered ? 2 : 0.5} />
      </mesh>

      {/* Content */}
      <Html position={[0, 1, 0]} center distanceFactor={8}>
        <div className={`text-center transition-all duration-300 w-48 pointer-events-none ${hovered ? 'scale-110' : 'scale-100'}`}>
          <h3 className="text-xl font-bold mb-2" style={{ color }}>{title}</h3>
          <p className="text-xs opacity-80 leading-relaxed">{description}</p>
        </div>
      </Html>
    </animated.group>
  )
}

function LogoParticles() {
  const count = 2000
  const positions = useMemo(() => {
    const p = new Float32Array(count * 3)
    for (let i = 0; i < count; i++) {
      const r = 2 + Math.random() * 0.5
      const theta = Math.random() * Math.PI * 2
      const phi = Math.random() * Math.PI * 2

      p[i * 3] = r * Math.cos(theta)
      p[i * 3 + 1] = r * Math.sin(theta) * 0.5
      p[i * 3 + 2] = r * Math.sin(theta) * Math.sin(phi)
    }
    return p
  }, [])

  const pointsRef = useRef<THREE.Points>(null)

  useFrame((state) => {
    if (pointsRef.current) {
      pointsRef.current.rotation.y = state.clock.elapsedTime * 0.1
      pointsRef.current.rotation.z = Math.sin(state.clock.elapsedTime * 0.2) * 0.1
    }
  })

  return (
    <R3FPoints ref={pointsRef} positions={positions} stride={3} frustumCulled={false}>
      <PointMaterial
        transparent
        color="#00A4FF"
        size={0.02}
        sizeAttenuation={true}
        depthWrite={false}
        opacity={0.6}
      />
    </R3FPoints>
  )
}

export function About({ position }: { position: [number, number, number] }) {
  return (
    <group position={position}>
      <LogoParticles />

      <Text
        position={[0, 4, 0]}
        fontSize={0.8}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        خدمات تخصصی ما
      </Text>

      <group position={[0, -2, 0]}>
        <Pedestal
          position={[-4, 0, 0]}
          title="طراحی مدرن"
          description="خلق رابط کاربری منحصر به فرد با استفاده از آخرین متدهای روز دنیا"
          color="#00A4FF"
        />
        <Pedestal
          position={[0, 0, 2]}
          title="توسعه حرفه‌ای"
          description="پیاده‌سازی سامانه‌های تحت وب با کارایی بالا و امنیت فوق‌العاده"
          color="#22C55E"
        />
        <Pedestal
          position={[4, 0, 0]}
          title="پشتیبانی فنی"
          description="همراهی شما در تمامی مراحل پروژه و تضمین پایداری خدمات"
          color="#004E8C"
        />
      </group>
    </group>
  )
}

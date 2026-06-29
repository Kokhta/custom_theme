'use client'

import { useRef, useMemo, useState, useEffect } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, Float, Html } from '@react-three/drei'
import * as THREE from 'three'
import { useSpring, animated } from '@react-spring/three'

const Pedestal = ({ position, title, description, color }: { position: [number, number, number], title: string, description: string, color: string }) => {
  const [hovered, setHovered] = useState(false)
  const { scale, rotation } = useSpring({
    scale: hovered ? 1.2 : 1,
    rotation: hovered ? [0, Math.PI / 4, 0] : [0, 0, 0],
    config: { mass: 1, tension: 170, friction: 26 }
  })

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation={rotation as any}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <mesh>
        <cylinderGeometry args={[1, 1.2, 0.5, 32]} />
        <meshStandardMaterial color={color} />
      </mesh>
      <mesh position={[0, 0.3, 0]}>
        <cylinderGeometry args={[0.8, 1, 0.2, 32]} />
        <meshStandardMaterial color="white" transparent opacity={0.5} />
      </mesh>

      <Html position={[0, 1.5, 0]} center distanceFactor={8}>
        <div className={`text-center transition-all duration-300 ${hovered ? 'scale-110' : 'scale-100'}`} dir="rtl">
          <h3 className="text-xl font-bold text-white whitespace-nowrap mb-2 shadow-lg" style={{ fontFamily: 'Vazirmatn, sans-serif' }}>{title}</h3>
          <p className="text-sm text-white/80 w-40 leading-relaxed bg-black/40 backdrop-blur-md p-2 rounded-lg" style={{ fontFamily: 'Vazirmatn, sans-serif' }}>
            {description}
          </p>
        </div>
      </Html>
    </animated.group>
  )
}

export const About = () => {
  const pointsRef = useRef<THREE.Points>(null!)
  const geoRef = useRef<THREE.BufferGeometry>(null!)

  // Create particle system forming a logo-like shape (TorusKnot)
  const particles = useMemo(() => {
    const count = 3000
    const positions = new Float32Array(count * 3)
    const geometry = new THREE.TorusKnotGeometry(4, 1.2, 128, 16)
    const sampler = new THREE.Mesh(geometry).geometry.attributes.position

    for (let i = 0; i < count; i++) {
      const idx = Math.floor(Math.random() * (sampler.count))
      positions[i * 3] = sampler.getX(idx)
      positions[i * 3 + 1] = sampler.getY(idx)
      positions[i * 3 + 2] = sampler.getZ(idx)
    }
    return positions
  }, [])

  useEffect(() => {
     if (geoRef.current) {
        geoRef.current.setAttribute('position', new THREE.BufferAttribute(particles, 3))
     }
  }, [particles])

  useFrame((state) => {
    const time = state.clock.getElapsedTime()
    if (pointsRef.current) {
      pointsRef.current.rotation.y = time * 0.1
      pointsRef.current.rotation.z = time * 0.05
    }
  })

  return (
    <group>
      <Text
        position={[0, 6, -5]}
        fontSize={1.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        درباره ما
      </Text>

      {/* Particle System */}
      <points ref={pointsRef}>
        <bufferGeometry ref={geoRef} />
        <pointsMaterial size={0.05} color="#00A4FF" transparent opacity={0.6} sizeAttenuation={true} />
      </points>

      {/* Pedestals */}
      <group position={[0, -4, 0]}>
        <Pedestal
          position={[-5, 0, 0]}
          title="ماموریت ما"
          description="خلق تجربه‌های دیجیتال منحصر به فرد و نوآورانه"
          color="#004E8C"
        />
        <Pedestal
          position={[0, 0, 2]}
          title="طراحی خلاق"
          description="ترکیب هنر و تکنولوژی برای بهترین خروجی"
          color="#00A4FF"
        />
        <Pedestal
          position={[5, 0, 0]}
          title="پشتیبانی"
          description="همیشه در کنار شما برای رشد کسب‌وکارتان"
          color="#22C55E"
        />
      </group>
    </group>
  )
}

'use client'

import { useScroll } from '@react-three/drei'
import { useFrame } from '@react-three/fiber'
import { useRef } from 'react'
import * as THREE from 'three'
import { Hero } from './Hero'
import { About } from './About'
import { ClientCarousel } from './ClientCarousel'
import { Stats } from './Stats'
import { Portfolio, Footer } from './Portfolio'

export const Experience = () => {
  const scroll = useScroll()
  const groupRef = useRef<THREE.Group>(null!)

  useFrame((state) => {
    const offset = scroll.offset

    // Path: 0 -> 200 units
    const targetZ = offset * 200
    const targetX = Math.sin(offset * Math.PI) * 10

    // Dramatic zoom out/up at the very end
    const targetY = offset > 0.95 ? (offset - 0.95) * 400 : 0

    state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, targetZ + 10, 0.05)
    state.camera.position.x = THREE.MathUtils.lerp(state.camera.position.x, targetX, 0.05)
    state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, targetY, 0.05)

    state.camera.lookAt(0, targetY * 0.5, targetZ)
  })

  return (
    <group ref={groupRef}>
      {/* Hero Section */}
      <group position={[0, 0, 0]}>
        <Hero />
      </group>

      {/* About Section */}
      <group position={[0, 0, 40]}>
        <About />
      </group>

      {/* Client Section */}
      <group position={[0, 0, 80]}>
        <ClientCarousel />
      </group>

      {/* Stats Section */}
      <group position={[0, 0, 120]}>
        <Stats />
      </group>

      {/* Portfolio Section */}
      <group position={[0, 0, 160]}>
        <Portfolio />
      </group>

      {/* Footer Section */}
      <group position={[0, 0, 200]}>
        <Footer />
      </group>
    </group>
  )
}

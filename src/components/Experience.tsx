'use client'

import { useRef } from 'react'
import { Canvas, useFrame, useThree } from '@react-three/fiber'
import { ScrollControls, Scroll, Environment, ContactShadows, useScroll } from '@react-three/drei'
import { EffectComposer, Bloom, Noise, Vignette } from '@react-three/postprocessing'
import * as THREE from 'three'
import Hero from './Hero'
import Services from './Services'
import Clients from './Clients'
import Stats from './Stats'
import Portfolio from './Portfolio'
import Footer from './Footer'

function Scene() {
  const scroll = useScroll()
  const { camera } = useThree()

  useFrame((state, delta) => {
    const offset = scroll.offset // 0 to 1

    // We have 5 main visual "stops"
    // 0: Hero (y=0)
    // 0.25: Services (y=-15)
    // 0.5: Clients (y=-35)
    // 0.75: Stats (y=-55)
    // 1.0: Portfolio/Footer (y=-80)

    const points = [
      { x: 0, y: 0, z: 10, lookY: -2 },
      { x: 5, y: -15, z: 2, lookY: -17 },
      { x: -5, y: -35, z: 5, lookY: -37 },
      { x: 0, y: -55, z: 3, lookY: -57 },
      { x: 0, y: -80, z: 40, lookY: -85 } // Zoom out at the end
    ]

    const segment = offset * (points.length - 1)
    const index = Math.min(Math.floor(segment), points.length - 2)
    const t = segment - index

    const p1 = points[index]
    const p2 = points[index + 1]

    const targetX = THREE.MathUtils.lerp(p1.x, p2.x, t)
    const targetY = THREE.MathUtils.lerp(p1.y, p2.y, t)
    const targetZ = THREE.MathUtils.lerp(p1.z, p2.z, t)
    const targetLookY = THREE.MathUtils.lerp(p1.lookY, p2.lookY, t)

    camera.position.lerp(new THREE.Vector3(targetX, targetY, targetZ), 0.05)

    const lookTarget = new THREE.Vector3(0, targetLookY, camera.position.z - 10)
    camera.lookAt(lookTarget)
  })

  return (
    <>
      <Environment preset="city" />
      <ambientLight intensity={0.5} />
      <pointLight position={[10, 10, 10]} intensity={1} />
      <spotLight position={[-10, 10, 10]} angle={0.15} penumbra={1} intensity={2} castShadow />

      <Scroll>
        <Hero />
        <Services />
        <Clients />
        <Stats />
        <Portfolio />
        <Footer />
      </Scroll>

      <ContactShadows
        position={[0, -100, 0]}
        opacity={0.4}
        scale={200}
        blur={2}
        far={50}
      />

      <EffectComposer>
        <Bloom luminanceThreshold={1} mipmapBlur intensity={1.2} radius={0.4} />
        <Noise opacity={0.05} />
        <Vignette eskil={false} offset={0.1} darkness={1.1} />
      </EffectComposer>
    </>
  )
}

export default function Experience() {
  return (
    <div className="w-full h-screen bg-slate-950">
      <Canvas
        shadows
        camera={{ position: [0, 0, 10], fov: 45 }}
        gl={{ antialias: true, preserveDrawingBuffer: true }}
      >
        <ScrollControls pages={6} damping={0.3}>
          <Scene />
        </ScrollControls>
      </Canvas>
    </div>
  )
}

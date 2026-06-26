'use client'

import { Canvas } from '@react-three/fiber'
import { ScrollControls, Scroll, Environment, ContactShadows, Float, useScroll } from '@react-three/drei'
import { EffectComposer, Bloom } from '@react-three/postprocessing'
import { Suspense, useMemo, useRef } from 'react'
import * as THREE from 'three'
import { useFrame } from '@react-three/fiber'
import { Hero } from './Hero'
import { About } from './About'
import { Clients } from './Clients'
import { Stats } from './Stats'
import { Portfolio } from './Portfolio'
import { Footer } from './Footer'

function Scene() {
  const scroll = useScroll()
  const group = useRef<THREE.Group>(null)

  useFrame((state) => {
    const offset = scroll.offset

    // Camera movement logic
    if (offset > 0.9) {
      // Final zoom out / scene reveal effect
      const reveal = (offset - 0.9) * 10 // 0 to 1
      state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, 25 + reveal * 50, 0.1)
      state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, -75, 0.1)
      state.camera.lookAt(0, -75, 0)
    } else {
      state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, 5 + offset * 20, 0.1)
      state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, -offset * 75, 0.1)
      state.camera.lookAt(0, -offset * 75, 0)
    }
  })

  return (
    <group ref={group}>
      <Hero position={[0, 0, 0]} />
      <About position={[0, -15, 0]} />
      <Clients position={[0, -30, 0]} />
      <Stats position={[0, -45, 0]} />
      <Portfolio position={[0, -60, 0]} />
      <Footer position={[0, -75, -5]} />
    </group>
  )
}

export default function Experience() {
  return (
    <div className="h-screen w-full">
      <Canvas
        shadows
        camera={{ position: [0, 0, 5], fov: 75 }}
        gl={{ antialias: true, preserveDrawingBuffer: true }}
      >
        <color attach="background" args={['#050505']} />
        <Suspense fallback={null}>
          <ScrollControls pages={6} damping={0.3}>
            <Scene />

            <Scroll html>
              <div className="w-full text-white pointer-events-none select-none">
                {/* HTML overlays can go here if needed, but we mostly use <Html> within components */}
              </div>
            </Scroll>
          </ScrollControls>

          <Environment preset="city" />
          <ContactShadows
            opacity={0.4}
            scale={20}
            blur={2.4}
            far={10}
            resolution={256}
            color="#000000"
          />

          <EffectComposer>
            <Bloom
              intensity={1.5}
              luminanceThreshold={0.9}
              luminanceSmoothing={0.025}
            />
          </EffectComposer>
        </Suspense>
      </Canvas>
    </div>
  )
}

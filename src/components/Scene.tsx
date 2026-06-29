'use client'

import { Canvas } from '@react-three/fiber'
import { ScrollControls, Environment, ContactShadows } from '@react-three/drei'
import { Suspense } from 'react'
import { Experience } from './Experience'
import { Background } from './Background'
import { EffectComposer, Bloom } from '@react-three/postprocessing'

export const Scene = () => {
  return (
    <div className="h-screen w-full bg-slate-950">
      <Canvas
        shadows
        camera={{ position: [0, 0, 10], fov: 45 }}
        gl={{ antialias: true, preserveDrawingBuffer: true }}
      >
        <Suspense fallback={null}>
          <ScrollControls pages={8} damping={0.1}>
            <Background />
            <Experience />
            <Environment preset="city" />
            <ContactShadows
              opacity={0.4}
              scale={20}
              blur={2.4}
              far={20}
              resolution={256}
              color="#000000"
            />
            <EffectComposer>
              <Bloom luminanceThreshold={1} intensity={1.5} mipmapBlur />
            </EffectComposer>
          </ScrollControls>
        </Suspense>
      </Canvas>
    </div>
  )
}

"use client";

import { Canvas } from "@react-three/fiber";
import { ScrollControls, Scroll, Environment, ContactShadows } from "@react-three/drei";
import { EffectComposer, Bloom, Noise, Vignette } from "@react-three/postprocessing";
import { Experience } from "./Experience";
import { Suspense } from "react";

export default function Scene() {
  return (
    <div className="fixed inset-0 bg-[#000814]">
      <Canvas
        shadows
        camera={{ position: [0, 0, 5], fov: 35 }}
        gl={{ antialias: true, preserveDrawingBuffer: true }}
      >
        <Suspense fallback={null}>
          <ScrollControls pages={5} damping={0.1}>
            <Experience />

            {/* HTML Overlay for static elements if needed */}
            <Scroll html>
              <div className="w-full">
                {/* Any fixed HTML content can go here, but most will be in R3F components */}
              </div>
            </Scroll>
          </ScrollControls>

          <Environment preset="city" />
          <ContactShadows
            opacity={0.4}
            scale={10}
            blur={2.4}
            far={10}
            resolution={256}
            color="#000000"
          />

          <EffectComposer>
            <Bloom
              intensity={1.0}
              luminanceThreshold={0.9}
              luminanceSmoothing={0.025}
            />
            <Noise opacity={0.02} />
            <Vignette eskil={false} offset={0.1} darkness={1.1} />
          </EffectComposer>
        </Suspense>
      </Canvas>
    </div>
  );
}

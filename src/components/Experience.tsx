"use client";

import React, { useRef } from "react";
import { Canvas, useFrame, useThree } from "@react-three/fiber";
import { ScrollControls, Scroll, useScroll, Environment, ContactShadows } from "@react-three/drei";
import { EffectComposer, Bloom } from "@react-three/postprocessing";
import * as THREE from "three";

// We'll define Scene inside or import it. Let's make it a dynamic scene that
// coordinates sections based on scroll.
import Scene from "./Scene";

export default function Experience() {
  return (
    <div className="w-full h-screen bg-slate-950 overflow-hidden relative">
      {/* Background stars / space visual effect behind everything */}
      <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-black z-0 pointer-events-none" />

      <Canvas
        shadows
        camera={{ position: [0, 0, 10], fov: 60 }}
        className="w-full h-full z-10"
      >
        <ambientLight intensity={0.4} />
        <pointLight position={[10, 10, 10]} intensity={1.5} castShadow />
        <directionalLight position={[-5, 8, 5]} intensity={1.0} castShadow />

        {/* Environment for nice reflections */}
        <Environment preset="city" />

        {/* ScrollControls wraps the 3D scene.
            We use 5 pages of scroll corresponding to our sections:
            - Hero (0.0 to 0.2)
            - Services/About (0.2 to 0.4)
            - Clients (0.4 to 0.6)
            - Stats (0.6 to 0.8)
            - Portfolio/Footer (0.8 to 1.0)
        */}
        <ScrollControls pages={5} damping={0.25} distance={1}>
          <Scene />
        </ScrollControls>

        {/* Realistic shadows on the floor if any objects are close */}
        <ContactShadows
          position={[0, -6, 0]}
          opacity={0.6}
          scale={30}
          blur={2.5}
          far={10}
        />

        {/* Bloom post-processing */}
        <EffectComposer>
          <Bloom
            intensity={0.8}
            luminanceThreshold={0.2}
            luminanceSmoothing={0.9}
            height={300}
          />
        </EffectComposer>
      </Canvas>
    </div>
  );
}

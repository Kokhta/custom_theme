"use client";

import { Canvas, useFrame } from "@react-three/fiber";
import {
  ScrollControls,
  Scroll,
  Environment,
  ContactShadows,
  PerspectiveCamera,
  Float,
  useScroll
} from "@react-three/drei";
import { Suspense, useRef } from "react";
import * as THREE from "three";
import { EffectComposer, Bloom, Noise, Vignette } from "@react-three/postprocessing";
import Hero from "./Hero";
import About from "./About";
import Clients from "./Clients";
import Stats from "./Stats";
import Portfolio from "./Portfolio";

function Scene() {
  const scroll = useScroll();

  useFrame((state) => {
    const offset = scroll.offset;
    // Section vertical positions are Hero: 0, About: -20, Clients: -40, Stats: -60, Portfolio: -80
    // Total scroll pages = 6.

    // Base camera Y follows scroll
    const targetY = -offset * 85;
    state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, targetY, 0.1);

    // Zoom out effect at the end
    if (offset > 0.85) {
      const zoomProgress = (offset - 0.85) / 0.15;
      state.camera.position.z = THREE.MathUtils.lerp(10, 40, zoomProgress);
    } else {
      state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, 10, 0.1);
    }

    // Smoothly look slightly down as we move
    state.camera.lookAt(0, state.camera.position.y - 2, 0);
  });

  return (
    <>
      <PerspectiveCamera makeDefault position={[0, 0, 10]} fov={50} />
      <Environment preset="city" />
      <ambientLight intensity={0.5} />
      <spotLight position={[10, 10, 10]} angle={0.15} penumbra={1} intensity={1} castShadow />

      <Scroll>
        <Float speed={1.5} rotationIntensity={0.5} floatIntensity={0.5}>
           <Hero position={[0, 0, 0]} />
        </Float>

        <About position={[0, -20, 0]} />

        <Clients position={[0, -40, 0]} />

        <Stats position={[0, -60, 0]} />

        <Portfolio position={[0, -80, 0]} />

        <ContactShadows
          position={[0, -95, 0]}
          opacity={0.4}
          scale={20}
          blur={2.4}
          far={4.5}
        />
      </Scroll>

      <EffectComposer enableNormalPass>
        <Bloom luminanceThreshold={1} mipmapBlur intensity={1.5} radius={0.4} />
        <Noise opacity={0.05} />
        <Vignette eskil={false} offset={0.1} darkness={1.1} />
      </EffectComposer>
    </>
  );
}

export default function Experience() {
  return (
    <div className="fixed inset-0 bg-[#050a15]">
      <Canvas gl={{ preserveDrawingBuffer: true, antialias: true }}>
        <Suspense fallback={null}>
          <ScrollControls pages={6} damping={0.1}>
            <Scene />
          </ScrollControls>
        </Suspense>
      </Canvas>
    </div>
  );
}

"use client";

import { Canvas, useFrame } from "@react-three/fiber";
import {
  ScrollControls,
  Scroll,
  Environment,
  ContactShadows,
  useScroll
} from "@react-three/drei";
import { Suspense, useRef } from "react";
import * as THREE from "three";
import { Bloom, EffectComposer } from "@react-three/postprocessing";

import Hero from "./sections/Hero";
import AboutServices from "./sections/AboutServices";
import Clients from "./sections/Clients";
import Stats from "./sections/Stats";
import PortfolioFooter from "./sections/PortfolioFooter";

function Scene() {
  const scroll = useScroll();
  const groupRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (groupRef.current) {
      // Camera fly-through logic based on scroll
      // Each section is roughly 20 units apart vertically
      state.camera.position.y = -scroll.offset * 100;
    }
  });

  return (
    <group ref={groupRef}>
      <Hero />
      <AboutServices />
      <Clients />
      <Stats />
      <PortfolioFooter />
    </group>
  );
}

export default function Experience() {
  return (
    <div className="fixed inset-0 h-screen w-full">
      <Canvas
        shadows
        camera={{ position: [0, 0, 10], fov: 45 }}
        gl={{ preserveDrawingBuffer: true }}
      >
        <Suspense fallback={null}>
          <ScrollControls pages={6} damping={0.3}>
            <Scene />
            <Scroll html>
              {/* Overlay HTML content can go here if needed globally */}
            </Scroll>
          </ScrollControls>
          <Environment preset="city" />
          <ContactShadows
            opacity={0.4}
            scale={20}
            blur={2.4}
            far={4.5}
            contactBlur={1}
          />
          <EffectComposer>
            <Bloom
              intensity={1.0}
              luminanceThreshold={0.9}
              luminanceSmoothing={0.025}
            />
          </EffectComposer>
        </Suspense>
      </Canvas>
    </div>
  );
}

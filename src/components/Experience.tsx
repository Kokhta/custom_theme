"use client";

import React, { Suspense } from "react";
import { Canvas } from "@react-three/fiber";
import { Environment, ContactShadows, ScrollControls } from "@react-three/drei";
import { EffectComposer, Bloom } from "@react-three/postprocessing";

import CameraController from "./CameraController";
import HeroSection from "./HeroSection";
import ServicesSection from "./ServicesSection";
import ClientsSection from "./ClientsSection";
import StatsSection from "./StatsSection";
import PortfolioSection from "./PortfolioSection";

export default function Experience() {
  return (
    <div className="w-screen h-screen fixed inset-0 bg-slate-950 overflow-hidden">
      <Canvas
        gl={{ preserveDrawingBuffer: true, antialias: true }}
        camera={{ position: [0, 0, 13], fov: 60 }}
        className="w-full h-full"
      >
        <color attach="background" args={["#020617"]} />
        <ambientLight intensity={0.5} />
        <directionalLight position={[10, 15, 10]} intensity={1.5} castShadow />
        <pointLight position={[-10, -15, -10]} intensity={0.5} />

        <Suspense fallback={null}>
          <Environment preset="city" />

          <ContactShadows
            position={[0, -4.5, 0]}
            opacity={0.4}
            scale={20}
            blur={2.5}
            far={10}
          />

          {/* ScrollControls with 5 pages and clean damping for extreme smoothness */}
          <ScrollControls pages={5} damping={0.25}>
            {/* Camera Controller reading scroll and flying through the scenes */}
            <CameraController />

            {/* Sections mapped vertically */}
            <HeroSection />
            <ServicesSection />
            <ClientsSection />
            <StatsSection />
            <PortfolioSection />
          </ScrollControls>

          {/* Epic Cybernetic Bloom Effect */}
          <EffectComposer>
            <Bloom
              intensity={0.6}
              luminanceThreshold={0.25}
              luminanceSmoothing={0.9}
            />
          </EffectComposer>
        </Suspense>
      </Canvas>
    </div>
  );
}

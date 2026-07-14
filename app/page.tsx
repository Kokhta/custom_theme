"use client";

import { Canvas } from "@react-three/fiber";
import { ScrollControls, Scroll } from "@react-three/drei";
import { Experience } from "@/components/Experience";
import { Suspense } from "react";

export default function Home() {
  return (
    <main className="h-screen w-full">
      <Canvas
        shadows
        camera={{ position: [0, 0, 5], fov: 30 }}
        gl={{ antialias: true, preserveDrawingBuffer: true }}
      >
        <Suspense fallback={null}>
          <ScrollControls pages={6} damping={0.1}>
            <Experience />
            <Scroll html>
               {/* Global HTML elements if needed */}
            </Scroll>
          </ScrollControls>
        </Suspense>
      </Canvas>
    </main>
  );
}

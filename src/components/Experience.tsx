"use client";

import { useScroll } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import * as THREE from "three";
import { Hero } from "./Hero";
import { AboutServices } from "./AboutServices";
import { ClientLogos } from "./ClientLogos";
import { Stats } from "./Stats";
import { PortfolioFooter } from "./PortfolioFooter";

export function Experience() {
  const scroll = useScroll();
  const group = useRef<THREE.Group>(null);

  useFrame((state) => {
    const offset = scroll.offset;

    // Camera fly-through logic
    // Section 1: Hero (0 - 0.2)
    // Section 2: About/Services (0.2 - 0.4)
    // Section 3: Client Logos (0.4 - 0.6)
    // Section 4: Stats (0.6 - 0.8)
    // Section 5: Portfolio/Footer (0.8 - 1.0)

    // Smooth camera positioning based on scroll
    const targetPosition = new THREE.Vector3(0, -offset * 100, 5);
    state.camera.position.lerp(targetPosition, 0.1);

    // Rotate scene slightly based on mouse
    state.camera.lookAt(0, -offset * 100, 0);
  });

  return (
    <group ref={group}>
      <Hero position={[0, 0, 0]} />
      <AboutServices position={[0, -25, 0]} />
      <ClientLogos position={[0, -50, 0]} />
      <Stats position={[0, -70, 0]} />
      <PortfolioFooter position={[0, -95, 0]} />
    </group>
  );
}

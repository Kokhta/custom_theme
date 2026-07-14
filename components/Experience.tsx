"use client";

import { useScroll, Environment, ContactShadows } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import * as THREE from "three";
import { EffectComposer, Bloom } from "@react-three/postprocessing";
import { Hero } from "./sections/Hero";
import { About } from "./sections/About";
import { Carousel } from "./sections/Carousel";
import { Stats } from "./sections/Stats";
import { Portfolio } from "./sections/Portfolio";

export const Experience = () => {
  const scroll = useScroll();
  const group = useRef<THREE.Group>(null!);

  useFrame((state) => {
    const offset = scroll.offset;

    // Total vertical distance: 80 units (4 gaps of 20)
    // Sections at: 0, -20, -40, -60, -80
    const targetY = -offset * 80;

    // Dynamic camera distance
    let targetZ = 12;
    if (offset > 0.9) {
      targetZ = 12 + (offset - 0.9) * 400; // Zoom out at the end
    }

    state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, targetZ, 0.05);
    state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, targetY + 2, 0.05);

    state.camera.lookAt(0, targetY, 0);
  });

  return (
    <>
      <color attach="background" args={["#000005"]} />
      <Environment preset="city" />
      <ambientLight intensity={0.4} />
      <pointLight position={[10, 10, 10]} intensity={1.5} color="#00A4FF" />
      <pointLight position={[-10, -10, -10]} intensity={1} color="#004E8C" />

      <group ref={group}>
        <Hero />
        <About position={[0, -20, 0]} />
        <Carousel position={[0, -40, 0]} />
        <Stats position={[0, -60, 0]} />
        <Portfolio position={[0, -80, 0]} />
      </group>

      <ContactShadows
        opacity={0.4}
        scale={100}
        blur={2}
        far={150}
        resolution={256}
        color="#000000"
      />

      <EffectComposer>
        <Bloom
          luminanceThreshold={0.2}
          mipmapBlur
          intensity={1.2}
          radius={0.4}
        />
      </EffectComposer>
    </>
  );
};

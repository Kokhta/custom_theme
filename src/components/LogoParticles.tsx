"use client";

import React, { useMemo, useRef } from "react";
import { useFrame } from "@react-three/fiber";
import * as THREE from "three";

export default function LogoParticles() {
  const pointsRef = useRef<THREE.Points>(null);
  const count = 1800;

  // Generate spherical/icosahedral pattern using golden ratio spiral distribution
  // for perfectly uniform and performant distribution without re-generations.
  const [positions, colors] = useMemo(() => {
    const pos = new Float32Array(count * 3);
    const cols = new Float32Array(count * 3);

    // Warm palette: deep blue, bright cyan, neon green accents
    const colorCyan = new THREE.Color("#00A4FF");
    const colorBlue = new THREE.Color("#004E8C");
    const colorGreen = new THREE.Color("#22C55E");

    for (let i = 0; i < count; i++) {
      // Golden spiral distribution on a sphere
      const phi = Math.acos(1 - 2 * (i / count));
      const theta = Math.PI * (1 + Math.sqrt(5)) * i;

      // Base radius of the sphere
      const radius = 2.5 + Math.sin(theta * 0.1) * 0.3;

      const x = radius * Math.sin(phi) * Math.cos(theta);
      const y = radius * Math.sin(phi) * Math.sin(theta);
      const z = radius * Math.cos(phi);

      pos[i * 3] = x;
      pos[i * 3 + 1] = y;
      pos[i * 3 + 2] = z;

      // Dynamic color interpolation based on coordinates
      let mixedColor = colorBlue.clone();
      if (Math.sin(phi * 4) > 0.3) {
        mixedColor.lerp(colorCyan, 0.7);
      } else if (Math.cos(theta * 2) > 0.5) {
        mixedColor.lerp(colorGreen, 0.6);
      } else {
        mixedColor.lerp(colorCyan, 0.2);
      }

      cols[i * 3] = mixedColor.r;
      cols[i * 3 + 1] = mixedColor.g;
      cols[i * 3 + 2] = mixedColor.b;
    }

    return [pos, cols];
  }, [count]);

  useFrame((state) => {
    if (pointsRef.current) {
      // Gently rotate and morph slightly to represent a breathing cybernetic structure
      pointsRef.current.rotation.y = state.clock.getElapsedTime() * 0.08;
      pointsRef.current.rotation.x = state.clock.getElapsedTime() * 0.04;

      // Pulsing scale effect
      const scale = 1.0 + Math.sin(state.clock.getElapsedTime() * 1.5) * 0.05;
      pointsRef.current.scale.set(scale, scale, scale);
    }
  });

  return (
    <points ref={pointsRef}>
      <bufferGeometry>
        <bufferAttribute
          attach="attributes-position"
          count={count}
          array={positions}
          itemSize={3}
          args={[positions, 3]}
        />
        <bufferAttribute
          attach="attributes-color"
          count={count}
          array={colors}
          itemSize={3}
          args={[colors, 3]}
        />
      </bufferGeometry>
      <pointsMaterial
        size={0.065}
        vertexColors
        transparent
        opacity={0.85}
        sizeAttenuation
        depthWrite={false}
        blending={THREE.AdditiveBlending}
      />
    </points>
  );
}

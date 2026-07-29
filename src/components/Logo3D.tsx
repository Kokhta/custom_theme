"use client";

import React, { useMemo } from "react";
import * as THREE from "three";

export default function Logo3D(props: any) {
  // Let's procedurally create a beautiful, sleek cybernetic 3D logo for Atisoft.
  // The shape can be a combination of stylized modern rings and a glowing central core
  // to represent highly professional design and software engineering.
  const centralTorus = useMemo(() => new THREE.TorusGeometry(1.2, 0.15, 16, 100), []);
  const outerTorus = useMemo(() => new THREE.TorusGeometry(1.7, 0.08, 12, 64), []);
  const coreSphere = useMemo(() => new THREE.SphereGeometry(0.5, 32, 32), []);

  return (
    <group {...props}>
      {/* Central core sphere */}
      <mesh geometry={coreSphere}>
        <meshStandardMaterial
          color="#00A4FF"
          emissive="#00A4FF"
          emissiveIntensity={2.0}
          roughness={0.1}
          metalness={0.9}
        />
      </mesh>

      {/* Main rotating torus */}
      <mesh geometry={centralTorus} rotation={[Math.PI / 4, Math.PI / 4, 0]}>
        <meshStandardMaterial
          color="#004E8C"
          roughness={0.2}
          metalness={0.8}
        />
      </mesh>

      {/* Stylized orbiting diagonal ring */}
      <mesh geometry={outerTorus} rotation={[-Math.PI / 3, Math.PI / 6, 0]}>
        <meshStandardMaterial
          color="#00A4FF"
          roughness={0.3}
          metalness={0.9}
          wireframe
        />
      </mesh>

      {/* Additional intersecting thin ring */}
      <mesh geometry={outerTorus} rotation={[Math.PI / 6, -Math.PI / 3, Math.PI / 4]}>
        <meshStandardMaterial
          color="#22C55E"
          roughness={0.2}
          metalness={0.7}
        />
      </mesh>
    </group>
  );
}

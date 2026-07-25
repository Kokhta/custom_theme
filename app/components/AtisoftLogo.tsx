import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import * as THREE from "three";

export function AtisoftLogo() {
  const groupRef = useRef<THREE.Group>(null);
  const coreRef = useRef<THREE.Mesh>(null);
  const outerRing1Ref = useRef<THREE.Mesh>(null);
  const outerRing2Ref = useRef<THREE.Mesh>(null);

  useFrame((state) => {
    const t = state.clock.getElapsedTime();

    if (groupRef.current) {
      // Floating motion
      groupRef.current.position.y = Math.sin(t * 1.5) * 0.35;
      groupRef.current.rotation.y = t * 0.15;
    }

    if (coreRef.current) {
      // Continuous pulse/float
      const pulse = 1.0 + Math.sin(t * 3.0) * 0.08;
      coreRef.current.scale.set(pulse, pulse, pulse);
      coreRef.current.rotation.x = t * 0.4;
      coreRef.current.rotation.z = -t * 0.3;
    }

    if (outerRing1Ref.current) {
      outerRing1Ref.current.rotation.x = t * 0.3;
      outerRing1Ref.current.rotation.y = t * 0.5;
    }

    if (outerRing2Ref.current) {
      outerRing2Ref.current.rotation.x = -t * 0.4;
      outerRing2Ref.current.rotation.z = t * 0.2;
    }
  });

  return (
    <group ref={groupRef}>
      {/* Central glowing core (representing the main architectural seed) */}
      <mesh ref={coreRef}>
        <icosahedronGeometry args={[1.2, 1]} />
        <meshStandardMaterial
          color="#00A4FF"
          emissive="#004E8C"
          emissiveIntensity={1.8}
          wireframe
          roughness={0.1}
          metalness={0.9}
        />
      </mesh>

      {/* Inner solid glowing power core */}
      <mesh>
        <sphereGeometry args={[0.5, 16, 16]} />
        <meshStandardMaterial
          color="#22C55E"
          emissive="#22C55E"
          emissiveIntensity={1.2}
          roughness={0.2}
        />
      </mesh>

      {/* Orbiting Ring 1 */}
      <mesh ref={outerRing1Ref} rotation={[Math.PI / 4, 0, 0]}>
        <torusGeometry args={[2.0, 0.06, 16, 100]} />
        <meshStandardMaterial
          color="#00A4FF"
          emissive="#00A4FF"
          emissiveIntensity={1.5}
          roughness={0}
        />
      </mesh>

      {/* Orbiting Ring 2 */}
      <mesh ref={outerRing2Ref} rotation={[-Math.PI / 4, Math.PI / 4, 0]}>
        <torusGeometry args={[2.5, 0.05, 12, 100]} />
        <meshStandardMaterial
          color="#22C55E"
          emissive="#22C55E"
          emissiveIntensity={1.0}
          roughness={0}
        />
      </mesh>

      {/* Node elements on rings for extra high-tech detail */}
      {[...Array(6)].map((_, i) => {
        const angle = (i / 6) * Math.PI * 2;
        const x = Math.cos(angle) * 2.0;
        const z = Math.sin(angle) * 2.0;
        return (
          <mesh key={i} position={[x, 0, z]}>
            <sphereGeometry args={[0.15, 8, 8]} />
            <meshStandardMaterial
              color="#ffffff"
              emissive="#00A4FF"
              emissiveIntensity={1.5}
            />
          </mesh>
        );
      })}
    </group>
  );
}

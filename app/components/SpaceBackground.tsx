import { useRef, useMemo } from "react";
import { useFrame } from "@react-three/fiber";
import { Stars } from "@react-three/drei";
import * as THREE from "three";

export function SpaceBackground() {
  const groupRef = useRef<THREE.Group>(null);

  // Generate deterministic floating decorative shapes (decor_sphere, decor_cube, decor_ring equivalent)
  // scattered along the vertical diorama column (Y: 10 to -90)
  const items = useMemo(() => {
    const arr = [];
    const seedRandom = (s: number) => {
      const x = Math.sin(s) * 10000;
      return x - Math.floor(x);
    };

    for (let i = 0; i < 30; i++) {
      const seed = i + 1.23;
      const typeNum = seedRandom(seed);
      let type: "sphere" | "cube" | "ring" = "sphere";
      if (typeNum < 0.33) type = "sphere";
      else if (typeNum < 0.66) type = "cube";
      else type = "ring";

      const y = 10 - seedRandom(seed * 2) * 110; // spread from +10 to -100
      const angle = seedRandom(seed * 3) * Math.PI * 2;
      const radius = 6 + seedRandom(seed * 4) * 8; // distance from central scene column
      const x = Math.cos(angle) * radius;
      const z = Math.sin(angle) * radius - 2; // slightly push back

      const scale = 0.2 + seedRandom(seed * 5) * 0.6;
      const rotationSpeed = {
        x: (seedRandom(seed * 6) - 0.5) * 0.5,
        y: (seedRandom(seed * 7) - 0.5) * 0.5,
        z: (seedRandom(seed * 8) - 0.5) * 0.5,
      };

      const color = seedRandom(seed * 9) > 0.5 ? "#00A4FF" : "#004E8C";

      arr.push({ id: i, type, x, y, z, scale, rotationSpeed, color });
    }
    return arr;
  }, []);

  useFrame((state) => {
    if (groupRef.current) {
      const t = state.clock.getElapsedTime();
      // Gently rotate the entire outer decoration array for a galaxy feel
      groupRef.current.rotation.y = t * 0.02;

      // Make individual child meshes animate/wobble slightly
      groupRef.current.children.forEach((child, i) => {
        const item = items[i];
        if (item && child) {
          child.rotation.x += item.rotationSpeed.x * 0.01;
          child.rotation.y += item.rotationSpeed.y * 0.01;
          child.rotation.z += item.rotationSpeed.z * 0.01;

          // Float animation
          child.position.y = item.y + Math.sin(t + item.id) * 0.15;
        }
      });
    }
  });

  return (
    <>
      {/* Immersive starfield background */}
      <Stars
        radius={100}
        depth={50}
        count={2500}
        factor={4}
        saturation={0.5}
        fade
        speed={1.5}
      />

      <group ref={groupRef}>
        {items.map((item) => {
          return (
            <group
              key={item.id}
              position={[item.x, item.y, item.z]}
              scale={[item.scale, item.scale, item.scale]}
            >
              {item.type === "sphere" && (
                <mesh>
                  <sphereGeometry args={[1, 16, 16]} />
                  <meshStandardMaterial
                    color={item.color}
                    roughness={0.2}
                    metalness={0.8}
                    emissive={item.color}
                    emissiveIntensity={0.2}
                  />
                </mesh>
              )}

              {item.type === "cube" && (
                <mesh>
                  <boxGeometry args={[1.5, 1.5, 1.5]} />
                  <meshStandardMaterial
                    color={item.color}
                    roughness={0.3}
                    metalness={0.7}
                    emissive={item.color}
                    emissiveIntensity={0.1}
                  />
                </mesh>
              )}

              {item.type === "ring" && (
                <mesh>
                  <torusGeometry args={[1.1, 0.25, 8, 24]} />
                  <meshStandardMaterial
                    color={item.color}
                    roughness={0.1}
                    metalness={0.9}
                    emissive={item.color}
                    emissiveIntensity={0.15}
                  />
                </mesh>
              )}
            </group>
          );
        })}
      </group>
    </>
  );
}

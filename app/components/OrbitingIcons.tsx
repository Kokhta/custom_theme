import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { Float, Html } from "@react-three/drei";
import * as THREE from "three";

export function OrbitingIcons() {
  const groupRef = useRef<THREE.Group>(null);

  useFrame((state) => {
    if (groupRef.current) {
      // Rotate the orbits continuously
      groupRef.current.rotation.y = state.clock.getElapsedTime() * 0.4;
    }
  });

  const socials = [
    {
      name: "تلگرام",
      color: "#00A4FF",
      icon: (
        <svg
          className="w-5 h-5 text-white"
          viewBox="0 0 24 24"
          fill="currentColor"
        >
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.01-.03.01-.14-.07-.2-.08-.06-.19-.04-.27-.02-.12.02-1.96 1.25-5.54 3.69-.52.36-1 .53-1.42.52-.47-.01-1.37-.26-2.03-.48-.82-.27-1.47-.42-1.42-.88.03-.24.35-.49.97-.74 3.79-1.65 6.32-2.73 7.59-3.25 3.61-1.48 4.36-1.74 4.85-1.75.11 0 .35.03.5.16.13.1.17.24.18.34-.01.06.01.21 0 .28z" />
        </svg>
      ),
    },
    {
      name: "اینستاگرام",
      color: "#E1306C",
      icon: (
        <svg
          className="w-5 h-5 text-white"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          strokeWidth="2"
          strokeLinecap="round"
          strokeLinejoin="round"
        >
          <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
          <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
        </svg>
      ),
    },
    {
      name: "لینکدین",
      color: "#0077B5",
      icon: (
        <svg
          className="w-5 h-5 text-white"
          viewBox="0 0 24 24"
          fill="currentColor"
        >
          <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
        </svg>
      ),
    },
    {
      name: "گیت‌هاب",
      color: "#333333",
      icon: (
        <svg
          className="w-5 h-5 text-white"
          viewBox="0 0 24 24"
          fill="currentColor"
        >
          <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
        </svg>
      ),
    },
  ];

  return (
    <group ref={groupRef}>
      {socials.map((soc, idx) => {
        const angle = (idx / socials.length) * Math.PI * 2;
        const radius = 4.0;
        const x = Math.cos(angle) * radius;
        const z = Math.sin(angle) * radius;

        return (
          <group key={soc.name} position={[x, 0, z]}>
            <Float speed={2.5} rotationIntensity={1.2} floatIntensity={1.8}>
              {/* Box backplate */}
              <mesh>
                <boxGeometry args={[0.7, 0.7, 0.15]} />
                <meshStandardMaterial
                  color={soc.color}
                  roughness={0.15}
                  metalness={0.8}
                  emissive={soc.color}
                  emissiveIntensity={0.4}
                />
              </mesh>

              {/* Translucent white halo rim */}
              <mesh scale={[1.1, 1.1, 1.1]} position={[0, 0, -0.05]}>
                <boxGeometry args={[0.7, 0.7, 0.05]} />
                <meshBasicMaterial
                  color="#ffffff"
                  transparent
                  opacity={0.15}
                />
              </mesh>

              {/* Interactive HTML inside Canvas representing the Social Icon */}
              <Html distanceFactor={8} center transform>
                <div
                  className="flex items-center justify-center w-10 h-10 rounded-xl cursor-pointer shadow-lg transition-all duration-300 hover:scale-125 hover:rotate-6 active:scale-90"
                  style={{ backgroundColor: soc.color }}
                  title={soc.name}
                >
                  {soc.icon}
                </div>
              </Html>
            </Float>
          </group>
        );
      })}
    </group>
  );
}

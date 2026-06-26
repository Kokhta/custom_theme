'use client'

import { useRef, useMemo } from 'react'
import { useFrame } from '@react-three/fiber'
import { Float, Html, Text, MeshDistortMaterial } from '@react-three/drei'
import * as THREE from 'three'

function OrbitingIcon({ position, color, speed = 1 }: { position: [number, number, number], color: string, speed?: number }) {
  const meshRef = useRef<THREE.Mesh>(null)

  useFrame((state) => {
    if (meshRef.current) {
      const t = state.clock.elapsedTime * speed
      meshRef.current.position.x = position[0] + Math.cos(t) * 0.5
      meshRef.current.position.z = position[2] + Math.sin(t) * 0.5
      meshRef.current.rotation.y += 0.01
    }
  })

  return (
    <mesh ref={meshRef} position={position}>
      <octahedronGeometry args={[0.2, 0]} />
      <meshStandardMaterial color={color} emissive={color} emissiveIntensity={0.5} />
    </mesh>
  )
}

export function Hero({ position }: { position: [number, number, number] }) {
  const logoRef = useRef<THREE.Group>(null)

  useFrame((state) => {
    if (logoRef.current) {
      logoRef.current.position.y = Math.sin(state.clock.elapsedTime) * 0.15
      logoRef.current.rotation.y = Math.sin(state.clock.elapsedTime * 0.5) * 0.1
    }
  })

  return (
    <group position={position}>
      {/* Immersive Logo equivalent */}
      <group ref={logoRef}>
        <mesh>
          <torusKnotGeometry args={[0.8, 0.3, 128, 16]} />
          <MeshDistortMaterial
            color="#00A4FF"
            speed={2}
            distort={0.4}
            emissive="#00A4FF"
            emissiveIntensity={0.5}
          />
        </mesh>

        <Text
          position={[0, -1.8, 0]}
          fontSize={0.6}
          color="white"
          anchorX="center"
          anchorY="middle"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
      </group>

      {/* Orbiting Social Icons (represented by shapes) */}
      <OrbitingIcon position={[2, 1, 0]} color="#00A4FF" speed={1.2} /> {/* Telegram */}
      <OrbitingIcon position={[-2, -1, 1]} color="#E4405F" speed={0.8} /> {/* Instagram */}
      <OrbitingIcon position={[1.5, -2, -1]} color="#22C55E" speed={1.5} /> {/* WhatsApp */}

      {/* Glassmorphism Form Overlay */}
      <Html
        position={[-3.5, 0, 0]}
        transform
        distanceFactor={6}
        rotation={[0, 0.2, 0]}
      >
        <div className="glass-panel p-8 w-80 text-white flex flex-col gap-4 pointer-events-auto shadow-2xl backdrop-blur-xl">
          <h2 className="text-2xl font-bold mb-2 border-b border-white/10 pb-2">ثبت درخواست</h2>
          <div className="flex flex-col gap-1">
            <label className="text-sm opacity-70">نام و نام خانوادگی</label>
            <input
              type="text"
              className="bg-white/5 border border-white/10 p-3 rounded-lg outline-none focus:border-cyan-400 transition-all"
            />
          </div>
          <div className="flex flex-col gap-1">
            <label className="text-sm opacity-70">شماره تماس</label>
            <input
              type="tel"
              className="bg-white/5 border border-white/10 p-3 rounded-lg outline-none focus:border-cyan-400 transition-all"
            />
          </div>
          <div className="flex flex-col gap-1">
            <label className="text-sm opacity-70">توضیحات پروژه</label>
            <textarea
              className="bg-white/5 border border-white/10 p-3 rounded-lg h-24 outline-none focus:border-cyan-400 transition-all resize-none"
            />
          </div>
          <button className="bg-[#22C55E] hover:bg-green-600 transition-all p-3 rounded-lg font-bold mt-2 shadow-lg shadow-green-900/20 active:scale-95">
            ارسال مشاوره رایگان
          </button>
        </div>
      </Html>
    </group>
  )
}

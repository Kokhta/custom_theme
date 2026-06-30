'use client'

import { useRef, useMemo } from 'react'
import { useFrame } from '@react-three/fiber'
import { Float, Html, Text, MeshDistortMaterial } from '@react-three/drei'
import { useSpring, animated } from '@react-spring/three'
import * as THREE from 'three'

// SVGs for social icons to avoid lucide resolution issues in Turbopack
const InstagramIcon = () => (
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
)
const SendIcon = () => (
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
)
const LinkedinIcon = () => (
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
)

function Logo() {
  const meshRef = useRef<THREE.Mesh>(null!)

  useFrame((state) => {
    const time = state.clock.getElapsedTime()
    meshRef.current.rotation.y = time * 0.5
    meshRef.current.position.y = Math.sin(time) * 0.2
  })

  return (
    <group position={[0, 2, 0]}>
      <mesh ref={meshRef}>
        <torusKnotGeometry args={[1, 0.3, 128, 16]} />
        <MeshDistortMaterial color="#00A4FF" speed={2} distort={0.4} />
      </mesh>
      <Text
        position={[0, -1.5, 0]}
        fontSize={0.5}
        color="white"
        anchorX="center"
        anchorY="middle"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        آتی‌سافت
      </Text>
    </group>
  )
}

function SocialIcons() {
  const groupRef = useRef<THREE.Group>(null!)

  useFrame((state) => {
    const time = state.clock.getElapsedTime()
    groupRef.current.rotation.y = time * 0.3
  })

  const icons = [
    { Icon: InstagramIcon, color: '#E4405F', pos: [3, 0, 0] },
    { Icon: SendIcon, color: '#0088cc', pos: [-3, 0, 0] },
    { Icon: LinkedinIcon, color: '#0077B5', pos: [0, 0, 3] },
  ]

  return (
    <group ref={groupRef} position={[0, 2, 0]}>
      {icons.map((item, i) => (
        <Float key={i} speed={2} rotationIntensity={1} floatIntensity={2}>
          <Html position={item.pos as [number, number, number]} center distanceFactor={10}>
            <div
              className="p-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 hover:scale-110 transition-transform cursor-pointer"
              style={{ color: item.color }}
            >
              <item.Icon />
            </div>
          </Html>
        </Float>
      ))}
    </group>
  )
}

function RegistrationForm() {
  return (
    <Html position={[0, -2, 0]} center distanceFactor={12}>
      <div className="glass p-8 w-[350px] flex flex-col gap-4 text-right" dir="rtl">
        <h2 className="text-2xl font-bold text-cyan-400 mb-2">شروع پروژه جدید</h2>
        <input
          type="text"
          placeholder="نام و نام خانوادگی"
          className="bg-white/5 border border-white/10 rounded-lg p-2 focus:outline-none focus:border-cyan-500 transition-colors"
        />
        <input
          type="email"
          placeholder="ایمیل یا شماره تماس"
          className="bg-white/5 border border-white/10 rounded-lg p-2 focus:outline-none focus:border-cyan-500 transition-colors"
        />
        <textarea
          placeholder="توضیحات پروژه"
          rows={3}
          className="bg-white/5 border border-white/10 rounded-lg p-2 focus:outline-none focus:border-cyan-500 transition-colors"
        ></textarea>
        <button className="bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-lg transition-colors">
          ارسال درخواست
        </button>
      </div>
    </Html>
  )
}

export default function Hero() {
  return (
    <group position={[0, 0, 0]}>
      <Logo />
      <SocialIcons />
      <RegistrationForm />
    </group>
  )
}

'use client'

import { Float, Html } from '@react-three/drei'
import { useFrame } from '@react-three/fiber'
import { useRef } from 'react'
import * as THREE from 'three'

export const Hero = () => {
  const logoRef = useRef<THREE.Mesh>(null!)
  const orbitGroupRef = useRef<THREE.Group>(null!)

  useFrame((state) => {
    const time = state.clock.getElapsedTime()
    if (logoRef.current) {
      logoRef.current.position.y = Math.sin(time) * 0.2
      logoRef.current.rotation.y = time * 0.5
    }
    if (orbitGroupRef.current) {
      orbitGroupRef.current.rotation.y = time * 0.5
    }
  })

  return (
    <group>
      {/* Floating Logo */}
      <Float speed={2} rotationIntensity={0.5} floatIntensity={1}>
        <mesh ref={logoRef}>
          <torusKnotGeometry args={[2, 0.6, 128, 16]} />
          <meshStandardMaterial color="#00A4FF" emissive="#00A4FF" emissiveIntensity={0.5} />
        </mesh>
      </Float>

      {/* Orbiting Social Icons */}
      <group ref={orbitGroupRef}>
        <Float speed={3} rotationIntensity={1} floatIntensity={2} position={[5, 0, 0]}>
           <Html distanceFactor={10}>
              <div className="flex items-center justify-center w-12 h-12 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-white cursor-pointer hover:bg-white/20 transition-colors">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
              </div>
           </Html>
        </Float>
        <Float speed={2.5} rotationIntensity={1} floatIntensity={2} position={[-4.3, 0, 2.5]}>
           <Html distanceFactor={10}>
              <div className="flex items-center justify-center w-12 h-12 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-white cursor-pointer hover:bg-white/20 transition-colors">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              </div>
           </Html>
        </Float>
        <Float speed={3.5} rotationIntensity={1} floatIntensity={2} position={[-1.5, 0, -4.7]}>
           <Html distanceFactor={10}>
              <div className="flex items-center justify-center w-12 h-12 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-white cursor-pointer hover:bg-white/20 transition-colors">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
              </div>
           </Html>
        </Float>
      </group>

      {/* Glassmorphism Form */}
      <Html position={[0, -6, 0]} center distanceFactor={10}>
        <div className="bg-white/5 backdrop-blur-2xl p-10 rounded-3xl border border-white/10 shadow-2xl w-[400px] text-right" dir="rtl">
          <h2 className="text-3xl font-bold text-white mb-8" style={{ fontFamily: 'Vazirmatn, sans-serif' }}>ثبت‌نام در آتی‌سافت</h2>
          <div className="space-y-6">
            <input
              type="text"
              placeholder="نام و نام خانوادگی"
              className="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white placeholder-white/30 focus:outline-none focus:border-[#00A4FF] transition-all"
              style={{ fontFamily: 'Vazirmatn, sans-serif' }}
            />
            <input
              type="email"
              placeholder="ایمیل"
              className="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white placeholder-white/30 focus:outline-none focus:border-[#00A4FF] transition-all"
              style={{ fontFamily: 'Vazirmatn, sans-serif' }}
            />
            <button className="w-full bg-[#22C55E] hover:bg-[#1eb054] text-white font-bold py-4 rounded-xl transition-all transform hover:scale-105 active:scale-95 shadow-lg shadow-green-500/20" style={{ fontFamily: 'Vazirmatn, sans-serif' }}>
              ارسال درخواست
            </button>
          </div>
        </div>
      </Html>
    </group>
  )
}

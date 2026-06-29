'use client'

import { useRef, useState } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, RoundedBox, Float } from '@react-three/drei'
import * as THREE from 'three'
import { useSpring, animated } from '@react-spring/three'

const PortfolioScreen = ({ position, title, color }: { position: [number, number, number], title: string, color: string }) => {
  const [hovered, setHovered] = useState(false)
  const { rotation, scale, glowIntensity } = useSpring({
    rotation: hovered ? [-0.2, 0.2, 0] : [0, 0, 0],
    scale: hovered ? 1.1 : 1,
    glowIntensity: hovered ? 2 : 0.5,
    config: { mass: 1, tension: 120, friction: 14 }
  })

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation={rotation as any}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[6, 4, 0.1]} radius={0.1}>
        <meshStandardMaterial color="#111" />
      </RoundedBox>
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[5.8, 3.8]} />
        <meshStandardMaterial color={color} emissive={color} emissiveIntensity={glowIntensity as any} />
      </mesh>
      <Text
        position={[0, -2.8, 0]}
        fontSize={0.4}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        {title}
      </Text>
    </animated.group>
  )
}

export const Portfolio = () => {
  return (
    <group>
      <Text
        position={[0, 8, -5]}
        fontSize={1.2}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      <PortfolioScreen position={[-7, 0, 0]} title="پلتفرم معاملات آنلاین" color="#00A4FF" />
      <PortfolioScreen position={[0, 2, 4]} title="اپلیکیشن مدیریت مالی" color="#004E8C" />
      <PortfolioScreen position={[7, -2, 2]} title="وب‌سایت فروشگاهی" color="#22C55E" />
    </group>
  )
}

export const Footer = () => {
  const terrainRef = useRef<THREE.Mesh>(null!)

  return (
    <group>
      {/* Low-poly landscape */}
      <mesh ref={terrainRef} rotation={[-Math.PI / 2, 0, 0]} position={[0, -10, 0]}>
        <planeGeometry args={[200, 200, 40, 40]} />
        <meshStandardMaterial color="#00A4FF" wireframe transparent opacity={0.2} />
      </mesh>

      <Float speed={1} rotationIntensity={0.5} floatIntensity={0.5}>
        <Text
          position={[0, 8, -20]}
          fontSize={4}
          color="#00A4FF"
          font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
        >
          آتی‌سافت
        </Text>
      </Float>

      <Text
        position={[0, 3, -20]}
        fontSize={1}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        خلاقیت در بی‌نهایت
      </Text>

      <Text
        position={[0, -2, -20]}
        fontSize={0.4}
        color="#22C55E"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Regular.ttf"
      >
        © ۲۰۲۵ تمامی حقوق برای آتی‌سافت محفوظ است
      </Text>
    </group>
  )
}

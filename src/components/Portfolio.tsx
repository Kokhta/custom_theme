'use client'

import { useRef, useState } from 'react'
import { useFrame } from '@react-three/fiber'
import { Text, RoundedBox, useScroll } from '@react-three/drei'
import * as THREE from 'three'
import { useSpring, animated } from '@react-spring/three'

function PortfolioScreen({ position, title, color }: { position: [number, number, number], title: string, color: string }) {
  const [hovered, setHovered] = useState(false)

  const { rotationX, rotationY, scale, glowIntensity } = useSpring({
    rotationX: hovered ? -0.2 : 0,
    rotationY: hovered ? 0.2 : 0,
    scale: hovered ? 1.1 : 1,
    glowIntensity: hovered ? 2 : 0.2,
    config: { mass: 1, tension: 200, friction: 20 }
  })

  return (
    <animated.group
      position={position}
      scale={scale}
      rotation-x={rotationX}
      rotation-y={rotationY}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      <RoundedBox args={[4, 2.5, 0.1]} radius={0.1}>
        <meshStandardMaterial color="#111" metalness={0.9} roughness={0.1} />
      </RoundedBox>

      {/* Screen Placeholder */}
      <mesh position={[0, 0, 0.06]}>
        <planeGeometry args={[3.8, 2.3]} />
        <animated.meshStandardMaterial
          color={color}
          emissive={color}
          emissiveIntensity={glowIntensity}
        />
      </mesh>

      <Text
        position={[0, -1.6, 0]}
        fontSize={0.3}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Medium.ttf"
      >
        {title}
      </Text>
    </animated.group>
  )
}

export function Portfolio({ position }: { position: [number, number, number] }) {
  return (
    <group position={position}>
      <Text
        position={[0, 4, 0]}
        fontSize={0.8}
        color="white"
        font="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts/ttf/Vazirmatn-Bold.ttf"
      >
        نمونه کارها
      </Text>

      <PortfolioScreen position={[-4, 1, 0]} title="سامانه هوشمند آتی‌لند" color="#004E8C" />
      <PortfolioScreen position={[4, -1, 1]} title="اپلیکیشن موبایل آریا" color="#22C55E" />
      <PortfolioScreen position={[0, -3, -1]} title="پلتفرم تجارت الکترونیک" color="#00A4FF" />
    </group>
  )
}

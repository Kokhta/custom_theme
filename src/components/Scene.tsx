"use client";

import React, { useRef, useMemo } from "react";
import { useFrame, useThree } from "@react-three/fiber";
import { useScroll, Scroll, Html, Float } from "@react-three/drei";
import * as THREE from "three";

import Logo3D from "./Logo3D";
import FloatingSocials from "./FloatingSocials";
import RegistrationForm from "./RegistrationForm";
import LogoParticles from "./LogoParticles";
import Pedestal from "./Pedestal";
import ClientCarousel from "./ClientCarousel";
import CurvedDashboard from "./CurvedDashboard";
import PortfolioSection from "./PortfolioSection";

export default function Scene() {
  const scroll = useScroll();
  const { camera } = useThree();

  // Floating decoration arrays (primitives representing decor_sphere, decor_cube, decor_ring)
  const decorElements = useMemo(() => {
    return [
      { type: "sphere", color: "#00A4FF", position: [-4, 3, -2], size: 0.3 },
      { type: "cube", color: "#004E8C", position: [5, -4, -1], size: 0.4 },
      { type: "ring", color: "#22C55E", position: [-6, -10, -3], size: 0.5 },
      { type: "sphere", color: "#a855f7", position: [6, -22, -2], size: 0.35 },
      { type: "cube", color: "#00A4FF", position: [-5, -35, -2], size: 0.45 },
      { type: "ring", color: "#22C55E", position: [5, -52, -1], size: 0.6 },
    ];
  }, []);

  // Single centralized useFrame loop to seamlessly fly the camera and orient sections
  useFrame((state) => {
    const scrollOffset = scroll.offset; // 0 to 1

    let targetCamPos = new THREE.Vector3(0, 0, 10);
    let targetLookAt = new THREE.Vector3(0, 0, 0);

    // Section Scroll mappings:
    // Section 1 (Hero): 0.0 - 0.20
    // Section 2 (Services): 0.25 - 0.45
    // Section 3 (Clients): 0.48 - 0.68
    // Section 4 (Stats): 0.70 - 0.85
    // Section 5 (Portfolio/Footer): 0.88 - 1.0

    if (scrollOffset < 0.22) {
      // Hero View
      const t = scrollOffset / 0.22;
      targetCamPos.set(0, THREE.MathUtils.lerp(0, -5, t), THREE.MathUtils.lerp(10, 8, t));
      targetLookAt.set(0, THREE.MathUtils.lerp(0, -5, t), 0);
    } else if (scrollOffset < 0.46) {
      // Services View
      const t = (scrollOffset - 0.22) / 0.24;
      targetCamPos.set(
        THREE.MathUtils.lerp(0, 3, t),
        THREE.MathUtils.lerp(-5, -20, t),
        THREE.MathUtils.lerp(8, 11, t)
      );
      targetLookAt.set(0, THREE.MathUtils.lerp(-5, -20, t), 0);
    } else if (scrollOffset < 0.69) {
      // Clients View
      const t = (scrollOffset - 0.46) / 0.23;
      targetCamPos.set(
        THREE.MathUtils.lerp(3, -2, t),
        THREE.MathUtils.lerp(-20, -40, t),
        THREE.MathUtils.lerp(11, 8.5, t)
      );
      targetLookAt.set(0, THREE.MathUtils.lerp(-20, -40, t), 0);
    } else if (scrollOffset < 0.86) {
      // Stats View
      const t = (scrollOffset - 0.69) / 0.17;
      targetCamPos.set(
        THREE.MathUtils.lerp(-2, 0, t),
        THREE.MathUtils.lerp(-40, -60, t),
        THREE.MathUtils.lerp(8.5, 10, t)
      );
      targetLookAt.set(0, THREE.MathUtils.lerp(-40, -60, t), 0);
    } else {
      // Portfolio & Galaxy Zoomout View
      const t = (scrollOffset - 0.86) / 0.14;
      targetCamPos.set(
        THREE.MathUtils.lerp(0, 0, t),
        THREE.MathUtils.lerp(-60, -84, t),
        THREE.MathUtils.lerp(10, 24, t) // Pull back significantly to see everything floating in space
      );
      targetLookAt.set(0, THREE.MathUtils.lerp(-60, -84, t), 0);
    }

    // Smooth interpolations
    camera.position.lerp(targetCamPos, 0.08);

    const currentLookAt = new THREE.Vector3(0, 0, -1)
      .applyQuaternion(camera.quaternion)
      .add(camera.position);
    currentLookAt.lerp(targetLookAt, 0.08);
    camera.lookAt(currentLookAt);
  });

  return (
    <group>
      {/* ==========================================
          SECTION 1: HERO / HEADER (Y: 0)
          ========================================== */}
      <group position={[0, 0, 0]}>
        {/* Floating 3D Main Logo */}
        <Float speed={2} rotationIntensity={0.5} floatIntensity={1.5}>
          <Logo3D position={[0, 1.8, 0]} />
        </Float>

        {/* Orbiting Social Icons Group */}
        <Float speed={4} rotationIntensity={1} floatIntensity={2}>
          <group position={[0, 1.8, 0]}>
            <Html position={[0, -2.6, 0]} center>
              <FloatingSocials />
            </Html>
          </group>
        </Float>

        {/* Immersive Glassmorphic Registration Form */}
        <Html position={[0, -2.0, 0.5]} center distanceFactor={7}>
          <div className="flex flex-col items-center">
            <RegistrationForm />
          </div>
        </Html>

        {/* Hero Welcome Typography Overlay (Static HTML via Scroll overlay helper) */}
        <Html position={[0, 3.8, 0]} center distanceFactor={7}>
          <div dir="rtl" className="text-center font-sans select-none pointer-events-none">
            <h1 className="text-4xl md:text-5xl font-black tracking-tight text-white leading-tight">
              آژانس طراحی آینده‌نگر <span className="text-[#00A4FF] bg-gradient-to-r from-[#00A4FF] to-[#22C55E] bg-clip-text text-transparent">آتی‌سافت</span>
            </h1>
            <p className="text-slate-400 text-sm md:text-base font-light mt-3 max-w-md mx-auto">
              خلق عمیق‌ترین تجربه‌های وب سه‌بعدی و هویت بصری تعاملی مدرن
            </p>
          </div>
        </Html>
      </group>

      {/* ==========================================
          SECTION 2: ABOUT / SERVICES (Y: -20)
          ========================================== */}
      <group position={[0, -20, 0]}>
        {/* Centered stylized 3D logo particle system */}
        <LogoParticles />

        <Html position={[0, 3.2, 0]} center distanceFactor={8}>
          <div dir="rtl" className="text-center font-sans select-none pointer-events-none">
            <h2 className="text-3xl font-black text-white">خدمات و ارزش‌های آتی‌سافت</h2>
            <p className="text-slate-400 text-xs md:text-sm mt-1 max-w-sm mx-auto">
              بر روی هر پدستال هاور کنید تا جزییات شگفت‌انگیز را لمس کنید
            </p>
          </div>
        </Html>

        {/* 3 Pedestals with custom coordinates */}
        <Pedestal
          position={[-3.5, -1.8, 0]}
          title="توسعه سه‌بعدی مدرن"
          description="کدنویسی فوق پیشرفته با WebGL و React Three Fiber برای بهترین کارایی روی تمام دستگاه‌ها"
          icon="🔮"
          color="#00A4FF"
        />
        <Pedestal
          position={[0, -1.8, -0.5]}
          title="طراحی خلاقانه رابط"
          description="خلق زیباترین و روان‌ترین رابط‌های کاربری تعاملی برای جلب توجه حداکثری مخاطب هدف"
          icon="✨"
          color="#22C55E"
        />
        <Pedestal
          position={[3.5, -1.8, 0]}
          title="پشتیبانی و توسعه امن"
          description="پایداری کامل و بهینه‌سازی مداوم نرخ لود به همراه مشاوره رشد و مارکتینگ"
          icon="🛡️"
          color="#004E8C"
        />
      </group>

      {/* ==========================================
          SECTION 3: CLIENT LOGOS CAROUSEL (Y: -40)
          ========================================== */}
      <group position={[0, -40, 0]}>
        <Html position={[0, 2.5, 0]} center distanceFactor={8}>
          <div dir="rtl" className="text-center font-sans select-none pointer-events-none">
            <h2 className="text-3xl font-black text-white">برندهای همکار آتی‌سافت</h2>
            <p className="text-slate-400 text-xs md:text-sm mt-1">
              جهت چرخش دستی، کاروسل را به صورت افقی درگ کنید
            </p>
          </div>
        </Html>

        <ClientCarousel />
      </group>

      {/* ==========================================
          SECTION 4: STATS SECTION (Y: -60)
          ========================================== */}
      <group position={[0, -60, 0]}>
        <Html position={[0, 2.6, 0]} center distanceFactor={8}>
          <div dir="rtl" className="text-center font-sans select-none pointer-events-none">
            <h2 className="text-3xl font-black text-white">آمار و دستاوردهای ما</h2>
            <p className="text-slate-400 text-xs md:text-sm mt-1">
              مجموعه‌ای متمایز از برتری، خلاقیت و تخصص همگام با فناوری روز جهان
            </p>
          </div>
        </Html>

        <CurvedDashboard />
      </group>

      {/* ==========================================
          SECTION 5: PORTFOLIO & FOOTER (Y: -80)
          ========================================== */}
      <group position={[0, -80, 0]}>
        <Html position={[0, 4.2, 0]} center distanceFactor={8}>
          <div dir="rtl" className="text-center font-sans select-none pointer-events-none">
            <h2 className="text-3xl font-black text-white">نمونه کارها و پروژه‌های شاخص</h2>
            <p className="text-slate-400 text-xs md:text-sm mt-1">
              خلاقیت ما حد و مرزی ندارد؛ روی هر مانیتور هاور کنید
            </p>
          </div>
        </Html>

        <PortfolioSection />
      </group>

      {/* ==========================================
          FLOATING GENERAL DECORATIVE ELEMENTS
          ========================================== */}
      {decorElements.map((el, idx) => (
        <Float key={idx} speed={1.5} rotationIntensity={0.8} floatIntensity={1.2}>
          <mesh position={el.position as [number, number, number]}>
            {el.type === "sphere" && <sphereGeometry args={[el.size, 32, 32]} />}
            {el.type === "cube" && <boxGeometry args={[el.size * 1.5, el.size * 1.5, el.size * 1.5]} />}
            {el.type === "ring" && <torusGeometry args={[el.size, 0.08, 16, 100]} />}
            <meshStandardMaterial
              color={el.color}
              roughness={0.1}
              metalness={0.8}
              transparent
              opacity={0.6}
            />
          </mesh>
        </Float>
      ))}
    </group>
  );
}

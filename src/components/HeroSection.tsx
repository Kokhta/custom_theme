"use client";

import React, { useRef, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Float, Html } from "@react-three/drei";
import * as THREE from "three";
import confetti from "canvas-confetti";

// Inline SVG components to prevent Turbopack/lucide resolution issues
const SendIcon = (props: React.SVGProps<SVGSVGElement>) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" {...props}>
    <line x1="22" y1="2" x2="11" y2="13"></line>
    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
  </svg>
);

const InstagramIcon = (props: React.SVGProps<SVGSVGElement>) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" {...props}>
    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
  </svg>
);

const LinkedinIcon = (props: React.SVGProps<SVGSVGElement>) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" {...props}>
    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
    <rect x="2" y="9" width="4" height="12"></rect>
    <circle cx="4" cy="4" r="2"></circle>
  </svg>
);

const MessageSquareIcon = (props: React.SVGProps<SVGSVGElement>) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" {...props}>
    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
  </svg>
);

const CheckCircleIcon = (props: React.SVGProps<SVGSVGElement>) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" {...props}>
    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
    <polyline points="22 4 12 14.01 9 11.01"></polyline>
  </svg>
);

// Orbiting Social Icon Component
function SocialIcon({
  angleOffset,
  radius,
  speed,
  color,
  icon: Icon,
  label,
  url,
}: {
  angleOffset: number;
  radius: number;
  speed: number;
  color: string;
  icon: any;
  label: string;
  url: string;
}) {
  const groupRef = useRef<THREE.Group>(null);
  const [hovered, setHovered] = useState(false);

  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (groupRef.current) {
      // Calculate circular orbit
      const angle = time * speed + angleOffset;
      groupRef.current.position.x = Math.cos(angle) * radius;
      groupRef.current.position.z = Math.sin(angle) * radius;
      // Floating motion
      groupRef.current.position.y = Math.sin(time * 1.5 + angleOffset) * 0.3;
      // Spin slowly
      groupRef.current.rotation.y = time * 0.5;
    }
  });

  return (
    <group ref={groupRef}>
      <Float speed={3} rotationIntensity={1} floatIntensity={1}>
        <mesh
          onPointerOver={() => setHovered(true)}
          onPointerOut={() => setHovered(false)}
          onClick={() => window.open(url, "_blank")}
        >
          <sphereGeometry args={[0.35, 32, 32]} />
          <meshStandardMaterial
            color={hovered ? "#00A4FF" : color}
            emissive={hovered ? "#00A4FF" : color}
            emissiveIntensity={hovered ? 0.8 : 0.2}
            roughness={0.1}
            metalness={0.9}
          />
          {/* HTML Icon Label */}
          <Html distanceFactor={8} position={[0, 0.6, 0]} center>
            <div
              className={`flex items-center gap-1.5 px-2 py-1 rounded-full text-xs font-medium border whitespace-nowrap transition-all duration-300 pointer-events-none select-none ${
                hovered
                  ? "bg-brand-cyan/20 border-brand-cyan text-white scale-110 shadow-[0_0_12px_rgba(0,164,255,0.4)]"
                  : "bg-slate-900/80 border-slate-700 text-slate-300"
              }`}
              dir="rtl"
            >
              <Icon className="w-3.5 h-3.5" />
              <span>{label}</span>
            </div>
          </Html>
        </mesh>
      </Float>
    </group>
  );
}

// 3D Geometric Logo Component (substitute for logo.glb)
function Logo3D() {
  const logoRef = useRef<THREE.Group>(null);
  const ringRef1 = useRef<THREE.Mesh>(null);
  const ringRef2 = useRef<THREE.Mesh>(null);

  useFrame((state) => {
    const time = state.clock.getElapsedTime();
    if (logoRef.current) {
      // Continuous floating up/down
      logoRef.current.position.y = Math.sin(time * 1.2) * 0.4;
      // Pulse scale
      const scale = 1 + Math.sin(time * 2.4) * 0.03;
      logoRef.current.scale.set(scale, scale, scale);
    }
    // Spin outer rings
    if (ringRef1.current) {
      ringRef1.current.rotation.x = time * 0.4;
      ringRef1.current.rotation.y = time * 0.6;
    }
    if (ringRef2.current) {
      ringRef2.current.rotation.y = -time * 0.5;
      ringRef2.current.rotation.z = time * 0.3;
    }
  });

  return (
    <group ref={logoRef} position={[0, 1.5, 0]}>
      {/* Central octahedral core */}
      <mesh castShadow receiveShadow>
        <octahedronGeometry args={[1.2, 0]} />
        <meshStandardMaterial
          color="#00A4FF"
          emissive="#00A4FF"
          emissiveIntensity={0.6}
          roughness={0.05}
          metalness={0.95}
        />
      </mesh>

      {/* Tiny inner floating sphere */}
      <mesh position={[0, 0, 0]}>
        <sphereGeometry args={[0.4, 16, 16]} />
        <meshStandardMaterial
          color="#22C55E"
          emissive="#22C55E"
          emissiveIntensity={0.8}
          roughness={0}
        />
      </mesh>

      {/* Dynamic Outer Ring 1 */}
      <mesh ref={ringRef1}>
        <torusGeometry args={[2.0, 0.08, 16, 100]} />
        <meshStandardMaterial
          color="#004E8C"
          emissive="#004E8C"
          emissiveIntensity={0.2}
          roughness={0.1}
          metalness={0.9}
        />
      </mesh>

      {/* Dynamic Outer Ring 2 */}
      <mesh ref={ringRef2}>
        <torusGeometry args={[2.5, 0.05, 8, 80]} />
        <meshStandardMaterial
          color="#00A4FF"
          emissive="#00A4FF"
          emissiveIntensity={0.3}
          roughness={0.1}
          metalness={0.9}
        />
      </mesh>
    </group>
  );
}

export default function HeroSection() {
  const [formData, setFormData] = useState({ name: "", phone: "", projectType: "3d-web" });
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!formData.name || !formData.phone) return;
    setSubmitted(true);
    confetti({
      particleCount: 80,
      spread: 60,
      origin: { y: 0.6 },
      colors: ["#00A4FF", "#004E8C", "#22C55E", "#ffffff"],
    });
  };

  return (
    <group position={[0, 0, 0]}>
      {/* Central Logo */}
      <Logo3D />

      {/* Orbiting Social Media Nodes */}
      <SocialIcon
        angleOffset={0}
        radius={4.2}
        speed={0.4}
        color="#00A4FF"
        icon={SendIcon}
        label="تلگرام"
        url="https://t.me/atisoft"
      />
      <SocialIcon
        angleOffset={Math.PI * 0.66}
        radius={4.2}
        speed={0.4}
        color="#EC4899"
        icon={InstagramIcon}
        label="اینستاگرام"
        url="https://instagram.com/atisoft"
      />
      <SocialIcon
        angleOffset={Math.PI * 1.33}
        radius={4.2}
        speed={0.4}
        color="#0077B5"
        icon={LinkedinIcon}
        label="لینکدین"
        url="https://linkedin.com/company/atisoft"
      />

      {/* Header Overlay Text */}
      <Html position={[0, 4.0, 0]} center distanceFactor={10}>
        <div className="text-center select-none whitespace-nowrap" dir="rtl">
          <h1 className="text-4xl md:text-5xl font-black tracking-tight text-white drop-shadow-[0_4px_12px_rgba(0,164,255,0.4)]">
            آژانس خلاقیت <span className="text-brand-cyan">آتی‌سافت</span>
          </h1>
          <p className="text-sm md:text-base text-slate-400 mt-2 font-light">
            پیشرو در خلق دنیاهای سه بعدی و وب‌سایت‌های تعاملی نسل جدید
          </p>
        </div>
      </Html>

      {/* Floating 3D Registration Panel HTML Overlay */}
      <Html position={[0, -2.6, 1.5]} center distanceFactor={9.5}>
        <div className="glass-panel w-[320px] md:w-[380px] p-5 md:p-6 rounded-2xl border border-white/10 shadow-2xl" dir="rtl">
          {submitted ? (
            <div className="flex flex-col items-center justify-center py-6 text-center animate-fade-in">
              <CheckCircleIcon className="w-16 h-16 text-brand-green mb-3.5 stroke-[1.5]" />
              <h3 className="text-xl font-bold text-white mb-2">ثبت نام شما با موفقیت انجام شد!</h3>
              <p className="text-xs text-slate-400 leading-relaxed max-w-[280px]">
                کارشناسان آتی‌سافت به زودی جهت مشاوره پروژه با شما تماس خواهند گرفت.
              </p>
              <button
                onClick={() => {
                  setSubmitted(false);
                  setFormData({ name: "", phone: "", projectType: "3d-web" });
                }}
                className="mt-5 px-5 py-1.5 bg-white/10 hover:bg-white/15 text-white border border-white/10 rounded-xl text-xs font-semibold transition-all"
              >
                ثبت مجدد درخواست
              </button>
            </div>
          ) : (
            <form onSubmit={handleSubmit} className="flex flex-col gap-3.5">
              <div className="flex items-center gap-2 mb-1 border-b border-white/10 pb-2.5">
                <MessageSquareIcon className="w-5 h-5 text-brand-cyan" />
                <h2 className="text-base font-bold text-white mr-1">مشاوره رایگان ساخت سایت ۳ بعدی</h2>
              </div>

              <div className="flex flex-col gap-1.5 text-right">
                <label className="text-xs font-medium text-slate-300">نام و نام خانوادگی</label>
                <input
                  type="text"
                  required
                  value={formData.name}
                  onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                  placeholder="مثال: علی احمدی"
                  className="w-full px-3.5 py-2 rounded-xl bg-slate-900/60 border border-white/5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-brand-cyan/50 focus:border-brand-cyan placeholder-slate-500 transition-all"
                />
              </div>

              <div className="flex flex-col gap-1.5 text-right">
                <label className="text-xs font-medium text-slate-300">شماره تماس (موبایل)</label>
                <input
                  type="tel"
                  required
                  value={formData.phone}
                  onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                  placeholder="مثال: ۰۹۱۲۳۴۵۶۷۸۹"
                  className="w-full px-3.5 py-2 rounded-xl bg-slate-900/60 border border-white/5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-brand-cyan/50 focus:border-brand-cyan placeholder-slate-500 transition-all text-left"
                  dir="ltr"
                />
              </div>

              <div className="flex flex-col gap-1.5 text-right">
                <label className="text-xs font-medium text-slate-300">نوع پروژه انتخابی</label>
                <select
                  value={formData.projectType}
                  onChange={(e) => setFormData({ ...formData, projectType: e.target.value })}
                  className="w-full px-3 py-2 rounded-xl bg-slate-900/90 border border-white/5 text-sm text-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-cyan/50 focus:border-brand-cyan transition-all"
                >
                  <option value="3d-web">وب‌سایت سه بعدی و تعاملی (۳D Web)</option>
                  <option value="configurator">شخصی‌ساز سه بعدی محصول (Configurator)</option>
                  <option value="metaverse">متاورس و گالری مجازی تحت وب</option>
                  <option value="landing">لندینگ پیج تبلیغاتی با افکت‌های ویژه</option>
                </select>
              </div>

              <button
                type="submit"
                className="w-full mt-2 py-2.5 bg-brand-green hover:bg-emerald-500 hover:shadow-[0_0_15px_rgba(34,197,94,0.4)] text-slate-950 font-bold rounded-xl text-sm transition-all duration-300 cursor-pointer"
              >
                شروع پرواز با آتی‌سافت 🚀
              </button>
            </form>
          )}
        </div>
      </Html>
    </group>
  );
}

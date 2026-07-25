import { useRef, useMemo, useState } from "react";
import { useFrame } from "@react-three/fiber";
import { Html, RoundedBox } from "@react-three/drei";
import * as THREE from "three";

// Custom Screen Component with Interactive Hover Tilt & Glowing Blue effects
function PortfolioScreen({
  position,
  title,
  category,
  desc,
  color,
}: {
  position: [number, number, number];
  title: string;
  category: string;
  desc: string;
  color: string;
}) {
  const groupRef = useRef<THREE.Group>(null);
  const [hovered, setHovered] = useState(false);

  useFrame((state) => {
    if (groupRef.current) {
      const t = state.clock.getElapsedTime();

      // Gentle floating animation
      const floatY = position[1] + Math.sin(t * 1.3 + position[0]) * 0.12;
      groupRef.current.position.y = THREE.MathUtils.lerp(
        groupRef.current.position.y,
        floatY,
        0.1
      );

      // Hover scale animation
      const targetScale = hovered ? 1.12 : 1.0;
      groupRef.current.scale.lerp(
        new THREE.Vector3(targetScale, targetScale, targetScale),
        0.15
      );

      // On Hover: tilt screen towards user mouse coordinates
      const targetRotY = hovered ? -state.pointer.x * 0.35 : 0;
      const targetRotX = hovered ? state.pointer.y * 0.25 : 0;

      groupRef.current.rotation.y = THREE.MathUtils.lerp(
        groupRef.current.rotation.y,
        targetRotY,
        0.1
      );
      groupRef.current.rotation.x = THREE.MathUtils.lerp(
        groupRef.current.rotation.x,
        targetRotX,
        0.1
      );
    }
  });

  return (
    <group
      ref={groupRef}
      position={[position[0], position[1], position[2]]}
      onPointerOver={() => setHovered(true)}
      onPointerOut={() => setHovered(false)}
    >
      {/* 3D Monitor Stand Neck */}
      <mesh position={[0, -0.9, -0.1]}>
        <cylinderGeometry args={[0.06, 0.12, 0.4, 8]} />
        <meshStandardMaterial color="#0b0f19" roughness={0.5} />
      </mesh>

      {/* 3D Monitor Base */}
      <mesh position={[0, -1.1, -0.1]}>
        <cylinderGeometry args={[0.45, 0.5, 0.04, 12]} />
        <meshStandardMaterial color="#030712" roughness={0.4} />
      </mesh>

      {/* Monitor Outer Display Casing representing portfolio_screen.glb */}
      <RoundedBox
        args={[2.8, 1.7, 0.12]}
        radius={0.06}
        smoothness={4}
        castShadow
      >
        <meshStandardMaterial
          color="#0b0f19"
          roughness={0.2}
          metalness={0.9}
        />
      </RoundedBox>

      {/* Dark Screen plane */}
      <mesh position={[0, 0, 0.065]}>
        <planeGeometry args={[2.66, 1.56]} />
        <meshStandardMaterial
          color="#020617"
          roughness={0.12}
          metalness={0.95}
          emissive="#00A4FF"
          emissiveIntensity={hovered ? 0.35 : 0.06}
        />
      </mesh>

      {/* Glowing screen halo frame */}
      <mesh position={[0, 0, 0.07]} scale={[1.015, 1.015, 1.0]}>
        <planeGeometry args={[2.66, 1.56]} />
        <meshBasicMaterial
          color="#00A4FF"
          transparent
          opacity={hovered ? 0.45 : 0.12}
          wireframe
        />
      </mesh>

      {/* Inner Mock Application HTML Overlay UI */}
      <Html distanceFactor={8} center transform position={[0, 0, 0.08]}>
        <div
          className="flex flex-col justify-between p-3.5 h-[135px] text-right pointer-events-none select-none"
          style={{ width: "235px" }}
        >
          {/* Top Bar */}
          <div className="flex items-center justify-between border-b border-slate-850 pb-1">
            <div className="flex gap-1.5">
              <span className="w-1.5 h-1.5 rounded-full bg-red-500/80" />
              <span className="w-1.5 h-1.5 rounded-full bg-yellow-500/80" />
              <span className="w-1.5 h-1.5 rounded-full bg-green-500/80" />
            </div>
            <span className="text-[7.5px] text-slate-500 font-mono tracking-wider">
              {category}
            </span>
          </div>

          {/* Project Details */}
          <div className="my-auto pr-0.5">
            <h3 className="text-xs font-bold text-white mb-1 leading-snug">
              {title}
            </h3>
            <p className="text-[8px] text-slate-400 font-light leading-snug">
              {desc}
            </p>
          </div>

          {/* Mock Button */}
          <div className="flex justify-between items-center mt-1">
            <span className="text-[7px] text-slate-600 font-mono">v1.2.0</span>
            <div
              className={`text-[8px] font-bold px-2 py-0.5 rounded-md border text-center transition-all duration-300 ${
                hovered
                  ? "bg-cyan-500 border-cyan-400 text-white shadow-md shadow-cyan-950/40"
                  : "bg-slate-900 border-slate-700 text-slate-300"
              }`}
            >
              بازدید نمونه‌کار
            </div>
          </div>
        </div>
      </Html>
    </group>
  );
}

// 3D Low-Poly Ground plane fading into darkness
function LowPolyLandscape() {
  const geometry = useMemo(() => {
    // 35x35 width/height flat grid with 18 segments
    const geo = new THREE.PlaneGeometry(45, 45, 18, 18);
    const pos = geo.attributes.position;

    const seedRandom = (s: number) => {
      const x = Math.sin(s) * 10000;
      return x - Math.floor(x);
    };

    for (let i = 0; i < pos.count; i++) {
      const x = pos.getX(i);
      const y = pos.getY(i);

      // Create beautiful central craters and mountain ridges
      const distFromCenter = Math.sqrt(x * x + y * y);
      const baseHeight = Math.sin(distFromCenter * 0.22) * 1.8;

      // Add rugged deterministic low-poly noise
      const noise = (seedRandom(i * 1.34) - 0.5) * 0.85;

      pos.setZ(i, baseHeight + noise);
    }

    geo.computeVertexNormals();
    return geo;
  }, []);

  return (
    <mesh
      geometry={geometry}
      rotation={[-Math.PI / 2, 0, 0]}
      position={[0, -5.5, 0]}
      receiveShadow
    >
      <meshStandardMaterial
        color="#060c18"
        roughness={0.8}
        metalness={0.9}
        flatShading={true} // Crucial parameter to generate low-poly vertices flat shade
      />
      {/* Glowing cyan wireframe overlay outlining flat edges */}
      <mesh geometry={geometry} scale={[1.002, 1.002, 1.002]}>
        <meshBasicMaterial
          color="#00A4FF"
          wireframe
          transparent
          opacity={0.1}
        />
      </mesh>
    </mesh>
  );
}

export function PortfolioSection() {
  const portfolioItems = [
    {
      title: "پلتفرم معاملاتی کریپتو ۳ بعدی",
      category: "FINTECH INTERACTIVE",
      desc: "طراحی و توسعه پورتال کریپتو با قابلیت بررسی چارت‌های زنده و تحلیل ارزها در بستری کاملاً بصری و متحرک.",
    },
    {
      title: "فروشگاه متاورس آتی‌کالا",
      category: "WEB3 METAVERSE",
      desc: "نمایش ۳ بعدی و ۳۶۰ درجه کلیه محصولات فیزیکی همراه با شبیه‌سازی بیومتریک و واقعیت مجازی موبایل.",
    },
    {
      title: "داشبورد هوشمند صنعتی آتی‌داش",
      category: "SAAS DASHBOARD",
      desc: "سیستم پایش یکپارچه کارخانجات کشور مجهز به نمودارهای داینامیک و جلوه‌های نوری نشانگر وضعیت سنسورها.",
    },
  ];

  return (
    <group position={[0, -80, 0]}>
      {/* Section Header Title */}
      <group position={[0, 4.4, 0]}>
        <Html distanceFactor={10} center transform>
          <div className="text-center" style={{ width: "350px" }}>
            <h2 className="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-1">
              پورتفولیو و پروژه‌ها
            </h2>
            <p className="text-xs text-slate-400 leading-relaxed font-light">
              نگاهی عمیق به تجربیات منحصربه‌فرد تعاملی طراحی شده در آتی‌سافت
            </p>
          </div>
        </Html>
      </group>

      {/* 3 Floating Interactive Screens */}
      <PortfolioScreen
        position={[-3.3, 1.0, 1.2]}
        title={portfolioItems[0].title}
        category={portfolioItems[0].category}
        desc={portfolioItems[0].desc}
        color="#00A4FF"
      />

      <PortfolioScreen
        position={[0, 1.6, 2.2]}
        title={portfolioItems[1].title}
        category={portfolioItems[1].category}
        desc={portfolioItems[1].desc}
        color="#22C55E"
      />

      <PortfolioScreen
        position={[3.3, 1.0, 1.2]}
        title={portfolioItems[2].title}
        category={portfolioItems[2].category}
        desc={portfolioItems[2].desc}
        color="#00A4FF"
      />

      {/* 3D Low-Poly Landscape Plane Base */}
      <LowPolyLandscape />

      {/* Translucent Glassmorphic Footer Widget Panel above the Landscape */}
      <group position={[0, -2.4, 2.5]}>
        <Html distanceFactor={9} center transform>
          <div
            className="glassmorphism rounded-3xl p-5 select-text text-right border border-cyan-500/10 flex flex-col md:flex-row items-center justify-between gap-4 shadow-2xl"
            style={{ width: "620px" }}
          >
            {/* Left Col / Logo info */}
            <div className="flex flex-col items-center md:items-start text-center md:text-right">
              <h3 className="text-md font-extrabold text-white mb-1">آتی‌سافت</h3>
              <p className="text-[9px] text-slate-400 max-w-xs leading-relaxed font-light">
                پیشرو در توسعه وب‌سایت‌های مدرن سه بعدی، واقعیت افزوده و نرم‌افزارهای تجاری فردا. تمامی حقوق مادی و معنوی برای آتی‌سافت محفوظ است © {new Date().getFullYear()}
              </p>
            </div>

            {/* Right Col / Contact info */}
            <div className="flex flex-col gap-1.5 text-xs text-slate-300 w-full md:w-auto border-t md:border-t-0 md:border-r border-slate-800 pt-3 md:pt-0 md:pr-5">
              <div className="flex items-center justify-end gap-2">
                <span className="font-light text-[10px]">۰۲۱-۸۸۸۸۴۴۴۴</span>
                <span className="text-cyan-400 font-bold">تلفن:</span>
              </div>
              <div className="flex items-center justify-end gap-2">
                <span className="font-light text-[10px]">info@atisoft.ir</span>
                <span className="text-cyan-400 font-bold">ایمیل:</span>
              </div>
              <div className="flex items-center justify-end gap-2">
                <span className="font-light text-[10px] text-right">تهران، برج نوآوری شریف، طبقه ۵</span>
                <span className="text-cyan-400 font-bold">آدرس:</span>
              </div>
            </div>
          </div>
        </Html>
      </group>
    </group>
  );
}

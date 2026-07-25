import { useRef } from "react";
import { useFrame } from "@react-three/fiber";
import { Html, RoundedBox } from "@react-three/drei";
import * as THREE from "three";

export function ClientsSection() {
  const carouselRef = useRef<THREE.Group>(null);

  // Drag interaction state references
  const isDragging = useRef(false);
  const startX = useRef(0);
  const currentRotationY = useRef(0);
  const targetRotationY = useRef(0);

  const clients = [
    {
      name: "اسنپ",
      english: "Snapp",
      desc: "بزرگترین سامانه حمل و نقل",
      color: "#22C55E",
      glow: "#22C55E",
    },
    {
      name: "دیجی‌کالا",
      english: "Digikala",
      desc: "بزرگترین فروشگاه اینترنتی",
      color: "#E10915",
      glow: "#ff4d4d",
    },
    {
      name: "تپسی",
      english: "Tapsi",
      desc: "تاکسی اینترنتی هوشمند",
      color: "#FF5A00",
      glow: "#ff9000",
    },
    {
      name: "دیوار",
      english: "Divar",
      desc: "بزرگترین پایگاه نیازمندی‌ها",
      color: "#A62626",
      glow: "#ef4444",
    },
    {
      name: "فیلیمو",
      english: "Filimo",
      desc: "سامانه تماشای فیلم و سریال",
      color: "#F5C518",
      glow: "#facc15",
    },
    {
      name: "کافه‌بازار",
      english: "CafeBazaar",
      desc: "بزرگترین فروشگاه اندروید",
      color: "#179C3A",
      glow: "#4ade80",
    },
  ];

  // Mouse/Touch Drag Event Handlers mapped to invisible cylinder overlay
  const handlePointerDown = (e: any) => {
    e.stopPropagation();
    // Set capturing of mouse drag movement
    (e.target as HTMLElement).setPointerCapture?.(e.pointerId);
    isDragging.current = true;
    startX.current = e.clientX;
    if (carouselRef.current) {
      currentRotationY.current = carouselRef.current.rotation.y;
    }
  };

  const handlePointerMove = (e: any) => {
    if (!isDragging.current) return;
    const deltaX = e.clientX - startX.current;
    // Map screen coordinate movement to angular rotation multiplier
    const sensitivity = 0.012;
    targetRotationY.current = currentRotationY.current + deltaX * sensitivity;
  };

  const handlePointerUp = (e: any) => {
    e.stopPropagation();
    isDragging.current = false;
  };

  useFrame((state) => {
    if (carouselRef.current) {
      const t = state.clock.getElapsedTime();

      // Apply automatic gentle drift when the user is not actively dragging
      if (!isDragging.current) {
        targetRotationY.current += 0.003;
      }

      // Smoothly lerp the actual carousel rotation.y towards our target rotation
      carouselRef.current.rotation.y = THREE.MathUtils.lerp(
        carouselRef.current.rotation.y,
        targetRotationY.current,
        0.08
      );

      // Add gentle vertical floating drift
      carouselRef.current.position.y = Math.sin(t * 1.0) * 0.12;
    }
  });

  return (
    <group position={[0, -40, 0]}>
      {/* Title Header */}
      <group position={[0, 3.8, 0]}>
        <Html distanceFactor={10} center transform>
          <div className="text-center" style={{ width: "350px" }}>
            <h2 className="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-1">
              مشتریان آتی‌سافت
            </h2>
            <p className="text-xs text-slate-400 leading-relaxed font-light">
              همراه و امین برندهای برتر و پیشرو در مارکت ملی کشور
            </p>
          </div>
        </Html>
      </group>

      {/* Invisible Cylinder surface to capture dragging coordinates perfectly */}
      <mesh
        position={[0, 0, 0]}
        onPointerDown={handlePointerDown}
        onPointerMove={handlePointerMove}
        onPointerUp={handlePointerUp}
        onPointerOut={handlePointerUp}
      >
        <cylinderGeometry args={[5.0, 5.0, 3.5, 12]} />
        <meshBasicMaterial transparent opacity={0.0} depthWrite={false} />
      </mesh>

      {/* Cylinder Carousel Group */}
      <group ref={carouselRef}>
        {clients.map((client, idx) => {
          const angle = (idx / clients.length) * Math.PI * 2;
          const radius = 4.0;
          const x = Math.cos(angle) * radius;
          const z = Math.sin(angle) * radius;
          // Rotate cards to always look outward perpendicular from the center axis
          const rotY = -angle + Math.PI / 2;

          return (
            <group
              key={client.name}
              position={[x, 0, z]}
              rotation={[0, rotY, 0]}
            >
              {/* Rounded 3D Backplate card representing service_platform / rounded card */}
              <RoundedBox
                args={[2.1, 1.3, 0.12]}
                radius={0.12}
                smoothness={4}
                castShadow
              >
                <meshStandardMaterial
                  color="#0a0f1d"
                  roughness={0.15}
                  metalness={0.9}
                  transparent
                  opacity={0.8}
                />
              </RoundedBox>

              {/* Decorative back neon grid outline */}
              <mesh position={[0, 0, -0.06]} scale={[1.05, 1.05, 1.0]}>
                <planeGeometry args={[2.1, 1.3]} />
                <meshBasicMaterial
                  color={client.glow}
                  transparent
                  opacity={0.12}
                />
              </mesh>

              {/* Card HTML Content Panel */}
              <Html distanceFactor={7} center transform position={[0, 0, 0.08]}>
                <div
                  className="flex flex-col items-center justify-center p-3 text-center cursor-grab active:cursor-grabbing select-none"
                  style={{ width: "170px" }}
                >
                  <div
                    className="w-10 h-10 rounded-full flex items-center justify-center mb-1.5 shadow-lg border border-slate-700 font-extrabold text-sm text-white transition-transform hover:scale-110 duration-200"
                    style={{
                      background: `radial-gradient(circle, ${client.color}70 0%, #030712 100%)`,
                      borderColor: client.color,
                      boxShadow: `0 0 10px ${client.glow}40`,
                    }}
                  >
                    {client.name.substring(0, 1)}
                  </div>

                  <h3 className="text-xs font-bold text-white mb-0.5">
                    {client.name}
                  </h3>
                  <span className="text-[8px] text-slate-400 font-mono tracking-wide">
                    {client.english}
                  </span>
                  <p className="text-[9px] text-slate-300 mt-1 font-light leading-snug">
                    {client.desc}
                  </p>
                </div>
              </Html>
            </group>
          );
        })}
      </group>

      {/* Swipe drag interaction tooltip icon */}
      <group position={[0, -2.0, 0]}>
        <Html distanceFactor={10} center transform>
          <div className="flex items-center gap-1.5 text-slate-400 text-[10px] bg-slate-900/65 px-4 py-1.5 rounded-full border border-cyan-500/10 backdrop-blur-md pointer-events-none select-none">
            <svg
              className="w-3.5 h-3.5 text-cyan-400 animate-pulse"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2.5"
                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"
              />
            </svg>
            <span className="font-medium">برای چرخاندن، به طرفین بکشید</span>
          </div>
        </Html>
      </group>
    </group>
  );
}

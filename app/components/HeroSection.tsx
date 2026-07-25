import { AtisoftLogo } from "./AtisoftLogo";
import { OrbitingIcons } from "./OrbitingIcons";
import { Html } from "@react-three/drei";
import { useState } from "react";

export function HeroSection() {
  const [formData, setFormData] = useState({
    name: "",
    contact: "",
    projectType: "3d-web",
    message: "",
  });
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setSubmitted(true);
    setTimeout(() => {
      setSubmitted(false);
      setFormData({ name: "", contact: "", projectType: "3d-web", message: "" });
    }, 4000);
  };

  return (
    <group position={[0, 0, 0]}>
      {/* 3D Atisoft Logo Centerpiece */}
      <group position={[0, 1.8, 0]} scale={[1.1, 1.1, 1.1]}>
        <AtisoftLogo />
      </group>

      {/* Orbiting Social Media Nodes */}
      <group position={[0, 1.8, 0]}>
        <OrbitingIcons />
      </group>

      {/* Hero Headings and Glassmorphic Contact Form */}
      <group position={[0, -2.5, 0.5]}>
        <Html distanceFactor={10} center transform>
          <div
            className="flex flex-col items-center select-text text-right"
            style={{ width: "420px" }}
          >
            {/* Title & Slogan */}
            <h1 className="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-400 to-emerald-400 mb-2 drop-shadow-lg text-center tracking-tight">
              آژانس طراحی آتی‌سافت
            </h1>
            <p className="text-sm font-light text-slate-300 text-center mb-6 leading-relaxed max-w-sm">
              خلق پلتفرم‌های تعاملی، وب‌سایت‌های سه بعدی و راهکارهای فوق‌مدرن دیجیتال
            </p>

            {/* Glassmorphic Panel containing Form */}
            <div className="glassmorphism rounded-3xl p-6 w-full shadow-2xl relative overflow-hidden group border border-cyan-500/20">
              {/* Decorative background glow */}
              <div className="absolute -top-10 -left-10 w-28 h-28 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none group-hover:bg-cyan-500/20 transition-all duration-500" />
              <div className="absolute -bottom-10 -right-10 w-28 h-28 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none group-hover:bg-emerald-500/20 transition-all duration-500" />

              {submitted ? (
                <div className="flex flex-col items-center justify-center py-10 text-center animate-fade-in">
                  <div className="w-16 h-16 bg-emerald-500/20 border border-emerald-400 rounded-full flex items-center justify-center mb-4">
                    <svg
                      className="w-8 h-8 text-emerald-400 animate-bounce"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="3"
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                  </div>
                  <h3 className="text-xl font-bold text-white mb-2">
                    درخواست شما ثبت شد!
                  </h3>
                  <p className="text-xs text-slate-300 max-w-xs leading-relaxed">
                    تیم مشاوران آتی‌سافت به زودی برای هماهنگی اولیه با شما تماس
                    خواهند گرفت. از همراهی شما سپاسگزاریم.
                  </p>
                </div>
              ) : (
                <form onSubmit={handleSubmit} className="space-y-4">
                  <div className="text-right border-b border-slate-700/50 pb-2 mb-3">
                    <h3 className="text-md font-bold text-white">
                      فرم مشاوره و ثبت پروژه جدید
                    </h3>
                    <p className="text-[10px] text-slate-400">
                      مشخصات خود را وارد کنید تا کارشناسان ما با شما تماس بگیرند
                    </p>
                  </div>

                  <div>
                    <label className="block text-xs font-medium text-slate-300 mb-1">
                      نام و نام خانوادگی
                    </label>
                    <input
                      type="text"
                      required
                      placeholder="مانند: علی محمدی"
                      value={formData.name}
                      onChange={(e) =>
                        setFormData({ ...formData, name: e.target.value })
                      }
                      className="w-full bg-slate-900/60 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all text-right"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-medium text-slate-300 mb-1">
                      شماره تماس یا ایمیل
                    </label>
                    <input
                      type="text"
                      required
                      placeholder="۰۹۱۲۳۴۵۶۷۸۹ یا info@atisoft.ir"
                      value={formData.contact}
                      onChange={(e) =>
                        setFormData({ ...formData, contact: e.target.value })
                      }
                      className="w-full bg-slate-900/60 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all text-right"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-medium text-slate-300 mb-1">
                      نوع پروژه مورد نظر
                    </label>
                    <select
                      value={formData.projectType}
                      onChange={(e) =>
                        setFormData({ ...formData, projectType: e.target.value })
                      }
                      className="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-cyan-400 transition-all text-right"
                    >
                      <option value="3d-web">وب‌سایت تعاملی و ۳ بعدی</option>
                      <option value="uiux">طراحی رابط کاربری UI/UX</option>
                      <option value="identity">برندینگ و هویت بصری</option>
                      <option value="ar-vr">توسعه واقعیت افزوده AR/VR</option>
                    </select>
                  </div>

                  <div>
                    <label className="block text-xs font-medium text-slate-300 mb-1">
                      توضیحات کوتاه
                    </label>
                    <textarea
                      rows={2}
                      placeholder="خلاصه‌ای از ایده خود را بنویسید..."
                      value={formData.message}
                      onChange={(e) =>
                        setFormData({ ...formData, message: e.target.value })
                      }
                      className="w-full bg-slate-900/60 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all text-right resize-none"
                    />
                  </div>

                  <button
                    type="submit"
                    className="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 active:scale-98 text-white font-bold py-2.5 rounded-xl text-xs transition-all duration-200 cursor-pointer shadow-lg shadow-emerald-950/20 border border-emerald-400/30 text-center"
                  >
                    ثبت درخواست و شروع همکاری
                  </button>
                </form>
              )}
            </div>
          </div>
        </Html>
      </group>
    </group>
  );
}

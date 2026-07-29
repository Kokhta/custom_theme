"use client";

import React, { useState } from "react";

export default function RegistrationForm() {
  const [formData, setFormData] = useState({
    name: "",
    phone: "",
    email: "",
    projectType: "3d-web",
  });
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setSubmitted(true);
  };

  if (submitted) {
    return (
      <div className="w-[340px] md:w-[380px] p-6 bg-slate-900/80 backdrop-blur-md border border-[#00A4FF]/40 rounded-2xl text-center text-white font-sans shadow-2xl">
        <div className="text-3xl text-[#22C55E] mb-3">✓</div>
        <h3 className="text-xl font-bold mb-2">درخواست شما ثبت شد</h3>
        <p className="text-sm text-slate-300 leading-6">
          کارشناسان آتی‌سافت به زودی برای مشاوره پروژه سه‌بعدی و مدرن شما تماس خواهند گرفت.
        </p>
        <button
          onClick={() => {
            setSubmitted(false);
            setFormData({ name: "", phone: "", email: "", projectType: "3d-web" });
          }}
          className="mt-4 px-6 py-2 bg-[#00A4FF] hover:bg-[#004E8C] transition-colors rounded-xl text-sm font-semibold text-white"
        >
          ثبت درخواست جدید
        </button>
      </div>
    );
  }

  return (
    <div className="w-[340px] md:w-[380px] p-6 bg-slate-950/80 backdrop-blur-xl border border-slate-800 hover:border-[#00A4FF]/30 transition-all duration-500 rounded-2xl text-white font-sans shadow-2xl">
      <div className="mb-4 text-center">
        <h2 className="text-2xl font-black bg-gradient-to-r from-white via-slate-100 to-[#00A4FF] bg-clip-text text-transparent">
          مشاوره رایگان پروژه
        </h2>
        <p className="text-xs text-slate-400 mt-1">
          فرم زیر را پر کنید تا وارد دنیای سه‌بعدی شوید
        </p>
      </div>

      <form onSubmit={handleSubmit} className="space-y-3" dir="rtl">
        <div>
          <label className="block text-right text-xs font-semibold text-slate-300 mb-1">
            نام و نام خانوادگی
          </label>
          <input
            type="text"
            required
            value={formData.name}
            onChange={(e) => setFormData({ ...formData, name: e.target.value })}
            className="w-full px-3 py-2 text-right bg-slate-900/50 border border-slate-800 rounded-xl text-sm focus:outline-none focus:border-[#00A4FF] text-white transition-colors"
            placeholder="مثال: علی رضایی"
          />
        </div>

        <div>
          <label className="block text-right text-xs font-semibold text-slate-300 mb-1">
            شماره تماس
          </label>
          <input
            type="tel"
            required
            value={formData.phone}
            onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
            className="w-full px-3 py-2 text-right bg-slate-900/50 border border-slate-800 rounded-xl text-sm focus:outline-none focus:border-[#00A4FF] text-white transition-colors"
            placeholder="مثال: ۰۹۱۲۳۴۵۶۷۸۹"
          />
        </div>

        <div>
          <label className="block text-right text-xs font-semibold text-slate-300 mb-1">
            ایمیل (اختیاری)
          </label>
          <input
            type="email"
            value={formData.email}
            onChange={(e) => setFormData({ ...formData, email: e.target.value })}
            className="w-full px-3 py-2 text-right bg-slate-900/50 border border-slate-800 rounded-xl text-sm focus:outline-none focus:border-[#00A4FF] text-white transition-colors"
            placeholder="name@example.com"
          />
        </div>

        <div>
          <label className="block text-right text-xs font-semibold text-slate-300 mb-1">
            نوع پروژه درخواستی
          </label>
          <select
            value={formData.projectType}
            onChange={(e) => setFormData({ ...formData, projectType: e.target.value })}
            className="w-full px-3 py-2 text-right bg-slate-900/50 border border-slate-800 rounded-xl text-sm focus:outline-none focus:border-[#00A4FF] text-white transition-colors cursor-pointer"
          >
            <option value="3d-web" className="bg-slate-900 text-white">وب‌سایت سه بعدی و تعاملی</option>
            <option value="branding" className="bg-slate-900 text-white">برندینگ و هویت بصری</option>
            <option value="ar-vr" className="bg-slate-900 text-white">تجربه‌های AR / VR</option>
            <option value="ui-ux" className="bg-slate-900 text-white">طراحی رابط کاربری مدرن</option>
          </select>
        </div>

        <button
          type="submit"
          className="w-full mt-2 py-3 bg-[#22C55E] hover:bg-[#1ea850] active:scale-95 transition-all text-white rounded-xl text-sm font-bold shadow-lg shadow-[#22C55E]/20"
        >
          شروع همکاری با آتی‌سافت
        </button>
      </form>
    </div>
  );
}

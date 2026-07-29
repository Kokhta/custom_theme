"use client";

import React from "react";

export default function FloatingSocials() {
  const socials = [
    { name: "تلگرام", url: "https://t.me/atisoft", icon: "✈️" },
    { name: "اینستاگرام", url: "https://instagram.com/atisoft", icon: "📸" },
    { name: "لینکدین", url: "https://linkedin.com/company/atisoft", icon: "💼" },
    { name: "ایمیل", url: "mailto:info@atisoft.ir", icon: "✉️" },
  ];

  return (
    <div className="flex gap-4 p-3 bg-slate-900/60 backdrop-blur-md border border-slate-800 rounded-full shadow-lg pointer-events-auto">
      {socials.map((social) => (
        <a
          key={social.name}
          href={social.url}
          target="_blank"
          rel="noopener noreferrer"
          className="flex items-center justify-center w-10 h-10 rounded-full bg-slate-800 hover:bg-[#00A4FF] hover:scale-110 active:scale-95 transition-all text-white text-lg shadow"
          title={social.name}
        >
          {social.icon}
        </a>
      ))}
    </div>
  );
}

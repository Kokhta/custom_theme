import json
import uuid
import os

def generate_id():
    return str(uuid.uuid4())[:8]

def create_elementor_template(title, content_elements):
    return {
        "title": title,
        "type": "page",
        "version": "0.4",
        "page_settings": [],
        "content": content_elements
    }

def create_section(html_content, section_id=None):
    if not section_id:
        section_id = generate_id()

    return {
        "id": section_id,
        "elType": "section",
        "isInner": False,
        "settings": {
            "structure": "10",
        },
        "elements": [
            {
                "id": generate_id(),
                "elType": "column",
                "isInner": False,
                "settings": {
                    "_column_size": 100,
                    "structure": "10",
                },
                "elements": [
                    {
                        "id": generate_id(),
                        "elType": "widget",
                        "widgetType": "html",
                        "isInner": False,
                        "settings": {
                            "html": html_content
                        },
                        "elements": []
                    }
                ]
            }
        ]
    }

# Common CSS and JS
COMMON_CSS = """
<style>
    /* ── Reset ─────────────────────────────────────────── */
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: auto; }

    /* ── Tokens ─────────────────────────────────────────── */
    :root {
      --bg:          #F5EDD6;
      --bg-alt:      #EDE5C8;
      --bg-card:     rgba(255, 253, 245, 0.88);
      --text:        #1A0E05;
      --text-muted:  #7A6244;
      --text-faint:  #B0946A;
      --gold:        #C9A227;
      --gold-lt:     #E8C84A;
      --gold-dk:     #9A7510;
      --gold-dim:    rgba(201,162,39,0.30);
      --gold-glow:   rgba(201,162,39,0.12);
      --border:      rgba(201,162,39,0.22);
      --tt: 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    [data-theme="dark"] {
      --bg:          #05050C;
      --bg-alt: #0A0A18;
      --bg-card: rgba(12, 12, 24, 0.92);
      --text: #EAE0C8;
      --text-muted: #9B8A6E;
      --text-faint: #6B5A44;
      --gold: #D4AF37;
      --gold-lt: #F0D060;
      --gold-dk: #B08820;
      --gold-dim: rgba(212,175,55,0.28);
      --gold-glow: rgba(212,175,55,0.09);
      --border: rgba(212,175,55,0.18);
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Cormorant Garamond', Georgia, serif;
      overflow-x: hidden;
      transition: background var(--tt), color var(--tt);
    }

    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--gold-dim); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--gold); }

    .reveal { opacity: 0; transform: translateY(38px); }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Cinzel+Decorative:wght@400;700;900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
"""

SECTIONS_HTML = {
    "loader-nav": """
<style>
    /* ── Loading ─────────────────────────────────────────── */
    #loader {
      position: fixed; inset: 0; z-index: 9999;
      background: #030308;
      display: flex; flex-direction: column;
      align-items: center; justify-content: center; gap: 1.8rem;
      transition: opacity 0.9s ease, visibility 0.9s ease;
    }
    #loader.out { opacity: 0; visibility: hidden; pointer-events: none; }
    .loader-title {
      font-family: 'Cinzel Decorative', serif;
      font-size: clamp(1.8rem, 5vw, 3rem);
      font-weight: 900; letter-spacing: 0.25em;
      color: #D4AF37;
      animation: shimmer 2s ease-in-out infinite;
    }
    @keyframes shimmer {
      0%,100% { opacity: .45; text-shadow: none; }
      50%      { opacity: 1;   text-shadow: 0 0 40px rgba(212,175,55,.45); }
    }
    .loader-bar {
      width: 180px; height: 1px;
      background: rgba(212,175,55,.15);
      position: relative; overflow: hidden;
    }
    .loader-bar::after {
      content: ''; position: absolute;
      inset: 0; left: -100%;
      background: linear-gradient(90deg, transparent, #D4AF37, transparent);
      animation: sweep 1.4s ease-in-out infinite;
    }
    @keyframes sweep { to { left: 200%; } }
    .loader-sub {
      font-family: 'Cinzel', serif;
      font-size: .6rem; letter-spacing: .45em; text-transform: uppercase;
      color: rgba(212,175,55,.4);
    }

    /* ── Navigation ─────────────────────────────────────── */
    .nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 200;
      padding: 1.6rem 4rem;
      display: flex; justify-content: space-between; align-items: center;
      transition: background .5s ease, border-color .5s ease, backdrop-filter .5s ease;
    }
    .nav.bg {
      background: rgba(5,5,12,.82);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid var(--border);
    }
    .nav-logo {
      font-family: 'Cinzel Decorative', serif;
      font-size: 1.05rem; font-weight: 900;
      letter-spacing: .18em; color: var(--gold);
      text-decoration: none; transition: color var(--tt);
    }
    .nav-links { display: flex; gap: 2.8rem; list-style: none; }
    .nav-links a {
      font-family: 'Cinzel', serif;
      font-size: .68rem; letter-spacing: .22em; text-transform: uppercase;
      color: rgba(255,255,255,.75); text-decoration: none;
      transition: color .3s ease;
      position: relative;
    }
    .nav-links a::after {
      content: ''; position: absolute;
      bottom: -3px; left: 0; width: 0; height: 1px;
      background: var(--gold); transition: width .3s ease;
    }
    .nav-links a:hover { color: var(--gold); }
    .nav-links a:hover::after { width: 100%; }
</style>
<div id="loader">
  <div class="loader-title">OLYMPUS</div>
  <div class="loader-bar"></div>
  <div class="loader-sub">Entering the Realm of Gods</div>
</div>
<nav class="nav" id="nav">
  <a href="#" class="nav-logo">OLYMPUS</a>
  <ul class="nav-links">
    <li><a href="#pantheon">The Gods</a></li>
    <li><a href="#myths">Myths</a></li>
    <li><a href="#oracle">Oracle</a></li>
    <li><a href="#chronicles">Chronicles</a></li>
  </ul>
</nav>
""",
    "hero": """
<style>
    /* ── Hero ────────────────────────────────────────────── */
    .hero-wrap { height: 420vh; position: relative; }
    .hero-sticky {
      position: sticky; top: 0;
      height: 100vh; width: 100%;
      overflow: hidden;
      background: #050510;
    }
    .hero-video {
      position: absolute; inset: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      will-change: transform;
      transform-origin: center center;
    }
    .hero-overlay {
      position: absolute; inset: 0; z-index: 1;
      background:
        linear-gradient(to bottom,
          rgba(3,3,10,.55) 0%,
          rgba(3,3,10,.15) 35%,
          rgba(3,3,10,.25) 65%,
          rgba(3,3,10,.75) 100%);
    }
    .hero-grain {
      position: absolute; inset: 0; z-index: 2; pointer-events: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.04'/%3E%3C/svg%3E");
      background-size: 250px;
      opacity: .55;
    }
    .corner {
      position: absolute; z-index: 4;
      width: 52px; height: 52px;
      opacity: .55;
    }
    .corner.tl { top: 1.6rem; left: 2rem;
      border-top: 1px solid var(--gold); border-left: 1px solid var(--gold); }
    .corner.tr { top: 1.6rem; right: 2rem;
      border-top: 1px solid var(--gold); border-right: 1px solid var(--gold); }
    .corner.bl { bottom: 5rem; left: 2rem;
      border-bottom: 1px solid var(--gold); border-left: 1px solid var(--gold); }
    .corner.br { bottom: 5rem; right: 2rem;
      border-bottom: 1px solid var(--gold); border-right: 1px solid var(--gold); }
    .hero-rule {
      position: absolute; z-index: 4;
      left: 50%; top: 1.4rem;
      transform: translateX(-50%);
      width: min(560px, 85vw); height: 1px;
      background: linear-gradient(to right, transparent, var(--gold-dim), transparent);
    }
    .hero-content {
      position: absolute; inset: 0; z-index: 5;
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      text-align: center; padding: 2rem;
      will-change: transform, opacity;
    }
    .hero-eyebrow {
      font-family: 'Cinzel', serif;
      font-size: clamp(.6rem, 1.2vw, .75rem);
      letter-spacing: .55em; text-transform: uppercase;
      color: var(--gold); opacity: .9; margin-bottom: 1.8rem;
    }
    .hero-gem {
      display: flex; align-items: center; gap: 1rem;
      width: min(380px, 80vw); margin-bottom: 1.6rem;
    }
    .hero-gem-line {
      flex: 1; height: 1px;
      background: linear-gradient(to right, transparent, var(--gold-dim), transparent);
    }
    .hero-gem-dot { color: var(--gold); font-size: .8rem; }
    .hero-title {
      font-family: 'Cinzel Decorative', serif;
      font-size: clamp(3.2rem, 10vw, 9.5rem);
      font-weight: 900; line-height: .95;
      letter-spacing: .08em; color: #FFFFFF;
      text-shadow: 0 0 80px rgba(212,175,55,.35), 0 4px 35px rgba(0,0,0,.55);
      margin-bottom: 1.2rem;
    }
    .hero-title-greek {
      display: block;
      font-size: clamp(1.1rem, 3vw, 2.8rem);
      color: var(--gold); letter-spacing: .22em;
      opacity: .85; margin-top: .4rem;
    }
    .hero-sub {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(1rem, 2.2vw, 1.45rem);
      font-weight: 300; font-style: italic;
      color: rgba(255,255,255,.78);
      letter-spacing: .08em; margin: 1.4rem 0 1.2rem;
      max-width: 540px; line-height: 1.65;
    }
    .hero-gods {
      font-family: 'Cinzel', serif;
      font-size: clamp(.55rem, 1.1vw, .72rem);
      letter-spacing: .38em; color: rgba(212,175,55,.6);
    }
    .scroll-cue {
      position: absolute; bottom: 2.8rem; left: 50%;
      transform: translateX(-50%); z-index: 5;
      display: flex; flex-direction: column; align-items: center; gap: .45rem;
      color: rgba(255,255,255,.5);
    }
    .scroll-cue span {
      font-family: 'Cinzel', serif;
      font-size: .58rem; letter-spacing: .44em; text-transform: uppercase;
    }
    .scroll-cue-line {
      width: 1px; height: 46px;
      background: linear-gradient(to bottom, var(--gold), transparent);
      animation: pulse-line 2.2s ease-in-out infinite;
    }
    @keyframes pulse-line {
      0%,100% { opacity: .35; transform: scaleY(1); }
      50%      { opacity: .95; transform: scaleY(1.08); }
    }
</style>
<section class="hero-wrap" id="hero">
  <div class="hero-sticky">
    <video id="hero-video" class="hero-video" preload="auto" muted playsinline webkit-playsinline></video>
    <div class="hero-overlay"></div>
    <div class="hero-grain"></div>
    <div class="hero-rule"></div>
    <div class="corner tl"></div>
    <div class="corner tr"></div>
    <div class="corner bl"></div>
    <div class="corner br"></div>
    <div class="hero-content" id="hero-content">
      <div class="hero-eyebrow">Ἐν ἀρχῇ ἦν τὸ Χάος</div>
      <div class="hero-gem">
        <div class="hero-gem-line"></div>
        <div class="hero-gem-dot">✦</div>
        <div class="hero-gem-line"></div>
      </div>
      <h1 class="hero-title">
        OLYMPUS
        <span class="hero-title-greek">ΟΛΥΜΠΟΣ</span>
      </h1>
      <p class="hero-sub">
        Where thunder meets the stars, and mortals kneel<br>
        before the eternal throne of the divine
      </p>
      <div class="hero-gods">Ζεύς · Ποσειδῶν · Ἅιδης · Ἀθηνᾶ · Ἀπόλλων · Ἄρης</div>
    </div>
    <div class="scroll-cue" id="scroll-cue">
      <span>Scroll</span>
      <div class="scroll-cue-line"></div>
    </div>
  </div>
</section>
<script>
  gsap.registerPlugin(ScrollTrigger);
  const vid = document.getElementById('hero-video');
  vid.src = 'https://archive.org/download/BigBuckBunny_124/Content/big_buck_bunny_720p_surround.mp4'; // Placeholder for sample

  const loader = document.getElementById('loader');
  function hideLoader() {
    if (loader) {
      loader.classList.add('out');
      setTimeout(() => loader.style.display = 'none', 950);
    }
  }
  vid.addEventListener('canplay', hideLoader, { once: true });
  vid.addEventListener('error', hideLoader, { once: true });
  setTimeout(hideLoader, 5000);

  function setupScrub() {
    if (!vid.duration) return;
    ScrollTrigger.create({
      trigger: '.hero-wrap',
      start: 'top top',
      end: 'bottom bottom',
      scrub: 0.25,
      onUpdate(self) {
        if (vid.readyState >= 2) {
          vid.currentTime = vid.duration * self.progress;
        }
      }
    });
  }
  vid.addEventListener('loadedmetadata', setupScrub);
  if (vid.readyState >= 1) setupScrub();

  gsap.to('#hero-content', {
    yPercent: -28,
    opacity: 0,
    ease: 'none',
    scrollTrigger: {
      trigger: '.hero-wrap',
      start: 'top top',
      end: '28% top',
      scrub: true
    }
  });

  gsap.to('#scroll-cue', {
    opacity: 0,
    ease: 'none',
    scrollTrigger: {
      trigger: '.hero-wrap',
      start: 'top top',
      end: '6% top',
      scrub: true
    }
  });

  gsap.fromTo('.hero-video',
    { scale: 1 },
    {
      scale: 1.07,
      ease: 'none',
      scrollTrigger: {
        trigger: '.hero-wrap',
        start: 'top top',
        end: 'bottom bottom',
        scrub: true
      }
    }
  );

  ScrollTrigger.create({
    trigger: '#site-body',
    start: 'top 88%',
    onEnter() { document.documentElement.setAttribute('data-theme', 'dark'); },
    onLeaveBack() { document.documentElement.removeAttribute('data-theme'); }
  });

  ScrollTrigger.create({
    trigger: '.hero-wrap',
    start: 'top top',
    end: 'bottom top',
    onLeave() {
      const nav = document.getElementById('nav');
      if (nav) nav.classList.add('bg');
    },
    onEnterBack() {
      const nav = document.getElementById('nav');
      if (nav) nav.classList.remove('bg');
    }
  });

  document.querySelectorAll('.reveal').forEach(el => {
    gsap.fromTo(el,
      { opacity: 0, y: 36 },
      {
        opacity: 1, y: 0,
        duration: 1,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: el,
          start: 'top 87%',
          toggleActions: 'play none none none'
        }
      }
    );
  });
</script>
""",
    "intro": """
<style>
    .intro { padding: 8rem 4rem; background: var(--bg); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); transition: background var(--tt), border-color var(--tt); }
    .intro-inner { max-width: 860px; margin: 0 auto; text-align: center; }
    .intro-quote { font-size: clamp(1.35rem, 3vw, 2.1rem); font-style: italic; font-weight: 300; color: var(--text); line-height: 1.72; transition: color var(--tt); }
    .intro-quote em { color: var(--gold); font-style: normal; }
    .intro-source { font-family: 'Cinzel', serif; font-size: .65rem; letter-spacing: .42em; color: var(--text-muted); text-transform: uppercase; transition: color var(--tt); }
    .sec-label { font-family: 'Cinzel', serif; font-size: .65rem; letter-spacing: .5em; text-transform: uppercase; color: var(--gold); margin-bottom: 1.4rem; transition: color var(--tt); }
    .g-rule { display: flex; align-items: center; gap: 1.3rem; margin: 2.2rem 0; }
    .g-rule-line { flex: 1; height: 1px; background: linear-gradient(to right, var(--gold-dim), transparent); transition: background var(--tt); }
    .g-rule-line.rev { background: linear-gradient(to left, var(--gold-dim), transparent); }
    .g-rule-sym { color: var(--gold); font-size: 1rem; transition: color var(--tt); }
</style>
<section class="intro" id="intro">
  <div class="intro-inner">
    <div class="sec-label reveal">The Ancient World</div>
    <div class="g-rule reveal">
      <div class="g-rule-line"></div>
      <div class="g-rule-sym">⚡</div>
      <div class="g-rule-line rev"></div>
    </div>
    <p class="intro-quote reveal">
      "From Chaos came the Earth, and from the Earth came all things divine —
      the <em>twelve immortals</em> who shaped the fate of gods and men alike
      from their thrones upon Mount Olympus."
    </p>
    <div class="g-rule reveal">
      <div class="g-rule-line"></div>
      <div class="g-rule-sym">✦</div>
      <div class="g-rule-line rev"></div>
    </div>
    <div class="intro-source reveal">— Hesiod · Theogony · 700 BCE</div>
  </div>
</section>
""",
    "pantheon": """
<style>
    .sec { padding: 8rem 4rem; }
    .sec-inner { max-width: 1320px; margin: 0 auto; }
    .pantheon { background: var(--bg-alt); transition: background var(--tt); }
    .sec-title { font-family: 'Cinzel', serif; font-size: clamp(2rem, 5vw, 4rem); font-weight: 700; color: var(--text); line-height: 1.1; margin-bottom: 1.2rem; transition: color var(--tt); }
    .sec-sub { font-size: clamp(1rem, 1.8vw, 1.28rem); font-weight: 300; font-style: italic; color: var(--text-muted); line-height: 1.85; max-width: 580px; transition: color var(--tt); }
    .gods-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(270px, 1fr)); gap: 1.8rem; margin-top: 4.5rem; }
    .god-card { background: var(--bg-card); border: 1px solid var(--border); padding: 2.4rem 2.2rem; position: relative; overflow: hidden; cursor: default; transition: background var(--tt), border-color var(--tt), transform .4s ease, box-shadow .4s ease; }
    .god-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(to right, transparent, var(--gold), transparent); opacity: 0; transition: opacity .4s ease; }
    .god-card:hover { transform: translateY(-5px); box-shadow: 0 20px 55px rgba(0,0,0,.08), 0 0 40px var(--gold-glow); }
    .god-sym  { font-size: 2.4rem; display: block; margin-bottom: 1.3rem; }
    .god-realm { font-family: 'Cinzel', serif; font-size: .58rem; letter-spacing: .5em; text-transform: uppercase; color: var(--gold); margin-bottom: .6rem; transition: color var(--tt); }
    .god-name { font-family: 'Cinzel', serif; font-size: 1.75rem; font-weight: 700; color: var(--text); margin-bottom: .9rem; transition: color var(--tt); }
    .god-desc { font-size: .98rem; font-weight: 300; font-style: italic; color: var(--text-muted); line-height: 1.82; transition: color var(--tt); }
    .god-num { position: absolute; bottom: 1.2rem; right: 1.8rem; font-family: 'Cinzel', serif; font-size: 2.8rem; font-weight: 900; color: var(--gold-dim); line-height: 1; transition: color var(--tt); }
</style>
<div class="meander" style="width: 100%; height: 22px; opacity: .45; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='44' height='22'%3E%3Cpath d='M0 11h6V5h6v6h6V5h6v11h-6v-5h-6v5h-6V5H0z' fill='none' stroke='%23C9A227' stroke-width='1'/%3E%3C/svg%3E&quot;); background-repeat: repeat-x;"></div>
<section class="sec pantheon" id="pantheon">
  <div class="sec-inner">
    <div class="sec-label reveal">The Twelve Olympians</div>
    <h2 class="sec-title reveal">The Divine Pantheon</h2>
    <p class="sec-sub reveal">Rulers of the cosmos, shaping the destiny of mortals from their eternal thrones atop sacred Mount Olympus.</p>
    <div class="gods-grid">
      <div class="god-card reveal">
        <span class="god-sym">⚡</span>
        <div class="god-realm">King of the Gods</div>
        <div class="god-name">Zeus</div>
        <p class="god-desc">Lord of sky, thunder, and lightning. Father of gods and men, wielder of the thunderbolt, supreme ruler of Olympus.</p>
        <div class="god-num">I</div>
      </div>
      <div class="god-card reveal">
        <span class="god-sym">🔱</span>
        <div class="god-realm">God of the Sea</div>
        <div class="god-name">Poseidon</div>
        <p class="god-desc">Master of the oceans, earthquakes, and horses. His trident can split mountains and summon tempests from calm waters.</p>
        <div class="god-num">II</div>
      </div>
      <div class="god-card reveal">
        <span class="god-sym">🦉</span>
        <div class="god-realm">Goddess of Wisdom</div>
        <div class="god-name">Athena</div>
        <p class="god-desc">Born fully armored from the head of Zeus. Goddess of wisdom, strategic war, and craft — patron deity of Athens.</p>
        <div class="god-num">III</div>
      </div>
    </div>
  </div>
</section>
""",
    "myths": """
<style>
    .myths { background: var(--bg); transition: background var(--tt); }
    .myth-pair { display: grid; grid-template-columns: 1fr 1fr; gap: 4.5rem; align-items: center; margin-top: 5rem; }
    .myth-pair + .myth-pair { margin-top: 6rem; }
    .myth-vis { aspect-ratio: 4/5; background: var(--bg-alt); border: 1px solid var(--border); position: relative; overflow: hidden; transition: background var(--tt), border-color var(--tt); }
    .myth-vis-bg { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 7rem; opacity: .12; user-select: none; }
    .myth-vis-caption { position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(to top, rgba(0,0,0,.55), transparent); font-family: 'Cinzel', serif; font-size: .58rem; letter-spacing: .42em; color: rgba(255,255,255,.7); }
    .myth-label { font-family: 'Cinzel', serif; font-size: .62rem; letter-spacing: .48em; text-transform: uppercase; color: var(--gold); margin-bottom: .8rem; transition: color var(--tt); }
    .myth-title { font-family: 'Cinzel', serif; font-size: clamp(1.6rem, 3vw, 2.6rem); font-weight: 700; color: var(--text); margin-bottom: 1.3rem; line-height: 1.2; transition: color var(--tt); }
    .myth-body { font-size: 1.05rem; font-weight: 300; color: var(--text-muted); line-height: 1.92; margin-bottom: 1.4rem; transition: color var(--tt); }
    .myth-link { display: inline-flex; align-items: center; gap: .7rem; font-family: 'Cinzel', serif; font-size: .65rem; letter-spacing: .28em; text-transform: uppercase; color: var(--gold); text-decoration: none; border-bottom: 1px solid var(--gold-dim); padding-bottom: .2rem; transition: gap .3s ease, border-color .3s ease, color var(--tt); }
    .myth-link:hover { gap: 1.2rem; border-color: var(--gold); }
</style>
<div class="meander" style="width: 100%; height: 22px; opacity: .45; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='44' height='22'%3E%3Cpath d='M0 11h6V5h6v6h6V5h6v11h-6v-5h-6v5h-6V5H0z' fill='none' stroke='%23C9A227' stroke-width='1'/%3E%3C/svg%3E&quot;); background-repeat: repeat-x;"></div>
<section class="sec myths" id="myths">
  <div class="sec-inner">
    <div class="sec-label reveal">Sacred Tales</div>
    <h2 class="sec-title reveal">The Great Myths</h2>
    <div class="myth-pair">
      <div class="myth-vis reveal">
        <div class="myth-vis-bg">⚡</div>
        <div class="myth-vis-caption">The War of the Titans · c. 700 BCE</div>
      </div>
      <div>
        <div class="myth-label reveal">The Titanomachy</div>
        <h3 class="myth-title reveal">The War That Shaped Creation</h3>
        <p class="myth-body reveal">For ten savage years, the young Olympian gods waged cosmic war against the ancient Titans for dominion over creation.</p>
        <a href="#" class="myth-link reveal">Read the Full Myth →</a>
      </div>
    </div>
  </div>
</section>
""",
    "oracle": """
<style>
    .oracle { padding: 10rem 4rem; background: var(--bg-alt); text-align: center; position: relative; overflow: hidden; transition: background var(--tt); }
    .oracle-bg { position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); font-family: 'Cinzel Decorative', serif; font-size: 14vw; font-weight: 900; color: var(--gold); opacity: .055; white-space: nowrap; pointer-events: none; user-select: none; transition: color var(--tt); }
    .oracle-inner { position: relative; z-index: 1; max-width: 780px; margin: 0 auto; }
    .oracle-icon { font-size: 2.6rem; display: block; margin-bottom: 1.8rem; }
    .oracle-quote { font-size: clamp(1.45rem, 3.5vw, 2.45rem); font-style: italic; font-weight: 300; color: var(--text); line-height: 1.62; transition: color var(--tt); }
    .oracle-quote em { color: var(--gold); font-style: normal; }
    .oracle-attr { font-family: 'Cinzel', serif; font-size: .63rem; letter-spacing: .5em; color: var(--text-muted); text-transform: uppercase; transition: color var(--tt); }
</style>
<section class="oracle" id="oracle">
  <div class="oracle-bg">ΧΡΗΣΜΟΣ</div>
  <div class="oracle-inner">
    <span class="oracle-icon reveal">🏛️</span>
    <div class="sec-label reveal">The Oracle of Delphi</div>
    <div class="g-rule reveal">
      <div class="g-rule-line"></div>
      <div class="g-rule-sym">✦</div>
      <div class="g-rule-line rev"></div>
    </div>
    <p class="oracle-quote reveal">"Know thyself. Nothing in excess.<br><em>Certainty brings insanity.</em>"</p>
    <div class="g-rule reveal">
      <div class="g-rule-line"></div>
      <div class="g-rule-sym">✦</div>
      <div class="g-rule-line rev"></div>
    </div>
    <div class="oracle-attr reveal">— The Three Maxims of Delphi</div>
  </div>
</section>
""",
    "chronicles": """
<style>
    .chronicles { background: var(--bg); transition: background var(--tt); }
    .timeline { margin-top: 5rem; position: relative; }
    .timeline::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 1px; background: linear-gradient(to bottom, transparent, var(--gold-dim), transparent); transition: background var(--tt); }
    .tl-item { display: grid; grid-template-columns: 1fr 52px 1fr; margin-bottom: 3.8rem; align-items: flex-start; }
    .tl-left  { text-align: right; padding-right: 2.8rem; }
    .tl-right { padding-left: 2.8rem; }
    .tl-dot { width: 10px; height: 10px; background: var(--gold); border-radius: 50%; margin: .5rem auto 0; box-shadow: 0 0 18px var(--gold-dim); transition: background var(--tt), box-shadow var(--tt); }
    .tl-date { font-family: 'Cinzel', serif; font-size: .62rem; letter-spacing: .3em; text-transform: uppercase; color: var(--gold); margin-bottom: .4rem; transition: color var(--tt); }
    .tl-event { font-family: 'Cinzel', serif; font-size: 1.05rem; font-weight: 600; color: var(--text); margin-bottom: .65rem; transition: color var(--tt); }
    .tl-desc { font-size: .97rem; font-weight: 300; font-style: italic; color: var(--text-muted); line-height: 1.8; transition: color var(--tt); }
</style>
<div class="meander" style="width: 100%; height: 22px; opacity: .45; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='44' height='22'%3E%3Cpath d='M0 11h6V5h6v6h6V5h6v11h-6v-5h-6v5h-6V5H0z' fill='none' stroke='%23C9A227' stroke-width='1'/%3E%3C/svg%3E&quot;); background-repeat: repeat-x;"></div>
<section class="sec chronicles" id="chronicles">
  <div class="sec-inner">
    <div style="max-width: 820px; margin: 0 auto;">
      <div class="sec-label reveal">The Age of Gods</div>
      <h2 class="sec-title reveal">Chronicles of Olympus</h2>
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-left">
            <div class="tl-date reveal">Before Time</div>
            <div class="tl-event reveal">The Birth of Chaos</div>
            <p class="tl-desc reveal">Before existence itself, there was Chaos — the primordial void.</p>
          </div>
          <div class="tl-dot reveal"></div>
          <div class="tl-right"></div>
        </div>
      </div>
    </div>
  </div>
</section>
""",
    "footer": """
<style>
    footer { background: var(--bg-alt); border-top: 1px solid var(--border); transition: background var(--tt), border-color var(--tt); }
    .foot-top { max-width: 1320px; margin: 0 auto; padding: 4rem 4rem 3rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem; }
    .foot-logo { font-family: 'Cinzel Decorative', serif; font-size: 1.4rem; font-weight: 900; color: var(--gold); transition: color var(--tt); }
    .foot-tagline { font-family: 'Cinzel', serif; font-size: .58rem; letter-spacing: .48em; color: var(--text-muted); margin-top: .4rem; text-transform: uppercase; transition: color var(--tt); }
    .foot-nav { display: flex; gap: 2.4rem; list-style: none; }
    .foot-nav a { font-family: 'Cinzel', serif; font-size: .63rem; letter-spacing: .28em; text-transform: uppercase; color: var(--text-muted); text-decoration: none; transition: color .3s ease; }
    .foot-nav a:hover { color: var(--gold); }
    .foot-bottom { border-top: 1px solid var(--border); padding: 1.6rem 4rem; text-align: center; transition: border-color var(--tt); }
    .foot-copy { font-family: 'Cinzel', serif; font-size: .58rem; letter-spacing: .32em; color: var(--text-faint); text-transform: uppercase; transition: color var(--tt); }
</style>
<footer>
  <div class="foot-top">
    <div>
      <div class="foot-logo">OLYMPUS</div>
      <div class="foot-tagline">ΟΛΥΜΠΟΣ · Realm of the Eternal Gods</div>
    </div>
    <ul class="foot-nav">
      <li><a href="#pantheon">The Gods</a></li>
      <li><a href="#myths">Myths</a></li>
      <li><a href="#oracle">Oracle</a></li>
      <li><a href="#chronicles">Chronicles</a></li>
    </ul>
  </div>
  <div class="foot-bottom">
    <div class="foot-copy">✦ MMXXVI · Where the Gods Dwell Eternal ✦</div>
  </div>
</footer>
"""
}

def main():
    output_dir = "elementor-templates"
    full_page_content = []

    for name, html in SECTIONS_HTML.items():
        # Combine with common assets
        full_html = COMMON_CSS + html

        # Create individual section template
        section_element = create_section(full_html)
        template = create_elementor_template(f"Olympus - {name.replace('-', ' ').title()}", [section_element])

        with open(os.path.join(output_dir, f"{name}.json"), "w") as f:
            json.dump(template, f, indent=2)

        # Add to full page list
        full_page_content.append(section_element)

    # Create full page template
    full_page_template = create_elementor_template("Olympus - Full Page", full_page_content)
    with open(os.path.join(output_dir, "full-page.json"), "w") as f:
        json.dump(full_page_template, f, indent=2)

    print(f"Generated {len(SECTIONS_HTML) + 1} templates in {output_dir}")

if __name__ == "__main__":
    main()

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Portfolio' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
  <noscript>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
  </noscript>

  <style>
    .reveal {
      transition: none;
    }
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

:root {
      --bg: #05050a;
      --surface: #0d0d18;
      --border: rgba(255,255,255,0.06);
      --text: #e8e8f0;
      --muted: #6b6b80;
      --accent-1: #7c3aed;
      --accent-2: #06b6d4;
      --accent-glow-1: rgba(124,58,237,0.35);
      --accent-glow-2: rgba(6,182,212,0.25);
      --font-display: 'Syne', sans-serif;
      --font-mono: 'Space Mono', monospace;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: var(--font-display);
      overflow-x: hidden;
    }

    @media (hover: hover) and (pointer: fine) {
      body {
        cursor: none;
      }
      #cursor-dot,
      #cursor-ring {
        display: block;
      }
    }

    /* ── CURSOR ── */
    #cursor-dot,
    #cursor-ring {
      display: none;
    }

    #cursor-dot {
      position: fixed;
      top: 0;
      left: 0;
      width: 8px;
      height: 8px;
      background: var(--accent-2);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      will-change: left, top;
      box-shadow: 0 0 10px var(--accent-2);
      transition: width .15s, height .15s, background .15s;
    }

    #cursor-ring {
      position: fixed;
      top: 0;
      left: 0;
      width: 32px;
      height: 32px;
      border: 1.5px solid rgba(6,182,212,0.45);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      will-change: left, top;
      transition: width .2s, height .2s, border-color .2s;
    }

    body:has(a:hover) #cursor-dot,
    body:has(button:hover) #cursor-dot {
      width: 14px;
      height: 14px;
      background: var(--accent-1);
      box-shadow: 0 0 16px var(--accent-1);
    }

    body:has(a:hover) #cursor-ring,
    body:has(button:hover) #cursor-ring {
      width: 50px;
      height: 50px;
      border-color: rgba(124,58,237,0.55);
    }

    /* ── GRAIN ── */
    #grain {
      position: fixed;
      inset: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 9990;
      opacity: 0.028;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
      animation: grain-shift 1.6s steps(2) infinite;
    }

    @keyframes grain-shift {
      0% {
        transform: translate(0,0);
      }
      50% {
        transform: translate(-3%,-4%);
      }
      100% {
        transform: translate(3%,4%);
      }
    }

    @media (max-width: 768px) {
      #grain {
        display: none;
      }
    }

    /* ── FLOATING CODE ICONS ── */
    #hero-canvas {
      position: fixed;
      inset: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 0;
      opacity: 0.85;
    }

    @media (max-width: 768px) {
      #hero-canvas {
        opacity: 0.5;
      }
    }

    /* ── SCROLLBAR ── */
    ::-webkit-scrollbar {
      width: 3px;
    }
    ::-webkit-scrollbar-track {
      background: var(--bg);
    }
    ::-webkit-scrollbar-thumb {
      background: var(--accent-1);
      border-radius: 2px;
    }

    /* ══════════════════════════════════════
           NAV
        ══════════════════════════════════════ */
    .p-nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      padding: 1.5rem 4rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid transparent;
      transition: border-color .4s, background .4s;
    }

    .p-nav.scrolled {
      background: rgba(5,5,10,0.95);
      border-bottom-color: var(--border);
    }

    @media (hover: hover) and (pointer: fine) {
      .p-nav.scrolled {
        background: rgba(5,5,10,0.82);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
      }
    }

    .p-nav__logo {
      font-family: var(--font-mono);
      font-size: .85rem;
      color: var(--accent-2);
      text-decoration: none;
      letter-spacing: .1em;
      z-index: 110;
      flex-shrink: 0;
    }

    .p-nav__links {
      display: flex;
      gap: 2.5rem;
      list-style: none;
    }

    .p-nav__links a {
      font-family: var(--font-mono);
      font-size: .75rem;
      color: var(--muted);
      text-decoration: none;
      letter-spacing: .12em;
      text-transform: uppercase;
      transition: color .25s;
      position: relative;
    }

    .p-nav__links a::after {
      content: '';
      position: absolute;
      bottom: -3px;
      left: 0;
      width: 0;
      height: 1px;
      background: var(--accent-2);
      transition: width .25s;
    }

    .p-nav__links a:hover {
      color: var(--text);
    }
    .p-nav__links a:hover::after {
      width: 100%;
    }

    /* Hamburger */
    .p-nav__burger {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
      padding: .3rem;
      z-index: 110;
    }

    .p-nav__burger span {
      display: block;
      width: 24px;
      height: 2px;
      background: var(--text);
      border-radius: 2px;
      transition: transform .3s, opacity .3s, width .3s;
      transform-origin: center;
    }

    .p-nav__burger.open span:nth-child(1) {
      transform: translateY(7px) rotate(45deg);
    }
    .p-nav__burger.open span:nth-child(2) {
      opacity: 0;
      width: 0;
    }
    .p-nav__burger.open span:nth-child(3) {
      transform: translateY(-7px) rotate(-45deg);
    }

    /* Mobile drawer */
    .p-nav__drawer {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(5,5,10,0.98);
      z-index: 105;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 2.5rem;
      list-style: none;
      opacity: 0;
      pointer-events: none;
      transition: opacity .25s;
    }

    .p-nav__drawer.open {
      opacity: 1;
      pointer-events: all;
    }

    .p-nav__drawer a {
      font-family: var(--font-display);
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -.02em;
      transition: color .25s;
    }

    .p-nav__drawer a:hover {
      color: var(--accent-2);
    }

    /* ══════════════════════════════════════
           MAIN & SECTION BASE
        ══════════════════════════════════════ */
    main {
      position: relative;
      z-index: 1;
    }

    .p-section {
      padding: 8rem 4rem;
      position: relative;
    }

    .section-tag {
      font-family: var(--font-mono);
      font-size: .7rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: var(--accent-2);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: .6rem;
    }

    .section-tag::before {
      content: '';
      display: block;
      width: 2rem;
      height: 1px;
      background: var(--accent-2);
      flex-shrink: 0;
    }

    /* ══════════════════════════════════════
           REVEAL
        ══════════════════════════════════════ */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity .7s cubic-bezier(.16,1,.3,1),
      transform .7s cubic-bezier(.16,1,.3,1);
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-d1 {
      transition-delay: .08s;
    }
    .reveal-d2 {
      transition-delay: .16s;
    }
    .reveal-d3 {
      transition-delay: .24s;
    }
    .reveal-d4 {
      transition-delay: .32s;
    }
    .reveal-d5 {
      transition-delay: .40s;
    }

    /* ══════════════════════════════════════
           HERO
        ══════════════════════════════════════ */
    .p-hero {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 6rem 4rem 5rem;
      position: relative;
      overflow: hidden;
    }

    /* Glowing accent dot — top right, decorative only */
    .p-hero__accent-dot {
      position: absolute;
      top: 7rem;
      right: 4rem;
      width: 8px;
      height: 8px;
      background: var(--accent-2);
      border-radius: 50%;
      box-shadow: 0 0 20px var(--accent-2), 0 0 50px var(--accent-glow-2);
      animation: pulse-dot 2.5s infinite;
    }

    /* Corner bracket top-left */
    .p-hero__bracket-tl,
    .p-hero__bracket-br {
      position: absolute;
      width: 28px;
      height: 28px;
      pointer-events: none;
    }

    .p-hero__bracket-tl {
      top: 7rem;
      left: 4rem;
      border-top: 1.5px solid rgba(6,182,212,0.3);
      border-left: 1.5px solid rgba(6,182,212,0.3);
    }

    .p-hero__bracket-br {
      bottom: 5rem;
      right: 4rem;
      border-bottom: 1.5px solid rgba(124,58,237,0.3);
      border-right: 1.5px solid rgba(124,58,237,0.3);
    }

    .p-hero__status {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      font-family: var(--font-mono);
      font-size: .7rem;
      color: var(--muted);
      letter-spacing: .15em;
      text-transform: uppercase;
      margin-bottom: 2rem;
    }

    .p-hero__status-dot {
      width: 6px;
      height: 6px;
      background: #22c55e;
      border-radius: 50%;
      flex-shrink: 0;
      animation: pulse-dot 2.5s infinite;
    }

    .p-hero__name {
      font-size: clamp(2.8rem, 10vw, 9rem);
      font-weight: 800;
      line-height: .95;
      letter-spacing: -.03em;
      background: linear-gradient(135deg, #e8e8f0 30%, var(--accent-2) 70%, var(--accent-1) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: .6rem;
      }

      .p-hero__role {
      font-family: var(--font-mono);
      font-size: clamp(.75rem, 1.5vw, 1rem);
      font-weight: 400;
      color: var(--muted);
      letter-spacing: .08em;
      text-transform: uppercase;
      margin-bottom: 3rem;
      }

      .p-hero__bottom {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 3rem;
      flex-wrap: wrap;
      }

      .p-hero__bio {
      max-width: 38ch;
      color: var(--muted);
      font-family: var(--font-mono);
      font-size: .85rem;
      line-height: 1.7;
      }

      .p-hero__cta {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      flex-shrink: 0;
      }

      /* Scroll indicator */
      .p-hero__scroll {
      position: absolute;
      right: 4rem; bottom: 4rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: .5rem;
      font-family: var(--font-mono);
      font-size: .65rem;
      color: var(--muted);
      letter-spacing: .15em;
      text-transform: uppercase;
      }

      .p-hero__scroll-line {
      width: 1px; height: 50px;
      background: linear-gradient(to bottom, var(--accent-2), transparent);
      animation: scroll-line 2.2s ease-in-out infinite;
      }

      /* ══════════════════════════════════════
      BUTTONS
      ══════════════════════════════════════ */
      .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: .6rem;
      padding: .85rem 2rem;
      background: var(--accent-1);
      color: #fff;
      font-family: var(--font-mono);
      font-size: .75rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      text-decoration: none;
      border-radius: 2px;
      border: none;
      cursor: pointer;
      transition: box-shadow .25s, transform .25s;
      }

      .btn-primary:hover {
      box-shadow: 0 0 28px var(--accent-glow-1);
      transform: translateY(-2px);
      }

      .btn-outline {
      display: inline-flex;
      align-items: center;
      gap: .6rem;
      padding: .85rem 2rem;
      border: 1px solid var(--border);
      color: var(--text);
      font-family: var(--font-mono);
      font-size: .75rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      text-decoration: none;
      border-radius: 2px;
      background: transparent;
      cursor: pointer;
      transition: border-color .25s, color .25s;
      }

      .btn-outline:hover {
      border-color: var(--accent-2);
      color: var(--accent-2);
      }

      /* ══════════════════════════════════════
      ABOUT
      ══════════════════════════════════════ */
      .p-about {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 6rem;
      align-items: flex-start;
      }

      .p-about__heading {
      font-size: clamp(2rem, 5vw, 4.5rem);
      font-weight: 800;
      line-height: 1;
      letter-spacing: -.03em;
      margin-bottom: 2rem;
      }

      .p-about__text {
      color: var(--muted);
      font-family: var(--font-mono);
      font-size: .85rem;
      line-height: 1.9;
      max-width: 45ch;
      margin-bottom: 1.5rem;
      }

      .p-stats {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5px;
      background: var(--border);
      }

      .p-stat {
      background: var(--bg);
      padding: 2.5rem;
      transition: background .25s;
      }

      .p-stat:hover { background: var(--surface); }

      .p-stat__num {
      font-size: clamp(2rem, 4vw, 3.5rem);
      font-weight: 800;
      line-height: 1;
      margin-bottom: .5rem;
      }

      .p-stat__label {
      font-family: var(--font-mono);
      font-size: .7rem;
      color: var(--muted);
      letter-spacing: .1em;
      text-transform: uppercase;
      }

      /* ══════════════════════════════════════
      WORK
      ══════════════════════════════════════ */
      .p-work {
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 100vh;
      }

      .p-work__heading {
      font-size: clamp(2rem, 5vw, 4rem);
      font-weight: 800;
      letter-spacing: -.03em;
      margin-bottom: 5rem;
      }

      .p-work__pin-wrap {
      overflow: hidden;
      }

      .p-projects {
      display: flex;
      flex-direction: row;
      gap: 1.5px;
      background: var(--border);
      width: max-content;
      }

      .p-project {
      background: var(--bg);
      padding: 3rem 4rem;
      width: 88vw;
      max-width: 780px;
      flex-shrink: 0;
      display: grid;
      grid-template-columns: 2rem 1fr auto;
      gap: 3rem;
      align-items: center;
      cursor: pointer;
      transition: background .25s;
      }

      .p-project:hover {
      background: var(--surface);
      }

      .p-project__index {
      font-family: var(--font-mono);
      font-size: .7rem;
      color: var(--muted);
      letter-spacing: .1em;
      }

      .p-project__header {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      margin-bottom: .75rem;
      flex-wrap: wrap;
      }

      .p-project__name {
      font-size: clamp(1.3rem, 3vw, 2.2rem);
      font-weight: 700;
      letter-spacing: -.02em;
      }

      .p-project__tag {
      font-family: var(--font-mono);
      font-size: .65rem;
      color: var(--accent-2);
      border: 1px solid rgba(6,182,212,0.3);
      padding: .25rem .75rem;
      border-radius: 999px;
      letter-spacing: .1em;
      text-transform: uppercase;
      white-space: nowrap;
      }

      .p-project__desc {
      color: var(--muted);
      font-family: var(--font-mono);
      font-size: .8rem;
      line-height: 1.7;
      max-width: 60ch;
      margin-bottom: 1.25rem;
      }

      .p-project__stack {
      display: flex;
      gap: .5rem;
      flex-wrap: wrap;
      }

      .p-project__tech {
      font-family: var(--font-mono);
      font-size: .65rem;
      color: var(--muted);
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      padding: .2rem .65rem;
      border-radius: 2px;
      letter-spacing: .08em;
      }

      .p-project__meta {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 1rem;
      }

      .p-project__year {
      font-family: var(--font-mono);
      font-size: .7rem;
      color: var(--muted);
      }

      .p-project__arrow {
      color: var(--accent-2);
      transform: rotate(-45deg);
      flex-shrink: 0;
      }

      /* ══════════════════════════════════════
      SKILLS
      ══════════════════════════════════════ */
      .p-skills__heading {
      font-size: clamp(2rem, 5vw, 4rem);
      font-weight: 800;
      letter-spacing: -.03em;
      margin-bottom: 5rem;
      }

      .p-skills__grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.5px;
      background: var(--border);
      }

      .p-skill-card {
      background: var(--bg);
      padding: 2.5rem;
      transition: background .25s;
      }

      .p-skill-card:hover { background: var(--surface); }

      .p-skill-card__cat {
      font-family: var(--font-mono);
      font-size: .65rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      margin-bottom: 1.5rem;
      }

      .p-skill-card__list {
      display: flex;
      flex-direction: column;
      gap: .6rem;
      }

      .p-skill-item {
      font-size: .95rem;
      font-weight: 600;
      color: var(--text);
      display: flex;
      align-items: center;
      gap: .5rem;
      }

      .p-skill-dot {
      width: 4px; height: 4px;
      border-radius: 50%;
      flex-shrink: 0;
      }

      /* ══════════════════════════════════════
      CONTACT
      ══════════════════════════════════════ */
      .p-contact {
      min-height: 70vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      align-items: center;
      }

      .p-contact .section-tag { justify-content: center; }

      .p-contact__heading {
      font-size: clamp(2.5rem, 8vw, 7rem);
      font-weight: 800;
      letter-spacing: -.04em;
      line-height: .95;
      margin-bottom: 2rem;
      }

      .p-contact__outline {
      -webkit-text-stroke: 1px var(--accent-1);
      -webkit-text-fill-color: transparent;
      color: transparent;
      }

      .p-contact__text {
      font-family: var(--font-mono);
      font-size: .85rem;
      color: var(--muted);
      max-width: 40ch;
      line-height: 1.8;
      margin-bottom: 3rem;
      }

      .btn-contact {
      display: inline-flex;
      align-items: center;
      gap: .75rem;
      padding: 1.1rem 3rem;
      background: transparent;
      border: 1px solid var(--accent-1);
      color: var(--text);
      font-family: var(--font-mono);
      font-size: .8rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      text-decoration: none;
      border-radius: 2px;
      transition: background .25s, box-shadow .25s, transform .25s;
      }

      .btn-contact:hover {
      background: var(--accent-1);
      box-shadow: 0 0 36px var(--accent-glow-1);
      transform: translateY(-3px);
      }

      /* ══════════════════════════════════════
      FOOTER
      ══════════════════════════════════════ */
      .p-footer {
      padding: 3rem 4rem;
      border-top: 1px solid var(--border);
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      z-index: 1;
      flex-wrap: wrap;
      gap: 1rem;
      }

      .p-footer span {
      font-family: var(--font-mono);
      font-size: .7rem;
      color: var(--muted);
      letter-spacing: .1em;
      }

      /* ══════════════════════════════════════
      KEYFRAMES
      ══════════════════════════════════════ */
      @keyframes pulse-dot {
      0%, 100% { opacity: 1; }
      50%       { opacity: .35; }
      }

      @keyframes scroll-line {
      0%   { transform: scaleY(0); transform-origin: top; }
      50%  { transform: scaleY(1); transform-origin: top; }
      51%  { transform: scaleY(1); transform-origin: bottom; }
      100% { transform: scaleY(0); transform-origin: bottom; }
      }

      @keyframes float-idle {
      0%, 100% { transform: translateY(0px); }
      50%       { transform: translateY(-8px); }
      }

      /* ══════════════════════════════════════
      TABLET  ≤ 1024px
      ══════════════════════════════════════ */
      @media (max-width: 1024px) {
      .p-about { grid-template-columns: 1fr; gap: 4rem; }
      .p-project { grid-template-columns: 2rem 1fr; padding: 2.5rem; }
      .p-project:hover { padding-left: 3.5rem; }
      .p-project__meta { display: none; }
      }

      /* ══════════════════════════════════════
      MOBILE  ≤ 768px
      ══════════════════════════════════════ */
      @media (max-width: 768px) {
      .p-nav { padding: 1.25rem 1.5rem; }
      .p-nav__links { display: none; }
      .p-nav__burger { display: flex; }
      .p-nav__drawer { display: flex; }

      .p-section { padding: 6rem 1.5rem; }

      .p-hero { padding: 6rem 1.5rem 4rem; }
      .p-hero__accent-dot { top: 5.5rem; right: 1.5rem; }
      .p-hero__bracket-tl { top: 5.5rem; left: 1.5rem; }
      .p-hero__bracket-br { bottom: 3.5rem; right: 1.5rem; }
      .p-hero__scroll { display: none; }
      .p-hero__bottom { flex-direction: column; align-items: flex-start; gap: 2rem; }
      .p-hero__bio { max-width: 100%; }
      .p-hero__cta { width: 100%; }
      .btn-primary, .btn-outline { flex: 1; justify-content: center; }

      .p-about { grid-template-columns: 1fr; gap: 3rem; }
      .p-stat { padding: 1.75rem; }

      .p-project { grid-template-columns: 1fr; padding: 2rem 1.5rem; gap: 1rem; }
      .p-project:hover { padding-left: 1.5rem; }
      .p-project__index { display: none; }
      .p-project__meta { display: none; }

      .p-skills__grid { grid-template-columns: 1fr 1fr; }

      .p-contact__text { max-width: 100%; }
      .btn-contact { width: 100%; justify-content: center; padding: 1rem 2rem; }

      .p-footer { padding: 2rem 1.5rem; flex-direction: column; text-align: center; }

      /* Hide floating symbols on mobile — not worth the overhead */
      #code-canvas { display: none; }
      }

      /* ══════════════════════════════════════
      SMALL MOBILE  ≤ 480px
      ══════════════════════════════════════ */
      @media (max-width: 480px) {
      .p-skills__grid { grid-template-columns: 1fr; }
      }
      </style>
      </head>
      <body>

      <div id="cursor-dot"></div>
      <div id="cursor-ring"></div>
      <div id="grain" aria-hidden="true"></div>

      {{-- Three.js wireframe scene --}}
      <canvas id="hero-canvas" aria-hidden="true"></canvas>

      <nav class="p-nav" id="main-nav">
      <a href="#hero" class="p-nav__logo">// dev.portfolio</a>
      <ul class="p-nav__links">
      <li><a href="#about">About</a></li>
      <li><a href="#work">Work</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#contact">Contact</a></li>
      </ul>
      <button class="p-nav__burger" id="burger" aria-label="Toggle menu">
      <span></span><span></span><span></span>
      </button>
      </nav>

      <ul class="p-nav__drawer" id="drawer">
      <li><a href="#about"   class="drawer-link">About</a></li>
      <li><a href="#work"    class="drawer-link">Work</a></li>
      <li><a href="#skills"  class="drawer-link">Skills</a></li>
      <li><a href="#contact" class="drawer-link">Contact</a></li>
      </ul>

      <main>{{ $slot }}</main>

      <footer class="p-footer">
      <span>&copy; {{ date('Y') }} — Built with Laravel & Livewire</span>
      <span>Designed & Developed by <span style="color:var(--accent-2)">You</span></span>
      </footer>

      @livewireScripts

      <script>
      document.addEventListener('DOMContentLoaded', function () {
      // ── HAMBURGER
      const burger = document.getElementById('burger');
      const drawer = document.getElementById('drawer');

      // ── HERO ENTRANCE (GSAP)
      gsap.timeline({ defaults: { ease: 'power3.out' } })
      .to('.p-hero__status', { opacity: 1, y: 0, duration: 0.6 }, 0.1)
      .to('.p-hero__name',   { opacity: 1, y: 0, duration: 1.0 }, 0.2)
      .to('.p-hero__role',   { opacity: 1, y: 0, duration: 0.8 }, 0.5)
      .to('.p-hero__bottom', { opacity: 1, y: 0, duration: 0.8 }, 0.65)
      .to('.p-hero__scroll', { opacity: 1, y: 0, duration: 0.6 }, 0.9);

      burger.addEventListener('click', () => {
      burger.classList.toggle('open');
      drawer.classList.toggle('open');
      document.body.style.overflow = drawer.classList.contains('open') ? 'hidden' : '';
      });

      document.querySelectorAll('.drawer-link').forEach(link => {
      link.addEventListener('click', () => {
      burger.classList.remove('open');
      drawer.classList.remove('open');
      document.body.style.overflow = '';
      });
      });

      // ── SCROLL NAV (passive for perf)
      window.addEventListener('scroll', () => {
      document.getElementById('main-nav')
      .classList.toggle('scrolled', window.scrollY > 50);
      }, { passive: true });

      // ── ABOUT: text flies in from the left
      gsap.utils.toArray('#about .p-about > div:first-child > *').forEach((el, i) => {
      gsap.fromTo(el,
      { opacity: 0, x: -50 },
      {
      opacity: 1, x: 0, duration: 0.9, ease: 'power3.out', delay: i * 0.12,
      scrollTrigger: { trigger: '#about', start: 'top 75%' }
      }
      );
      });

      // ABOUT: stats fly in from the right, staggered
      gsap.utils.toArray('.p-stat').forEach((el, i) => {
      gsap.fromTo(el,
      { opacity: 0, x: 60 },
      {
      opacity: 1, x: 0, duration: 0.8, ease: 'power3.out', delay: i * 0.1,
      scrollTrigger: { trigger: '.p-stats', start: 'top 85%' }
      }
      );
      });

      // SKILLS: cards rise up with a slight bounce, staggered
      gsap.utils.toArray('.p-skill-card').forEach((el, i) => {
      gsap.fromTo(el,
      { opacity: 0, y: 80, scale: 0.92 },
      {
      opacity: 1, y: 0, scale: 1, duration: 0.9, ease: 'back.out(1.5)', delay: i * 0.12,
      scrollTrigger: { trigger: '.p-skills__grid', start: 'top 85%' }
      }
      );
      });

      // CONTACT: heading scales/fades in, then text + button rise up
      gsap.fromTo('.p-contact__heading',
      { opacity: 0, scale: 0.85 },
      {
      opacity: 1, scale: 1, duration: 1, ease: 'power3.out',
      scrollTrigger: { trigger: '.p-contact', start: 'top 70%' }
      }
      );
      gsap.utils.toArray('.p-contact__text, .btn-contact').forEach((el, i) => {
      gsap.fromTo(el,
      { opacity: 0, y: 40 },
      {
      opacity: 1, y: 0, duration: 0.8, ease: 'power3.out', delay: 0.2 + i * 0.15,
      scrollTrigger: { trigger: '.p-contact', start: 'top 65%' }
      }
      );
      });

      // ── WORK: horizontal scroll-pin
      const workPinWrap  = document.querySelector('.p-work__pin-wrap');
      const projectsTrack = document.querySelector('.p-projects');

      if (workPinWrap && projectsTrack) {
      const getScrollAmount = () => projectsTrack.scrollWidth - workPinWrap.offsetWidth;

      const pinTween = gsap.to(projectsTrack, {
      x: () => -getScrollAmount(),
      ease: 'none',
      scrollTrigger: {
      trigger: '#work',
      start: 'center center',
      end: () => '+=' + getScrollAmount(),
      scrub: 1,
      pin: true,
      invalidateOnRefresh: true,
      }
      });

      gsap.utils.toArray('.p-project').forEach(el => {
      gsap.fromTo(el,
      { opacity: 0.3, scale: 0.92 },
      {
      opacity: 1, scale: 1, ease: 'power2.out',
      scrollTrigger: {
      trigger: el,
      containerAnimation: pinTween,
      start: 'left 85%',
      end: 'left 40%',
      scrub: true,
      }
      }
      );
      });
      }

      // WORK: section-tag/heading still fade up normally
      gsap.utils.toArray('#work .reveal').forEach(el => {
      gsap.to(el, {
      opacity: 1, y: 0, duration: 0.9, ease: 'power3.out',
      scrollTrigger: { trigger: el, start: 'top 88%' }
      });
      });

      // ── THREE.JS WIREFRAME SCENE (runs on all devices)
      const canvas = document.getElementById('hero-canvas');
      const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
      renderer.setSize(window.innerWidth, window.innerHeight);
      renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

      const scene = new THREE.Scene();
      const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 100);
      camera.position.z = 6;

      const geometry = new THREE.IcosahedronGeometry(2.2, 1);
      const wireframe = new THREE.WireframeGeometry(geometry);
      const material = new THREE.LineBasicMaterial({
      color: 0x7c3aed,
      transparent: true,
      opacity: 0.5
      });
      const mesh = new THREE.LineSegments(wireframe, material);
      scene.add(mesh);

      const innerGeo = new THREE.IcosahedronGeometry(1.3, 0);
      const innerWire = new THREE.WireframeGeometry(innerGeo);
      const innerMat = new THREE.LineBasicMaterial({ color: 0x06b6d4, transparent: true, opacity: 0.35 });
      const innerMesh = new THREE.LineSegments(innerWire, innerMat);
      scene.add(innerMesh);

      let targetRotX = 0, targetRotY = 0;

      // Mouse-follow only on devices that actually have a mouse
      const isDesktop = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
      if (isDesktop) {
      document.addEventListener('mousemove', e => {
      const nx = (e.clientX / window.innerWidth) * 2 - 1;
      const ny = (e.clientY / window.innerHeight) * 2 - 1;
      targetRotY = nx * 0.6;
      targetRotX = ny * 0.4;
      });
      }

      function animate() {
      requestAnimationFrame(animate);

      mesh.rotation.y += (targetRotY - mesh.rotation.y) * 0.04 + 0.0015;
      mesh.rotation.x += (targetRotX - mesh.rotation.x) * 0.04 + 0.0008;

      innerMesh.rotation.y -= 0.002;
      innerMesh.rotation.x += 0.0012;

      renderer.render(scene, camera);
      }
      animate();

      window.addEventListener('resize', () => {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
      });

      // ── DESKTOP-ONLY: custom cursor
      if (!isDesktop) return;

      const dot  = document.getElementById('cursor-dot');
      const ring = document.getElementById('cursor-ring');
      let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

      document.addEventListener('mousemove', e => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      dot.style.left = mouseX + 'px';
      dot.style.top  = mouseY + 'px';
      });

      (function animateRing() {
      ringX += (mouseX - ringX) * 0.12;
      ringY += (mouseY - ringY) * 0.12;
      ring.style.left = ringX + 'px';
      ring.style.top  = ringY + 'px';
      requestAnimationFrame(animateRing);
      })();
      });
      </script>
      </body>
      </html>
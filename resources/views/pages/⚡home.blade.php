<?php

use Livewire\Component;

new class extends Component {
  public string $name = 'Omu Rabome Peters';
  public string $role = 'Full-Stack Laravel Developer';
  public string $bio = 'I build fast, scalable fintech & web platforms — from banking systems to virtual number marketplaces.';
  public string $email = 'rrabomee304@gmail.com';

  public array $stats = [
    ['3+',
      'Years of Laravel',
      'accent-2'],
    ['10+',
      'Projects Shipped',
      'accent-1'],
    ['5',
      'Fintech Platforms',
      'accent-1'],
    ['∞',
      'Lines of Code',
      'accent-2'],
  ];

  public array $projects = [
    [
      'name' => 'NumVault',
      'tag' => 'Fintech / SaaS',
      'desc' => 'Virtual phone number rental platform with 5SIM integration, Flutterwave wallet top-up, and NGN/USD exchange conversion.',
      'stack' => ['Laravel 13',
        'Livewire v4',
        'Tailwind',
        '5SIM API'],
      'year' => '2025',
    ],
    [
      'name' => 'Gold Line Bank',
      'tag' => 'Banking Platform',
      'desc' => 'Full-featured online banking app with dark-theme UI, concentric circle branding, KYC verification, and loan management.',
      'stack' => ['Laravel',
        'Livewire',
        'Alpine.js',
        'Tailwind'],
      'year' => '2025',
    ],
    [
      'name' => 'Finverse',
      'tag' => 'Trading Platform',
      'desc' => 'Multi-currency trading platform with TradingView charts, AI bot trading, Forex pip scaling, and real-time PnL.',
      'stack' => ['Laravel',
        'Livewire',
        'TradingView',
        'PostgreSQL'],
      'year' => '2024',
    ],
  ];

  public array $skills = [
    'Backend' => ['PHP',
      'Laravel',
      'Livewire v4',
      'REST APIs',
      'PostgreSQL',
      'MySQL'],
    'Frontend' => ['Tailwind CSS',
      'Alpine.js',
      'JavaScript',
      'HTML / CSS'],
    'DevOps' => ['Laravel Cloud',
      'Cloudflare R2',
      'Git',
      'Linux / Termux'],
    'Other' => ['Fintech APIs',
      'Payment Integration',
      'KYC Systems',
      'Bot Trading'],
  ];
};
?>

<div>

  {{-- ══════════════ HERO ══════════════ --}}
  <section class="p-hero" id="hero">
    <div class="p-hero__rule-h"></div>
    <div class="p-hero__rule-v"></div>
    <div class="p-hero__dot"></div>

    <div class="p-hero__status reveal">
      <span class="p-hero__status-dot"></span>
      Available for work
    </div>

    <h1 class="p-hero__name reveal">{{ $name }}</h1>
    <p class="p-hero__role reveal reveal-d1">
      {{ $role }}
    </p>

    <div class="p-hero__bottom reveal reveal-d2">
      <p class="p-hero__bio">
        {{ $bio }}
      </p>
      <div class="p-hero__cta">
        <a href="#work" class="btn-primary">
          View Work
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
        </a>
        <a href="#contact" class="btn-outline">Contact</a>
      </div>
    </div>

    <div class="p-hero__scroll reveal reveal-d4">
      <div class="p-hero__scroll-line"></div>
      Scroll
    </div>
  </section>


  {{-- ══════════════ ABOUT ══════════════ --}}
  <section class="p-section" id="about">
    <div class="p-about">
      <div>
        <div class="section-tag reveal">
          About Me
        </div>
        <h2 class="p-about__heading reveal reveal-d1">
          I Build<br>
          <span style="color:var(--accent-1)">Fintech</span><br>
          Experiences.
        </h2>
        <p class="p-about__text reveal reveal-d2">
          I'm a Laravel developer focused on building financial platforms, banking systems, and SaaS products that are fast, secure, and visually sharp. From database schema to pixel-perfect UI.
        </p>
        <p class="p-about__text reveal reveal-d3" style="margin-bottom:0">
          Currently studying Computer Science while shipping production-grade applications with Laravel 13, Livewire v4, and Tailwind CSS.
        </p>
      </div>

      <div class="p-stats reveal reveal-d2">
        @foreach($stats as $stat)
        <div class="p-stat">
          <div class="p-stat__num" style="color:var(--{{ $stat[2] }})">
            {{ $stat[0] }}
          </div>
          <div class="p-stat__label">
            {{ $stat[1] }}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>


  {{-- ══════════════ WORK ══════════════ --}}
  <section class="p-section p-work" id="work">
    <div class="section-tag reveal">
      Selected Work
    </div>
    <h2 class="p-work__heading reveal reveal-d1">Projects</h2>

    <div class="p-work__pin-wrap">
      <div class="p-projects">
        @foreach($projects as $i => $project)
        <div class="p-project">
          <span class="p-project__index">0{{ $i + 1 }}</span>
          <div>
            <div class="p-project__header">
              <h3 class="p-project__name">{{ $project['name'] }}</h3>
              <span class="p-project__tag">{{ $project['tag'] }}</span>
            </div>
            <p class="p-project__desc">
              {{ $project['desc'] }}
            </p>
            <div class="p-project__stack">
              @foreach($project['stack'] as $tech)
              <span class="p-project__tech">{{ $tech }}</span>
              @endforeach
            </div>
          </div>
          <div class="p-project__meta">
            <span class="p-project__year">{{ $project['year'] }}</span>
            <svg class="p-project__arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>


  {{-- ══════════════ SKILLS ══════════════ --}}
  <section class="p-section" id="skills">
    <div class="section-tag reveal">
      What I Use
    </div>
    <h2 class="p-skills__heading reveal reveal-d1">Skills</h2>

    <div class="p-skills__grid">
      @foreach($skills as $category => $items)
      <div class="p-skill-card reveal reveal-d{{ $loop->index + 1 }}">
        <div class="p-skill-card__cat" style="color:var(--{{ $loop->index % 2 === 0 ? 'accent-2' : 'accent-1' }})">
          {{ $category }}
        </div>
        <div class="p-skill-card__list">
          @foreach($items as $skill)
          <div class="p-skill-item">
            <span class="p-skill-dot" style="background:var(--{{ $loop->parent->index % 2 === 0 ? 'accent-2' : 'accent-1' }})"></span>
            {{ $skill }}
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </section>


  {{-- ══════════════ CONTACT ══════════════ --}}
  <section class="p-section p-contact" id="contact">
    <div class="section-tag reveal">
      Get In Touch
    </div>
    <h2 class="p-contact__heading reveal reveal-d1">
      Let's <span class="p-contact__outline">Build</span><br>Something.
    </h2>
    <p class="p-contact__text reveal reveal-d2">
      Have a project in mind or want to collaborate? I'm open to freelance work, full-time roles, and interesting builds.
    </p>
    <a href="mailto:{{ $email }}" class="btn-contact reveal reveal-d3">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
        <polyline points="22,6 12,13 2,6" />
      </svg>
      {{ $email }}
    </a>
  </section>

</div>
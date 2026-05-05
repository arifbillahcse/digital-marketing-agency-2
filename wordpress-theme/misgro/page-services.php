<?php
/**
 * Template Name: Services Page
 * Description: Services page — converted from services.html.
 *
 * Loads automatically for the WordPress page with slug "services".
 */
get_header();
?>

<!-- ════════ PAGE HERO ════════ -->
<section class="page-hero">
  <div class="page-hero-bg">
    <div class="ph-blob ph-b1"></div>
    <div class="ph-blob ph-b2"></div>
    <div class="ph-blob ph-b3"></div>
    <div class="ph-grid"></div>
    <div class="ph-line ph-line-1"></div>
    <div class="ph-line ph-line-2"></div>
  </div>

  <div class="ph-inner">

    <!-- ── LEFT: Text Content ── -->
    <div class="ph-content">
      <div class="breadcrumb">
        <a href="<?php echo esc_url( misgro_page_url( 'home' ) ); ?>">Home</a>
        <i class="fas fa-chevron-right"></i>
        <span style="color:#fff">Services</span>
      </div>

      <div class="ph-badge">
        <span class="ph-badge-dot"></span>
        Full-Service Digital Marketing
      </div>

      <h1 class="ph-title">
        Services That<br/><span class="grad-text">Grow Brands.</span>
      </h1>

      <p class="ph-sub">From organic search to paid ads, social media to email automation — MISGRO delivers data-driven strategies that turn clicks into customers and budgets into business growth.</p>

      <div class="ph-cta">
        <a href="#overview" class="btn btn-primary">Explore All Services <i class="fas fa-arrow-down"></i></a>
        <a href="#cta" class="btn-ghost" style="padding:10px 22px;font-size:.88rem"><i class="fas fa-calendar-check"></i> Book Free Audit</a>
      </div>

      <!-- Trust row -->
      <div class="ph-trust">
        <div class="ph-trust-avatars">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=68&h=68&q=85&auto=format&fit=crop&crop=faces" alt="Client"/>
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=68&h=68&q=85&auto=format&fit=crop&crop=faces" alt="Client"/>
          <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=68&h=68&q=85&auto=format&fit=crop&crop=faces" alt="Client"/>
          <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=68&h=68&q=85&auto=format&fit=crop&crop=faces" alt="Client"/>
        </div>
        <div class="ph-trust-text">
          <div class="ph-trust-stars">★★★★★</div>
          <div>Trusted by <strong>150+ businesses</strong> worldwide</div>
        </div>
      </div>
    </div>

    <!-- ── RIGHT: Dark Image Mosaic ── -->
    <div class="ph-visual">

      <!-- Glow orb between images -->
      <div class="ph-glow"></div>

      <!-- Main large image — dark analytics/dashboard theme -->
      <div class="ph-img-main">
        <div class="ph-img-tag"><span class="tag-dot" style="background:var(--c1)"></span> Analytics & Strategy</div>
        <img
          src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=900&h=700&q=90&auto=format&fit=crop&crop=center"
          alt="Data-driven marketing analytics dashboard"
          loading="eager"/>
      </div>

      <!-- Tall image — bottom right: dark workspace / campaign management -->
      <div class="ph-img-b">
        <div class="ph-img-tag"><span class="tag-dot" style="background:var(--c3)"></span> Paid Ads</div>
        <img
          src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=700&h=900&q=90&auto=format&fit=crop&crop=center"
          alt="Campaign management dark workspace"
          loading="eager"/>
      </div>

      <!-- Small image — bottom left: dark SEO / content work -->
      <div class="ph-img-s">
        <div class="ph-img-tag"><span class="tag-dot" style="background:#34D399"></span> SEO & Content</div>
        <img
          src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=700&h=400&q=90&auto=format&fit=crop&crop=center"
          alt="SEO content strategy dark environment"
          loading="eager"/>
      </div>

      <!-- Floating stat card 1 — top right -->
      <div class="ph-fc ph-fc-1">
        <div class="ph-fc-ico"><i class="fas fa-chart-line"></i></div>
        <div>
          <div class="ph-fc-val">+300%</div>
          <div class="ph-fc-lbl">Avg. Traffic Growth</div>
        </div>
      </div>

      <!-- Floating stat card 2 — left side -->
      <div class="ph-fc ph-fc-2">
        <div class="ph-fc-ico"><i class="fas fa-bullseye"></i></div>
        <div>
          <div class="ph-fc-val">6.2× ROAS</div>
          <div class="ph-fc-lbl">Return on Ad Spend</div>
        </div>
      </div>

      <!-- Floating stat card 3 — right side -->
      <div class="ph-fc ph-fc-3">
        <div class="ph-fc-ico"><i class="fas fa-star"></i></div>
        <div>
          <div class="ph-fc-val">4.9 / 5.0</div>
          <div class="ph-fc-lbl">Client Rating</div>
        </div>
      </div>

      <!-- Floating stat card 4 — bottom -->
      <div class="ph-fc ph-fc-4">
        <div class="ph-fc-ico"><i class="fas fa-users"></i></div>
        <div>
          <div class="ph-fc-val">150+ Clients</div>
          <div class="ph-fc-lbl">Across 20+ Industries</div>
        </div>
      </div>

    </div><!-- /ph-visual -->
  </div><!-- /ph-inner -->
</section>

<!-- Scrolling stats bar -->
<div class="stats-bar">
  <div class="stats-bar-track">
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-chart-line"></i></div><div><div class="sb-val">300%</div><div class="sb-lbl">Avg. Traffic Growth</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-bullseye"></i></div><div><div class="sb-val">6.2×</div><div class="sb-lbl">Average ROAS</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-users"></i></div><div><div class="sb-val">150+</div><div class="sb-lbl">Happy Clients</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-trophy"></i></div><div><div class="sb-val">$2M+</div><div class="sb-lbl">Ad Revenue Generated</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-star"></i></div><div><div class="sb-val">4.9★</div><div class="sb-lbl">Client Rating</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-clock"></i></div><div><div class="sb-val">8+ Yrs</div><div class="sb-lbl">Industry Experience</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-chart-line"></i></div><div><div class="sb-val">300%</div><div class="sb-lbl">Avg. Traffic Growth</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-bullseye"></i></div><div><div class="sb-val">6.2×</div><div class="sb-lbl">Average ROAS</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-users"></i></div><div><div class="sb-val">150+</div><div class="sb-lbl">Happy Clients</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-trophy"></i></div><div><div class="sb-val">$2M+</div><div class="sb-lbl">Ad Revenue Generated</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-star"></i></div><div><div class="sb-val">4.9★</div><div class="sb-lbl">Client Rating</div></div></div>
    <div class="sb-item"><div class="sb-icon"><i class="fas fa-clock"></i></div><div><div class="sb-val">8+ Yrs</div><div class="sb-lbl">Industry Experience</div></div></div>
  </div>
</div>

<!-- ════════ STICKY TABS ════════ -->
<div class="svc-tabs" id="svcTabs">
  <div class="svc-tabs-inner">
    <div class="svc-tab active" data-target="seo"><i class="fas fa-magnifying-glass-chart"></i> SEO</div>
    <div class="svc-tab" data-target="social-media"><i class="fas fa-hashtag"></i> Social Media</div>
    <div class="svc-tab" data-target="paid-ads"><i class="fas fa-bullseye"></i> Paid Ads</div>
    <div class="svc-tab" data-target="web-design"><i class="fas fa-code"></i> Web Design</div>
    <div class="svc-tab" data-target="content"><i class="fas fa-pen-nib"></i> Content</div>
    <div class="svc-tab" data-target="email"><i class="fas fa-envelope-open-text"></i> Email</div>
    <div class="svc-tab" data-target="branding"><i class="fas fa-palette"></i> Branding</div>
    <div class="svc-tab" data-target="analytics"><i class="fas fa-chart-pie"></i> Analytics</div>
  </div>
</div>

<!-- ════════ SERVICES OVERVIEW GRID ════════ -->
<section class="overview" id="overview">
  <div class="overview-head reveal">
    <div class="section-label"><i class="fas fa-bolt"></i> Our Services</div>
    <h2 class="section-title">Everything You Need to <span class="grad-text">Grow Online</span></h2>
    <p class="section-sub">Eight specialist service areas. One integrated growth strategy. Measurable results delivered every single month.</p>
  </div>
  <div class="overview-grid">
    <div class="ov-card reveal" onclick="document.getElementById('seo').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-magnifying-glass-chart"></i></div>
      <div class="ov-name">SEO</div>
      <div class="ov-blurb">Rank higher, get found faster, and drive organic traffic that converts.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('social-media').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-hashtag"></i></div>
      <div class="ov-name">Social Media Marketing</div>
      <div class="ov-blurb">Grow your brand and engage your audience across every social platform.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('paid-ads').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-bullseye"></i></div>
      <div class="ov-name">Paid Advertising</div>
      <div class="ov-blurb">Get instant traffic, leads, and sales with precision-targeted ad campaigns.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('web-design').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-code"></i></div>
      <div class="ov-name">Web Design &amp; Dev</div>
      <div class="ov-blurb">Modern, fast, and high-converting websites built to perform and scale.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('content').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-pen-nib"></i></div>
      <div class="ov-name">Content Marketing</div>
      <div class="ov-blurb">High-quality content that converts visitors into customers and builds authority.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('email').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-envelope-open-text"></i></div>
      <div class="ov-name">Email Marketing</div>
      <div class="ov-blurb">Turn leads into loyal customers with automated email campaigns and funnels.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('branding').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-palette"></i></div>
      <div class="ov-name">Branding &amp; Growth</div>
      <div class="ov-blurb">Build a strong brand and a scalable marketing funnel from the ground up.</div>
    </div>
    <div class="ov-card reveal" onclick="document.getElementById('analytics').scrollIntoView({behavior:'smooth',block:'start'})">
      <div class="ov-ico"><i class="fas fa-chart-pie"></i></div>
      <div class="ov-name">Analytics &amp; Reporting</div>
      <div class="ov-blurb">Track performance and make confident, data-driven decisions every month.</div>
    </div>
  </div>
</section>

<!-- ════════ SERVICE DEEP-DIVES ════════ -->

<!-- 1. SEO -->
<section class="svc-section" id="seo">
  <div class="svc-inner container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="SEO Optimization" style="filter:brightness(.8) contrast(1.05) saturate(.88)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=320&h=260&q=85&auto=format&fit=crop" alt="Analytics"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-arrow-trend-up"></i></div>
        <div><div class="sib-val grad-text">+312%</div><div class="sib-lbl">Organic Traffic</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">01 — Search Engine Optimization</div>
      <h2 class="svc-title">Rank at the Top.<br/><span class="grad-text">Stay There.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-fire"></i></div>
        <div class="sr-text">Clients average a <strong>312% increase</strong> in organic traffic within 6 months</div>
      </div>
      <p class="svc-desc">We build search strategies that go beyond keywords — combining technical excellence, authoritative content, and smart link building to give your site lasting dominance in Google's results.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Keyword Research</strong><div class="svc-del-sub">Intent mapping, competitor gap analysis, long-tail targeting, and search volume prioritisation</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>On-Page &amp; Technical SEO</strong><div class="svc-del-sub">Site speed, crawlability, indexing, Core Web Vitals, schema markup, and meta optimisation</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Off-Page SEO (Backlinks)</strong><div class="svc-del-sub">White-hat outreach, digital PR, HARO, guest posting, and authority link building campaigns</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>SEO Audit &amp; Reporting</strong><div class="svc-del-sub">Full technical audit, monthly rank tracking, competitor monitoring, and real-time dashboard</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Start SEO Campaign <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Free SEO Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- 2. Social Media Marketing -->
<section class="svc-section" id="social-media">
  <div class="svc-inner reverse container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Social Media Marketing" style="filter:brightness(.78) contrast(1.08) saturate(.85)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=320&h=260&q=85&auto=format&fit=crop" alt="Social media content"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-users"></i></div>
        <div><div class="sib-val grad-text">+410%</div><div class="sib-lbl">Avg. Reach Growth</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">02 — Social Media Marketing</div>
      <h2 class="svc-title">Grow Your Brand.<br/><span class="grad-text">Own Your Audience.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-hashtag"></i></div>
        <div class="sr-text">Clients see an average <strong>410% increase in social reach</strong> within the first 6 months</div>
      </div>
      <p class="svc-desc">Social media is where brands are built and communities are formed. We create and execute platform-native strategies across Facebook, Instagram, LinkedIn, and YouTube — combining content planning, community management, and data-driven optimisation to grow your audience and drive real business outcomes.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Facebook &amp; Instagram Marketing</strong><div class="svc-del-sub">Content strategy, creative production, posting cadence, Stories, Reels, and community engagement</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>LinkedIn Marketing</strong><div class="svc-del-sub">Thought leadership content, company page growth, and B2B audience development strategies</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>YouTube Marketing</strong><div class="svc-del-sub">Channel strategy, video SEO, content calendar, and subscriber growth optimisation</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Content Planning &amp; Management</strong><div class="svc-del-sub">Monthly content calendar, caption writing, hashtag strategy, and performance analytics reporting</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Grow My Social Presence <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Free Social Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- 3. Paid Advertising -->
<section class="svc-section" id="paid-ads">
  <div class="svc-inner container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1616469829941-c7200edec809?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Paid Advertising Management" style="filter:brightness(.78) contrast(1.08) saturate(.85)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=320&h=260&q=85&auto=format&fit=crop" alt="PPC dashboard"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-dollar-sign"></i></div>
        <div><div class="sib-val grad-text">6.2×</div><div class="sib-lbl">Avg. ROAS</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">03 — Paid Advertising (Ads Management)</div>
      <h2 class="svc-title">Instant Traffic.<br/><span class="grad-text">Maximum Return.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-rocket"></i></div>
        <div class="sr-text">Average client ROAS of <strong>6.2×</strong> across Google and Meta — budgets scaled from $1K to $50K/month</div>
      </div>
      <p class="svc-desc">Get in front of the right people at exactly the right moment — with ads that convert. We manage precision campaigns across Facebook, Instagram, and Google Search to Drive, Display, and YouTube, turning every dollar of ad spend into measurable leads and revenue.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Facebook &amp; Instagram Ads</strong><div class="svc-del-sub">Audience targeting, creative strategy, Advantage+ campaigns, and conversion-optimised ad sets</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Google Ads (Search, Display, YouTube)</strong><div class="svc-del-sub">Full campaign architecture across all Google channels with Smart Bidding and Performance Max</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Lead Generation Campaign</strong><div class="svc-del-sub">End-to-end lead gen funnels: ad creative, landing pages, form optimisation, and CRM integration</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Retargeting &amp; Optimisation</strong><div class="svc-del-sub">Multi-touch retargeting sequences, audience segmentation, and continuous weekly bid optimisation</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Launch Ad Campaign <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Free Ad Account Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- 4. Website Design & Development -->
<section class="svc-section" id="web-design">
  <div class="svc-inner reverse container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1547658719-da2b51169166?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Web Design &amp; Development" style="filter:brightness(.78) contrast(1.06) saturate(.88)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=320&h=260&q=85&auto=format&fit=crop" alt="Code editor dark"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-bolt"></i></div>
        <div><div class="sib-val grad-text">+67%</div><div class="sib-lbl">Conv. After Redesign</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">04 — Website Design &amp; Development</div>
      <h2 class="svc-title">Websites That<br/><span class="grad-text">Convert &amp; Scale.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-arrow-trend-up"></i></div>
        <div class="sr-text">Clients see an average <strong>+67% conversion improvement</strong> after a MISGRO website redesign</div>
      </div>
      <p class="svc-desc">A great-looking website that doesn't convert is just an expensive brochure. We design and build modern, fast websites that load in under 3 seconds, rank on Google, and turn visitors into customers — combining pixel-perfect design with technical performance and conversion-focused UX.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>WordPress Website Design</strong><div class="svc-del-sub">Custom theme development, Elementor Pro builds, and plugin optimisation for speed and security</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Landing Page Design</strong><div class="svc-del-sub">High-converting, single-purpose pages for campaigns, lead generation, and product launches</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>E-commerce Website Setup</strong><div class="svc-del-sub">WooCommerce and Shopify stores with full product catalogue, payment gateway, and checkout optimisation</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Speed &amp; Mobile Optimisation</strong><div class="svc-del-sub">Core Web Vitals compliance, image compression, CDN setup, and fully responsive mobile-first design</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Start Your Website <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">View Our Work</a>
      </div>
    </div>
  </div>
</section>

<!-- 5. Content Marketing -->
<section class="svc-section" id="content">
  <div class="svc-inner container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1455390582262-044cdead277a?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Content Marketing" style="filter:brightness(.76) contrast(1.08) saturate(.85)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=320&h=260&q=85&auto=format&fit=crop" alt="Content writing"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-pen-nib"></i></div>
        <div><div class="sib-val grad-text">3.2×</div><div class="sib-lbl">More Leads</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">05 — Content Marketing</div>
      <h2 class="svc-title">Content That<br/><span class="grad-text">Converts.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-pen-nib"></i></div>
        <div class="sr-text">Brands with a MISGRO content strategy generate <strong>3.2× more inbound leads</strong> within 6 months</div>
      </div>
      <p class="svc-desc">Content is the fuel that powers SEO, social, and email. We produce high-quality, strategically designed content that educates your audience, builds your authority, and turns organic visitors into paying customers — all while compounding in value every single month.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>SEO Content Writing</strong><div class="svc-del-sub">Long-form pillar pages and cluster content targeting high-intent keywords that drive qualified organic traffic</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Blog &amp; Article Writing</strong><div class="svc-del-sub">Consistent, research-backed blog content that builds topical authority and keeps your audience engaged</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Website Copywriting</strong><div class="svc-del-sub">Conversion-focused copy for homepages, service pages, and landing pages that compels visitors to act</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Content Strategy</strong><div class="svc-del-sub">Full content calendar, topic clustering, keyword mapping, competitor analysis, and editorial planning</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Build My Content Strategy <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Content Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- 6. Email Marketing & Automation -->
<section class="svc-section" id="email">
  <div class="svc-inner reverse container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1596526131083-e8c633c948d2?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Email Marketing &amp; Automation" style="filter:brightness(.78) contrast(1.08) saturate(.85)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=320&h=260&q=85&auto=format&fit=crop" alt="Email dashboard"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-envelope"></i></div>
        <div><div class="sib-val grad-text">4.2×</div><div class="sib-lbl">Email ROI</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">06 — Email Marketing &amp; Automation</div>
      <h2 class="svc-title">Leads In.<br/><span class="grad-text">Loyal Customers Out.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-envelope-open-text"></i></div>
        <div class="sr-text">Clients generate an average <strong>4.2× ROI</strong> on email — with 35% of total revenue running on autopilot</div>
      </div>
      <p class="svc-desc">Email is the highest-ROI marketing channel when done right. We build sophisticated automation systems that nurture leads, recover abandoned carts, re-engage lapsed customers, and generate consistent revenue — without you lifting a finger after setup.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Email Campaign Setup</strong><div class="svc-del-sub">Full campaign strategy, list segmentation, deliverability optimisation, and Klaviyo or Mailchimp setup</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Automation Funnel</strong><div class="svc-del-sub">Welcome, abandoned cart, post-purchase, win-back, and replenishment flows built to run autonomously</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Template Design</strong><div class="svc-del-sub">On-brand, mobile-optimised email templates with dark mode support and high deliverability formatting</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Newsletter Management</strong><div class="svc-del-sub">Weekly or monthly newsletter production, A/B testing, list hygiene, and open rate optimisation</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Set Up Email Automation <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Free Email Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- 7. Branding & Growth Strategy -->
<section class="svc-section" id="branding">
  <div class="svc-inner container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Branding &amp; Growth Strategy" style="filter:brightness(.76) contrast(1.08) saturate(.85)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=320&h=260&q=85&auto=format&fit=crop" alt="Brand strategy session"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-rocket"></i></div>
        <div><div class="sib-val grad-text">3.4×</div><div class="sib-lbl">Growth Rate</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">07 — Branding &amp; Growth Strategy</div>
      <h2 class="svc-title">Build the Brand.<br/><span class="grad-text">Scale the Business.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-chart-line"></i></div>
        <div class="sr-text">Clients with a defined brand strategy see <strong>3.4× faster revenue growth</strong> on average</div>
      </div>
      <p class="svc-desc">Marketing without a brand strategy is just noise. We help you build a clear, compelling brand identity then connect it to a full marketing funnel designed to attract, convert, and retain customers at scale — from audience research through to conversion rate optimisation.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Brand Strategy</strong><div class="svc-del-sub">Positioning, messaging framework, tone of voice, competitive differentiation, and full brand guidelines</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Audience Research</strong><div class="svc-del-sub">Deep customer persona development, buyer journey mapping, and market segmentation analysis</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Conversion Optimisation (CRO)</strong><div class="svc-del-sub">A/B testing, heatmap analysis, funnel audits, and UX improvements across all key conversion touchpoints</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Marketing Funnel Setup</strong><div class="svc-del-sub">Full-funnel architecture covering awareness, lead capture, nurture sequences, and retention campaigns</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Build My Brand Strategy <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Free Brand Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- 8. Analytics & Reporting -->
<section class="svc-section" id="analytics">
  <div class="svc-inner reverse container">
    <div class="svc-img-wrap reveal">
      <img class="svc-img-main" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&q=88&auto=format&fit=crop&crop=center" alt="Analytics &amp; Reporting" style="filter:brightness(.76) contrast(1.1) saturate(.85)"/>
      <img class="svc-img-accent" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=320&h=260&q=85&auto=format&fit=crop" alt="Data analytics"/>
      <div class="svc-img-badge">
        <div class="sib-icon"><i class="fas fa-chart-pie"></i></div>
        <div><div class="sib-val grad-text">100%</div><div class="sib-lbl">Data Visibility</div></div>
      </div>
    </div>
    <div class="svc-content reveal">
      <div class="svc-num">08 — Analytics &amp; Reporting</div>
      <h2 class="svc-title">See Everything.<br/><span class="grad-text">Decide Confidently.</span></h2>
      <div class="svc-result">
        <div class="sr-dot"><i class="fas fa-chart-bar"></i></div>
        <div class="sr-text">Clients with MISGRO analytics make <strong>decisions 4× faster</strong> with full-funnel data visibility</div>
      </div>
      <p class="svc-desc">You cannot optimise what you cannot measure. We set up and manage comprehensive analytics systems that give you complete, real-time visibility into every marketing touchpoint — from first click to closed customer — so every decision is backed by data, not guesswork.</p>
      <div class="svc-deliverables">
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Google Analytics Setup</strong><div class="svc-del-sub">GA4 implementation, event tracking, goal configuration, and cross-domain tracking setup</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Performance Tracking</strong><div class="svc-del-sub">Custom Looker Studio dashboards with real-time KPI monitoring across all channels and campaigns</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Monthly Reports</strong><div class="svc-del-sub">Plain-English performance summaries with trend analysis, wins, issues, and clear next-step recommendations</div></div></div>
        <div class="svc-del"><i class="fas fa-circle-check"></i><div><strong>Strategy Optimisation</strong><div class="svc-del-sub">Data-led monthly strategy reviews to reallocate budget, cut underperformers, and double down on winners</div></div></div>
      </div>
      <div class="svc-cta">
        <a href="#cta" class="btn btn-primary btn-lg">Set Up My Analytics <i class="fas fa-arrow-right"></i></a>
        <a href="#cta" class="btn btn-outline">Free Analytics Audit</a>
      </div>
    </div>
  </div>
</section>

<!-- ════════ PROCESS ════════ -->
<section class="process" id="process">
  <div class="container">
    <div class="process-head reveal">
      <div class="section-label"><i class="fas fa-sitemap"></i> How We Work</div>
      <h2 class="section-title">Our Proven 5-Step<br/><span class="grad-text">Growth Process</span></h2>
      <p class="section-sub">From first conversation to ongoing results — here's how we turn your marketing goals into measurable growth.</p>
    </div>
    <div class="process-steps">
      <div class="process-step reveal">
        <div class="ps-num"><i class="fas fa-magnifying-glass ps-icon"></i></div>
        <div class="ps-title">Discovery &amp; Audit</div>
        <div class="ps-desc">We analyse your current performance, competitors, audience, and goals to create a baseline and opportunity map.</div>
      </div>
      <div class="process-step reveal">
        <div class="ps-num"><i class="fas fa-compass-drafting ps-icon"></i></div>
        <div class="ps-title">Strategy Design</div>
        <div class="ps-desc">A custom, multi-channel strategy built around your specific goals, budget, and growth timeline — no templates.</div>
      </div>
      <div class="process-step reveal">
        <div class="ps-num"><i class="fas fa-rocket ps-icon"></i></div>
        <div class="ps-title">Launch &amp; Execute</div>
        <div class="ps-desc">Campaigns go live with precision — every element tested, tracked, and built to perform from day one.</div>
      </div>
      <div class="process-step reveal">
        <div class="ps-num"><i class="fas fa-flask ps-icon"></i></div>
        <div class="ps-title">Test &amp; Optimise</div>
        <div class="ps-desc">Continuous A/B testing, bid adjustments, content refinement, and audience expansion to compound results.</div>
      </div>
      <div class="process-step reveal">
        <div class="ps-num"><i class="fas fa-chart-line ps-icon"></i></div>
        <div class="ps-title">Report &amp; Scale</div>
        <div class="ps-desc">Transparent reporting every week. What's working gets scaled. What isn't gets fixed or cut — fast.</div>
      </div>
    </div>
  </div>
</section>

<!-- ════════ TOOLS ════════ -->
<section class="tools">
  <div class="container">
    <div class="tools-head reveal">
      <div class="section-label"><i class="fas fa-wrench"></i> Tools &amp; Tech</div>
      <h2 class="section-title">Industry-Leading<br/><span class="grad-text">Tools We Master</span></h2>
      <p class="section-sub">We're certified and proficient across the platforms and tools that drive real marketing results.</p>
    </div>
    <div class="tools-grid">
      <div class="tool-card reveal"><span class="tool-ico"><i class="fab fa-google" style="color:#4285F4;font-size:1.9rem"></i></span><div class="tool-name">Google Ads</div></div>
      <div class="tool-card reveal"><span class="tool-ico"><i class="fab fa-meta" style="color:#1877F2;font-size:1.9rem"></i></span><div class="tool-name">Meta Ads</div></div>
      <div class="tool-card reveal"><span class="tool-ico"><i class="fab fa-tiktok" style="color:#fff;font-size:1.9rem"></i></span><div class="tool-name">TikTok Ads</div></div>
      <div class="tool-card reveal"><span class="tool-ico"><i class="fab fa-linkedin" style="color:#0077B5;font-size:1.9rem"></i></span><div class="tool-name">LinkedIn Ads</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">📊</span><div class="tool-name">Google Analytics 4</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">🏷️</span><div class="tool-name">Tag Manager</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">🔥</span><div class="tool-name">Hotjar</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">📧</span><div class="tool-name">Klaviyo</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">🚀</span><div class="tool-name">SEMrush</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">🔗</span><div class="tool-name">Ahrefs</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">📈</span><div class="tool-name">Looker Studio</div></div>
      <div class="tool-card reveal"><span class="tool-ico" style="font-size:1.9rem">⚡</span><div class="tool-name">HubSpot</div></div>
    </div>
  </div>
</section>

<!-- ════════ CASE STUDIES ════════ -->
<section class="cases" id="cases">
  <div class="cases-head reveal">
    <div>
      <div class="section-label"><i class="fas fa-award"></i> Case Studies</div>
      <h2 class="section-title">Real Clients.<br/><span class="grad-text">Real Results.</span></h2>
    </div>
    <a href="<?php echo esc_url( misgro_page_url( 'portfolio' ) ); ?>" class="btn btn-outline">View All Case Studies <i class="fas fa-arrow-right"></i></a>
  </div>
  <div class="cases-grid">
    <div class="case-card reveal">
      <div class="case-img">
        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=700&h=440&q=88&auto=format&fit=crop&crop=center" alt="TechFlow SaaS" loading="lazy"/>
        <div class="case-img-ov"></div>
        <div class="case-industry">SaaS</div>
      </div>
      <div class="case-body">
        <div class="case-company">TechFlow SaaS</div>
        <div class="case-title">How SEO &amp; Content Strategy Tripled Organic Traffic in 5 Months</div>
        <div class="case-stats">
          <div class="case-stat"><div class="cs-val">+312%</div><div class="cs-lbl">Organic Traffic</div></div>
          <div class="case-stat"><div class="cs-val">$420K</div><div class="cs-lbl">Pipeline Generated</div></div>
        </div>
        <a href="#" class="case-link">Read Case Study <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
    <div class="case-card reveal">
      <div class="case-img">
        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=700&h=440&q=88&auto=format&fit=crop&crop=center" alt="EcoGear Store" loading="lazy"/>
        <div class="case-img-ov"></div>
        <div class="case-industry">E-Commerce</div>
      </div>
      <div class="case-body">
        <div class="case-company">EcoGear Store</div>
        <div class="case-title">Scaling Google Ads from $1K to $50K/Month While Maintaining 6.2× ROAS</div>
        <div class="case-stats">
          <div class="case-stat"><div class="cs-val">6.2×</div><div class="cs-lbl">ROAS Achieved</div></div>
          <div class="case-stat"><div class="cs-val">$1.2M</div><div class="cs-lbl">Revenue Driven</div></div>
        </div>
        <a href="#" class="case-link">Read Case Study <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
    <div class="case-card reveal">
      <div class="case-img">
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=700&h=440&q=88&auto=format&fit=crop&crop=center" alt="Wellness Brands" loading="lazy"/>
        <div class="case-img-ov"></div>
        <div class="case-industry">Health &amp; Wellness</div>
      </div>
      <div class="case-body">
        <div class="case-company">Wellness Brands Co.</div>
        <div class="case-title">40,000 Email Subscribers in 4 Months Through Content + Email Automation</div>
        <div class="case-stats">
          <div class="case-stat"><div class="cs-val">40K</div><div class="cs-lbl">New Subscribers</div></div>
          <div class="case-stat"><div class="cs-val">38%</div><div class="cs-lbl">Email Open Rate</div></div>
        </div>
        <a href="#" class="case-link">Read Case Study <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ════════ TESTIMONIALS ════════ -->
<section class="testi-strip">
  <div class="container">
    <div class="ts-head reveal">
      <div class="section-label"><i class="fas fa-heart"></i> Client Love</div>
      <h2 class="section-title">What Our Clients<br/><span class="grad-text">Say About Us</span></h2>
      <p class="section-sub">150+ businesses trust MISGRO to grow their marketing. Here's what they have to say.</p>
    </div>
    <div class="ts-grid">
      <div class="ts-card reveal">
        <div class="ts-quote">"</div>
        <div class="ts-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="ts-text">MISGRO's SEO strategy tripled our organic traffic in 5 months. The team is professional, data-focused, and genuinely invested in our growth. Best agency we've ever worked with.</p>
        <div class="ts-author">
          <div class="ts-avatar"><img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&q=85&auto=format&fit=crop&crop=faces" alt="Sarah Johnson"/></div>
          <div><div class="ts-name">Sarah Johnson</div><div class="ts-company">CEO, TechFlow SaaS</div></div>
        </div>
      </div>
      <div class="ts-card reveal">
        <div class="ts-quote">"</div>
        <div class="ts-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="ts-text">Our Google Ads ROAS went from 1.8× to 6.2× in 90 days. I've worked with 3 agencies before — MISGRO is the first that actually delivered. The reporting transparency is unmatched.</p>
        <div class="ts-author">
          <div class="ts-avatar"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&q=85&auto=format&fit=crop&crop=faces" alt="Marcus Rodriguez"/></div>
          <div><div class="ts-name">Marcus Rodriguez</div><div class="ts-company">Founder, EcoGear Store</div></div>
        </div>
      </div>
      <div class="ts-card reveal">
        <div class="ts-quote">"</div>
        <div class="ts-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="ts-text">The email automation flows MISGRO built now generate 35% of our monthly revenue on autopilot. Their content strategy doubled our social following in 3 months. Incredible ROI.</p>
        <div class="ts-author">
          <div class="ts-avatar"><img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&q=85&auto=format&fit=crop&crop=faces" alt="Amanda Lee"/></div>
          <div><div class="ts-name">Amanda Lee</div><div class="ts-company">CMO, Wellness Brands Co.</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════ CTA BANNER ════════ -->
<section class="cta-banner" id="cta">
  <div class="cta-inner reveal">
    <div class="cta-content">
      <div class="section-label" style="justify-content:center"><i class="fas fa-rocket"></i> Ready to Grow?</div>
      <h2 class="cta-title">Let's Build Your<br/><span class="grad-text">Custom Strategy</span></h2>
      <p class="cta-desc">Book a free 30-minute strategy session. No sales pitch. Just an honest look at what will work for your business and a clear roadmap to results.</p>
      <div class="cta-btns">
        <a href="<?php echo esc_url( misgro_page_url( 'home' ) ); ?>#contact" class="btn btn-primary btn-lg">Book Free Strategy Session <i class="fas fa-arrow-right"></i></a>
        <a href="tel:+12125550190" class="btn-ghost"><i class="fas fa-phone"></i> Call Us Now</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

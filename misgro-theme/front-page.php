<?php
/**
 * The front page template — homepage.
 *
 * @package Misgro
 */

get_header();
?>

<!-- ══════════════ HERO ══════════════ -->
<section class="hero" id="home">
	<div class="hero-bg">
		<div class="hero-blob blob-a"></div>
		<div class="hero-blob blob-b"></div>
		<div class="hero-blob blob-c"></div>
		<div class="hero-grid"></div>
	</div>

	<div class="hero-inner">
		<!-- Left -->
		<div class="hero-content">
			<div class="hero-badge"><span class="badge-pulse"></span><?php esc_html_e( '#1 Rated Digital Marketing Agency', 'misgro' ); ?></div>
			<h1 class="hero-title"><?php esc_html_e( 'Grow Your Business', 'misgro' ); ?><br/><?php esc_html_e( 'With', 'misgro' ); ?> <span class="grad-text"><?php esc_html_e( 'Data-Driven', 'misgro' ); ?></span><br/><?php esc_html_e( 'Digital Marketing', 'misgro' ); ?></h1>
			<p class="hero-desc"><?php esc_html_e( "We help ambitious brands scale faster with powerful SEO, precision-targeted ads, and high-converting marketing strategies. Results aren't a promise — they're our standard.", 'misgro' ); ?></p>
			<div class="hero-cta">
				<a href="#contact" class="btn btn-primary btn-lg"><?php esc_html_e( 'Get Free Consultation', 'misgro' ); ?> <i class="fas fa-arrow-right"></i></a>
				<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn-ghost"><i class="fas fa-circle-play"></i> <?php esc_html_e( 'View Services', 'misgro' ); ?></a>
			</div>
			<div class="hero-stats">
				<div><div class="hs-val">300%</div><div class="hs-lbl"><?php esc_html_e( 'Avg. Traffic Growth', 'misgro' ); ?></div></div>
				<div><div class="hs-val">$2M+</div><div class="hs-lbl"><?php esc_html_e( 'Ad Revenue Generated', 'misgro' ); ?></div></div>
				<div><div class="hs-val">150+</div><div class="hs-lbl"><?php esc_html_e( 'Happy Clients', 'misgro' ); ?></div></div>
			</div>
		</div>

		<!-- Right — animated visual -->
		<div class="hero-visual" id="heroVisual">

			<!-- Glowing circle with cycling images -->
			<div class="hv-wrap">
				<div class="hv-ring"></div>
				<div class="hv-circle">
					<!-- HD Unsplash images -->
					<img class="hv-img-slide active" id="hvi0"
						src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800&h=800&q=90&auto=format&fit=crop&crop=faces,center"
						alt="<?php esc_attr_e( 'Marketing Team at Work', 'misgro' ); ?>"/>
					<img class="hv-img-slide" id="hvi1"
						src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&h=800&q=90&auto=format&fit=crop&crop=faces,center"
						alt="<?php esc_attr_e( 'Strategy Session', 'misgro' ); ?>"/>
					<img class="hv-img-slide" id="hvi2"
						src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=800&q=90&auto=format&fit=crop&crop=faces,center"
						alt="<?php esc_attr_e( 'Creative Team', 'misgro' ); ?>"/>
				</div>
				<!-- Dots outside circle -->
				<div class="hv-dots">
					<button class="hv-dot active" data-img="0"></button>
					<button class="hv-dot" data-img="1"></button>
					<button class="hv-dot" data-img="2"></button>
				</div>
			</div>

			<!-- Typewriter card top-right -->
			<div class="hv-typewriter">
				<div class="hv-tw-badge"><span class="hv-tw-dot"></span><span class="hv-tw-title"><?php esc_html_e( 'Marketing Insight', 'misgro' ); ?></span></div>
				<div class="hv-tw-body" id="twText"><span class="hv-cursor"></span></div>
			</div>


			<!-- Keyword scroll card bottom-right -->
			<div class="hv-keywords">
				<div class="hv-kw-hd">🚀 <?php esc_html_e( 'What We Do', 'misgro' ); ?></div>
				<div class="hv-kw-track">
					<div class="hv-kw-item">BRANDING</div>
					<div class="hv-kw-item">MARKETING</div>
					<div class="hv-kw-item">STRATEGY</div>
					<div class="hv-kw-item">GROWTH</div>
					<div class="hv-kw-item">SEO &amp; ADS</div>
					<div class="hv-kw-item">CONTENT</div>
					<div class="hv-kw-item">ANALYTICS</div>
					<div class="hv-kw-item">BRANDING</div>
					<div class="hv-kw-item">MARKETING</div>
					<div class="hv-kw-item">STRATEGY</div>
					<div class="hv-kw-item">GROWTH</div>
					<div class="hv-kw-item">SEO &amp; ADS</div>
					<div class="hv-kw-item">CONTENT</div>
					<div class="hv-kw-item">ANALYTICS</div>
				</div>
			</div>

			<!-- Left floating stat -->
			<div class="hv-stat-l">
				<div class="hv-sl-val">150+</div>
				<div class="hv-sl-lbl"><?php esc_html_e( 'Happy Clients', 'misgro' ); ?></div>
			</div>

			<!-- Bottom-left rating -->
			<div class="hv-rating">
				<div class="hv-rt-stars">★★★★★</div>
				<div class="hv-rt-val">4.9 / 5.0</div>
				<div class="hv-rt-lbl"><?php esc_html_e( 'Client Rating', 'misgro' ); ?></div>
			</div>

		</div><!-- /hero-visual -->
	</div>
</section>

<!-- ══════════════ MARQUEE ══════════════ -->
<section class="clients">
	<p class="clients-lbl"><?php esc_html_e( 'Trusted by 150+ Brands Worldwide', 'misgro' ); ?></p>
	<div style="overflow:hidden">
		<div class="marquee-track">
			<div class="client-logo"><i class="fab fa-shopify"></i> Shopify</div>
			<div class="client-logo"><i class="fab fa-stripe-s"></i> Stripe</div>
			<div class="client-logo"><i class="fab fa-slack"></i> Slack</div>
			<div class="client-logo"><i class="fab fa-dropbox"></i> Dropbox</div>
			<div class="client-logo"><i class="fab fa-atlassian"></i> Atlassian</div>
			<div class="client-logo"><i class="fab fa-figma"></i> Figma</div>
			<div class="client-logo"><i class="fab fa-github"></i> GitHub</div>
			<div class="client-logo"><i class="fab fa-google"></i> Google</div>
			<div class="client-logo"><i class="fab fa-shopify"></i> Shopify</div>
			<div class="client-logo"><i class="fab fa-stripe-s"></i> Stripe</div>
			<div class="client-logo"><i class="fab fa-slack"></i> Slack</div>
			<div class="client-logo"><i class="fab fa-dropbox"></i> Dropbox</div>
			<div class="client-logo"><i class="fab fa-atlassian"></i> Atlassian</div>
			<div class="client-logo"><i class="fab fa-figma"></i> Figma</div>
			<div class="client-logo"><i class="fab fa-github"></i> GitHub</div>
			<div class="client-logo"><i class="fab fa-google"></i> Google</div>
		</div>
	</div>
</section>

<!-- ══════════════ SERVICES ══════════════ -->
<section class="services" id="services">
	<div class="container">
		<div class="services-head reveal">
			<div class="section-label"><i class="fas fa-bolt"></i> <?php esc_html_e( 'What We Do', 'misgro' ); ?></div>
			<h2 class="section-title"><?php esc_html_e( 'Marketing Services That', 'misgro' ); ?><br/><span class="grad-text"><?php esc_html_e( 'Actually Convert', 'misgro' ); ?></span></h2>
			<p class="section-sub"><?php esc_html_e( 'From visibility to conversion — every stage of your growth funnel covered with precision-crafted strategies.', 'misgro' ); ?></p>
		</div>
		<div class="services-grid">
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fas fa-magnifying-glass-chart"></i></div>
				<div class="sc-title"><?php esc_html_e( 'SEO Optimization', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'Dominate search rankings with technical SEO, content strategy, and authority-building that drives sustainable organic traffic.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fab fa-google"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Google Ads Management', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'Precision-targeted PPC campaigns with continuous optimization to maximize your ROAS and minimize wasted ad spend.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fab fa-meta"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Facebook & Instagram Ads', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'Data-driven social advertising that reaches your ideal customers at every stage of their buying journey.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fas fa-hashtag"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Social Media Marketing', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'Build a loyal community and amplify brand awareness through strategic content, engagement, and growth tactics.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fas fa-pen-nib"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Content Marketing', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'Compelling, SEO-optimized content that educates your audience, builds authority, and drives qualified leads.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fas fa-envelope-open-text"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Email Marketing', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'High-converting email sequences, automation flows, and personalized campaigns with industry-beating open rates.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fas fa-chart-line"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Conversion Rate Optimization', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( 'Turn more visitors into customers with data-backed A/B testing, UX improvements, and funnel optimization.', 'misgro' ); ?></div>
			</div>
			<div class="service-card reveal">
				<div class="sc-icon-wrap"><i class="fas fa-chart-pie"></i></div>
				<div class="sc-title"><?php esc_html_e( 'Analytics & Tracking', 'misgro' ); ?></div>
				<div class="sc-desc"><?php esc_html_e( "Full-funnel visibility with GA4, Tag Manager, and custom dashboards that reveal exactly what's working.", 'misgro' ); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════ WHY CHOOSE US ══════════════ -->
<section class="why" id="why">
	<div class="why-inner container">
		<div class="why-photo reveal">
			<img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?w=800&h=600&q=88&auto=format&fit=crop&crop=center"
				alt="<?php esc_attr_e( 'Our Marketing Team', 'misgro' ); ?>" loading="lazy"/>
			<div class="why-photo-badge">
				<div class="wpb-icon"><i class="fas fa-trophy"></i></div>
				<div>
					<div class="wpb-val"><?php esc_html_e( '8+ Years', 'misgro' ); ?></div>
					<div class="wpb-lbl"><?php esc_html_e( 'of Proven Results', 'misgro' ); ?></div>
				</div>
			</div>
		</div>
		<div class="why-content reveal">
			<div class="section-label"><i class="fas fa-star"></i> <?php esc_html_e( 'Why MISGRO', 'misgro' ); ?></div>
			<h2 class="section-title"><?php esc_html_e( 'More Than an Agency —', 'misgro' ); ?><br/><span class="grad-text"><?php esc_html_e( 'Your Growth Partner', 'misgro' ); ?></span></h2>
			<p class="section-sub"><?php esc_html_e( "We don't just run campaigns. We embed into your strategy, think like your co-founders, and obsess over your results.", 'misgro' ); ?></p>
			<div class="why-features">
				<div class="wf-item">
					<div class="wf-icon"><i class="fas fa-chart-line"></i></div>
					<div><div class="wf-title"><?php esc_html_e( 'Data-Driven Strategy', 'misgro' ); ?></div><div class="wf-desc"><?php esc_html_e( 'Every decision backed by real analytics. We track, test, and optimize continuously.', 'misgro' ); ?></div></div>
				</div>
				<div class="wf-item">
					<div class="wf-icon"><i class="fas fa-certificate"></i></div>
					<div><div class="wf-title"><?php esc_html_e( 'Certified Experts', 'misgro' ); ?></div><div class="wf-desc"><?php esc_html_e( 'Google, Meta, and HubSpot certified professionals with hands-on experience across every vertical.', 'misgro' ); ?></div></div>
				</div>
				<div class="wf-item">
					<div class="wf-icon"><i class="fas fa-bullseye"></i></div>
					<div><div class="wf-title"><?php esc_html_e( 'Proven ROI Campaigns', 'misgro' ); ?></div><div class="wf-desc"><?php esc_html_e( "We've consistently delivered 3–8× ROAS for clients across e-commerce, SaaS, and services.", 'misgro' ); ?></div></div>
				</div>
				<div class="wf-item">
					<div class="wf-icon"><i class="fas fa-magnifying-glass-chart"></i></div>
					<div><div class="wf-title"><?php esc_html_e( 'Transparent Reporting', 'misgro' ); ?></div><div class="wf-desc"><?php esc_html_e( 'Real-time dashboards, weekly updates, and monthly deep-dives. No hidden metrics, ever.', 'misgro' ); ?></div></div>
				</div>
				<div class="wf-item">
					<div class="wf-icon"><i class="fas fa-headset"></i></div>
					<div><div class="wf-title"><?php esc_html_e( 'Dedicated Account Manager', 'misgro' ); ?></div><div class="wf-desc"><?php esc_html_e( 'One point of contact who knows your business inside out — available 24/7.', 'misgro' ); ?></div></div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════ RESULTS ══════════════ -->
<section class="results" id="results">
	<div class="results-head container reveal">
		<div class="section-label"><i class="fas fa-trophy"></i> <?php esc_html_e( 'Our Results', 'misgro' ); ?></div>
		<h2 class="section-title"><?php esc_html_e( 'Numbers That', 'misgro' ); ?><br/><span class="grad-text"><?php esc_html_e( 'Tell Our Story', 'misgro' ); ?></span></h2>
		<p class="section-sub"><?php esc_html_e( 'Real metrics from real campaigns. Not projections — actual case study results.', 'misgro' ); ?></p>
	</div>
	<div class="counters-grid container reveal">
		<div class="counter-cell">
			<span class="counter-ico">📈</span>
			<div class="counter-val" data-target="300" data-suffix="%">0%</div>
			<div class="counter-lbl"><?php esc_html_e( 'Average Traffic Growth', 'misgro' ); ?></div>
		</div>
		<div class="counter-cell">
			<span class="counter-ico">🎯</span>
			<div class="counter-val" data-target="120" data-suffix="%">0%</div>
			<div class="counter-lbl"><?php esc_html_e( 'Lead Increase Rate', 'misgro' ); ?></div>
		</div>
		<div class="counter-cell">
			<span class="counter-ico">💰</span>
			<div class="counter-val" data-target="2" data-prefix="$" data-suffix="M+">$0M+</div>
			<div class="counter-lbl"><?php esc_html_e( 'Ad Revenue Generated', 'misgro' ); ?></div>
		</div>
		<div class="counter-cell">
			<span class="counter-ico">😊</span>
			<div class="counter-val" data-target="150" data-suffix="+">0+</div>
			<div class="counter-lbl"><?php esc_html_e( 'Happy Clients', 'misgro' ); ?></div>
		</div>
	</div>
</section>

<!-- ══════════════ TESTIMONIALS ══════════════ -->
<section class="testimonials" id="testimonials">
	<div class="testi-head container reveal">
		<div class="section-label"><i class="fas fa-heart"></i> <?php esc_html_e( 'Testimonials', 'misgro' ); ?></div>
		<h2 class="section-title"><?php esc_html_e( 'What Our Clients', 'misgro' ); ?><br/><span class="grad-text"><?php esc_html_e( 'Say About Us', 'misgro' ); ?></span></h2>
		<p class="section-sub"><?php esc_html_e( "Don't take our word for it. Here's what 150+ clients say about working with MISGRO.", 'misgro' ); ?></p>
	</div>
	<div class="testi-grid container">
		<div class="testi-card reveal">
			<div class="testi-quote-mark">"</div>
			<div class="testi-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
			<p class="testi-text"><?php esc_html_e( 'MISGRO completely transformed our online presence. Within 6 months, our organic traffic tripled and lead quality improved dramatically. The team is incredibly responsive and data-focused.', 'misgro' ); ?></p>
			<div class="testi-author">
				<div class="testi-avatar"><img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&q=85&auto=format&fit=crop&crop=faces" alt="Sarah Johnson" loading="lazy"/></div>
				<div><div class="testi-name">Sarah Johnson</div><div class="testi-company">CEO, TechFlow SaaS</div></div>
			</div>
		</div>
		<div class="testi-card reveal">
			<div class="testi-quote-mark">"</div>
			<div class="testi-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
			<p class="testi-text"><?php esc_html_e( "Our Google Ads ROAS went from 1.8× to 6.2× in just 90 days. The MISGRO team knows exactly what levers to pull. I've worked with 3 other agencies — none come close to this level of expertise.", 'misgro' ); ?></p>
			<div class="testi-author">
				<div class="testi-avatar"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&q=85&auto=format&fit=crop&crop=faces" alt="Marcus Rodriguez" loading="lazy"/></div>
				<div><div class="testi-name">Marcus Rodriguez</div><div class="testi-company">Founder, EcoGear Store</div></div>
			</div>
		</div>
		<div class="testi-card reveal">
			<div class="testi-quote-mark">"</div>
			<div class="testi-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
			<p class="testi-text"><?php esc_html_e( "Best investment we've made for our marketing. Transparent reporting, proactive communication, and results that actually move the needle. Our email list grew by 40K subscribers in 4 months.", 'misgro' ); ?></p>
			<div class="testi-author">
				<div class="testi-avatar"><img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&q=85&auto=format&fit=crop&crop=faces" alt="Amanda Lee" loading="lazy"/></div>
				<div><div class="testi-name">Amanda Lee</div><div class="testi-company">CMO, Wellness Brands Co.</div></div>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════ CTA BANNER ══════════════ -->
<section class="cta-banner">
	<div class="cta-inner reveal">
		<div class="cta-content">
			<div class="section-label" style="justify-content:center"><i class="fas fa-rocket"></i> <?php esc_html_e( "Let's Work Together", 'misgro' ); ?></div>
			<h2 class="cta-title"><?php esc_html_e( 'Ready to', 'misgro' ); ?> <span class="grad-text"><?php esc_html_e( 'Grow Your Business?', 'misgro' ); ?></span></h2>
			<p class="cta-desc"><?php esc_html_e( 'Get a free marketing strategy session today. No commitment. No fluff. Just actionable insights for your brand.', 'misgro' ); ?></p>
			<div class="cta-btns">
				<a href="#contact" class="btn btn-primary btn-lg"><?php esc_html_e( 'Get Free Strategy Session', 'misgro' ); ?> <i class="fas fa-arrow-right"></i></a>
				<a href="tel:+12125550190" class="btn-ghost"><i class="fas fa-phone"></i> <?php esc_html_e( 'Call Us Now', 'misgro' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════ FAQ ══════════════ -->
<section class="faq">
	<div class="faq-inner">
		<div class="faq-head reveal">
			<div class="section-label"><i class="fas fa-circle-question"></i> <?php esc_html_e( 'FAQ', 'misgro' ); ?></div>
			<h2 class="section-title"><?php esc_html_e( 'Frequently Asked', 'misgro' ); ?><br/><span class="grad-text"><?php esc_html_e( 'Questions', 'misgro' ); ?></span></h2>
			<p class="section-sub"><?php esc_html_e( 'Everything you need to know before getting started with MISGRO.', 'misgro' ); ?></p>
		</div>
		<div class="faq-list">
			<div class="faq-item">
				<div class="faq-q"><?php esc_html_e( 'How long before I see results from SEO?', 'misgro' ); ?><span class="faq-icon"><i class="fas fa-plus"></i></span></div>
				<div class="faq-a"><?php esc_html_e( 'Most clients see measurable improvements in organic traffic within 3–4 months. Significant ranking changes typically occur between months 4–6. SEO is a long-term investment — the results compound over time and, unlike paid ads, continue delivering after campaigns end.', 'misgro' ); ?></div>
			</div>
			<div class="faq-item">
				<div class="faq-q"><?php esc_html_e( 'Do you require a long-term contract?', 'misgro' ); ?><span class="faq-icon"><i class="fas fa-plus"></i></span></div>
				<div class="faq-a"><?php esc_html_e( 'No long-term contracts required. We work month-to-month. However, we recommend a minimum 3-month commitment for SEO and content marketing to see meaningful results. Paid advertising can show results much faster.', 'misgro' ); ?></div>
			</div>
			<div class="faq-item">
				<div class="faq-q"><?php esc_html_e( 'What industries do you specialise in?', 'misgro' ); ?><span class="faq-icon"><i class="fas fa-plus"></i></span></div>
				<div class="faq-a"><?php esc_html_e( "We have deep experience across e-commerce, SaaS, professional services, healthcare, real estate, and local businesses. Our data-driven approach adapts to any vertical — if there's an audience online, we know how to reach them.", 'misgro' ); ?></div>
			</div>
			<div class="faq-item">
				<div class="faq-q"><?php esc_html_e( 'How do you measure and report on results?', 'misgro' ); ?><span class="faq-icon"><i class="fas fa-plus"></i></span></div>
				<div class="faq-a"><?php esc_html_e( "Every client gets a real-time dashboard with full visibility into their campaigns, weekly automated reports, and a monthly deep-dive review with their dedicated account manager covering what worked, what didn't, and what's next.", 'misgro' ); ?></div>
			</div>
			<div class="faq-item">
				<div class="faq-q"><?php esc_html_e( 'What is the minimum ad budget you recommend?', 'misgro' ); ?><span class="faq-icon"><i class="fas fa-plus"></i></span></div>
				<div class="faq-a"><?php esc_html_e( 'For Google Ads we recommend a minimum of $2,000/month in ad spend. Facebook/Instagram can start at $1,000/month. These minimums ensure we have enough data to test, learn, and optimise your campaigns effectively.', 'misgro' ); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════ CONTACT ══════════════ -->
<section class="contact" id="contact">
	<div class="contact-inner container">
		<div class="contact-info reveal">
			<div class="section-label"><i class="fas fa-envelope"></i> <?php esc_html_e( 'Get In Touch', 'misgro' ); ?></div>
			<h2><?php esc_html_e( "Let's Start Your", 'misgro' ); ?><br/><span class="grad-text"><?php esc_html_e( 'Growth Journey', 'misgro' ); ?></span></h2>
			<p><?php esc_html_e( "Tell us about your business and goals. We'll come back with a custom strategy and a clear roadmap to results.", 'misgro' ); ?></p>
			<div class="contact-details">
				<div class="cd-item">
					<div class="cd-icon"><i class="fas fa-envelope"></i></div>
					<div><div class="cd-lbl"><?php esc_html_e( 'Email', 'misgro' ); ?></div><div class="cd-text"><a href="mailto:contact@misgro.com">contact@misgro.com</a></div></div>
				</div>
				<div class="cd-item">
					<div class="cd-icon"><i class="fas fa-phone"></i></div>
					<div><div class="cd-lbl"><?php esc_html_e( 'Phone', 'misgro' ); ?></div><div class="cd-text">+1 (212) 555-0190</div></div>
				</div>
			</div>
			<div class="social-links">
				<a href="#" class="social-link" aria-label="X / Twitter"><i class="fab fa-x-twitter"></i></a>
				<a href="#" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
				<a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
				<a href="#" class="social-link" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
			</div>
		</div>
		<div class="form-col reveal">
			<div id="formWrap">
				<div class="form-title"><?php esc_html_e( 'Send Us a Message', 'misgro' ); ?></div>
				<div class="form-sub"><?php esc_html_e( "We'll get back to you within one business day.", 'misgro' ); ?></div>
				<div class="form-body">
					<div class="field-row">
						<div class="field">
							<label><?php esc_html_e( 'Your Name', 'misgro' ); ?> <span>*</span></label>
							<input type="text" id="f-name" placeholder="John Smith" autocomplete="name"/>
							<div class="err-msg" id="err-name"><?php esc_html_e( 'Please enter your name.', 'misgro' ); ?></div>
						</div>
						<div class="field">
							<label><?php esc_html_e( 'Email Address', 'misgro' ); ?> <span>*</span></label>
							<input type="email" id="f-email" placeholder="john@company.com" autocomplete="email"/>
							<div class="err-msg" id="err-email"><?php esc_html_e( 'Please enter a valid email.', 'misgro' ); ?></div>
						</div>
					</div>
					<div class="field">
						<label><?php esc_html_e( 'Phone Number', 'misgro' ); ?></label>
						<input type="tel" id="f-phone" placeholder="+1 (212) 555-0190" autocomplete="tel"/>
					</div>
					<div class="field">
						<label><?php esc_html_e( 'Subject', 'misgro' ); ?> <span>*</span></label>
						<input type="text" id="f-subject" placeholder="<?php esc_attr_e( 'How can we help you?', 'misgro' ); ?>"/>
						<div class="err-msg" id="err-subject"><?php esc_html_e( 'Please enter a subject.', 'misgro' ); ?></div>
					</div>
					<div class="field">
						<label><?php esc_html_e( 'Message', 'misgro' ); ?> <span>*</span></label>
						<textarea id="f-message" placeholder="<?php esc_attr_e( 'Tell us about your project or enquiry...', 'misgro' ); ?>"></textarea>
						<div class="err-msg" id="err-message"><?php esc_html_e( 'Please enter your message.', 'misgro' ); ?></div>
					</div>
					<button class="submit-btn" id="submitBtn" onclick="handleSubmit()">
						<span id="btn-text"><?php esc_html_e( 'Send Message', 'misgro' ); ?></span>
						<i class="fas fa-paper-plane" id="btn-ico"></i>
						<div class="btn-spinner" id="btn-spin"></div>
					</button>
				</div>
			</div>
			<div class="form-success" id="formSuccess">
				<div class="success-ico"><i class="fas fa-check"></i></div>
				<div class="success-title"><?php esc_html_e( 'Message Sent!', 'misgro' ); ?></div>
				<p class="success-sub"><?php esc_html_e( "Thanks for reaching out. We'll get back to you within one business day.", 'misgro' ); ?></p>
				<div class="success-back" onclick="resetForm()"><i class="fas fa-arrow-left"></i> <?php esc_html_e( 'Send Another Message', 'misgro' ); ?></div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();

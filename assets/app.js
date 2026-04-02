/* ── Navbar scroll ───────────────────────────────────────── */
(function(){
  var nav = document.getElementById('nav') || document.getElementById('navbar');
  if(!nav) return;
  var cls = nav.id === 'navbar' ? 'scrolled' : 'sc';
  window.addEventListener('scroll', function(){ nav.classList.toggle(cls, window.scrollY > 60); });
})();

/* ── Back to top ─────────────────────────────────────────── */
(function(){
  var bt = document.getElementById('bt') || document.getElementById('backTop') || document.querySelector('.back-top');
  if(!bt) return;
  var toggleClass = (bt.id === 'bt') ? 'on' : 'visible';
  window.addEventListener('scroll', function(){ bt.classList.toggle(toggleClass, window.scrollY > 400); });
  bt.addEventListener('click', function(e){ e.preventDefault(); window.scrollTo({top:0, behavior:'smooth'}); });
})();

/* ── Hamburger / mobile menu ─────────────────────────────── */
var _hbg = document.getElementById('hbg') || document.getElementById('hamburger');
var _mob = document.getElementById('mob') || document.getElementById('mobileMenu');
var _mclose = document.getElementById('mclose') || document.getElementById('mobileClose');
if(_hbg && _mob){
  _hbg.addEventListener('click', function(){ _mob.classList.add('open'); document.body.style.overflow = 'hidden'; });
}
if(_mclose){ _mclose.addEventListener('click', closeMob); }
function closeMob(){ if(_mob){ _mob.classList.remove('open'); document.body.style.overflow = ''; } }

/* ── Smooth scroll ───────────────────────────────────────── */
document.querySelectorAll('a[href^="#"]').forEach(function(a){
  a.addEventListener('click', function(e){
    var id = a.getAttribute('href');
    if(id === '#') return;
    var t = document.querySelector(id);
    if(t){ e.preventDefault(); window.scrollTo({top: t.offsetTop - 80, behavior: 'smooth'}); }
  });
});

/* ── Scroll reveal (.rv + .on) ───────────────────────────── */
(function(){
  var els = document.querySelectorAll('.rv');
  if(!els.length) return;
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(en.isIntersecting){
        var sibs = Array.from(en.target.parentElement.children).filter(function(c){ return c.classList.contains('rv'); });
        var idx = sibs.indexOf(en.target);
        setTimeout(function(){ en.target.classList.add('on'); }, idx * 85);
        obs.unobserve(en.target);
      }
    });
  }, {threshold: 0.1, rootMargin: '0px 0px -40px 0px'});
  els.forEach(function(el){ obs.observe(el); });
})();

/* ── Scroll reveal (.reveal + .visible) ─────────────────── */
(function(){
  var els = document.querySelectorAll('.reveal');
  if(!els.length) return;
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(en.isIntersecting){
        var sibs = Array.from(en.target.parentElement.children).filter(function(c){ return c.classList.contains('reveal'); });
        var idx = sibs.indexOf(en.target);
        setTimeout(function(){ en.target.classList.add('visible'); }, idx * 80);
        obs.unobserve(en.target);
      }
    });
  }, {threshold: 0.1, rootMargin: '0px 0px -40px 0px'});
  els.forEach(function(el){ obs.observe(el); });
})();

/* ── Animated counters (data-to) ─────────────────────────── */
(function(){
  function animCount(el){
    var tgt = parseInt(el.dataset.to), px = el.dataset.px || '', sx = el.dataset.sx || '';
    var step = tgt / (2200 / 16), c = 0;
    var timer = setInterval(function(){
      c += step;
      if(c >= tgt){ c = tgt; clearInterval(timer); }
      el.textContent = px + Math.floor(c) + sx;
    }, 16);
  }
  var grid = document.querySelector('.sgrid') || document.querySelector('.stats-grid') || document.querySelector('.rb-grid');
  if(!grid) return;
  var counted = false;
  new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(en.isIntersecting && !counted){ counted = true; en.target.querySelectorAll('[data-to]').forEach(animCount); }
    });
  }, {threshold: 0.3}).observe(grid);
})();

/* ── Animated counters (data-target) ────────────────────── */
(function(){
  function animCount(el){
    var tgt = parseInt(el.dataset.target), px = el.dataset.prefix || '', sx = el.dataset.suffix || '';
    var step = tgt / (2200 / 16), c = 0;
    var timer = setInterval(function(){
      c += step;
      if(c >= tgt){ c = tgt; clearInterval(timer); }
      el.textContent = px + Math.floor(c) + sx;
    }, 16);
  }
  var cg = document.querySelector('.counters-grid');
  if(!cg) return;
  var counted = false;
  new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(en.isIntersecting && !counted){ counted = true; en.target.querySelectorAll('[data-target]').forEach(animCount); }
    });
  }, {threshold: 0.3}).observe(cg);
})();
/* ── Hero image carousel ─────────────────────────────────── */
var slides = document.querySelectorAll('.hv-img-slide'), dots = document.querySelectorAll('.hv-dot');
var curSlide = 0;
function goSlide(n){
  if(!slides.length) return;
  slides[curSlide].classList.remove('active');
  if(dots[curSlide]) dots[curSlide].classList.remove('active');
  curSlide = (n + slides.length) % slides.length;
  slides[curSlide].classList.add('active');
  if(dots[curSlide]) dots[curSlide].classList.add('active');
}
if(slides.length){ slides[0].classList.add('active'); if(dots[0]) dots[0].classList.add('active'); }
dots.forEach(function(d, i){ d.addEventListener('click', function(){ goSlide(i); }); });
setInterval(function(){ goSlide(curSlide + 1); }, 5000);

/* ── Typewriter ──────────────────────────────────────────── */
var twEl = document.querySelector('.hv-tw-body');
var tips = ['Clients averaging +312% organic traffic growth','6.2× ROAS across Google and Meta campaigns','98% client retention — results, not contracts','From $1K to $50K ad budget at 7.8× ROAS','150+ brands grown across 12 countries'];
var tIdx = 0, cIdx = 0, typing = true;
function tw(){
  if(!twEl) return;
  var full = tips[tIdx];
  if(typing){
    cIdx++;
    twEl.innerHTML = full.slice(0, cIdx) + '<span class="hv-cursor"></span>';
    if(cIdx === full.length){ typing = false; setTimeout(tw, 2200); return; }
    setTimeout(tw, 38);
  } else {
    cIdx--;
    twEl.innerHTML = full.slice(0, cIdx) + '<span class="hv-cursor"></span>';
    if(cIdx === 0){ typing = true; tIdx = (tIdx + 1) % tips.length; setTimeout(tw, 400); return; }
    setTimeout(tw, 18);
  }
}
setTimeout(tw, 1000);

/* ── Social icons cascade ────────────────────────────────── */
var scIcons = document.querySelectorAll('.hv-sc');
function showSocials(){ scIcons.forEach(function(s){ s.classList.add('visible'); }); }
function hideSocials(){ scIcons.forEach(function(s){ s.classList.remove('visible'); }); }
if(scIcons.length){ showSocials(); setInterval(function(){ hideSocials(); setTimeout(showSocials, 500); }, 4000); }

/* ── FAQ accordion ───────────────────────────────────────── */
document.querySelectorAll('.faq-q').forEach(function(q){
  q.addEventListener('click', function(){
    var item = q.parentElement;
    var open = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(function(fi){ fi.classList.remove('open'); });
    if(!open) item.classList.add('open');
  });
});

/* ── Budget pills ────────────────────────────────────────── */
document.querySelectorAll('.budget-pill').forEach(function(pill){
  pill.addEventListener('click', function(){
    document.querySelectorAll('.budget-pill').forEach(function(p){ p.classList.remove('sel'); });
    pill.classList.add('sel');
  });
});

/* ── FAQ accordion ───────────────────────────────────────── */
function toggleFaq(btn){
  var item = btn.parentElement;
  var isOpen = item.classList.contains('open');
  document.querySelectorAll('.faq-item').forEach(function(fi){ fi.classList.remove('open'); });
  if(!isOpen) item.classList.add('open');
}

/* ── Form validation helpers ─────────────────────────────── */
function validateEmail(e){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e); }
function showErr(id, show){ var el = document.getElementById(id); if(el){ el.classList[show ? 'add' : 'remove']('show'); } }
function setErr(fieldId, errId, show){
  var inp = document.getElementById(fieldId); if(inp){ inp.classList[show ? 'add' : 'remove']('error'); }
  showErr(errId, show);
}

/* ── Handle submit ───────────────────────────────────────── */
function handleSubmit(){
  var name = document.getElementById('f-name').value.trim();
  var email = document.getElementById('f-email').value.trim();
  var subject = document.getElementById('f-subject').value.trim();
  var message = document.getElementById('f-message').value.trim();
  var valid = true;
  setErr('f-name', 'err-name', !name); if(!name) valid = false;
  setErr('f-email', 'err-email', !validateEmail(email)); if(!validateEmail(email)) valid = false;
  setErr('f-subject', 'err-subject', !subject); if(!subject) valid = false;
  setErr('f-message', 'err-message', message.length < 5); if(message.length < 5) valid = false;
  if(!valid) return;
  var btn = document.getElementById('submitBtn');
  var txt = document.getElementById('btn-text');
  var ico = document.getElementById('btn-ico');
  var spin = document.getElementById('btn-spin');
  btn.disabled = true; txt.textContent = 'Sending...'; ico.style.display = 'none'; spin.style.display = 'block';
  var phone = document.getElementById('f-phone');
  fetch('send_mail.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: new URLSearchParams({
      name: name,
      email: email,
      phone: phone ? phone.value.trim() : '',
      subject: subject,
      message: message
    })
  })
  .then(function(r){ return r.json(); })
  .then(function(){
    document.getElementById('formWrap').style.display = 'none';
    document.getElementById('formSuccess').style.display = 'block';
  })
  .catch(function(){
    btn.disabled = false; txt.textContent = 'Send Message'; ico.style.display = ''; spin.style.display = 'none';
    alert('Something went wrong. Please try again.');
  });
}

/* ── Reset form ──────────────────────────────────────────── */
function resetForm(){
  ['f-name','f-email','f-phone','f-subject','f-message'].forEach(function(id){
    var el = document.getElementById(id); if(el) el.value = '';
  });
  var btn = document.getElementById('submitBtn'); if(btn) btn.disabled = false;
  var txt = document.getElementById('btn-text'); if(txt) txt.textContent = 'Send Message';
  var ico = document.getElementById('btn-ico'); if(ico) ico.style.display = '';
  var spin = document.getElementById('btn-spin'); if(spin) spin.style.display = 'none';
  document.getElementById('formWrap').style.display = '';
  document.getElementById('formSuccess').style.display = 'none';
  ['err-name','err-email','err-subject','err-message'].forEach(function(id){ showErr(id, false); });
  ['f-name','f-email','f-subject','f-message'].forEach(function(id){
    var el = document.getElementById(id); if(el) el.classList.remove('error');
  });
}

/* ── Clear errors on input ───────────────────────────────── */
['f-name','f-email','f-subject','f-message'].forEach(function(id){
  var el = document.getElementById(id);
  if(el){
    el.addEventListener('input', function(){
      el.classList.remove('error');
      showErr('err-' + id.replace('f-', ''), false);
    });
  }
});
/* ── Case studies, modal, filter tabs ───────────────────── */
/* Case study data */
var cases = {
  techflow:{img:"https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=900&h=500&q=88&auto=format&fit=crop",ind:"SaaS / B2B Technology",ind_ico:"fas fa-laptop-code",title:"TechFlow SaaS: 312% Traffic Growth and $2.4M Pipeline in 9 Months",desc:"TechFlow had near-zero organic search presence. In 9 months our technical SEO overhaul, content cluster strategy, and authority link building transformed their search presence into their #1 revenue channel.",metrics:[{v:"+312%",l:"Organic Traffic"},{v:"$2.4M",l:"Pipeline Generated"},{v:"47",l:"Keywords at #1"},{v:"9 Mo.",l:"Time to Results"}],what:["Full technical SEO audit identifying 340 crawl errors and Core Web Vitals failures","Rebuilt site architecture with a 3-tier pillar-cluster content model across 8 topic clusters","Produced 64 long-form content pieces targeting commercial-intent keywords","6-month white-hat link building campaign earning 180+ referring domains","Full GA4 attribution with custom pipeline tracking tied to closed revenue"],results:["Organic traffic grew from 8,200 to 33,800 monthly sessions (+312%)","47 target keywords moved to position #1 on Google","Organic became the #1 revenue channel, surpassing paid ads","$2.4M in attributed pipeline directly traceable to organic content","Featured in Clutch's Best SEO Campaign 2024"],tags:["Technical SEO","Content Strategy","Link Building","GA4","Schema"],client_img:"https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Sarah Johnson",client_co:"CEO, TechFlow SaaS"},
  ecogear:{img:"https://images.unsplash.com/photo-1616469829941-c7200edec809?w=900&h=500&q=88&auto=format&fit=crop",ind:"E-Commerce / Retail",ind_ico:"fas fa-cart-shopping",title:"EcoGear: $1K to $50K Monthly Budget at 7.8x ROAS With Google Ads",desc:"EcoGear's in-house campaigns had no structure and a rough 2.1x ROAS. We rebuilt everything from scratch and scaled to $50K/month while improving ROAS to 7.8x.",metrics:[{v:"7.8x",l:"ROAS"},{v:"+340%",l:"Revenue"},{v:"$1K to $50K",l:"Budget Scaled"},{v:"-28%",l:"Cost/Conv."}],what:["Rebuilt campaign architecture with 6 campaign types","Implemented Smart Bidding with 90-day conversion window","Created 12 audience segments from CRM data","Launched Performance Max with 40+ creative variants","Merchant Center feed optimisation with margin-based bidding"],results:["ROAS improved from 2.1x to 7.8x","Budget scaled from $1K to $50K — a 50x increase","Revenue grew +340% in 12 months","Cost per conversion reduced 28%","Google Ads became the #1 customer acquisition channel"],tags:["Google Ads","Shopping","Performance Max","Smart Bidding"],client_img:"https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Marcus Rodriguez",client_co:"Founder, EcoGear Store"},
  wellness:{img:"https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=900&h=500&q=88&auto=format&fit=crop",ind:"Health & Wellness",ind_ico:"fas fa-heart-pulse",title:"Wellness Brands: 35% of Total Revenue from Email Automation",desc:"An 80,000-subscriber email list generating almost nothing. We rebuilt the entire email programme turning a dormant list into a revenue engine running on autopilot.",metrics:[{v:"+189%",l:"Email Revenue"},{v:"35%",l:"Of Total Revenue"},{v:"48%",l:"Open Rate"},{v:"4.2x",l:"Email ROI"}],what:["Audited existing Klaviyo account and identified 14 broken sequences","Built 9 new automation flows including Welcome, Cart, Win-Back, VIP","Implemented segmentation across 22 segments","Designed 6 branded email templates optimised for mobile and dark mode","Set up predictive analytics for churn prediction"],results:["Email revenue grew +189% in 6 months","Email now accounts for 35% of total monthly revenue","Average open rate grew from 12% to 48%","Abandoned cart recovery rate of 22% vs 8% industry average","Email programme now generates revenue 24/7 autonomously"],tags:["Klaviyo","Email Flows","Segmentation","A/B Testing"],client_img:"https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Amanda Lee",client_co:"CMO, Wellness Brands Co."},
  lexgroup:{img:"https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=900&h=500&q=88&auto=format&fit=crop",ind:"Legal Services",ind_ico:"fas fa-scale-balanced",title:"LexGroup Law: 240% More Qualified Leads at 60% Lower Cost Per Lead",desc:"LexGroup was paying $420 per lead from generic directories. We moved them to Meta with hyper-local targeting and drove CPL down to $68 while tripling conversion rates.",metrics:[{v:"+240%",l:"Leads/Month"},{v:"-60%",l:"Cost Per Lead"},{v:"5.1x",l:"ROAS"},{v:"24%",l:"Consultation Rate"}],what:["Mapped 8 case types and built separate ad sets with tailored creative","Created a 3-step Meta lead qualification funnel","Built 12 hyper-local audience segments","Produced 24 case-type specific video ads","Implemented Meta CAPI with offline event matching"],results:["Monthly leads grew +240% within 4 months","Cost per lead dropped from $420 to $68","Consultation-to-client rate improved from 8% to 24%","ROAS reached 5.1x on closed case value","Expanded to two additional locations within 8 months"],tags:["Meta Ads","Lead Generation","Video","CAPI","Local"],client_img:"https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Robert Chen",client_co:"Partner, LexGroup Law"},
  fitlife:{img:"https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=900&h=500&q=88&auto=format&fit=crop",ind:"Health & Fitness App",ind_ico:"fas fa-dumbbell",title:"FitLife App: 410% Social Reach and 22K Downloads Without Paid Ads",desc:"FitLife had great retention but zero organic reach. We built a creator-led content engine across Instagram and TikTok driving 22K organic downloads in 6 months.",metrics:[{v:"+410%",l:"Social Reach"},{v:"22K",l:"Downloads"},{v:"-72%",l:"Acquisition Cost"},{v:"3.8M",l:"Impressions"}],what:["Developed brand content playbook with 6 content pillars","Built a micro-influencer UGC programme with 28 creators","Created short-form video template library with 18 formats","Launched #FitLifeChallenge generating 1.2M organic impressions","Implemented UTM tracking and App Store attribution"],results:["Instagram reach grew +410%; TikTok reached 140K followers from zero","22,000 organic app downloads attributed to social content","User acquisition cost dropped 72%","3.8 million total organic impressions in 6 months","14 pieces of earned media coverage from viral moments"],tags:["Instagram","TikTok","UGC","Content Strategy","Attribution"],client_img:"https://images.unsplash.com/photo-1580489944761-15a19d654956?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Sara Kim",client_co:"Head of Growth, FitLife App"},
  luxe:{img:"https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=900&h=500&q=88&auto=format&fit=crop",ind:"Fashion & Retail",ind_ico:"fas fa-shirt",title:"Luxe Fashion: 89% Conversion Lift and $600K Added Revenue via CRO",desc:"High traffic, low conversions. We ran 14 structured A/B tests over 90 days stacking improvements into an 89% overall conversion lift and $600K incremental revenue.",metrics:[{v:"+89%",l:"Conv. Rate"},{v:"$600K",l:"Added Revenue"},{v:"14",l:"A/B Tests"},{v:"-34%",l:"Cart Abandonment"}],what:["Full CRO audit using heatmaps, session recordings, and funnel analysis","Tested 4 product page layouts","Rebuilt checkout from 4 steps to 2 with guest checkout","A/B tested 6 cart abandonment email subject lines","Implemented dynamic social proof across all product pages"],results:["Conversion rate grew from 0.9% to 1.7% — an 89% lift","Cart abandonment reduced from 78% to 52%","$600K in incremental annual revenue without extra traffic","Best test: simplified checkout increased completions 44%","11 of 14 tests produced positive results"],tags:["CRO","A/B Testing","UX","Checkout","Heatmaps"],client_img:"https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Isabelle Dupont",client_co:"CEO, Luxe Fashion"},
  healthfirst:{img:"https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=900&h=500&q=88&auto=format&fit=crop",ind:"Healthcare / Local SEO",ind_ico:"fas fa-hospital",title:"HealthFirst: 278% More Appointments Through Local SEO",desc:"A multi-location clinic competing against hospital networks. Our local SEO strategy helped each of 8 locations rank in the top 3 for their core service keywords.",metrics:[{v:"+278%",l:"Appointments"},{v:"8/8",l:"Locations at #1"},{v:"+195%",l:"Organic Traffic"},{v:"-41%",l:"Cost/Booking"}],what:["Audited all 8 Google Business Profiles and resolved 140+ NAP inconsistencies","Built 8 location-specific content hubs with 180 pages total","Implemented medical schema markup across the full site","Local link building targeting medical associations and local news","Monthly GBP optimisation across all 8 locations"],results:["All 8 locations rank top 3 for primary keywords","Appointments grew +278% year-over-year","Organic traffic increased +195%","Cost per booking reduced 41%","HealthFirst expanded to 2 new locations citing organic demand"],tags:["Local SEO","Google Business Profile","Medical Schema","Content"],client_img:"https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Dr. Sarah Thompson",client_co:"Director, HealthFirst Clinic"},
  apex:{img:"https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=900&h=500&q=88&auto=format&fit=crop",ind:"Financial Services",ind_ico:"fas fa-chart-pie",title:"Apex Finance: 44% Lower CPL and $1.8M Closed Deals From Google",desc:"Paying $280 per lead with no revenue attribution. We restructured campaigns, added offline conversion tracking, and delivered $1.8M in closed deals.",metrics:[{v:"-44%",l:"Cost Per Lead"},{v:"$1.8M",l:"Closed Revenue"},{v:"6.8x",l:"ROAS"},{v:"$280 to $157",l:"CPL Reduction"}],what:["Rebuilt campaigns with 3-tier intent structure","Implemented Salesforce offline conversion import","Built 8 custom audience segments with CRM + in-market signals","Created bid modifier scripts for time, device, and geography","A/B tested 32 ad copy variants across 6 ad groups"],results:["CPL reduced from $280 to $157 within 3 months","$1.8M in closed deals attributed to Google Ads","ROAS reached 6.8x on blended basis","Impression share on top-intent keywords grew from 34% to 78%","Lead quality score improved from 3.2 to 7.8 out of 10"],tags:["Google Search","Offline Conversions","Salesforce","Smart Bidding"],client_img:"https://images.unsplash.com/photo-1560250097-0b93528c311a?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"David Marsh",client_co:"CEO, Apex Financial"},
  urbaneats:{img:"https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=900&h=500&q=88&auto=format&fit=crop",ind:"Restaurants & F&B",ind_ico:"fas fa-utensils",title:"Urban Eats: 320% More Reservations via Instagram and Email",desc:"4 premium locations with weak social and an unused email list. We built a visual-first Instagram strategy paired with weekly email campaigns turning their audience into a predictable reservation engine.",metrics:[{v:"+320%",l:"Reservations"},{v:"+180%",l:"Instagram Followers"},{v:"48%",l:"Email Open Rate"},{v:"-55%",l:"Empty Tables"}],what:["Monthly professional photo shoots producing 80+ assets per location","Content calendar with 5 posts per week per location","Weekly Tuesday email campaign targeting past diners","Birthday and anniversary sequence tied to reservation system","Private Instagram community for VIP diners"],results:["Monthly reservations grew +320% across all 4 locations","Instagram following grew +180%; reach grew +520%","Weekly emails achieve 48% open rates — 3x industry average","Empty table rate dropped from 34% to 15%","Opened a 5th location citing social and email-driven demand"],tags:["Instagram","Email Marketing","Content","Klaviyo","Community"],client_img:"https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=80&h=80&q=85&auto=format&fit=crop&crop=faces",client_name:"Marco Rossi",client_co:"Owner, Urban Eats Group"}
};

/* Modal */
function openModal(id){
  var c=cases[id];if(!c)return;
  var bg=document.getElementById('modalBg');
  document.getElementById('modal-img-src').src=c.img;
  document.getElementById('modal-img-src').alt=c.title;
  document.getElementById('modal-ind').innerHTML='<i class="'+c.ind_ico+'"></i> '+c.ind;
  document.getElementById('modal-title').textContent=c.title;
  document.getElementById('modal-desc').textContent=c.desc;
  var mEl=document.getElementById('modal-metrics');mEl.innerHTML='';
  c.metrics.forEach(function(m){mEl.innerHTML+='<div class="mm"><div class="mm-v">'+m.v+'</div><div class="mm-l">'+m.l+'</div></div>'});
  var wEl=document.getElementById('modal-what');wEl.innerHTML='';
  c.what.forEach(function(w){wEl.innerHTML+='<li><i class="fas fa-circle-check"></i> '+w+'</li>'});
  var rEl=document.getElementById('modal-results');rEl.innerHTML='';
  c.results.forEach(function(r){rEl.innerHTML+='<li><i class="fas fa-arrow-trend-up"></i> '+r+'</li>'});
  var tEl=document.getElementById('modal-tags');tEl.innerHTML='';
  c.tags.forEach(function(t){tEl.innerHTML+='<span class="modal-tag">'+t+'</span>'});
  document.getElementById('modal-client').innerHTML='<div class="modal-av"><img src="'+c.client_img+'" alt="'+c.client_name+'"/></div><div><div class="modal-cname">'+c.client_name+'</div><div class="modal-cco">'+c.client_co+'</div></div>';
  bg.classList.add('open');document.body.style.overflow='hidden';
}
function closeModal(){var mb=document.getElementById('modalBg');if(mb){mb.classList.remove('open');document.body.style.overflow='';}}
var _modalBg=document.getElementById('modalBg');
if(_modalBg){
  _modalBg.addEventListener('click',function(e){if(e.target===this)closeModal()});
  document.addEventListener('keydown',function(e){if(e.key==='Escape')closeModal()});
}

/* Filter tabs */
document.querySelectorAll('.ftab').forEach(function(tab){
  tab.addEventListener('click',function(){
    document.querySelectorAll('.ftab').forEach(function(t){t.classList.remove('active')});
    tab.classList.add('active');
    var filter=tab.dataset.filter;
    document.querySelectorAll('.cs-card,.feat-card').forEach(function(card){
      if(filter==='all'){card.style.display='';card.style.opacity='1'}
      else{var cats=(card.dataset.cats||'').split(' ');var show=cats.indexOf(filter)!==-1;card.style.display=show?'':'none';card.style.opacity=show?'1':'0'}
    });
  });
});
/* ── Sticky tab highlighting on scroll ───────────────────── */
var _sections = ['seo','social-media','paid-ads','web-design','content','email','branding','analytics'];
var _tabs = document.querySelectorAll('.svc-tab');
var _tabOffset = 140;

function updateActiveTab(){
  var current = 'seo';
  _sections.forEach(function(id){
    var el = document.getElementById(id);
    if(el && window.scrollY >= el.offsetTop - _tabOffset - 80){ current = id; }
  });
  _tabs.forEach(function(t){ t.classList.toggle('active', t.dataset.target === current); });
}
window.addEventListener('scroll', updateActiveTab, {passive: true});

/* ── Tab click → scroll to section ──────────────────────── */
_tabs.forEach(function(tab){
  tab.addEventListener('click', function(){
    var el = document.getElementById(tab.dataset.target);
    if(el) window.scrollTo({top: el.offsetTop - _tabOffset, behavior: 'smooth'});
  });
});

/* ── Process step icons ──────────────────────────────────── */
document.querySelectorAll('.ps-num').forEach(function(n, i){
  var num = document.createElement('span');
  num.className = 'ps-num-label';
  num.style.cssText = 'position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:2rem;font-weight:900;opacity:.15;font-family:var(--font-h)';
  num.textContent = String(i + 1).padStart(2, '0');
  n.appendChild(num);
});
/* ── Bar fill animations ─────────────────────────────────── */
var barObs = new IntersectionObserver(function(entries){
  entries.forEach(function(e){
    if(e.isIntersecting){
      e.target.querySelectorAll('.bar-fill').forEach(function(b){
        b.style.transform = 'scaleX(' + b.dataset.w + ')';
      });
    }
  });
}, {threshold: 0.3});
document.querySelectorAll('.why-card').forEach(function(c){ barObs.observe(c); });

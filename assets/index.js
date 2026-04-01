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

/* ── Contact form (homepage) ─────────────────────────────── */
var cfForm = document.querySelector('.contact-form');
if(cfForm){
  var sub = cfForm.querySelector('.form-submit');
  if(sub){
    sub.addEventListener('click', function(e){
      e.preventDefault();
      var name = cfForm.querySelector('input[placeholder*="Name"]');
      var email = cfForm.querySelector('input[placeholder*="email"]');
      if(name && email && name.value.trim() && email.value.includes('@')){
        sub.textContent = 'Message Sent!'; sub.style.background = '#34D399';
      }
    });
  }
}

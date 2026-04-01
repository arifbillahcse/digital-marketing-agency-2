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

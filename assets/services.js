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

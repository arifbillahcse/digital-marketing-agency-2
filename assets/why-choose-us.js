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

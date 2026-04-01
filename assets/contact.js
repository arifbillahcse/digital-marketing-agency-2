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
  setTimeout(function(){
    document.getElementById('formWrap').style.display = 'none';
    document.getElementById('formSuccess').style.display = 'block';
  }, 1800);
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

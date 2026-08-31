document.addEventListener('DOMContentLoaded', () => {
  // Client-side navigation keeps the dashboard shell mounted while views change.
  initSpaRouter();
  // load dashboard values if present
  fetch('api.php?action=dashboard').then(r => r.json()).then(data => {
    if(!data.ok) return;
    const up = document.getElementById('upcoming');
    if(up) up.innerHTML = data.upcoming.map(b => `<div class="list-item"><div><strong>${b.name}</strong><div class="small">${b.service} — ${b.booked_date}</div></div><div>${b.amount}</div></div>`).join('') || '<div class="small">No upcoming</div>';
    const rev = document.getElementById('revenue'); if(rev) rev.textContent = parseFloat(data.revenue).toFixed(2);
    const exp = document.getElementById('expenditure'); if(exp) exp.textContent = parseFloat(data.expenditure).toFixed(2);
  }).catch(()=>{});

  // client form submit (if present)
  const clientForm = document.getElementById('clientForm');
  if(clientForm){
    clientForm.addEventListener('submit', e => {
      e.preventDefault();
      const btn = clientForm.querySelector('button');
      const msg = document.getElementById('clientMsg');
      const progressWrap = document.getElementById('clientProgressWrap');
      const progressBar = document.getElementById('clientProgress');
      if(msg) msg.textContent = '';
      if(msg) msg.classList.remove('success','error');
      if(btn) btn.disabled = true;
      if(btn) btn.textContent = 'Saving...';
      if(progressBar) progressBar.style.width = '0%';
      if(progressWrap) progressWrap.style.display = 'block';

      let width = 0;
      const anim = setInterval(()=>{ width = Math.min(80, width + Math.random()*12); if(progressBar) progressBar.style.width = width + '%'; }, 200);

      const form = new FormData(clientForm);
      const payload = Object.fromEntries(form.entries());

      fetch('api.php?action=add_client', { method:'POST', body: JSON.stringify(payload), headers:{'Content-Type':'application/json'} })
        .then(r=>r.json()).then(j=>{
          clearInterval(anim);
          if(j.ok){ if(progressBar) progressBar.style.width='100%'; if(progressBar) progressBar.style.background='#16a34a'; if(msg){ msg.textContent='Client added successfully'; msg.classList.add('success'); } clientForm.reset(); }
          else { if(progressBar) progressBar.style.width='100%'; if(progressBar) progressBar.style.background='#ef4444'; if(msg){ msg.textContent='Failed: '+(j.error||'Unknown'); msg.classList.add('error'); } }
        }).catch(err=>{ clearInterval(anim); if(progressBar) progressBar.style.width='100%'; if(progressBar) progressBar.style.background='#ef4444'; if(msg){ msg.textContent='Failed: '+err.message; msg.classList.add('error'); } })
        .finally(()=>{ setTimeout(()=>{ if(progressWrap) progressWrap.style.display='none'; if(progressBar) progressBar.style.width='0%'; if(btn){ btn.disabled=false; btn.textContent='Add Client'; } }, 1200); });
    });
  }

  // Toast utilities
  function ensureToastContainer(){ let c = document.querySelector('.toast-container'); if(!c){ c = document.createElement('div'); c.className='toast-container'; document.body.appendChild(c); } return c; }
  function showToast(text, type='success', timeout=3500){ const c = ensureToastContainer(); const t = document.createElement('div'); t.className = 'toast ' + (type==='error'?'error':'success'); t.textContent = text; c.appendChild(t); setTimeout(()=>{ t.style.opacity=0; t.style.transform='translateX(8px)'; }, timeout-500); setTimeout(()=>{ t.remove(); }, timeout); }

  // Confirmation modal
  function showConfirm(message){ return new Promise(resolve=>{ const backdrop = document.createElement('div'); backdrop.className='modal-backdrop'; const modal = document.createElement('div'); modal.className='modal'; modal.innerHTML = `<div>${message}</div>`; const actions = document.createElement('div'); actions.className='actions'; const btnCancel = document.createElement('button'); btnCancel.className='cancel'; btnCancel.textContent='Cancel'; const btnConfirm = document.createElement('button'); btnConfirm.className='confirm'; btnConfirm.textContent='Confirm'; actions.appendChild(btnCancel); actions.appendChild(btnConfirm); modal.appendChild(actions); backdrop.appendChild(modal); document.body.appendChild(backdrop); btnCancel.addEventListener('click',()=>{ backdrop.remove(); resolve(false); }); btnConfirm.addEventListener('click',()=>{ backdrop.remove(); resolve(true); }); }); }

  // Attach cancel handlers (if present)
  document.querySelectorAll('.cancel-btn').forEach(btn=>{ btn.addEventListener('click', async (e)=>{ e.preventDefault(); const id = btn.dataset.id; const name = btn.dataset.name || ''; const ok = await showConfirm('Cancel client "'+name+'"? This can be undone in the database.'); if(!ok) return; btn.disabled = true; const li = btn.closest('.list-item'); try{ const res = await fetch('api.php?action=cancel_client&id='+encodeURIComponent(id)); const j = await res.json(); if(j.ok){ showToast('Client cancelled','success'); const right = li ? li.querySelector(':scope > div:last-child') : null; if(right) right.innerHTML = '<span class="small">Cancelled</span>'; } else { showToast('Failed: '+(j.error||'unknown'),'error'); btn.disabled=false; } }catch(err){ showToast('Error: '+err.message,'error'); btn.disabled=false; } }); });

  // KPI drag-and-drop reordering (horizontal)
  (function initKpiDrag(){
    const grid = document.querySelector('.atl-kpi-grid');
    if(!grid) return;
    let dragged = null;

    grid.querySelectorAll('.atl-kpi').forEach((card, idx)=>{
      card.setAttribute('draggable','true');
      card.dataset.atlIndex = idx;
      card.addEventListener('dragstart', (e)=>{
        dragged = card;
        card.classList.add('dragging');
        try{ e.dataTransfer.effectAllowed = 'move'; e.dataTransfer.setData('text/plain','atl-kpi'); }catch(_){}
      });
      card.addEventListener('dragend', ()=>{
        if(dragged) dragged.classList.remove('dragging');
        dragged = null;
      });
    });

    grid.addEventListener('dragover', (e)=>{
      e.preventDefault();
      const target = e.target.closest('.atl-kpi');
      grid.classList.add('drop-target');
      if(!target || target === dragged) return;
      const rect = target.getBoundingClientRect();
      const midpoint = rect.left + rect.width/2;
      if(e.clientX < midpoint){
        grid.insertBefore(dragged, target);
      } else {
        grid.insertBefore(dragged, target.nextSibling);
      }
    });

    grid.addEventListener('dragleave', (e)=>{
      // when leaving the grid, remove outline
      if(e.relatedTarget && grid.contains(e.relatedTarget)) return;
      grid.classList.remove('drop-target');
    });

    grid.addEventListener('drop', (e)=>{
      e.preventDefault();
      grid.classList.remove('drop-target');
      // final position already set in dragover handler
      // optionally persist order via API here
    });
    // Prevent whole-page scrolling: make the grid handle wheel and touch
    grid.addEventListener('wheel', (e)=>{
      // only intercept vertical wheel to translate to horizontal scroll
      if(Math.abs(e.deltaY) === 0) return;
      e.preventDefault();
      grid.scrollLeft += e.deltaY;
    }, { passive: false });

    // Touch: translate horizontal swipes into grid scroll and prevent page scroll
    let touchStartX = 0;
    let isTouching = false;
    grid.addEventListener('touchstart', (e)=>{
      if(e.touches.length !== 1) return;
      touchStartX = e.touches[0].clientX;
      isTouching = true;
      document.body.classList.add('no-scroll');
    }, { passive: true });
    grid.addEventListener('touchmove', (e)=>{
      if(!isTouching) return;
      const x = e.touches[0].clientX;
      const dx = touchStartX - x;
      if(Math.abs(dx) > 0){
        e.preventDefault();
        grid.scrollLeft += dx;
        touchStartX = x;
      }
    }, { passive: false });
    grid.addEventListener('touchend', ()=>{
      isTouching = false;
      document.body.classList.remove('no-scroll');
    }, { passive: true });
  })();

});

function initSpaRouter(){
  const shell = document.querySelector('.atl-main');
  const nav = document.querySelector('.atl-nav-list');
  if(!shell || !nav) return;
  const dashboardView = shell.innerHTML;
  const routes = {
    Dashboard: 'dashboard', Bookings: 'bookings', Clients: 'clients',
    Portfolio: 'portfolio', 'Kit & products': 'kit', Payments: 'payments', Settings: 'settings'
  };
  const title = document.querySelector('.atl-greeting');

  function setActive(label){
    nav.querySelectorAll('.atl-nav-item').forEach(item => {
      item.classList.toggle('is-active', item.textContent.trim() === label);
    });
  }
  function placeholder(label){
    shell.innerHTML = `<div class="atl-panel"><h2 class="atl-greeting">${label}</h2><p class="atl-sub">This section is ready for its workspace.</p></div>`;
  }
  function bookings(){
    shell.innerHTML = `<div class="atl-panel"><h2 class="atl-greeting">Bookings</h2><p class="atl-sub">Your bookings workspace will appear here.</p><div class="atl-caption" style="margin-top:18px">No bookings have been added yet.</div></div>`;
  }
  function navigate(route, push=true){
    const label = Object.keys(routes).find(key => routes[key] === route) || 'Dashboard';
    if(push) history.pushState({route}, '', route === 'dashboard' ? 'index.php' : `index.php#${route}`);
    setActive(label);
    if(route === 'dashboard') shell.innerHTML = dashboardView;
    else if(route === 'bookings') bookings();
    else placeholder(label);
    if(title) title.textContent = route === 'dashboard' ? 'Good evening, Selin' : label;
  }
  nav.addEventListener('click', event => {
    const item = event.target.closest('.atl-nav-item');
    if(!item) return;
    event.preventDefault();
    const label = item.textContent.trim();
    navigate(routes[label] || 'dashboard');
  });
  window.addEventListener('popstate', () => navigate(location.hash.slice(1) || 'dashboard', false));
  const initial = location.hash.slice(1) || 'dashboard';
  if(initial !== 'dashboard') navigate(initial, false);
}

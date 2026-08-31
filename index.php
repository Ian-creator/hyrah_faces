<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Hyrah Faces — Studio Dashboard</title>

  <link rel="icon" href="assets/logo.jpeg" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..700&family=IBM+Plex+Mono:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="atelier-theme.css">
  <style>
    .atelier-theme .atl-booking-primary{border:1px solid var(--atl-porcelain);background:var(--atl-porcelain);color:var(--atl-void);border-radius:10px;padding:10px 16px;font-weight:700;white-space:nowrap;cursor:pointer;transition:all .2s ease;font-family:var(--atl-font-body);font-size:0.92rem}
    .atelier-theme .atl-booking-primary:hover{opacity:0.9;transform:translateY(-1px);box-shadow:0 4px 14px rgba(255,255,255,0.15)}
    .atelier-theme .atl-booking-primary:active{transform:translateY(0)}
    .atelier-theme .atl-booking-tab{border:1px solid var(--atl-hairline);background:transparent;color:var(--atl-smoke);border-radius:999px;padding:8px 14px;white-space:nowrap;cursor:pointer;transition:all .2s ease;font-family:var(--atl-font-body);font-size:0.88rem}
    .atelier-theme .atl-booking-tab:hover{border-color:var(--atl-hairline-strong);color:var(--atl-porcelain);background:var(--atl-glass)}
    .atelier-theme .atl-booking-tab.is-active{background:var(--atl-glass-strong);border-color:var(--atl-hairline-strong);color:var(--atl-porcelain);font-weight:600}
    .atelier-theme .atl-booking-input{display:block;width:100%;box-sizing:border-box;margin-top:6px;padding:11px 13px;border:1px solid var(--atl-hairline);border-radius:9px;background:var(--atl-onyx);color:var(--atl-porcelain);font-family:var(--atl-font-body);font-size:0.92rem;transition:border-color .2s}
    .atelier-theme .atl-booking-input:focus{outline:none;border-color:var(--atl-hairline-strong);box-shadow:0 0 0 1px var(--atl-hairline-strong)}
    .atelier-theme .atl-booking-input::placeholder{color:var(--atl-dim)}
    .atelier-theme select.atl-booking-input{appearance:none;background-image:url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23A8A8AE' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");background-repeat:no-repeat;background-position:right 12px center;background-size:14px;padding-right:34px;cursor:pointer}
    .atelier-theme textarea.atl-booking-input{min-height:80px;resize:vertical}
    .atelier-theme .kit-stock{height:4px;width:72px;margin-top:6px;border-radius:99px;background:rgba(255,255,255,0.06);overflow:hidden}
    .atelier-theme .kit-stock i{display:block;height:100%;background:var(--atl-porcelain);opacity:.7;border-radius:99px;transition:width .3s ease}
    .atelier-theme .atl-toggle{width:42px;height:24px;border:1px solid var(--atl-hairline);border-radius:99px;background:var(--atl-glass);padding:2px;cursor:pointer;transition:all .2s ease;display:inline-block;position:relative;vertical-align:middle}
    .atelier-theme .atl-toggle:after{content:"";display:block;width:18px;height:18px;border-radius:50%;background:var(--atl-porcelain);transition:transform .2s ease;transform:translateX(0)}
    .atelier-theme .atl-toggle.is-on{background:var(--atl-glass-strong);border-color:var(--atl-hairline-strong)}
    .atelier-theme .atl-toggle.is-on:after{transform:translateX(18px)}
    .atelier-theme .settings-row{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:14px 0;border-top:1px solid var(--atl-hairline)}
    .atelier-theme .settings-row:first-child{border-top:0;padding-top:0}
    .atelier-theme .settings-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:8px}
    .atelier-theme .portfolio-card{cursor:pointer;min-width:0;transition:transform .2s ease}
    .atelier-theme .portfolio-card:hover{transform:translateY(-2px)}
    .atelier-theme .portfolio-card:nth-child(5n+1) .atl-frame{background:linear-gradient(145deg,rgba(255,255,255,.14),rgba(255,255,255,.02))}
    .atelier-theme .portfolio-card:nth-child(5n+2) .atl-frame{background:linear-gradient(35deg,rgba(255,255,255,.11),rgba(255,255,255,.02))}
    .atelier-theme .portfolio-card:nth-child(5n+3) .atl-frame{background:linear-gradient(200deg,rgba(255,255,255,.16),rgba(255,255,255,.025))}
    .atelier-theme .portfolio-card:nth-child(5n+4) .atl-frame{background:linear-gradient(110deg,rgba(255,255,255,.09),rgba(255,255,255,.02))}
    .atelier-theme .portfolio-card:nth-child(5n) .atl-frame{background:linear-gradient(280deg,rgba(255,255,255,.13),rgba(255,255,255,.02))}
    .atelier-theme [class^="view-"], .atelier-theme [class*=" view-"]{display:none;animation:atlFadeIn .25s ease}
    .atelier-theme [class^="view-"].is-active, .atelier-theme [class*=" view-"].is-active{display:block}
    @keyframes atlFadeIn{from{opacity:0;transform:translateY(4px)}to{opacity:1;transform:translateY(0)}}
    @media (max-width:900px){.atelier-theme .portfolio-grid{grid-template-columns:repeat(2,minmax(0,1fr))!important}}
    @media (max-width:700px){
      .atelier-theme .settings-panel[data-settings-panel="profile"]{grid-template-columns:1fr!important}
      .atelier-theme .view-settings .atl-topbar{align-items:stretch}
      .atelier-theme .view-bookings .atl-topbar{align-items:stretch}
      .atelier-theme .view-bookings .atl-topbar>div:last-child{flex-wrap:wrap}
      .atelier-theme .view-bookings [style*="repeat(7"]{grid-template-columns:repeat(4,minmax(0,1fr))!important}
      .atelier-theme .view-bookings .atl-schedule-grid{grid-template-columns:1fr!important}
    }
  </style>
</head>
<body>
  <div class="atelier-theme" style="position:relative">
    <div class="atl-glow" aria-hidden="true"></div>

    <div class="atl-container atl-dashboard-shell" role="main">

      <!-- SIDEBAR -->
      <aside class="atl-sidebar" aria-label="primary navigation">
        <div>
          <div class="atl-brand" style="margin-bottom:18px">
            <img src="assets/logo.jpeg" alt="Hyrah Faces" style="width:100%;height:auto;max-height:80px;border-radius:10px;object-fit:cover;display:block;border:1px solid var(--atl-hairline)"/>
          </div>

          <nav class="atl-nav" aria-label="main">
            <ul class="atl-nav-list" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:6px">
              <li class="atl-nav-item is-active"><a href="#dashboard" data-view="dashboard"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Dashboard</span></a></li>
              <li class="atl-nav-item"><a href="#bookings" data-view="bookings"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Bookings</span></a></li>
              <li class="atl-nav-item"><a href="#clients" data-view="clients"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Clients</span></a></li>
              <li class="atl-nav-item"><a href="#portfolio" data-view="portfolio"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Portfolio</span></a></li>
              <li class="atl-nav-item"><a href="#kit" data-view="kit"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Kit &amp; products</span></a></li>
              <li class="atl-nav-item"><a href="#payments" data-view="payments"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Payments</span></a></li>
              <li class="atl-nav-item"><a href="#settings" data-view="settings"><span class="atl-dot" aria-hidden="true"></span><span class="atl-label">Settings</span></a></li>
            </ul>
          </nav>
        </div>

        <div class="atl-sidebar-footer">
          <div class="atl-avatar atl-avatar--md" aria-hidden="true">SM</div>
          <div class="atl-who">
            <div class="atl-name" style="font-weight:700;font-size:0.95rem">Selin Marchetti</div>
            <div class="atl-role" style="font-size:0.8rem;color:var(--atl-smoke)">Lead artist</div>
          </div>
        </div>
      </aside>

      <!-- MAIN CONTENT VIEWS -->
      <section class="atl-main">

        <!-- VIEW 1: DASHBOARD -->
        <div class="view-dashboard is-active" aria-labelledby="dashboard-title">
          <header class="atl-topbar">
            <div>
              <h1 id="dashboard-title" class="atl-greeting dynamic-greeting">Good evening, Selin</h1>
              <div id="dashboard-date-sub" class="atl-sub">Wednesday, 19 August — studio overview</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
              <button class="atl-booking-primary" onclick="switchView('bookings')">+ Quick booking</button>
            </div>
          </header>

          <!-- KPI row -->
          <div class="atl-kpi-grid">
            <div class="atl-kpi atl-panel">
              <div class="atl-kpi-label">Revenue this month</div>
              <div id="metric-revenue" class="atl-kpi-value">UGX 14,280,000</div>
              <div class="atl-caption" style="margin-top:6px">YTD growth, bridal demand strong</div>
            </div>

            <div class="atl-kpi atl-panel">
              <div class="atl-kpi-label">Bookings today</div>
              <div id="metric-bookings" class="atl-kpi-value">4</div>
              <div class="atl-caption" style="margin-top:6px">High-touch services scheduled</div>
            </div>

            <div class="atl-kpi atl-panel">
              <div class="atl-kpi-label">Active clients</div>
              <div id="metric-clients" class="atl-kpi-value">42</div>
              <div class="atl-caption" style="margin-top:6px">9 new clients this month</div>
            </div>

            <div class="atl-kpi atl-panel">
              <div class="atl-kpi-label">Avg. service value</div>
              <div id="metric-average" class="atl-kpi-value">UGX 220,000</div>
              <div class="atl-caption" style="margin-top:6px">Bridal package leading</div>
            </div>
          </div>

          <!-- bookings / today's schedule -->
          <div class="atl-schedule-grid">
            <div class="atl-panel">
              <div class="atl-panel-head">
                <h4 class="atl-panel-title">Bookings this week</h4>
                <span class="atl-panel-meta">18 appointments</span>
              </div>
              <div class="atl-chart" style="display:flex;align-items:flex-end;gap:10px;height:140px">
                <div class="atl-bar-col"><div class="atl-bar" data-day="Mon" style="height:24%"><div class="atl-bar-val">2</div></div></div>
                <div class="atl-bar-col"><div class="atl-bar" data-day="Tue" style="height:48%"><div class="atl-bar-val">5</div></div></div>
                <div class="atl-bar-col"><div class="atl-bar" data-day="Wed" style="height:64%"><div class="atl-bar-val">8</div></div></div>
                <div class="atl-bar-col"><div class="atl-bar" data-day="Thu" style="height:36%"><div class="atl-bar-val">4</div></div></div>
                <div class="atl-bar-col"><div class="atl-bar" data-day="Fri" style="height:78%"><div class="atl-bar-val">10</div></div></div>
                <div class="atl-bar-col"><div class="atl-bar" data-day="Sat" style="height:54%"><div class="atl-bar-val">7</div></div></div>
                <div class="atl-bar-col"><div class="atl-bar" data-day="Sun" style="height:30%"><div class="atl-bar-val">3</div></div></div>
              </div>
              <div class="atl-caption" style="margin-top:16px">Weekly distribution — monitor Friday peaks for kit prep</div>
            </div>

            <aside class="atl-panel">
              <div class="atl-panel-head">
                <h4 class="atl-panel-title">Today's schedule</h4>
                <span class="atl-panel-meta">4 appointments</span>
              </div>

              <div class="atl-appt-list">
                <div class="atl-appt" style="cursor:pointer" onclick="switchView('bookings')">
                  <div class="atl-appt-time">2:30p</div>
                  <div style="display:flex;align-items:center;gap:10px;flex:1">
                    <div class="atl-avatar-sm">RK</div>
                    <div class="atl-meta"><div style="font-weight:600">Rhea Kapoor</div><div class="atl-caption">Bridal trial</div></div>
                  </div>
                  <div><span class="atl-badge is-confirmed">Confirmed</span></div>
                </div>

                <div class="atl-appt" style="cursor:pointer" onclick="switchView('bookings')">
                  <div class="atl-appt-time">4:00p</div>
                  <div style="display:flex;align-items:center;gap:10px;flex:1">
                    <div class="atl-avatar-sm">JL</div>
                    <div class="atl-meta"><div style="font-weight:600">Jade Lin</div><div class="atl-caption">Editorial glam</div></div>
                  </div>
                  <div><span class="atl-badge is-confirmed">Confirmed</span></div>
                </div>

                <div class="atl-appt" style="cursor:pointer" onclick="switchView('bookings')">
                  <div class="atl-appt-time">5:15p</div>
                  <div style="display:flex;align-items:center;gap:10px;flex:1">
                    <div class="atl-avatar-sm">AO</div>
                    <div class="atl-meta"><div style="font-weight:600">Amara Okoye</div><div class="atl-caption">Soft glam touch-up</div></div>
                  </div>
                  <div><span class="atl-badge is-pending">Pending</span></div>
                </div>

                <div class="atl-appt" style="cursor:pointer" onclick="switchView('bookings')">
                  <div class="atl-appt-time">6:30p</div>
                  <div style="display:flex;align-items:center;gap:10px;flex:1">
                    <div class="atl-avatar-sm">TN</div>
                    <div class="atl-meta"><div style="font-weight:600">Talia Novak</div><div class="atl-caption">Event makeup</div></div>
                  </div>
                  <div><span class="atl-badge is-confirmed">Confirmed</span></div>
                </div>
              </div>
            </aside>
          </div>

          <!-- top clients / portfolio -->
          <div class="atl-lower-grid">
            <div class="atl-panel">
              <div class="atl-panel-head">
                <h4 class="atl-panel-title">Top clients</h4>
                <a href="#clients" onclick="switchView('clients');return false;" class="atl-caption" style="color:var(--atl-smoke);text-decoration:none">View all &rarr;</a>
              </div>
              <div class="atl-roster">
                <div class="atl-client-row" style="cursor:pointer" onclick="switchView('clients')">
                  <div class="atl-client-left">
                    <div class="atl-avatar-sm">RK</div>
                    <div>
                      <div class="atl-client-name">Rhea Kapoor</div>
                      <div class="atl-client-meta atl-caption">7 bookings · VIP client</div>
                    </div>
                  </div>
                  <div class="atl-client-spend">UGX 2,140,000</div>
                </div>

                <div class="atl-client-row" style="cursor:pointer" onclick="switchView('clients')">
                  <div class="atl-client-left">
                    <div class="atl-avatar-sm">JL</div>
                    <div>
                      <div class="atl-client-name">Jade Lin</div>
                      <div class="atl-client-meta atl-caption">5 bookings · Editorial</div>
                    </div>
                  </div>
                  <div class="atl-client-spend">UGX 1,860,000</div>
                </div>

                <div class="atl-client-row" style="cursor:pointer" onclick="switchView('clients')">
                  <div class="atl-client-left">
                    <div class="atl-avatar-sm">TN</div>
                    <div>
                      <div class="atl-client-name">Talia Novak</div>
                      <div class="atl-client-meta atl-caption">4 bookings · Event glam</div>
                    </div>
                  </div>
                  <div class="atl-client-spend">UGX 1,420,000</div>
                </div>

                <div class="atl-client-row" style="cursor:pointer" onclick="switchView('clients')">
                  <div class="atl-client-left">
                    <div class="atl-avatar-sm">AO</div>
                    <div>
                      <div class="atl-client-name">Amara Okoye</div>
                      <div class="atl-client-meta atl-caption">3 bookings · Soft glam</div>
                    </div>
                  </div>
                  <div class="atl-client-spend">UGX 980,000</div>
                </div>
              </div>
            </div>

            <div class="atl-panel atl-portfolio-panel">
              <div class="atl-panel-head">
                <h4 class="atl-panel-title">Recent portfolio</h4>
                <a href="#portfolio" onclick="switchView('portfolio');return false;" class="atl-caption" style="color:var(--atl-smoke);text-decoration:none">Explore gallery &rarr;</a>
              </div>
              <div class="atl-portfolio-grid">
                <div class="atl-frame" style="cursor:pointer" onclick="switchView('portfolio')">Bridal</div>
                <div class="atl-frame" style="cursor:pointer" onclick="switchView('portfolio')">Editorial</div>
                <div class="atl-frame" style="cursor:pointer" onclick="switchView('portfolio')">Soft glam</div>
                <div class="atl-frame" style="cursor:pointer" onclick="switchView('portfolio')">Event</div>
                <div class="atl-frame" style="cursor:pointer" onclick="switchView('portfolio')">Studio</div>
              </div>
            </div>
          </div>
        </div>

        <!-- VIEW 2: BOOKINGS -->
        <div class="view-bookings" aria-labelledby="bookings-title">
          <header class="atl-topbar">
            <div>
              <h1 id="bookings-title" class="atl-greeting">Bookings</h1>
              <div class="atl-sub">18 bookings scheduled · 4 remaining today</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
              <div class="atl-search">
                <input placeholder="Search bookings..." aria-label="Search bookings" />
              </div>
            </div>
          </header>

          <div class="atl-panel" style="display:flex;gap:8px;margin-top:14px;padding:8px;overflow-x:auto">
            <button class="atl-booking-tab is-active" data-list-filter="all">All</button>
            <button class="atl-booking-tab" data-list-filter="upcoming">Upcoming</button>
            <button class="atl-booking-tab" data-list-filter="completed">Completed</button>
            <button class="atl-booking-tab" data-list-filter="pending">Pending</button>
            <button class="atl-booking-tab" data-list-filter="cancelled">Cancelled</button>
          </div>

          <div style="display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:8px;margin-top:14px">
            <div class="atl-panel" style="text-align:center;padding:12px 8px"><div class="atl-caption">Mon</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">17</div><div class="atl-caption">••</div></div>
            <div class="atl-panel" style="border-color:var(--atl-hairline-strong);background:var(--atl-glass-strong);text-align:center;padding:12px 8px"><div class="atl-caption" style="color:var(--atl-porcelain)">Tue · today</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">18</div><div class="atl-caption">••••</div></div>
            <div class="atl-panel" style="text-align:center;padding:12px 8px"><div class="atl-caption">Wed</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">19</div><div class="atl-caption">•</div></div>
            <div class="atl-panel" style="text-align:center;padding:12px 8px"><div class="atl-caption">Thu</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">20</div><div class="atl-caption">•••</div></div>
            <div class="atl-panel" style="text-align:center;padding:12px 8px"><div class="atl-caption">Fri</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">21</div><div class="atl-caption">•••••</div></div>
            <div class="atl-panel" style="text-align:center;padding:12px 8px"><div class="atl-caption">Sat</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">22</div><div class="atl-caption">•••••</div></div>
            <div class="atl-panel" style="text-align:center;padding:12px 8px"><div class="atl-caption">Sun</div><div class="atl-greeting" style="font-size:1.2rem;margin:4px 0">23</div><div class="atl-caption">•</div></div>
          </div>

          <div class="atl-schedule-grid" style="grid-template-columns:1.5fr 1fr">
            <!-- Bookings List -->
            <div class="atl-panel">
              <h4 class="atl-panel-title">Appointments roster</h4>
              <div id="booking-list-container">
                <div class="atl-caption" style="margin-top:14px">TODAY, 18 AUGUST</div>
                <div class="atl-appt" data-status="confirmed" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">2:30p</div>
                  <div class="atl-avatar-sm">RK</div>
                  <div style="flex:1"><strong>Rhea Kapoor</strong><div class="atl-caption">Bridal trial · 90 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 220,000</div>
                  <span class="atl-badge is-confirmed">Confirmed</span>
                </div>
                <div class="atl-appt" data-status="confirmed" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">4:00p</div>
                  <div class="atl-avatar-sm">JL</div>
                  <div style="flex:1"><strong>Jade Lin</strong><div class="atl-caption">Editorial glam · 60 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 165,000</div>
                  <span class="atl-badge is-confirmed">Confirmed</span>
                </div>
                <div class="atl-appt" data-status="pending" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">5:15p</div>
                  <div class="atl-avatar-sm">AO</div>
                  <div style="flex:1"><strong>Amara Okoye</strong><div class="atl-caption">Soft glam touch-up · 45 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 95,000</div>
                  <span class="atl-badge is-pending">Pending</span>
                </div>
                <div class="atl-appt" data-status="confirmed" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">6:30p</div>
                  <div class="atl-avatar-sm">TN</div>
                  <div style="flex:1"><strong>Talia Novak</strong><div class="atl-caption">Event makeup · 75 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 185,000</div>
                  <span class="atl-badge is-confirmed">Confirmed</span>
                </div>

                <div class="atl-caption" style="margin-top:14px">TOMORROW, 19 AUGUST</div>
                <div class="atl-appt" data-status="confirmed" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">11:00a</div>
                  <div class="atl-avatar-sm">MP</div>
                  <div style="flex:1"><strong>Mira Petrova</strong><div class="atl-caption">Consultation · 30 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 50,000</div>
                  <span class="atl-badge is-confirmed">Confirmed</span>
                </div>
                <div class="atl-appt" data-status="pending" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">1:30p</div>
                  <div class="atl-avatar-sm">CD</div>
                  <div style="flex:1"><strong>Clara Dumont</strong><div class="atl-caption">Full glam · 90 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 210,000</div>
                  <span class="atl-badge is-pending">Pending</span>
                </div>

                <div class="atl-caption" style="margin-top:14px">THU, 20 AUGUST</div>
                <div class="atl-appt" data-status="cancelled" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-appt-time">10:00a</div>
                  <div class="atl-avatar-sm">NS</div>
                  <div style="flex:1"><strong>Nadia Silva</strong><div class="atl-caption">Photoshoot glam · 120 min</div></div>
                  <div class="atl-appt-time" style="text-align:right">UGX 280,000</div>
                  <span class="atl-badge is-cancelled">Cancelled</span>
                </div>
              </div>
            </div>

            <!-- New Booking Form -->
            <div class="atl-panel">
              <h4 class="atl-panel-title">New booking</h4>
              <div class="atl-caption">Schedule an appointment for a new or returning client</div>

              <form id="booking-form" style="margin-top:16px;display:grid;gap:12px">
                <label class="atl-caption">
                  CLIENT NAME
                  <input name="client_name" class="atl-booking-input" placeholder="Search or add client" required />
                </label>

                <label class="atl-caption">
                  SERVICE
                  <input name="service" class="atl-booking-input" placeholder="Bridal trial, editorial, soft glam..." required />
                </label>

                <label class="atl-caption">
                  TOTAL AMOUNT (UGX)
                  <input name="unit_price" class="atl-booking-input" placeholder="UGX 0.00" required />
                </label>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
                  <label class="atl-caption">
                    DATE
                    <input name="date" class="atl-booking-input" type="date" required />
                  </label>
                  <label class="atl-caption">
                    TIME
                    <input name="time" class="atl-booking-input" type="time" value="14:00" required />
                  </label>
                </div>

                <label class="atl-caption">
                  AMOUNT PAID / DEPOSIT (UGX)
                  <input name="amount" class="atl-booking-input" placeholder="UGX 0.00" />
                </label>

                <div id="bookingBalance" class="atl-caption" style="color:var(--atl-smoke);font-family:var(--atl-font-mono)">
                  Outstanding balance: UGX 0
                </div>

                <label class="atl-caption">
                  STATUS
                  <select name="status" class="atl-booking-input">
                    <option value="scheduled">Scheduled</option>
                    <option value="confirmed" selected>Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                  </select>
                </label>

                <label class="atl-caption">
                  NOTES
                  <textarea name="notes" class="atl-booking-input" placeholder="Skin type, trial notes, preferences..."></textarea>
                </label>

                <div style="display:flex;gap:8px;margin-top:4px">
                  <button type="button" class="atl-booking-tab form-cancel-btn">Clear</button>
                  <button type="submit" class="atl-booking-primary" style="flex:1">Create booking</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- VIEW 3: CLIENTS -->
        <div class="view-clients" aria-labelledby="clients-title">
          <header class="atl-topbar">
            <div>
              <h1 id="clients-title" class="atl-greeting">Clients</h1>
              <div class="atl-sub">42 active studio clients · 9 new this month</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
              <div class="atl-search">
                <input placeholder="Search clients..." aria-label="Search clients" />
              </div>
              <button class="atl-booking-primary" id="open-add-client-btn">+ New client</button>
            </div>
          </header>

          <div class="atl-panel" style="display:flex;gap:8px;margin-top:14px;padding:8px;overflow-x:auto">
            <button class="atl-booking-tab is-active" data-list-filter="all">All</button>
            <button class="atl-booking-tab" data-list-filter="vip">VIP</button>
            <button class="atl-booking-tab" data-list-filter="new">New</button>
            <button class="atl-booking-tab" data-list-filter="inactive">Inactive</button>
          </div>

          <div class="atl-schedule-grid" style="grid-template-columns:1.5fr 1fr">
            <!-- Client Roster -->
            <div class="atl-panel">
              <h4 class="atl-panel-title">All clients</h4>
              <div id="client-list" style="margin-top:10px">
                <div class="atl-appt client-row is-selected" data-client="rhea" style="border-top:1px solid var(--atl-hairline);cursor:pointer">
                  <div class="atl-avatar-sm">RK</div>
                  <div style="flex:1">
                    <strong>Rhea Kapoor</strong> <span class="atl-badge is-confirmed">VIP</span>
                    <div class="atl-caption">Last visit · 12 Aug 2026</div>
                  </div>
                  <div class="atl-appt-time">8 visits</div>
                  <div class="atl-appt-time" style="text-align:right">UGX 1,840,000</div>
                </div>

                <div class="atl-appt client-row" data-client="jade" style="border-top:1px solid var(--atl-hairline);cursor:pointer">
                  <div class="atl-avatar-sm">JL</div>
                  <div style="flex:1">
                    <strong>Jade Lin</strong> <span class="atl-badge">New</span>
                    <div class="atl-caption">Last visit · 8 Aug 2026</div>
                  </div>
                  <div class="atl-appt-time">2 visits</div>
                  <div class="atl-appt-time" style="text-align:right">UGX 420,000</div>
                </div>

                <div class="atl-appt client-row" data-client="amara" style="border-top:1px solid var(--atl-hairline);cursor:pointer">
                  <div class="atl-avatar-sm">AO</div>
                  <div style="flex:1">
                    <strong>Amara Okoye</strong>
                    <div class="atl-caption">Last visit · 2 Aug 2026</div>
                  </div>
                  <div class="atl-appt-time">3 visits</div>
                  <div class="atl-appt-time" style="text-align:right">UGX 980,000</div>
                </div>

                <div class="atl-appt client-row" data-client="mira" style="border-top:1px solid var(--atl-hairline);cursor:pointer">
                  <div class="atl-avatar-sm">MP</div>
                  <div style="flex:1">
                    <strong>Mira Petrova</strong> <span class="atl-badge is-confirmed">VIP</span>
                    <div class="atl-caption">Last visit · 28 Jul 2026</div>
                  </div>
                  <div class="atl-appt-time">11 visits</div>
                  <div class="atl-appt-time" style="text-align:right">UGX 2,460,000</div>
                </div>

                <div class="atl-appt client-row" data-client="clara" style="border-top:1px solid var(--atl-hairline);cursor:pointer">
                  <div class="atl-avatar-sm">CD</div>
                  <div style="flex:1">
                    <strong>Clara Dumont</strong> <span class="atl-badge">New</span>
                    <div class="atl-caption">Last visit · 19 Jul 2026</div>
                  </div>
                  <div class="atl-appt-time">1 visit</div>
                  <div class="atl-appt-time" style="text-align:right">UGX 210,000</div>
                </div>
              </div>
            </div>

            <!-- Client Profile Aside -->
            <aside class="atl-panel" id="client-profile">
              <div style="display:flex;align-items:center;gap:14px">
                <div class="atl-avatar atl-avatar--md" id="profile-avatar">RK</div>
                <div>
                  <h4 class="atl-panel-title" id="profile-name" style="font-size:1.15rem">Rhea Kapoor</h4>
                  <div class="atl-caption" id="profile-meta">VIP client · rhea@example.com</div>
                </div>
              </div>

              <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:20px">
                <div class="atl-panel" style="padding:12px;background:var(--atl-onyx)">
                  <div class="atl-kpi-label">TOTAL SPEND</div>
                  <div class="atl-kpi-value" id="profile-spend" style="font-size:1.1rem;margin-top:4px">UGX 1,840,000</div>
                </div>
                <div class="atl-panel" style="padding:12px;background:var(--atl-onyx)">
                  <div class="atl-kpi-label">BOOKINGS</div>
                  <div class="atl-kpi-value" id="profile-bookings" style="font-size:1.1rem;margin-top:4px">8</div>
                </div>
              </div>

              <div style="margin-top:18px;border-top:1px solid var(--atl-hairline);padding-top:14px">
                <div class="atl-caption" style="font-weight:600;color:var(--atl-smoke)">CONTACT &amp; DETAILS</div>
                <div class="atl-caption" id="profile-phone" style="margin-top:6px">+256 701 234 567</div>
                <div class="atl-caption" id="profile-notes" style="margin-top:6px">Prefers lightweight dew finish. Sensitive eye area.</div>
              </div>

              <div class="atl-caption" id="profile-last-visit" style="margin-top:14px">Last visit · 12 Aug 2026</div>

              <button class="atl-booking-primary" style="width:100%;margin-top:20px" onclick="prefillBookingForClient()">Book appointment</button>
            </aside>
          </div>
        </div>

        <!-- VIEW 4: PORTFOLIO -->
        <div class="view-portfolio" aria-labelledby="portfolio-title">
          <header class="atl-topbar">
            <div>
              <h1 id="portfolio-title" class="atl-greeting">Portfolio</h1>
              <div class="atl-sub">128 studio looks · 12 added this month</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
              <div class="atl-search">
                <input placeholder="Search portfolio..." aria-label="Search portfolio" />
              </div>
              <button class="atl-booking-primary" id="open-upload-btn">+ Upload look</button>
            </div>
          </header>

          <div class="atl-panel" style="display:flex;gap:8px;margin-top:14px;padding:8px;overflow-x:auto">
            <button class="atl-booking-tab portfolio-filter is-active" data-filter="All">All</button>
            <button class="atl-booking-tab portfolio-filter" data-filter="Bridal">Bridal</button>
            <button class="atl-booking-tab portfolio-filter" data-filter="Editorial">Editorial</button>
            <button class="atl-booking-tab portfolio-filter" data-filter="Soft glam">Soft glam</button>
            <button class="atl-booking-tab portfolio-filter" data-filter="Event">Event</button>
            <button class="atl-booking-tab portfolio-filter" data-filter="Studio">Studio</button>
          </div>

          <div class="portfolio-grid" style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:14px;margin-top:16px">
            <div class="portfolio-card" data-category="Bridal" data-client="Rhea Kapoor" data-date="12 Aug">
              <div class="atl-frame" style="aspect-ratio:3/4">Bridal Glow</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Rhea Kapoor</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">12 Aug</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Editorial" data-client="Jade Lin" data-date="08 Aug">
              <div class="atl-frame" style="aspect-ratio:3/4">Editorial High-Fashion</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Jade Lin</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">08 Aug</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Event" data-client="Talia Novak" data-date="05 Aug">
              <div class="atl-frame" style="aspect-ratio:3/4">Red Carpet Event</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Talia Novak</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">05 Aug</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Soft glam" data-client="Amara Okoye" data-date="02 Aug">
              <div class="atl-frame" style="aspect-ratio:3/4">Velvet Soft Glam</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Amara Okoye</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">02 Aug</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Studio" data-client="Mira Petrova" data-date="30 Jul">
              <div class="atl-frame" style="aspect-ratio:3/4">Studio Portrait</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Mira Petrova</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">30 Jul</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Bridal" data-client="Clara Dumont" data-date="28 Jul">
              <div class="atl-frame" style="aspect-ratio:3/4">Classic Bride</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Clara Dumont</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">28 Jul</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Editorial" data-client="Nadia Silva" data-date="24 Jul">
              <div class="atl-frame" style="aspect-ratio:3/4">Avant-Garde Eyes</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Nadia Silva</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">24 Jul</span>
              </div>
            </div>

            <div class="portfolio-card" data-category="Studio" data-client="Selin Marchetti" data-date="20 Jul">
              <div class="atl-frame" style="aspect-ratio:3/4">Monochrome Studio</div>
              <div style="display:flex;justify-content:space-between;margin-top:8px">
                <span style="font-weight:600;font-size:0.92rem">Selin Marchetti</span>
                <span class="atl-caption" style="font-family:var(--atl-font-mono)">20 Jul</span>
              </div>
            </div>
          </div>
        </div>

        <!-- VIEW 5: KIT & PRODUCTS -->
        <div class="view-kit" aria-labelledby="kit-title">
          <header class="atl-topbar">
            <div>
              <h1 id="kit-title" class="atl-greeting">Kit &amp; products</h1>
              <div class="atl-sub">86 products in studio · 3 low stock · 3 expiring soon</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
              <div class="atl-search">
                <input placeholder="Search products..." aria-label="Search products" />
              </div>
            </div>
          </header>

          <div class="atl-panel" style="display:flex;gap:8px;margin-top:14px;padding:8px;overflow-x:auto">
            <button class="atl-booking-tab kit-filter is-active" data-filter="All">All</button>
            <button class="atl-booking-tab kit-filter" data-filter="Face">Face</button>
            <button class="atl-booking-tab kit-filter" data-filter="Eyes">Eyes</button>
            <button class="atl-booking-tab kit-filter" data-filter="Lips">Lips</button>
            <button class="atl-booking-tab kit-filter" data-filter="Tools">Tools</button>
            <button class="atl-booking-tab kit-filter" data-filter="low">Low stock</button>
            <button class="atl-booking-tab kit-filter" data-filter="expiring">Expiring soon</button>
          </div>

          <div class="atl-schedule-grid" style="grid-template-columns:1.5fr 1fr">
            <!-- Inventory Table -->
            <div class="atl-panel">
              <h4 class="atl-panel-title">Kit inventory</h4>
              <div id="kit-list">
                <div class="atl-caption kit-group" style="margin-top:14px;font-weight:700">FACE</div>
                <div class="atl-appt kit-row" data-category="Face" data-status="low" data-expiring="false" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">A</div>
                  <div style="flex:1"><strong>Foundation</strong><div class="atl-caption">NARS Sheer Glow</div></div>
                  <div class="atl-appt-time">3 / 20<div class="kit-stock"><i style="width:15%"></i></div></div>
                  <div class="atl-appt-time">Mar 2027</div>
                  <span class="atl-badge is-overdue">Low stock</span>
                </div>

                <div class="atl-appt kit-row" data-category="Face" data-status="in" data-expiring="false" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">B</div>
                  <div style="flex:1"><strong>Concealer</strong><div class="atl-caption">Kevyn Aucoin</div></div>
                  <div class="atl-appt-time">12 / 20<div class="kit-stock"><i style="width:60%"></i></div></div>
                  <div class="atl-appt-time">Nov 2027</div>
                  <span class="atl-badge is-confirmed">In stock</span>
                </div>

                <div class="atl-appt kit-row" data-category="Face" data-status="in" data-expiring="false" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">C</div>
                  <div style="flex:1"><strong>Setting powder</strong><div class="atl-caption">Laura Mercier Translucent</div></div>
                  <div class="atl-appt-time">18 / 20<div class="kit-stock"><i style="width:90%"></i></div></div>
                  <div class="atl-appt-time">Jun 2028</div>
                  <span class="atl-badge is-confirmed">In stock</span>
                </div>

                <div class="atl-caption kit-group" style="margin-top:16px;font-weight:700">EYES</div>
                <div class="atl-appt kit-row" data-category="Eyes" data-status="in" data-expiring="true" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">D</div>
                  <div style="flex:1"><strong>Eyeshadow palette</strong><div class="atl-caption">Pat McGrath Mothership</div></div>
                  <div class="atl-appt-time">5 / 10<div class="kit-stock"><i style="width:50%"></i></div></div>
                  <div class="atl-appt-time">Sep 2026</div>
                  <span class="atl-badge is-confirmed">In stock</span>
                </div>

                <div class="atl-appt kit-row" data-category="Eyes" data-status="low" data-expiring="true" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">E</div>
                  <div style="flex:1"><strong>Mascara</strong><div class="atl-caption">Charlotte Tilbury Pillow Talk</div></div>
                  <div class="atl-appt-time">2 / 15<div class="kit-stock"><i style="width:13%"></i></div></div>
                  <div class="atl-appt-time">Sep 2026</div>
                  <span class="atl-badge is-overdue">Low stock</span>
                </div>

                <div class="atl-caption kit-group" style="margin-top:16px;font-weight:700">LIPS</div>
                <div class="atl-appt kit-row" data-category="Lips" data-status="in" data-expiring="false" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">F</div>
                  <div style="flex:1"><strong>Lipstick set</strong><div class="atl-caption">MAC Velvet Teddy Collection</div></div>
                  <div class="atl-appt-time">14 / 20<div class="kit-stock"><i style="width:70%"></i></div></div>
                  <div class="atl-appt-time">Dec 2027</div>
                  <span class="atl-badge is-confirmed">In stock</span>
                </div>

                <div class="atl-appt kit-row" data-category="Lips" data-status="low" data-expiring="true" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">G</div>
                  <div style="flex:1"><strong>Lip gloss</strong><div class="atl-caption">Fenty Beauty Gloss Bomb</div></div>
                  <div class="atl-appt-time">1 / 10<div class="kit-stock"><i style="width:10%"></i></div></div>
                  <div class="atl-appt-time">Oct 2026</div>
                  <span class="atl-badge is-overdue">Low stock</span>
                </div>

                <div class="atl-caption kit-group" style="margin-top:16px;font-weight:700">TOOLS</div>
                <div class="atl-appt kit-row" data-category="Tools" data-status="out" data-expiring="false" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">H</div>
                  <div style="flex:1"><strong>Beauty blenders</strong><div class="atl-caption">Original Pro Pack</div></div>
                  <div class="atl-appt-time">0 / 8<div class="kit-stock"><i style="width:0%"></i></div></div>
                  <div class="atl-appt-time">No expiry</div>
                  <span class="atl-badge is-cancelled">Out of stock</span>
                </div>
              </div>
            </div>

            <!-- Add Product & Attention -->
            <div style="display:grid;gap:14px;align-content:start">
              <div class="atl-panel">
                <h4 class="atl-panel-title">Needs attention</h4>
                <div class="atl-appt" style="border-top:1px solid var(--atl-hairline);padding:8px 0">
                  <div style="flex:1"><strong>Beauty blender</strong><div class="atl-caption">Out of stock · Need reorder</div></div>
                  <button class="atl-booking-tab" style="padding:4px 10px;font-size:0.8rem">Restock</button>
                </div>
                <div class="atl-appt" style="border-top:1px solid var(--atl-hairline);padding:8px 0">
                  <div style="flex:1"><strong>Lip gloss (Fenty)</strong><div class="atl-caption">1 left · Expires Oct 2026</div></div>
                  <button class="atl-booking-tab" style="padding:4px 10px;font-size:0.8rem">Restock</button>
                </div>
                <div class="atl-appt" style="border-top:1px solid var(--atl-hairline);padding:8px 0">
                  <div style="flex:1"><strong>Mascara (CT)</strong><div class="atl-caption">2 left · Expires Sep 2026</div></div>
                  <button class="atl-booking-tab" style="padding:4px 10px;font-size:0.8rem">Restock</button>
                </div>
              </div>

              <div class="atl-panel">
                <h4 class="atl-panel-title">Add product to kit</h4>
                <form id="product-form" style="margin-top:14px;display:grid;gap:12px">
                  <label class="atl-caption">
                    PRODUCT NAME
                    <input name="name" class="atl-booking-input" placeholder="e.g. Sheer Glow Foundation" required />
                  </label>
                  <label class="atl-caption">
                    BRAND
                    <input name="brand" class="atl-booking-input" placeholder="e.g. NARS, MAC, Fenty" required />
                  </label>
                  <label class="atl-caption">
                    CATEGORY
                    <div class="settings-chips" id="product-category-chips">
                      <button type="button" class="atl-booking-tab is-active" data-value="Face">Face</button>
                      <button type="button" class="atl-booking-tab" data-value="Eyes">Eyes</button>
                      <button type="button" class="atl-booking-tab" data-value="Lips">Lips</button>
                      <button type="button" class="atl-booking-tab" data-value="Tools">Tools</button>
                    </div>
                  </label>
                  <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
                    <label class="atl-caption">
                      QUANTITY
                      <input name="quantity" class="atl-booking-input" type="number" min="0" placeholder="e.g. 5" required />
                    </label>
                    <label class="atl-caption">
                      MAX CAPACITY
                      <input name="max_quantity" class="atl-booking-input" type="number" min="1" placeholder="e.g. 20" />
                    </label>
                  </div>
                  <label class="atl-caption">
                    EXPIRY DATE
                    <input name="expiry_date" class="atl-booking-input" placeholder="MM/YYYY or YYYY-MM" />
                  </label>
                  <div style="display:flex;gap:8px;margin-top:4px">
                    <button type="button" class="atl-booking-tab form-cancel-btn">Clear</button>
                    <button type="submit" class="atl-booking-primary" style="flex:1">Add product</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- VIEW 6: PAYMENTS -->
        <div class="view-payments" aria-labelledby="payments-title">
          <header class="atl-topbar">
            <div>
              <h1 id="payments-title" class="atl-greeting">Payments</h1>
              <div class="atl-sub">UGX 14,280,000 collected this month · UGX 640,000 outstanding</div>
            </div>
            <div style="display:flex;align-items:center;gap:10px">
              <div class="atl-search">
                <input placeholder="Search payments..." aria-label="Search payments" />
              </div>
            </div>
          </header>

          <div class="atl-panel" style="display:flex;gap:8px;margin-top:14px;padding:8px;overflow-x:auto">
            <button class="atl-booking-tab payment-filter is-active" data-filter="All">All</button>
            <button class="atl-booking-tab payment-filter" data-filter="Paid">Paid</button>
            <button class="atl-booking-tab payment-filter" data-filter="Pending">Pending</button>
            <button class="atl-booking-tab payment-filter" data-filter="Overdue">Overdue</button>
            <button class="atl-booking-tab payment-filter" data-filter="Refunded">Refunded</button>
          </div>

          <div class="atl-schedule-grid" style="grid-template-columns:1.5fr 1fr">
            <!-- Transactions List -->
            <div class="atl-panel">
              <h4 class="atl-panel-title">Transactions log</h4>
              <div id="payment-list">
                <div class="atl-caption payment-group" style="margin-top:14px;font-weight:700">TODAY, 18 AUGUST</div>
                <div class="atl-appt payment-row" data-status="Paid" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">RK</div>
                  <div style="flex:1"><strong>Rhea Kapoor</strong><div class="atl-caption">Bridal trial · Inv #1042</div></div>
                  <span class="atl-badge">Card</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 220,000</div>
                  <span class="atl-badge is-confirmed">Paid</span>
                </div>

                <div class="atl-appt payment-row" data-status="Paid" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">JL</div>
                  <div style="flex:1"><strong>Jade Lin</strong><div class="atl-caption">Editorial glam · Inv #1041</div></div>
                  <span class="atl-badge">Transfer</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 165,000</div>
                  <span class="atl-badge is-confirmed">Paid</span>
                </div>

                <div class="atl-appt payment-row" data-status="Pending" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">AO</div>
                  <div style="flex:1"><strong>Amara Okoye</strong><div class="atl-caption">Soft glam touch-up · Inv #1040</div></div>
                  <span class="atl-badge">Cash</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 95,000</div>
                  <span class="atl-badge is-pending">Pending</span>
                </div>

                <div class="atl-caption payment-group" style="margin-top:16px;font-weight:700">17 AUGUST</div>
                <div class="atl-appt payment-row" data-status="Paid" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">TN</div>
                  <div style="flex:1"><strong>Talia Novak</strong><div class="atl-caption">Event makeup · Inv #1039</div></div>
                  <span class="atl-badge">Card</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 185,000</div>
                  <span class="atl-badge is-confirmed">Paid</span>
                </div>

                <div class="atl-appt payment-row" data-status="Overdue" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">CD</div>
                  <div style="flex:1"><strong>Clara Dumont</strong><div class="atl-caption">Full glam · Inv #1038</div></div>
                  <span class="atl-badge">Transfer</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 210,000</div>
                  <span class="atl-badge is-overdue">Overdue</span>
                </div>

                <div class="atl-caption payment-group" style="margin-top:16px;font-weight:700">15 AUGUST</div>
                <div class="atl-appt payment-row" data-status="Paid" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">MP</div>
                  <div style="flex:1"><strong>Mira Petrova</strong><div class="atl-caption">Consultation · Inv #1037</div></div>
                  <span class="atl-badge">Cash</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 50,000</div>
                  <span class="atl-badge is-confirmed">Paid</span>
                </div>

                <div class="atl-appt payment-row" data-status="Refunded" style="border-top:1px solid var(--atl-hairline)">
                  <div class="atl-avatar-sm">NS</div>
                  <div style="flex:1"><strong>Nadia Silva</strong><div class="atl-caption">Photoshoot glam (Cancelled)</div></div>
                  <span class="atl-badge">Card</span>
                  <div class="atl-appt-time" style="text-align:right">UGX 280,000</div>
                  <span class="atl-badge is-refunded">Refunded</span>
                </div>
              </div>
            </div>

            <!-- Revenue Summary & Record Payment -->
            <div style="display:grid;gap:14px;align-content:start">
              <div class="atl-panel">
                <h4 class="atl-panel-title">Revenue overview</h4>
                <div style="margin-top:14px">
                  <div class="atl-kpi-label">COLLECTED THIS MONTH</div>
                  <div class="atl-kpi-value" style="font-size:1.25rem">UGX 14,280,000</div>
                  <div class="atl-kpi-label" style="margin-top:12px">LAST MONTH</div>
                  <div class="atl-kpi-value" style="font-size:1.1rem;color:var(--atl-smoke)">UGX 12,710,000</div>
                  <div class="atl-kpi-label" style="margin-top:12px">TOTAL OUTSTANDING</div>
                  <div class="atl-kpi-value" style="font-size:1.1rem;color:#ff8888">UGX 640,000</div>
                </div>
              </div>

              <div class="atl-panel">
                <h4 class="atl-panel-title">Record payment</h4>
                <form id="payment-form" style="margin-top:14px;display:grid;gap:12px">
                  <label class="atl-caption">
                    CLIENT NAME
                    <input name="client_name" class="atl-booking-input" placeholder="Search or add client" required />
                  </label>
                  <label class="atl-caption">
                    AMOUNT (UGX)
                    <input name="amount" class="atl-booking-input" placeholder="UGX 0.00" required />
                  </label>
                  <label class="atl-caption">
                    PAYMENT METHOD
                    <div class="settings-chips" id="payment-method-chips">
                      <button type="button" class="atl-booking-tab is-active" data-value="Card">Card</button>
                      <button type="button" class="atl-booking-tab" data-value="Cash">Cash</button>
                      <button type="button" class="atl-booking-tab" data-value="Transfer">Transfer</button>
                    </div>
                  </label>
                  <label class="atl-caption">
                    DATE
                    <input name="paid_at" class="atl-booking-input" type="date" required />
                  </label>
                  <label class="atl-caption">
                    INVOICE REFERENCE
                    <input name="invoice_reference" class="atl-booking-input" placeholder="e.g. INV-1043" />
                  </label>
                  <label class="atl-caption">
                    NOTES
                    <textarea name="note" class="atl-booking-input" placeholder="Deposit, final balance, package payment..."></textarea>
                  </label>
                  <div style="display:flex;gap:8px;margin-top:4px">
                    <button type="button" class="atl-booking-tab form-cancel-btn">Clear</button>
                    <button type="submit" class="atl-booking-primary" style="flex:1">Record payment</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- VIEW 7: SETTINGS -->
        <div class="view-settings" aria-labelledby="settings-title">
          <header class="atl-topbar">
            <div>
              <h1 id="settings-title" class="atl-greeting">Settings</h1>
              <div class="atl-sub">Manage studio profile, preferences, notifications &amp; account</div>
            </div>
            <button class="atl-booking-primary" id="save-all-settings-btn">Save changes</button>
          </header>

          <div class="atl-panel" style="display:flex;gap:8px;margin-top:14px;padding:8px;overflow-x:auto">
            <button class="atl-booking-tab settings-tab is-active" data-settings="profile">Profile</button>
            <button class="atl-booking-tab settings-tab" data-settings="business">Business</button>
            <button class="atl-booking-tab settings-tab" data-settings="notifications">Notifications</button>
            <button class="atl-booking-tab settings-tab" data-settings="rules">Booking rules</button>
            <button class="atl-booking-tab settings-tab" data-settings="security">Security</button>
          </div>

          <!-- Settings: Profile -->
          <div class="settings-panel" data-settings-panel="profile" style="display:grid;grid-template-columns:1fr 2fr;gap:14px;margin-top:14px">
            <div class="atl-panel" style="text-align:center">
              <div class="atl-avatar atl-avatar--md" style="width:100px;height:100px;font-size:2rem;margin:10px auto">SM</div>
              <button class="atl-booking-tab" id="change-photo-btn" style="margin-top:8px">Change photo</button>
              <h4 class="atl-panel-title" style="margin-top:18px">Selin Marchetti</h4>
              <div class="atl-caption">Lead Makeup Artist</div>
            </div>
            <div class="atl-panel">
              <form id="settings-profile-form" style="display:grid;gap:12px">
                <label class="atl-caption">FULL NAME<input name="name" class="atl-booking-input" value="Selin Marchetti" /></label>
                <label class="atl-caption">EMAIL<input name="email" class="atl-booking-input" value="selin@hyrahfaces.com" /></label>
                <label class="atl-caption">PHONE<input name="phone" class="atl-booking-input" value="+256 701 000 111" /></label>
                <label class="atl-caption">ROLE / TITLE<input name="role" class="atl-booking-input" value="Lead artist &amp; Founder" /></label>
                <label class="atl-caption">BIO<textarea name="bio" class="atl-booking-input">Certified luxury bridal and editorial makeup artist with 8+ years international atelier experience.</textarea></label>
              </form>
            </div>
          </div>

          <!-- Settings: Business -->
          <div class="settings-panel" data-settings-panel="business" hidden style="margin-top:14px">
            <div class="atl-panel">
              <form id="settings-business-form" style="display:grid;gap:14px">
                <label class="atl-caption">BUSINESS NAME<input name="business_name" class="atl-booking-input" value="Hyrah Faces Studio" /></label>
                <label class="atl-caption">STUDIO ADDRESS<input name="address" class="atl-booking-input" value="Plot 14 Acacia Avenue, Kololo, Kampala, Uganda" /></label>
                <label class="atl-caption">
                  PRIMARY CURRENCY
                  <div class="settings-chips" id="currency-chips">
                    <button type="button" class="atl-booking-tab is-active" data-value="UGX">UGX (Ugandan Shilling)</button>
                    <button type="button" class="atl-booking-tab" data-value="USD">USD ($)</button>
                    <button type="button" class="atl-booking-tab" data-value="EUR">EUR (€)</button>
                    <button type="button" class="atl-booking-tab" data-value="GBP">GBP (£)</button>
                  </div>
                </label>
                <label class="atl-caption">
                  BUSINESS HOURS
                  <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
                    <input name="opens" class="atl-booking-input" value="09:00 AM" placeholder="Opens" />
                    <input name="closes" class="atl-booking-input" value="07:00 PM" placeholder="Closes" />
                  </div>
                </label>
                <label class="atl-caption">
                  CANCELLATION POLICY
                  <div class="settings-chips" id="cancellation-chips">
                    <button type="button" class="atl-booking-tab">Flexible (24h full refund)</button>
                    <button type="button" class="atl-booking-tab is-active">Moderate (48h deposit kept)</button>
                    <button type="button" class="atl-booking-tab">Strict (No deposit refund)</button>
                  </div>
                </label>
              </form>
            </div>
          </div>

          <!-- Settings: Notifications -->
          <div class="settings-panel" data-settings-panel="notifications" hidden style="margin-top:14px">
            <div class="atl-panel">
              <div class="settings-row">
                <div><strong>New booking requests</strong><div class="atl-caption">Get notified immediately when a client requests an appointment</div></div>
                <button class="atl-toggle is-on" aria-label="Toggle booking requests"></button>
              </div>
              <div class="settings-row">
                <div><strong>Payment received</strong><div class="atl-caption">Get notified when a client deposit or payment is recorded</div></div>
                <button class="atl-toggle is-on" aria-label="Toggle payments"></button>
              </div>
              <div class="settings-row">
                <div><strong>Low stock alerts</strong><div class="atl-caption">Receive kit alerts when product units fall below minimum threshold</div></div>
                <button class="atl-toggle is-on" aria-label="Toggle low stock"></button>
              </div>
              <div class="settings-row">
                <div><strong>Expiring product alerts</strong><div class="atl-caption">Get notified 30 days before makeup or skincare products expire</div></div>
                <button class="atl-toggle is-on" aria-label="Toggle expiring products"></button>
              </div>
              <div class="settings-row">
                <div><strong>Client reminders</strong><div class="atl-caption">Automated SMS/Email booking reminders sent 24h prior</div></div>
                <button class="atl-toggle is-on" aria-label="Toggle client reminders"></button>
              </div>
            </div>
          </div>

          <!-- Settings: Booking rules -->
          <div class="settings-panel" data-settings-panel="rules" hidden style="margin-top:14px">
            <div class="atl-panel">
              <label class="atl-caption">
                BUFFER TIME BETWEEN BOOKINGS
                <div class="settings-chips" id="buffer-time-chips">
                  <button type="button" class="atl-booking-tab">0 min</button>
                  <button type="button" class="atl-booking-tab is-active">15 min</button>
                  <button type="button" class="atl-booking-tab">30 min</button>
                  <button type="button" class="atl-booking-tab">45 min</button>
                </div>
              </label>

              <label class="atl-caption" style="display:block;margin-top:18px">
                MINIMUM NOTICE REQUIRED
                <div class="settings-chips" id="notice-chips">
                  <button type="button" class="atl-booking-tab">Same day</button>
                  <button type="button" class="atl-booking-tab">2 hours</button>
                  <button type="button" class="atl-booking-tab is-active">24 hours</button>
                  <button type="button" class="atl-booking-tab">48 hours</button>
                </div>
              </label>

              <div class="settings-row" style="margin-top:18px">
                <div><strong>Require deposit</strong><div class="atl-caption">Collect deposit before confirming appointment</div></div>
                <button class="atl-toggle is-on"></button>
              </div>

              <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:8px">
                <label class="atl-caption">DEPOSIT PERCENTAGE<input class="atl-booking-input" value="30%" /></label>
                <label class="atl-caption">MAX BOOKINGS PER DAY<input class="atl-booking-input" value="6" /></label>
              </div>
            </div>
          </div>

          <!-- Settings: Security -->
          <div class="settings-panel" data-settings-panel="security" hidden style="margin-top:14px">
            <div class="atl-panel">
              <h4 class="atl-panel-title">Change password</h4>
              <div style="display:grid;gap:12px;margin-top:12px">
                <label class="atl-caption">CURRENT PASSWORD<input class="atl-booking-input" type="password" placeholder="••••••••" /></label>
                <label class="atl-caption">NEW PASSWORD<input class="atl-booking-input" type="password" placeholder="••••••••" /></label>
                <label class="atl-caption">CONFIRM NEW PASSWORD<input class="atl-booking-input" type="password" placeholder="••••••••" /></label>
              </div>

              <div class="settings-row" style="margin-top:18px">
                <div><strong>Two-factor authentication</strong><div class="atl-caption">Add secondary verification via authenticator app</div></div>
                <button class="atl-toggle"></button>
              </div>

              <h4 class="atl-panel-title" style="margin-top:20px">Active sessions</h4>
              <div class="settings-row">
                <div><strong>MacBook Pro · Chrome</strong><div class="atl-caption">Kampala, UG · <span style="font-family:var(--atl-font-mono);color:var(--atl-porcelain)">Active now</span></div></div>
                <span class="atl-badge is-confirmed">Current</span>
              </div>
              <div class="settings-row">
                <div><strong>iPhone 15 Pro · Safari</strong><div class="atl-caption">Kampala, UG · 2 hours ago</div></div>
                <button class="atl-booking-tab" onclick="this.closest('.settings-row').remove();showFeedback('Session ended','success')">Sign out</button>
              </div>

              <div style="margin-top:24px;border-top:1px solid rgba(255,80,80,0.15);padding-top:16px">
                <button class="atl-booking-tab" style="border-color:rgba(255,80,80,0.3);color:#ff8888" onclick="confirmDeleteAccount()">Delete studio account</button>
                <div class="atl-caption" style="margin-top:6px">Permanently deletes all appointments, client history, and settings.</div>
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>

    <!-- TOAST CONTAINER -->
    <div class="toast-container" id="toast-container"></div>
  </div>

  <!-- SINGLE ROBUST JS CONTROLLER -->
  <script>
    // --- Toast Notifications ---
    function showFeedback(message, type) {
      type = type || 'success';
      var container = document.getElementById('toast-container');
      if (!container) {
        container = document.createElement('div');
        container.className = 'toast-container';
        container.id = 'toast-container';
        document.body.appendChild(container);
      }
      var toast = document.createElement('div');
      toast.className = 'toast ' + type;
      toast.textContent = message;
      container.appendChild(toast);
      setTimeout(function () {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(10px)';
        setTimeout(function () { toast.remove(); }, 300);
      }, 3200);
    }

    // --- API Communication Helper ---
    function postData(action, payload, button, callback) {
      var origText = button ? button.textContent : '';
      if (button) {
        button.disabled = true;
        button.textContent = 'Saving...';
      }
      return fetch('api.php?action=' + action, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      })
      .then(function (res) { return res.json(); })
      .then(function (json) {
        if (!json.ok) throw new Error(json.error || 'Operation failed');
        showFeedback('Saved successfully', 'success');
        if (callback) callback(json);
        return json;
      })
      .catch(function (err) {
        showFeedback(err.message || 'Error occurred', 'error');
      })
      .finally(function () {
        if (button) {
          button.disabled = false;
          button.textContent = origText;
        }
      });
    }

    // --- Dynamic Time-of-Day Greeting & Date ---
    function updateDynamicGreeting() {
      var now = new Date();
      var hour = now.getHours();
      var greeting = 'Good evening, Selin';
      if (hour >= 5 && hour < 12) greeting = 'Good morning, Selin';
      else if (hour >= 12 && hour < 17) greeting = 'Good afternoon, Selin';

      var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      var dateStr = days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()];

      var titleEl = document.querySelector('.dynamic-greeting');
      if (titleEl) titleEl.textContent = greeting;
      var subEl = document.getElementById('dashboard-date-sub');
      if (subEl) subEl.textContent = dateStr + ' — studio overview';
    }

    // --- SPA View Navigation ---
    function switchView(viewName) {
      // 1. Update sidebar nav items
      document.querySelectorAll('.atl-nav-item').forEach(function (item) {
        var link = item.querySelector('a[data-view]');
        if (link) {
          item.classList.toggle('is-active', link.dataset.view === viewName);
        }
      });

      // 2. Switch main section containers
      document.querySelectorAll('[class^="view-"], [class*=" view-"]').forEach(function (section) {
        var isTarget = section.classList.contains('view-' + viewName);
        section.classList.toggle('is-active', isTarget);
      });

      // 3. Update window hash smoothly without jump
      try {
        history.pushState(null, '', '#' + viewName);
      } catch (e) {}

      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // --- Setup Listeners on DOM Ready ---
    document.addEventListener('DOMContentLoaded', function () {
      updateDynamicGreeting();

      // Set today's date on all date pickers by default
      var todayIso = new Date().toISOString().split('T')[0];
      document.querySelectorAll('input[type="date"]').forEach(function (input) {
        if (!input.value) input.value = todayIso;
      });

      // Sidebar view links
      document.querySelectorAll('[data-view]').forEach(function (link) {
        link.addEventListener('click', function (e) {
          e.preventDefault();
          switchView(this.dataset.view);
        });
      });

      // Initialize route from URL hash
      var hash = (location.hash || '').replace('#', '');
      if (hash && document.querySelector('.view-' + hash)) {
        switchView(hash);
      }

      window.addEventListener('popstate', function () {
        var h = (location.hash || '').replace('#', '') || 'dashboard';
        if (document.querySelector('.view-' + h)) {
          switchView(h);
        }
      });

      // --- Universal Search Input Handlers ---
      document.querySelectorAll('.atl-search input').forEach(function (input) {
        input.addEventListener('input', function () {
          var query = this.value.trim().toLowerCase();
          var view = this.closest('.view-bookings, .view-clients, .view-portfolio, .view-kit, .view-payments');
          if (!view) return;

          var targets = view.classList.contains('view-bookings')
            ? view.querySelectorAll('.atl-appt')
            : view.classList.contains('view-clients')
            ? view.querySelectorAll('.client-row')
            : view.classList.contains('view-portfolio')
            ? view.querySelectorAll('.portfolio-card')
            : view.classList.contains('view-kit')
            ? view.querySelectorAll('.kit-row')
            : view.classList.contains('view-payments')
            ? view.querySelectorAll('.payment-row')
            : [];

          targets.forEach(function (item) {
            item.style.display = (!query || item.textContent.toLowerCase().includes(query)) ? '' : 'none';
          });
        });
      });

      // --- Settings Tabs Navigation ---
      document.querySelectorAll('.settings-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
          var targetName = this.dataset.settings;
          document.querySelectorAll('.settings-tab').forEach(function (t) {
            t.classList.toggle('is-active', t === tab);
          });
          document.querySelectorAll('.settings-panel').forEach(function (panel) {
            panel.hidden = panel.dataset.settingsPanel !== targetName;
          });
        });
      });

      // --- Interactive Toggles (iOS-Style) ---
      document.querySelectorAll('.atl-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
          this.classList.toggle('is-on');
        });
      });

      // --- Interactive Chip Selectors ---
      document.addEventListener('click', function (e) {
        var chip = e.target.closest('.settings-chips .atl-booking-tab');
        if (!chip) return;
        var parentGroup = chip.parentElement;
        parentGroup.querySelectorAll('.atl-booking-tab').forEach(function (b) {
          b.classList.toggle('is-active', b === chip);
        });
      });

      // --- Bookings List Filters ---
      document.querySelectorAll('.view-bookings [data-list-filter]').forEach(function (tab) {
        tab.addEventListener('click', function () {
          var filter = this.dataset.listFilter;
          this.parentElement.querySelectorAll('.atl-booking-tab').forEach(function (t) {
            t.classList.toggle('is-active', t === tab);
          });
          var rows = document.querySelectorAll('.view-bookings .atl-appt');
          rows.forEach(function (row) {
            var status = (row.dataset.status || row.textContent).toLowerCase();
            var show = (filter === 'all') ||
                       (filter === 'upcoming' && !status.includes('cancelled') && !status.includes('completed')) ||
                       (filter === 'completed' && status.includes('completed')) ||
                       (filter === 'pending' && status.includes('pending')) ||
                       (filter === 'cancelled' && status.includes('cancelled'));
            row.style.display = show ? '' : 'none';
          });
        });
      });

      // --- Clients List Filters ---
      document.querySelectorAll('.view-clients [data-list-filter]').forEach(function (tab) {
        tab.addEventListener('click', function () {
          var filter = this.dataset.listFilter;
          this.parentElement.querySelectorAll('.atl-booking-tab').forEach(function (t) {
            t.classList.toggle('is-active', t === tab);
          });
          var rows = document.querySelectorAll('.client-row');
          rows.forEach(function (row) {
            var text = row.textContent.toLowerCase();
            var show = (filter === 'all') ||
                       (filter === 'vip' && text.includes('vip')) ||
                       (filter === 'new' && text.includes('new')) ||
                       (filter === 'inactive' && text.includes('inactive'));
            row.style.display = show ? '' : 'none';
          });
        });
      });

      // --- Portfolio Filters ---
      document.querySelectorAll('.portfolio-filter').forEach(function (tab) {
        tab.addEventListener('click', function () {
          var filter = this.dataset.filter;
          document.querySelectorAll('.portfolio-filter').forEach(function (t) {
            t.classList.toggle('is-active', t === tab);
          });
          document.querySelectorAll('.portfolio-card').forEach(function (card) {
            var cat = card.dataset.category || '';
            card.style.display = (filter === 'All' || cat === filter) ? '' : 'none';
          });
        });
      });

      // --- Kit Inventory Filters ---
      document.querySelectorAll('.kit-filter').forEach(function (tab) {
        tab.addEventListener('click', function () {
          var filter = this.dataset.filter;
          document.querySelectorAll('.kit-filter').forEach(function (t) {
            t.classList.toggle('is-active', t === tab);
          });
          document.querySelectorAll('.kit-row').forEach(function (row) {
            var cat = row.dataset.category;
            var status = row.dataset.status;
            var exp = row.dataset.expiring === 'true';
            var show = (filter === 'All') ||
                       (row.dataset.category === filter) ||
                       (filter === 'low' && status === 'low') ||
                       (filter === 'expiring' && exp);
            row.style.display = show ? '' : 'none';
          });
          // Hide empty category headers
          document.querySelectorAll('.kit-group').forEach(function (grp) {
            var next = grp.nextElementSibling;
            var visible = false;
            while (next && next.classList.contains('kit-row')) {
              if (next.style.display !== 'none') visible = true;
              next = next.nextElementSibling;
            }
            grp.style.display = visible ? '' : 'none';
          });
        });
      });

      // --- Payment List Filters ---
      document.querySelectorAll('.payment-filter').forEach(function (tab) {
        tab.addEventListener('click', function () {
          var filter = this.dataset.filter;
          document.querySelectorAll('.payment-filter').forEach(function (t) {
            t.classList.toggle('is-active', t === tab);
          });
          document.querySelectorAll('.payment-row').forEach(function (row) {
            var status = row.dataset.status;
            var show = (filter === 'All') || (status === filter);
            row.style.display = show ? '' : 'none';
          });
        });
      });

      // --- Dynamic Client Profile Viewer ---
      var clientProfiles = {
        rhea: { name: 'Rhea Kapoor', meta: 'VIP client · rhea@example.com', spend: 'UGX 1,840,000', bookings: '8', phone: '+256 701 234 567', notes: 'Prefers lightweight dew finish. Sensitive eye area.', last: '12 Aug 2026' },
        jade: { name: 'Jade Lin', meta: 'New client · jade@example.com', spend: 'UGX 420,000', bookings: '2', phone: '+256 772 987 654', notes: 'Editorial fashion model. Enjoys bold graphic eyeliner.', last: '8 Aug 2026' },
        amara: { name: 'Amara Okoye', meta: 'Regular client · amara@example.com', spend: 'UGX 980,000', bookings: '3', phone: '+256 750 334 221', notes: 'Soft glam, warm golden undertones.', last: '2 Aug 2026' },
        mira: { name: 'Mira Petrova', meta: 'VIP client · mira@example.com', spend: 'UGX 2,460,000', bookings: '11', phone: '+256 704 556 778', notes: 'Studio portraits and video shoots.', last: '28 Jul 2026' },
        clara: { name: 'Clara Dumont', meta: 'New client · clara@example.com', spend: 'UGX 210,000', bookings: '1', phone: '+256 788 112 334', notes: 'Bridal consultation scheduled.', last: '19 Jul 2026' }
      };

      document.querySelectorAll('.client-row').forEach(function (row) {
        row.addEventListener('click', function () {
          document.querySelectorAll('.client-row').forEach(function (r) { r.classList.remove('is-selected'); });
          this.classList.add('is-selected');
          var p = clientProfiles[this.dataset.client] || {
            name: this.querySelector('strong').textContent,
            meta: 'Client · studio',
            spend: 'UGX 0',
            bookings: '1',
            phone: '+256 700 000 000',
            notes: 'Studio client profile',
            last: 'Recent'
          };
          var initials = p.name.split(' ').map(function(w){return w[0]||'';}).join('').slice(0,2).toUpperCase();
          document.getElementById('profile-avatar').textContent = initials;
          document.getElementById('profile-name').textContent = p.name;
          document.getElementById('profile-meta').textContent = p.meta;
          document.getElementById('profile-spend').textContent = p.spend;
          document.getElementById('profile-bookings').textContent = p.bookings;
          document.getElementById('profile-phone').textContent = p.phone;
          document.getElementById('profile-notes').textContent = p.notes;
          document.getElementById('profile-last-visit').textContent = 'Last visit · ' + p.last;
        });
      });

      // --- Dynamic Balance Calculator in Booking Form ---
      var bookingForm = document.getElementById('booking-form');
      if (bookingForm) {
        function calculateBalance() {
          var totalRaw = bookingForm.elements['unit_price'].value.replace(/[^0-9.]/g, '');
          var paidRaw = bookingForm.elements['amount'].value.replace(/[^0-9.]/g, '');
          var total = parseFloat(totalRaw) || 0;
          var paid = parseFloat(paidRaw) || 0;
          var balance = Math.max(0, total - paid);
          var balanceEl = document.getElementById('bookingBalance');
          if (balanceEl) {
            balanceEl.textContent = 'Outstanding balance: UGX ' + balance.toLocaleString();
            balanceEl.style.color = balance > 0 ? '#ffaa66' : 'var(--atl-smoke)';
          }
        }
        bookingForm.elements['unit_price'].addEventListener('input', calculateBalance);
        bookingForm.elements['amount'].addEventListener('input', calculateBalance);

        bookingForm.addEventListener('submit', function (e) {
          e.preventDefault();
          var clientName = bookingForm.elements['client_name'].value.trim();
          var service = bookingForm.elements['service'].value.trim();
          var unitPrice = parseFloat(bookingForm.elements['unit_price'].value.replace(/[^0-9.]/g, '')) || 0;
          var bookedDate = bookingForm.elements['date'].value + ' ' + bookingForm.elements['time'].value;
          var amountPaid = parseFloat(bookingForm.elements['amount'].value.replace(/[^0-9.]/g, '')) || 0;
          var status = bookingForm.elements['status'].value;
          var notes = bookingForm.elements['notes'].value;

          var submitBtn = bookingForm.querySelector('button[type="submit"]');
          postData('add_booking', {
            client_name: clientName,
            service: service,
            unit_price: unitPrice,
            booked_date: bookedDate,
            duration: 60,
            amount: amountPaid,
            status: status,
            notes: notes
          }, submitBtn, function () {
            // Append newly booked row to booking list dynamically
            var initials = clientName.split(' ').map(function(x){return x[0]||'';}).join('').slice(0,2).toUpperCase();
            var row = document.createElement('div');
            row.className = 'atl-appt';
            row.dataset.status = status;
            row.style.borderTop = '1px solid var(--atl-hairline)';
            row.innerHTML = '<div class="atl-appt-time">' + bookingForm.elements['time'].value + '</div>' +
                            '<div class="atl-avatar-sm">' + initials + '</div>' +
                            '<div style="flex:1"><strong>' + clientName + '</strong><div class="atl-caption">' + service + ' · 60 min</div></div>' +
                            '<div class="atl-appt-time" style="text-align:right">UGX ' + unitPrice.toLocaleString() + '</div>' +
                            '<span class="atl-badge ' + (status === 'confirmed' ? 'is-confirmed' : status === 'cancelled' ? 'is-cancelled' : 'is-pending') + '">' + status + '</span>';
            var container = document.getElementById('booking-list-container');
            if (container) container.prepend(row);
            bookingForm.reset();
            calculateBalance();
          });
        });
      }

      // --- Add Product Form Submission ---
      var productForm = document.getElementById('product-form');
      if (productForm) {
        productForm.addEventListener('submit', function (e) {
          e.preventDefault();
          var name = productForm.elements['name'].value.trim();
          var brand = productForm.elements['brand'].value.trim();
          var activeCategoryBtn = document.querySelector('#product-category-chips .atl-booking-tab.is-active');
          var category = activeCategoryBtn ? activeCategoryBtn.dataset.value : 'Face';
          var quantity = parseInt(productForm.elements['quantity'].value, 10) || 0;
          var maxQuantity = parseInt(productForm.elements['max_quantity'].value, 10) || (quantity > 0 ? quantity * 2 : 20);
          var expiryDate = productForm.elements['expiry_date'].value.trim();

          var submitBtn = productForm.querySelector('button[type="submit"]');
          postData('add_product', {
            name: name,
            brand: brand,
            category: category,
            quantity: quantity,
            max_quantity: maxQuantity,
            expiry_date: expiryDate
          }, submitBtn, function () {
            // Append product to inventory UI
            var pct = Math.min(100, Math.round((quantity / maxQuantity) * 100));
            var row = document.createElement('div');
            row.className = 'atl-appt kit-row';
            row.dataset.category = category;
            row.dataset.status = quantity <= 3 ? 'low' : 'in';
            row.dataset.expiring = 'false';
            row.style.borderTop = '1px solid var(--atl-hairline)';
            row.innerHTML = '<div class="atl-frame" style="width:34px;height:34px;min-height:0;padding:0;flex:0 0 34px;display:grid;place-items:center">' + name.charAt(0).toUpperCase() + '</div>' +
                            '<div style="flex:1"><strong>' + name + '</strong><div class="atl-caption">' + brand + '</div></div>' +
                            '<div class="atl-appt-time">' + quantity + ' / ' + maxQuantity + '<div class="kit-stock"><i style="width:' + pct + '%"></i></div></div>' +
                            '<div class="atl-appt-time">' + (expiryDate || 'No expiry') + '</div>' +
                            '<span class="atl-badge ' + (quantity <= 3 ? 'is-overdue' : 'is-confirmed') + '">' + (quantity <= 3 ? 'Low stock' : 'In stock') + '</span>';
            var kitList = document.getElementById('kit-list');
            if (kitList) kitList.prepend(row);
            productForm.reset();
          });
        });
      }

      // --- Record Payment Form Submission ---
      var paymentForm = document.getElementById('payment-form');
      if (paymentForm) {
        paymentForm.addEventListener('submit', function (e) {
          e.preventDefault();
          var clientName = paymentForm.elements['client_name'].value.trim();
          var amount = parseFloat(paymentForm.elements['amount'].value.replace(/[^0-9.]/g, '')) || 0;
          var activeMethodBtn = document.querySelector('#payment-method-chips .atl-booking-tab.is-active');
          var method = activeMethodBtn ? activeMethodBtn.dataset.value : 'Card';
          var paidAt = paymentForm.elements['paid_at'].value;
          var invoiceRef = paymentForm.elements['invoice_reference'].value.trim();
          var note = paymentForm.elements['note'].value.trim();

          var submitBtn = paymentForm.querySelector('button[type="submit"]');
          postData('add_payment', {
            client_name: clientName,
            amount: amount,
            method: method,
            paid_at: paidAt,
            invoice_reference: invoiceRef,
            note: note,
            status: 'Paid'
          }, submitBtn, function () {
            var initials = clientName.split(' ').map(function(x){return x[0]||'';}).join('').slice(0,2).toUpperCase();
            var row = document.createElement('div');
            row.className = 'atl-appt payment-row';
            row.dataset.status = 'Paid';
            row.style.borderTop = '1px solid var(--atl-hairline)';
            row.innerHTML = '<div class="atl-avatar-sm">' + initials + '</div>' +
                            '<div style="flex:1"><strong>' + clientName + '</strong><div class="atl-caption">' + (note || 'Studio payment') + ' · ' + (invoiceRef || 'INV') + '</div></div>' +
                            '<span class="atl-badge">' + method + '</span>' +
                            '<div class="atl-appt-time" style="text-align:right">UGX ' + amount.toLocaleString() + '</div>' +
                            '<span class="atl-badge is-confirmed">Paid</span>';
            var pList = document.getElementById('payment-list');
            if (pList) pList.prepend(row);
            paymentForm.reset();
          });
        });
      }

      // --- Clear / Cancel Form Buttons ---
      document.querySelectorAll('.form-cancel-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
          var f = this.closest('form');
          if (f) {
            f.reset();
            var bal = document.getElementById('bookingBalance');
            if (bal) bal.textContent = 'Outstanding balance: UGX 0';
          }
        });
      });

      // --- Save All Settings Handler ---
      var saveSettingsBtn = document.getElementById('save-all-settings-btn');
      if (saveSettingsBtn) {
        saveSettingsBtn.addEventListener('click', function () {
          var settings = {};
          document.querySelectorAll('.view-settings input, .view-settings textarea').forEach(function (inp) {
            if (inp.name) settings[inp.name] = inp.value;
          });
          var curChip = document.querySelector('#currency-chips .atl-booking-tab.is-active');
          if (curChip) settings.currency = curChip.dataset.value;
          postData('save_settings', settings, this);
        });
      }

      // --- Lightbox Modal for Portfolio Looks ---
      document.querySelectorAll('.portfolio-card').forEach(function (card) {
        card.addEventListener('click', function () {
          var category = this.dataset.category || 'Portfolio';
          var client = this.dataset.client || 'Studio Model';
          var date = this.dataset.date || '';

          var backdrop = document.createElement('div');
          backdrop.className = 'modal-backdrop';
          backdrop.innerHTML = '<div class="modal" style="position:relative;max-width:540px">' +
                               '<button aria-label="Close" style="position:absolute;right:14px;top:14px;background:none;border:none;color:var(--atl-porcelain);font-size:24px;cursor:pointer">&times;</button>' +
                               '<div class="atl-frame" style="aspect-ratio:3/4;min-height:360px;display:flex;align-items:flex-end;font-size:1.3rem">' + category + ' Glam</div>' +
                               '<div style="display:flex;justify-content:space-between;align-items:center;margin-top:16px">' +
                               '<div><strong style="font-size:1.1rem">' + client + '</strong><div class="atl-caption">' + date + ' · Atelier Studio Look</div></div>' +
                               '<span class="atl-badge is-confirmed">' + category + '</span>' +
                               '</div>' +
                               '</div>';
          document.body.appendChild(backdrop);
          backdrop.addEventListener('click', function (e) {
            if (e.target === backdrop || e.target.tagName === 'BUTTON') backdrop.remove();
          });
        });
      });

      // --- Upload Look Handler ---
      var uploadBtn = document.getElementById('open-upload-btn');
      if (uploadBtn) {
        uploadBtn.addEventListener('click', function () {
          var fileInput = document.createElement('input');
          fileInput.type = 'file';
          fileInput.accept = 'image/jpeg,image/png,image/webp';
          fileInput.onchange = function () {
            if (!fileInput.files.length) return;
            var fd = new FormData();
            fd.append('file', fileInput.files[0]);
            fd.append('category', 'Studio');
            fetch('api.php?action=upload_portfolio', { method: 'POST', body: fd })
              .then(function (r) { return r.json(); })
              .then(function (j) {
                if (!j.ok) throw new Error(j.error || 'Upload failed');
                showFeedback('Look uploaded successfully to portfolio', 'success');
              })
              .catch(function (err) {
                showFeedback(err.message || 'Upload error', 'error');
              });
          };
          fileInput.click();
        });
      }

      // --- Add Client Modal Dialog ---
      var addClientBtn = document.getElementById('open-add-client-btn');
      if (addClientBtn) {
        addClientBtn.addEventListener('click', function () {
          var backdrop = document.createElement('div');
          backdrop.className = 'modal-backdrop';
          backdrop.innerHTML = '<div class="modal">' +
                               '<h3 class="atl-greeting" style="font-size:1.3rem;margin-top:0">Add new client</h3>' +
                               '<form id="new-client-modal-form" style="display:grid;gap:12px;margin-top:16px">' +
                               '<label class="atl-caption">FULL NAME<input name="name" class="atl-booking-input" placeholder="e.g. Zara Kigozi" required /></label>' +
                               '<label class="atl-caption">PHONE NUMBER<input name="phone" class="atl-booking-input" placeholder="+256 7..." /></label>' +
                               '<label class="atl-caption">EMAIL ADDRESS<input name="email" class="atl-booking-input" type="email" placeholder="zara@example.com" /></label>' +
                               '<label class="atl-caption">NOTES &amp; PREFERENCES<textarea name="notes" class="atl-booking-input" placeholder="Bridal inquiry, skin sensitivities..."></textarea></label>' +
                               '<div style="display:flex;gap:8px;justify-content:flex-end;margin-top:8px">' +
                               '<button type="button" class="atl-booking-tab modal-cancel-btn">Cancel</button>' +
                               '<button type="submit" class="atl-booking-primary">Save client</button>' +
                               '</div>' +
                               '</form>' +
                               '</div>';
          document.body.appendChild(backdrop);
          backdrop.querySelector('.modal-cancel-btn').addEventListener('click', function () { backdrop.remove(); });
          backdrop.addEventListener('click', function (e) { if (e.target === backdrop) backdrop.remove(); });

          var modalForm = backdrop.querySelector('#new-client-modal-form');
          modalForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var name = modalForm.elements['name'].value.trim();
            var phone = modalForm.elements['phone'].value.trim();
            var email = modalForm.elements['email'].value.trim();
            var notes = modalForm.elements['notes'].value.trim();

            postData('add_client', { name: name, phone: phone, email: email, notes: notes }, null, function (res) {
              backdrop.remove();
              // Add to client list
              var initials = name.split(' ').map(function(x){return x[0]||'';}).join('').slice(0,2).toUpperCase();
              var row = document.createElement('div');
              row.className = 'atl-appt client-row';
              row.dataset.client = name.toLowerCase().replace(/\s+/g, '');
              row.style.borderTop = '1px solid var(--atl-hairline)';
              row.style.cursor = 'pointer';
              row.innerHTML = '<div class="atl-avatar-sm">' + initials + '</div>' +
                              '<div style="flex:1"><strong>' + name + '</strong> <span class="atl-badge">New</span><div class="atl-caption">Just added · ' + phone + '</div></div>' +
                              '<div class="atl-appt-time">0 visits</div>' +
                              '<div class="atl-appt-time" style="text-align:right">UGX 0</div>';
              var cList = document.getElementById('client-list');
              if (cList) cList.prepend(row);
            });
          });
        });
      }

      // --- Change Photo Mock Dialog ---
      var changePhotoBtn = document.getElementById('change-photo-btn');
      if (changePhotoBtn) {
        changePhotoBtn.addEventListener('click', function () {
          var input = document.createElement('input');
          input.type = 'file';
          input.accept = 'image/*';
          input.onchange = function () {
            if (input.files.length) {
              showFeedback('Profile photo updated', 'success');
            }
          };
          input.click();
        });
      }

      // --- Load Live Dashboard Data from API ---
      fetch('api.php?action=dashboard')
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (!data.ok) return;
          if (data.revenue) {
            var el = document.getElementById('metric-revenue');
            if (el) el.textContent = 'UGX ' + Number(data.revenue).toLocaleString();
          }
          if (data.bookings_today !== undefined) {
            var elB = document.getElementById('metric-bookings');
            if (elB) elB.textContent = data.bookings_today;
          }
          if (data.clients !== undefined) {
            var elC = document.getElementById('metric-clients');
            if (elC) elC.textContent = data.clients;
          }
          if (data.average_value) {
            var elA = document.getElementById('metric-average');
            if (elA) elA.textContent = 'UGX ' + Number(data.average_value).toLocaleString();
          }
        })
        .catch(function () {});
    });

    // Helper: prefill booking from client profile
    function prefillBookingForClient() {
      var name = document.getElementById('profile-name').textContent;
      switchView('bookings');
      var input = document.querySelector('#booking-form input[name="client_name"]');
      if (input) {
        input.value = name;
        input.focus();
      }
    }

    // Helper: confirm delete account
    function confirmDeleteAccount() {
      var backdrop = document.createElement('div');
      backdrop.className = 'modal-backdrop';
      backdrop.innerHTML = '<div class="modal">' +
                           '<h3 class="atl-greeting" style="color:#ff8888;margin-top:0">Delete studio account?</h3>' +
                           '<p class="atl-caption">This action is permanent and cannot be undone. All bookings and client records will be wiped.</p>' +
                           '<div style="display:flex;gap:8px;justify-content:flex-end;margin-top:20px">' +
                           '<button class="atl-booking-tab" onclick="this.closest(\'.modal-backdrop\').remove()">Cancel</button>' +
                           '<button class="atl-booking-primary" style="background:#ff5555;color:#fff;border-color:#ff5555" onclick="this.closest(\'.modal-backdrop\').remove();showFeedback(\'Account deletion request recorded\',\'error\')">Permanently Delete</button>' +
                           '</div>' +
                           '</div>';
      document.body.appendChild(backdrop);
    }
  </script>
</body>
</html>
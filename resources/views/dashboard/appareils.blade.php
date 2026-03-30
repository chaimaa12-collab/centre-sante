<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>MedEquip — Gestion du Matériel Médical</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
<style>
/* ═══════════════════════════════════════════
   TOKENS — THÈME BLANC
═══════════════════════════════════════════ */
:root {
  --bg:        #f4f6f9;
  --surface:   #ffffff;
  --surface2:  #f8fafc;
  --surface3:  #eef1f6;
  --border:    rgba(0,0,0,.08);
  --border2:   rgba(0,0,0,.14);

  --text:      #0f1520;
  --text-2:    #4a5568;
  --text-3:    #94a3b8;

  --cyan:      #0097a7;
  --cyan-dim:  rgba(0,151,167,.09);
  --cyan-glow: rgba(0,151,167,.18);

  --green:     #16a34a;
  --green-dim: rgba(22,163,74,.10);
  --red:       #dc2626;
  --red-dim:   rgba(220,38,38,.09);
  --amber:     #d97706;
  --amber-dim: rgba(217,119,6,.10);
  --blue:      #2563eb;
  --blue-dim:  rgba(37,99,235,.09);
  --violet:    #7c3aed;
  --violet-dim:rgba(124,58,237,.09);

  --radius:    10px;
  --radius-lg: 16px;
  --transition:.18s cubic-bezier(.4,0,.2,1);

  --font-ui:   'Instrument Sans', sans-serif;
  --font-head: 'Syne', sans-serif;
  --font-mono: 'IBM Plex Mono', monospace;

  --shadow-sm: 0 1px 4px rgba(0,0,0,.06), 0 0 0 1px rgba(0,0,0,.04);
  --shadow-md: 0 4px 16px rgba(0,0,0,.08), 0 1px 4px rgba(0,0,0,.04);
  --shadow-lg: 0 12px 40px rgba(0,0,0,.12), 0 2px 8px rgba(0,0,0,.06);
}

*,*::before,*::after { box-sizing:border-box; margin:0; padding:0 }
html { scroll-behavior:smooth }
body {
  font-family: var(--font-ui);
  background: var(--bg);
  color: var(--text);
  display: flex;
  min-height: 100vh;
  -webkit-font-smoothing: antialiased;
}

::-webkit-scrollbar { width:5px; height:5px }
::-webkit-scrollbar-track { background:transparent }
::-webkit-scrollbar-thumb { background:#cbd5e1; border-radius:3px }

/* ═══════════════════════════════════════════
   SIDEBAR
═══════════════════════════════════════════ */
.sidebar {
  width: 240px;
  background: var(--surface);
  border-right: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  flex-shrink: 0;
  position: fixed;
  top: 0; left: 0; bottom: 0;
  z-index: 200;
  box-shadow: var(--shadow-sm);
}

.sb-brand {
  padding: 1.5rem 1.4rem 1.2rem;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  gap: .85rem;
}
.sb-brand-mark {
  width: 36px; height: 36px;
  background: linear-gradient(135deg, var(--cyan), #005f6b);
  border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  font-size: .9rem;
  flex-shrink: 0;
  box-shadow: 0 4px 12px var(--cyan-glow);
  color: #fff;
}
.sb-brand-name {
  font-family: var(--font-head);
  font-size: 1rem;
  font-weight: 800;
  color: var(--text);
  letter-spacing: -.02em;
  line-height: 1.2;
}
.sb-brand-sub {
  font-size: .6rem;
  color: var(--text-3);
  letter-spacing: .1em;
  text-transform: uppercase;
  margin-top: .1rem;
}

.sb-user {
  padding: .9rem 1.4rem;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  gap: .75rem;
}
.sb-avatar {
  width: 32px; height: 32px;
  background: var(--cyan-dim);
  border: 1.5px solid var(--cyan);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-head);
  font-size: .7rem;
  font-weight: 700;
  color: var(--cyan);
  flex-shrink: 0;
}
.sb-user-name { font-size: .8rem; font-weight: 600; color: var(--text) }
.sb-user-role {
  font-size: .62rem;
  color: var(--text-3);
  margin-top: .1rem;
  display: flex;
  align-items: center;
  gap: .3rem;
}
.sb-user-role::before {
  content: '';
  width: 6px; height: 6px;
  background: var(--green);
  border-radius: 50%;
  display: inline-block;
  box-shadow: 0 0 4px var(--green);
}

.sb-nav { padding: 1rem 0; flex: 1; overflow-y: auto }
.sb-group {
  font-size: .58rem;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--text-3);
  padding: .8rem 1.4rem .3rem;
}
.sb-item {
  display: flex;
  align-items: center;
  gap: .7rem;
  padding: .55rem 1.4rem;
  font-size: .78rem;
  font-weight: 500;
  color: var(--text-2);
  cursor: pointer;
  transition: var(--transition);
  border-left: 2px solid transparent;
  position: relative;
}
.sb-item:hover { color: var(--text); background: var(--surface2) }
.sb-item.active {
  color: var(--cyan);
  background: var(--cyan-dim);
  border-left-color: var(--cyan);
  font-weight: 600;
}
.sb-item-ico {
  width: 18px;
  display: flex; align-items: center; justify-content: center;
  font-size: .9rem;
  flex-shrink: 0;
}
.sb-badge {
  margin-left: auto;
  background: var(--cyan-dim);
  color: var(--cyan);
  font-size: .58rem;
  font-weight: 700;
  padding: .1rem .45rem;
  border-radius: 20px;
  border: 1px solid rgba(0,151,167,.2);
}

.sb-bottom {
  padding: 1rem 1.4rem;
  border-top: 1px solid var(--border);
}
.sb-logout {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: .5rem;
  padding: .55rem;
  background: transparent;
  border: 1px solid var(--border2);
  border-radius: var(--radius);
  color: var(--text-2);
  font-size: .75rem;
  font-weight: 600;
  font-family: var(--font-ui);
  cursor: pointer;
  transition: var(--transition);
}
.sb-logout:hover { border-color: var(--red); color: var(--red); background: var(--red-dim) }

/* ═══════════════════════════════════════════
   MAIN
═══════════════════════════════════════════ */
.main { margin-left: 240px; flex: 1; display: flex; flex-direction: column; min-height: 100vh }

.topbar {
  background: var(--surface);
  border-bottom: 1px solid var(--border);
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  position: sticky;
  top: 0;
  z-index: 100;
  box-shadow: 0 1px 0 var(--border);
}
.topbar-title {
  font-family: var(--font-head);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--text);
  letter-spacing: -.01em;
  display: flex;
  align-items: center;
  gap: .6rem;
}
.topbar-title .dot {
  width: 8px; height: 8px;
  background: var(--cyan);
  border-radius: 50%;
  box-shadow: 0 0 8px var(--cyan-glow);
  flex-shrink: 0;
}
.topbar-sub {
  font-size: .7rem;
  color: var(--text-3);
  margin-top: .2rem;
  font-family: var(--font-mono);
}
.topbar-actions { display: flex; align-items: center; gap: .6rem }

/* ═══════════════════════════════════════════
   BUTTONS
═══════════════════════════════════════════ */
.btn {
  display: inline-flex;
  align-items: center;
  gap: .4rem;
  font-family: var(--font-ui);
  font-size: .78rem;
  font-weight: 600;
  cursor: pointer;
  border: none;
  border-radius: var(--radius);
  padding: .55rem 1.1rem;
  transition: var(--transition);
  white-space: nowrap;
  text-decoration: none;
  letter-spacing: .01em;
}
.btn-primary {
  background: var(--cyan);
  color: #fff;
  box-shadow: 0 2px 8px var(--cyan-glow);
}
.btn-primary:hover {
  background: #007b8a;
  box-shadow: 0 4px 16px var(--cyan-glow);
  transform: translateY(-1px);
}
.btn-ghost {
  background: transparent;
  color: var(--text-2);
  border: 1px solid var(--border2);
}
.btn-ghost:hover { background: var(--surface3); color: var(--text) }

.btn-green { background: var(--green-dim); color: var(--green); border: 1px solid rgba(22,163,74,.2) }
.btn-green:hover { background: rgba(22,163,74,.18); transform:translateY(-1px) }

.btn-red { background: var(--red-dim); color: var(--red); border: 1px solid rgba(220,38,38,.2) }
.btn-red:hover { background: rgba(220,38,38,.18); transform:translateY(-1px) }

.btn-amber { background: var(--amber-dim); color: var(--amber); border: 1px solid rgba(217,119,6,.2) }
.btn-amber:hover { background: rgba(217,119,6,.18); transform:translateY(-1px) }

.btn-blue { background: var(--blue-dim); color: var(--blue); border: 1px solid rgba(37,99,235,.2) }
.btn-blue:hover { background: rgba(37,99,235,.18); transform:translateY(-1px) }

.btn-sm { padding: .38rem .85rem; font-size: .72rem }
.btn-xs { padding: .25rem .6rem; font-size: .67rem; border-radius: 6px }
.btn-icon { width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px }

.btn-danger-icon {
  background: transparent;
  color: var(--text-3);
  border: 1px solid transparent;
  transition: var(--transition);
}
.btn-danger-icon:hover { color: var(--red); border-color: rgba(220,38,38,.3); background: var(--red-dim) }

/* ═══════════════════════════════════════════
   CONTENT
═══════════════════════════════════════════ */
.content { padding: 1.8rem 2rem; flex: 1 }

/* ═══════════════════════════════════════════
   KPIS
═══════════════════════════════════════════ */
.kpis {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: .85rem;
  margin-bottom: 1.8rem;
}
.kpi {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1.1rem 1.3rem;
  position: relative;
  overflow: hidden;
  cursor: default;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}
.kpi:hover { box-shadow: var(--shadow-md); transform: translateY(-2px) }
.kpi::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
}
.kpi.k-cyan::before  { background: var(--cyan) }
.kpi.k-green::before { background: var(--green) }
.kpi.k-amber::before { background: var(--amber) }
.kpi.k-red::before   { background: var(--red) }
.kpi.k-blue::before  { background: var(--blue) }

.kpi-label {
  font-size: .62rem;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: var(--text-3);
  margin-bottom: .6rem;
}
.kpi-value {
  font-family: var(--font-head);
  font-size: 2rem;
  font-weight: 800;
  color: var(--text);
  line-height: 1;
  letter-spacing: -.04em;
}
.kpi.k-cyan  .kpi-value { color: var(--cyan) }
.kpi.k-green .kpi-value { color: var(--green) }
.kpi.k-amber .kpi-value { color: var(--amber) }
.kpi.k-red   .kpi-value { color: var(--red) }
.kpi.k-blue  .kpi-value { color: var(--blue) }
.kpi-sub {
  font-size: .65rem;
  color: var(--text-3);
  margin-top: .4rem;
  font-family: var(--font-mono);
}
.kpi-icon {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  font-size: 2rem;
  opacity: .06;
}

/* ═══════════════════════════════════════════
   TABS
═══════════════════════════════════════════ */
.tab-nav {
  display: flex;
  align-items: center;
  border-bottom: 2px solid var(--border);
  margin-bottom: 1.5rem;
}
.tab-nav-item {
  font-size: .78rem;
  font-weight: 600;
  color: var(--text-3);
  padding: .75rem 1.3rem;
  cursor: pointer;
  border-bottom: 2px solid transparent;
  transition: var(--transition);
  display: flex;
  align-items: center;
  gap: .45rem;
  position: relative;
  bottom: -2px;
  font-family: var(--font-ui);
  background: none;
  border-top: none;
  border-left: none;
  border-right: none;
}
.tab-nav-item:hover { color: var(--text-2) }
.tab-nav-item.active { color: var(--cyan); border-bottom-color: var(--cyan) }
.tab-counter {
  background: var(--surface3);
  color: var(--text-3);
  font-size: .58rem;
  font-weight: 700;
  padding: .1rem .4rem;
  border-radius: 4px;
  font-family: var(--font-mono);
}
.tab-nav-item.active .tab-counter { background: var(--cyan-dim); color: var(--cyan) }

/* ═══════════════════════════════════════════
   SECTIONS
═══════════════════════════════════════════ */
.section { display: none }
.section.active { display: block }

/* ═══════════════════════════════════════════
   TOOLBAR
═══════════════════════════════════════════ */
.toolbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  margin-bottom: 1.2rem;
  flex-wrap: wrap;
}
.toolbar-left { display: flex; align-items: center; gap: .6rem; flex-wrap: wrap }
.toolbar-right { display: flex; align-items: center; gap: .6rem }

.filter-select {
  background: var(--surface);
  border: 1px solid var(--border2);
  border-radius: var(--radius);
  padding: .5rem .85rem;
  font-size: .75rem;
  font-family: var(--font-ui);
  color: var(--text-2);
  cursor: pointer;
  outline: none;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}
.filter-select:focus { border-color: var(--cyan); color: var(--text); box-shadow: 0 0 0 3px var(--cyan-dim) }
option { background: var(--surface) }

.view-switch {
  display: flex;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 3px;
  gap: 2px;
  box-shadow: var(--shadow-sm);
}
.view-sw-btn {
  padding: .32rem .7rem;
  border-radius: 7px;
  font-size: .7rem;
  font-weight: 600;
  border: none;
  cursor: pointer;
  font-family: var(--font-ui);
  color: var(--text-3);
  background: transparent;
  transition: var(--transition);
}
.view-sw-btn.active { background: var(--surface3); color: var(--text); box-shadow: var(--shadow-sm) }

/* ═══════════════════════════════════════════
   DEVICE GRID
═══════════════════════════════════════════ */
.device-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}
.device-card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1.3rem;
  transition: var(--transition);
  position: relative;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
}
.device-card::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 2px;
  background: linear-gradient(90deg, var(--cyan), transparent);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform .3s ease;
}
.device-card:hover {
  border-color: rgba(0,151,167,.25);
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}
.device-card:hover::after { transform: scaleX(1) }

.dc-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 1rem;
  gap: .5rem;
}
.dc-icon {
  width: 42px; height: 42px;
  background: var(--surface3);
  border-radius: 10px;
  border: 1px solid var(--border);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}
.dc-meta { flex: 1; min-width: 0 }
.dc-name {
  font-family: var(--font-head);
  font-size: .9rem;
  font-weight: 700;
  color: var(--text);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  letter-spacing: -.01em;
}
.dc-type {
  font-size: .62rem;
  color: var(--cyan);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .1em;
  margin-top: .15rem;
}
.dc-body { margin-bottom: .9rem }
.dc-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: .3rem 0;
  border-bottom: 1px solid var(--border);
}
.dc-row:last-child { border-bottom: none }
.dc-row-label { font-size: .68rem; color: var(--text-3); font-weight: 500 }
.dc-row-value { font-size: .72rem; color: var(--text-2); font-weight: 600 }
.dc-row-value.mono { font-family: var(--font-mono); font-size: .68rem }

.dc-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: .8rem;
  border-top: 1px solid var(--border);
  gap: .4rem;
}
.dc-footer-left { display: flex; align-items: center; gap: .4rem; flex-wrap: wrap }
.dc-actions { display: flex; gap: .3rem }

.dc-transfer {
  margin-top: .6rem;
  padding: .5rem .7rem;
  background: var(--amber-dim);
  border: 1px solid rgba(217,119,6,.2);
  border-radius: 8px;
  display: flex;
  align-items: center;
  gap: .5rem;
  font-size: .68rem;
  color: var(--amber);
}
.dc-transfer-ico { font-size: .8rem; flex-shrink: 0 }
.dc-transfer-text { font-weight: 700 }
.dc-transfer-date { margin-left: auto; font-family: var(--font-mono); opacity: .7 }

/* ═══════════════════════════════════════════
   CHIPS
═══════════════════════════════════════════ */
.chip {
  display: inline-flex;
  align-items: center;
  gap: .3rem;
  font-size: .62rem;
  font-weight: 700;
  padding: .2rem .6rem;
  border-radius: 6px;
  letter-spacing: .03em;
  white-space: nowrap;
}
.chip::before {
  content: '';
  width: 5px; height: 5px;
  border-radius: 50%;
  flex-shrink: 0;
}
.chip-green  { background: var(--green-dim);  color: var(--green);  border: 1px solid rgba(22,163,74,.2) }
.chip-green::before  { background: var(--green);  box-shadow: 0 0 4px rgba(22,163,74,.5) }
.chip-amber  { background: var(--amber-dim);  color: var(--amber);  border: 1px solid rgba(217,119,6,.2) }
.chip-amber::before  { background: var(--amber) }
.chip-red    { background: var(--red-dim);    color: var(--red);    border: 1px solid rgba(220,38,38,.2) }
.chip-red::before    { background: var(--red) }
.chip-cyan   { background: var(--cyan-dim);   color: var(--cyan);   border: 1px solid rgba(0,151,167,.2) }
.chip-cyan::before   { background: var(--cyan) }
.chip-blue   { background: var(--blue-dim);   color: var(--blue);   border: 1px solid rgba(37,99,235,.2) }
.chip-blue::before   { background: var(--blue) }
.chip-violet { background: var(--violet-dim); color: var(--violet); border: 1px solid rgba(124,58,237,.2) }
.chip-violet::before { background: var(--violet) }
.chip-qty {
  background: var(--blue-dim);
  color: var(--blue);
  border: 1px solid rgba(37,99,235,.2);
  font-family: var(--font-mono);
}
.chip-qty::before { display:none }

/* ═══════════════════════════════════════════
   TABLE
═══════════════════════════════════════════ */
.data-table-wrap {
  overflow-x: auto;
  border-radius: var(--radius-lg);
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
}
.data-table {
  width: 100%;
  border-collapse: collapse;
  min-width: 800px;
  background: var(--surface);
}
.data-table thead {
  background: var(--surface2);
  border-bottom: 1px solid var(--border);
}
.data-table th {
  padding: .75rem 1rem;
  text-align: left;
  font-size: .62rem;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: var(--text-3);
  white-space: nowrap;
  font-family: var(--font-ui);
}
.data-table th:first-child { padding-left: 1.3rem }
.data-table td {
  padding: .8rem 1rem;
  border-bottom: 1px solid var(--border);
  font-size: .78rem;
  vertical-align: middle;
  background: var(--surface);
}
.data-table td:first-child { padding-left: 1.3rem }
.data-table tbody tr:last-child td { border-bottom: none }
.data-table tbody tr { transition: var(--transition) }
.data-table tbody tr:hover td { background: var(--surface2) }

.td-device { display: flex; align-items: center; gap: .7rem }
.td-device-ico {
  width: 34px; height: 34px;
  background: var(--surface3);
  border-radius: 8px;
  border: 1px solid var(--border);
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem;
  flex-shrink: 0;
}
.td-device-name { font-weight: 600; color: var(--text); font-size: .78rem }
.td-device-brand { font-size: .65rem; color: var(--text-3); margin-top: .1rem }

code.serial {
  font-family: var(--font-mono);
  font-size: .68rem;
  background: var(--cyan-dim);
  color: var(--cyan);
  padding: .15rem .5rem;
  border-radius: 5px;
  border: 1px solid rgba(0,151,167,.15);
}

/* ═══════════════════════════════════════════
   MOUVEMENT KPIs
═══════════════════════════════════════════ */
.mouv-kpis {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: .85rem;
  margin-bottom: 1.5rem;
}
.mouv-kpi {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1rem 1.3rem;
  cursor: pointer;
  transition: var(--transition);
  display: flex;
  align-items: center;
  gap: 1rem;
  box-shadow: var(--shadow-sm);
}
.mouv-kpi:hover { box-shadow: var(--shadow-md); transform: translateY(-1px) }
.mouv-kpi-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}
.mouv-kpi.mk-green .mouv-kpi-icon { background: var(--green-dim); color: var(--green) }
.mouv-kpi.mk-red   .mouv-kpi-icon { background: var(--red-dim);   color: var(--red) }
.mouv-kpi.mk-amber .mouv-kpi-icon { background: var(--amber-dim); color: var(--amber) }
.mouv-kpi-label { font-size: .62rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--text-3) }
.mouv-kpi-val {
  font-family: var(--font-head);
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--text);
  letter-spacing: -.04em;
  margin-top: .1rem;
}
.mouv-kpi.mk-green .mouv-kpi-val { color: var(--green) }
.mouv-kpi.mk-red   .mouv-kpi-val { color: var(--red) }
.mouv-kpi.mk-amber .mouv-kpi-val { color: var(--amber) }

/* ═══════════════════════════════════════════
   SERVICES
═══════════════════════════════════════════ */
.svc-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-bottom: 1.5rem;
}
.svc-card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1.2rem 1.3rem;
  transition: var(--transition);
  cursor: default;
  box-shadow: var(--shadow-sm);
}
.svc-card:hover { box-shadow: var(--shadow-md); transform: translateY(-1px) }
.svc-header { display: flex; align-items: center; gap: .8rem; margin-bottom: .9rem }
.svc-icon {
  width: 42px; height: 42px;
  background: var(--surface3);
  border-radius: 10px;
  border: 1px solid var(--border);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}
.svc-name { font-family: var(--font-head); font-size: .9rem; font-weight: 700; color: var(--text); letter-spacing: -.01em }
.svc-resp { font-size: .65rem; color: var(--text-3); margin-top: .1rem }
.svc-stats { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: .4rem; margin-bottom: .9rem }
.svc-stat-box {
  background: var(--surface3);
  border-radius: 7px;
  padding: .4rem .5rem;
  text-align: center;
  border: 1px solid var(--border);
}
.svc-stat-box-val { font-family: var(--font-mono); font-size: .85rem; font-weight: 700; color: var(--text) }
.svc-stat-box-lbl { font-size: .57rem; color: var(--text-3); margin-top: .1rem }
.svc-bar { height: 3px; background: var(--surface3); border-radius: 2px; overflow: hidden }
.svc-bar-fill { height: 100%; background: linear-gradient(90deg, var(--cyan), var(--blue)); border-radius: 2px; transition: width 1s ease }

/* ═══════════════════════════════════════════
   MODAL
═══════════════════════════════════════════ */
.overlay {
  position: fixed;
  inset: 0;
  background: rgba(15,21,32,.4);
  backdrop-filter: blur(6px);
  z-index: 1000;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}
.overlay.open { display: flex }

.modal {
  background: var(--surface);
  border: 1px solid var(--border2);
  border-radius: 20px;
  padding: 2rem;
  width: 100%;
  max-width: 560px;
  box-shadow: 0 30px 80px rgba(0,0,0,.2), 0 0 0 1px rgba(0,0,0,.06);
  position: relative;
  max-height: 90vh;
  overflow-y: auto;
}
.modal-stripe {
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  border-radius: 20px 20px 0 0;
  background: linear-gradient(90deg, var(--cyan), var(--blue));
}
.modal-stripe.green { background: linear-gradient(90deg, var(--green), #15803d) }
.modal-stripe.red   { background: linear-gradient(90deg, var(--red), #b91c1c) }
.modal-stripe.amber { background: linear-gradient(90deg, var(--amber), #b45309) }

.modal-title {
  font-family: var(--font-head);
  font-size: 1.05rem;
  font-weight: 800;
  color: var(--text);
  margin-bottom: 1.5rem;
  margin-top: .3rem;
  letter-spacing: -.02em;
  display: flex;
  align-items: center;
  gap: .6rem;
}
.modal-close {
  position: absolute;
  top: 1.3rem; right: 1.3rem;
  width: 30px; height: 30px;
  background: var(--surface3);
  border: 1px solid var(--border);
  border-radius: 7px;
  cursor: pointer;
  font-size: .85rem;
  display: flex; align-items: center; justify-content: center;
  color: var(--text-3);
  transition: var(--transition);
}
.modal-close:hover { border-color: var(--red); color: var(--red); background: var(--red-dim) }

/* ═══════════════════════════════════════════
   FORM
═══════════════════════════════════════════ */
.form-grid   { display: grid; grid-template-columns: 1fr 1fr;     gap: .9rem; margin-bottom: .9rem }
.form-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: .9rem; margin-bottom: .9rem }
.form-field  { display: flex; flex-direction: column; gap: .3rem }
.form-label {
  font-size: .65rem;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: var(--text-3);
}
.form-input, .form-select, .form-textarea {
  background: var(--surface2);
  border: 1px solid var(--border2);
  border-radius: var(--radius);
  padding: .6rem .9rem;
  font-size: .82rem;
  font-family: var(--font-ui);
  color: var(--text);
  outline: none;
  transition: var(--transition);
  width: 100%;
}
.form-input::placeholder { color: var(--text-3) }
.form-input:focus, .form-select:focus, .form-textarea:focus {
  border-color: var(--cyan);
  background: var(--surface);
  box-shadow: 0 0 0 3px var(--cyan-dim);
}
.form-select { cursor: pointer }
.form-textarea { resize: vertical; min-height: 70px }
.form-mb { margin-bottom: .9rem }

.qty-row { display: flex; align-items: center; gap: .5rem }
.qty-btn {
  width: 34px; height: 34px;
  background: var(--surface3);
  border: 1px solid var(--border2);
  border-radius: 8px;
  cursor: pointer;
  font-size: 1rem;
  display: flex; align-items: center; justify-content: center;
  color: var(--text-2);
  transition: var(--transition);
  flex-shrink: 0;
  font-weight: 700;
}
.qty-btn:hover { border-color: var(--cyan); color: var(--cyan); background: var(--cyan-dim) }
.qty-field { width: 70px; text-align: center; font-family: var(--font-mono); font-weight: 700; font-size: .9rem }

.mouv-type-select {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: .6rem;
  margin-bottom: 1.2rem;
}
.mts-btn {
  padding: .7rem .5rem;
  border-radius: var(--radius);
  border: 1px solid var(--border2);
  background: var(--surface2);
  cursor: pointer;
  font-family: var(--font-ui);
  font-size: .75rem;
  font-weight: 600;
  color: var(--text-2);
  text-align: center;
  transition: var(--transition);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: .3rem;
}
.mts-btn .mts-ico { font-size: 1.3rem }
.mts-btn:hover { background: var(--surface3); color: var(--text) }
.mts-btn.sel-green  { background: var(--green-dim);  color: var(--green);  border-color: rgba(22,163,74,.3) }
.mts-btn.sel-red    { background: var(--red-dim);    color: var(--red);    border-color: rgba(220,38,38,.3) }
.mts-btn.sel-amber  { background: var(--amber-dim);  color: var(--amber);  border-color: rgba(217,119,6,.3) }

.form-actions {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: .6rem;
  padding-top: 1.2rem;
  border-top: 1px solid var(--border);
  margin-top: .5rem;
}

/* ═══════════════════════════════════════════
   TOAST
═══════════════════════════════════════════ */
.toast {
  position: fixed;
  top: 1.2rem; right: 1.5rem;
  z-index: 2000;
  display: none;
  align-items: center;
  gap: .7rem;
  padding: .8rem 1.2rem;
  border-radius: var(--radius-lg);
  font-size: .8rem;
  font-weight: 600;
  box-shadow: var(--shadow-lg);
  animation: slideIn .25s ease;
  max-width: 360px;
}
.toast.open { display: flex }
.toast-success { background: #f0fdf4; border: 1px solid rgba(22,163,74,.3); color: var(--green) }
.toast-error   { background: #fef2f2; border: 1px solid rgba(220,38,38,.3);  color: var(--red) }
@keyframes slideIn {
  from { opacity:0; transform: translateX(20px) }
  to   { opacity:1; transform: translateX(0) }
}

/* ═══════════════════════════════════════════
   EMPTY
═══════════════════════════════════════════ */
.empty {
  text-align: center;
  padding: 4rem 2rem;
  color: var(--text-3);
}
.empty-icon  { font-size: 3rem; margin-bottom: 1rem; opacity: .3 }
.empty-title { font-family: var(--font-head); font-size: 1rem; font-weight: 700; color: var(--text-2); margin-bottom: .4rem }
.empty-sub   { font-size: .78rem }

/* ═══════════════════════════════════════════
   SECTION HEADER
═══════════════════════════════════════════ */
.section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem }
.section-title {
  font-family: var(--font-head);
  font-size: .85rem;
  font-weight: 700;
  color: var(--text);
  letter-spacing: -.01em;
  display: flex; align-items: center; gap: .5rem;
}
.section-title-line { flex: 1; height: 1px; background: var(--border); margin-left: 1rem }

/* ═══════════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════════ */
@media (max-width: 1200px) {
  .kpis { grid-template-columns: repeat(3,1fr) }
  .device-grid { grid-template-columns: repeat(2, 1fr) }
  .svc-grid { grid-template-columns: repeat(2, 1fr) }
}
@media (max-width: 900px) {
  .kpis { grid-template-columns: repeat(2, 1fr) }
}
@media (max-width: 700px) {
  .sidebar { display: none }
  .main { margin-left: 0 }
  .device-grid { grid-template-columns: 1fr }
  .kpis { grid-template-columns: 1fr 1fr }
  .svc-grid { grid-template-columns: 1fr }
  .mouv-kpis { grid-template-columns: 1fr }
}

@media print {
  .sidebar, .topbar, .tab-nav, .toolbar, .dc-actions, .no-print { display: none !important }
  .main { margin-left: 0 }
  body { background: #fff !important }
  @page { margin: 1.5cm; size: A4 }
}
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sb-brand">
    <div class="sb-brand-mark">⊕</div>
    <div>
      <div class="sb-brand-name">MedEquip</div>
      <div class="sb-brand-sub">Centre de Santé · Safi</div>
    </div>
  </div>
  <div class="sb-user">
    <div class="sb-avatar">CS</div>
    <div>
      <div class="sb-user-name">Chef de Service</div>
      <div class="sb-user-role">Administrateur</div>
    </div>
  </div>
  <nav class="sb-nav">
    <div class="sb-group">Principal</div>
    <div class="sb-item" onclick="window.location.href='/dashboard/chef'" style="cursor:pointer"><span class="sb-item-ico">⊞</span> Tableau de bord</div>
    <div class="sb-group">Gestion médicale</div>
    <div class="sb-item"><span class="sb-item-ico">◯</span> Patients</div>
    <div class="sb-item"><span class="sb-item-ico">✦</span> Consultations</div>
    <div class="sb-item"><span class="sb-item-ico">⬡</span> Médicaments</div>
    <div class="sb-group">Services</div>
    <div class="sb-item"><span class="sb-item-ico">◈</span> Service SMI</div>
    <div class="sb-item"><span class="sb-item-ico">♡</span> Maladies Chroniques</div>
    <div class="sb-group">Administration</div>
    <div class="sb-item"><span class="sb-item-ico">▦</span> Rapports</div>
    <div class="sb-item active"><span class="sb-item-ico">⊕</span> Appareils <span class="sb-badge" id="sidebarCount">0</span></div>
    <div class="sb-item"><span class="sb-item-ico">⚙</span> Utilisateurs</div>
    <div class="sb-group">Site web</div>
    <div class="sb-item"><span class="sb-item-ico">⊹</span> Page d'accueil</div>
  </nav>
  <div class="sb-bottom">
    <button class="sb-logout">⏻ &nbsp;Se déconnecter</button>
  </div>
</aside>

<!-- MAIN -->
<main class="main">
  <header class="topbar">
    <div class="topbar-left">
      <div class="topbar-title"><span class="dot"></span> Appareils Médicaux</div>
      <div class="topbar-sub" id="topbarSub">—</div>
    </div>
    <div class="topbar-actions no-print">
      <button onclick="window.print()" class="btn btn-ghost btn-sm">↓ Exporter PDF</button>
      <button onclick="ouvrirMouvType('')" class="btn btn-blue btn-sm">⇅ Mouvement</button>
      <button onclick="openModal('modalAppareil')" class="btn btn-primary btn-sm">＋ Ajouter un appareil</button>
    </div>
  </header>

  <div class="content">

    <!-- KPIs -->
    <div class="kpis">
      <div class="kpi k-cyan">
        <div class="kpi-label">Total appareils</div>
        <div class="kpi-value" id="k-total">0</div>
        <div class="kpi-sub" id="k-total-sub">—</div>
        <div class="kpi-icon">⊕</div>
      </div>
      <div class="kpi k-green">
        <div class="kpi-label">Opérationnels</div>
        <div class="kpi-value" id="k-op">0</div>
        <div class="kpi-sub">En service actif</div>
        <div class="kpi-icon">✓</div>
      </div>
      <div class="kpi k-amber">
        <div class="kpi-label">En maintenance</div>
        <div class="kpi-value" id="k-maint">0</div>
        <div class="kpi-sub">En cours de révision</div>
        <div class="kpi-icon">⚙</div>
      </div>
      <div class="kpi k-red">
        <div class="kpi-label">Hors service</div>
        <div class="kpi-value" id="k-hs">0</div>
        <div class="kpi-sub">Nécessite action</div>
        <div class="kpi-icon">⊘</div>
      </div>
      <div class="kpi k-blue">
        <div class="kpi-label">Unités totales</div>
        <div class="kpi-value" id="k-qty">0</div>
        <div class="kpi-sub">Quantité en stock</div>
        <div class="kpi-icon">≡</div>
      </div>
    </div>

    <!-- TAB NAV -->
    <nav class="tab-nav no-print">
      <button class="tab-nav-item active" onclick="showSection('appareils', this)">
        Inventaire <span class="tab-counter" id="tc-ap">0</span>
      </button>
      <button class="tab-nav-item" onclick="showSection('mouvements', this)">
        Mouvements <span class="tab-counter" id="tc-mv">0</span>
      </button>
      <button class="tab-nav-item" onclick="showSection('services', this)">
        Services <span class="tab-counter" id="tc-sv">0</span>
      </button>
    </nav>

    <!-- INVENTAIRE -->
    <div class="section active" id="sec-appareils">
      <div class="toolbar">
        <div class="toolbar-left">
          <select class="filter-select" id="fStatut" onchange="renderDevices()">
            <option value="">Tous les statuts</option>
            <option value="operationnel">Opérationnel</option>
            <option value="maintenance">Maintenance</option>
            <option value="hors_service">Hors service</option>
          </select>
          <select class="filter-select" id="fService" onchange="renderDevices()">
            <option value="">Tous les services</option>
          </select>
          <select class="filter-select" id="fType" onchange="renderDevices()">
            <option value="">Tous les types</option>
          </select>
        </div>
        <div class="toolbar-right">
          <div class="view-switch no-print">
            <button class="view-sw-btn active" onclick="setView('grid',this)">⊞ Grille</button>
            <button class="view-sw-btn" onclick="setView('table',this)">≡ Tableau</button>
          </div>
        </div>
      </div>
      <div id="viewGrid">
        <div class="device-grid" id="deviceGrid"></div>
      </div>
      <div id="viewTable" style="display:none">
        <div class="data-table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Appareil</th><th>N° Série</th><th>Service</th>
                <th>Quantité</th><th>Statut</th><th>Transféré</th>
                <th>Maintenance</th><th class="no-print">Actions</th>
              </tr>
            </thead>
            <tbody id="deviceTableBody"></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- MOUVEMENTS -->
    <div class="section" id="sec-mouvements">
      <div class="mouv-kpis">
        <div class="mouv-kpi mk-green" onclick="ouvrirMouvType('entree')">
          <div class="mouv-kpi-icon">↓</div>
          <div><div class="mouv-kpi-label">Entrées</div><div class="mouv-kpi-val" id="mk-entrees">0</div></div>
        </div>
        <div class="mouv-kpi mk-red" onclick="ouvrirMouvType('sortie')">
          <div class="mouv-kpi-icon">↑</div>
          <div><div class="mouv-kpi-label">Sorties</div><div class="mouv-kpi-val" id="mk-sorties">0</div></div>
        </div>
        <div class="mouv-kpi mk-amber" onclick="ouvrirMouvType('transfert')">
          <div class="mouv-kpi-icon">⇄</div>
          <div><div class="mouv-kpi-label">Transferts</div><div class="mouv-kpi-val" id="mk-transferts">0</div></div>
        </div>
      </div>
      <div class="toolbar">
        <div class="toolbar-left">
          <select class="filter-select" id="fMouv" onchange="renderMouvements()">
            <option value="">Tous les types</option>
            <option value="entree">Entrées</option>
            <option value="sortie">Sorties</option>
            <option value="transfert">Transferts</option>
          </select>
        </div>
        <div class="toolbar-right no-print">
          <button onclick="ouvrirMouvType('')" class="btn btn-primary btn-sm">＋ Nouveau mouvement</button>
        </div>
      </div>
      <div class="data-table-wrap">
        <table class="data-table">
          <thead>
            <tr>
              <th>Date</th><th>Appareil</th><th>Type</th><th>Quantité</th>
              <th>Source</th><th>Destination</th><th>Motif</th><th>Responsable</th>
            </tr>
          </thead>
          <tbody id="mouvTableBody"></tbody>
        </table>
      </div>
    </div>

    <!-- SERVICES -->
    <div class="section" id="sec-services">
      <div class="toolbar">
        <div class="toolbar-left">
          <span style="font-size:.78rem;color:var(--text-3)"><span id="svc-count-label">—</span> services enregistrés</span>
        </div>
        <div class="toolbar-right no-print">
          <button onclick="openModal('modalService')" class="btn btn-primary btn-sm">＋ Ajouter un service</button>
        </div>
      </div>
      <div class="svc-grid" id="svcGrid"></div>
      <div class="section-header">
        <div class="section-title">Répartition détaillée<div class="section-title-line"></div></div>
      </div>
      <div class="data-table-wrap">
        <table class="data-table">
          <thead>
            <tr>
              <th>Service</th><th>Responsable</th><th>Appareils</th><th>Unités</th>
              <th>Opérationnels</th><th>Maintenance</th><th>Hors service</th>
            </tr>
          </thead>
          <tbody id="svcTableBody"></tbody>
        </table>
      </div>
    </div>

  </div>
</main>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<!-- MODAL APPAREIL -->
<div class="overlay" id="modalAppareil">
  <div class="modal">
    <div class="modal-stripe"></div>
    <button class="modal-close" onclick="closeModal('modalAppareil')">✕</button>
    <div class="modal-title">⊕ Ajouter un appareil</div>
    <div class="form-grid">
      <div class="form-field">
        <label class="form-label">Désignation *</label>
        <input class="form-input" id="ap_nom" placeholder="Ex : Tensiomètre électronique"/>
      </div>
      <div class="form-field">
        <label class="form-label">Type *</label>
        <select class="form-select" id="ap_type">
          <option value="">— Sélectionner —</option>
          <option value="tensiometre">Tensiomètre</option>
          <option value="glucometre">Glucomètre</option>
          <option value="microscope">Microscope</option>
          <option value="stethoscope">Stéthoscope</option>
          <option value="thermometre">Thermomètre</option>
          <option value="balance">Balance médicale</option>
          <option value="electrocardiogramme">Électrocardiogramme</option>
          <option value="oxymetre">Oxymètre de pouls</option>
          <option value="autre">Autre</option>
        </select>
      </div>
    </div>
    <div class="form-grid">
      <div class="form-field">
        <label class="form-label">Fabricant *</label>
        <input class="form-input" id="ap_marque" placeholder="Ex : Omron, Roche…"/>
      </div>
      <div class="form-field">
        <label class="form-label">Numéro de série *</label>
        <input class="form-input" id="ap_serie" placeholder="Ex : OM-2025-001"/>
      </div>
    </div>
    <div class="form-grid">
      <div class="form-field">
        <label class="form-label">Service affecté *</label>
        <select class="form-select" id="ap_salle"></select>
      </div>
      <div class="form-field">
        <label class="form-label">Quantité *</label>
        <div class="qty-row">
          <button type="button" class="qty-btn" onclick="chgQty('ap_qty',-1)">−</button>
          <input type="number" class="form-input qty-field" id="ap_qty" value="1" min="1"/>
          <button type="button" class="qty-btn" onclick="chgQty('ap_qty',1)">+</button>
        </div>
      </div>
    </div>
    <div class="form-grid form-mb">
      <div class="form-field">
        <label class="form-label">Statut initial *</label>
        <select class="form-select" id="ap_statut">
          <option value="operationnel">Opérationnel</option>
          <option value="maintenance">En maintenance</option>
          <option value="hors_service">Hors service</option>
        </select>
      </div>
      <div class="form-field">
        <label class="form-label">Dernière maintenance</label>
        <input type="date" class="form-input" id="ap_maint"/>
      </div>
    </div>
    <div class="form-actions">
      <button type="button" onclick="closeModal('modalAppareil')" class="btn btn-ghost">Annuler</button>
      <button type="button" onclick="ajouterAppareil()" class="btn btn-primary">Enregistrer l'appareil</button>
    </div>
  </div>
</div>

<!-- MODAL MOUVEMENT -->
<div class="overlay" id="modalMouvement">
  <div class="modal">
    <div class="modal-stripe" id="mouvStripe"></div>
    <button class="modal-close" onclick="closeModal('modalMouvement')">✕</button>
    <div class="modal-title" id="mouvModalTitle">⇅ Enregistrer un mouvement</div>
    <div class="mouv-type-select">
      <div class="mts-btn sel-green" id="mts_entree" onclick="setMouvType('entree')">
        <span class="mts-ico">↓</span><span>Entrée</span>
      </div>
      <div class="mts-btn" id="mts_sortie" onclick="setMouvType('sortie')">
        <span class="mts-ico">↑</span><span>Sortie</span>
      </div>
      <div class="mts-btn" id="mts_transfert" onclick="setMouvType('transfert')">
        <span class="mts-ico">⇄</span><span>Transfert</span>
      </div>
    </div>
    <div class="form-grid">
      <div class="form-field">
        <label class="form-label">Appareil *</label>
        <select class="form-select" id="m_ap"></select>
      </div>
      <div class="form-field">
        <label class="form-label">Quantité *</label>
        <div class="qty-row">
          <button type="button" class="qty-btn" onclick="chgQty('m_qty',-1)">−</button>
          <input type="number" class="form-input qty-field" id="m_qty" value="1" min="1"/>
          <button type="button" class="qty-btn" onclick="chgQty('m_qty',1)">+</button>
        </div>
      </div>
    </div>
    <div class="form-grid">
      <div class="form-field">
        <label class="form-label" id="lbl_source">Provenance *</label>
        <select class="form-select" id="m_source"></select>
      </div>
      <div class="form-field">
        <label class="form-label" id="lbl_dest">Destination *</label>
        <select class="form-select" id="m_dest"></select>
      </div>
    </div>
    <div class="form-grid form-mb">
      <div class="form-field">
        <label class="form-label">Date *</label>
        <input type="date" class="form-input" id="m_date"/>
      </div>
      <div class="form-field">
        <label class="form-label">Responsable</label>
        <input class="form-input" id="m_par" placeholder="Nom du responsable"/>
      </div>
    </div>
    <div class="form-field form-mb">
      <label class="form-label">Motif / Observations</label>
      <textarea class="form-textarea" id="m_motif" placeholder="Précisez le motif du mouvement…"></textarea>
    </div>
    <div class="form-actions">
      <button type="button" onclick="closeModal('modalMouvement')" class="btn btn-ghost">Annuler</button>
      <button type="button" onclick="enregistrerMouvement()" class="btn btn-primary" id="btnSaveMouv">Valider le mouvement</button>
    </div>
  </div>
</div>

<!-- MODAL SERVICE -->
<div class="overlay" id="modalService">
  <div class="modal" style="max-width:440px">
    <div class="modal-stripe"></div>
    <button class="modal-close" onclick="closeModal('modalService')">✕</button>
    <div class="modal-title">⊕ Ajouter un service</div>
    <div class="form-field form-mb">
      <label class="form-label">Nom du service *</label>
      <input class="form-input" id="srv_nom" placeholder="Ex : Dermatologie, Radiologie…"/>
    </div>
    <div class="form-grid form-mb">
      <div class="form-field">
        <label class="form-label">Icône (emoji)</label>
        <input class="form-input" id="srv_ico" placeholder="🏥" maxlength="4"/>
      </div>
      <div class="form-field">
        <label class="form-label">Médecin responsable</label>
        <input class="form-input" id="srv_resp" placeholder="Ex : Dr. Alami"/>
      </div>
    </div>
    <div class="form-actions">
      <button type="button" onclick="closeModal('modalService')" class="btn btn-ghost">Annuler</button>
      <button type="button" onclick="ajouterService()" class="btn btn-primary">Créer le service</button>
    </div>
  </div>
</div>

<!-- MODAL CONFIRM -->
<div class="overlay" id="modalConfirm">
  <div class="modal" style="max-width:400px">
    <div class="modal-stripe red"></div>
    <div class="modal-title">⚠ Confirmer la suppression</div>
    <p style="font-size:.82rem;color:var(--text-2);margin-bottom:1.5rem;line-height:1.6" id="confirmMsg"></p>
    <div class="form-actions">
      <button type="button" onclick="closeModal('modalConfirm')" class="btn btn-ghost">Annuler</button>
      <button type="button" onclick="confirmerSuppr()" class="btn btn-red">Supprimer définitivement</button>
    </div>
  </div>
</div>

<script>
let appareils = [
  {id:1,nom:'Tensiomètre Omron M3',type:'tensiometre',marque:'Omron',serie:'OM-2024-001',salle:'Consultation',statut:'operationnel',quantite:3,maintenance:'2024-11-10',transfert:null,dateTransfert:null},
  {id:2,nom:'Glucomètre Accu-Check',type:'glucometre',marque:'Roche',serie:'AC-2023-045',salle:'Chroniques',statut:'operationnel',quantite:2,maintenance:'2024-12-05',transfert:null,dateTransfert:null},
  {id:3,nom:'Microscope Binoculaire Zeiss',type:'microscope',marque:'Zeiss',serie:'ZS-2022-012',salle:'Laboratoire',statut:'maintenance',quantite:1,maintenance:'2024-09-20',transfert:null,dateTransfert:null},
  {id:4,nom:'Stéthoscope Littmann Classic',type:'stethoscope',marque:'3M Littmann',serie:'LT-2024-033',salle:'SMI',statut:'operationnel',quantite:4,maintenance:'2025-01-15',transfert:'Urgences',dateTransfert:'2025-01-20'},
  {id:5,nom:'Balance médicale SECA 874',type:'balance',marque:'SECA',serie:'SE-2023-007',salle:'SMI',statut:'hors_service',quantite:1,maintenance:'2024-08-01',transfert:null,dateTransfert:null},
  {id:6,nom:'Oxymètre de pouls Nonin',type:'oxymetre',marque:'Nonin Medical',serie:'NI-2024-018',salle:'Urgences',statut:'operationnel',quantite:5,maintenance:'2025-02-10',transfert:null,dateTransfert:null},
];
let services = [
  {id:1,nom:'Consultation',ico:'⊕',resp:'Dr. Alami'},
  {id:2,nom:'SMI',ico:'◈',resp:'Dr. Benali'},
  {id:3,nom:'Chroniques',ico:'♡',resp:'Dr. Chakir'},
  {id:4,nom:'Laboratoire',ico:'⬡',resp:'Dr. Drissi'},
  {id:5,nom:'Urgences',ico:'⚡',resp:'Dr. El Fassi'},
  {id:6,nom:'Administration',ico:'▦',resp:'M. Tahir'},
];
let mouvements = [
  {id:1,date:'2025-01-20',apId:4,type:'transfert',qty:1,source:'SMI',dest:'Urgences',motif:'Besoin urgent en service urgences',par:'Dr. El Fassi'},
  {id:2,date:'2025-02-01',apId:6,type:'entree',qty:3,source:'Fournisseur externe',dest:'Urgences',motif:'Renouvellement du stock oxymètres',par:'M. Tahir'},
  {id:3,date:'2025-01-10',apId:5,type:'sortie',qty:1,source:'SMI',dest:'Réparation externe',motif:'Panne du moteur de pesée',par:'Dr. Benali'},
];

let nxtAp=7, nxtMv=4, nxtSv=7;
let pendingDelId=null, curMouvType='entree';

document.addEventListener('DOMContentLoaded', () => {
  const now = new Date();
  document.getElementById('topbarSub').textContent =
    now.toLocaleDateString('fr-FR', {weekday:'long',year:'numeric',month:'long',day:'numeric'}).toUpperCase();
  document.getElementById('m_date').value = now.toISOString().split('T')[0];
  render();
});

function render() {
  renderKPIs(); renderDevices(); renderMouvements(); renderServices(); populateSelects();
  document.getElementById('sidebarCount').textContent = appareils.length;
  document.getElementById('tc-ap').textContent = appareils.length;
  document.getElementById('tc-mv').textContent = mouvements.length;
  document.getElementById('tc-sv').textContent = services.length;
  document.getElementById('svc-count-label').textContent = services.length;
}

function renderKPIs() {
  const total = appareils.length;
  const op = appareils.filter(a=>a.statut==='operationnel').length;
  const ma = appareils.filter(a=>a.statut==='maintenance').length;
  const hs = appareils.filter(a=>a.statut==='hors_service').length;
  const qty = appareils.reduce((s,a)=>s+a.quantite,0);
  document.getElementById('k-total').textContent = total;
  document.getElementById('k-total-sub').textContent = services.length + ' services actifs';
  document.getElementById('k-op').textContent = op;
  document.getElementById('k-maint').textContent = ma;
  document.getElementById('k-hs').textContent = hs;
  document.getElementById('k-qty').textContent = qty;
  document.getElementById('mk-entrees').textContent = mouvements.filter(m=>m.type==='entree').length;
  document.getElementById('mk-sorties').textContent = mouvements.filter(m=>m.type==='sortie').length;
  document.getElementById('mk-transferts').textContent = mouvements.filter(m=>m.type==='transfert').length;
}

const TYPE_ICO = {tensiometre:'◯',glucometre:'⬡',microscope:'⊕',stethoscope:'♡',thermometre:'⊹',balance:'▦',electrocardiogramme:'∿',oxymetre:'◈'};
const TYPE_LBL = {tensiometre:'Tensiomètre',glucometre:'Glucomètre',microscope:'Microscope',stethoscope:'Stéthoscope',thermometre:'Thermomètre',balance:'Balance médicale',electrocardiogramme:'ECG',oxymetre:'Oxymètre'};
function ico(t){ return TYPE_ICO[t]||'⊕' }
function lbl(t){ return TYPE_LBL[t]||(t?t[0].toUpperCase()+t.slice(1):'Autre') }
function fDate(d){ return d?new Date(d).toLocaleDateString('fr-FR',{day:'2-digit',month:'2-digit',year:'numeric'}):'—' }
function statChip(s){
  if(s==='operationnel') return '<span class="chip chip-green">Opérationnel</span>';
  if(s==='maintenance')  return '<span class="chip chip-amber">Maintenance</span>';
  return '<span class="chip chip-red">Hors service</span>';
}
function mouvChip(t){
  if(t==='entree')  return '<span class="chip chip-green">↓ Entrée</span>';
  if(t==='sortie')  return '<span class="chip chip-red">↑ Sortie</span>';
  return '<span class="chip chip-amber">⇄ Transfert</span>';
}

function getFilteredDevices(){
  const fs = document.getElementById('fStatut').value;
  const fv = document.getElementById('fService').value;
  const ft = document.getElementById('fType').value;
  return appareils.filter(a=>(!fs||a.statut===fs)&&(!fv||a.salle===fv)&&(!ft||a.type===ft));
}

function renderDevices(){
  const list = getFilteredDevices();
  const ftEl = document.getElementById('fType');
  const curFt = ftEl.value;
  const types = [...new Set(appareils.map(a=>a.type))];
  ftEl.innerHTML = '<option value="">Tous les types</option>' +
    types.map(t=>`<option value="${t}" ${t===curFt?'selected':''}>${lbl(t)}</option>`).join('');

  const grid = document.getElementById('deviceGrid');
  if(!list.length){
    grid.innerHTML = `<div class="empty" style="grid-column:1/-1"><div class="empty-icon">⊕</div><div class="empty-title">Aucun appareil trouvé</div><div class="empty-sub">Ajustez les filtres ou ajoutez un appareil.</div></div>`;
  } else {
    grid.innerHTML = list.map(ap=>`
      <div class="device-card">
        <div class="dc-header">
          <div class="dc-icon">${ico(ap.type)}</div>
          <div class="dc-meta">
            <div class="dc-name" title="${ap.nom}">${ap.nom}</div>
            <div class="dc-type">${lbl(ap.type)}</div>
          </div>
          ${statChip(ap.statut)}
        </div>
        <div class="dc-body">
          <div class="dc-row"><span class="dc-row-label">Fabricant</span><span class="dc-row-value">${ap.marque}</span></div>
          <div class="dc-row"><span class="dc-row-label">N° Série</span><span class="dc-row-value mono">${ap.serie}</span></div>
          <div class="dc-row"><span class="dc-row-label">Service</span><span class="dc-row-value"><span class="chip chip-cyan" style="font-size:.6rem">${ap.salle}</span></span></div>
          <div class="dc-row"><span class="dc-row-label">Quantité en stock</span><span class="dc-row-value"><span class="chip chip-qty">${ap.quantite} unité${ap.quantite>1?'s':''}</span></span></div>
          ${ap.maintenance?`<div class="dc-row"><span class="dc-row-label">Dernière révision</span><span class="dc-row-value mono" style="font-size:.68rem">${fDate(ap.maintenance)}</span></div>`:''}
        </div>
        ${ap.transfert?`<div class="dc-transfer"><span class="dc-transfer-ico">⇄</span><span class="dc-transfer-text">Transféré → ${ap.transfert}</span><span class="dc-transfer-date">${fDate(ap.dateTransfert)}</span></div>`:''}
        <div class="dc-footer">
          <div class="dc-footer-left"></div>
          <div class="dc-actions no-print">
            <button onclick="ouvrirMouvAppareil(${ap.id},'entree')" class="btn btn-green btn-icon btn-xs" title="Entrée">↓</button>
            <button onclick="ouvrirMouvAppareil(${ap.id},'sortie')" class="btn btn-red btn-icon btn-xs" title="Sortie">↑</button>
            <button onclick="ouvrirMouvAppareil(${ap.id},'transfert')" class="btn btn-amber btn-icon btn-xs" title="Transfert">⇄</button>
            <button onclick="demanderSuppr(${ap.id},'${ap.nom.replace(/'/g,"\\'")}') " class="btn btn-danger-icon btn-icon btn-xs">✕</button>
          </div>
        </div>
      </div>`).join('');
  }

  document.getElementById('deviceTableBody').innerHTML = list.map(ap=>`
    <tr>
      <td><div class="td-device"><div class="td-device-ico">${ico(ap.type)}</div><div><div class="td-device-name">${ap.nom}</div><div class="td-device-brand">${ap.marque} · ${lbl(ap.type)}</div></div></div></td>
      <td><code class="serial">${ap.serie}</code></td>
      <td><span class="chip chip-cyan" style="font-size:.6rem">${ap.salle}</span></td>
      <td><span class="chip chip-qty">${ap.quantite} u.</span></td>
      <td>${statChip(ap.statut)}</td>
      <td>${ap.transfert?`<span class="chip chip-amber" style="font-size:.6rem">⇄ ${ap.transfert}</span><div style="font-size:.62rem;color:var(--text-3);margin-top:.2rem;font-family:var(--font-mono)">${fDate(ap.dateTransfert)}</div>`:'<span style="color:var(--text-3)">—</span>'}</td>
      <td style="font-size:.72rem;font-family:var(--font-mono);color:var(--text-2)">${fDate(ap.maintenance)}</td>
      <td class="no-print"><div style="display:flex;gap:.3rem">
        <button onclick="ouvrirMouvAppareil(${ap.id},'entree')" class="btn btn-green btn-xs btn-icon" title="Entrée">↓</button>
        <button onclick="ouvrirMouvAppareil(${ap.id},'sortie')" class="btn btn-red btn-xs btn-icon" title="Sortie">↑</button>
        <button onclick="ouvrirMouvAppareil(${ap.id},'transfert')" class="btn btn-amber btn-xs btn-icon" title="Transfert">⇄</button>
        <button onclick="demanderSuppr(${ap.id},'${ap.nom.replace(/'/g,"\\'")}') " class="btn btn-danger-icon btn-xs btn-icon">✕</button>
      </div></td>
    </tr>`).join('') || `<tr><td colspan="8" style="text-align:center;padding:2.5rem;color:var(--text-3)">Aucun appareil correspondant aux filtres</td></tr>`;
}

function setView(v, btn){
  document.querySelectorAll('.view-sw-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('viewGrid').style.display = v==='grid'?'block':'none';
  document.getElementById('viewTable').style.display = v==='table'?'block':'none';
}

function renderMouvements(){
  const ft = document.getElementById('fMouv')?.value||'';
  const list = [...mouvements].filter(m=>!ft||m.type===ft).sort((a,b)=>new Date(b.date)-new Date(a.date));
  document.getElementById('mouvTableBody').innerHTML = list.map(m=>{
    const ap = appareils.find(a=>a.id===m.apId);
    return`<tr>
      <td style="font-family:var(--font-mono);font-size:.72rem;color:var(--text-2)">${fDate(m.date)}</td>
      <td>${ap?`<div style="font-weight:600;color:var(--text);font-size:.78rem">${ap.nom}</div><div style="font-size:.65rem;color:var(--text-3);margin-top:.1rem">${lbl(ap.type)}</div>`:'<span style="color:var(--text-3)">—</span>'}</td>
      <td>${mouvChip(m.type)}</td>
      <td><span class="chip chip-qty">${m.qty}</span></td>
      <td><span class="chip chip-blue" style="font-size:.6rem">${m.source||'—'}</span></td>
      <td><span class="chip chip-violet" style="font-size:.6rem">${m.dest||'—'}</span></td>
      <td style="font-size:.72rem;color:var(--text-3);max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${m.motif||'—'}</td>
      <td style="font-size:.72rem;color:var(--text-2)">${m.par||'—'}</td>
    </tr>`;
  }).join('')||`<tr><td colspan="8"><div class="empty"><div class="empty-icon">⇅</div><div class="empty-title">Aucun mouvement enregistré</div></div></td></tr>`;
}

function renderServices(){
  const fsEl = document.getElementById('fService');
  const cv = fsEl.value;
  fsEl.innerHTML = '<option value="">Tous les services</option>' +
    services.map(s=>`<option value="${s.nom}" ${s.nom===cv?'selected':''}>${s.ico} ${s.nom}</option>`).join('');

  const maxC = Math.max(...services.map(s=>appareils.filter(a=>a.salle===s.nom).length), 1);
  document.getElementById('svcGrid').innerHTML = services.map(s=>{
    const lst = appareils.filter(a=>a.salle===s.nom);
    const qty = lst.reduce((sum,a)=>sum+a.quantite,0);
    const op = lst.filter(a=>a.statut==='operationnel').length;
    const ma = lst.filter(a=>a.statut==='maintenance').length;
    const hs = lst.filter(a=>a.statut==='hors_service').length;
    const pct = Math.round(lst.length/maxC*100);
    return`<div class="svc-card">
      <div class="svc-header"><div class="svc-icon">${s.ico}</div><div><div class="svc-name">${s.nom}</div><div class="svc-resp">${s.resp||'—'}</div></div></div>
      <div class="svc-stats">
        <div class="svc-stat-box"><div class="svc-stat-box-val">${lst.length}</div><div class="svc-stat-box-lbl">Appareils</div></div>
        <div class="svc-stat-box"><div class="svc-stat-box-val">${qty}</div><div class="svc-stat-box-lbl">Unités</div></div>
        <div class="svc-stat-box"><div class="svc-stat-box-val" style="color:${op>0?'var(--green)':hs>0?'var(--red)':'var(--amber)'}">${op}</div><div class="svc-stat-box-lbl">Actifs</div></div>
      </div>
      <div class="svc-bar"><div class="svc-bar-fill" style="width:${pct}%"></div></div>
    </div>`;
  }).join('');

  document.getElementById('svcTableBody').innerHTML = services.map(s=>{
    const lst = appareils.filter(a=>a.salle===s.nom);
    const qty = lst.reduce((sum,a)=>sum+a.quantite,0);
    const op = lst.filter(a=>a.statut==='operationnel').length;
    const ma = lst.filter(a=>a.statut==='maintenance').length;
    const hs = lst.filter(a=>a.statut==='hors_service').length;
    return`<tr>
      <td><div style="display:flex;align-items:center;gap:.6rem"><span style="font-size:1.1rem">${s.ico}</span><span style="font-weight:600;color:var(--text)">${s.nom}</span></div></td>
      <td style="color:var(--text-2);font-size:.75rem">${s.resp||'—'}</td>
      <td><span class="chip chip-cyan" style="font-size:.6rem">${lst.length}</span></td>
      <td><span class="chip chip-qty">${qty}</span></td>
      <td>${op?`<span class="chip chip-green" style="font-size:.6rem">${op}</span>`:'<span style="color:var(--text-3)">0</span>'}</td>
      <td>${ma?`<span class="chip chip-amber" style="font-size:.6rem">${ma}</span>`:'<span style="color:var(--text-3)">0</span>'}</td>
      <td>${hs?`<span class="chip chip-red" style="font-size:.6rem">${hs}</span>`:'<span style="color:var(--text-3)">0</span>'}</td>
    </tr>`;
  }).join('');
}

function svcOpts(extras=[]){
  return extras.map(e=>`<option value="${e}">${e}</option>`).join('') +
    services.map(s=>`<option value="${s.nom}">${s.ico} ${s.nom}</option>`).join('');
}
function populateSelects(){
  document.getElementById('ap_salle').innerHTML =
    '<option value="">— Sélectionner le service —</option>' +
    services.map(s=>`<option value="${s.nom}">${s.ico} ${s.nom}</option>`).join('');
  document.getElementById('m_source').innerHTML = svcOpts(['📦 Fournisseur externe','🔄 Retour de réparation']);
  document.getElementById('m_dest').innerHTML = svcOpts(['🔧 Réparation externe','🗑️ Mise au rebut']);
  document.getElementById('m_ap').innerHTML =
    '<option value="">— Sélectionner l\'appareil —</option>' +
    appareils.map(a=>`<option value="${a.id}">${ico(a.type)} ${a.nom} · ${a.salle}</option>`).join('');
}

function ajouterAppareil(){
  const nom=document.getElementById('ap_nom').value.trim(),type=document.getElementById('ap_type').value,marque=document.getElementById('ap_marque').value.trim(),serie=document.getElementById('ap_serie').value.trim(),salle=document.getElementById('ap_salle').value,qty=parseInt(document.getElementById('ap_qty').value)||1,statut=document.getElementById('ap_statut').value,maint=document.getElementById('ap_maint').value;
  if(!nom||!type||!marque||!serie||!salle){showToast('error','Veuillez compléter tous les champs obligatoires.');return}
  const newId=nxtAp++;
  appareils.push({id:newId,nom,type,marque,serie,salle,statut,quantite:qty,maintenance:maint||null,transfert:null,dateTransfert:null});
  mouvements.push({id:nxtMv++,date:new Date().toISOString().split('T')[0],apId:newId,type:'entree',qty,source:'Fournisseur externe',dest:salle,motif:'Enregistrement initial',par:'Système'});
  closeModal('modalAppareil');
  ['ap_nom','ap_marque','ap_serie'].forEach(id=>document.getElementById(id).value='');
  document.getElementById('ap_type').value=''; document.getElementById('ap_salle').value='';
  document.getElementById('ap_qty').value='1'; document.getElementById('ap_statut').value='operationnel';
  document.getElementById('ap_maint').value='';
  render(); showToast('success',`Appareil « ${nom} » enregistré — ${qty} unité${qty>1?'s':''}`);
}

function setMouvType(type){
  curMouvType=type;
  const cfgs={entree:{cls:'sel-green',stripe:'green',title:'↓ Enregistrer une entrée',src:'Provenance / Fournisseur *',dst:'Service destinataire *'},sortie:{cls:'sel-red',stripe:'red',title:'↑ Enregistrer une sortie',src:"Service d'origine *",dst:'Destination (réparation…) *'},transfert:{cls:'sel-amber',stripe:'amber',title:'⇄ Enregistrer un transfert',src:"Service d'origine *",dst:'Service de destination *'}};
  const cfg=cfgs[type];
  ['entree','sortie','transfert'].forEach(t=>{document.getElementById('mts_'+t).className='mts-btn'+(t===type?' '+cfgs[t].cls:'')});
  document.getElementById('mouvModalTitle').textContent=cfg.title;
  document.getElementById('mouvStripe').className='modal-stripe '+cfg.stripe;
  document.getElementById('lbl_source').textContent=cfg.src;
  document.getElementById('lbl_dest').textContent=cfg.dst;
}

function ouvrirMouvType(type){openModal('modalMouvement');setMouvType(type||'entree')}
function ouvrirMouvAppareil(id,type){openModal('modalMouvement');setMouvType(type);setTimeout(()=>{document.getElementById('m_ap').value=id},50)}

function enregistrerMouvement(){
  const apId=parseInt(document.getElementById('m_ap').value),qty=parseInt(document.getElementById('m_qty').value)||1,src=document.getElementById('m_source').value,dst=document.getElementById('m_dest').value,date=document.getElementById('m_date').value,par=document.getElementById('m_par').value.trim(),motif=document.getElementById('m_motif').value.trim(),type=curMouvType;
  if(!apId){showToast('error','Veuillez sélectionner un appareil.');return}
  if(!date){showToast('error','Veuillez renseigner la date.');return}
  if(!src||!dst){showToast('error','Source et destination sont requises.');return}
  const ap=appareils.find(a=>a.id===apId); if(!ap)return;
  if(type==='entree'){ap.quantite+=qty;const svc=services.find(s=>dst.includes(s.nom));if(svc)ap.salle=svc.nom;}
  else if(type==='sortie'){if(qty>ap.quantite){showToast('error',`Stock insuffisant. Disponible : ${ap.quantite} unité${ap.quantite>1?'s':''}.`);return}ap.quantite-=qty;if(ap.quantite===0)ap.statut='hors_service';}
  else{const svc=services.find(s=>dst.includes(s.nom));ap.transfert=svc?svc.nom:dst;ap.dateTransfert=date;ap.salle=svc?svc.nom:ap.salle;}
  mouvements.push({id:nxtMv++,date,apId,type,qty,source:src,dest:dst,motif,par});
  closeModal('modalMouvement');
  document.getElementById('m_qty').value='1';document.getElementById('m_motif').value='';document.getElementById('m_par').value='';
  render();
  const lbs={entree:'Entrée',sortie:'Sortie',transfert:'Transfert'};
  showToast('success',`${lbs[type]} enregistrée — ${ap.nom} · ${qty} unité${qty>1?'s':''}`);
}

function ajouterService(){
  const nom=document.getElementById('srv_nom').value.trim(),ico2=document.getElementById('srv_ico').value.trim()||'⊕',resp=document.getElementById('srv_resp').value.trim();
  if(!nom){showToast('error','Le nom du service est requis.');return}
  if(services.find(s=>s.nom.toLowerCase()===nom.toLowerCase())){showToast('error','Ce service existe déjà.');return}
  services.push({id:nxtSv++,nom,ico:ico2,resp});
  closeModal('modalService');
  document.getElementById('srv_nom').value='';document.getElementById('srv_ico').value='';document.getElementById('srv_resp').value='';
  render();showToast('success',`Service « ${nom} » créé avec succès.`);
}

function demanderSuppr(id,nom){
  pendingDelId=id;
  document.getElementById('confirmMsg').textContent=`Vous êtes sur le point de supprimer définitivement l'appareil « ${nom} ». Cette action est irréversible.`;
  openModal('modalConfirm');
}
function confirmerSuppr(){
  if(!pendingDelId)return;
  appareils=appareils.filter(a=>a.id!==pendingDelId);pendingDelId=null;
  closeModal('modalConfirm');render();showToast('success',"Appareil supprimé de l'inventaire.");
}

function showSection(name,btn){
  document.querySelectorAll('.section').forEach(s=>s.classList.remove('active'));
  document.querySelectorAll('.tab-nav-item').forEach(b=>b.classList.remove('active'));
  document.getElementById('sec-'+name).classList.add('active');btn.classList.add('active');
}

function openModal(id){document.getElementById(id).classList.add('open')}
function closeModal(id){document.getElementById(id).classList.remove('open')}
['modalAppareil','modalMouvement','modalService','modalConfirm'].forEach(id=>{
  const el=document.getElementById(id);
  if(el)el.addEventListener('click',function(e){if(e.target===this)closeModal(id)});
});
function chgQty(id,d){const el=document.getElementById(id);el.value=Math.max(1,(parseInt(el.value)||1)+d)}
let toastTimer;
function showToast(type,msg){
  const el=document.getElementById('toast');
  el.className='toast toast-'+type+' open';
  el.textContent=(type==='success'?'✓ ':' ✕ ')+msg;
  clearTimeout(toastTimer);toastTimer=setTimeout(()=>el.classList.remove('open'),4000);
}
</script>
</body>
</html>
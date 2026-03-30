<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Centre de Santé — Médecin Chef</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;1,400&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<style>
:root {
  --sb-bg:#09110e;--sb-bg2:#0d1a14;--sb-border:rgba(255,255,255,.05);
  --sb-text:rgba(255,255,255,.38);--sb-hi:rgba(255,255,255,.88);
  --acc:#10b981;--acc2:#059669;--acc3:#34d399;
  --acc-glow:rgba(16,185,129,.18);--acc-glow2:rgba(16,185,129,.08);

  --bg:#f0f4f2;--white:#ffffff;--ink:#071a13;--ink2:#1a3328;
  --muted:#527060;--muted2:#7fa090;--muted3:#b0c8bf;
  --border:#d8e8e2;--border2:#eaf2ee;--border3:#f4f9f6;

  --g:#10b981;--g-lt:#34d399;--g-bg:rgba(16,185,129,.07);--g-bg2:rgba(16,185,129,.13);
  --teal:#0891b2;--teal-bg:rgba(8,145,178,.07);
  --blue:#2563eb;--blue-bg:rgba(37,99,235,.07);
  --purple:#7c3aed;--purple-bg:rgba(124,58,237,.07);
  --orange:#ea580c;--orange-bg:rgba(234,88,12,.07);
  --red:#dc2626;--red-bg:rgba(220,38,38,.06);
  --amber:#d97706;--amber-bg:rgba(217,119,6,.07);

  --sh0:0 1px 2px rgba(7,26,19,.04);
  --sh1:0 2px 8px rgba(7,26,19,.06),0 1px 2px rgba(7,26,19,.04);
  --sh2:0 6px 24px rgba(7,26,19,.08),0 2px 6px rgba(7,26,19,.04);
  --sh3:0 16px 48px rgba(7,26,19,.12),0 4px 12px rgba(7,26,19,.06);
  --sh4:0 32px 80px rgba(7,26,19,.18);

  --r1:8px;--r2:12px;--r3:16px;--r4:22px;--r5:28px;
  --sb-w:268px;--tb-h:62px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{font-family:'Sora',sans-serif;background:var(--bg);color:var(--ink);display:flex;min-height:100vh;overflow-x:hidden;font-size:14px;}

/* ─── SCROLLBAR ─── */
::-webkit-scrollbar{width:5px;height:5px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:var(--border);border-radius:4px;}

/* ─── SIDEBAR ─── */
.sidebar{
  width:var(--sb-w);flex-shrink:0;
  background:var(--sb-bg);
  display:flex;flex-direction:column;
  position:fixed;top:0;left:0;bottom:0;
  z-index:300;
  border-right:1px solid var(--sb-border);
}
.sb-brand{
  padding:1.25rem 1.1rem 1.1rem;
  display:flex;align-items:center;gap:.85rem;
  border-bottom:1px solid var(--sb-border);
}
.sb-logo{
  width:40px;height:40px;border-radius:10px;
  background:linear-gradient(145deg,#133d2a,#0a2218);
  border:1.5px solid rgba(16,185,129,.22);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
  box-shadow:0 0 18px rgba(16,185,129,.12);
  position:relative;overflow:hidden;
}
.sb-logo::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(circle at 30% 30%,rgba(16,185,129,.2),transparent 60%);
}
.sb-logo svg{width:20px;height:20px;position:relative;}
.sb-brand-name{font-weight:700;font-size:.88rem;color:#fff;line-height:1.3;}
.sb-brand-sub{font-size:.58rem;color:rgba(255,255,255,.25);text-transform:uppercase;letter-spacing:.13em;margin-top:.1rem;font-weight:500;}

.sb-user{
  padding:.85rem 1.1rem;
  display:flex;align-items:center;gap:.75rem;
  border-bottom:1px solid var(--sb-border);
  background:rgba(255,255,255,.015);
}
.sb-av{
  width:38px;height:38px;border-radius:11px;
  background:linear-gradient(145deg,#1a5c42,var(--acc2));
  display:flex;align-items:center;justify-content:center;
  font-size:.78rem;font-weight:800;color:#fff;flex-shrink:0;
  box-shadow:0 3px 12px rgba(16,185,129,.28);
  letter-spacing:.03em;
}
.sb-uname{font-size:.8rem;font-weight:700;color:rgba(255,255,255,.9);line-height:1.3;}
.sb-urole{
  font-size:.6rem;color:var(--acc3);font-weight:600;
  display:flex;align-items:center;gap:.3rem;margin-top:.1rem;
}
.sb-urole::before{content:'';width:5px;height:5px;border-radius:50%;background:var(--acc3);box-shadow:0 0 7px var(--acc);}

.sb-nav{flex:1;overflow-y:auto;padding:.7rem 0 1rem;}
.sb-section{
  font-size:.55rem;font-weight:800;text-transform:uppercase;letter-spacing:.18em;
  color:rgba(255,255,255,.18);padding:.85rem 1.25rem .3rem;
}
.sb-item{
  display:flex;align-items:center;gap:.65rem;
  padding:.55rem 1rem .55rem 1.1rem;
  margin:.03rem .55rem;border-radius:10px;
  cursor:pointer;transition:all .17s ease;
  text-decoration:none;border:1px solid transparent;position:relative;
}
.sb-ico{
  width:28px;height:28px;display:flex;align-items:center;justify-content:center;
  border-radius:8px;flex-shrink:0;transition:all .17s;font-size:.88rem;
}
.sb-label{font-size:.77rem;font-weight:500;color:var(--sb-text);transition:color .17s;flex:1;}
.sb-badge{
  font-size:.56rem;font-weight:800;padding:.12rem .45rem;border-radius:50px;
  background:rgba(16,185,129,.15);color:var(--acc3);border:1px solid rgba(16,185,129,.18);
}
.sb-item:hover{background:rgba(255,255,255,.035);border-color:rgba(255,255,255,.04);}
.sb-item:hover .sb-label{color:rgba(255,255,255,.7);}
.sb-item:hover .sb-ico{background:rgba(255,255,255,.05);}
.sb-item.active{background:rgba(16,185,129,.1);border-color:rgba(16,185,129,.12);}
.sb-item.active .sb-label{color:#fff;font-weight:600;}
.sb-item.active .sb-ico{background:rgba(16,185,129,.14);}
.sb-item.active::before{
  content:'';position:absolute;left:0;top:25%;bottom:25%;
  width:3px;background:var(--acc);border-radius:0 3px 3px 0;
  box-shadow:0 0 10px rgba(16,185,129,.5);
}

.sb-divider{height:1px;background:var(--sb-border);margin:.5rem 1rem;}

.sb-bottom{padding:.85rem 1rem;border-top:1px solid var(--sb-border);}
.sb-logout{
  display:flex;align-items:center;justify-content:center;gap:.5rem;
  width:100%;padding:.6rem;
  background:rgba(220,38,38,.07);border:1px solid rgba(220,38,38,.16);
  color:rgba(255,160,160,.75);border-radius:10px;
  font-size:.73rem;font-weight:700;cursor:pointer;
  font-family:'Sora',sans-serif;transition:all .2s;
}
.sb-logout:hover{background:rgba(220,38,38,.16);color:#fca5a5;}

/* ─── MAIN ─── */
.main{margin-left:var(--sb-w);flex:1;display:flex;flex-direction:column;min-height:100vh;}

.topbar{
  height:var(--tb-h);background:rgba(255,255,255,.92);
  backdrop-filter:blur(12px);
  border-bottom:1px solid var(--border);
  display:flex;align-items:center;justify-content:space-between;
  padding:0 2rem;position:sticky;top:0;z-index:100;
  box-shadow:var(--sh0);
}
.tb-left{display:flex;flex-direction:column;gap:.08rem;}
.tb-crumb{
  font-size:.58rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;
  color:var(--muted3);display:flex;align-items:center;gap:.35rem;
}
.tb-crumb .sep{color:var(--border);}
.tb-crumb .active-c{color:var(--g);}
.tb-title{
  font-family:'Playfair Display',serif;
  font-size:1.22rem;color:var(--ink);
  display:flex;align-items:center;gap:.55rem;
}
.tb-dot{width:7px;height:7px;border-radius:50%;background:var(--g-lt);box-shadow:0 0 9px rgba(52,211,153,.6);}
.tb-right{display:flex;align-items:center;gap:.7rem;}
.tb-date{
  font-size:.68rem;color:var(--muted);background:var(--border3);
  border:1.5px solid var(--border);padding:.38rem .85rem;
  border-radius:50px;font-weight:600;font-family:'JetBrains Mono',monospace;
}
.tb-avatar{
  width:34px;height:34px;border-radius:10px;
  background:linear-gradient(135deg,#1e5c42,var(--acc));
  display:flex;align-items:center;justify-content:center;
  font-size:.72rem;font-weight:800;color:#fff;
  box-shadow:0 2px 10px rgba(16,185,129,.25);cursor:pointer;
}

/* ─── BUTTONS ─── */
.btn{
  display:inline-flex;align-items:center;gap:.38rem;
  padding:.52rem 1.1rem;border-radius:50px;
  font-size:.73rem;font-weight:700;
  font-family:'Sora',sans-serif;cursor:pointer;border:none;
  transition:all .18s;white-space:nowrap;letter-spacing:.01em;
}
.btn-primary{background:var(--g);color:#fff;box-shadow:0 3px 14px rgba(16,185,129,.28);}
.btn-primary:hover{background:#059669;transform:translateY(-1px);box-shadow:0 6px 22px rgba(16,185,129,.35);}
.btn-ghost{background:var(--white);color:var(--muted);border:1.5px solid var(--border);}
.btn-ghost:hover{border-color:var(--g);color:var(--g);background:var(--g-bg);}
.btn-danger{background:var(--red-bg);color:var(--red);border:1.5px solid rgba(220,38,38,.18);}
.btn-danger:hover{background:rgba(220,38,38,.14);}
.btn-sm{padding:.36rem .85rem;font-size:.68rem;}
.btn-xs{padding:.26rem .65rem;font-size:.62rem;}
.btn-icon{width:32px;height:32px;padding:0;justify-content:center;border-radius:8px;font-size:.82rem;}

/* ─── CONTENT ─── */
.content{padding:1.6rem 2rem 3rem;flex:1;}
.section{display:none;animation:fadeUp .28s ease;}
.section.active{display:block;}
@keyframes fadeUp{from{opacity:0;transform:translateY(8px);}to{opacity:1;transform:translateY(0);}}

/* ─── STAT CARDS ─── */
.stats-row{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1.3rem;}
.stat-card{
  background:var(--white);border:1.5px solid var(--border);
  border-radius:var(--r3);padding:1.15rem 1.25rem;
  box-shadow:var(--sh1);position:relative;overflow:hidden;
  transition:transform .18s,box-shadow .18s;
}
.stat-card:hover{transform:translateY(-2px);box-shadow:var(--sh2);}
.stat-card::after{
  content:'';position:absolute;top:0;right:0;
  width:80px;height:80px;border-radius:50%;
  transform:translate(30px,-30px);opacity:.06;
}
.stat-card.green::after{background:var(--g);}
.stat-card.blue::after{background:var(--blue);}
.stat-card.orange::after{background:var(--orange);}
.stat-card.purple::after{background:var(--purple);}
.stat-ico{
  width:36px;height:36px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  font-size:1rem;margin-bottom:.8rem;
}
.stat-val{
  font-family:'Playfair Display',serif;
  font-size:1.85rem;font-weight:700;color:var(--ink);line-height:1;
}
.stat-label{font-size:.65rem;color:var(--muted);font-weight:600;text-transform:uppercase;letter-spacing:.09em;margin-top:.3rem;}
.stat-delta{font-size:.62rem;font-weight:700;margin-top:.55rem;display:flex;align-items:center;gap:.25rem;}
.stat-delta.up{color:var(--g);}
.stat-delta.down{color:var(--red);}

/* ─── PANELS ─── */
.panel{
  background:var(--white);border:1.5px solid var(--border);
  border-radius:var(--r3);overflow:hidden;box-shadow:var(--sh1);
  margin-bottom:1.2rem;
}
.panel-head{
  padding:.95rem 1.3rem;border-bottom:1px solid var(--border2);
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:.6rem;background:rgba(240,244,242,.5);
}
.panel-title{
  display:flex;align-items:center;gap:.6rem;
  font-size:.87rem;font-weight:700;color:var(--ink);
}
.panel-ico{
  width:28px;height:28px;border-radius:8px;
  display:flex;align-items:center;justify-content:center;font-size:.82rem;
}
.panel-body{padding:1.2rem 1.3rem;}
.panel-actions{display:flex;align-items:center;gap:.5rem;}

/* ─── TABLE ─── */
.tbl-wrap{overflow-x:auto;}
.tbl{width:100%;border-collapse:collapse;font-size:.77rem;}
.tbl thead th{
  padding:.65rem 1rem;text-align:left;
  font-size:.58rem;font-weight:800;text-transform:uppercase;letter-spacing:.11em;
  color:var(--muted);background:var(--border3);border-bottom:2px solid var(--border);
}
.tbl thead th:first-child{border-radius:8px 0 0 0;}
.tbl thead th:last-child{border-radius:0 8px 0 0;}
.tbl tbody td{
  padding:.78rem 1rem;border-bottom:1px solid var(--border2);
  vertical-align:middle;transition:background .12s;
}
.tbl tbody tr:last-child td{border-bottom:none;}
.tbl tbody tr:hover td{background:#f0faf5;}
.tbl tbody tr{cursor:pointer;transition:all .12s;}
.tbl-mono{font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--muted);}
.tbl-bold{font-weight:700;color:var(--ink2);}

/* ─── BADGE ─── */
.badge{
  display:inline-flex;align-items:center;gap:.28rem;
  font-size:.6rem;font-weight:800;padding:.2rem .65rem;border-radius:50px;
}
.bd{width:5px;height:5px;border-radius:50%;}
.bg-g{background:var(--g-bg);color:var(--g);border:1px solid rgba(16,185,129,.2);}
.bg-b{background:var(--blue-bg);color:var(--blue);border:1px solid rgba(37,99,235,.2);}
.bg-o{background:var(--orange-bg);color:var(--orange);border:1px solid rgba(234,88,12,.2);}
.bg-r{background:var(--red-bg);color:var(--red);border:1px solid rgba(220,38,38,.2);}
.bg-p{background:var(--purple-bg);color:var(--purple);border:1px solid rgba(124,58,237,.2);}
.bg-t{background:var(--teal-bg);color:var(--teal);border:1px solid rgba(8,145,178,.2);}
.bg-a{background:var(--amber-bg);color:var(--amber);border:1px solid rgba(217,119,6,.2);}
.bg-gray{background:var(--border2);color:var(--muted);border:1px solid var(--border);}

/* ─── AVATAR GROUP ─── */
.avatar{
  width:30px;height:30px;border-radius:8px;
  display:inline-flex;align-items:center;justify-content:center;
  font-size:.62rem;font-weight:800;color:#fff;flex-shrink:0;
}

/* ─── GRID ─── */
.g2{display:grid;grid-template-columns:1fr 1fr;gap:1.2rem;}
.g3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;}
.g13{display:grid;grid-template-columns:1fr 1.8fr;gap:1.2rem;}

/* ─── FORMS ─── */
.fg{margin-bottom:.85rem;}
.fl{display:block;font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:var(--ink2);margin-bottom:.35rem;}
.fl-req::after{content:' *';color:var(--red);}
.fi,.fta,.fsel{
  width:100%;padding:.62rem .95rem;
  background:var(--border3);border:1.5px solid var(--border);
  border-radius:var(--r1);font-family:'Sora',sans-serif;
  font-size:.78rem;color:var(--ink);outline:none;transition:all .17s;
}
.fta{resize:vertical;min-height:75px;line-height:1.55;}
.fi:focus,.fta:focus,.fsel:focus{border-color:var(--g);background:var(--white);box-shadow:0 0 0 3px rgba(16,185,129,.1);}
.fi::placeholder,.fta::placeholder{color:var(--muted3);}
.fr2{display:grid;grid-template-columns:1fr 1fr;gap:.8rem;}
.fr3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:.8rem;}
.fi-icon{position:relative;}
.fi-icon .fi{padding-left:2.2rem;}
.fi-icon .icon{position:absolute;left:.75rem;top:50%;transform:translateY(-50%);font-size:.85rem;pointer-events:none;}
.fi-hint{font-size:.6rem;color:var(--muted);margin-top:.25rem;}

/* ─── MODAL ─── */
.modal-overlay{
  position:fixed;inset:0;
  background:rgba(7,26,19,.5);
  backdrop-filter:blur(10px);
  z-index:1000;display:none;
  align-items:center;justify-content:center;padding:1rem;
}
.modal-overlay.open{display:flex;}
.modal{
  background:var(--white);border:1.5px solid var(--border);
  border-radius:var(--r4);padding:1.8rem 2rem;
  width:100%;max-width:680px;
  box-shadow:var(--sh4);position:relative;
  max-height:92vh;overflow-y:auto;
  animation:modalIn .22s ease;
}
.modal-lg{max-width:860px;}
@keyframes modalIn{from{opacity:0;transform:scale(.97) translateY(8px);}to{opacity:1;transform:scale(1) translateY(0);}}
.modal-title{
  font-family:'Playfair Display',serif;
  font-size:1.25rem;color:var(--ink);
  margin-bottom:1.2rem;display:flex;align-items:center;gap:.55rem;
}
.modal-close{
  position:absolute;top:1rem;right:1.1rem;
  background:var(--border3);border:1px solid var(--border);
  width:28px;height:28px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;font-size:.75rem;color:var(--muted);transition:all .15s;
}
.modal-close:hover{background:var(--border);color:var(--ink);}
.modal-divider{
  display:flex;align-items:center;gap:.6rem;
  font-size:.58rem;font-weight:800;text-transform:uppercase;letter-spacing:.14em;
  color:var(--g);margin:1rem 0 .85rem;
}
.modal-divider::after{content:'';flex:1;height:1.5px;background:var(--g-bg);border-radius:2px;}
.modal-footer{display:flex;gap:.7rem;justify-content:flex-end;margin-top:1.3rem;padding-top:1rem;border-top:1px solid var(--border2);}

/* ─── PATIENT CARD (in modal/detail) ─── */
.pt-card{
  background:linear-gradient(135deg,#08140f,#0f2a1e);
  border-radius:var(--r3);padding:1.1rem 1.3rem;color:#fff;margin-bottom:1rem;
  border:1px solid rgba(16,185,129,.15);position:relative;overflow:hidden;
}
.pt-card::before{
  content:'';position:absolute;top:-40px;right:-40px;
  width:140px;height:140px;border-radius:50%;
  background:radial-gradient(circle,rgba(16,185,129,.12),transparent 70%);
}
.pt-name{font-size:1rem;font-weight:700;line-height:1.3;}
.pt-meta{font-size:.68rem;opacity:.6;margin-top:.2rem;display:flex;gap:1rem;}
.pt-meta span{display:flex;align-items:center;gap:.3rem;}

/* ─── RX TABLE ─── */
.rx-tbl{width:100%;border-collapse:collapse;font-size:.75rem;margin-top:.5rem;}
.rx-tbl th{
  padding:.5rem .7rem;font-size:.57rem;font-weight:800;text-transform:uppercase;
  letter-spacing:.1em;color:var(--muted);background:var(--border3);text-align:left;
  border-bottom:2px solid var(--border);
}
.rx-tbl td{padding:.45rem .5rem;border-bottom:1px solid var(--border2);}
.rx-tbl tr:last-child td{border-bottom:none;}
.rx-input{
  border:1.5px solid var(--border);border-radius:6px;
  padding:.42rem .65rem;font-size:.74rem;font-family:'Sora',sans-serif;
  width:100%;outline:none;background:var(--border3);color:var(--ink);
  transition:all .15s;
}
.rx-input:focus{border-color:var(--g);background:var(--white);}
.rx-del{
  background:none;border:none;cursor:pointer;color:var(--muted3);
  font-size:.85rem;padding:.3rem .5rem;border-radius:6px;transition:all .15s;
}
.rx-del:hover{background:var(--red-bg);color:var(--red);}

/* ─── VITAL BOX ─── */
.vitals-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:.75rem;margin:.75rem 0;}
.vital-box{
  background:var(--border3);border:1.5px solid var(--border);
  border-radius:var(--r2);padding:.85rem;text-align:center;
  transition:border-color .15s;
}
.vital-box:focus-within{border-color:var(--g);}
.vital-lbl{font-size:.56rem;font-weight:800;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);margin-bottom:.4rem;}
.vital-inp{
  border:none;background:transparent;text-align:center;width:100%;
  font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:600;
  color:var(--ink2);outline:none;
}
.vital-unit{font-size:.58rem;color:var(--muted2);margin-top:.15rem;font-weight:600;}

/* ─── HISTORY ITEMS ─── */
.hist-item{
  padding:.8rem .95rem;border-left:3px solid var(--g);
  background:linear-gradient(90deg,var(--g-bg2),transparent);
  border-radius:0 var(--r1) var(--r1) 0;margin-bottom:.65rem;
  transition:all .15s;
}
.hist-item:hover{border-left-color:var(--acc2);background:linear-gradient(90deg,var(--g-bg),transparent);}
.hist-date{font-size:.58rem;font-weight:700;color:var(--muted2);font-family:'JetBrains Mono',monospace;margin-bottom:.25rem;}
.hist-diag{font-size:.82rem;font-weight:700;color:var(--ink2);}
.hist-note{font-size:.72rem;color:var(--muted);margin-top:.15rem;line-height:1.45;}

/* ─── DOSSIER PANEL (detail view) ─── */
.dossier-header{
  background:linear-gradient(135deg,var(--sb-bg),#122a20);
  border-radius:var(--r3);padding:1.4rem 1.6rem;color:#fff;
  margin-bottom:1.2rem;border:1px solid rgba(16,185,129,.14);
  display:flex;align-items:center;gap:1.2rem;position:relative;overflow:hidden;
}
.dossier-header::before{
  content:'';position:absolute;right:-30px;top:-30px;
  width:160px;height:160px;border-radius:50%;
  background:radial-gradient(circle,rgba(16,185,129,.1),transparent 70%);
}
.dossier-av{
  width:56px;height:56px;border-radius:14px;
  display:flex;align-items:center;justify-content:center;
  font-size:1.2rem;font-weight:800;color:#fff;flex-shrink:0;
  border:2px solid rgba(16,185,129,.3);
  box-shadow:0 4px 16px rgba(16,185,129,.2);
}
.dossier-name{font-family:'Playfair Display',serif;font-size:1.35rem;font-weight:600;}
.dossier-meta{display:flex;gap:1.3rem;margin-top:.4rem;}
.dossier-meta span{font-size:.66rem;opacity:.65;display:flex;align-items:center;gap:.3rem;}
.dossier-tags{display:flex;gap:.5rem;margin-top:.65rem;flex-wrap:wrap;}

/* ─── MINI CHART ─── */
.mini-chart{height:40px;display:flex;align-items:flex-end;gap:3px;margin-top:.6rem;}
.mc-bar{
  flex:1;border-radius:3px 3px 0 0;
  background:linear-gradient(180deg,var(--g),var(--acc2));
  opacity:.7;transition:opacity .15s;min-height:4px;
}
.mc-bar:hover{opacity:1;}

/* ─── TIMELINE ─── */
.timeline{position:relative;padding-left:1.5rem;}
.timeline::before{content:'';position:absolute;left:.45rem;top:0;bottom:0;width:2px;background:var(--border);border-radius:2px;}
.tl-item{position:relative;padding:.6rem 0 .6rem .8rem;margin-bottom:.1rem;}
.tl-dot{
  position:absolute;left:-1.1rem;top:.85rem;
  width:10px;height:10px;border-radius:50%;border:2px solid var(--white);
  box-shadow:0 0 0 2px var(--border);
}
.tl-date{font-size:.58rem;font-weight:700;color:var(--muted2);font-family:'JetBrains Mono',monospace;}
.tl-title{font-size:.8rem;font-weight:700;color:var(--ink2);margin:.12rem 0;}
.tl-note{font-size:.7rem;color:var(--muted);line-height:1.45;}

/* ─── SEARCH BAR ─── */
.search-wrap{position:relative;flex:1;max-width:280px;}
.search-ico{position:absolute;left:.75rem;top:50%;transform:translateY(-50%);color:var(--muted3);font-size:.85rem;pointer-events:none;}
.search-fi{
  width:100%;padding:.5rem .9rem .5rem 2.1rem;
  background:var(--border3);border:1.5px solid var(--border);border-radius:50px;
  font-size:.73rem;font-family:'Sora',sans-serif;color:var(--ink);outline:none;transition:all .17s;
}
.search-fi:focus{border-color:var(--g);background:var(--white);box-shadow:0 0 0 3px rgba(16,185,129,.08);}

/* ─── EMPTY STATE ─── */
.empty{text-align:center;padding:2.5rem 1rem;color:var(--muted2);}
.empty-ico{font-size:2.5rem;margin-bottom:.75rem;opacity:.5;}
.empty-txt{font-size:.8rem;font-weight:600;margin-bottom:.3rem;}
.empty-sub{font-size:.7rem;opacity:.7;}

/* ─── ALERT BAR ─── */
.alert{
  display:flex;align-items:center;gap:.75rem;
  padding:.75rem 1rem;border-radius:var(--r2);margin-bottom:.9rem;
  font-size:.75rem;font-weight:600;
}
.alert-info{background:var(--blue-bg);color:var(--blue);border:1px solid rgba(37,99,235,.18);}
.alert-warn{background:var(--amber-bg);color:var(--amber);border:1px solid rgba(217,119,6,.18);}

/* ─── PROGRESS ─── */
.progress-bar{
  height:6px;background:var(--border2);border-radius:4px;overflow:hidden;margin-top:.4rem;
}
.progress-fill{height:100%;border-radius:4px;background:linear-gradient(90deg,var(--g),var(--g-lt));}

/* ─── TOAST ─── */
#toast-wrap{position:fixed;bottom:1.5rem;right:1.5rem;z-index:9999;display:flex;flex-direction:column;gap:.5rem;}
.toast-item{
  background:var(--sb-bg);color:#fff;
  padding:.8rem 1.3rem;border-radius:var(--r2);
  font-size:.76rem;font-weight:600;box-shadow:var(--sh4);
  display:flex;align-items:center;gap:.6rem;
  border-left:3px solid var(--g-lt);
  animation:toastIn .25s ease;min-width:220px;
}
@keyframes toastIn{from{opacity:0;transform:translateX(20px);}to{opacity:1;transform:translateX(0);}}

/* ─── CHIP TAGS ─── */
.chip-wrap{display:flex;flex-wrap:wrap;gap:.35rem;margin-bottom:.4rem;}
.chip{
  display:inline-flex;align-items:center;gap:.3rem;
  padding:.22rem .65rem;border-radius:50px;font-size:.62rem;font-weight:700;
  cursor:pointer;transition:all .15s;
}
.chip-g{background:var(--g-bg);color:var(--g);border:1px solid rgba(16,185,129,.2);}
.chip-g:hover{background:rgba(220,38,38,.07);color:var(--red);}
.chip-b{background:var(--blue-bg);color:var(--blue);border:1px solid rgba(37,99,235,.2);}
.chip-b:hover{background:rgba(220,38,38,.07);color:var(--red);}
.chip-a{background:var(--amber-bg);color:var(--amber);border:1px solid rgba(217,119,6,.2);}
.chip-a:hover{background:rgba(220,38,38,.07);color:var(--red);}

/* ─── MEDIA ─── */
@media(max-width:1100px){.stats-row{grid-template-columns:repeat(2,1fr);}.g2,.g3,.g13{grid-template-columns:1fr;}}
@media(max-width:900px){.sidebar{display:none;}.main{margin-left:0;}.vitals-grid{grid-template-columns:repeat(2,1fr);}}
</style>
</head>
<body>

<!-- ═══════════════════════════════════════════════════════
     SIDEBAR
═══════════════════════════════════════════════════════ -->
<aside class="sidebar">
  <div class="sb-brand">
    <div class="sb-logo">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2L3 7v10l9 5 9-5V7L12 2z" stroke="rgba(52,211,153,.5)" stroke-width="1.5" fill="none"/>
        <path d="M12 8v8M8 12h8" stroke="#10b981" stroke-width="2.2" stroke-linecap="round"/>
      </svg>
    </div>
    <div>
      <div class="sb-brand-name">Centre de Santé</div>
      <div class="sb-brand-sub">Jemaa Shaaim · Safi · Maroc</div>
    </div>
  </div>

  <div class="sb-user">
    <div class="sb-av">MD</div>
    <div>
      <div class="sb-uname">Dr. Mehdi Benali</div>
      <div class="sb-urole">Médecin Chef</div>
    </div>
  </div>

  <nav class="sb-nav">
    <div class="sb-section">Tableau de bord</div>
    <div class="sb-item active" onclick="go('dashboard',this)">
      <div class="sb-ico">📊</div>
      <span class="sb-label">Vue d'ensemble</span>
    </div>

    <div class="sb-divider"></div>
    <div class="sb-section">Médical</div>

    <div class="sb-item" onclick="go('patients',this)">
      <div class="sb-ico">👥</div>
      <span class="sb-label">Patients</span>
      <span class="sb-badge" id="badge-patients">3</span>
    </div>
    <div class="sb-item" onclick="go('consultations',this)">
      <div class="sb-ico">🩺</div>
      <span class="sb-label">Consultations</span>
      <span class="sb-badge" id="badge-consults">2</span>
    </div>
    <div class="sb-item" onclick="go('diagnostics',this)">
      <div class="sb-ico">🔬</div>
      <span class="sb-label">Diagnostics</span>
    </div>
    <div class="sb-item" onclick="go('prescriptions',this)">
      <div class="sb-ico">💊</div>
      <span class="sb-label">Prescriptions</span>
    </div>
    <div class="sb-item" onclick="go('examens',this)">
      <div class="sb-ico">🧪</div>
      <span class="sb-label">Examens</span>
    </div>

    <div class="sb-divider"></div>
    <div class="sb-section">Administration</div>
    <div class="sb-item" onclick="go('historique',this)">
      <div class="sb-ico">📜</div>
      <span class="sb-label">Historique médical</span>
    </div>
    <div class="sb-item" onclick="go('rdv',this)">
      <div class="sb-ico">📅</div>
      <span class="sb-label">Rendez-vous</span>
    </div>
    <div class="sb-item" onclick="go('stats',this)">
      <div class="sb-ico">📈</div>
      <span class="sb-label">Statistiques</span>
    </div>
  </nav>

  <div class="sb-bottom">
    <button class="sb-logout" onclick="toast('Déconnexion en cours…','warn')">🚪 Se déconnecter</button>
  </div>
</aside>

<!-- ═══════════════════════════════════════════════════════
     MAIN
═══════════════════════════════════════════════════════ -->
<main class="main">
  <div class="topbar">
    <div class="tb-left">
      <div class="tb-crumb">Médecin Chef <span class="sep">›</span><span class="active-c" id="crumb">Vue d'ensemble</span></div>
      <div class="tb-title"><div class="tb-dot"></div><span id="page-title">Tableau de bord</span></div>
    </div>
    <div class="tb-right">
      <div class="search-wrap">
        <span class="search-ico">🔍</span>
        <input class="search-fi" placeholder="Rechercher patient, dossier…" id="global-search" oninput="globalSearch(this.value)">
      </div>
      <div class="tb-date" id="current-date"></div>
      <div class="tb-avatar" title="Dr. Mehdi Benali">MD</div>
    </div>
  </div>

  <div class="content">

    <!-- ══ DASHBOARD ══ -->
    <div class="section active" id="section-dashboard">
      <div class="stats-row">
        <div class="stat-card green">
          <div class="stat-ico" style="background:var(--g-bg);">👥</div>
          <div class="stat-val" id="st-patients">3</div>
          <div class="stat-label">Patients enregistrés</div>
          <div class="stat-delta up">↑ +1 ce mois</div>
          <div class="mini-chart" id="mc1"></div>
        </div>
        <div class="stat-card blue">
          <div class="stat-ico" style="background:var(--blue-bg);">🩺</div>
          <div class="stat-val" id="st-consults">2</div>
          <div class="stat-label">Consultations</div>
          <div class="stat-delta up">↑ Actives</div>
          <div class="mini-chart" id="mc2"></div>
        </div>
        <div class="stat-card orange">
          <div class="stat-ico" style="background:var(--orange-bg);">💊</div>
          <div class="stat-val" id="st-rx">2</div>
          <div class="stat-label">Prescriptions</div>
          <div class="stat-delta up">↑ En cours</div>
          <div class="mini-chart" id="mc3"></div>
        </div>
        <div class="stat-card purple">
          <div class="stat-ico" style="background:var(--purple-bg);">🔬</div>
          <div class="stat-val" id="st-diags">2</div>
          <div class="stat-label">Diagnostics posés</div>
          <div class="stat-delta up">↑ Ce mois</div>
          <div class="mini-chart" id="mc4"></div>
        </div>
      </div>

      <div class="g2">
        <div class="panel">
          <div class="panel-head">
            <div class="panel-title"><div class="panel-ico" style="background:var(--g-bg);">🩺</div>Consultations récentes</div>
            <button class="btn btn-ghost btn-sm" onclick="go('consultations',null)">Voir tout →</button>
          </div>
          <div class="panel-body">
            <div class="timeline" id="dash-consults"></div>
          </div>
        </div>
        <div class="panel">
          <div class="panel-head">
            <div class="panel-title"><div class="panel-ico" style="background:var(--blue-bg);">📅</div>Patients récents</div>
            <button class="btn btn-primary btn-sm" onclick="openPatientModal()">+ Nouveau</button>
          </div>
          <div class="panel-body">
            <div id="dash-patients"></div>
          </div>
        </div>
      </div>

      <div class="alert alert-info">ℹ️ &nbsp;Bienvenue Dr. Benali — <strong>2 consultations</strong> planifiées pour aujourd'hui.</div>
    </div>

    <!-- ══ PATIENTS ══ -->
    <div class="section" id="section-patients">
      <div class="panel">
        <div class="panel-head">
          <div class="panel-title"><div class="panel-ico" style="background:var(--g-bg);">👥</div>Liste des patients</div>
          <div class="panel-actions">
            <div class="search-wrap" style="max-width:200px;">
              <span class="search-ico">🔍</span>
              <input class="search-fi" placeholder="Filtrer…" oninput="filterTable(this.value,'patients-list')">
            </div>
            <button class="btn btn-primary btn-sm" onclick="openPatientModal()">+ Nouveau patient</button>
          </div>
        </div>
        <div class="panel-body">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead><tr><th>N° Dossier</th><th>Nom & Prénom</th><th>Âge</th><th>Sexe</th><th>Groupe sg.</th><th>Contact</th><th>Statut</th><th>Actions</th></tr></thead>
              <tbody id="patients-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══ CONSULTATIONS ══ -->
    <div class="section" id="section-consultations">
      <div class="panel">
        <div class="panel-head">
          <div class="panel-title"><div class="panel-ico" style="background:var(--teal-bg);">🩺</div>Consultations</div>
          <div class="panel-actions">
            <div class="search-wrap" style="max-width:200px;">
              <span class="search-ico">🔍</span>
              <input class="search-fi" placeholder="Filtrer…" oninput="filterTable(this.value,'consultations-list')">
            </div>
            <button class="btn btn-primary btn-sm" onclick="openConsultModal()">+ Nouvelle consultation</button>
          </div>
        </div>
        <div class="panel-body">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead><tr><th>Date</th><th>Patient</th><th>Type</th><th>Motif</th><th>Diagnostic</th><th>Vitales</th><th>Statut</th><th>Actions</th></tr></thead>
              <tbody id="consultations-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══ DIAGNOSTICS ══ -->
    <div class="section" id="section-diagnostics">
      <div class="panel">
        <div class="panel-head">
          <div class="panel-title"><div class="panel-ico" style="background:var(--purple-bg);">🔬</div>Diagnostics</div>
          <button class="btn btn-primary btn-sm" onclick="openDiagModal()">+ Nouveau diagnostic</button>
        </div>
        <div class="panel-body">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead><tr><th>Date</th><th>Patient</th><th>Diagnostic</th><th>Code CIM-10</th><th>Sévérité</th><th>Traitement associé</th></tr></thead>
              <tbody id="diagnostics-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══ PRESCRIPTIONS ══ -->
    <div class="section" id="section-prescriptions">
      <div class="panel">
        <div class="panel-head">
          <div class="panel-title"><div class="panel-ico" style="background:var(--blue-bg);">💊</div>Ordonnances</div>
          <button class="btn btn-primary btn-sm" onclick="openRxModal()">+ Nouvelle prescription</button>
        </div>
        <div class="panel-body">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead><tr><th>Date</th><th>Patient</th><th>Médicament</th><th>Dosage</th><th>Posologie</th><th>Durée</th><th>Statut</th></tr></thead>
              <tbody id="prescriptions-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══ EXAMENS ══ -->
    <div class="section" id="section-examens">
      <div class="panel">
        <div class="panel-head">
          <div class="panel-title"><div class="panel-ico" style="background:var(--amber-bg);">🧪</div>Examens complémentaires</div>
          <button class="btn btn-primary btn-sm" onclick="openExamenModal()">+ Prescrire examen</button>
        </div>
        <div class="panel-body">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead><tr><th>Date</th><th>Patient</th><th>Type</th><th>Examen</th><th>Résultat</th><th>Statut</th></tr></thead>
              <tbody id="examens-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══ HISTORIQUE ══ -->
    <div class="section" id="section-historique">
      <div class="g2">
        <div id="hist-left">
          <div class="panel">
            <div class="panel-head"><div class="panel-title"><div class="panel-ico" style="background:var(--g-bg);">📜</div>Sélectionner un patient</div></div>
            <div class="panel-body" id="hist-patient-list"></div>
          </div>
        </div>
        <div id="hist-right">
          <div class="empty"><div class="empty-ico">📂</div><div class="empty-txt">Aucun dossier sélectionné</div><div class="empty-sub">Cliquez sur un patient pour voir son dossier complet</div></div>
        </div>
      </div>
    </div>

    <!-- ══ RDV ══ -->
    <div class="section" id="section-rdv">
      <div class="panel">
        <div class="panel-head">
          <div class="panel-title"><div class="panel-ico" style="background:var(--teal-bg);">📅</div>Rendez-vous</div>
          <button class="btn btn-primary btn-sm" onclick="openRdvModal()">+ Planifier RDV</button>
        </div>
        <div class="panel-body">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead><tr><th>Date & Heure</th><th>Patient</th><th>Motif</th><th>Durée</th><th>Statut</th></tr></thead>
              <tbody id="rdv-list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══ STATS ══ -->
    <div class="section" id="section-stats">
      <div class="g3">
        <div class="panel">
          <div class="panel-head"><div class="panel-title"><div class="panel-ico" style="background:var(--g-bg);">👥</div>Répartition par sexe</div></div>
          <div class="panel-body" id="stats-sex"></div>
        </div>
        <div class="panel">
          <div class="panel-head"><div class="panel-title"><div class="panel-ico" style="background:var(--blue-bg);">🩺</div>Top diagnostics</div></div>
          <div class="panel-body" id="stats-diags"></div>
        </div>
        <div class="panel">
          <div class="panel-head"><div class="panel-title"><div class="panel-ico" style="background:var(--orange-bg);">💊</div>Top médicaments</div></div>
          <div class="panel-body" id="stats-drugs"></div>
        </div>
      </div>
    </div>

  </div><!-- /content -->
</main>

<!-- ══════════════════════════
     MODAL — NOUVEAU PATIENT
══════════════════════════ -->
<div class="modal-overlay" id="modal-patient">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('modal-patient')">✕</button>
    <div class="modal-title">👤 Nouveau patient</div>

    <div class="modal-divider">Identité</div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Nom complet</label><input class="fi" id="pn" placeholder="Nom et prénom"></div>
      <div class="fg"><label class="fl fl-req">Date de naissance</label><input class="fi" id="pdob" type="date"></div>
    </div>
    <div class="fr3">
      <div class="fg"><label class="fl fl-req">Sexe</label>
        <select class="fi fsel" id="psex"><option value="">—</option><option>Masculin</option><option>Féminin</option></select>
      </div>
      <div class="fg"><label class="fl">Groupe sanguin</label>
        <select class="fi fsel" id="pblood"><option value="">—</option><option>A+</option><option>A−</option><option>B+</option><option>B−</option><option>AB+</option><option>AB−</option><option>O+</option><option>O−</option></select>
      </div>
      <div class="fg"><label class="fl">CIN / RAMED</label><input class="fi" id="pcin" placeholder="N° pièce"></div>
    </div>

    <div class="modal-divider">Contact</div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Téléphone</label><input class="fi" id="ptel" placeholder="06 XX XX XX XX"></div>
      <div class="fg"><label class="fl">Email</label><input class="fi" id="pemail" type="email" placeholder="optionnel"></div>
    </div>
    <div class="fg"><label class="fl">Adresse</label><input class="fi" id="paddr" placeholder="Ville, quartier…"></div>

    <div class="modal-divider">Médical</div>
    <div class="fr2">
      <div class="fg"><label class="fl">Antécédents médicaux</label><textarea class="fta" id="pant" placeholder="Maladies chroniques, chirurgies…" style="min-height:55px"></textarea></div>
      <div class="fg"><label class="fl">Allergies connues</label><textarea class="fta" id="pallg" placeholder="Médicaments, aliments…" style="min-height:55px"></textarea></div>
    </div>

    <div class="modal-footer">
      <button class="btn btn-ghost" onclick="closeModal('modal-patient')">Annuler</button>
      <button class="btn btn-primary" onclick="addPatient()">💾 Enregistrer</button>
    </div>
  </div>
</div>

<!-- ══════════════════════════
     MODAL — CONSULTATION
══════════════════════════ -->
<div class="modal-overlay" id="modal-consult">
  <div class="modal modal-lg">
    <button class="modal-close" onclick="closeModal('modal-consult')">✕</button>
    <div class="modal-title">🩺 Nouvelle consultation</div>

    <div class="modal-divider">Patient & Contexte</div>
    <div class="fr3">
      <div class="fg"><label class="fl fl-req">Patient</label><select class="fi fsel" id="cn-pt"></select></div>
      <div class="fg"><label class="fl fl-req">Date</label><input class="fi" id="cn-date" type="date"></div>
      <div class="fg"><label class="fl">Type</label>
        <select class="fi fsel" id="cn-type">
          <option>Consultation générale</option><option>Suivi chronique</option>
          <option>Urgence</option><option>Contrôle</option><option>Téléconsultation</option>
        </select>
      </div>
    </div>

    <div class="modal-divider">Constantes vitales</div>
    <div class="vitals-grid">
      <div class="vital-box"><div class="vital-lbl">Tension</div><input class="vital-inp" id="v-ta" value="120/80"><div class="vital-unit">mmHg</div></div>
      <div class="vital-box"><div class="vital-lbl">Pouls</div><input class="vital-inp" id="v-pouls" value="72"><div class="vital-unit">bpm</div></div>
      <div class="vital-box"><div class="vital-lbl">Température</div><input class="vital-inp" id="v-temp" value="37.0"><div class="vital-unit">°C</div></div>
      <div class="vital-box"><div class="vital-lbl">Poids</div><input class="vital-inp" id="v-poids" value=""><div class="vital-unit">kg</div></div>
    </div>

    <div class="modal-divider">Clinique</div>
    <div class="fg"><label class="fl fl-req">Motif de consultation</label><input class="fi" id="cn-motif" placeholder="Motif principal…"></div>
    <div class="fr2">
      <div class="fg"><label class="fl">Symptômes / Examen clinique</label><textarea class="fta" id="cn-sympt" placeholder="Décrire les symptômes, l'examen…"></textarea></div>
      <div class="fg"><label class="fl">Diagnostic principal</label><input class="fi" id="cn-diag" placeholder="Libellé du diagnostic…" style="margin-bottom:.5rem">
        <label class="fl">Code CIM-10</label><input class="fi" id="cn-cim" placeholder="Ex: I10, J06…">
      </div>
    </div>
    <div class="fg"><label class="fl">Notes & Recommandations</label><textarea class="fta" id="cn-notes" placeholder="Notes libres, conseils au patient…" style="min-height:55px"></textarea></div>

    <div class="modal-divider">Ordonnance rapide</div>
    <table class="rx-tbl">
      <thead><tr><th>Médicament</th><th>Dosage</th><th>Forme</th><th>Qté/j</th><th>Durée</th><th>Voie</th><th></th></tr></thead>
      <tbody id="quick-rx">
        <tr>
          <td><input class="rx-input" placeholder="Médicament"></td>
          <td><input class="rx-input" placeholder="Ex: 500mg"></td>
          <td><select class="rx-input"><option>Comprimé</option><option>Gélule</option><option>Sirop</option><option>Injectable</option><option>Pommade</option><option>Collyre</option><option>Suppositoire</option></select></td>
          <td><input class="rx-input" placeholder="3"></td>
          <td><input class="rx-input" placeholder="7 j"></td>
          <td><select class="rx-input"><option>Orale</option><option>IV</option><option>IM</option><option>SC</option><option>Topique</option></select></td>
          <td><button class="rx-del" onclick="delRxRow(this)">✕</button></td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-ghost btn-sm" style="margin-top:.5rem;width:100%;" onclick="addRxRow()">＋ Ajouter médicament</button>

    <div class="modal-divider">Examens prescrits</div>
    <div class="fr3">
      <div class="fg">
        <label class="fl">Biologie</label>
        <div class="chip-wrap" id="chip-bio"></div>
        <input class="fi" placeholder="Ajouter (Entrée)…" onkeydown="addChip(event,'chip-bio','chip-g')">
      </div>
      <div class="fg">
        <label class="fl">Imagerie</label>
        <div class="chip-wrap" id="chip-img"></div>
        <input class="fi" placeholder="Radio, écho… (Entrée)" onkeydown="addChip(event,'chip-img','chip-a')">
      </div>
      <div class="fg">
        <label class="fl">Autres actes</label>
        <div class="chip-wrap" id="chip-actes"></div>
        <input class="fi" placeholder="ECG, spirométrie… (Entrée)" onkeydown="addChip(event,'chip-actes','chip-b')">
      </div>
    </div>

    <div class="fr2" style="margin-top:.5rem;">
      <div class="fg"><label class="fl">Prochain RDV</label><input class="fi" id="cn-rdv" type="date"></div>
      <div class="fg"><label class="fl">Statut</label>
        <select class="fi fsel" id="cn-statut">
          <option>Terminée</option><option>En cours</option><option>À revoir</option>
        </select>
      </div>
    </div>

    <div class="modal-footer">
      <button class="btn btn-ghost" onclick="closeModal('modal-consult')">Annuler</button>
      <button class="btn btn-ghost" onclick="printConsult()">🖨️ Imprimer</button>
      <button class="btn btn-primary" onclick="addConsultation()">💾 Enregistrer</button>
    </div>
  </div>
</div>

<!-- ══════════════════════════
     MODAL — DIAGNOSTIC
══════════════════════════ -->
<div class="modal-overlay" id="modal-diag">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('modal-diag')">✕</button>
    <div class="modal-title">🔬 Nouveau diagnostic</div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Patient</label><select class="fi fsel" id="dn-pt"></select></div>
      <div class="fg"><label class="fl fl-req">Date</label><input class="fi" id="dn-date" type="date"></div>
    </div>
    <div class="fg"><label class="fl fl-req">Diagnostic</label><input class="fi" id="dn-diag" placeholder="Libellé du diagnostic"></div>
    <div class="fr3">
      <div class="fg"><label class="fl">Code CIM-10</label><input class="fi" id="dn-cim" placeholder="Ex: E11"></div>
      <div class="fg"><label class="fl fl-req">Sévérité</label>
        <select class="fi fsel" id="dn-sev">
          <option>Léger</option><option>Modéré</option><option>Sévère</option><option>Critique</option>
        </select>
      </div>
      <div class="fg"><label class="fl">Traitement associé</label><input class="fi" id="dn-treat" placeholder="Optionnel"></div>
    </div>
    <div class="fg"><label class="fl">Observations</label><textarea class="fta" id="dn-obs" placeholder="Détails cliniques…"></textarea></div>
    <div class="modal-footer">
      <button class="btn btn-ghost" onclick="closeModal('modal-diag')">Annuler</button>
      <button class="btn btn-primary" onclick="addDiagnostic()">💾 Enregistrer</button>
    </div>
  </div>
</div>

<!-- ══════════════════════════
     MODAL — PRESCRIPTION
══════════════════════════ -->
<div class="modal-overlay" id="modal-rx">
  <div class="modal modal-lg">
    <button class="modal-close" onclick="closeModal('modal-rx')">✕</button>
    <div class="modal-title">💊 Ordonnance médicale</div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Patient</label><select class="fi fsel" id="rxn-pt"></select></div>
      <div class="fg"><label class="fl fl-req">Date</label><input class="fi" id="rxn-date" type="date"></div>
    </div>

    <div class="modal-divider">Médicaments prescrits</div>
    <table class="rx-tbl">
      <thead><tr><th>Médicament (DCI)</th><th>Dosage</th><th>Forme</th><th>Qtité/j</th><th>Durée</th><th>Voie</th><th>Instructions</th><th></th></tr></thead>
      <tbody id="rx-body">
        <tr>
          <td><input class="rx-input" placeholder="Ex: Paracétamol"></td>
          <td><input class="rx-input" placeholder="1g"></td>
          <td><select class="rx-input"><option>Comprimé</option><option>Gélule</option><option>Sirop</option><option>Injectable</option><option>Pommade</option><option>Collyre</option><option>Suppositoire</option><option>Patch</option></select></td>
          <td><input class="rx-input" placeholder="3"></td>
          <td><input class="rx-input" placeholder="5 jours"></td>
          <td><select class="rx-input"><option>Orale</option><option>IV</option><option>IM</option><option>SC</option><option>Topique</option><option>Sublinguale</option></select></td>
          <td><input class="rx-input" placeholder="Après repas…"></td>
          <td><button class="rx-del" onclick="delRxRow(this)">✕</button></td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-ghost btn-sm" style="margin-top:.5rem;width:100%;" onclick="addRxRowFull()">＋ Ajouter médicament</button>

    <div class="fg" style="margin-top:1rem;"><label class="fl">Conseils & Instructions au patient</label><textarea class="fta" id="rx-instructions" placeholder="Prendre avec eau, éviter l'alcool, revenir si aggravation…"></textarea></div>

    <div class="modal-footer">
      <button class="btn btn-ghost" onclick="closeModal('modal-rx')">Annuler</button>
      <button class="btn btn-ghost" onclick="toast('Ordonnance imprimée','info')">🖨️ Imprimer</button>
      <button class="btn btn-primary" onclick="addPrescription()">💾 Enregistrer</button>
    </div>
  </div>
</div>

<!-- ══════════════════════════
     MODAL — EXAMEN
══════════════════════════ -->
<div class="modal-overlay" id="modal-examen">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('modal-examen')">✕</button>
    <div class="modal-title">🧪 Prescrire un examen</div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Patient</label><select class="fi fsel" id="ex-pt"></select></div>
      <div class="fg"><label class="fl fl-req">Date de prescription</label><input class="fi" id="ex-date" type="date"></div>
    </div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Type</label>
        <select class="fi fsel" id="ex-type">
          <option>Biologie</option><option>Imagerie</option><option>ECG</option>
          <option>Spirométrie</option><option>Endoscopie</option><option>Autre</option>
        </select>
      </div>
      <div class="fg"><label class="fl fl-req">Examen</label><input class="fi" id="ex-name" placeholder="Ex: NFS, Radio thorax…"></div>
    </div>
    <div class="fg"><label class="fl">Résultat / Observations</label><textarea class="fta" id="ex-result" placeholder="À compléter après réception…"></textarea></div>
    <div class="fg"><label class="fl">Statut</label>
      <select class="fi fsel" id="ex-status">
        <option>Prescrit</option><option>En attente</option><option>Résultat reçu</option><option>Anormal</option>
      </select>
    </div>
    <div class="modal-footer">
      <button class="btn btn-ghost" onclick="closeModal('modal-examen')">Annuler</button>
      <button class="btn btn-primary" onclick="addExamen()">💾 Enregistrer</button>
    </div>
  </div>
</div>

<!-- ══════════════════════════
     MODAL — RDV
══════════════════════════ -->
<div class="modal-overlay" id="modal-rdv">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('modal-rdv')">✕</button>
    <div class="modal-title">📅 Nouveau rendez-vous</div>
    <div class="fg"><label class="fl fl-req">Patient</label><select class="fi fsel" id="rdvn-pt"></select></div>
    <div class="fr2">
      <div class="fg"><label class="fl fl-req">Date</label><input class="fi" id="rdvn-date" type="date"></div>
      <div class="fg"><label class="fl fl-req">Heure</label><input class="fi" id="rdvn-time" type="time" value="09:00"></div>
    </div>
    <div class="fr2">
      <div class="fg"><label class="fl">Durée estimée</label>
        <select class="fi fsel" id="rdvn-dur">
          <option>15 min</option><option>30 min</option><option>45 min</option><option>1h</option>
        </select>
      </div>
      <div class="fg"><label class="fl">Motif</label><input class="fi" id="rdvn-motif" placeholder="Suivi, contrôle…"></div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-ghost" onclick="closeModal('modal-rdv')">Annuler</button>
      <button class="btn btn-primary" onclick="addRdv()">💾 Enregistrer</button>
    </div>
  </div>
</div>

<!-- TOAST CONTAINER -->
<div id="toast-wrap"></div>

<!-- ══════════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
// ─── DATA STORE ───────────────────────────────────────
let DB = {
  patients: [
    { id:1, name:"Fatima Zahra Benali", dob:"1992-05-14", sex:"Féminin", blood:"A+", cin:"BH123456", tel:"0612345678", email:"", addr:"Safi, Hay Essalam", ant:"Asthme depuis l'enfance", allg:"Pénicilline", status:"Actif" },
    { id:2, name:"Ahmed Oulad Hammou", dob:"1967-03-22", sex:"Masculin", blood:"O+", cin:"BK987654", tel:"0623456789", email:"", addr:"Safi, Centre-ville", ant:"Diabète type 2, HTA", allg:"", status:"Actif" },
    { id:3, name:"Khadija Mouhsine", dob:"1999-11-08", sex:"Féminin", blood:"B+", cin:"BJ456789", tel:"0634567890", email:"", addr:"Safi, Hay Lala Meriem", ant:"", allg:"Ibuprofène", status:"Actif" }
  ],
  consultations: [
    { id:1, patientId:1, date:"2026-03-24", type:"Consultation générale", motif:"Contrôle asthme", sympt:"Toux sèche nocturne, légère dyspnée", diag:"Asthme bronchique", cim:"J45", notes:"Renouveler bronchodilatateur", ta:"118/78", pouls:"80", temp:"37.1", poids:"58", rdv:"2026-04-24", statut:"Terminée" },
    { id:2, patientId:2, date:"2026-03-22", type:"Suivi chronique", motif:"Suivi HTA et diabète", sympt:"Céphalées matinales, fatigue", diag:"Hypertension + Diabète type 2", cim:"I10+E11", notes:"Glycémie élevée, adapter traitement", ta:"145/92", pouls:"76", temp:"36.9", poids:"82", rdv:"2026-04-22", statut:"À revoir" }
  ],
  diagnostics: [
    { id:1, patientId:1, date:"2026-03-24", diag:"Asthme bronchique modéré persistant", cim:"J45.1", sev:"Modéré", treat:"Salbutamol + Fluticasone", obs:"Patient sensible aux acariens" },
    { id:2, patientId:2, date:"2026-03-22", diag:"Hypertension artérielle stade II", cim:"I10", sev:"Sévère", treat:"Amlodipine 10mg + Losartan 50mg", obs:"Cible TA < 130/80" },
    { id:3, patientId:2, date:"2026-03-22", diag:"Diabète de type 2 déséquilibré", cim:"E11", sev:"Modéré", treat:"Metformine 850mg x2", obs:"HbA1c à recontrôler dans 3 mois" }
  ],
  prescriptions: [
    { id:1, patientId:1, date:"2026-03-24", drug:"Salbutamol", dosage:"100µg", form:"Inhalateur", qty:"2 bouffées", dur:"Au besoin", route:"Inhalée", instr:"En cas de crise", statut:"Active" },
    { id:2, patientId:2, date:"2026-03-22", drug:"Amlodipine", dosage:"10mg", form:"Comprimé", qty:"1", dur:"À vie", route:"Orale", instr:"Matin, à jeun", statut:"Active" },
    { id:3, patientId:2, date:"2026-03-22", drug:"Metformine", dosage:"850mg", form:"Comprimé", qty:"2", dur:"À vie", route:"Orale", instr:"Matin et soir, pendant les repas", statut:"Active" }
  ],
  examens: [
    { id:1, patientId:1, date:"2026-03-24", type:"Biologie", name:"NFS + EEP", result:"", status:"Prescrit" },
    { id:2, patientId:2, date:"2026-03-22", type:"Biologie", name:"Glycémie à jeun + HbA1c", result:"Glycémie: 2.1 g/L — HbA1c: 8.2%", status:"Résultat reçu" }
  ],
  rdvs: [
    { id:1, patientId:1, date:"2026-04-24", time:"09:00", dur:"30 min", motif:"Suivi asthme", statut:"Planifié" },
    { id:2, patientId:2, date:"2026-04-22", time:"10:30", dur:"45 min", motif:"Contrôle HTA + glycémie", statut:"Planifié" }
  ]
};
let nextId={p:4,c:3,d:4,rx:4,ex:3,rdv:3};

// ─── UTILS ────────────────────────────────────────────
const $ = id => document.getElementById(id);
const today = () => new Date().toISOString().slice(0,10);
const age = dob => { const d=new Date(dob); const n=new Date(); let a=n.getFullYear()-d.getFullYear(); if(n<new Date(n.getFullYear(),d.getMonth(),d.getDate())) a--; return a; };
const avatarColor = id => ['#1a5c42','#1a3a5c','#5c1a3a','#3a1a5c','#5c3a1a'][id%5];
const initials = n => n.split(' ').slice(0,2).map(w=>w[0]).join('').toUpperCase();
const sevBadge = s => ({Léger:'bg-g',Modéré:'bg-a',Sévère:'bg-o',Critique:'bg-r',Normal:'bg-g'}[s]||'bg-gray');
const statusBadge = s => ({Active:'bg-g',Terminée:'bg-g','À revoir':'bg-o','En cours':'bg-b',Prescrit:'bg-b','En attente':'bg-a','Résultat reçu':'bg-g',Anormal:'bg-r',Planifié:'bg-b',Actif:'bg-g'}[s]||'bg-gray');
const ptName = id => (DB.patients.find(p=>p.id===id)||{name:'Inconnu'}).name;

// ─── RENDER ───────────────────────────────────────────
function renderAll(){
  renderPatients(); renderConsultations(); renderDiagnostics();
  renderPrescriptions(); renderExamens(); renderRdvs();
  renderDashboard(); renderStats(); renderHistPatients();
  updateBadges();
}

function updateBadges(){
  $('badge-patients').textContent = DB.patients.length;
  $('badge-consults').textContent = DB.consultations.length;
  $('st-patients').textContent = DB.patients.length;
  $('st-consults').textContent = DB.consultations.length;
  $('st-rx').textContent = DB.prescriptions.length;
  $('st-diags').textContent = DB.diagnostics.length;
}

function renderPatients(){
  $('patients-list').innerHTML = DB.patients.map(p=>`
    <tr onclick="openDossier(${p.id})">
      <td><span class="tbl-mono">#${String(p.id).padStart(3,'0')}</span></td>
      <td>
        <div style="display:flex;align-items:center;gap:.6rem;">
          <div class="avatar" style="background:${avatarColor(p.id)}">${initials(p.name)}</div>
          <div><div class="tbl-bold">${p.name}</div><div style="font-size:.62rem;color:var(--muted);">${p.tel}</div></div>
        </div>
      </td>
      <td>${age(p.dob)} ans</td>
      <td><span class="badge ${p.sex==='Féminin'?'bg-p':'bg-b'}">${p.sex==='Féminin'?'F':'M'}</span></td>
      <td><span class="badge bg-gray">${p.blood||'—'}</span></td>
      <td style="font-family:monospace;font-size:.72rem;">${p.tel}</td>
      <td><span class="badge ${statusBadge(p.status)}">${p.status}</span></td>
      <td onclick="event.stopPropagation()">
        <div style="display:flex;gap:.35rem;">
          <button class="btn btn-ghost btn-xs" onclick="openDossier(${p.id})">📋 Dossier</button>
          <button class="btn btn-ghost btn-xs" onclick="quickConsult(${p.id})">🩺 Consult.</button>
        </div>
      </td>
    </tr>`).join('');
}

function renderConsultations(){
  $('consultations-list').innerHTML = DB.consultations.map(c=>`
    <tr>
      <td><span class="tbl-mono">${c.date}</span></td>
      <td>
        <div style="display:flex;align-items:center;gap:.5rem;">
          <div class="avatar" style="background:${avatarColor(c.patientId)};width:24px;height:24px;font-size:.55rem;border-radius:6px;">${initials(ptName(c.patientId))}</div>
          <span class="tbl-bold">${ptName(c.patientId)}</span>
        </div>
      </td>
      <td><span class="badge bg-t">${c.type||'Générale'}</span></td>
      <td>${c.motif}</td>
      <td>${c.diag||'<span style="color:var(--muted3)">—</span>'}</td>
      <td><span style="font-family:monospace;font-size:.68rem;color:var(--muted);">${c.ta||'—'} mmHg</span></td>
      <td><span class="badge ${statusBadge(c.statut)}">${c.statut}</span></td>
      <td><button class="btn btn-ghost btn-xs">👁 Voir</button></td>
    </tr>`).join('');
}

function renderDiagnostics(){
  $('diagnostics-list').innerHTML = DB.diagnostics.map(d=>`
    <tr>
      <td><span class="tbl-mono">${d.date}</span></td>
      <td class="tbl-bold">${ptName(d.patientId)}</td>
      <td><strong>${d.diag}</strong></td>
      <td><span class="badge bg-b">${d.cim||'—'}</span></td>
      <td><span class="badge ${sevBadge(d.sev)}">${d.sev}</span></td>
      <td style="font-size:.72rem;color:var(--muted);">${d.treat||'—'}</td>
    </tr>`).join('');
}

function renderPrescriptions(){
  $('prescriptions-list').innerHTML = DB.prescriptions.map(r=>`
    <tr>
      <td><span class="tbl-mono">${r.date}</span></td>
      <td class="tbl-bold">${ptName(r.patientId)}</td>
      <td><strong>${r.drug}</strong> <span style="font-size:.65rem;color:var(--muted)">${r.form||''}</span></td>
      <td>${r.dosage}</td>
      <td>${r.qty||'1'}/j — ${r.instr||''}</td>
      <td>${r.dur}</td>
      <td><span class="badge ${statusBadge(r.statut)}">${r.statut}</span></td>
    </tr>`).join('');
}

function renderExamens(){
  $('examens-list').innerHTML = DB.examens.map(e=>`
    <tr>
      <td><span class="tbl-mono">${e.date}</span></td>
      <td class="tbl-bold">${ptName(e.patientId)}</td>
      <td><span class="badge ${e.type==='Biologie'?'bg-g':e.type==='Imagerie'?'bg-b':'bg-a'}">${e.type}</span></td>
      <td><strong>${e.name}</strong></td>
      <td style="font-size:.72rem;max-width:180px;color:var(--muted);">${e.result||'<em>En attente</em>'}</td>
      <td><span class="badge ${statusBadge(e.status)}">${e.status}</span></td>
    </tr>`).join('');
}

function renderRdvs(){
  $('rdv-list').innerHTML = DB.rdvs.map(r=>`
    <tr>
      <td><span class="tbl-mono">${r.date}</span> <strong>${r.time}</strong></td>
      <td class="tbl-bold">${ptName(r.patientId)}</td>
      <td>${r.motif||'—'}</td>
      <td>${r.dur}</td>
      <td><span class="badge ${statusBadge(r.statut)}">${r.statut}</span></td>
    </tr>`).join('');
}

function renderDashboard(){
  // Timeline consultations
  $('dash-consults').innerHTML = DB.consultations.slice(-4).reverse().map(c=>`
    <div class="tl-item">
      <div class="tl-dot" style="background:var(--g);"></div>
      <div class="tl-date">${c.date} · ${c.type}</div>
      <div class="tl-title">${ptName(c.patientId)}</div>
      <div class="tl-note">${c.motif} — <span class="badge bg-g" style="font-size:.56rem;">${c.statut}</span></div>
    </div>`).join('') || '<div class="empty"><div class="empty-ico">📭</div><div class="empty-txt">Aucune consultation</div></div>';

  // Recent patients
  $('dash-patients').innerHTML = DB.patients.slice(-3).map(p=>`
    <div style="display:flex;align-items:center;gap:.75rem;padding:.6rem 0;border-bottom:1px solid var(--border2);">
      <div class="avatar" style="background:${avatarColor(p.id)}">${initials(p.name)}</div>
      <div style="flex:1;">
        <div class="tbl-bold" style="font-size:.8rem;">${p.name}</div>
        <div style="font-size:.63rem;color:var(--muted)">${age(p.dob)} ans · ${p.sex==='Féminin'?'F':'M'} · ${p.tel}</div>
      </div>
      <button class="btn btn-ghost btn-xs" onclick="openDossier(${p.id})">📋</button>
    </div>`).join('');

  // Mini charts
  ['mc1','mc2','mc3','mc4'].forEach((id,i)=>{
    const h=[35,55,40,70,50,80,60,45,75,90];
    $(id).innerHTML = h.map(v=>`<div class="mc-bar" style="height:${v}%"></div>`).join('');
  });
}

function renderHistPatients(){
  $('hist-patient-list').innerHTML = DB.patients.map(p=>`
    <div style="display:flex;align-items:center;gap:.75rem;padding:.7rem .5rem;border-radius:var(--r1);cursor:pointer;transition:background .15s;"
      onmouseover="this.style.background='var(--border3)'" onmouseout="this.style.background=''"
      onclick="openDossier(${p.id})">
      <div class="avatar" style="background:${avatarColor(p.id)}">${initials(p.name)}</div>
      <div>
        <div class="tbl-bold" style="font-size:.8rem;">${p.name}</div>
        <div style="font-size:.62rem;color:var(--muted)">${age(p.dob)} ans · ${p.sex}</div>
      </div>
      <div style="margin-left:auto;font-size:.75rem;">→</div>
    </div>`).join('');
}

function renderStats(){
  const total = DB.patients.length;
  const masc = DB.patients.filter(p=>p.sex==='Masculin').length;
  const fem = DB.patients.filter(p=>p.sex==='Féminin').length;
  $('stats-sex').innerHTML = `
    <div style="font-size:.72rem;color:var(--muted);margin-bottom:.75rem;">Total: <strong>${total} patients</strong></div>
    <div style="display:flex;align-items:center;gap:.6rem;margin-bottom:.4rem;">
      <div style="font-size:.72rem;min-width:70px;">Masculin</div>
      <div class="progress-bar" style="flex:1"><div class="progress-fill" style="width:${masc/total*100}%;background:linear-gradient(90deg,var(--blue),#60a5fa)"></div></div>
      <strong style="font-size:.75rem;min-width:20px;">${masc}</strong>
    </div>
    <div style="display:flex;align-items:center;gap:.6rem;">
      <div style="font-size:.72rem;min-width:70px;">Féminin</div>
      <div class="progress-bar" style="flex:1"><div class="progress-fill" style="width:${fem/total*100}%;background:linear-gradient(90deg,var(--purple),#a78bfa)"></div></div>
      <strong style="font-size:.75rem;min-width:20px;">${fem}</strong>
    </div>`;

  $('stats-diags').innerHTML = DB.diagnostics.slice(0,5).map((d,i)=>`
    <div style="padding:.4rem 0;border-bottom:1px solid var(--border2);">
      <div style="font-size:.75rem;font-weight:700;">${d.diag.substring(0,30)}…</div>
      <div style="display:flex;align-items:center;gap:.5rem;margin-top:.25rem;">
        <div class="progress-bar" style="flex:1"><div class="progress-fill" style="width:${80-i*15}%"></div></div>
        <span class="badge ${sevBadge(d.sev)}">${d.sev}</span>
      </div>
    </div>`).join('');

  $('stats-drugs').innerHTML = DB.prescriptions.slice(0,5).map((r,i)=>`
    <div style="padding:.4rem 0;border-bottom:1px solid var(--border2);">
      <div style="font-size:.75rem;font-weight:700;">${r.drug} <span style="font-size:.65rem;color:var(--muted)">${r.dosage}</span></div>
      <div style="display:flex;align-items:center;gap:.5rem;margin-top:.25rem;">
        <div class="progress-bar" style="flex:1"><div class="progress-fill" style="width:${90-i*16}%;background:linear-gradient(90deg,var(--blue),#60a5fa)"></div></div>
        <span class="badge bg-g">${r.statut}</span>
      </div>
    </div>`).join('');
}

// ─── OPEN DOSSIER ─────────────────────────────────────
function openDossier(pid){
  const p = DB.patients.find(x=>x.id===pid);
  if(!p) return;
  const cs = DB.consultations.filter(c=>c.patientId===pid);
  const ds = DB.diagnostics.filter(d=>d.patientId===pid);
  const rs = DB.prescriptions.filter(r=>r.patientId===pid);
  const es = DB.examens.filter(e=>e.patientId===pid);

  $('hist-right').innerHTML = `
    <div class="dossier-header">
      <div class="dossier-av" style="background:${avatarColor(p.id)}">${initials(p.name)}</div>
      <div style="flex:1">
        <div class="dossier-name">${p.name}</div>
        <div class="dossier-meta">
          <span>📅 ${age(p.dob)} ans (${p.dob})</span>
          <span>⚧ ${p.sex}</span>
          <span>🩸 ${p.blood||'—'}</span>
          <span>📞 ${p.tel}</span>
        </div>
        <div class="dossier-tags">
          ${p.allg?`<span class="badge bg-r">⚠️ Allergie: ${p.allg}</span>`:''}
          ${p.ant?`<span class="badge bg-a">Ant: ${p.ant.substring(0,30)}</span>`:''}
          <span class="badge ${statusBadge(p.status)}">${p.status}</span>
        </div>
      </div>
      <div style="display:flex;gap:.5rem;flex-shrink:0;">
        <button class="btn btn-ghost btn-sm" style="color:rgba(255,255,255,.7);border-color:rgba(255,255,255,.15);" onclick="quickConsult(${p.id})">🩺 Consultation</button>
      </div>
    </div>

    <div class="g2">
      <div>
        <div class="panel">
          <div class="panel-head"><div class="panel-title">🩺 Consultations (${cs.length})</div></div>
          <div class="panel-body">
            ${cs.length ? cs.map(c=>`<div class="hist-item">
              <div class="hist-date">${c.date} · ${c.type}</div>
              <div class="hist-diag">${c.motif}</div>
              <div class="hist-note">${c.sympt||c.notes||''}</div>
              <div style="margin-top:.3rem;display:flex;gap:.35rem;">
                <span class="badge bg-t" style="font-size:.56rem;">${c.ta} mmHg</span>
                <span class="badge bg-g" style="font-size:.56rem;">${c.temp}°C</span>
                <span class="badge ${statusBadge(c.statut)}" style="font-size:.56rem;">${c.statut}</span>
              </div>
            </div>`).join('') : '<div class="empty" style="padding:1rem"><div class="empty-ico">📭</div><div class="empty-txt">Aucune consultation</div></div>'}
          </div>
        </div>

        <div class="panel">
          <div class="panel-head"><div class="panel-title">🧪 Examens (${es.length})</div></div>
          <div class="panel-body">
            ${es.length ? es.map(e=>`<div class="hist-item" style="border-left-color:var(--amber)">
              <div class="hist-date">${e.date} · ${e.type}</div>
              <div class="hist-diag">${e.name}</div>
              <div class="hist-note">${e.result||'En attente du résultat'}</div>
            </div>`).join('') : '<div style="font-size:.72rem;color:var(--muted)">Aucun examen</div>'}
          </div>
        </div>
      </div>

      <div>
        <div class="panel">
          <div class="panel-head"><div class="panel-title">🔬 Diagnostics (${ds.length})</div></div>
          <div class="panel-body">
            ${ds.length ? ds.map(d=>`<div class="hist-item" style="border-left-color:var(--purple)">
              <div class="hist-date">${d.date}</div>
              <div class="hist-diag">${d.diag}</div>
              <div style="display:flex;gap:.35rem;margin:.3rem 0;">
                <span class="badge bg-b" style="font-size:.56rem;">${d.cim}</span>
                <span class="badge ${sevBadge(d.sev)}" style="font-size:.56rem;">${d.sev}</span>
              </div>
              <div class="hist-note">${d.treat||''}</div>
            </div>`).join('') : '<div style="font-size:.72rem;color:var(--muted)">Aucun diagnostic</div>'}
          </div>
        </div>

        <div class="panel">
          <div class="panel-head"><div class="panel-title">💊 Prescriptions (${rs.length})</div></div>
          <div class="panel-body">
            ${rs.length ? rs.map(r=>`<div style="display:flex;align-items:center;gap:.6rem;padding:.45rem 0;border-bottom:1px solid var(--border2);">
              <span style="font-size:1rem;">💊</span>
              <div style="flex:1">
                <div style="font-weight:700;font-size:.78rem;">${r.drug} ${r.dosage}</div>
                <div style="font-size:.65rem;color:var(--muted);">${r.qty}/j · ${r.dur} · ${r.instr||''}</div>
              </div>
              <span class="badge ${statusBadge(r.statut)}" style="font-size:.55rem;">${r.statut}</span>
            </div>`).join('') : '<div style="font-size:.72rem;color:var(--muted)">Aucune prescription</div>'}
          </div>
        </div>
      </div>
    </div>`;

  go('historique', document.querySelector('.sb-item:nth-child(8)'));
}

// ─── QUICK CONSULT ────────────────────────────────────
function quickConsult(pid){
  openConsultModal();
  setTimeout(()=>{ $('cn-pt').value = pid; }, 50);
}

// ─── NAVIGATION ───────────────────────────────────────
const pageInfo = {
  dashboard:['Vue d\'ensemble','Tableau de bord'],
  patients:['Patients','Gestion des patients'],
  consultations:['Consultations','Historique des consultations'],
  diagnostics:['Diagnostics','Diagnostics médicaux'],
  prescriptions:['Prescriptions','Ordonnances émises'],
  examens:['Examens','Examens complémentaires'],
  historique:['Historique médical','Dossier médical patient'],
  rdv:['Rendez-vous','Agenda médical'],
  stats:['Statistiques','Statistiques & Analyses']
};
function go(name,el){
  document.querySelectorAll('.section').forEach(s=>s.classList.remove('active'));
  const s = $(`section-${name}`);
  if(s) s.classList.add('active');
  document.querySelectorAll('.sb-item').forEach(i=>i.classList.remove('active'));
  if(el) el.classList.add('active');
  const [crumb,title] = pageInfo[name]||['—','—'];
  $('crumb').textContent = crumb;
  $('page-title').textContent = title;
  if(name==='stats') renderStats();
}

// ─── MODAL HELPERS ────────────────────────────────────
function openModal(id){ $(id).classList.add('open'); }
function closeModal(id){ $(id).classList.remove('open'); }
document.querySelectorAll('.modal-overlay').forEach(o=>{
  o.addEventListener('click',e=>{ if(e.target===o) closeModal(o.id); });
});
document.addEventListener('keydown',e=>{ if(e.key==='Escape') document.querySelectorAll('.modal-overlay.open').forEach(m=>m.classList.remove('open')); });

function fillSelects(){
  const opts = DB.patients.map(p=>`<option value="${p.id}">${p.name} (${age(p.dob)} ans)</option>`).join('');
  ['cn-pt','dn-pt','rxn-pt','ex-pt','rdvn-pt'].forEach(id=>{ if($(id)) $(id).innerHTML=opts; });
}

function openPatientModal(){ openModal('modal-patient'); }
function openConsultModal(){ fillSelects(); $('cn-date').value=today(); openModal('modal-consult'); }
function openDiagModal(){ fillSelects(); $('dn-date').value=today(); openModal('modal-diag'); }
function openRxModal(){ fillSelects(); $('rxn-date').value=today(); openModal('modal-rx'); }
function openExamenModal(){ fillSelects(); $('ex-date').value=today(); openModal('modal-examen'); }
function openRdvModal(){ fillSelects(); openModal('modal-rdv'); }

// ─── ADD RECORDS ──────────────────────────────────────
function addPatient(){
  const name=$('pn').value.trim(), dob=$('pdob').value, sex=$('psex').value;
  if(!name||!dob||!sex){ toast('Remplir les champs obligatoires (*)','warn'); return; }
  DB.patients.push({ id:nextId.p++, name, dob, sex, blood:$('pblood').value, cin:$('pcin').value, tel:$('ptel').value, email:$('pemail').value, addr:$('paddr').value, ant:$('pant').value, allg:$('pallg').value, status:'Actif' });
  renderAll(); closeModal('modal-patient');
  ['pn','pdob','ptel','pemail','paddr','pant','pallg','pcin'].forEach(id=>{ if($(id)) $(id).value=''; });
  $('psex').value=''; $('pblood').value='';
  toast(`Patient ${name} ajouté`);
}

function addConsultation(){
  const pid=parseInt($('cn-pt').value), motif=$('cn-motif').value.trim();
  if(!pid||!motif){ toast('Patient et motif obligatoires','warn'); return; }
  // collect rx rows
  const rxRows=[]; document.querySelectorAll('#quick-rx tr').forEach(tr=>{
    const inputs=tr.querySelectorAll('input,select');
    if(inputs[0]&&inputs[0].value.trim()){
      DB.prescriptions.push({id:nextId.rx++,patientId:pid,date:$('cn-date').value,drug:inputs[0].value,dosage:inputs[1]?inputs[1].value:'',form:inputs[2]?inputs[2].value:'',qty:inputs[3]?inputs[3].value:'1',dur:inputs[4]?inputs[4].value:'',route:inputs[5]?inputs[5].value:'',instr:'',statut:'Active'});
    }
  });
  DB.consultations.push({id:nextId.c++,patientId:pid,date:$('cn-date').value,type:$('cn-type').value,motif,sympt:$('cn-sympt').value,diag:$('cn-diag').value,cim:$('cn-cim').value,notes:$('cn-notes').value,ta:$('v-ta').value,pouls:$('v-pouls').value,temp:$('v-temp').value,poids:$('v-poids').value,rdv:$('cn-rdv').value,statut:$('cn-statut').value});
  renderAll(); closeModal('modal-consult');
  ['cn-motif','cn-sympt','cn-diag','cn-cim','cn-notes','cn-rdv'].forEach(id=>$(id).value='');
  $('quick-rx').innerHTML=rxRowHtml(); $('chip-bio').innerHTML=''; $('chip-img').innerHTML=''; $('chip-actes').innerHTML='';
  toast('Consultation enregistrée');
}

function addDiagnostic(){
  const pid=parseInt($('dn-pt').value), diag=$('dn-diag').value.trim();
  if(!pid||!diag){ toast('Patient et diagnostic obligatoires','warn'); return; }
  DB.diagnostics.push({id:nextId.d++,patientId:pid,date:$('dn-date').value,diag,cim:$('dn-cim').value,sev:$('dn-sev').value,treat:$('dn-treat').value,obs:$('dn-obs').value});
  renderAll(); closeModal('modal-diag');
  ['dn-diag','dn-cim','dn-treat','dn-obs'].forEach(id=>$(id).value='');
  toast('Diagnostic enregistré');
}

function addPrescription(){
  const pid=parseInt($('rxn-pt').value);
  if(!pid){ toast('Sélectionner un patient','warn'); return; }
  let added=0;
  document.querySelectorAll('#rx-body tr').forEach(tr=>{
    const inputs=tr.querySelectorAll('input,select');
    if(inputs[0]&&inputs[0].value.trim()){
      DB.prescriptions.push({id:nextId.rx++,patientId:pid,date:$('rxn-date').value,drug:inputs[0].value,dosage:inputs[1]?inputs[1].value:'',form:inputs[2]?inputs[2].value:'Comprimé',qty:inputs[3]?inputs[3].value:'1',dur:inputs[4]?inputs[4].value:'',route:inputs[5]?inputs[5].value:'Orale',instr:inputs[6]?inputs[6].value:'',statut:'Active'});
      added++;
    }
  });
  if(!added){ toast('Ajouter au moins un médicament','warn'); return; }
  renderAll(); closeModal('modal-rx');
  $('rx-body').innerHTML=rxRowFullHtml(); $('rx-instructions').value='';
  toast(`${added} prescription(s) enregistrée(s)`);
}

function addExamen(){
  const pid=parseInt($('ex-pt').value), name=$('ex-name').value.trim();
  if(!pid||!name){ toast('Patient et examen obligatoires','warn'); return; }
  DB.examens.push({id:nextId.ex++,patientId:pid,date:$('ex-date').value,type:$('ex-type').value,name,result:$('ex-result').value,status:$('ex-status').value});
  renderAll(); closeModal('modal-examen');
  ['ex-name','ex-result'].forEach(id=>$(id).value='');
  toast('Examen enregistré');
}

function addRdv(){
  const pid=parseInt($('rdvn-pt').value), date=$('rdvn-date').value;
  if(!pid||!date){ toast('Patient et date obligatoires','warn'); return; }
  DB.rdvs.push({id:nextId.rdv++,patientId:pid,date,time:$('rdvn-time').value,dur:$('rdvn-dur').value,motif:$('rdvn-motif').value,statut:'Planifié'});
  renderRdvs(); closeModal('modal-rdv');
  ['rdvn-date','rdvn-motif'].forEach(id=>$(id).value='');
  toast('Rendez-vous planifié');
}

// ─── RX ROW HELPERS ───────────────────────────────────
const formOptions=()=>`<option>Comprimé</option><option>Gélule</option><option>Sirop</option><option>Injectable</option><option>Pommade</option><option>Collyre</option><option>Suppositoire</option><option>Patch</option>`;
const routeOptions=()=>`<option>Orale</option><option>IV</option><option>IM</option><option>SC</option><option>Topique</option><option>Sublinguale</option>`;
const rxRowHtml=()=>`<tr><td><input class="rx-input" placeholder="Médicament"></td><td><input class="rx-input" placeholder="Dosage"></td><td><select class="rx-input">${formOptions()}</select></td><td><input class="rx-input" placeholder="3"></td><td><input class="rx-input" placeholder="7 j"></td><td><select class="rx-input">${routeOptions()}</select></td><td><button class="rx-del" onclick="delRxRow(this)">✕</button></td></tr>`;
const rxRowFullHtml=()=>`<tr><td><input class="rx-input" placeholder="Médicament"></td><td><input class="rx-input" placeholder="Dosage"></td><td><select class="rx-input">${formOptions()}</select></td><td><input class="rx-input" placeholder="3"></td><td><input class="rx-input" placeholder="7 j"></td><td><select class="rx-input">${routeOptions()}</select></td><td><input class="rx-input" placeholder="Instructions…"></td><td><button class="rx-del" onclick="delRxRow(this)">✕</button></td></tr>`;
function addRxRow(){ const r=document.createElement('tr'); r.innerHTML=rxRowHtml().replace(/<tr>/,'').replace(/<\/tr>/,''); $('quick-rx').appendChild(r); r.querySelector('.rx-input').focus(); }
function addRxRowFull(){ const r=document.createElement('tr'); r.innerHTML=rxRowFullHtml().replace(/<tr>/,'').replace(/<\/tr>/,''); $('rx-body').appendChild(r); r.querySelector('.rx-input').focus(); }
function delRxRow(btn){ const tr=btn.closest('tr'); const tbody=tr.parentElement; if(tbody.children.length>1) tr.remove(); }

// ─── CHIP TAGS ────────────────────────────────────────
function addChip(e, containerId, cls){
  if(e.key!=='Enter') return;
  const input=e.target, val=input.value.trim(); if(!val) return;
  const span=document.createElement('span');
  span.className=`chip ${cls}`;
  span.innerHTML=val+' <span style="opacity:.6">×</span>';
  span.onclick=()=>span.remove();
  $(containerId).appendChild(span);
  input.value=''; e.preventDefault();
}

// ─── SEARCH ───────────────────────────────────────────
function filterTable(q, tbodyId){
  const rows = $(tbodyId).querySelectorAll('tr');
  rows.forEach(r=>{ r.style.display=r.textContent.toLowerCase().includes(q.toLowerCase())?'':'none'; });
}
function globalSearch(q){
  if(!q.trim()) return;
  const matches = DB.patients.filter(p=>p.name.toLowerCase().includes(q.toLowerCase()));
  if(matches.length===1){ openDossier(matches[0].id); $('global-search').value=''; }
}

// ─── PRINT ────────────────────────────────────────────
function printConsult(){ toast('Ordonnance envoyée à l\'imprimante','info'); }

// ─── TOAST ────────────────────────────────────────────
function toast(msg, type='ok'){
  const w=$('toast-wrap');
  const div=document.createElement('div');
  div.className='toast-item';
  div.style.borderLeftColor = type==='warn'?'var(--amber)':type==='info'?'var(--blue)':'var(--g-lt)';
  div.innerHTML=`${type==='warn'?'⚠️':type==='info'?'ℹ️':'✅'} ${msg}`;
  w.appendChild(div);
  setTimeout(()=>{ div.style.opacity='0'; div.style.transform='translateX(20px)'; div.style.transition='all .3s'; setTimeout(()=>div.remove(),300); },3000);
}

// ─── DATE ─────────────────────────────────────────────
$('current-date').textContent = new Date().toLocaleDateString('fr-FR',{weekday:'short',day:'numeric',month:'short',year:'numeric'}).replace(/^\w/,c=>c.toUpperCase());

// ─── INIT ─────────────────────────────────────────────
renderAll();
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Consultations — Centre de Santé</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Outfit:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<style>
:root{
    --teal:#0b7c73;--teal-lt:#12a89d;--teal-bg:#eaf5f4;
    --cream:#f7f5f1;--white:#fff;--ink:#0f2623;--ink-mid:#1e3d3a;
    --muted:#527370;--muted-lt:#8aaba8;--border:#ddecea;--border-lt:#eef5f4;
    --red:#d63031;--red-bg:rgba(214,48,49,.07);
    --green:#00a86b;--green-bg:rgba(0,168,107,.08);
    --orange:#c0782a;--orange-bg:rgba(192,120,42,.08);
    --shadow-sm:0 1px 3px rgba(11,124,115,.06),0 4px 16px rgba(0,0,0,.04);
    --r:14px;--r-lg:18px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Outfit',sans-serif;background:var(--cream);color:var(--ink);display:flex;min-height:100vh}
body::before{content:'';position:fixed;inset:0;background-image:radial-gradient(circle at 1px 1px,rgba(11,124,115,.04) 1px,transparent 0);background-size:30px 30px;pointer-events:none;z-index:0}

/* SIDEBAR */
.sidebar{width:255px;background:var(--ink-mid);display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;z-index:100;box-shadow:4px 0 24px rgba(0,0,0,.12)}
.sb-brand{padding:1.4rem 1.5rem 1.1rem;border-bottom:1px solid rgba(255,255,255,.07)}
.sb-logo-row{display:flex;align-items:center;gap:.85rem;margin-bottom:.65rem}
.sb-logo-ico{width:42px;height:42px;background:linear-gradient(135deg,var(--teal),var(--teal-lt));border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;box-shadow:0 4px 14px rgba(11,124,115,.35);flex-shrink:0}
.sb-brand-name{font-family:'Cormorant Garamond',serif;font-size:.95rem;font-weight:700;color:#fff;line-height:1.15}
.sb-brand-sub{font-size:.55rem;color:rgba(255,255,255,.35);text-transform:uppercase;letter-spacing:.13em}
.sb-ministry{background:rgba(11,124,115,.2);border:1px solid rgba(11,124,115,.3);border-radius:6px;padding:.24rem .7rem;font-size:.58rem;font-weight:700;color:rgba(255,255,255,.7);letter-spacing:.07em;text-transform:uppercase;display:inline-block}
.sb-user{padding:.9rem 1.5rem;border-bottom:1px solid rgba(255,255,255,.06);display:flex;align-items:center;gap:.75rem}
.sb-av{width:36px;height:36px;background:linear-gradient(135deg,var(--teal),var(--teal-lt));border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;color:#fff;flex-shrink:0}
.sb-uname{font-size:.8rem;font-weight:600;color:#fff}
.sb-urole{font-size:.6rem;color:var(--teal-lt);font-weight:500}
.sb-nav{padding:.7rem 0;flex:1;overflow-y:auto}
.sb-nav::-webkit-scrollbar{width:3px}
.sb-section{font-size:.54rem;font-weight:700;text-transform:uppercase;letter-spacing:.14em;color:rgba(255,255,255,.25);padding:.7rem 1.5rem .28rem;margin-top:.35rem}
.sb-link{display:flex;align-items:center;gap:.65rem;padding:.56rem 1.5rem;font-size:.78rem;font-weight:500;color:rgba(255,255,255,.58);text-decoration:none;transition:all .18s;border-left:2px solid transparent}
.sb-link .sico{width:27px;height:27px;display:flex;align-items:center;justify-content:center;border-radius:7px;font-size:.85rem;flex-shrink:0}
.sb-link:hover{color:#fff;background:rgba(255,255,255,.05)}
.sb-link.active{color:var(--teal-lt);background:rgba(11,124,115,.18);border-left-color:var(--teal-lt);font-weight:600}
.sb-bottom{padding:1rem 1.5rem;border-top:1px solid rgba(255,255,255,.06)}
.sb-logout{display:flex;align-items:center;justify-content:center;gap:.5rem;width:100%;padding:.62rem;background:rgba(214,48,49,.1);border:1px solid rgba(214,48,49,.2);color:rgba(255,255,255,.75);border-radius:9px;font-size:.76rem;font-weight:600;cursor:pointer;font-family:'Outfit',sans-serif;transition:all .2s}
.sb-logout:hover{background:rgba(214,48,49,.25);color:#fff}

/* MAIN */
.main{margin-left:255px;flex:1;display:flex;flex-direction:column;position:relative;z-index:1}
.topbar{background:rgba(255,255,255,.95);backdrop-filter:blur(20px);border-bottom:1px solid var(--border);padding:.95rem 2.2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;box-shadow:0 1px 0 var(--border),0 4px 20px rgba(11,124,115,.05)}
.topbar::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--teal),var(--teal-lt),transparent);opacity:.5}
.tb-breadcrumb{font-size:.6rem;color:var(--muted-lt);text-transform:uppercase;letter-spacing:.1em;font-weight:600;margin-bottom:.18rem;display:flex;align-items:center;gap:.35rem}
.tb-breadcrumb span{color:var(--teal)}
.tb-title{font-family:'Cormorant Garamond',serif;font-size:1.35rem;font-weight:700;color:var(--ink);display:flex;align-items:center;gap:.55rem}
.tb-title-ico{width:30px;height:30px;background:var(--teal-bg);border:1.5px solid rgba(11,124,115,.2);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.85rem}
.tb-date{font-size:.65rem;color:var(--muted-lt);margin-top:.1rem}
.content{padding:1.8rem 2.2rem}

/* STATS */
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.8rem}
.stat{background:var(--white);border:1.5px solid var(--border);border-radius:var(--r-lg);padding:1.2rem 1.4rem;position:relative;overflow:hidden;box-shadow:var(--shadow-sm);transition:transform .2s}
.stat:hover{transform:translateY(-2px)}
.stat::before{content:'';position:absolute;top:0;left:0;right:0;height:3px}
.sc-teal::before{background:linear-gradient(90deg,var(--teal),var(--teal-lt))}
.sc-green::before{background:linear-gradient(90deg,var(--green),#00d68f)}
.sc-orange::before{background:linear-gradient(90deg,var(--orange),#e8a44a)}
.stat-bg-ico{position:absolute;right:1rem;top:.8rem;font-size:2.8rem;opacity:.06}
.stat-label{font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);margin-bottom:.45rem}
.stat-value{font-family:'Cormorant Garamond',serif;font-size:2.2rem;font-weight:700;color:var(--ink);line-height:1}
.stat-sub{font-size:.65rem;color:var(--muted-lt);margin-top:.3rem}

/* PANEL */
.panel{background:var(--white);border:1.5px solid var(--border);border-radius:var(--r-lg);overflow:hidden;margin-bottom:1.5rem;box-shadow:var(--shadow-sm);position:relative}
.panel::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--teal),var(--teal-lt),transparent);opacity:.5}
.panel-head{padding:1rem 1.5rem;border-bottom:1px solid var(--border-lt);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.7rem}
.panel-title{font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;color:var(--ink);display:flex;align-items:center;gap:.5rem}
.panel-title-ico{width:28px;height:28px;background:var(--teal-bg);border:1.5px solid rgba(11,124,115,.18);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.8rem}

/* TABLE */
.table-wrap{overflow-x:auto}
.table{width:100%;border-collapse:collapse;font-size:.79rem;min-width:900px}
.table th{padding:.65rem 1rem;text-align:left;font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);background:var(--cream);border-bottom:1.5px solid var(--border);white-space:nowrap}
.table td{padding:.78rem 1rem;border-bottom:1px solid var(--border-lt);vertical-align:middle}
.table tr:last-child td{border-bottom:none}
.table tbody tr:hover td{background:#f5faf9}

/* BADGE */
.badge{display:inline-flex;align-items:center;gap:.25rem;font-size:.62rem;font-weight:700;padding:.2rem .65rem;border-radius:50px}
.badge-dot{width:5px;height:5px;border-radius:50%;flex-shrink:0}
.badge-green{background:var(--green-bg);color:var(--green);border:1px solid rgba(0,168,107,.2)}
.badge-green .badge-dot{background:var(--green)}
.badge-orange{background:var(--orange-bg);color:var(--orange);border:1px solid rgba(192,120,42,.2)}
.badge-orange .badge-dot{background:var(--orange)}
.badge-red{background:var(--red-bg);color:var(--red);border:1px solid rgba(214,48,49,.2)}
.badge-red .badge-dot{background:var(--red)}
.badge-teal{background:var(--teal-bg);color:var(--teal);border:1px solid rgba(11,124,115,.2)}
.badge-gray{background:#f0f5f4;color:var(--muted);border:1px solid var(--border)}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:.4rem;padding:.58rem 1.2rem;border-radius:50px;font-size:.78rem;font-weight:600;font-family:'Outfit',sans-serif;cursor:pointer;border:none;transition:all .2s;text-decoration:none}
.btn-primary{background:var(--teal);color:#fff;box-shadow:0 3px 14px rgba(11,124,115,.25)}
.btn-primary:hover{background:var(--teal-lt);transform:translateY(-1px)}
.btn-ghost{background:var(--white);color:var(--muted);border:1.5px solid var(--border)}
.btn-ghost:hover{border-color:var(--teal);color:var(--teal)}
.btn-sm{padding:.32rem .75rem;font-size:.72rem}
.btn-danger{background:var(--red-bg);color:var(--red);border:1px solid rgba(214,48,49,.2)}
.btn-danger:hover{background:rgba(214,48,49,.15)}
.btn-view{background:var(--teal-bg);color:var(--teal);border:1px solid rgba(11,124,115,.2)}
.btn-view:hover{background:rgba(11,124,115,.15)}

/* ALERT */
.alert{display:flex;align-items:flex-start;gap:.65rem;padding:.85rem 1rem;border-radius:11px;font-size:.79rem;font-weight:500;margin-bottom:1.4rem;line-height:1.5}
.alert-success{background:var(--green-bg);border:1.5px solid rgba(0,168,107,.2);color:var(--green)}
.alert-error{background:var(--red-bg);border:1.5px solid rgba(214,48,49,.2);color:var(--red)}

/* SEARCH */
.search-bar{display:flex;align-items:center;gap:.7rem;flex-wrap:wrap}
.search-input-wrap{position:relative}
.search-ico{position:absolute;left:.85rem;top:50%;transform:translateY(-50%);font-size:.85rem;pointer-events:none;opacity:.5}
.search-input{padding:.55rem .9rem .55rem 2.4rem;border:1.5px solid var(--border);border-radius:50px;font-size:.8rem;font-family:'Outfit',sans-serif;background:var(--cream);color:var(--ink);outline:none;transition:all .2s;width:220px}
.search-input:focus{border-color:var(--teal);background:var(--white);box-shadow:0 0 0 3px rgba(11,124,115,.1)}
.filter-select{padding:.52rem 1rem;border:1.5px solid var(--border);border-radius:50px;font-size:.78rem;font-family:'Outfit',sans-serif;background:var(--cream);color:var(--muted);outline:none;cursor:pointer;transition:border-color .2s}
.filter-select:focus{border-color:var(--teal)}

/* PAGINATION */
.pagination-wrap{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.5rem;border-top:1px solid var(--border-lt)}
.pagination-info{font-size:.72rem;color:var(--muted)}
.pag-links{display:flex;gap:.3rem}
.pag-links a,.pag-links span{display:inline-flex;align-items:center;justify-content:center;width:30px;height:30px;border-radius:8px;font-size:.75rem;font-weight:600;text-decoration:none;transition:all .18s}
.pag-links a{color:var(--muted);border:1px solid var(--border)}
.pag-links a:hover{border-color:var(--teal);color:var(--teal)}
.pag-links span.active{background:var(--teal);color:#fff;border:1px solid var(--teal)}

/* MODAL */
.modal-overlay{position:fixed;inset:0;background:rgba(15,38,35,.45);backdrop-filter:blur(6px);z-index:1000;display:none;align-items:center;justify-content:center;padding:1rem}
.modal-overlay.open{display:flex;animation:fadeIn .2s ease}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
.modal{background:var(--white);border:1.5px solid var(--border);border-radius:22px;padding:2rem 2.4rem;width:100%;max-width:760px;box-shadow:0 24px 80px rgba(0,0,0,.18);position:relative;max-height:92vh;overflow-y:auto;animation:slideUp .28s cubic-bezier(.16,1,.3,1)}
@keyframes slideUp{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.modal::before{content:'';position:absolute;top:0;left:2rem;right:2rem;height:3px;background:linear-gradient(90deg,var(--teal),var(--teal-lt))}
.modal-title{font-family:'Cormorant Garamond',serif;font-size:1.25rem;font-weight:700;color:var(--ink);margin-bottom:1.5rem;margin-top:.4rem;display:flex;align-items:center;gap:.6rem}
.modal-close{position:absolute;top:1.2rem;right:1.2rem;background:var(--cream);border:1.5px solid var(--border);width:32px;height:32px;border-radius:50%;cursor:pointer;font-size:.9rem;display:flex;align-items:center;justify-content:center;color:var(--muted);transition:all .2s}
.modal-close:hover{background:var(--border);color:var(--ink)}

/* FORM */
.sec-lbl{font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:.13em;color:var(--teal);margin:1.4rem 0 .85rem;display:flex;align-items:center;gap:.5rem}
.sec-lbl::after{content:'';flex:1;height:1.5px;background:var(--teal-bg);border-radius:2px}
.sec-lbl:first-of-type{margin-top:0}
.form-row2{display:grid;grid-template-columns:1fr 1fr;gap:.85rem}
.form-row3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:.85rem}
.form-row4{display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:.85rem}
.fg{margin-bottom:.85rem}
.fl{display:block;font-size:.62rem;font-weight:700;text-transform:uppercase;letter-spacing:.09em;color:var(--ink);margin-bottom:.36rem}
.fl .r{color:var(--red);margin-left:.15rem}
.iw{position:relative}
.ii{position:absolute;left:.9rem;top:50%;transform:translateY(-50%);font-size:.88rem;pointer-events:none;opacity:.55}
.fi,.fs{width:100%;padding:.7rem .9rem .7rem 2.45rem;background:var(--cream);border:1.5px solid var(--border);border-radius:10px;font-family:'Outfit',sans-serif;font-size:.84rem;color:var(--ink);outline:none;transition:all .2s;appearance:none}
.fi::placeholder{color:var(--muted-lt)}
.fi:focus,.fs:focus{border-color:var(--teal);background:var(--white);box-shadow:0 0 0 3px rgba(11,124,115,.1)}
.ft{width:100%;padding:.7rem .9rem;background:var(--cream);border:1.5px solid var(--border);border-radius:10px;font-family:'Outfit',sans-serif;font-size:.84rem;color:var(--ink);outline:none;resize:vertical;min-height:75px;transition:all .2s}
.ft:focus{border-color:var(--teal);background:var(--white);box-shadow:0 0 0 3px rgba(11,124,115,.1)}
.sw::after{content:'▾';position:absolute;right:.85rem;top:50%;transform:translateY(-50%);color:var(--muted);font-size:.75rem;pointer-events:none}

/* SHOW MODAL */
.show-section{margin-bottom:1.2rem}
.show-sec-title{font-size:.62rem;font-weight:800;text-transform:uppercase;letter-spacing:.12em;color:var(--teal);margin-bottom:.75rem;padding-bottom:.4rem;border-bottom:1.5px solid var(--teal-bg)}
.show-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:.6rem}
.show-grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:.6rem}
.show-item{background:var(--cream);border:1px solid var(--border);border-radius:9px;padding:.65rem .9rem}
.show-label{font-size:.58rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--muted-lt);margin-bottom:.2rem}
.show-value{font-size:.84rem;font-weight:600;color:var(--ink)}
.show-value.empty{color:var(--muted-lt);font-weight:400;font-style:italic}
.vital-card{background:var(--teal-bg);border:1.5px solid rgba(11,124,115,.18);border-radius:11px;padding:.85rem 1rem;text-align:center}
.vital-ico{font-size:1.4rem;margin-bottom:.3rem}
.vital-val{font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;color:var(--teal)}
.vital-lbl{font-size:.62rem;color:var(--muted);margin-top:.1rem}

/* MONO */
.mono{font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--teal);background:var(--teal-bg);padding:.1rem .45rem;border-radius:5px;border:1px solid rgba(11,124,115,.15)}

::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--border);border-radius:2px}

@media(max-width:700px){.sidebar{display:none}.main{margin-left:0}.stats{grid-template-columns:1fr}.content{padding:1.2rem}}
</style>
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sb-brand">
        <div class="sb-logo-row">
            <div class="sb-logo-ico">🏥</div>
            <div>
                <div class="sb-brand-name">Centre de Santé<br>Jemaat Shaim</div>
                <div class="sb-brand-sub">Safi · Maroc</div>
            </div>
        </div>
        <span class="sb-ministry">Ministère de la Santé</span>
    </div>
    <div class="sb-user">
        <div class="sb-av">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div>
        <div>
            <div class="sb-uname">{{ auth()->user()->name }}</div>
            <div class="sb-urole">👨‍⚕️ Médecin Chef</div>
        </div>
    </div>
    <nav class="sb-nav">
        <div class="sb-section">Principal</div>
        <a href="/dashboard/medecin-chef" class="sb-link"><div class="sico">🏠</div> Tableau de bord</a>
        <div class="sb-section">Gestion médicale</div>
        <a href="/patients" class="sb-link"><div class="sico">👥</div> Patients</a>
        <a href="/consultations" class="sb-link active"><div class="sico">🩺</div> Consultations</a>
        <a href="/analyses" class="sb-link"><div class="sico">🔬</div> Analyses</a>
        <a href="/medicaments" class="sb-link"><div class="sico">💊</div> Médicaments</a>
        <a href="/personnels" class="sb-link"><div class="sico">👨‍⚕️</div> Personnels</a>
        <div class="sb-section">Services</div>
        <a href="/smi" class="sb-link"><div class="sico">🤰</div> Service SMI</a>
        <a href="/chroniques" class="sb-link"><div class="sico">❤️</div> Maladies Chroniques</a>
        <div class="sb-section">Administration</div>
        <a href="/rapports" class="sb-link"><div class="sico">📊</div> Rapports</a>
        <a href="/appareils" class="sb-link"><div class="sico">🔬</div> Appareils</a>
        <div class="sb-section">Site</div>
        <a href="/" class="sb-link"><div class="sico">🌐</div> Accueil</a>
    </nav>
    <div class="sb-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sb-logout">🚪 Se déconnecter</button>
        </form>
    </div>
</aside>

{{-- MAIN --}}
<main class="main">
    <div class="topbar">
        <div>
            <div class="tb-breadcrumb">Dashboard <span>›</span> Consultations</div>
            <div class="tb-title">
                <div class="tb-title-ico">🩺</div>
                Consultations Médicales
            </div>
            <div class="tb-date" id="topDate"></div>
        </div>
        <div style="display:flex;gap:.7rem">
            <button onclick="openModal('modalAdd')" class="btn btn-primary">＋ Nouvelle consultation</button>
        </div>
    </div>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">⚠️ @foreach($errors->all() as $e){{ $e }} @endforeach</div>
        @endif

        {{-- STATS --}}
        <div class="stats">
            <div class="stat sc-teal">
                <div class="stat-bg-ico">🩺</div>
                <div class="stat-label">Total consultations</div>
                <div class="stat-value">{{ $totalConsultations }}</div>
                <div class="stat-sub">Depuis le début</div>
            </div>
            <div class="stat sc-green">
                <div class="stat-bg-ico">📅</div>
                <div class="stat-label">Aujourd'hui</div>
                <div class="stat-value">{{ $consultationsAujourdhui }}</div>
                <div class="stat-sub">Consultations du jour</div>
            </div>
            <div class="stat sc-orange">
                <div class="stat-bg-ico">📊</div>
                <div class="stat-label">Ce mois</div>
                <div class="stat-value">{{ $consultationsCeMois }}</div>
                <div class="stat-sub">{{ now()->locale('fr')->isoFormat('MMMM YYYY') }}</div>
            </div>
        </div>

        {{-- LISTE --}}
        <div class="panel">
            <div class="panel-head">
                <div class="panel-title">
                    <div class="panel-title-ico">🩺</div>
                    Liste des consultations
                </div>
                <div class="search-bar">
                    <div class="search-input-wrap">
                        <span class="search-ico">🔍</span>
                        <input type="text" class="search-input" placeholder="Rechercher..." id="searchInput" oninput="filterTable()"/>
                    </div>
                    <select class="filter-select" id="filterStatut" onchange="filterTable()">
                        <option value="">Tous les statuts</option>
                        <option value="terminee">✓ Terminée</option>
                        <option value="en_cours">⏳ En cours</option>
                        <option value="annulee">✗ Annulée</option>
                    </select>
                </div>
            </div>

            <div class="table-wrap">
                <table class="table" id="consultTable">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Motif</th>
                            <th>Service</th>
                            <th>Médecin</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultations as $c)
                        <tr data-statut="{{ $c->statut }}" data-search="{{ strtolower($c->nom_patient.' '.$c->prenom_patient.' '.$c->motif) }}">
                            <td><span class="mono">#{{ $c->id }}</span></td>
                            <td>
                                <div style="font-weight:600">{{ $c->nom_patient }} {{ $c->prenom_patient }}</div>
                                @if($c->cin_patient)
                                    <div style="font-size:.68rem;color:var(--muted-lt)">CIN: {{ $c->cin_patient }}</div>
                                @endif
                            </td>
                            <td style="font-size:.78rem;color:var(--muted);white-space:nowrap">
                                {{ \Carbon\Carbon::parse($c->date)->format('d/m/Y') }}
                            </td>
                            <td style="max-width:180px">
                                <div style="font-size:.8rem;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                    {{ $c->motif ?? '—' }}
                                </div>
                            </td>
                            <td>
                                @if($c->service)
                                    <span class="badge badge-teal">📍 {{ $c->service }}</span>
                                @else
                                    <span style="color:var(--muted-lt)">—</span>
                                @endif
                            </td>
                            <td style="font-size:.78rem">{{ $c->medecin_nom ?? '—' }}</td>
                            <td>
                                @if($c->statut === 'terminee')
                                    <span class="badge badge-green"><span class="badge-dot"></span> Terminée</span>
                                @elseif($c->statut === 'en_cours')
                                    <span class="badge badge-orange"><span class="badge-dot"></span> En cours</span>
                                @else
                                    <span class="badge badge-red"><span class="badge-dot"></span> Annulée</span>
                                @endif
                            </td>
                            <td>
                                <div style="display:flex;gap:.35rem">
                                    <button onclick="openShow({{ json_encode($c) }})" class="btn btn-view btn-sm">👁 Voir</button>
                                    <form method="POST" action="{{ route('consultations.destroy', $c->id) }}" onsubmit="return confirm('Supprimer cette consultation ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="text-align:center;padding:3rem;color:var(--muted-lt)">
                                <div style="font-size:2rem;margin-bottom:.5rem">🩺</div>
                                <div style="font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:700;margin-bottom:.3rem">Aucune consultation enregistrée</div>
                                <div style="font-size:.8rem">Cliquez sur <strong>+ Nouvelle consultation</strong> pour commencer.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($consultations->hasPages())
            <div class="pagination-wrap">
                <div class="pagination-info">
                    Affichage {{ $consultations->firstItem() }}–{{ $consultations->lastItem() }} sur {{ $consultations->total() }} consultations
                </div>
                <div class="pag-links">
                    {{ $consultations->links() }}
                </div>
            </div>
            @endif
        </div>

    </div>
</main>

{{-- MODAL : AJOUTER --}}
<div class="modal-overlay" id="modalAdd">
    <div class="modal" style="max-width:760px">
        <button class="modal-close" onclick="closeModal('modalAdd')">✕</button>
        <div class="modal-title">🩺 Nouvelle Consultation</div>

        <form method="POST" action="{{ route('consultations.store') }}">
            @csrf

            <div class="sec-lbl">👤 Identité du patient</div>
            <div class="form-row3">
                <div class="fg">
                    <label class="fl">Nom <span class="r">*</span></label>
                    <div class="iw"><span class="ii">👤</span>
                        <input class="fi" type="text" name="nom_patient" placeholder="Nom" required/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Prénom</label>
                    <div class="iw"><span class="ii">👤</span>
                        <input class="fi" type="text" name="prenom_patient" placeholder="Prénom"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">CIN</label>
                    <div class="iw"><span class="ii">🪪</span>
                        <input class="fi" type="text" name="cin_patient" placeholder="AB123456"/>
                    </div>
                </div>
            </div>
            <div class="form-row3">
                <div class="fg">
                    <label class="fl">Téléphone</label>
                    <div class="iw"><span class="ii">📞</span>
                        <input class="fi" type="text" name="telephone_patient" placeholder="06XXXXXXXX"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Date naissance</label>
                    <div class="iw"><span class="ii">🎂</span>
                        <input class="fi" type="date" name="date_naissance_patient"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Sexe</label>
                    <div class="iw sw"><span class="ii">⚥</span>
                        <select class="fs" name="sexe_patient">
                            <option value="">— Choisir —</option>
                            <option value="M">👨 Masculin</option>
                            <option value="F">👩 Féminin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="sec-lbl">🩺 Consultation</div>
            <div class="form-row3">
                <div class="fg">
                    <label class="fl">Date <span class="r">*</span></label>
                    <div class="iw"><span class="ii">📅</span>
                        <input class="fi" type="date" name="date" value="{{ date('Y-m-d') }}" required/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Service</label>
                    <div class="iw sw"><span class="ii">📍</span>
                        <select class="fs" name="service">
                            <option value="">— Choisir —</option>
                            <option value="Consultation">🩺 Consultation</option>
                            <option value="SMI">🤰 SMI</option>
                            <option value="Chroniques">❤️ Chroniques</option>
                            <option value="Urgences">🚨 Urgences</option>
                            <option value="Laboratoire">🔬 Laboratoire</option>
                        </select>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Statut</label>
                    <div class="iw sw"><span class="ii">📋</span>
                        <select class="fs" name="statut">
                            <option value="terminee">✓ Terminée</option>
                            <option value="en_cours">⏳ En cours</option>
                            <option value="annulee">✗ Annulée</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="fg">
                <label class="fl">Motif <span class="r">*</span></label>
                <div class="iw"><span class="ii">📝</span>
                    <input class="fi" type="text" name="motif" placeholder="Ex: Douleur abdominale, contrôle tension..." required/>
                </div>
            </div>
            <div class="form-row2">
                <div class="fg">
                    <label class="fl">Diagnostic</label>
                    <textarea class="ft" name="diagnostic" placeholder="Diagnostic médical..."></textarea>
                </div>
                <div class="fg">
                    <label class="fl">Traitement prescrit</label>
                    <textarea class="ft" name="traitement" placeholder="Médicaments, posologie..."></textarea>
                </div>
            </div>

            <div class="sec-lbl">💊 Constantes vitales</div>
            <div class="form-row4">
                <div class="fg">
                    <label class="fl">Tension (mmHg)</label>
                    <div class="iw"><span class="ii">🩺</span>
                        <input class="fi" type="text" name="tension" placeholder="120/80"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Poids (kg)</label>
                    <div class="iw"><span class="ii">⚖️</span>
                        <input class="fi" type="number" step="0.1" name="poids" placeholder="70"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Taille (cm)</label>
                    <div class="iw"><span class="ii">📏</span>
                        <input class="fi" type="number" step="0.1" name="taille" placeholder="170"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="fl">Temp (°C)</label>
                    <div class="iw"><span class="ii">🌡️</span>
                        <input class="fi" type="number" step="0.1" name="temperature" placeholder="37.0"/>
                    </div>
                </div>
            </div>
            <div class="fg">
                <label class="fl">Observations</label>
                <textarea class="ft" name="observations" placeholder="Observations générales..."></textarea>
            </div>

            <div style="display:flex;gap:.8rem;justify-content:flex-end;margin-top:.5rem">
                <button type="button" onclick="closeModal('modalAdd')" class="btn btn-ghost">Annuler</button>
                <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL : VOIR --}}
<div class="modal-overlay" id="modalShow">
    <div class="modal" style="max-width:680px">
        <button class="modal-close" onclick="closeModal('modalShow')">✕</button>
        <div class="modal-title">🩺 Détails de la consultation</div>
        <div id="showContent"></div>
    </div>
</div>

<script>
// Date
const now = new Date();
document.getElementById('topDate').textContent =
    now.toLocaleDateString('fr-FR',{weekday:'long',year:'numeric',month:'long',day:'numeric'}).replace(/^\w/,c=>c.toUpperCase());

// Modal
function openModal(id){ document.getElementById(id).classList.add('open'); document.body.style.overflow='hidden'; }
function closeModal(id){ document.getElementById(id).classList.remove('open'); document.body.style.overflow=''; }
['modalAdd','modalShow'].forEach(id=>{
    document.getElementById(id).addEventListener('click',function(e){ if(e.target===this) closeModal(id); });
});
document.addEventListener('keydown',e=>{ if(e.key==='Escape'){closeModal('modalAdd');closeModal('modalShow');} });

// Voir consultation
function openShow(c){
    const v = (val) => val ? `<span class="show-value">${val}</span>` : `<span class="show-value empty">Non renseigné</span>`;
    const statut = c.statut === 'terminee'
        ? '<span class="badge badge-green"><span class="badge-dot"></span> Terminée</span>'
        : c.statut === 'en_cours'
            ? '<span class="badge badge-orange"><span class="badge-dot"></span> En cours</span>'
            : '<span class="badge badge-red"><span class="badge-dot"></span> Annulée</span>';

    document.getElementById('showContent').innerHTML = `
        <div class="show-section">
            <div class="show-sec-title">👤 Identité du patient</div>
            <div class="show-grid">
                <div class="show-item"><div class="show-label">Nom complet</div>${v((c.nom_patient||'')+' '+(c.prenom_patient||''))}</div>
                <div class="show-item"><div class="show-label">CIN</div>${v(c.cin_patient)}</div>
                <div class="show-item"><div class="show-label">Téléphone</div>${v(c.telephone_patient)}</div>
                <div class="show-item"><div class="show-label">Sexe</div>${v(c.sexe_patient === 'M' ? '👨 Masculin' : c.sexe_patient === 'F' ? '👩 Féminin' : null)}</div>
            </div>
        </div>
        <div class="show-section">
            <div class="show-sec-title">🩺 Consultation</div>
            <div class="show-grid">
                <div class="show-item"><div class="show-label">Date</div>${v(c.date ? new Date(c.date).toLocaleDateString('fr-FR') : null)}</div>
                <div class="show-item"><div class="show-label">Statut</div>${statut}</div>
                <div class="show-item"><div class="show-label">Service</div>${v(c.service)}</div>
                <div class="show-item"><div class="show-label">Médecin</div>${v(c.medecin_nom)}</div>
            </div>
            <div class="show-item" style="margin-top:.6rem"><div class="show-label">Motif</div>${v(c.motif)}</div>
            <div class="show-grid" style="margin-top:.6rem">
                <div class="show-item"><div class="show-label">Diagnostic</div>${v(c.diagnostic)}</div>
                <div class="show-item"><div class="show-label">Traitement</div>${v(c.traitement)}</div>
            </div>
        </div>
        ${(c.tension || c.poids || c.taille || c.temperature) ? `
        <div class="show-section">
            <div class="show-sec-title">💊 Constantes vitales</div>
            <div class="show-grid-3">
                ${c.tension ? `<div class="vital-card"><div class="vital-ico">🩺</div><div class="vital-val">${c.tension}</div><div class="vital-lbl">Tension (mmHg)</div></div>` : ''}
                ${c.poids ? `<div class="vital-card"><div class="vital-ico">⚖️</div><div class="vital-val">${c.poids} kg</div><div class="vital-lbl">Poids</div></div>` : ''}
                ${c.taille ? `<div class="vital-card"><div class="vital-ico">📏</div><div class="vital-val">${c.taille} cm</div><div class="vital-lbl">Taille</div></div>` : ''}
                ${c.temperature ? `<div class="vital-card"><div class="vital-ico">🌡️</div><div class="vital-val">${c.temperature}°C</div><div class="vital-lbl">Température</div></div>` : ''}
            </div>
        </div>` : ''}
        ${c.observations ? `<div class="show-section"><div class="show-sec-title">📝 Observations</div><div class="show-item"><div class="show-value">${c.observations}</div></div></div>` : ''}
    `;
    openModal('modalShow');
}

// Filtre tableau
function filterTable(){
    const search  = document.getElementById('searchInput').value.toLowerCase();
    const statut  = document.getElementById('filterStatut').value;
    document.querySelectorAll('#consultTable tbody tr').forEach(row => {
        const s  = row.dataset.statut || '';
        const sr = row.dataset.search || '';
        const ok = (!search || sr.includes(search)) && (!statut || s === statut);
        row.style.display = ok ? '' : 'none';
    });
}
</script>
</body>
</html>
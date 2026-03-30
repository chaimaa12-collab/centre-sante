<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Organisation du Centre — Personnel</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <style>
        :root {
            --teal:    #0b7c73;
            --teal-lt: #12a89d;
            --teal-bg: #eaf5f4;
            --cream:   #f6f3ee;
            --white:   #ffffff;
            --ink:     #122e2b;
            --muted:   #587370;
            --gold:    #c08a3c;
            --gold-bg: #fdf5e8;
            --rose:    #c0485c;
            --rose-bg: #fdf0f2;
            --blue:    #2d6fa8;
            --blue-bg: #eef4fb;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--ink);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: sticky; top: 0; z-index: 200;
            background: var(--white);
            border-bottom: 1px solid #ddecea;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2.5rem; height: 68px;
            box-shadow: 0 2px 16px rgba(11,124,115,.06);
        }
        .navbar-brand { display: flex; align-items: center; gap: .8rem; text-decoration: none; }
        .brand-icon {
            width: 40px; height: 40px; background: var(--teal); border-radius: 50%;
            display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
            box-shadow: 0 4px 14px rgba(11,124,115,.3); flex-shrink: 0;
        }
        .brand-name { font-family: 'Playfair Display', serif; font-size: 1.05rem; font-weight: 700; color: var(--teal); line-height: 1.2; }
        .brand-sub  { font-size: .68rem; text-transform: uppercase; letter-spacing: .07em; color: var(--muted); font-weight: 500; }
        .navbar-nav { display: flex; align-items: center; gap: 1.8rem; list-style: none; }
        .navbar-nav a { text-decoration: none; font-size: .875rem; font-weight: 500; color: var(--muted); letter-spacing: .02em; transition: color .2s; }
        .navbar-nav a:hover, .navbar-nav a.active { color: var(--teal); }
        .btn-nav { background: var(--teal) !important; color: var(--white) !important; padding: .4rem 1.1rem; border-radius: 50px; font-weight: 600 !important; }
        .btn-nav:hover { background: var(--teal-lt) !important; }

        /* ── PAGE HEADER ── */
        .page-header {
            background: linear-gradient(135deg, var(--teal) 0%, var(--teal-lt) 100%);
            padding: 3.5rem 2.5rem 3rem;
            position: relative;
            overflow: hidden;
        }
        .page-header::after {
            content: '👩‍⚕️';
            position: absolute; right: 3rem; top: 50%; transform: translateY(-50%);
            font-size: 9rem; opacity: .1; pointer-events: none;
        }
        .page-header-inner { max-width: 1160px; margin: 0 auto; }
        .breadcrumb {
            display: flex; align-items: center; gap: .5rem;
            font-size: .78rem; color: rgba(255,255,255,.65);
            margin-bottom: 1rem; font-weight: 500;
        }
        .breadcrumb a { color: rgba(255,255,255,.65); text-decoration: none; }
        .breadcrumb a:hover { color: var(--white); }
        .breadcrumb-sep { opacity: .5; }
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 900; color: var(--white); margin-bottom: .6rem;
            animation: fadeDown .5s ease both;
        }
        .page-header p {
            color: rgba(255,255,255,.75); font-size: 1rem; max-width: 520px; line-height: 1.6;
            animation: fadeDown .5s ease .1s both;
        }

        /* ── SUMMARY STRIP ── */
        .summary-strip {
            background: var(--white);
            border-bottom: 1px solid #e2eeec;
            padding: 1.2rem 2.5rem;
        }
        .summary-inner {
            max-width: 1160px; margin: 0 auto;
            display: flex; gap: 2.5rem; align-items: center; flex-wrap: wrap;
        }
        .sum-item {
            display: flex; align-items: center; gap: .55rem;
            font-size: .85rem; font-weight: 500; color: var(--muted);
        }
        .sum-item strong { color: var(--teal); font-size: 1.05rem; font-weight: 700; }

        /* ── MAIN LAYOUT ── */
        .main {
            max-width: 1160px; margin: 0 auto;
            padding: 3rem 2.5rem 4rem;
        }

        /* ── SECTION TITLE ── */
        .sec-eyebrow {
            font-size: .72rem; font-weight: 700; letter-spacing: .1em;
            text-transform: uppercase; color: var(--teal); margin-bottom: .45rem;
        }
        .sec-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem; font-weight: 800; color: var(--ink);
            margin-bottom: 2rem;
        }
        .sec-title span { color: var(--teal); }

        /* ── ORG CHART GRID ── */
        .org-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.3rem;
            margin-bottom: 3rem;
        }

        /* ── PERSONNEL CARD ── */
        .p-card {
            background: var(--white);
            border-radius: 18px;
            padding: 1.8rem 1.7rem;
            border: 1.5px solid #e2eeec;
            display: flex; gap: 1.2rem; align-items: flex-start;
            transition: transform .25s, box-shadow .25s, border-color .25s;
            animation: fadeUp .5s ease both;
            position: relative;
            overflow: hidden;
        }
        .p-card::before {
            content: '';
            position: absolute; left: 0; top: 0; bottom: 0;
            width: 4px;
            border-radius: 18px 0 0 18px;
        }
        .p-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 44px rgba(11,124,115,.1);
            border-color: var(--teal-lt);
        }

        /* Color variants */
        .p-card.teal::before   { background: var(--teal); }
        .p-card.gold::before   { background: var(--gold); }
        .p-card.rose::before   { background: var(--rose); }
        .p-card.blue::before   { background: var(--blue); }

        .p-avatar {
            width: 54px; height: 54px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; flex-shrink: 0;
        }
        .p-avatar.teal { background: var(--teal-bg); }
        .p-avatar.gold { background: var(--gold-bg); }
        .p-avatar.rose { background: var(--rose-bg); }
        .p-avatar.blue { background: var(--blue-bg); }

        .p-info { flex: 1; min-width: 0; }

        .p-role {
            font-size: .7rem; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; margin-bottom: .35rem;
        }
        .p-role.teal { color: var(--teal); }
        .p-role.gold { color: var(--gold); }
        .p-role.rose { color: var(--rose); }
        .p-role.blue { color: var(--blue); }

        .p-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem; font-weight: 800; color: var(--ink);
            margin-bottom: .5rem; line-height: 1.25;
        }

        .p-tags { display: flex; flex-wrap: wrap; gap: .4rem; margin-bottom: .65rem; }
        .p-tag {
            font-size: .7rem; font-weight: 600; padding: .22rem .65rem;
            border-radius: 50px; letter-spacing: .03em;
        }
        .p-tag.teal { background: var(--teal-bg); color: var(--teal); }
        .p-tag.gold { background: var(--gold-bg); color: var(--gold); }
        .p-tag.rose { background: var(--rose-bg); color: var(--rose); }
        .p-tag.blue { background: var(--blue-bg); color: var(--blue); }

        .p-duties {
            list-style: none; display: flex; flex-direction: column; gap: .32rem;
        }
        .p-duties li {
            display: flex; align-items: flex-start; gap: .45rem;
            font-size: .8rem; color: var(--muted); line-height: 1.5;
        }
        .p-duties li::before { content: '›'; color: var(--teal); font-weight: 700; margin-top: .05rem; flex-shrink: 0; }

        /* count badge */
        .count-badge {
            position: absolute; top: 1rem; right: 1rem;
            background: var(--teal-bg); color: var(--teal);
            font-size: .7rem; font-weight: 700;
            padding: .18rem .6rem; border-radius: 50px;
            letter-spacing: .04em;
        }

        /* stagger */
        .p-card:nth-child(1){ animation-delay:.04s }
        .p-card:nth-child(2){ animation-delay:.10s }
        .p-card:nth-child(3){ animation-delay:.16s }
        .p-card:nth-child(4){ animation-delay:.22s }
        .p-card:nth-child(5){ animation-delay:.28s }

        /* ── MEDECINS SECTION ── */
        .medecins-section { margin-bottom: 3rem; }

        .medecins-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.3rem;
        }

        /* ── CHEF HIGHLIGHT ── */
        .chef-banner {
            background: linear-gradient(135deg, #1a4a46 0%, var(--teal) 100%);
            border-radius: 20px;
            padding: 2.2rem 2.4rem;
            display: flex; gap: 1.6rem; align-items: center;
            margin-bottom: 3rem;
            position: relative; overflow: hidden;
            animation: fadeUp .5s ease .05s both;
        }
        .chef-banner::after {
            content: '⭐';
            position: absolute; right: 1.5rem; top: 50%; transform: translateY(-50%);
            font-size: 6rem; opacity: .08; pointer-events: none;
        }
        .chef-avatar {
            width: 70px; height: 70px; border-radius: 50%;
            background: rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; flex-shrink: 0;
            border: 2.5px solid rgba(255,255,255,.25);
        }
        .chef-info { flex: 1; }
        .chef-badge {
            display: inline-block;
            background: var(--gold); color: var(--white);
            font-size: .68rem; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; padding: .22rem .75rem; border-radius: 50px;
            margin-bottom: .6rem;
        }
        .chef-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem; font-weight: 900; color: var(--white); margin-bottom: .4rem;
        }
        .chef-duties {
            display: flex; flex-wrap: wrap; gap: .5rem;
        }
        .chef-duty {
            background: rgba(255,255,255,.12);
            color: rgba(255,255,255,.85);
            font-size: .75rem; font-weight: 500;
            padding: .28rem .75rem; border-radius: 50px;
            border: 1px solid rgba(255,255,255,.18);
        }

        /* ── TOTAL SUMMARY ── */
        .total-box {
            background: var(--white);
            border-radius: 18px;
            padding: 2rem 2.2rem;
            border: 1.5px solid #e2eeec;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1.5rem;
            animation: fadeUp .5s ease .3s both;
        }
        .total-item { text-align: center; }
        .total-num {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem; font-weight: 900; color: var(--teal);
            display: block; line-height: 1;
        }
        .total-lbl {
            font-size: .75rem; font-weight: 600; color: var(--muted);
            text-transform: uppercase; letter-spacing: .06em; margin-top: .4rem;
        }
        .total-divider {
            width: 1px; background: #e2eeec;
            align-self: stretch;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--ink);
            color: rgba(255,255,255,.45);
            text-align: center;
            padding: 1.6rem 2rem;
            font-size: .8rem;
            letter-spacing: .03em;
        }
        footer strong { color: var(--teal-lt); font-weight: 600; }

        /* ── ANIMATIONS ── */
        @keyframes fadeDown {
            from { opacity:0; transform:translateY(-16px); }
            to   { opacity:1; transform:translateY(0); }
        }
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(20px); }
            to   { opacity:1; transform:translateY(0); }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 760px) {
            .navbar { padding: 0 1.2rem; }
            .navbar-nav li:not(:last-child) { display: none; }
            .page-header { padding: 2.5rem 1.3rem 2rem; }
            .page-header::after { display: none; }
            .summary-strip { padding: 1rem 1.3rem; }
            .main { padding: 2rem 1.3rem 3rem; }
            .chef-banner { flex-direction: column; text-align: center; }
            .chef-duties { justify-content: center; }
        }
    </style>
</head>
<body>

{{-- ===== NAVBAR ===== --}}
<nav class="navbar">
    <a href="{{ url('/') }}" class="navbar-brand">
        <div class="brand-icon">🏥</div>
        <div>
            <div class="brand-name">Centre de Santé</div>
            <div class="brand-sub">Soins de Proximité</div>
        </div>
    </a>
    <ul class="navbar-nav">
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="#" class="active">Organisation</a></li>
        <li><a href="#">Consultations</a></li>
        <li><a href="#">Contact</a></li>
        @auth
            <li><a href="#" class="btn-nav">Mon Dossier</a></li>
        @else
            <li><a href="{{ url('/login') }}" class="btn-nav">Connexion</a></li>
        @endauth
    </ul>
</nav>

{{-- ===== PAGE HEADER ===== --}}
<div class="page-header">
    <div class="page-header-inner">
        <div class="breadcrumb">
            <a href="{{ url('/') }}">🏠 Accueil</a>
            <span class="breadcrumb-sep">›</span>
            <span>Organisation du Centre</span>
        </div>
        <h1>👩‍⚕️ Organisation du Centre</h1>
        <p>Découvrez l'équipe pluridisciplinaire qui assure chaque jour la qualité des soins et la bonne gestion du centre.</p>
    </div>
</div>

{{-- ===== SUMMARY STRIP ===== --}}
<div class="summary-strip">
    <div class="summary-inner">
        <div class="sum-item">👥 <strong>6</strong>&nbsp; membres du personnel</div>
        <div class="sum-item">👩‍⚕️ <strong>2</strong>&nbsp; infirmières SMI</div>
        <div class="sum-item">🩺 <strong>2</strong>&nbsp; médecins</div>
        <div class="sum-item">🏥 <strong>1</strong>&nbsp; service maladies chroniques</div>
        <div class="sum-item">📋 <strong>1</strong>&nbsp; chef de service</div>
    </div>
</div>

{{-- ===== MAIN ===== --}}
<main class="main">

    {{-- ── CHEF DE SERVICE ── --}}
    <p class="sec-eyebrow">Direction & Administration</p>
    <h2 class="sec-title">Chef de <span>Service</span></h2>

    <div class="chef-banner">
        <div class="chef-avatar">👨‍💼</div>
        <div class="chef-info">
            <span class="chef-badge">⭐ Responsable du Centre</span>
            <div class="chef-title">Chef de Service</div>
            <div class="chef-duties">
                <span class="chef-duty">📊 Gestion des ressources humaines</span>
                <span class="chef-duty">📝 Rapport mensuel</span>
                <span class="chef-duty">📁 Supervision administrative</span>
                <span class="chef-duty">🔄 Coordination des équipes</span>
            </div>
        </div>
    </div>

    {{-- ── MÉDECINS ── --}}
    <div class="medecins-section">
        <p class="sec-eyebrow">Corps Médical</p>
        <h2 class="sec-title">Les <span>Médecins</span></h2>

        <div class="medecins-grid">

            {{-- Médecin Chef --}}
            <div class="p-card gold">
                <div class="p-avatar gold">👨‍⚕️</div>
                <div class="p-info">
                    <div class="p-role gold">Médecin Chef</div>
                    <div class="p-name">Médecin Chef du Centre</div>
                    <div class="p-tags">
                        <span class="p-tag gold">Responsable médical</span>
                        <span class="p-tag gold">Supervision clinique</span>
                    </div>
                    <ul class="p-duties">
                        <li>Direction médicale et supervision des consultations</li>
                        <li>Validation des protocoles de soins</li>
                        <li>Coordination avec le chef de service</li>
                        <li>Prise en charge des cas complexes</li>
                    </ul>
                </div>
            </div>

            {{-- Médecin Généraliste --}}
            <div class="p-card blue">
                <div class="p-avatar blue">👩‍⚕️</div>
                <div class="p-info">
                    <div class="p-role blue">Médecin Généraliste</div>
                    <div class="p-name">Médecin Généraliste</div>
                    <div class="p-tags">
                        <span class="p-tag blue">Consultations générales</span>
                        <span class="p-tag blue">Prescriptions</span>
                    </div>
                    <ul class="p-duties">
                        <li>Consultations médicales quotidiennes</li>
                        <li>Examens cliniques et diagnostics</li>
                        <li>Suivi et renouvellement des ordonnances</li>
                        <li>Référencement vers les spécialistes</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    {{-- ── INFIRMIÈRES & SMI ── --}}
    <p class="sec-eyebrow">Soins & Services</p>
    <h2 class="sec-title">Infirmières & <span>Paramédicaux</span></h2>

    <div class="org-grid">

        {{-- Infirmière SMI 1 --}}
        <div class="p-card teal">
            <span class="count-badge">×2 postes</span>
            <div class="p-avatar teal">👩‍⚕️</div>
            <div class="p-info">
                <div class="p-role teal">Infirmière — SMI</div>
                <div class="p-name">Santé Maternelle et Infantile</div>
                <div class="p-tags">
                    <span class="p-tag teal">Maternité</span>
                    <span class="p-tag teal">Pédiatrie</span>
                    <span class="p-tag teal">Vaccination</span>
                </div>
                <ul class="p-duties">
                    <li>Suivi prénatal et postnatal des mères</li>
                    <li>Consultations nourrissons et enfants</li>
                    <li>Administration du programme de vaccination</li>
                    <li>Planification familiale et conseil</li>
                    <li>Pesée, toise et courbes de croissance</li>
                </ul>
            </div>
        </div>

        {{-- Service Maladies Chroniques --}}
        <div class="p-card rose">
            <span class="count-badge">×1 poste</span>
            <div class="p-avatar rose">🩺</div>
            <div class="p-info">
                <div class="p-role rose">Service — Maladies Chroniques</div>
                <div class="p-name">Suivi des Maladies Chroniques</div>
                <div class="p-tags">
                    <span class="p-tag rose">Diabète</span>
                    <span class="p-tag rose">Hypertension</span>
                    <span class="p-tag rose">Suivi long terme</span>
                </div>
                <ul class="p-duties">
                    <li>Suivi régulier des patients diabétiques</li>
                    <li>Contrôle et surveillance de l'hypertension</li>
                    <li>Gestion des ordonnances chroniques</li>
                    <li>Éducation thérapeutique des patients</li>
                    <li>Coordination avec le médecin généraliste</li>
                </ul>
            </div>
        </div>

    </div>

    {{-- ── TOTAL RECAP ── --}}
    <p class="sec-eyebrow">Récapitulatif</p>
    <h2 class="sec-title">Effectif <span>Total</span></h2>

    <div class="total-box">
        <div class="total-item">
            <span class="total-num">6</span>
            <div class="total-lbl">Total Personnel</div>
        </div>
        <div class="total-divider"></div>
        <div class="total-item">
            <span class="total-num">2</span>
            <div class="total-lbl">Médecins</div>
        </div>
        <div class="total-divider"></div>
        <div class="total-item">
            <span class="total-num">2</span>
            <div class="total-lbl">Infirmières SMI</div>
        </div>
        <div class="total-divider"></div>
        <div class="total-item">
            <span class="total-num">1</span>
            <div class="total-lbl">Service Chroniques</div>
        </div>
        <div class="total-divider"></div>
        <div class="total-item">
            <span class="total-num">1</span>
            <div class="total-lbl">Chef de Service</div>
        </div>
    </div>

</main>

{{-- ===== FOOTER ===== --}}
<footer>
    &copy; {{ date('Y') }} — <strong>Centre de Santé</strong> · Tous droits réservés.
</footer>

</body>
</html>
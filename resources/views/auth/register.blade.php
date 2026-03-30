<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Créer un compte — Centre de Santé Jemaat Shaim</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet"/>
    <style>
        :root {
            --bg:       #f0f2f5;
            --white:    #ffffff;
            --navy:     #0b1e3d;
            --teal:     #0a8f7f;
            --teal-lt:  #e6f5f3;
            --teal-glo: rgba(10,143,127,.18);
            --red:      #c0392b;
            --red-lt:   #fdf0ee;
            --green:    #1a7c59;
            --green-lt: rgba(26,124,89,.1);
            --amber:    #b45309;
            --amber-lt: rgba(180,83,9,.1);
            --text:     #1a2535;
            --text-2:   #5a6a7e;
            --text-3:   #a0aec0;
            --border:   #dde3ee;
            --surface2: #f7f9fc;
            --radius:   14px;
            --tr:       .17s ease;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }

        /* ── GAUCHE ── */
        .panel-left {
            background: var(--navy);
            display: flex; flex-direction: column; justify-content: space-between;
            padding: 4rem;
            position: relative; overflow: hidden;
        }
        .panel-left::before {
            content: '';
            position: absolute; inset: 0;
            background:
                radial-gradient(ellipse 60% 50% at 80% 20%, rgba(10,143,127,.25) 0%, transparent 70%),
                radial-gradient(ellipse 40% 40% at 10% 80%, rgba(10,143,127,.1) 0%, transparent 70%);
        }
        .panel-left::after {
            content: '';
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        .pl-inner { position: relative; z-index: 2; display: flex; flex-direction: column; height: 100%; justify-content: space-between; }

        .logo { display: flex; align-items: center; gap: .9rem; margin-bottom: 3rem; }
        .logo-mark { width: 44px; height: 44px; background: var(--teal); border-radius: 12px; display: flex; align-items: center; justify-content: center; }
        .logo-mark svg { width: 22px; height: 22px; }
        .logo-text { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: #fff; line-height: 1.25; }
        .logo-sub  { font-size: .6rem; font-family: 'DM Mono', monospace; color: rgba(255,255,255,.35); text-transform: uppercase; letter-spacing: .12em; }

        .pl-heading { font-family: 'Playfair Display', serif; font-size: 2.4rem; font-weight: 800; color: #fff; line-height: 1.1; letter-spacing: -.02em; margin-bottom: 1rem; }
        .pl-heading em { font-style: italic; color: var(--teal); }
        .pl-text { font-size: .85rem; color: rgba(255,255,255,.45); line-height: 1.8; max-width: 340px; margin-bottom: 2.5rem; }

        .steps { display: flex; flex-direction: column; gap: .55rem; }
        .step {
            display: flex; align-items: flex-start; gap: .85rem;
            padding: .8rem 1rem; border-radius: 11px;
            background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.07);
            transition: var(--tr);
        }
        .step.active {
            background: rgba(10,143,127,.1); border-color: rgba(10,143,127,.25);
        }
        .step-num {
            width: 26px; height: 26px; border-radius: 50%; flex-shrink: 0;
            background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            font-size: .68rem; font-weight: 700; color: rgba(255,255,255,.4);
            font-family: 'DM Mono', monospace;
        }
        .step.active .step-num { background: var(--teal); border-color: var(--teal); color: #fff; box-shadow: 0 0 10px rgba(10,143,127,.4); }
        .step-name { font-size: .8rem; font-weight: 600; color: rgba(255,255,255,.82); }
        .step-desc { font-size: .62rem; color: rgba(255,255,255,.35); font-family: 'DM Mono', monospace; margin-top: .1rem; }
        .step.active .step-desc { color: rgba(10,143,127,.8); }

        .pl-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,.06); }
        .pl-copy { font-size: .6rem; color: rgba(255,255,255,.2); font-family: 'DM Mono', monospace; }
        .status { display: flex; align-items: center; gap: .45rem; }
        .status-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--teal); box-shadow: 0 0 8px var(--teal); animation: blink 2.5s infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.35} }
        .status-txt { font-size: .6rem; color: rgba(255,255,255,.25); font-family: 'DM Mono', monospace; }

        /* ── DROITE ── */
        .panel-right {
            display: flex; align-items: flex-start; justify-content: center;
            padding: 2.5rem 2rem;
            background: var(--bg);
            overflow-y: auto;
        }

        .card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 32px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.05);
            padding: 2.2rem 2rem;
            width: 100%; max-width: 480px;
            margin: auto 0;
        }

        .card-header { text-align: center; margin-bottom: 1.8rem; }
        .card-icon { width: 54px; height: 54px; background: var(--teal-lt); border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; }
        .card-icon svg { width: 24px; height: 24px; color: var(--teal); }
        .card-title { font-family: 'Playfair Display', serif; font-size: 1.45rem; font-weight: 700; color: var(--text); letter-spacing: -.02em; }
        .card-sub   { font-size: .72rem; color: var(--text-3); font-family: 'DM Mono', monospace; margin-top: .3rem; }

        .alert { border-radius: 10px; padding: .72rem 1rem; margin-bottom: 1.2rem; font-size: .78rem; display: flex; align-items: flex-start; gap: .55rem; line-height: 1.5; }
        .alert-info    { background: rgba(10,143,127,.07); border: 1px solid rgba(10,143,127,.2); color: var(--teal); }
        .alert-error   { background: var(--red-lt); border: 1px solid rgba(192,57,43,.15); color: var(--red); }
        .alert-success { background: var(--green-lt); border: 1px solid rgba(26,124,89,.2); color: var(--green); }

        /* ── Rôle ── */
        .role-grid { display: grid; grid-template-columns: 1fr 1fr; gap: .5rem; margin-bottom: 1.4rem; }
        .role-btn {
            padding: .8rem; border-radius: 11px;
            border: 1.5px solid var(--border); background: var(--surface2);
            cursor: pointer; text-align: left; transition: var(--tr);
        }
        .role-btn:hover { border-color: rgba(10,143,127,.3); background: var(--teal-lt); }
        .role-btn.active { border-color: var(--teal); background: var(--teal-lt); box-shadow: 0 0 0 3px rgba(10,143,127,.1); }
        .rb-ico  { font-size: 1.1rem; display: block; margin-bottom: .25rem; }
        .rb-name { font-size: .78rem; font-weight: 600; color: var(--text); display: block; }
        .rb-desc { font-size: .62rem; color: var(--text-3); font-family: 'DM Mono', monospace; display: block; margin-top: .1rem; }
        .role-btn.active .rb-desc { color: var(--teal); }

        /* ── Section label ── */
        .sec-label {
            font-size: .62rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: .11em; color: var(--text-3);
            display: flex; align-items: center; gap: .6rem;
            margin-bottom: .75rem; margin-top: 1.1rem;
        }
        .sec-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }

        /* ── Champs ── */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; }
        .field { margin-bottom: .85rem; }
        .field label { display: block; font-size: .63rem; font-weight: 600; text-transform: uppercase; letter-spacing: .1em; color: var(--text-2); margin-bottom: .38rem; }
        .input-wrap { position: relative; }
        .input-prefix { position: absolute; left: .9rem; top: 50%; transform: translateY(-50%); font-size: .8rem; color: var(--text-3); font-family: 'DM Mono', monospace; pointer-events: none; }
        .f-input, .f-select {
            width: 100%; padding: .7rem .9rem .7rem 2.35rem;
            border: 1.5px solid var(--border); border-radius: var(--radius);
            font-size: .83rem; font-family: 'DM Sans', sans-serif;
            color: var(--text); background: var(--surface2);
            outline: none; transition: var(--tr);
        }
        .f-input::placeholder { color: var(--text-3); }
        .f-input:focus, .f-select:focus { border-color: var(--teal); background: #fff; box-shadow: 0 0 0 3px rgba(10,143,127,.1); }
        .f-input.err { border-color: var(--red); box-shadow: 0 0 0 3px rgba(192,57,43,.1); }
        .f-select { cursor: pointer; }
        .field-err { font-size: .67rem; color: var(--red); margin-top: .28rem; display: flex; align-items: center; gap: .3rem; }
        .eye-btn { position: absolute; right: .85rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-3); transition: color var(--tr); }
        .eye-btn:hover { color: var(--teal); }

        /* ── Force mot de passe ── */
        .pwd-bars { display: flex; gap: 3px; margin-top: .38rem; }
        .pwd-bar { flex: 1; height: 3px; border-radius: 2px; background: var(--border); transition: background .25s; }
        .pwd-bar.weak   { background: var(--red); }
        .pwd-bar.medium { background: var(--amber); }
        .pwd-bar.strong { background: var(--green); }
        .pwd-hint { font-size: .63rem; font-family: 'DM Mono', monospace; color: var(--text-3); margin-top: .2rem; transition: color .25s; }
        .pwd-hint.weak   { color: var(--red); }
        .pwd-hint.medium { color: var(--amber); }
        .pwd-hint.strong { color: var(--green); }

        /* ── CGU ── */
        .cgu { display: flex; align-items: flex-start; gap: .55rem; margin-bottom: 1.3rem; margin-top: .6rem; }
        .cgu input { accent-color: var(--teal); width: 15px; height: 15px; flex-shrink: 0; margin-top: .18rem; cursor: pointer; }
        .cgu label { font-size: .74rem; color: var(--text-2); line-height: 1.55; cursor: pointer; }
        .cgu label a { color: var(--teal); font-weight: 600; text-decoration: none; }
        .cgu label a:hover { text-decoration: underline; }

        /* ── Boutons ── */
        .btn-submit {
            width: 100%; padding: .82rem;
            background: var(--teal); color: #fff; border: none; border-radius: var(--radius);
            font-size: .88rem; font-weight: 600; font-family: 'DM Sans', sans-serif;
            cursor: pointer; transition: var(--tr);
            display: flex; align-items: center; justify-content: center; gap: .55rem;
            box-shadow: 0 4px 16px var(--teal-glo);
        }
        .btn-submit:hover { background: #087566; transform: translateY(-1px); box-shadow: 0 6px 22px rgba(10,143,127,.28); }
        .btn-submit:active { transform: translateY(0); }
        .btn-submit:disabled { background: var(--text-3); cursor: not-allowed; transform: none; box-shadow: none; }

        .sep { display: flex; align-items: center; gap: .8rem; margin: 1.2rem 0; }
        .sep::before, .sep::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .sep span { font-size: .65rem; color: var(--text-3); white-space: nowrap; font-family: 'DM Mono', monospace; }

        .btn-login {
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            width: 100%; padding: .72rem;
            border: 1.5px solid var(--border); border-radius: var(--radius);
            background: var(--surface2); color: var(--text-2);
            font-size: .8rem; font-weight: 600; font-family: 'DM Sans', sans-serif;
            text-decoration: none; transition: var(--tr);
        }
        .btn-login:hover { border-color: var(--teal); color: var(--teal); background: var(--teal-lt); }

        .card-footer { text-align: center; margin-top: 1.2rem; font-size: .62rem; color: var(--text-3); font-family: 'DM Mono', monospace; line-height: 1.8; }
        .card-footer strong { color: var(--teal); }
        .security { display: flex; align-items: center; justify-content: center; gap: .4rem; margin-top: .6rem; font-size: .58rem; color: var(--text-3); font-family: 'DM Mono', monospace; }

        @media(max-width: 820px) {
            body { grid-template-columns: 1fr; }
            .panel-left { display: none; }
            .panel-right { padding: 2rem 1.2rem; }
        }
    </style>
</head>
<body>

<!-- GAUCHE -->
<div class="panel-left">
    <div class="pl-inner">
        <div>
            <div class="logo">
                <div class="logo-mark">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                    </svg>
                </div>
                <div>
                    <div class="logo-text">Centre de Santé</div>
                    <div class="logo-sub">Jemaat Shaim · Safi</div>
                </div>
            </div>

            <h1 class="pl-heading">Créer votre<br><em>compte</em><br>médical.</h1>
            <p class="pl-text">Remplissez le formulaire pour accéder à la plateforme. Votre compte sera activé après validation par l'administrateur.</p>

            <div class="steps">
                <div class="step active">
                    <div class="step-num">1</div>
                    <div>
                        <div class="step-name">Informations personnelles</div>
                        <div class="step-desc">nom · prénom · matricule</div>
                    </div>
                </div>
                <div class="step active">
                    <div class="step-num">2</div>
                    <div>
                        <div class="step-name">Rôle & service</div>
                        <div class="step-desc">médecin chef · infirmière chef</div>
                    </div>
                </div>
                <div class="step active">
                    <div class="step-num">3</div>
                    <div>
                        <div class="step-name">Identifiants de connexion</div>
                        <div class="step-desc">email · mot de passe sécurisé</div>
                    </div>
                </div>
                <div class="step">
                    <div class="step-num">4</div>
                    <div>
                        <div class="step-name">Validation administrateur</div>
                        <div class="step-desc">activation sous 24h ouvrables</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pl-footer">
            <span class="pl-copy">© {{ date('Y') }} · Ministère de la Santé · Marrakech-Safi</span>
            <div class="status">
                <div class="status-dot"></div>
                <span class="status-txt">Inscription ouverte</span>
            </div>
        </div>
    </div>
</div>

<!-- DROITE -->
<div class="panel-right">
    <div class="card">

        <div class="card-header">
            <div class="card-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" y1="8" x2="19" y2="14"/>
                    <line x1="22" y1="11" x2="16" y2="11"/>
                </svg>
            </div>
            <div class="card-title">Nouveau compte</div>
            <p class="card-sub">Personnel médical · Centre de Santé Jemaat Shaim</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">✓ &nbsp;{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">
                <span>⚠</span>
                <div>@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
            </div>
        @endif

        <div class="alert alert-info">ℹ &nbsp;Votre compte sera examiné et activé par l'administrateur du système.</div>

        <form method="POST" action="{{ route('register') }}" id="registerForm" novalidate>
            @csrf
            <input type="hidden" name="role" id="roleInput" value="medecin_chef"/>

            <!-- RÔLE -->
            <div class="sec-label">Rôle professionnel</div>
            <div class="role-grid">
                <button type="button" class="role-btn active" onclick="selectRole(this,'medecin_chef')">
                    <span class="rb-ico">👨‍⚕️</span>
                    <span class="rb-name">Médecin Chef</span>
                    <span class="rb-desc">Direction médicale</span>
                </button>
                <button type="button" class="role-btn" onclick="selectRole(this,'infirmiere_chef')">
                    <span class="rb-ico">👩‍⚕️</span>
                    <span class="rb-name">Infirmière Chef</span>
                    <span class="rb-desc">SMI · Soins · PF</span>
                </button>
            </div>

            <!-- IDENTITÉ -->
            <div class="sec-label">Informations personnelles</div>
            <div class="grid-2">
                <div class="field">
                    <label>Prénom *</label>
                    <div class="input-wrap">
                        <span class="input-prefix">◯</span>
                        <input class="f-input @error('prenom') err @enderror" type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Ahmed" autocomplete="given-name"/>
                    </div>
                    @error('prenom')<div class="field-err">{{ $message }}</div>@enderror
                </div>
                <div class="field">
                    <label>Nom *</label>
                    <div class="input-wrap">
                        <span class="input-prefix">◯</span>
                        <input class="f-input @error('name') err @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Benali" autocomplete="family-name"/>
                    </div>
                    @error('name')<div class="field-err">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="grid-2">
                <div class="field">
                    <label>Matricule</label>
                    <div class="input-wrap">
                        <span class="input-prefix">#</span>
                        <input class="f-input" type="text" name="matricule" value="{{ old('matricule') }}" placeholder="MAT-2026-001"/>
                    </div>
                </div>
                <div class="field">
                    <label>Téléphone</label>
                    <div class="input-wrap">
                        <span class="input-prefix">✆</span>
                        <input class="f-input" type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="06 XX XX XX XX" autocomplete="tel"/>
                    </div>
                </div>
            </div>

            <!-- SERVICE -->
            <div class="sec-label">Service & spécialité</div>
            <div class="grid-2">
                <div class="field">
                    <label>Service affecté *</label>
                    <div class="input-wrap">
                        <span class="input-prefix">◈</span>
                        <select class="f-select @error('service') err @enderror" name="service" style="padding-left:2.35rem">
                            <option value="">— Sélectionner —</option>
                            <option value="consultation" {{ old('service')=='consultation'?'selected':'' }}>Consultation générale</option>
                            <option value="smi"          {{ old('service')=='smi'?'selected':'' }}>Service SMI</option>
                            <option value="chroniques"   {{ old('service')=='chroniques'?'selected':'' }}>Maladies Chroniques</option>
                            <option value="laboratoire"  {{ old('service')=='laboratoire'?'selected':'' }}>Laboratoire</option>
                            <option value="urgences"     {{ old('service')=='urgences'?'selected':'' }}>Urgences</option>
                            <option value="administration"{{ old('service')=='administration'?'selected':'' }}>Administration</option>
                        </select>
                    </div>
                    @error('service')<div class="field-err">{{ $message }}</div>@enderror
                </div>
                <div class="field">
                    <label>Spécialité</label>
                    <div class="input-wrap">
                        <span class="input-prefix">✦</span>
                        <select class="f-select" name="specialite" id="specialite" style="padding-left:2.35rem">
                            <option value="">— Optionnel —</option>
                            <option value="med_generale">Médecine générale</option>
                            <option value="pediatrie">Pédiatrie</option>
                            <option value="gynecologie">Gynécologie</option>
                            <option value="diabetologie">Diabétologie</option>
                            <option value="cardiologie">Cardiologie</option>
                            <option value="infirmier">Soins infirmiers</option>
                            <option value="sage_femme">Sage-femme</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- IDENTIFIANTS -->
            <div class="sec-label">Identifiants de connexion</div>
            <div class="field">
                <label>Adresse email *</label>
                <div class="input-wrap">
                    <span class="input-prefix">@</span>
                    <input class="f-input @error('email') err @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="votre@sante.ma" autocomplete="email"/>
                </div>
                @error('email')<div class="field-err">{{ $message }}</div>@enderror
            </div>

            <div class="grid-2">
                <div class="field">
                    <label>Mot de passe *</label>
                    <div class="input-wrap">
                        <span class="input-prefix">⬡</span>
                        <input class="f-input @error('password') err @enderror" type="password" name="password" id="pwd1" placeholder="••••••••" autocomplete="new-password" oninput="checkStrength(this.value)"/>
                        <button type="button" class="eye-btn" onclick="togglePwd('pwd1','eye1')">
                            <svg id="eye1" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <div class="pwd-bars">
                        <div class="pwd-bar" id="b1"></div>
                        <div class="pwd-bar" id="b2"></div>
                        <div class="pwd-bar" id="b3"></div>
                        <div class="pwd-bar" id="b4"></div>
                    </div>
                    <div class="pwd-hint" id="pwdHint">Entrez un mot de passe</div>
                    @error('password')<div class="field-err">{{ $message }}</div>@enderror
                </div>
                <div class="field">
                    <label>Confirmer *</label>
                    <div class="input-wrap">
                        <span class="input-prefix">⬡</span>
                        <input class="f-input" type="password" name="password_confirmation" id="pwd2" placeholder="••••••••" autocomplete="new-password" oninput="checkConfirm()"/>
                        <button type="button" class="eye-btn" onclick="togglePwd('pwd2','eye2')">
                            <svg id="eye2" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <div class="field-err" id="confirmErr" style="display:none">⚠ Les mots de passe ne correspondent pas</div>
                </div>
            </div>

            <!-- CGU -->
            <div class="cgu">
                <input type="checkbox" name="cgu" id="cgu"/>
                <label for="cgu">
                    Je certifie être membre du personnel médical du <strong>Centre de Santé Jemaat Shaim</strong> et j'accepte les <a href="#">conditions d'utilisation</a> de la plateforme.
                </label>
            </div>

            <button type="submit" class="btn-submit">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Créer mon compte
            </button>
        </form>

        <div class="sep"><span>Déjà inscrit ?</span></div>

        <a href="{{ route('login') }}" class="btn-login">← Se connecter à mon compte</a>

        <div class="card-footer">
            <strong>Centre de Santé Jemaat Shaim</strong><br>
            Province de Safi · Région Marrakech-Safi · Ministère de la Santé
        </div>
        <div class="security">🔒 Données chiffrées · Accès contrôlé · Validation requise</div>

    </div>
</div>

<script>
// ── Rôle ──
function selectRole(btn, role) {
    document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('roleInput').value = role;
    const specs = {
        medecin_chef:    ['med_generale','pediatrie','gynecologie','diabetologie','cardiologie'],
        infirmiere_chef: ['infirmier','sage_femme','gynecologie'],
    };
    const sel = document.getElementById('specialite');
    Array.from(sel.options).forEach(o => {
        o.style.display = (!o.value || specs[role]?.includes(o.value)) ? '' : 'none';
    });
    if (!specs[role]?.includes(sel.value)) sel.value = '';
}

// ── Toggle mot de passe ──
const eyeOpen  = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
const eyeClose = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;
const pwdState = {};
function togglePwd(id, iconId) {
    const inp = document.getElementById(id);
    const ico = document.getElementById(iconId);
    pwdState[id] = !pwdState[id];
    inp.type = pwdState[id] ? 'text' : 'password';
    ico.innerHTML = pwdState[id] ? eyeClose : eyeOpen;
}

// ── Force mot de passe ──
function checkStrength(val) {
    let s = 0;
    if (val.length >= 8)            s++;
    if (/[A-Z]/.test(val))          s++;
    if (/[0-9]/.test(val))          s++;
    if (/[^A-Za-z0-9]/.test(val))   s++;
    const cls  = ['','weak','medium','medium','strong'];
    const lbls = ['Entrez un mot de passe','Trop court','Faible','Moyen','Fort'];
    [1,2,3,4].forEach(i => {
        const b = document.getElementById('b'+i);
        b.className = 'pwd-bar' + (i <= s && s > 0 ? ' '+cls[s] : '');
    });
    const h = document.getElementById('pwdHint');
    h.className = 'pwd-hint ' + (s ? cls[s] : '');
    h.textContent = s ? lbls[s] : lbls[0];
    checkConfirm();
}

function checkConfirm() {
    const p1 = document.getElementById('pwd1').value;
    const p2 = document.getElementById('pwd2').value;
    const err = document.getElementById('confirmErr');
    if (p2.length > 0) {
        const mismatch = p1 !== p2;
        err.style.display = mismatch ? 'flex' : 'none';
        document.getElementById('pwd2').classList.toggle('err', mismatch);
    }
}

// ── Validation ──
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let ok = true;
    ['prenom','name','email','pwd1','pwd2'].forEach(id => {
        const f = document.getElementById(id);
        if (!f) return;
        f.classList.remove('err');
        if (!f.value.trim()) { f.classList.add('err'); ok = false; }
    });
    const p1 = document.getElementById('pwd1').value;
    const p2 = document.getElementById('pwd2').value;
    if (p1 !== p2) {
        document.getElementById('pwd2').classList.add('err');
        document.getElementById('confirmErr').style.display = 'flex';
        ok = false;
    }
    if (!document.getElementById('cgu').checked) { ok = false; }
    if (!ok) e.preventDefault();
});

// Init
selectRole(document.querySelector('.role-btn.active'), 'medecin_chef');
</script>
</body>
</html>
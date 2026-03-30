<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Connexion — Centre de Santé</title>
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
            --text:     #1a2535;
            --text-2:   #5a6a7e;
            --text-3:   #a0aec0;
            --border:   #dde3ee;
            --radius:   14px;
            --tr:       .17s ease;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            -webkit-font-smoothing: antialiased;
        }

        /* ── GAUCHE ── */
        .panel-left {
            background: var(--navy);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem;
            position: relative;
            overflow: hidden;
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

        .pl-inner { position: relative; z-index: 2; }

        .logo {
            display: flex; align-items: center; gap: .9rem;
            margin-bottom: 3.5rem;
        }
        .logo-mark {
            width: 44px; height: 44px;
            background: var(--teal);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
        }
        .logo-mark svg { width: 22px; height: 22px; }
        .logo-text { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; color: #fff; line-height: 1.25; }
        .logo-sub  { font-size: .6rem; font-family: 'DM Mono', monospace; color: rgba(255,255,255,.35); text-transform: uppercase; letter-spacing: .12em; }

        .pl-heading {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem; font-weight: 800;
            color: #fff; line-height: 1.1;
            letter-spacing: -.02em; margin-bottom: 1rem;
        }
        .pl-heading em { font-style: italic; color: var(--teal); }

        .pl-text { font-size: .85rem; color: rgba(255,255,255,.45); line-height: 1.8; max-width: 360px; margin-bottom: 3rem; }

        .roles { display: flex; flex-direction: column; gap: .6rem; }
        .role {
            display: flex; align-items: center; gap: .9rem;
            padding: .85rem 1.1rem; border-radius: 11px;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.08);
        }
        .role-ico { font-size: 1.2rem; }
        .role-name { font-size: .82rem; font-weight: 600; color: rgba(255,255,255,.88); }
        .role-desc { font-size: .62rem; color: rgba(255,255,255,.38); font-family: 'DM Mono', monospace; margin-top: .1rem; }

        .pl-footer {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,.06);
            display: flex; align-items: center; justify-content: space-between;
        }
        .pl-copy { font-size: .6rem; color: rgba(255,255,255,.2); font-family: 'DM Mono', monospace; }
        .status { display: flex; align-items: center; gap: .45rem; }
        .status-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--teal); box-shadow: 0 0 8px var(--teal); animation: blink 2.5s infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.35} }
        .status-txt { font-size: .6rem; color: rgba(255,255,255,.25); font-family: 'DM Mono', monospace; }

        /* ── DROITE ── */
        .panel-right {
            display: flex; align-items: center; justify-content: center;
            padding: 3rem 2rem;
            background: var(--bg);
        }

        .card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 32px rgba(0,0,0,.07), 0 1px 4px rgba(0,0,0,.05);
            padding: 2.5rem 2.2rem;
            width: 100%; max-width: 400px;
        }

        .card-header { text-align: center; margin-bottom: 2rem; }
        .card-icon {
            width: 54px; height: 54px;
            background: var(--teal-lt);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
        }
        .card-icon svg { width: 24px; height: 24px; color: var(--teal); }
        .card-title { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; color: var(--text); letter-spacing: -.02em; }
        .card-sub   { font-size: .75rem; color: var(--text-3); font-family: 'DM Mono', monospace; margin-top: .3rem; }

        .alert {
            border-radius: 10px; padding: .75rem 1rem; margin-bottom: 1.2rem;
            font-size: .78rem; display: flex; align-items: flex-start; gap: .6rem; line-height: 1.5;
        }
        .alert-error   { background: var(--red-lt);  color: var(--red);   border: 1px solid rgba(192,57,43,.15); }
        .alert-success { background: var(--teal-lt); color: var(--teal);  border: 1px solid rgba(10,143,127,.2); }

        .field { margin-bottom: 1.1rem; }
        .field label {
            display: block; font-size: .65rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: .1em;
            color: var(--text-2); margin-bottom: .4rem;
        }
        .input-wrap { position: relative; }
        .input-prefix {
            position: absolute; left: .95rem; top: 50%; transform: translateY(-50%);
            color: var(--text-3); font-size: .85rem; font-family: 'DM Mono', monospace;
            pointer-events: none;
        }
        input[type="email"], input[type="password"], input[type="text"] {
            width: 100%; padding: .72rem .95rem .72rem 2.4rem;
            border: 1.5px solid var(--border); border-radius: var(--radius);
            font-size: .85rem; font-family: 'DM Sans', sans-serif;
            color: var(--text); background: #fafbfc;
            outline: none; transition: var(--tr);
        }
        input:focus { border-color: var(--teal); background: #fff; box-shadow: 0 0 0 3px var(--teal-glo); }
        input.error { border-color: var(--red); box-shadow: 0 0 0 3px rgba(192,57,43,.1); }
        .field-err { font-size: .68rem; color: var(--red); margin-top: .3rem; }
        .eye-btn {
            position: absolute; right: .9rem; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer; color: var(--text-3); transition: color var(--tr);
        }
        .eye-btn:hover { color: var(--teal); }

        /* ── CLAVIER NUMÉRIQUE ── */
        .numpad-section { margin-bottom: 1.4rem; }
        .numpad-label {
            font-size: .65rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: .1em; color: var(--text-2); margin-bottom: .5rem; display: block;
        }

        /* Affichage des points PIN */
        .pin-display {
            display: flex; justify-content: center; gap: .55rem;
            margin-bottom: 1rem; padding: .65rem 0;
        }
        .pin-dot {
            width: 12px; height: 12px; border-radius: 50%;
            border: 2px solid var(--border);
            background: transparent; transition: var(--tr);
        }
        .pin-dot.filled { background: var(--teal); border-color: var(--teal); box-shadow: 0 0 0 2px var(--teal-glo); }
        .pin-dot.error  { background: var(--red); border-color: var(--red); }

        /* Grille chiffres */
        .numpad-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: .45rem;
        }
        .num-btn {
            padding: .9rem .5rem; border-radius: 11px;
            border: 1.5px solid var(--border);
            background: #fafbfc; cursor: pointer;
            font-family: 'DM Sans', sans-serif; font-size: 1.1rem; font-weight: 600;
            color: var(--text); transition: var(--tr);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            line-height: 1;
            -webkit-tap-highlight-color: transparent;
        }
        .num-btn span.letters {
            font-size: .5rem; font-weight: 500; color: var(--text-3);
            letter-spacing: .1em; margin-top: .22rem; font-family: 'DM Mono', monospace;
        }
        .num-btn:hover { background: var(--teal-lt); border-color: var(--teal); color: var(--teal); }
        .num-btn:active { transform: scale(.94); background: rgba(10,143,127,.12); }

        .num-btn.zero { grid-column: 2; }
        .num-btn.clear {
            grid-column: 1; background: #fdf0ee; border-color: rgba(192,57,43,.18);
            color: var(--red); font-size: .78rem; font-weight: 600;
        }
        .num-btn.clear:hover { background: var(--red); color: #fff; border-color: var(--red); }
        .num-btn.back {
            grid-column: 3; background: #fafbfc; font-size: .9rem;
        }
        .num-btn.back:hover { background: #f0f0f0; color: var(--text); }

        .numpad-note {
            text-align: center; font-size: .64rem; color: var(--text-3);
            font-family: 'DM Mono', monospace; margin-top: .7rem;
        }
        .numpad-note strong { color: var(--teal); }

        /* ── TABS ── */
        .tabs {
            display: flex; background: #f0f2f5; border-radius: 10px;
            padding: 3px; gap: 3px; margin-bottom: 1.5rem;
        }
        .tab-btn {
            flex: 1; padding: .52rem; border: none; border-radius: 8px;
            background: transparent; cursor: pointer;
            font-size: .73rem; font-weight: 600; font-family: 'DM Sans', sans-serif;
            color: var(--text-3); transition: var(--tr);
        }
        .tab-btn.active { background: var(--white); color: var(--text); box-shadow: 0 1px 5px rgba(0,0,0,.08); }
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── REMEMBER ── */
        .remember {
            display: flex; align-items: center; gap: .5rem;
            margin-bottom: 1.3rem;
        }
        .remember input { accent-color: var(--teal); width: 15px; height: 15px; cursor: pointer; }
        .remember label { font-size: .78rem; color: var(--text-2); cursor: pointer; }

        /* ── BTN SUBMIT ── */
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

        .sep { display: flex; align-items: center; gap: .8rem; margin: 1.3rem 0; }
        .sep::before, .sep::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .sep span { font-size: .65rem; color: var(--text-3); white-space: nowrap; font-family: 'DM Mono', monospace; }

        .btn-register {
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            width: 100%; padding: .75rem;
            border: 1.5px solid rgba(10,143,127,.25); border-radius: var(--radius);
            background: var(--teal-lt); color: var(--teal);
            font-size: .82rem; font-weight: 600; font-family: 'DM Sans', sans-serif;
            text-decoration: none; transition: var(--tr);
        }
        .btn-register:hover { background: var(--teal); color: #fff; border-color: var(--teal); transform: translateY(-1px); }

        .card-footer { text-align: center; margin-top: 1.3rem; font-size: .63rem; color: var(--text-3); font-family: 'DM Mono', monospace; }
        .card-footer strong { color: var(--teal); }

        @media(max-width: 800px) {
            body { grid-template-columns: 1fr; }
            .panel-left { display: none; }
        }
    </style>
</head>
<body>

<!-- GAUCHE -->
<div class="panel-left">
    <div class="pl-inner">
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

        <h1 class="pl-heading">Votre espace<br><em>médical</em><br>sécurisé.</h1>
        <p class="pl-text">Plateforme intégrée de gestion — SMI, maladies chroniques, consultations, médicaments et rapports mensuels.</p>

        <div class="roles">
            <div class="role">
                <span class="role-ico">👨‍⚕️</span>
                <div>
                    <div class="role-name">Médecin Chef</div>
                    <div class="role-desc">Direction médicale · SMI · Chroniques</div>
                </div>
            </div>
            <div class="role">
                <span class="role-ico">👩‍⚕️</span>
                <div>
                    <div class="role-name">Infirmière Chef</div>
                    <div class="role-desc">SMI · Vaccination · PF · Nutrition</div>
                </div>
            </div>
        </div>

        <div class="pl-footer">
            <span class="pl-copy">© {{ date('Y') }} · Ministère de la Santé · Marrakech-Safi</span>
            <div class="status">
                <div class="status-dot"></div>
                <span class="status-txt">Système actif</span>
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
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <div class="card-title">Connexion</div>
            <p class="card-sub">Accédez à votre espace professionnel</p>
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

        <!-- TABS -->
        <div class="tabs">
            <button class="tab-btn active" onclick="switchTab('email', this)">Email + Mot de passe</button>
            <button class="tab-btn"        onclick="switchTab('pin',   this)">Code PIN</button>
        </div>

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            <!-- TAB EMAIL -->
            <div class="tab-panel active" id="tab-email">

                <div class="field">
                    <label>Adresse Email</label>
                    <div class="input-wrap">
                        <span class="input-prefix">@</span>
                        <input class="@error('email') error @enderror"
                               type="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="votre@email.ma"
                               autocomplete="email" autofocus/>
                    </div>
                    @error('email')<div class="field-err">{{ $message }}</div>@enderror
                </div>

                <div class="field">
                    <label>Mot de passe</label>
                    <div class="input-wrap">
                        <span class="input-prefix">⬡</span>
                        <input class="@error('password') error @enderror"
                               type="password" id="pwdInput" name="password"
                               placeholder="••••••••"
                               autocomplete="current-password"/>
                        <button type="button" class="eye-btn" onclick="togglePwd()">
                            <svg id="eyeIco" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')<div class="field-err">{{ $message }}</div>@enderror
                </div>

                <div class="remember">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <label for="remember">Se souvenir de moi</label>
                </div>

            </div>

            <!-- TAB PIN (clavier numérique) -->
            <div class="tab-panel" id="tab-pin">

                <div class="field">
                    <label>Adresse Email</label>
                    <div class="input-wrap">
                        <span class="input-prefix">@</span>
                        <input type="email" name="email_pin" placeholder="votre@email.ma" autocomplete="email"/>
                    </div>
                </div>

                <div class="numpad-section">
                    <span class="numpad-label">Code PIN</span>

                    <!-- Points visuels -->
                    <div class="pin-display" id="pinDisplay">
                        <div class="pin-dot" id="dot-0"></div>
                        <div class="pin-dot" id="dot-1"></div>
                        <div class="pin-dot" id="dot-2"></div>
                        <div class="pin-dot" id="dot-3"></div>
                        <div class="pin-dot" id="dot-4"></div>
                        <div class="pin-dot" id="dot-5"></div>
                    </div>

                    <!-- Champ caché -->
                    <input type="hidden" name="pin" id="pinValue"/>

                    <!-- Grille clavier -->
                    <div class="numpad-grid">
                        <button type="button" class="num-btn" onclick="pressDigit('1')">1 <span class="letters"></span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('2')">2 <span class="letters">ABC</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('3')">3 <span class="letters">DEF</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('4')">4 <span class="letters">GHI</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('5')">5 <span class="letters">JKL</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('6')">6 <span class="letters">MNO</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('7')">7 <span class="letters">PQRS</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('8')">8 <span class="letters">TUV</span></button>
                        <button type="button" class="num-btn" onclick="pressDigit('9')">9 <span class="letters">WXYZ</span></button>
                        <button type="button" class="num-btn clear" onclick="clearPin()">Effacer</button>
                        <button type="button" class="num-btn zero" onclick="pressDigit('0')">0</button>
                        <button type="button" class="num-btn back" onclick="backspace()">⌫</button>
                    </div>

                    <p class="numpad-note">PIN à <strong>6 chiffres</strong> · La connexion se lance automatiquement</p>
                </div>

            </div>

            <!-- BOUTON SUBMIT (tab email uniquement) -->
            <div id="submitArea">
                <button type="submit" class="btn-submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10 17 15 12 10 7"/>
                        <line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>
                    Se connecter
                </button>
            </div>
        </form>

        <div class="sep"><span>Pas encore de compte ?</span></div>

        <a href="{{ route('register') }}" class="btn-register">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <line x1="19" y1="8" x2="19" y2="14"/>
                <line x1="22" y1="11" x2="16" y2="11"/>
            </svg>
            Créer un nouveau compte
        </a>

        <div class="card-footer">
            &copy; {{ date('Y') }} — <strong>Centre de Santé Jemaat Shaim</strong>
        </div>
    </div>
</div>

<script>
// ── TABS ──
function switchTab(tab, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('tab-' + tab).classList.add('active');
    document.getElementById('submitArea').style.display = (tab === 'pin') ? 'none' : 'block';
    if (tab === 'pin') clearPin();
}

// ── PASSWORD TOGGLE ──
function togglePwd() {
    const i = document.getElementById('pwdInput');
    const ico = document.getElementById('eyeIco');
    const v = i.type === 'text';
    i.type = v ? 'password' : 'text';
    ico.innerHTML = v
        ? `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`
        : `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;
}

// ── NUMPAD PIN ──
let pin = '';
const MAX = 6;

function updateDisplay() {
    for (let i = 0; i < MAX; i++) {
        const dot = document.getElementById('dot-' + i);
        dot.classList.toggle('filled', i < pin.length);
        dot.classList.remove('error');
    }
    document.getElementById('pinValue').value = pin;
}

function pressDigit(d) {
    if (pin.length >= MAX) return;
    pin += d;
    updateDisplay();
    if (pin.length === MAX) {
        setTimeout(() => document.getElementById('loginForm').submit(), 180);
    }
}

function backspace() {
    pin = pin.slice(0, -1);
    updateDisplay();
}

function clearPin() {
    pin = '';
    updateDisplay();
}

// Keyboard support for numpad
document.addEventListener('keydown', function(e) {
    const pinTab = document.getElementById('tab-pin').classList.contains('active');
    if (!pinTab) return;
    if (e.key >= '0' && e.key <= '9') { e.preventDefault(); pressDigit(e.key); }
    if (e.key === 'Backspace') { e.preventDefault(); backspace(); }
    if (e.key === 'Escape') { e.preventDefault(); clearPin(); }
});
</script>
</body>
</html>
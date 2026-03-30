<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Patients — Centre de Santé</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <style>
        :root{
            --teal:#0b7c73; --teal-lt:#12a89d; --teal-bg:#eaf5f4;
            --cream:#f6f3ee; --white:#fff; --ink:#122e2b; --muted:#587370;
            --border:#ddecea; --red:#c0392b; --red-bg:#fdf0ee;
            --green:#1a7a4a; --green-bg:#e8f5ee;
            --orange:#b87a00; --orange-bg:#fdf8ec;
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:var(--cream);color:var(--ink);display:flex;min-height:100vh}

        /* ══ SIDEBAR ══ */
        .sidebar{width:250px;background:var(--ink);display:flex;flex-direction:column;flex-shrink:0;min-height:100vh;position:fixed;top:0;left:0;bottom:0}
        .sb-top{padding:1.3rem;border-bottom:1px solid rgba(255,255,255,.07);display:flex;align-items:center;gap:.75rem}
        .sb-ico{width:40px;height:40px;background:var(--teal);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;box-shadow:0 4px 14px rgba(11,124,115,.35)}
        .sb-name{font-family:'Playfair Display',serif;font-size:.92rem;font-weight:700;color:#fff;line-height:1.2}
        .sb-sub{font-size:.58rem;color:rgba(255,255,255,.4);text-transform:uppercase;letter-spacing:.09em}
        .sb-user{padding:1rem 1.3rem;border-bottom:1px solid rgba(255,255,255,.07);display:flex;align-items:center;gap:.75rem}
        .sb-av{width:34px;height:34px;background:var(--teal);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;color:#fff;border:1.5px solid rgba(255,255,255,.15);flex-shrink:0}
        .sb-uname{font-size:.8rem;font-weight:600;color:#fff}
        .sb-urole{font-size:.62rem;color:rgba(255,255,255,.45)}
        .sb-nav{padding:.8rem 0;flex:1;overflow-y:auto}
        .sb-section{font-size:.58rem;font-weight:600;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,.28);padding:.6rem 1.3rem .28rem;margin-top:.4rem}
        .sb-link{display:flex;align-items:center;gap:.65rem;padding:.62rem 1.3rem;font-size:.8rem;font-weight:500;color:rgba(255,255,255,.65);text-decoration:none;transition:all .18s;border-left:3px solid transparent}
        .sb-link:hover{background:rgba(255,255,255,.06);color:#fff}
        .sb-link.active{background:rgba(11,124,115,.25);color:#fff;border-left-color:var(--teal);font-weight:600}
        .sb-bottom{padding:1rem 1.3rem;border-top:1px solid rgba(255,255,255,.07)}
        .sb-logout{display:flex;align-items:center;gap:.6rem;width:100%;padding:.6rem .9rem;background:rgba(192,57,43,.15);border:1px solid rgba(192,57,43,.25);color:rgba(255,255,255,.8);border-radius:8px;font-size:.78rem;font-weight:600;cursor:pointer;font-family:'DM Sans',sans-serif;transition:background .2s}
        .sb-logout:hover{background:rgba(192,57,43,.35);color:#fff}

        /* ══ MAIN ══ */
        .main{margin-left:250px;flex:1;display:flex;flex-direction:column}
        .topbar{background:var(--white);border-bottom:3px solid var(--teal);padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:10;box-shadow:0 2px 16px rgba(11,124,115,.08)}
        .tb-left h1{font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;color:var(--ink)}
        .tb-left p{font-size:.72rem;color:var(--muted);margin-top:.1rem}
        .tb-right{display:flex;align-items:center;gap:.8rem}
        .content{padding:2rem;flex:1}

        /* ══ STATS ══ */
        .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:2rem}
        .stat{background:var(--white);border:1.5px solid var(--border);border-radius:14px;padding:1.2rem 1.4rem;position:relative;overflow:hidden;transition:transform .2s,box-shadow .2s}
        .stat:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(11,124,115,.1)}
        .stat::before{content:'';position:absolute;top:0;left:0;width:100%;height:3px}
        .stat.teal::before{background:linear-gradient(90deg,var(--teal),var(--teal-lt))}
        .stat.green::before{background:var(--green)}
        .stat.orange::before{background:var(--orange)}
        .stat.red::before{background:var(--red)}
        .stat-lbl{font-size:.67rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:.06em;margin-bottom:.4rem}
        .stat-val{font-family:'Playfair Display',serif;font-size:1.9rem;font-weight:900;color:var(--ink);line-height:1}
        .stat-ico{position:absolute;right:1.1rem;top:1rem;font-size:1.5rem;opacity:.1}

        /* ══ CARTE ══ */
        .card{background:var(--white);border:1.5px solid var(--border);border-radius:14px;overflow:hidden;margin-bottom:1.5rem;position:relative}
        .card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--teal),var(--teal-lt))}
        .card-head{padding:1rem 1.4rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.8rem}
        .card-title{font-family:'Playfair Display',serif;font-size:.95rem;font-weight:700;color:var(--ink);display:flex;align-items:center;gap:.5rem}
        .card-body{padding:1.4rem}

        /* ══ RECHERCHE ══ */
        .search-bar{display:flex;align-items:center;gap:.8rem;flex-wrap:wrap}
        .search-input{
            padding:.55rem 1rem .55rem 2.5rem;
            border:1.5px solid var(--border);border-radius:50px;
            font-size:.83rem;font-family:'DM Sans',sans-serif;color:var(--ink);
            background:var(--cream);outline:none;width:260px;
            transition:border-color .2s,box-shadow .2s;
        }
        .search-input:focus{border-color:var(--teal);box-shadow:0 0 0 3px rgba(11,124,115,.1);background:var(--white)}
        .search-wrap{position:relative}
        .search-wrap::before{content:'🔍';position:absolute;left:.8rem;top:50%;transform:translateY(-50%);font-size:.8rem;pointer-events:none}
        .filter-select{
            padding:.55rem 1rem;border:1.5px solid var(--border);border-radius:50px;
            font-size:.82rem;font-family:'DM Sans',sans-serif;color:var(--ink);
            background:var(--cream);outline:none;cursor:pointer;
            transition:border-color .2s;
        }
        .filter-select:focus{border-color:var(--teal)}

        /* ══ BOUTONS ══ */
        .btn{display:inline-flex;align-items:center;gap:.4rem;padding:.62rem 1.3rem;border-radius:50px;font-size:.82rem;font-weight:600;font-family:'DM Sans',sans-serif;cursor:pointer;border:none;transition:all .2s;text-decoration:none}
        .btn-primary{background:var(--teal);color:#fff;box-shadow:0 3px 14px rgba(11,124,115,.25)}
        .btn-primary:hover{background:var(--teal-lt);transform:translateY(-1px)}
        .btn-outline{background:transparent;color:var(--teal);border:1.5px solid var(--teal)}
        .btn-outline:hover{background:var(--teal-bg)}
        .btn-danger{background:transparent;color:var(--red);border:1.5px solid rgba(192,57,43,.3);font-size:.73rem;padding:.32rem .7rem;border-radius:50px}
        .btn-danger:hover{background:var(--red-bg)}
        .btn-sm{padding:.35rem .85rem;font-size:.75rem}

        /* ══ TABLE ══ */
        .table-wrap{overflow-x:auto}
        .table{width:100%;border-collapse:collapse;font-size:.8rem;min-width:700px}
        .table th{padding:.65rem 1rem;text-align:left;font-size:.63rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--muted);background:var(--cream);border-bottom:2px solid var(--border);white-space:nowrap}
        .table td{padding:.78rem 1rem;border-bottom:1px solid #f0f5f4;color:var(--ink);vertical-align:middle}
        .table tr:last-child td{border-bottom:none}
        .table tr:hover td{background:#f0faf9}
        .td-actions{display:flex;gap:.4rem;align-items:center}

        /* ══ AVATAR ══ */
        .pat-av{width:32px;height:32px;border-radius:9px;background:var(--teal-bg);color:var(--teal);display:inline-flex;align-items:center;justify-content:center;font-size:.72rem;font-weight:700;border:1.5px solid rgba(11,124,115,.15);flex-shrink:0}

        /* ══ BADGES ══ */
        .badge{display:inline-flex;align-items:center;font-size:.63rem;font-weight:700;padding:.2rem .7rem;border-radius:50px}
        .badge-green{background:var(--green-bg);color:var(--green)}
        .badge-red{background:var(--red-bg);color:var(--red)}
        .badge-orange{background:var(--orange-bg);color:var(--orange)}
        .badge-teal{background:var(--teal-bg);color:var(--teal)}
        .badge-gray{background:#f0f5f4;color:var(--muted)}

        /* ══ ALERTS ══ */
        .alert{padding:.85rem 1.1rem;border-radius:10px;font-size:.82rem;margin-bottom:1.5rem;display:flex;align-items:center;gap:.65rem}
        .alert-success{background:var(--green-bg);border:1.5px solid rgba(26,122,74,.2);color:var(--green)}
        .alert-error{background:var(--red-bg);border:1.5px solid rgba(192,57,43,.2);color:var(--red)}

        /* ══ FORMULAIRE ══ */
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem}
        .form-group{margin-bottom:1rem}
        .form-label{display:block;font-size:.7rem;font-weight:600;color:var(--ink);text-transform:uppercase;letter-spacing:.07em;margin-bottom:.4rem}
        .form-input,.form-select,.form-textarea{
            width:100%;padding:.68rem .95rem;
            border:1.5px solid var(--border);border-radius:9px;
            font-size:.85rem;font-family:'DM Sans',sans-serif;color:var(--ink);
            background:var(--cream);transition:border-color .2s,box-shadow .2s;outline:none;
        }
        .form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--teal);background:var(--white);box-shadow:0 0 0 3px rgba(11,124,115,.1)}
        .form-textarea{resize:vertical;min-height:80px;line-height:1.65}
        .form-select{cursor:pointer}

        /* ══ MODAL ══ */
        .modal-overlay{position:fixed;inset:0;background:rgba(18,46,43,.5);backdrop-filter:blur(4px);z-index:1000;display:none;align-items:center;justify-content:center;padding:1rem}
        .modal-overlay.open{display:flex}
        .modal{background:var(--white);border-radius:20px;padding:2rem;width:100%;max-width:580px;box-shadow:0 24px 80px rgba(11,124,115,.2);position:relative;max-height:90vh;overflow-y:auto}
        .modal::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--teal),var(--teal-lt));border-radius:20px 20px 0 0}
        .modal-title{font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;color:var(--ink);margin-bottom:1.5rem;margin-top:.5rem;display:flex;align-items:center;gap:.6rem}
        .modal-close{position:absolute;top:1.2rem;right:1.2rem;background:var(--cream);border:none;width:32px;height:32px;border-radius:50%;cursor:pointer;font-size:1rem;display:flex;align-items:center;justify-content:center;color:var(--muted);transition:background .2s}
        .modal-close:hover{background:var(--border)}

        /* ══ PAGINATION ══ */
        .pagination{display:flex;align-items:center;gap:.4rem;justify-content:center;padding:1.2rem}
        .page-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid var(--border);background:var(--white);color:var(--muted);font-size:.8rem;font-weight:600;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s;font-family:'DM Sans',sans-serif;text-decoration:none}
        .page-btn:hover,.page-btn.active{background:var(--teal);color:#fff;border-color:var(--teal)}

        /* ══ VIDE ══ */
        .empty{text-align:center;padding:3.5rem;color:var(--muted)}
        .empty-ico{font-size:2.8rem;margin-bottom:.8rem}
        .empty-title{font-family:'Playfair Display',serif;font-size:1rem;font-weight:700;color:var(--ink);margin-bottom:.3rem}
        .empty-desc{font-size:.82rem}

        @media(max-width:900px){.stats{grid-template-columns:1fr 1fr}}
        @media(max-width:700px){.sidebar{display:none}.main{margin-left:0}.form-row{grid-template-columns:1fr}.stats{grid-template-columns:1fr}}
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sb-top">
        <div class="sb-ico">🏥</div>
        <div>
            <div class="sb-name">Centre de Santé</div>
            <div class="sb-sub">Administration</div>
        </div>
    </div>
    <div class="sb-user">
        <div class="sb-av">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div>
        <div>
            <div class="sb-uname">{{ auth()->user()->name }}</div>
            <div class="sb-urole">
                @switch(auth()->user()->role)
                    @case('admin') 👨‍💼 Chef de Service @break
                    @case('medecin_chef') 👨‍⚕️ Médecin Chef @break
                    @case('medecin_generaliste') 👩‍⚕️ Médecin @break
                    @case('infirmiere_smi') 👩‍⚕️ Infirmière SMI @break
                    @default 🩺 Personnel
                @endswitch
            </div>
        </div>
    </div>
    <nav class="sb-nav">
        <div class="sb-section">Principal</div>
        <a href="/dashboard" class="sb-link">🏠 Tableau de bord</a>
        <div class="sb-section">Gestion</div>
        <a href="/patients" class="sb-link active">👥 Patients</a>
        <a href="/consultations" class="sb-link">🩺 Consultations</a>
        <a href="/medicaments" class="sb-link">💊 Médicaments</a>
        <div class="sb-section">Services</div>
        <a href="/smi" class="sb-link">🤰 Service SMI</a>
        <a href="/chroniques" class="sb-link">❤️‍🩹 Maladies Chroniques</a>
        @if(auth()->user()->role === 'admin')
        <div class="sb-section">Administration</div>
        <a href="/dashboard/chef#rapports" class="sb-link">📊 Rapports</a>
        <a href="/dashboard/chef#appareils" class="sb-link">🔬 Appareils</a>
        <a href="/users" class="sb-link">⚙️ Utilisateurs</a>
        @endif
        <div class="sb-section">Site</div>
        <a href="/" class="sb-link">🌐 Page d'accueil</a>
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
        <div class="tb-left">
            <h1>👥 Gestion des Patients</h1>
            <p>{{ now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}</p>
        </div>
        <div class="tb-right">
            <button onclick="document.getElementById('modalPatient').classList.add('open')" class="btn btn-primary">
                + Nouveau patient
            </button>
        </div>
    </div>

    <div class="content">

        {{-- MESSAGES --}}
        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">❌ @foreach($errors->all() as $e) {{ $e }} · @endforeach</div>
        @endif

        {{-- STATS --}}
        <div class="stats">
            <div class="stat teal">
                <div class="stat-lbl">Total patients</div>
                <div class="stat-val">{{ $totalPatients ?? 0 }}</div>
                <div class="stat-ico">👥</div>
            </div>
            <div class="stat green">
                <div class="stat-lbl">Nouveaux ce mois</div>
                <div class="stat-val">{{ $nouveauxMois ?? 0 }}</div>
                <div class="stat-ico">🆕</div>
            </div>
            <div class="stat orange">
                <div class="stat-lbl">Maladies chroniques</div>
                <div class="stat-val">{{ $avecChroniques ?? 0 }}</div>
                <div class="stat-ico">❤️</div>
            </div>
            <div class="stat red">
                <div class="stat-lbl">Femmes enceintes</div>
                <div class="stat-val">{{ $femmesEnceintes ?? 0 }}</div>
                <div class="stat-ico">🤰</div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="card">
            <div class="card-head">
                <div class="card-title">📋 Liste des patients</div>
                <div class="search-bar">
                    <div class="search-wrap">
                        <input type="text" class="search-input" id="searchInput" placeholder="Rechercher un patient..." oninput="filtrerPatients()"/>
                    </div>
                    <select class="filter-select" id="filterSexe" onchange="filtrerPatients()">
                        <option value="">Tous</option>
                        <option value="M">Hommes</option>
                        <option value="F">Femmes</option>
                    </select>
                </div>
            </div>
            <div class="table-wrap">
                <table class="table" id="tablePatients">
                    <thead>
                        <tr>
                            <th>N° Dossier</th>
                            <th>Patient</th>
                            <th>Sexe</th>
                            <th>Date naissance</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyPatients">
                        @forelse($patients as $patient)
                        <tr class="patient-row"
                            data-nom="{{ strtolower($patient->nom.' '.$patient->prenom) }}"
                            data-sexe="{{ $patient->sexe }}">
                            <td>
                                <span class="badge badge-teal"># {{ str_pad($patient->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div style="display:flex;align-items:center;gap:.65rem">
                                    <div class="pat-av">{{ strtoupper(substr($patient->prenom,0,1).substr($patient->nom,0,1)) }}</div>
                                    <div>
                                        <div style="font-weight:600;font-size:.83rem">{{ $patient->prenom }} {{ $patient->nom }}</div>
                                        <div style="font-size:.68rem;color:var(--muted)">{{ $patient->cin ?? 'CIN non renseigné' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($patient->sexe === 'M')
                                    <span class="badge badge-teal">♂ Homme</span>
                                @else
                                    <span class="badge badge-orange">♀ Femme</span>
                                @endif
                            </td>
                            <td>{{ $patient->date_naissance ? \Carbon\Carbon::parse($patient->date_naissance)->format('d/m/Y') : '—' }}</td>
                            <td>{{ $patient->telephone ?? '—' }}</td>
                            <td style="max-width:150px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $patient->adresse ?? '—' }}</td>
                            <td>
                                @if($patient->est_enceinte ?? false)
                                    <span class="badge badge-orange">🤰 Enceinte</span>
                                @elseif($patient->maladie_chronique ?? false)
                                    <span class="badge badge-red">❤️ Chronique</span>
                                @else
                                    <span class="badge badge-green">✓ Normal</span>
                                @endif
                            </td>
                            <td>
                                <div class="td-actions">
                                    <button onclick="voirPatient({{ $patient->id }})" class="btn btn-outline btn-sm">👁️</button>
                                    <form method="POST" action="{{ route('patients.destroy', $patient->id) }}"
                                          onsubmit="return confirm('Supprimer ce patient ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty">
                                    <div class="empty-ico">👥</div>
                                    <div class="empty-title">Aucun patient enregistré</div>
                                    <div class="empty-desc">Cliquez sur <strong>+ Nouveau patient</strong> pour commencer.</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if(isset($patients) && $patients->hasPages())
            <div class="pagination">
                {{ $patients->links() }}
            </div>
            @endif
        </div>

    </div>
</main>

{{-- ══ MODAL NOUVEAU PATIENT ══ --}}
<div class="modal-overlay" id="modalPatient">
    <div class="modal">
        <button class="modal-close" onclick="document.getElementById('modalPatient').classList.remove('open')">✕</button>
        <div class="modal-title">👥 Nouveau Dossier Patient</div>

        <form method="POST" action="{{ route('patients.store') }}">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Prénom</label>
                    <input type="text" class="form-input" name="prenom" placeholder="Ex: Fatima" required/>
                </div>
                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-input" name="nom" placeholder="Ex: Benali" required/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Sexe</label>
                    <select class="form-select" name="sexe" required>
                        <option value="">-- Choisir --</option>
                        <option value="M">♂ Masculin</option>
                        <option value="F">♀ Féminin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Date de naissance</label>
                    <input type="date" class="form-input" name="date_naissance"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">CIN</label>
                    <input type="text" class="form-input" name="cin" placeholder="Ex: AB123456"/>
                </div>
                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="text" class="form-input" name="telephone" placeholder="Ex: 06xxxxxxxx"/>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Adresse</label>
                <input type="text" class="form-input" name="adresse" placeholder="Ex: Quartier Al Massira, Marrakech"/>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Femme enceinte ?</label>
                    <select class="form-select" name="est_enceinte">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Maladie chronique ?</label>
                    <select class="form-select" name="maladie_chronique">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Observations</label>
                <textarea class="form-textarea" name="observations" placeholder="Antécédents médicaux, allergies..."></textarea>
            </div>

            <div style="display:flex;gap:.8rem;justify-content:flex-end;margin-top:.5rem">
                <button type="button" onclick="document.getElementById('modalPatient').classList.remove('open')" class="btn btn-outline">Annuler</button>
                <button type="submit" class="btn btn-primary">💾 Enregistrer le patient</button>
            </div>
        </form>
    </div>
</div>

{{-- ══ MODAL VOIR PATIENT ══ --}}
<div class="modal-overlay" id="modalVoir">
    <div class="modal">
        <button class="modal-close" onclick="document.getElementById('modalVoir').classList.remove('open')">✕</button>
        <div class="modal-title">👁️ Détails du Patient</div>
        <div id="modalVoirContent" style="color:var(--muted);text-align:center;padding:2rem">Chargement...</div>
    </div>
</div>

<script>
// Fermer modal en cliquant dehors
['modalPatient','modalVoir'].forEach(id => {
    document.getElementById(id).addEventListener('click', function(e){
        if(e.target === this) this.classList.remove('open');
    });
});

// Filtrer patients
function filtrerPatients() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const sexe   = document.getElementById('filterSexe').value;
    document.querySelectorAll('.patient-row').forEach(row => {
        const nom  = row.dataset.nom || '';
        const s    = row.dataset.sexe || '';
        const ok   = nom.includes(search) && (sexe === '' || s === sexe);
        row.style.display = ok ? '' : 'none';
    });
}

// Voir détails patient
function voirPatient(id) {
    document.getElementById('modalVoir').classList.add('open');
    document.getElementById('modalVoirContent').innerHTML = `
        <div style="padding:2rem;color:var(--muted)">
            <div style="font-size:2rem;margin-bottom:.8rem">👤</div>
            <div>Dossier patient #${String(id).padStart(4,'0')}</div>
            <div style="font-size:.8rem;margin-top:.5rem">Pour voir les détails complets, allez sur la page du dossier patient.</div>
        </div>`;
}

// Ouvrir modal si erreurs
@if($errors->any())
    document.getElementById('modalPatient').classList.add('open');
@endif
</script>
</body>
</html>
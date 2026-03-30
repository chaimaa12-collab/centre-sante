<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Centre de Santé Jemaat Shaim — Soins de Proximité</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"/>
    <style>
        :root {
            --teal:          #0b7c73;
            --teal-dark:     #08605a;
            --teal-light:    #12a89d;
            --teal-bg:       rgba(11,124,115,0.06);
            --teal-glow:     rgba(11,124,115,0.15);
            --cream:         #f8fafc;
            --white:         #ffffff;
            --ink:           #0f172a;
            --ink-light:     #334155;
            --muted:         #64748b;
            --gold:          #c08a3c;
            --gold-bg:       rgba(192,138,60,0.08);
            --border-light:  rgba(226,232,240,0.8);
            --border:        rgba(148,163,184,0.3);
            --shadow-sm:     0 1px 3px 0 rgba(0,0,0,0.08);
            --shadow-md:     0 4px 12px -2px rgba(0,0,0,0.08);
            --shadow-lg:     0 20px 40px -8px rgba(0,0,0,0.12);
            --shadow-xl:     0 32px 64px -16px rgba(0,0,0,0.1);
            --radius-sm:     8px;
            --radius-md:     16px;
            --radius-lg:     24px;
            --transition:    all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        html { 
            scroll-behavior: smooth; 
            scroll-padding-top: 100px;
        }

        body { 
            font-family: 'Inter', -apple-system, sans-serif; 
            background: var(--cream);
            color: var(--ink);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ════════════════════════════════════════
           TOPBAR PROFESSIONNELLE
        ════════════════════════════════════════ */
        .topbar {
            background: linear-gradient(90deg, var(--ink) 0%, var(--teal-dark) 100%);
            padding: 0.75rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.9);
            box-shadow: var(--shadow-md);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .topbar-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .topbar-urgency {
            background: rgba(255,72,66,0.2);
            color: #ef4444;
            font-weight: 700;
            font-size: 0.75rem;
            padding: 0.25rem 0.875rem;
            border-radius: 20px;
            letter-spacing: 0.05em;
            border: 1px solid rgba(255,72,66,0.3);
            animation: pulse-glow 2s infinite;
            box-shadow: 0 0 12px rgba(239,68,68,0.3);
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 12px rgba(239,68,68,0.3); }
            50% { box-shadow: 0 0 20px rgba(239,68,68,0.5); }
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        /* ════════════════════════════════════════
           NAVBAR PREMIUM
        ════════════════════════════════════════ */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2.5rem;
            height: 80px;
            box-shadow: var(--shadow-sm);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            font-weight: 800;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            box-shadow: var(--shadow-lg);
            position: relative;
            flex-shrink: 0;
        }

        .brand-icon::before {
            content: '';
            position: absolute;
            inset: 3px;
            background: rgba(255,255,255,0.25);
            border-radius: var(--radius-md);
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--ink), var(--ink-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--teal);
            font-weight: 600;
            margin-top: 0.125rem;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 0.125rem;
            list-style: none;
        }

        .nav-link {
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--ink-light);
            padding: 1rem 1.5rem;
            border-radius: var(--radius-sm);
            position: relative;
            transition: var(--transition);
            white-space: nowrap;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--teal);
            background: var(--teal-bg);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 24px;
            height: 3px;
            background: var(--teal);
            border-radius: 2px;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            color: white !important;
            padding: 0.75rem 2rem !important;
            border-radius: var(--radius-md) !important;
            font-weight: 600 !important;
            box-shadow: var(--shadow-md);
            height: auto !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--teal-light), var(--teal));
        }

        /* ════════════════════════════════════════
           USER DROPDOWN PREMIUM
        ════════════════════════════════════════ */
        .user-menu {
            position: relative;
        }

        .user-trigger {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--teal-bg);
            border: 2px solid var(--teal-glow);
            border-radius: var(--radius-md);
            padding: 0.5rem 1rem 0.5rem 0.75rem;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--teal);
            transition: var(--transition);
            user-select: none;
        }

        .user-trigger:hover {
            background: var(--teal);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            color: white;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 800;
            flex-shrink: 0;
            box-shadow: var(--shadow-sm);
        }

        .user-trigger:hover .user-avatar {
            background: rgba(255,255,255,0.9);
            color: var(--teal);
        }

        .chevron {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
            margin-left: 0.25rem;
        }

        .user-menu:hover .chevron {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 1rem);
            right: 0;
            background: white;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-xl);
            min-width: 280px;
            padding: 1rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: var(--transition);
            backdrop-filter: blur(20px);
        }

        .user-menu:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            padding: 1.25rem 1.5rem 1rem;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 1rem;
        }

        .dropdown-name {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--ink);
            margin-bottom: 0.25rem;
        }

        .dropdown-role {
            font-size: 0.85rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.875rem 1.25rem;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--ink);
            transition: var(--transition);
            width: 100%;
            border: none;
            background: none;
            cursor: pointer;
            text-align: left;
        }

        .dropdown-item:hover {
            background: var(--teal-bg);
            color: var(--teal);
            transform: translateX(4px);
        }

        .dropdown-danger {
            color: #ef4444;
            margin-top: 0.5rem;
            border-top: 1px solid var(--border-light);
            padding-top: 0.875rem;
        }

        .dropdown-danger:hover {
            background: rgba(239,68,68,0.08);
            color: #dc2626;
        }

        /* ════════════════════════════════════════
           CONNECTED BAR
        ════════════════════════════════════════ */
        .connected-bar {
            background: linear-gradient(135deg, var(--teal) 0%, var(--teal-light) 100%);
            padding: 1.25rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .connected-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: white;
        }

        .connected-avatar {
            width: 44px;
            height: 44px;
            background: rgba(255,255,255,0.2);
            border: 2px solid rgba(255,255,255,0.4);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            font-weight: 800;
            backdrop-filter: blur(10px);
        }

        .connected-details h3 {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .connected-role {
            font-size: 0.85rem;
            opacity: 0.95;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .connected-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-connected {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.5rem;
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-family: inherit;
            text-decoration: none;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .btn-work {
            background: rgba(255,255,255,0.25);
            color: white;
            border: 1px solid rgba(255,255,255,0.4);
        }

        .btn-work:hover {
            background: rgba(255,255,255,0.4);
            transform: translateY(-1px);
        }

        .btn-logout {
            background: rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.9);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .btn-logout:hover {
            background: rgba(239,68,68,0.3);
            color: white;
        }

        /* ════════════════════════════════════════
           HERO SECTION PREMIUM
        ════════════════════════════════════════ */
        .hero {
            display: grid;
            grid-template-columns: 1fr 460px;
            gap: 4rem;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 6rem 2.5rem 5rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            right: -200px;
            top: -150px;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle at 30% 70%, var(--teal-glow) 0%, transparent 60%);
            border-radius: 50%;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            background: var(--teal-bg);
            border: 2px solid var(--teal-glow);
            color: var(--teal);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
            animation: slideInDown 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .hero-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .hero-badge:hover::before {
            left: 100%;
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;
            background: var(--teal);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 900;
            line-height: 1.1;
            color: var(--ink);
            margin-bottom: 1.75rem;
            animation: slideInDown 1s cubic-bezier(0.4, 0, 0.2, 1) 0.2            s both;
            position: relative;
        }

        .hero-title-accent {
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 1.2rem;
            color: var(--ink-light);
            line-height: 1.8;
            max-width: 550px;
            margin-bottom: 3rem;
            animation: slideInDown 1s cubic-bezier(0.4, 0, 0.2, 1) 0.4s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            animation: slideInDown 1s cubic-bezier(0.4, 0, 0.2, 1) 0.6s both;
        }

        .btn-hero-primary {
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            color: white;
            padding: 1.125rem 2.5rem;
            border-radius: var(--radius-lg);
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: var(--shadow-lg);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            font-family: 'Inter', sans-serif;
        }

        .btn-hero-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }

        .btn-hero-primary:hover::before {
            left: 100%;
        }

        .btn-hero-primary:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .btn-hero-secondary {
            background: transparent;
            color: var(--teal);
            padding: 1.125rem 2.5rem;
            border: 2px solid var(--teal);
            border-radius: var(--radius-lg);
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: var(--transition);
        }

        .btn-hero-secondary:hover {
            background: var(--teal);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* ════════════════════════════════════════
           HERO STATS CARD
        ════════════════════════════════════════ */
        .hero-stats {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-light);
            position: relative;
            overflow: hidden;
            animation: slideInRight 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s both;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-stats::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--teal), var(--teal-light));
            box-shadow: 0 2px 12px var(--teal-glow);
        }

        .stats-header {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--ink);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-item {
            background: linear-gradient(135deg, var(--teal-bg), rgba(11,124,115,0.03));
            border-radius: var(--radius-md);
            padding: 1.5rem;
            text-align: center;
            border: 1px solid var(--border-light);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            font-weight: 600;
        }

        .hours-info {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            background: var(--gold-bg);
            border: 1px solid rgba(192,138,60,0.2);
            border-radius: var(--radius-md);
            padding: 1rem 1.5rem;
            font-size: 0.95rem;
            color: var(--gold);
            font-weight: 600;
        }

        /* ════════════════════════════════════════
           INFO BAR
        ════════════════════════════════════════ */
        .info-bar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            background: var(--ink);
            gap: 0;
            box-shadow: var(--shadow-lg);
        }

        .info-item {
            padding: 1.75rem 2.5rem;
            border-right: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 1.25rem;
            transition: var(--transition);
        }

        .info-item:last-child {
            border-right: none;
        }

        .info-item:hover {
            background: rgba(255,255,255,0.05);
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: rgba(255,255,255,0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
            backdrop-filter: blur(10px);
        }

        .info-label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-size: 1rem;
            color: white;
            font-weight: 700;
        }

        /* ════════════════════════════════════════
           SECTION PREMIUM
        ════════════════════════════════════════ */
        .section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 7rem 2.5rem;
        }

        .section-eyebrow {
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--teal);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
        }

        .section-eyebrow::before {
            content: '';
            width: 32px;
            height: 2px;
            background: var(--teal);
            opacity: 0.6;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.25rem, 4.5vw, 3.75rem);
            font-weight: 900;
            color: var(--ink);
            margin-bottom: 1.5rem;
            line-height: 1.15;
            position: relative;
        }

        .section-title-accent {
            background: linear-gradient(135deg, var(--teal), var(--teal-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-description {
            font-size: 1.125rem;
            color: var(--ink-light);
            margin-bottom: 4rem;
            line-height: 1.8;
            max-width: 650px;
        }

        /* ════════════════════════════════════════
           SERVICES GRID
        ════════════════════════════════════════ */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2.5rem 2rem;
            border: 1px solid var(--border-light);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--teal), var(--teal-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .service-card:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(11,124,115,0.2);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-icon {
            width: 64px;
            height: 64px;
            background: var(--teal-bg);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1.75rem;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .service-card:hover .service-icon {
            background: var(--teal);
            color: white;
            border-color: rgba(255,255,255,0.3);
            box-shadow: 0 8px 24px var(--teal-glow);
        }

        .service-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--ink);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .service-description {
            color: var(--ink-light);
            line-height: 1.75;
            margin-bottom: 1.75rem;
        }

        .service-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--teal);
            text-decoration: none;
            transition: var(--transition);
        }

        .service-link:hover {
            color: var(--teal-dark);
            transform: translateX(4px);
        }

        /* ════════════════════════════════════════
           CTA BANNER
        ════════════════════════════════════════ */
        .cta-banner {
            background: linear-gradient(135deg, var(--teal) 0%, var(--teal-light) 100%);
            border-radius: var(--radius-xl);
            padding: 4rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 3rem;
            margin: 4rem auto;
            position: relative;
            overflow: hidden;
            max-width: 1400px;
        }

        .cta-banner::before {
            content: '📁';
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 10rem;
            opacity: 0.08;
        }

        .cta-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .cta-content p {
            color: rgba(255,255,255,0.95);
            font-size: 1.15rem;
            line-height: 1.7;
            max-width: 500px;
            margin-bottom: 2rem;
        }

        .btn-cta {
            background: white;
            color: var(--teal);
            padding: 1.25rem 3rem;
            border-radius: var(--radius-lg);
            font-size: 1.1rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: var(--shadow-xl);
            transition: var(--transition);
            white-space: nowrap;
            flex-shrink: 0;
            font-family: 'Inter', sans-serif;
        }

        .btn-cta:hover {
            transform: translateY(-4px);
            box-shadow: 0 32px 64px rgba(0,0,0,0.2);
        }

        /* ════════════════════════════════════════
           TEAM SECTION
        ════════════════════════════════════════ */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
        }

        .team-member {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2.5rem 1.75rem;
            border: 1px solid var(--border-light);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .team-member::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--teal), var(--teal-light));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .team-member:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(11,124,115,0.2);
        }

        .team-member:hover::before {
            transform: scaleX(1);
        }

        .team-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        .team-name {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            color: var(--ink);
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .team-role {
            font-size: 0.95rem;
            color: var(--ink-light);
            margin-bottom: 1rem;
        }

        .team-badge {
            display: inline-block;
            background: var(--teal-bg);
            color: var(--teal);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ════════════════════════════════════════
           FOOTER
        ════════════════════════════════════════ */
        footer {
            background: var(--ink);
            color: rgba(255,255,255,0.6);
            padding: 3rem 2.5rem 2rem;
            margin-top: 8rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-bottom: 2.5rem;
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            color: white;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-link {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-link:hover {
            color: var(--teal-light);
            transform: translateX(4px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.5);
        }

        .footer-highlight {
            color: var(--teal-light);
            font-weight: 700;
        }

        /* ════════════════════════════════════════
           RESPONSIVE
        ════════════════════════════════════════ */
        @media (max-width: 1200px) {
            .hero { grid-template-columns: 1fr; text-align: center; }
            .hero-buttons { justify-content: center; }
        }

        @media (max-width: 768px) {
            .topbar, .navbar { padding-left: 1.5rem; padding-right            : 1.5rem; 
        }

        .navbar-nav {
            display: none;
        }

        .navbar-nav.mobile {
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            box-shadow: var(--shadow-lg);
            padding: 1rem;
        }

        .hero { padding: 4rem 1.5rem 3rem; }
        .section { padding: 4rem 1.5rem; }
        .connected-bar { padding: 1rem 1.5rem; flex-direction: column; gap: 1.5rem; text-align: center; }
        .cta-banner { padding: 2.5rem 1.5rem; flex-direction: column; text-align: center; }
        .info-bar { grid-template-columns: 1fr; }
        .services-grid { grid-template-columns: 1fr; }
        .team-grid { grid-template-columns: 1fr; }
        .hero-buttons { flex-direction: column; align-items: center; }
        .btn-hero-primary, .btn-hero-secondary { width: 100%; max-width: 320px; justify-content: center; }
    }

    /* ════════════════════════════════════════
       DARK MODE SUPPORT
    ════════════════════════════════════════ */
    @media (prefers-color-scheme: dark) {
        :root {
            --cream: #0f172a;
            --white: #1e293b;
            --ink-light: #94a3b8;
        }
    }
</style>
</head>
<body>

<!-- ════════════════════════════════════════
   TOPBAR
════════════════════════════════════════ -->
<div class="topbar">
    <div class="topbar-left">
        <div class="topbar-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>Jemaa Shaim, Safi · Région Marrakech-Safi</span>
        </div>
        <div class="topbar-item">
            <i class="fas fa-phone"></i>
            <span>+212 524 00 12 34</span>
        </div>
        <div class="topbar-item">
            <i class="fas fa-envelope"></i>
            <span>contact@sante-jemaashaim.ma</span>
        </div>
    </div>
    <div class="topbar-right">
        <span style="font-weight: 500;">🩺 Service 24h</span>
        <div class="topbar-urgency">
            <i class="fas fa-exclamation-triangle"></i>
            Urgences : 15
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════
   NAVBAR
════════════════════════════════════════ -->
<nav class="navbar">
    <a href="{{ url('/') }}" class="navbar-brand">
        <div class="brand-icon">
            <i class="fas fa-heartbeat"></i>
        </div>
        <div>
            <div class="brand-name">Centre de Santé</div>
            <div class="brand-subtitle">Jemaa Shaim · Safi</div>
        </div>
    </a>

    <ul class="navbar-nav">
        <li><a href="{{ url('/') }}" class="nav-link active">Accueil</a></li>
        <li><a href="{{ url('/organisation') }}" class="nav-link">Organisation</a></li>
        <li><a href="{{ url('/smi') }}" class="nav-link">SMI</a></li>
        <li><a href="{{ url('/consultations') }}" class="nav-link">Consultations</a></li>
        <li><a href="{{ url('/patients') }}" class="nav-link">Patients</a></li>
        <li><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>

        @auth
            <li class="user-menu">
                <div class="user-trigger" tabindex="0">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                    <span>{{ Str::limit(auth()->user()->name, 15) }}</span>
                    <i class="fas fa-chevron-down chevron"></i>
                </div>
                <div class="dropdown-menu">
                    <div class="dropdown-header">
                        <div class="dropdown-name">{{ auth()->user()->name }}</div>
                        <div class="dropdown-role">
                            @switch(auth()->user()->role)
                                @case('admin') <i class="fas fa-user-tie"></i> Chef de Service @break
                                @case('medecin_chef') <i class="fas fa-user-md"></i> Médecin Chef @break
                                @case('medecin_generaliste') <i class="fas fa-stethoscope"></i> Médecin @break
                                @case('infirmiere_smi') <i class="fas fa-user-nurse"></i> Infirmière SMI @break
                                @case('service_chroniques') <i class="fas fa-heart"></i> Chroniques @break
                            @endswitch
                        </div>
                    </div>
                    <a href="{{ url('/dashboard') }}" class="dropdown-item">
                        <i class="fas fa-tachometer-alt"></i>
                        Tableau de bord
                    </a>
                    @if(in_array(auth()->user()->role, ['admin','medecin_chef','medecin_generaliste','infirmiere_smi']))
                        <a href="{{ url('/smi') }}" class="dropdown-item">
                            <i class="fas fa-baby"></i>
                            Service SMI
                        </a>
                    @endif
                    @if(in_array(auth()->user()->role, ['admin','medecin_chef','medecin_generaliste','service_chroniques']))
                        <a href="{{ url('/chroniques') }}" class="dropdown-item">
                            <i class="fas fa-heartbeat"></i>
                            Maladies Chroniques
                        </a>
                    @endif
                    <a href="{{ url('/patients') }}" class="dropdown-item">
                        <i class="fas fa-users"></i>
                        Patients
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ url('/users') }}" class="dropdown-item">
                            <i class="fas fa-users-cog"></i>
                            Gestion utilisateurs
                        </a>
                    @endif
                    <div class="dropdown-item dropdown-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        Se déconnecter
                    </div>
                </div>
            </li>
        @else
            <li><a href="{{ url('/login') }}" class="btn-login">
                <i class="fas fa-sign-in-alt"></i>
                Connexion
            </a></li>
        @endauth
    </ul>
</nav>

<!-- ════════════════════════════════════════
   CONNECTED BAR (AUTH)
════════════════════════════════════════ -->
@if(auth()->check())
<div class="connected-bar">
    <div class="connected-info">
        <div class="connected-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <div class="connected-details">
            <h3>Bonjour, {{ auth()->user()->name }} !</h3>
            <div class="connected-role">
                @switch(auth()->user()->role)
                    @case('admin') <i class="fas fa-user-tie"></i> Chef de Service @break
                    @case('medecin_chef') <i class="fas fa-user-md"></i> Médecin Chef @break
                    @case('medecin_generaliste') <i class="fas fa-stethoscope"></i> Médecin @break
                    @case('infirmiere_smi') <i class="fas fa-user-nurse"></i> Infirmière SMI @break
                    @case('service_chroniques') <i class="fas fa-heart"></i> Service Chroniques @break
                @endswitch
            </div>
        </div>
    </div>
    <div class="connected-actions">
        <a href="{{ url('/dashboard') }}" class="btn-connected btn-work">
            <i class="fas fa-briefcase-medical"></i>
            Espace de travail
        </a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-connected btn-logout">
                <i class="fas fa-sign-out-alt"></i>
                Déconnexion
            </button>
        </form>
    </div>
</div>
@endif

<!-- ════════════════════════════════════════
   HERO SECTION
════════════════════════════════════════ -->
<section class="hero">
    <div>
        <div class="hero-badge">
            <span class="hero-badge-dot"></span>
            Centre Médical Agréé · Ministère de la Santé
        </div>
        <h1 class="hero-title">
            Soins de qualité,<br>
            <span class="hero-title-accent">proches de vous</span>
        </h1>
        <p class="hero-description">
            Centre de santé de référence à Jemaa Shaim offrant une prise en charge complète : 
            SMI, maladies chroniques, consultations, vaccinations et suivi personnalisé.
        </p>
        <div class="hero-buttons">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-hero-primary">
                    <i class="fas fa-tachometer-alt"></i>
                    Mon tableau de bord
                </a>
                <a href="{{ url('/patients') }}" class="btn-hero-secondary">
                    <i class="fas fa-users"></i>
                    Gérer mes patients
                </a>
            @else
                <a href="{{ url('/login') }}" class="btn-hero-primary">
                    <i class="fas fa-calendar-check"></i>
                    Prendre RDV
                </a>
                <a href="{{ url('/services') }}" class="btn-hero-secondary">
                    <i class="fas fa-info-circle"></i>
                    Nos services
                </a>
            @endauth
        </div>
    </div>

    <div class="hero-stats">
        <div class="stats-header">
            <i class="fas fa-chart-line"></i>
            Chiffres clés
        </div>
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">{{ $totalPatients ?? '2,847' }}</span>
                <span class="stat-label">Patients suivis</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ $totalConsultations ?? '1,234' }}</span>
                <span class="stat-label">Consultations/mois</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">8</span>
                <span class="stat-label">Services</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ $vaccinationRate ?? '97' }}%</span>
                <span class="stat-label">Taux vaccination</span>
            </div>
        </div>
        <div class="hours-info">
            <i class="fas fa-clock"></i>
            Ouvert : Lun–Ven 08h00–18h00 | Sam 08h00–14h00
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════
   INFO BAR
════════════════════════════════════════ -->
<div class="info-bar">
    <div class="info-item">
        <div class="info-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div>
            <div class="info-label">Horaires d'ouverture</div>
            <div class="info-value">Lun–Ven 08h–18h</div>
        </div>
    </div>
    <div class="info-item">
        <div class="info-icon">
            <i class="fas fa-phone"></i>
        </div>
        <div>
            <div class="info-label">Téléphone</div>
            <div class="info-value">+212 524 00 12 34</div>
        </div>
    </div>
    <div class="info-item">
        <div class="info-icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div>
            <div class="info-label">Adresse</div>
            <div class="info-value">Jemaa Shaim, Safi</div>
        </div>
    </div>
    <div class="info-item">
        <div class="info-icon" style="background: rgba(239,68,68,0.2); color: #ef4444;">
            <i class="fas fa-ambulance"></i>
        </div>
        <div>
            <div class="info-label">Urgences</div>
            <div class="info-value">SAMU : 15</div>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════
   SERVICES SECTION
════════════════════════════════════════ -->
<section class="section">
    <div class="section-eyebrow">
        Nos Prestations
    </div>
    <h2 class="section-title">
        Services médicaux <span class="section-title-accent">complets</span>
    </h2>
    <p class="section-description">
        Une prise en charge intégrée par une équipe pluridisciplinaire qualifiée, 
        avec un suivi personnalisé pour chaque patient.
    </p>

    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-baby-carriage"></i>
            </div>
            <h3 class="service-title">Santé Mère-Enfant (SMI)</h3>
            <p class="service-description">
                Suivi prénatal complet, consultations post-natales, 
                croissance infantile et dépistages systématiques.
            </p>
            <a href="{{ url('/smi') }}" class="service-link">
                En savoir plus <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-syringe"></i>
            </div>
            <h3 class="service-title">Vaccination</h3>
            <p class="service-description">
                Programme national complet pour enfants et adultes, 
                rappels et certificats de vaccination.
            </p>
            <a href="{{ url('/smi') }}" class="service-link">
                Prendre RDV <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-seedling"></i>
            </div>
            <h3 class="service-title">Planification Familiale</h3>
            <p class="service-description">
                Conseil personnalisé et accès aux méthodes contraceptives modernes et adaptées.
            </p>
            <a href="{{ url('/smi') }}" class="service-link">
                Consultation <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h3 class="service-title">Maladies Chroniques</h3>
            <p class="service-description">
                Diabète, hypertension, asthme : suivi spécialisé et éducation thérapeutique.
            </p>
            <a href="#" class="service-link">
                Dossier chronique <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-stethoscope"></i>
            </div>
            <h3 class="service-title">Consultations Générales</h3>
            <p class="service-description">
                Examens cliniques, diagnostics, ordonnances et certificats médicaux.
            </p>
            <a href="#" class="service-link">
                Prendre RDV <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-pills"></i>
            </div>
            <h3 class="service-title">Pharmacie & Médicaments</h3>
            <p class="service-description">
                Dispensation sécurisée, gestion des stocks et conseil pharmaceutique.
            </p>
            <a href="#" class="service-link">
                Liste médicaments <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════
   CTA BANNER
════════════════════════════════════════ -->
<section class="cta-banner">
    <div class="cta-content">
        <h3>Ouvrir votre dossier patient</h3>
        <p>
            Obtenez votre numéro de dossier unique pour un suivi médical 
            continu et personnalisé. Accès sécurisé 24h/24.
        </p>
    </div>
    @auth
        <a href="{{ url('/patients/create') }}" class="btn-cta">
            <i class="fas fa-plus-circle"></i>
            Nouveau dossier
        </a>
    @else
        <a href="{{ url('/login') }}" class="btn-cta">
            <i class="fas fa-sign-in-alt"></i>
            Se connecter
        </a>
    @endauth
</section>

<!-- ════════════════════════════════════════
   TEAM SECTION
════════════════════════════════════════ -->
<section class="section">
    <div class="section-eyebrow">
        Notre Équipe
    </div>
    <h2 class="section-title">
        Professionnels de <span class="section-title-accent">santé</span> dédiés
    </h2>

    <div class="team-grid">
        <div class="team-member">
            <i class="fas fa-user-tie team-icon"></i>
            <div class="team-name">Chef de Service</div>
            <div class="team-role">Direction · Rapports · Administration</div>
            <span class="team-badge">Direction</span>
        </div>
        <div class="team-member">
            <i class="fas fa-user-md team-icon"></i>
            <div class="team-name">Dr. Ahmed El Khattabi</div>
            <div class="team-role">Médecin Chef</div>
            <span class="team-badge">Responsable Médical</span>
        </div>
        <div class="team-member">
            <i class="fas fa            <i class="fas fa-stethoscope team-icon"></i>
            <div class="team-name">Dr. Fatima Zahra</div>
            <div class="team-role">Médecin Généraliste</div>
        </div>
        <div class="team-member" style="position: relative;">
            <span style="position: absolute; top: 1rem; right: 1.25rem; background: var(--teal-bg); color: var(--teal); font-size: 0.75rem; font-weight: 700; padding: 0.25rem 0.75rem; border-radius: 20px;">×3</span>
            <i class="fas fa-user-nurse team-icon"></i>
            <div class="team-name">Infirmières SMI</div>
            <div class="team-role">Maternité · Vaccination · PF</div>
            <span class="team-badge">Équipe SMI</span>
        </div>
        <div class="team-member">
            <i class="fas fa-heart team-icon"></i>
            <div class="team-name">Service Chroniques</div>
            <div class="team-role">Diabète · Hypertension · Asthme</div>
            <span class="team-badge">Spécialistes</span>
        </div>
    </div>

    <div style="text-align: center; margin-top: 4rem;">
        <a href="{{ url('/organisation') }}" class="btn-hero-primary" style="max-width: 320px; margin: 0 auto; display: inline-flex;">
            <i class="fas fa-users"></i>
            Voir l'équipe complète
        </a>
    </div>
</section>

<!-- ════════════════════════════════════════
   FOOTER PREMIUM
════════════════════════════════════════ -->
<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>Centre de Santé</h3>
            <p style="color: rgba(255,255,255,0.8); line-height: 1.7; max-width: 300px;">
                Centre de référence à Jemaa Shaim-Safi, 
                au service de la santé de proximité.
            </p>
        </div>
        <div class="footer-section">
            <h3>Services</h3>
            <div class="footer-links">
                <a href="{{ url('/smi') }}" class="footer-link">
                    <i class="fas fa-baby"></i> SMI
                </a>
                <a href="#" class="footer-link">
                    <i class="fas fa-heartbeat"></i> Chroniques
                </a>
                <a href="#" class="footer-link">
                    <i class="fas fa-calendar-check"></i> RDV
                </a>
                <a href="#" class="footer-link">
                    <i class="fas fa-pills"></i> Médicaments
                </a>
            </div>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <div class="footer-links">
                <a href="tel:+212524001234" class="footer-link">
                    <i class="fas fa-phone"></i> +212 524 00 12 34
                </a>
                <a href="mailto:contact@sante-jemaashaim.ma" class="footer-link">
                    <i class="fas fa-envelope"></i> contact@sante-jemaashaim.ma
                </a>
                <a href="#" class="footer-link">
                    <i class="fas fa-map-marker-alt"></i> Jemaa Shaim, Safi
                </a>
            </div>
        </div>
        <div class="footer-section">
            <h3>Liens utiles</h3>
            <div class="footer-links">
                <a href="{{ url('/organisation') }}" class="footer-link">
                    <i class="fas fa-sitemap"></i> Organisation
                </a>
                <a href="#" class="footer-link">
                    <i class="fas fa-file-alt"></i> Rapports
                </a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="footer-link">
                        <i class="fas fa-tachometer-alt"></i> Espace pro
                    </a>
                @else
                    <a href="{{ url('/login') }}" class="footer-link">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div>&copy; {{ date('Y') }} — 
            <span class="footer-highlight">Centre de Santé Jemaa Shaim</span> 
            · Ministère de la Santé · Région Marrakech-Safi
        </div>
        <div style="margin-top: 1rem; font-size: 0.85rem;">
            Développé avec ❤️ pour la santé publique
        </div>
    </div>
</footer>

<script>
    // Smooth scroll pour les liens internes
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(255,255,255,0.95)';
            navbar.style.boxShadow = '0 8px 32px rgba(0,0,0,0.08)';
        } else {
            navbar.style.background = 'rgba(255,255,255,0.98)';
            navbar.style.boxShadow = '0 1px 3px rgba(0,0,0,0.08)';
        }
    });

    // Déconnexion confirmation
    document.querySelectorAll('.btn-logout, .dropdown-danger').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!confirm('Confirmez-vous votre déconnexion ?')) {
                e.preventDefault();
            }
        });
    });

    // Stats counter animation
    const animateCounters = () => {
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
            const increment = target / 100;
            let current = 0;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = counter.textContent;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current) + (counter.textContent.includes('%') ? '%' : '');
                }
            }, 20);
        });
    };

    // Intersection Observer pour animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                if (entry.target.classList.contains('hero-stats')) {
                    setTimeout(animateCounters, 300);
                }
            }
        });
    }, observerOptions);

    // Observe les éléments animés
    document.querySelectorAll('.hero-stats, .service-card, .team-member').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(40px)';
        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(el);
    });

    // Preload critique
    if ('loading' in HTMLImageElement.prototype) {
        // Native lazy loading support
    } else {
        // Fallback
    }

    // PWA ready
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js');
        });
    }
</script>

</body>
</html>
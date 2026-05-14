<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARSINFINITY — Panel Principal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #0d0d1a;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── Fondo animado ── */
        .bg-orbs { position: fixed; inset: 0; z-index: 0; pointer-events: none; }
        .orb {
            position: absolute; border-radius: 50%;
            filter: blur(80px); opacity: 0.15;
            animation: float 12s ease-in-out infinite;
        }
        .orb-1 { width: 500px; height: 500px; background: #667eea; top: -150px; left: -150px; animation-delay: 0s; }
        .orb-2 { width: 400px; height: 400px; background: #f093fb; bottom: -100px; right: -100px; animation-delay: -4s; }
        .orb-3 { width: 300px; height: 300px; background: #4facfe; top: 50%; left: 55%; animation-delay: -8s; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%       { transform: translate(30px, -30px) scale(1.05); }
            66%       { transform: translate(-20px, 20px) scale(0.95); }
        }

        /* ── Layout ── */
        .wrapper { position: relative; z-index: 1; min-height: 100vh; display: flex; flex-direction: column; }

        /* ══════════════════════════════════════════
           HEADER + NAVBAR
        ══════════════════════════════════════════ */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(13,13,26,0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        /* Fila superior: logo + badge */
        .header-top {
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo { display: flex; align-items: center; gap: 0.75rem; }

        .logo-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.25rem; font-weight: 900;
            background: linear-gradient(135deg, #fff 40%, #a78bfa);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
            letter-spacing: -0.02em;
        }

        .header-badge {
            background: rgba(102,126,234,0.15);
            border: 1px solid rgba(102,126,234,0.3);
            color: #a78bfa;
            padding: 0.3rem 0.85rem;
            border-radius: 20px;
            font-size: 0.75rem; font-weight: 500;
        }

        /* Barra de navegación rápida */
        .navbar {
            padding: 0.6rem 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            border-top: 1px solid rgba(255,255,255,0.04);
        }

        .navbar-label {
            font-size: 0.7rem;
            font-weight: 600;
            color: rgba(255,255,255,0.3);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-right: 0.5rem;
            white-space: nowrap;
        }

        .nav-group { display: flex; align-items: center; gap: 0.35rem; }

        .nav-sep {
            width: 1px; height: 20px;
            background: rgba(255,255,255,0.1);
            margin: 0 0.4rem;
        }

        .nav-btn {
            display: inline-flex; align-items: center; gap: 0.35rem;
            padding: 0.38rem 0.8rem;
            border-radius: 8px;
            font-size: 0.78rem; font-weight: 600;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
            transition: transform 0.15s, opacity 0.15s, box-shadow 0.15s;
            white-space: nowrap;
            border: none; cursor: pointer;
        }
        .nav-btn:hover { transform: translateY(-1px); opacity: 0.88; box-shadow: 0 4px 12px rgba(0,0,0,0.3); }

        /* Colores de los nav-btn */
        .nav-list  { background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.75); }
        .nav-marcas   { background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; }
        .nav-modelos  { background: linear-gradient(135deg, #f7971e, #ffd200); color: #1a1a2e; }
        .nav-vehiculos{ background: linear-gradient(135deg, #4facfe, #00f2fe); color: #0a2540; }
        .nav-ventas   { background: linear-gradient(135deg, #f093fb, #f5576c); color: #fff; }
        .nav-clientes { background: linear-gradient(135deg, #11998e, #38ef7d); color: #0d2b29; }

        /* ══════════════════════════════════════════
           DASHBOARD — conteos
        ══════════════════════════════════════════ */
        .dashboard-section {
            padding: 2rem 2rem 0;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .section-title {
            font-size: 0.7rem;
            font-weight: 700;
            color: rgba(255,255,255,0.3);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 1rem;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
        }

        @media (max-width: 900px) {
            .stats-row { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 600px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
        }

        .stat-card {
            position: relative;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            overflow: hidden;
            transition: transform 0.2s, border-color 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); border-color: rgba(255,255,255,0.15); }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 3px;
            background: var(--stat-color);
            border-radius: 0 0 16px 16px;
        }

        .stat-card-marcas   { --stat-color: linear-gradient(90deg, #667eea, #764ba2); }
        .stat-card-modelos  { --stat-color: linear-gradient(90deg, #f7971e, #ffd200); }
        .stat-card-vehiculos{ --stat-color: linear-gradient(90deg, #4facfe, #00f2fe); }
        .stat-card-ventas   { --stat-color: linear-gradient(90deg, #f093fb, #f5576c); }
        .stat-card-clientes { --stat-color: linear-gradient(90deg, #11998e, #38ef7d); }

        .stat-label {
            font-size: 0.72rem;
            font-weight: 600;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.6rem;
        }

        .stat-number {
            font-size: 2.4rem;
            font-weight: 900;
            line-height: 1;
            background: var(--stat-color);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-icon {
            position: absolute;
            top: 1rem; right: 1rem;
            font-size: 1.5rem;
            opacity: 0.25;
        }

        /* ══════════════════════════════════════════
           GESTIÓN — tarjetas con botones
        ══════════════════════════════════════════ */
        .manage-section {
            padding: 1.75rem 2rem 3rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .card {
            position: relative;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 18px;
            padding: 1.5rem;
            overflow: hidden;
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
            display: flex; flex-direction: column; gap: 0.85rem;
        }
        .card::before {
            content: ''; position: absolute; inset: 0;
            background: var(--card-glow); opacity: 0;
            transition: opacity 0.3s ease; border-radius: inherit;
        }
        .card:hover { transform: translateY(-5px); border-color: rgba(255,255,255,0.16); box-shadow: 0 16px 50px rgba(0,0,0,0.35); }
        .card:hover::before { opacity: 1; }

        .card-marcas   { --card-glow: linear-gradient(135deg, rgba(102,126,234,0.1), transparent); }
        .card-modelos  { --card-glow: linear-gradient(135deg, rgba(247,151,30,0.1), transparent); }
        .card-vehiculos{ --card-glow: linear-gradient(135deg, rgba(79,172,254,0.1), transparent); }
        .card-ventas   { --card-glow: linear-gradient(135deg, rgba(240,147,251,0.1), transparent); }
        .card-clientes { --card-glow: linear-gradient(135deg, rgba(17,153,142,0.1), transparent); }

        .card-icon {
            width: 46px; height: 46px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.35rem; flex-shrink: 0;
            position: relative; z-index: 1;
        }
        .card-marcas   .card-icon { background: linear-gradient(135deg, #667eea, #764ba2); }
        .card-modelos  .card-icon { background: linear-gradient(135deg, #f7971e, #ffd200); }
        .card-vehiculos .card-icon { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .card-ventas   .card-icon { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .card-clientes .card-icon { background: linear-gradient(135deg, #11998e, #38ef7d); }

        .card-body { position: relative; z-index: 1; }
        .card-title { font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 0.25rem; }
        .card-desc  { font-size: 0.8rem; color: rgba(255,255,255,0.38); line-height: 1.45; }

        .card-actions { position: relative; z-index: 1; display: flex; gap: 0.5rem; }

        .btn-action {
            flex: 1; padding: 0.5rem 0.65rem;
            border-radius: 9px; font-size: 0.78rem; font-weight: 600;
            font-family: 'Inter', sans-serif; text-decoration: none; text-align: center;
            transition: transform 0.15s, opacity 0.15s; border: none; cursor: pointer;
        }
        .btn-action:hover { transform: translateY(-1px); opacity: 0.88; }

        .btn-list { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12); color: rgba(255,255,255,0.8); }
        .btn-new-marcas   { background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; }
        .btn-new-modelos  { background: linear-gradient(135deg, #f7971e, #ffd200); color: #1a1a2e; }
        .btn-new-vehiculos{ background: linear-gradient(135deg, #4facfe, #00f2fe); color: #0f3460; }
        .btn-new-ventas   { background: linear-gradient(135deg, #f093fb, #f5576c); color: #fff; }
        .btn-new-clientes { background: linear-gradient(135deg, #11998e, #38ef7d); color: #0d2b29; }

        /* ── Divisor ── */
        .divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.06);
            max-width: 1200px; margin: 0 auto;
            width: calc(100% - 4rem);
        }

        /* ── Footer ── */
        footer {
            text-align: center; padding: 1.25rem;
            color: rgba(255,255,255,0.18); font-size: 0.78rem;
            border-top: 1px solid rgba(255,255,255,0.05);
            margin-top: auto;
        }
    </style>
</head>
<body>

<div class="bg-orbs">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>

<div class="wrapper">

    <!-- ══ HEADER ══ -->
    <header>
        <!-- Fila del logo -->
        <div class="header-top">
            <div class="logo">
                <div class="logo-icon">🚗</div>
                <span class="logo-text">CARSINFINITY</span>
            </div>
            <span class="header-badge">Panel de Administración</span>
        </div>

        <!-- Barra de acceso rápido -->
        <nav class="navbar">
            <span class="navbar-label">Acceso rápido</span>

            <!-- Marcas -->
            <div class="nav-group">
                <a href="{{ route('marca.index') }}"  class="nav-btn nav-list">📋 Marcas</a>
                <a href="{{ route('marca.create') }}" class="nav-btn nav-marcas">+ Nueva</a>
            </div>
            <div class="nav-sep"></div>

            <!-- Modelos -->
            <div class="nav-group">
                <a href="{{ route('modelo.index') }}"  class="nav-btn nav-list">📋 Modelos</a>
                <a href="{{ route('modelo.create') }}" class="nav-btn nav-modelos">+ Nuevo</a>
            </div>
            <div class="nav-sep"></div>

            <!-- Vehículos -->
            <div class="nav-group">
                <a href="{{ route('vehiculo.index') }}"  class="nav-btn nav-list">📋 Vehículos</a>
                <a href="{{ route('vehiculo.create') }}" class="nav-btn nav-vehiculos">+ Nuevo</a>
            </div>
            <div class="nav-sep"></div>

            <!-- Ventas -->
            <div class="nav-group">
                <a href="{{ route('venta.index') }}"  class="nav-btn nav-list">📋 Ventas</a>
                <a href="{{ route('venta.create') }}" class="nav-btn nav-ventas">+ Nueva</a>
            </div>
            <div class="nav-sep"></div>

            <!-- Clientes -->
            <div class="nav-group">
                <a href="{{ route('cliente.index') }}"  class="nav-btn nav-list">📋 Clientes</a>
                <a href="{{ route('cliente.create') }}" class="nav-btn nav-clientes">+ Nuevo</a>
            </div>
        </nav>
    </header>

    <!-- ══ DASHBOARD ══ -->
    <div class="dashboard-section">
        <div class="section-title">📊 Resumen del sistema</div>
        <div class="stats-row">

            <div class="stat-card stat-card-marcas">
                <div class="stat-icon">🏷️</div>
                <div class="stat-label">Marcas</div>
                <div class="stat-number">{{ $totalMarcas }}</div>
            </div>

            <div class="stat-card stat-card-modelos">
                <div class="stat-icon">🚗</div>
                <div class="stat-label">Modelos</div>
                <div class="stat-number">{{ $totalModelos }}</div>
            </div>

            <div class="stat-card stat-card-vehiculos">
                <div class="stat-icon">🚙</div>
                <div class="stat-label">Vehículos</div>
                <div class="stat-number">{{ $totalVehiculos }}</div>
            </div>

            <div class="stat-card stat-card-ventas">
                <div class="stat-icon">💰</div>
                <div class="stat-label">Ventas</div>
                <div class="stat-number">{{ $totalVentas }}</div>
            </div>

            <div class="stat-card stat-card-clientes">
                <div class="stat-icon">👤</div>
                <div class="stat-label">Clientes</div>
                <div class="stat-number">{{ $totalClientes }}</div>
            </div>

        </div>
    </div>

    <!-- ══ GESTIÓN ══ -->
    <div class="manage-section">
        <div class="section-title" style="margin-bottom:1rem;">⚙️ Gestión de módulos</div>
        <div class="cards-grid">

            <!-- Marcas -->
            <div class="card card-marcas">
                <div class="card-icon">🏷️</div>
                <div class="card-body">
                    <div class="card-title">Marcas</div>
                    <div class="card-desc">Gestiona las marcas de vehículos disponibles en el sistema.</div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('marca.index') }}"  class="btn-action btn-list">📋 Ver listado</a>
                    <a href="{{ route('marca.create') }}" class="btn-action btn-new-marcas">+ Nueva</a>
                </div>
            </div>

            <!-- Modelos -->
            <div class="card card-modelos">
                <div class="card-icon">🚗</div>
                <div class="card-body">
                    <div class="card-title">Modelos</div>
                    <div class="card-desc">Administra los modelos asociados a cada marca registrada.</div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('modelo.index') }}"  class="btn-action btn-list">📋 Ver listado</a>
                    <a href="{{ route('modelo.create') }}" class="btn-action btn-new-modelos">+ Nuevo</a>
                </div>
            </div>

            <!-- Vehículos -->
            <div class="card card-vehiculos">
                <div class="card-icon">🚙</div>
                <div class="card-body">
                    <div class="card-title">Vehículos</div>
                    <div class="card-desc">Controla el stock, color y precio de cada vehículo.</div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('vehiculo.index') }}"  class="btn-action btn-list">📋 Ver listado</a>
                    <a href="{{ route('vehiculo.create') }}" class="btn-action btn-new-vehiculos">+ Nuevo</a>
                </div>
            </div>

            <!-- Ventas -->
            <div class="card card-ventas">
                <div class="card-icon">💰</div>
                <div class="card-body">
                    <div class="card-title">Ventas</div>
                    <div class="card-desc">Registra y consulta todas las ventas realizadas a clientes.</div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('venta.index') }}"  class="btn-action btn-list">📋 Ver listado</a>
                    <a href="{{ route('venta.create') }}" class="btn-action btn-new-ventas">+ Nueva</a>
                </div>
            </div>

            <!-- Clientes -->
            <div class="card card-clientes">
                <div class="card-icon">👤</div>
                <div class="card-body">
                    <div class="card-title">Clientes</div>
                    <div class="card-desc">Gestiona la información de contacto de tus clientes.</div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('cliente.index') }}"  class="btn-action btn-list">📋 Ver listado</a>
                    <a href="{{ route('cliente.create') }}" class="btn-action btn-new-clientes">+ Nuevo</a>
                </div>
            </div>

        </div>
    </div>

    <footer>© {{ date('Y') }} CARSINFINITY — Sistema de gestión de vehículos</footer>
</div>

</body>
</html>

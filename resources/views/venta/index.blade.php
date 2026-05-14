<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas — CARSINFINITY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:#0d0d1a;min-height:100vh;color:#fff}
        .bg-orbs{position:fixed;inset:0;z-index:0;pointer-events:none}
        .orb{position:absolute;border-radius:50%;filter:blur(80px);opacity:0.12;animation:float 14s ease-in-out infinite}
        .orb-1{width:500px;height:500px;background:#f093fb;top:-200px;left:-100px}
        .orb-2{width:350px;height:350px;background:#f5576c;bottom:-100px;right:-100px;animation-delay:-6s}
        @keyframes float{0%,100%{transform:translate(0,0)}50%{transform:translate(25px,-25px)}}
        .wrapper{position:relative;z-index:1;min-height:100vh}
        header{padding:1.25rem 2.5rem;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.06);background:rgba(13,13,26,0.7);backdrop-filter:blur(12px);position:sticky;top:0;z-index:10}
        .logo{display:flex;align-items:center;gap:0.75rem;text-decoration:none}
        .logo-icon{width:38px;height:38px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:1.1rem}
        .logo-text{font-size:1.1rem;font-weight:800;background:linear-gradient(135deg,#fff 40%,#a78bfa);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .back-btn{display:flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:8px;color:rgba(255,255,255,0.7);text-decoration:none;font-size:0.85rem;font-weight:500;transition:all 0.2s}
        .back-btn:hover{background:rgba(255,255,255,0.1);color:#fff}
        .page-header{padding:2.5rem 2.5rem 0;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;max-width:1100px;margin:0 auto}
        .page-title{display:flex;align-items:center;gap:1rem}
        .page-icon{width:52px;height:52px;background:linear-gradient(135deg,#f093fb,#f5576c);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem}
        .page-title h1{font-size:1.7rem;font-weight:800}
        .page-title p{font-size:0.85rem;color:rgba(255,255,255,0.4);margin-top:2px}
        .new-btn{display:flex;align-items:center;gap:0.5rem;padding:0.7rem 1.4rem;background:linear-gradient(135deg,#f093fb,#f5576c);border-radius:10px;color:#fff;text-decoration:none;font-size:0.9rem;font-weight:700;transition:transform 0.15s,box-shadow 0.15s}
        .new-btn:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(240,147,251,0.4)}
        .summary-row{max-width:1100px;margin:1.5rem auto 0;padding:0 2.5rem;display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1rem}
        .summary-card{background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:14px;padding:1.2rem 1.5rem}
        .summary-card .label{font-size:0.78rem;color:rgba(255,255,255,0.35);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:0.4rem}
        .summary-card .value{font-size:1.5rem;font-weight:800;color:#fff}
        .summary-card .value.green{color:#34d399}
        .alert{max-width:1100px;margin:1.5rem auto 0;padding:0 2.5rem}
        .alert-success{background:rgba(56,239,125,0.1);border:1px solid rgba(56,239,125,0.25);border-radius:10px;padding:0.8rem 1.2rem;color:#6ee7b7;font-size:0.9rem}
        .alert-error{background:rgba(248,113,113,0.1);border:1px solid rgba(248,113,113,0.25);border-radius:10px;padding:0.8rem 1.2rem;color:#fca5a5;font-size:0.9rem}
        .table-wrap{max-width:1100px;margin:1.5rem auto 4rem;padding:0 2.5rem}
        .table-card{background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:18px;overflow:hidden}
        .stats-bar{padding:1rem 1.5rem;border-bottom:1px solid rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:space-between}
        .stats-bar span{font-size:0.82rem;color:rgba(255,255,255,0.35)}
        .badge-count{background:rgba(240,147,251,0.15);border:1px solid rgba(240,147,251,0.3);color:#f0abfc;padding:0.2rem 0.7rem;border-radius:20px;font-size:0.78rem;font-weight:600}
        table{width:100%;border-collapse:collapse}
        thead th{padding:0.9rem 1.5rem;text-align:left;font-size:0.75rem;font-weight:600;color:rgba(255,255,255,0.35);text-transform:uppercase;letter-spacing:0.06em;background:rgba(255,255,255,0.02);border-bottom:1px solid rgba(255,255,255,0.06)}
        tbody tr{border-bottom:1px solid rgba(255,255,255,0.04);transition:background 0.15s}
        tbody tr:last-child{border-bottom:none}
        tbody tr:hover{background:rgba(255,255,255,0.03)}
        tbody td{padding:1rem 1.5rem;font-size:0.9rem;color:rgba(255,255,255,0.75);vertical-align:middle}
        tbody td.primary{color:#fff;font-weight:600}
        .pill{display:inline-block;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.78rem;font-weight:500;background:rgba(240,147,251,0.12);border:1px solid rgba(240,147,251,0.25);color:#f0abfc}
        .price-tag{color:#34d399;font-weight:700;font-size:1rem}
        .date-tag{color:rgba(255,255,255,0.5);font-size:0.85rem}
        .client-tag{display:inline-flex;align-items:center;gap:0.4rem;padding:0.2rem 0.7rem;border-radius:6px;background:rgba(255,255,255,0.06);font-size:0.82rem}
        .btn-edit{display:inline-flex;align-items:center;gap:0.3rem;padding:0.35rem 0.75rem;background:rgba(240,147,251,0.15);border:1px solid rgba(240,147,251,0.3);border-radius:7px;color:#f0abfc;text-decoration:none;font-size:0.78rem;font-weight:600;transition:all 0.15s}
        .btn-edit:hover{background:rgba(240,147,251,0.3);transform:translateY(-1px)}
        .btn-del{display:inline-flex;align-items:center;gap:0.3rem;padding:0.35rem 0.75rem;background:rgba(248,113,113,0.12);border:1px solid rgba(248,113,113,0.25);border-radius:7px;color:#f87171;font-size:0.78rem;font-weight:600;cursor:pointer;font-family:'Inter',sans-serif;transition:all 0.15s}
        .btn-del:hover{background:rgba(248,113,113,0.25);transform:translateY(-1px)}
        .actions{display:flex;gap:0.4rem;align-items:center}
        .empty{padding:4rem 2rem;text-align:center}
        .empty-icon{font-size:3rem;margin-bottom:1rem;opacity:0.4}
        .empty p{color:rgba(255,255,255,0.3);font-size:0.95rem}
    </style>
</head>
<body>
<div class="bg-orbs"><div class="orb orb-1"></div><div class="orb orb-2"></div></div>
<div class="wrapper">
    <header>
        <a href="{{ url('/') }}" class="logo"><div class="logo-icon">🚗</div><span class="logo-text">CARSINFINITY</span></a>
        <a href="{{ url('/') }}" class="back-btn">← Menú principal</a>
    </header>
    <div class="page-header">
        <div class="page-title">
            <div class="page-icon">💰</div>
            <div><h1>Ventas</h1><p>Historial completo de ventas realizadas</p></div>
        </div>
        <a href="{{ route('venta.create') }}" class="new-btn">+ Nueva Venta</a>
    </div>

    <div class="summary-row">
        <div class="summary-card">
            <div class="label">Total ventas</div>
            <div class="value">{{ $ventas->count() }}</div>
        </div>
        <div class="summary-card">
            <div class="label">Ingresos totales</div>
            <div class="value green">${{ number_format($ventas->sum('total'), 2) }}</div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert"><div class="alert-success">✓ {{ session('success') }}</div></div>
    @endif
    @if(session('error'))
    <div class="alert"><div class="alert-error">✕ {{ session('error') }}</div></div>
    @endif
    <div class="table-wrap">
        <div class="table-card">
            <div class="stats-bar">
                <span>Resultados encontrados</span>
                <span class="badge-count">{{ $ventas->count() }} ventas</span>
            </div>
            @if($ventas->isEmpty())
            <div class="empty"><div class="empty-icon">💰</div><p>No hay ventas registradas aún.</p></div>
            @else
            <table>
                <thead><tr><th>#</th><th>Vehículo</th><th>Cliente</th><th>Fecha</th><th>Total</th><th>Acciones</th></tr></thead>
                <tbody>
                    @foreach($ventas as $v)
                    <tr>
                        <td><span class="pill">{{ $v->id }}</span></td>
                        <td class="primary">{{ $v->vehiculo->modelo->nombre ?? '—' }} <small style="color:rgba(255,255,255,0.4);font-weight:400">{{ $v->vehiculo->color ?? '' }}</small></td>
                        <td><span class="client-tag">👤 {{ $v->cliente->nombre ?? '—' }}</span></td>
                        <td><span class="date-tag">{{ $v->fecha ? \Carbon\Carbon::parse($v->fecha)->format('d/m/Y') : '—' }}</span></td>
                        <td><span class="price-tag">${{ number_format($v->total, 2) }}</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('venta.edit', $v->id) }}" class="btn-edit">✏ Editar</a>
                                <form action="{{ route('venta.destroy', $v->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta venta?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-del">🗑 Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
</body>
</html>

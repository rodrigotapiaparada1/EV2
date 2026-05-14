<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta — CARSINFINITY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:linear-gradient(135deg,#134e5e,#71b280);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem}
        .card{background:rgba(0,0,0,0.3);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:2.5rem;width:100%;max-width:540px;box-shadow:0 25px 50px rgba(0,0,0,0.4)}
        .card-header{display:flex;align-items:center;gap:1rem;margin-bottom:2rem}
        .icon-wrap{width:50px;height:50px;background:linear-gradient(135deg,#f093fb,#f5576c);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0}
        h1{font-size:1.5rem;font-weight:700;color:#fff}
        h1 span{display:block;font-size:0.85rem;color:rgba(255,255,255,0.5);margin-top:2px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
        .form-group{margin-bottom:1.4rem}
        label{display:block;font-size:0.85rem;font-weight:500;color:rgba(255,255,255,0.7);margin-bottom:0.5rem}
        .req{color:#f87171}
        input,select{width:100%;padding:0.75rem 1rem;background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:10px;color:#fff;font-size:0.95rem;font-family:'Inter',sans-serif;outline:none;transition:all 0.2s}
        input[type="date"]::-webkit-calendar-picker-indicator{filter:invert(1);opacity:0.6}
        input:focus,select:focus{border-color:#f093fb;background:rgba(240,147,251,0.1);box-shadow:0 0 0 3px rgba(240,147,251,0.2)}
        select option{background:#134e5e;color:#fff}
        .error-msg{background:rgba(248,113,113,0.15);border:1px solid rgba(248,113,113,0.3);border-radius:10px;padding:0.75rem 1rem;margin-bottom:1.5rem}
        .error-msg ul{list-style:none}
        .error-msg li{color:#fca5a5;font-size:0.85rem}
        .error-msg li::before{content:'⚠ '}
        .btn-group{display:flex;gap:0.75rem;margin-top:2rem}
        .btn{flex:1;padding:0.85rem;border-radius:10px;font-size:0.95rem;font-weight:600;font-family:'Inter',sans-serif;cursor:pointer;border:none;transition:transform 0.15s;text-decoration:none;text-align:center;display:flex;align-items:center;justify-content:center;gap:0.4rem}
        .btn:hover{transform:translateY(-2px)}
        .btn-primary{background:linear-gradient(135deg,#f093fb,#f5576c);color:#fff}
        .btn-secondary{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.8)}
        .edit-badge{background:rgba(251,191,36,0.15);border:1px solid rgba(251,191,36,0.3);color:#fbbf24;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.75rem;font-weight:600}
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="icon-wrap">💰</div>
        <h1>Editar Venta <span>Registro <span class="edit-badge">#{{ $venta->id }}</span></span></h1>
    </div>
    @if($errors->any())
    <div class="error-msg"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('venta.update', $venta->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Vehículo <span class="req">*</span></label>
            <select name="vehiculo_id" required>
                <option value="">-- Seleccionar --</option>
                @foreach($vehiculos as $v)
                    <option value="{{ $v->id }}" {{ old('vehiculo_id',$venta->vehiculo_id)==$v->id?'selected':'' }}>{{ $v->modelo->nombre ?? '#'.$v->id }} — {{ $v->color }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Cliente <span class="req">*</span></label>
            <select name="cliente_id" required>
                <option value="">-- Seleccionar --</option>
                @foreach($clientes as $c)
                    <option value="{{ $c->id }}" {{ old('cliente_id',$venta->cliente_id)==$c->id?'selected':'' }}>{{ $c->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Fecha <span class="req">*</span></label>
                <input type="date" name="fecha" value="{{ old('fecha', $venta->fecha) }}" required>
            </div>
            <div class="form-group">
                <label>Total (USD) <span class="req">*</span></label>
                <input type="number" name="total" value="{{ old('total', $venta->total) }}" min="0" step="0.01" required>
            </div>
        </div>
        <div class="btn-group">
            <a href="{{ route('venta.index') }}" class="btn btn-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">✓ Guardar Cambios</button>
        </div>
    </form>
</div>
</body>
</html>

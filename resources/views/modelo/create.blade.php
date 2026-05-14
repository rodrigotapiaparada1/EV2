<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Modelo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem}
        .card{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:2.5rem;width:100%;max-width:520px;box-shadow:0 25px 50px rgba(0,0,0,0.4)}
        .card-header{display:flex;align-items:center;gap:1rem;margin-bottom:2rem}
        .icon-wrap{width:50px;height:50px;background:linear-gradient(135deg,#f7971e,#ffd200);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0}
        h1{font-size:1.5rem;font-weight:700;color:#fff}
        h1 span{display:block;font-size:0.85rem;font-weight:400;color:rgba(255,255,255,0.5);margin-top:2px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
        .form-group{margin-bottom:1.4rem}
        label{display:block;font-size:0.85rem;font-weight:500;color:rgba(255,255,255,0.7);margin-bottom:0.5rem}
        .req{color:#f87171;margin-left:2px}
        input,select{width:100%;padding:0.75rem 1rem;background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.15);border-radius:10px;color:#fff;font-size:0.95rem;font-family:'Inter',sans-serif;transition:all 0.2s;outline:none}
        input::placeholder{color:rgba(255,255,255,0.3)}
        input:focus,select:focus{border-color:#f7971e;background:rgba(247,151,30,0.1);box-shadow:0 0 0 3px rgba(247,151,30,0.2)}
        select option{background:#302b63;color:#fff}
        .error-msg{background:rgba(248,113,113,0.15);border:1px solid rgba(248,113,113,0.3);border-radius:10px;padding:0.75rem 1rem;margin-bottom:1.5rem}
        .error-msg ul{list-style:none}
        .error-msg li{color:#fca5a5;font-size:0.85rem;padding:2px 0}
        .error-msg li::before{content:'⚠ '}
        .btn-group{display:flex;gap:0.75rem;margin-top:2rem}
        .btn{flex:1;padding:0.85rem;border-radius:10px;font-size:0.95rem;font-weight:600;font-family:'Inter',sans-serif;cursor:pointer;border:none;transition:transform 0.15s,box-shadow 0.15s;text-decoration:none;text-align:center;display:flex;align-items:center;justify-content:center;gap:0.4rem}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,0.3)}
        .btn-primary{background:linear-gradient(135deg,#f7971e,#ffd200);color:#1a1a2e}
        .btn-secondary{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.8)}
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="icon-wrap">🚗</div>
        <h1>Nuevo Modelo <span>Completa todos los campos</span></h1>
    </div>
    @if($errors->any())
    <div class="error-msg"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('modelo.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Modelo <span class="req">*</span></label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Corolla" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="marca_id">Marca <span class="req">*</span></label>
                <select id="marca_id" name="marca_id" required>
                    <option value="">-- Seleccionar --</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id')==$marca->id?'selected':'' }}>{{ $marca->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="anio">Año <span class="req">*</span></label>
                <input type="number" id="anio" name="anio" value="{{ old('anio') }}" placeholder="2024" min="1900" max="2099" required>
            </div>
        </div>
        <div class="btn-group">
            <a href="{{ route('modelo.index') }}" class="btn btn-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">✓ Guardar Modelo</button>
        </div>
    </form>
</div>
</body>
</html>

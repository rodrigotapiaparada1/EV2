<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca — CARSINFINITY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:linear-gradient(135deg,#0f0c29,#302b63,#24243e);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem}
        .card{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:2.5rem;width:100%;max-width:520px;box-shadow:0 25px 50px rgba(0,0,0,0.4)}
        .card-header{display:flex;align-items:center;gap:1rem;margin-bottom:2rem}
        .icon-wrap{width:50px;height:50px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0}
        h1{font-size:1.5rem;font-weight:700;color:#fff}
        h1 span{display:block;font-size:0.85rem;font-weight:400;color:rgba(255,255,255,0.5);margin-top:2px}
        .form-group{margin-bottom:1.4rem}
        label{display:block;font-size:0.85rem;font-weight:500;color:rgba(255,255,255,0.7);margin-bottom:0.5rem}
        .req{color:#f87171;margin-left:2px}
        input,select,textarea{width:100%;padding:0.75rem 1rem;background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.15);border-radius:10px;color:#fff;font-size:0.95rem;font-family:'Inter',sans-serif;transition:all 0.2s;outline:none}
        input::placeholder,textarea::placeholder{color:rgba(255,255,255,0.3)}
        input:focus,textarea:focus{border-color:#667eea;background:rgba(102,126,234,0.1);box-shadow:0 0 0 3px rgba(102,126,234,0.2)}
        textarea{resize:vertical;min-height:100px}
        .error-msg{background:rgba(248,113,113,0.15);border:1px solid rgba(248,113,113,0.3);border-radius:10px;padding:0.75rem 1rem;margin-bottom:1.5rem}
        .error-msg ul{list-style:none}
        .error-msg li{color:#fca5a5;font-size:0.85rem;padding:2px 0}
        .error-msg li::before{content:'⚠ '}
        .btn-group{display:flex;gap:0.75rem;margin-top:2rem}
        .btn{flex:1;padding:0.85rem;border-radius:10px;font-size:0.95rem;font-weight:600;font-family:'Inter',sans-serif;cursor:pointer;border:none;transition:transform 0.15s,box-shadow 0.15s;text-decoration:none;text-align:center;display:flex;align-items:center;justify-content:center;gap:0.4rem}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,0.3)}
        .btn-primary{background:linear-gradient(135deg,#667eea,#764ba2);color:#fff}
        .btn-secondary{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.8)}
        .edit-badge{display:inline-block;background:rgba(251,191,36,0.15);border:1px solid rgba(251,191,36,0.3);color:#fbbf24;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.75rem;font-weight:600;margin-left:0.5rem}
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="icon-wrap">🏷️</div>
        <h1>Editar Marca <span>Modifica los datos del registro <span class="edit-badge">#{{ $marca->id }}</span></span></h1>
    </div>
    @if($errors->any())
    <div class="error-msg"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('marca.update', $marca->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre de la Marca <span class="req">*</span></label>
            <input type="text" name="nombre" value="{{ old('nombre', $marca->nombre) }}" required>
        </div>
        <div class="form-group">
            <label>País de Origen <span class="req">*</span></label>
            <input type="text" name="pais" value="{{ old('pais', $marca->pais) }}" required>
        </div>
        <div class="form-group">
            <label>Descripción <span class="req">*</span></label>
            <textarea name="descripcion" required>{{ old('descripcion', $marca->descripcion) }}</textarea>
        </div>
        <div class="btn-group">
            <a href="{{ route('marca.index') }}" class="btn btn-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">✓ Guardar Cambios</button>
        </div>
    </form>
</div>
</body>
</html>

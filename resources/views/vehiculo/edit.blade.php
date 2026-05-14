<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo — CARSINFINITY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem}
        .card{background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:2.5rem;width:100%;max-width:540px;box-shadow:0 25px 50px rgba(0,0,0,0.4)}
        .card-header{display:flex;align-items:center;gap:1rem;margin-bottom:2rem}
        .icon-wrap{width:50px;height:50px;background:linear-gradient(135deg,#4facfe,#00f2fe);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0}
        h1{font-size:1.5rem;font-weight:700;color:#fff}
        h1 span{display:block;font-size:0.85rem;font-weight:400;color:rgba(255,255,255,0.5);margin-top:2px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
        .form-group{margin-bottom:1.4rem}
        label{display:block;font-size:0.85rem;font-weight:500;color:rgba(255,255,255,0.7);margin-bottom:0.5rem}
        .req{color:#f87171;margin-left:2px}
        input,select{width:100%;padding:0.75rem 1rem;background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.15);border-radius:10px;color:#fff;font-size:0.95rem;font-family:'Inter',sans-serif;transition:all 0.2s;outline:none}
        input::placeholder{color:rgba(255,255,255,0.3)}
        input:focus,select:focus{border-color:#4facfe;background:rgba(79,172,254,0.1);box-shadow:0 0 0 3px rgba(79,172,254,0.2)}
        select option{background:#16213e;color:#fff}
        .error-msg{background:rgba(248,113,113,0.15);border:1px solid rgba(248,113,113,0.3);border-radius:10px;padding:0.75rem 1rem;margin-bottom:1.5rem}
        .error-msg ul{list-style:none}
        .error-msg li{color:#fca5a5;font-size:0.85rem;padding:2px 0}
        .error-msg li::before{content:'⚠ '}
        .btn-group{display:flex;gap:0.75rem;margin-top:2rem}
        .btn{flex:1;padding:0.85rem;border-radius:10px;font-size:0.95rem;font-weight:600;font-family:'Inter',sans-serif;cursor:pointer;border:none;transition:transform 0.15s,box-shadow 0.15s;text-decoration:none;text-align:center;display:flex;align-items:center;justify-content:center;gap:0.4rem}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,0.3)}
        .btn-primary{background:linear-gradient(135deg,#4facfe,#00f2fe);color:#0f3460}
        .btn-secondary{background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.8)}
        .edit-badge{display:inline-block;background:rgba(251,191,36,0.15);border:1px solid rgba(251,191,36,0.3);color:#fbbf24;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.75rem;font-weight:600;margin-left:0.5rem}
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="icon-wrap">🚙</div>
        <h1>Editar Vehículo <span>Modifica los datos del registro <span class="edit-badge">#{{ $vehiculo->id }}</span></span></h1>
    </div>
    @if($errors->any())
    <div class="error-msg"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('vehiculo.update', $vehiculo->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Modelo <span class="req">*</span></label>
            <select name="modelo_id" required>
                <option value="">-- Seleccionar Modelo --</option>
                @foreach($modelos as $m)
                    <option value="{{ $m->id }}" {{ old('modelo_id',$vehiculo->modelo_id)==$m->id?'selected':'' }}>{{ $m->nombre }} ({{ $m->marca->nombre ?? '' }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Color <span class="req">*</span></label>
                <input type="text" name="color" value="{{ old('color', $vehiculo->color) }}" placeholder="Ej: Rojo" required>
            </div>
            <div class="form-group">
                <label>Stock <span class="req">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', $vehiculo->stock) }}" min="0" max="99999" required>
            </div>
        </div>
        <div class="form-group">
            <label>Precio (USD) <span class="req">*</span></label>
            <input type="number" name="precio" id="precio" value="{{ old('precio', $vehiculo->precio) }}" min="0" max="9999999.99" step="0.01" required>
            <span style="font-size:0.75rem;color:rgba(255,255,255,0.3);margin-top:0.35rem;display:block;">Máximo: $9,999,999.99</span>
        </div>
        <div class="btn-group">
            <a href="{{ route('vehiculo.index') }}" class="btn btn-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">✓ Guardar Cambios</button>
        </div>
    </form>
</div>
<script>
    document.getElementById('precio').addEventListener('input', function() {
        if (parseFloat(this.value) > 9999999.99) {
            this.setCustomValidity('El precio no puede superar $9,999,999.99');
        } else if (parseFloat(this.value) < 0) {
            this.setCustomValidity('El precio no puede ser negativo.');
        } else {
            this.setCustomValidity('');
        }
    });
    document.querySelectorAll('input[name="stock"]').forEach(function(el) {
        el.id = el.id || 'stock';
        el.addEventListener('input', function() {
            if (parseInt(this.value) > 99999) {
                this.setCustomValidity('El stock no puede superar 99,999 unidades.');
            } else if (parseInt(this.value) < 0) {
                this.setCustomValidity('El stock no puede ser negativo.');
            } else {
                this.setCustomValidity('');
            }
        });
    });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 520px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }

        .card-header { display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; }

        .icon-wrap {
            width: 50px; height: 50px;
            background: linear-gradient(135deg, #11998e, #38ef7d);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; flex-shrink: 0;
        }

        h1 { font-size: 1.5rem; font-weight: 700; color: #fff; }
        h1 span { display: block; font-size: 0.85rem; font-weight: 400; color: rgba(255,255,255,0.5); margin-top: 2px; }

        .form-group { margin-bottom: 1.4rem; }

        label { display: block; font-size: 0.85rem; font-weight: 500; color: rgba(255,255,255,0.7); margin-bottom: 0.5rem; }
        label .required { color: #f87171; margin-left: 2px; }

        input, select, textarea {
            width: 100%; padding: 0.75rem 1rem;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px; color: #fff;
            font-size: 0.95rem; font-family: 'Inter', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        input::placeholder { color: rgba(255,255,255,0.3); }

        input:focus, select:focus {
            border-color: #11998e;
            background: rgba(17,153,142,0.1);
            box-shadow: 0 0 0 3px rgba(17,153,142,0.2);
        }

        .error-msg {
            background: rgba(248,113,113,0.15);
            border: 1px solid rgba(248,113,113,0.3);
            border-radius: 10px; padding: 0.75rem 1rem; margin-bottom: 1.5rem;
        }
        .error-msg ul { list-style: none; }
        .error-msg li { color: #fca5a5; font-size: 0.85rem; padding: 2px 0; }
        .error-msg li::before { content: '⚠ '; }

        .btn-group { display: flex; gap: 0.75rem; margin-top: 2rem; }

        .btn {
            flex: 1; padding: 0.85rem; border-radius: 10px;
            font-size: 0.95rem; font-weight: 600; font-family: 'Inter', sans-serif;
            cursor: pointer; border: none;
            transition: transform 0.15s, box-shadow 0.15s;
            text-decoration: none; text-align: center;
            display: flex; align-items: center; justify-content: center; gap: 0.4rem;
        }

        .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.3); }
        .btn:active { transform: translateY(0); }
        .btn-primary { background: linear-gradient(135deg, #11998e, #38ef7d); color: #fff; }
        .btn-secondary { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); color: rgba(255,255,255,0.8); }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="icon-wrap">👤</div>
        <h1>Nuevo Cliente <span>Completa todos los campos</span></h1>
    </div>

    @if($errors->any())
    <div class="error-msg">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre Completo <span class="required">*</span></label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Juan Pérez" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico <span class="required">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ej: juan@email.com" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono <span class="required">*</span></label>
            <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="Ej: +1 555 0000" required>
        </div>
        <div class="btn-group">
            <a href="{{ route('cliente.index') }}" class="btn btn-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">✓ Guardar Cliente</button>
        </div>
    </form>
</div>
</body>
</html>

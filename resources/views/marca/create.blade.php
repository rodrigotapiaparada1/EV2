<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Marca</title>
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

        .card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .icon-wrap {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
        }

        h1 span {
            display: block;
            font-size: 0.85rem;
            font-weight: 400;
            color: rgba(255,255,255,0.5);
            margin-top: 2px;
        }

        .form-group {
            margin-bottom: 1.4rem;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255,255,255,0.7);
            margin-bottom: 0.5rem;
        }

        label .required {
            color: #f87171;
            margin-left: 2px;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            color: #fff;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        input::placeholder, textarea::placeholder {
            color: rgba(255,255,255,0.3);
        }

        input:focus, select:focus, textarea:focus {
            border-color: #667eea;
            background: rgba(102,126,234,0.1);
            box-shadow: 0 0 0 3px rgba(102,126,234,0.2);
        }

        textarea { resize: vertical; min-height: 100px; }

        select option { background: #302b63; color: #fff; }

        .error-msg {
            background: rgba(248,113,113,0.15);
            border: 1px solid rgba(248,113,113,0.3);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
        }

        .error-msg ul { list-style: none; }
        .error-msg li { color: #fca5a5; font-size: 0.85rem; padding: 2px 0; }
        .error-msg li::before { content: '⚠ '; }

        .btn-group {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 0.85rem;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border: none;
            transition: transform 0.15s, box-shadow 0.15s;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.3); }
        .btn:active { transform: translateY(0); }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
        }

        .btn-secondary {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="icon-wrap">🏷️</div>
        <h1>Nueva Marca <span>Completa todos los campos</span></h1>
    </div>

    @if($errors->any())
    <div class="error-msg">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('marca.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la Marca <span class="required">*</span></label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Toyota" required>
        </div>
        <div class="form-group">
            <label for="pais">País de Origen <span class="required">*</span></label>
            <input type="text" id="pais" name="pais" value="{{ old('pais') }}" placeholder="Ej: Japón" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción <span class="required">*</span></label>
            <textarea id="descripcion" name="descripcion" placeholder="Breve descripción de la marca..." required>{{ old('descripcion') }}</textarea>
        </div>
        <div class="btn-group">
            <a href="{{ route('marca.index') }}" class="btn btn-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">✓ Guardar Marca</button>
        </div>
    </form>
</div>
</body>
</html>

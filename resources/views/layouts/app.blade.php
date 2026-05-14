<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARSINFINITY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-500">CARSINFINITY</h1>
            <nav class="space-x-4">
                <a href="#" class="text-white hover:text-blue-500">Crear Marca</a>
                <a href="#" class="text-white hover:text-blue-500">Ver Marcas</a>
                <a href="#" class="text-white hover:text-blue-500">Crear Modelo</a>
                <a href="#" class="text-white hover:text-blue-500">Ver Modelos</a>
                <a href="#" class="text-white hover:text-blue-500">Crear Vehículo</a>
                <a href="#" class="text-white hover:text-blue-500">Ver Vehículos</a>
                <a href="#" class="text-white hover:text-blue-500">Crear Venta</a>
                <a href="#" class="text-white hover:text-blue-500">Ver Ventas</a>
                <a href="#" class="text-white hover:text-blue-500">Crear Cliente</a>
                <a href="#" class="text-white hover:text-blue-500">Ver Clientes</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARSINFINITY Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        .navbar {
            background-color: #2d3748;
        }
        .navbar a {
            color: #63b3ed;
        }
        .card {
            background-color: #2d3748;
            border: 1px solid #4a5568;
        }
        .card:hover {
            border-color: #63b3ed;
        }
    </style>
</head>
<body>
    <nav class="navbar flex justify-between items-center p-4">
        <div class="text-2xl font-bold text-blue-400">CARSINFINITY</div>
        <div class="flex space-x-4">
            <a href="#" class="btn">Crear Marca</a>
            <a href="#" class="btn">Ver Marcas</a>
            <a href="#" class="btn">Crear Modelo</a>
            <a href="#" class="btn">Ver Modelos</a>
            <a href="#" class="btn">Crear Vehículo</a>
            <a href="#" class="btn">Ver Vehículos</a>
            <a href="#" class="btn">Crear Venta</a>
            <a href="#" class="btn">Ver Ventas</a>
            <a href="#" class="btn">Crear Cliente</a>
            <a href="#" class="btn">Ver Clientes</a>
        </div>
    </nav>

    <main class="p-6">
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="card p-4 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold">Total Vehículos</h3>
                <p class="text-3xl font-bold">120</p>
            </div>
            <div class="card p-4 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold">Ventas Realizadas</h3>
                <p class="text-3xl font-bold">45</p>
            </div>
            <div class="card p-4 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold">Clientes Registrados</h3>
                <p class="text-3xl font-bold">30</p>
            </div>
            <div class="card p-4 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold">Marcas Disponibles</h3>
                <p class="text-3xl font-bold">10</p>
            </div>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Vehículos Recientes</h2>
            <table class="table-auto w-full text-left">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="p-2">#</th>
                        <th class="p-2">Modelo</th>
                        <th class="p-2">Marca</th>
                        <th class="p-2">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-600">
                        <td class="p-2">1</td>
                        <td class="p-2">Modelo X</td>
                        <td class="p-2">Marca Y</td>
                        <td class="p-2">$20,000</td>
                    </tr>
                    <tr class="hover:bg-gray-600">
                        <td class="p-2">2</td>
                        <td class="p-2">Modelo Z</td>
                        <td class="p-2">Marca W</td>
                        <td class="p-2">$25,000</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">Autos Destacados</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Modelo A</h3>
                    <p>Marca B</p>
                    <p class="text-blue-400">$30,000</p>
                </div>
                <div class="card p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Modelo C</h3>
                    <p>Marca D</p>
                    <p class="text-blue-400">$35,000</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

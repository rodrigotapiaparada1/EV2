@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-blue-500">Total Vehículos</h2>
        <p class="text-3xl font-semibold">120</p>
    </div>
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-blue-500">Ventas Realizadas</h2>
        <p class="text-3xl font-semibold">45</p>
    </div>
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-blue-500">Clientes Registrados</h2>
        <p class="text-3xl font-semibold">30</p>
    </div>
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-blue-500">Marcas Disponibles</h2>
        <p class="text-3xl font-semibold">10</p>
    </div>
</div>

<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-8">
    <h2 class="text-2xl font-bold text-blue-500 mb-4">Vehículos Recientes</h2>
    <table class="w-full text-left">
        <thead>
            <tr class="text-blue-500">
                <th class="py-2">#</th>
                <th class="py-2">Modelo</th>
                <th class="py-2">Marca</th>
                <th class="py-2">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-700">
                <td class="py-2">1</td>
                <td class="py-2">Model S</td>
                <td class="py-2">Tesla</td>
                <td class="py-2">$80,000</td>
            </tr>
            <tr class="border-b border-gray-700">
                <td class="py-2">2</td>
                <td class="py-2">Mustang</td>
                <td class="py-2">Ford</td>
                <td class="py-2">$55,000</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
        <img src="https://via.placeholder.com/300" alt="Car" class="rounded-lg mb-4">
        <h3 class="text-xl font-bold text-blue-500">Tesla Model S</h3>
        <p class="text-gray-400">$80,000</p>
    </div>
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
        <img src="https://via.placeholder.com/300" alt="Car" class="rounded-lg mb-4">
        <h3 class="text-xl font-bold text-blue-500">Ford Mustang</h3>
        <p class="text-gray-400">$55,000</p>
    </div>
</div>
@endsection

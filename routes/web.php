<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Vehiculo;
use App\Models\Venta;
use App\Models\Cliente;

// Menú principal con conteos para el dashboard
Route::get('/', function () {
    return view('menu', [
        'totalMarcas'    => Marca::count(),
        'totalModelos'   => Modelo::count(),
        'totalVehiculos' => Vehiculo::count(),
        'totalVentas'    => Venta::count(),
        'totalClientes'  => Cliente::count(),
    ]);
});

// CRUD completo sin 'show' (no tenemos vistas de detalle)
Route::resource('marca',    MarcaController::class)->except(['show']);
Route::resource('modelo',   ModeloController::class)->except(['show']);
Route::resource('vehiculo', VehiculoController::class)->except(['show']);
Route::resource('venta',    VentaController::class)->except(['show']);
Route::resource('cliente',  ClienteController::class)->except(['show']);

<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Modelo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('modelo.marca')->orderBy('id', 'desc')->get();
        return view('vehiculo.index', compact('vehiculos'));
    }

    public function create()
    {
        $modelos = Modelo::with('marca')->orderBy('nombre')->get();
        return view('vehiculo.create', compact('modelos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo_id' => 'required|exists:modelos,id',
            'color'     => 'required|string|max:100',
            'precio'    => 'required|numeric|min:0|max:9999999.99',
            'stock'     => 'required|integer|min:0|max:99999',
        ]);
        Vehiculo::create($request->only(['modelo_id', 'color', 'precio', 'stock']));
        return redirect()->route('vehiculo.index')->with('success', 'Vehículo creado exitosamente.');
    }

    public function edit(Vehiculo $vehiculo)
    {
        $modelos = Modelo::with('marca')->orderBy('nombre')->get();
        return view('vehiculo.edit', compact('vehiculo', 'modelos'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'modelo_id' => 'required|exists:modelos,id',
            'color'     => 'required|string|max:100',
            'precio'    => 'required|numeric|min:0|max:9999999.99',
            'stock'     => 'required|integer|min:0|max:99999',
        ]);
        $vehiculo->update($request->only(['modelo_id', 'color', 'precio', 'stock']));
        return redirect()->route('vehiculo.index')->with('success', 'Vehículo actualizado exitosamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        try {
            $vehiculo->delete();
            return redirect()->route('vehiculo.index')->with('success', 'Vehículo eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('vehiculo.index')->with('error', 'No se puede eliminar el vehículo porque tiene ventas asociadas.');
        }
    }
}
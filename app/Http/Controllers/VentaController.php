<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['vehiculo.modelo', 'cliente'])->orderBy('fecha', 'desc')->get();
        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::with('modelo')->orderBy('id', 'desc')->get();
        $clientes  = Cliente::orderBy('nombre')->get();
        return view('venta.create', compact('vehiculos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'cliente_id'  => 'required|exists:clientes,id',
            'fecha'       => 'required|date',
            'total'       => 'required|numeric|min:0',
        ]);
        Venta::create($request->only(['vehiculo_id', 'cliente_id', 'fecha', 'total']));
        return redirect()->route('venta.index')->with('success', 'Venta registrada exitosamente.');
    }

    public function edit(Venta $venta)
    {
        $vehiculos = Vehiculo::with('modelo')->orderBy('id', 'desc')->get();
        $clientes  = Cliente::orderBy('nombre')->get();
        return view('venta.edit', compact('venta', 'vehiculos', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'cliente_id'  => 'required|exists:clientes,id',
            'fecha'       => 'required|date',
            'total'       => 'required|numeric|min:0',
        ]);
        $venta->update($request->only(['vehiculo_id', 'cliente_id', 'fecha', 'total']));
        return redirect()->route('venta.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        try {
            $venta->delete();
            return redirect()->route('venta.index')->with('success', 'Venta eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('venta.index')->with('error', 'No se pudo eliminar la venta.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::with('marca')->orderBy('nombre')->get();
        return view('modelo.index', compact('modelos'));
    }

    public function create()
    {
        $marcas = Marca::orderBy('nombre')->get();
        return view('modelo.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
            'anio'     => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
        ]);
        Modelo::create($request->only(['nombre', 'marca_id', 'anio']));
        return redirect()->route('modelo.index')->with('success', 'Modelo creado exitosamente.');
    }

    public function edit(Modelo $modelo)
    {
        $marcas = Marca::orderBy('nombre')->get();
        return view('modelo.edit', compact('modelo', 'marcas'));
    }

    public function update(Request $request, Modelo $modelo)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'marca_id' => 'required|exists:marcas,id',
            'anio'     => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
        ]);
        $modelo->update($request->only(['nombre', 'marca_id', 'anio']));
        return redirect()->route('modelo.index')->with('success', 'Modelo actualizado exitosamente.');
    }

    public function destroy(Modelo $modelo)
    {
        try {
            $modelo->delete();
            return redirect()->route('modelo.index')->with('success', 'Modelo eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('modelo.index')->with('error', 'No se puede eliminar el modelo porque tiene vehículos asociados.');
        }
    }
}
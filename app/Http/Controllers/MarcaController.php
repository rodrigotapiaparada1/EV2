<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderBy('nombre')->get();
        return view('marca.index', compact('marcas'));
    }

    public function create()
    {
        return view('marca.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'pais'        => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
        Marca::create($request->only(['nombre', 'pais', 'descripcion']));
        return redirect()->route('marca.index')->with('success', 'Marca creada exitosamente.');
    }

    public function edit(Marca $marca)
    {
        return view('marca.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'pais'        => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
        $marca->update($request->only(['nombre', 'pais', 'descripcion']));
        return redirect()->route('marca.index')->with('success', 'Marca actualizada exitosamente.');
    }

    public function destroy(Marca $marca)
    {
        try {
            $marca->delete();
            return redirect()->route('marca.index')->with('success', 'Marca eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('marca.index')->with('error', 'No se puede eliminar la marca porque tiene modelos o productos asociados.');
        }
    }
}

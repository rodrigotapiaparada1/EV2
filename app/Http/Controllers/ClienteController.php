<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:150',
            'email'    => 'required|email|max:150|unique:clientes,email',
            'telefono' => 'nullable|string|max:50',
        ]);
        Cliente::create($request->only(['nombre', 'email', 'telefono']));
        return redirect()->route('cliente.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre'   => 'required|string|max:150',
            'email'    => 'required|email|max:150|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:50',
        ]);
        $cliente->update($request->only(['nombre', 'email', 'telefono']));
        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return redirect()->route('cliente.index')->with('success', 'Cliente eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('cliente.index')->with('error', 'No se puede eliminar el cliente porque tiene ventas asociadas.');
        }
    }
}
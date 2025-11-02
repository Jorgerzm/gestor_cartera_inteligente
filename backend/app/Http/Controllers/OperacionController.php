<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacion;

class OperacionController extends Controller
{
    // Listar todas las operaciones
    public function index()
    {
        return Operacion::with('cliente')->get();
    }

    // Crear una nueva operación
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'estado' => 'nullable|string|max:255',
        ]);
        $operacion = Operacion::create($validated);
        return response()->json($operacion, 201);
    }

    // Mostrar una operación específica
    public function show($id)
    {
        $operacion = Operacion::with('cliente')->findOrFail($id);
        return $operacion;
    }

    // Actualizar una operación
    public function update(Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $validated = $request->validate([
            'cliente_id' => 'sometimes|required|exists:clientes,id',
            'tipo' => 'sometimes|required|string|max:255',
            'monto' => 'sometimes|required|numeric',
            'fecha' => 'sometimes|required|date',
            'estado' => 'nullable|string|max:255',
        ]);
        $operacion->update($validated);
        return response()->json($operacion);
    }

    // Eliminar una operación
    public function destroy($id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();
        return response()->json(['message' => 'Operación eliminada']);
    }
}

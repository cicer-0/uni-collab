<?php

namespace App\Http\Controllers;

use App\Models\Request as ProjectRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        // Listar todas las solicitudes
        $requests = ProjectRequest::all();
        return response()->json($requests);
    }

    public function show($id)
    {
        // Mostrar una solicitud por su ID
        $request = ProjectRequest::findOrFail($id);
        return response()->json($request);
    }

    public function store(Request $request)
    {
        // Validar los datos antes de crear una nueva solicitud
        $request->validate([
            'ProjectId' => 'required|exists:Projects,id',
            'UserId' => 'required|exists:Users,id',
            // Añade las reglas de validación para otros campos aquí
        ]);

        // Crear una nueva solicitud
        $request = ProjectRequest::create($request->all());
        return response()->json($request, 201);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos antes de actualizar una solicitud
        $request->validate([
            'ProjectId' => 'required|exists:Projects,id',
            'UserId' => 'required|exists:Users,id',
            // Añade las reglas de validación para otros campos aquí
        ]);

        // Actualizar una solicitud por su ID
        $request = ProjectRequest::findOrFail($id);
        $request->update($request->all());
        return response()->json($request, 200);
    }

    public function destroy($id)
    {
        // Eliminar una solicitud por su ID
        $request = ProjectRequest::findOrFail($id);
        $request->delete();
        return response()->json(null, 204);
    }
}

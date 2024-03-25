<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Listar todos los proyectos
        $projects = Project::all();
        return response()->json($projects);
    }

    public function show($id)
    {
        // Mostrar un proyecto por su ID
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    public function store(Request $request)
    {
        // Validar los datos antes de crear un nuevo proyecto
        $request->validate([
            'UserId' => 'required|exists:Users,id',
            // Añade las reglas de validación para otros campos aquí
        ]);

        // Crear un nuevo proyecto
        $project = Project::create($request->all());
        return response()->json($project, 201);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos antes de actualizar un proyecto
        $request->validate([
            'UserId' => 'required|exists:Users,id',
            // Añade las reglas de validación para otros campos aquí
        ]);

        // Actualizar un proyecto por su ID
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        // Eliminar un proyecto por su ID
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(null, 204);
    }
}

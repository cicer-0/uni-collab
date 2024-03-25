<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // Listar todos los roles
        $roles = Role::all();
        return response()->json($roles);
    }

    public function show($id)
    {
        // Mostrar un rol por su ID
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    public function store(Request $request)
    {
        // Crear un nuevo rol
        $role = Role::create($request->all());
        return response()->json($role, 201);
    }

    public function update(Request $request, $id)
    {
        // Actualizar un rol por su ID
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json($role, 200);
    }

    public function destroy($id)
    {
        // Eliminar un rol por su ID
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(null, 204);
    }
}

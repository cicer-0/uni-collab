<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        // Listar todos los registros UserRole
        $userRoles = UserRole::all();
        return response()->json($userRoles);
    }

    public function show($id)
    {
        // Mostrar un registro UserRole por su ID
        $userRole = UserRole::findOrFail($id);
        return response()->json($userRole);
    }

    public function store(Request $request)
    {
        // Validar los datos antes de crear un nuevo registro UserRole
        $request->validate([
            'UserId' => 'required|exists:Users,id',
            'RoleId' => 'required|exists:Roles,id',
        ]);

        // Crear un nuevo registro UserRole
        $userRole = UserRole::create($request->all());
        return response()->json($userRole, 201);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos antes de actualizar un registro UserRole
        $request->validate([
            'UserId' => 'required|exists:Users,id',
            'RoleId' => 'required|exists:Roles,id',
        ]);

        // Actualizar un registro UserRole por su ID
        $userRole = UserRole::findOrFail($id);
        $userRole->update($request->all());
        return response()->json($userRole, 200);
    }

    public function destroy($id)
    {
        // Eliminar un registro UserRole por su ID
        $userRole = UserRole::findOrFail($id);
        $userRole->delete();
        return response()->json(null, 204);
    }
}

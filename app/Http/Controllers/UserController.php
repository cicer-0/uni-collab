<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Listar todos los usuarios
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        // Mostrar un usuario por su ID
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        // Crear un nuevo usuario
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        // Actualizar un usuario por su ID
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        // Eliminar un usuario por su ID
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}

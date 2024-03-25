<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        // Listar todos los formularios
        $forms = Form::all();
        return response()->json($forms);
    }

    public function show($id)
    {
        // Mostrar un formulario por su ID
        $form = Form::findOrFail($id);
        return response()->json($form);
    }

    public function store(Request $request)
    {
        // Validar los datos antes de crear un nuevo formulario
        $request->validate([
            'ProjectId' => 'required|exists:Projects,id',
            // Añade las reglas de validación para otros campos aquí
        ]);

        // Crear un nuevo formulario
        $form = Form::create($request->all());
        return response()->json($form, 201);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos antes de actualizar un formulario
        $request->validate([
            'ProjectId' => 'required|exists:Projects,id',
            // Añade las reglas de validación para otros campos aquí
        ]);

        // Actualizar un formulario por su ID
        $form = Form::findOrFail($id);
        $form->update($request->all());
        return response()->json($form, 200);
    }

    public function destroy($id)
    {
        // Eliminar un formulario por su ID
        $form = Form::findOrFail($id);
        $form->delete();
        return response()->json(null, 204);
    }
}

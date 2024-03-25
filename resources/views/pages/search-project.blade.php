@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="mb-4">
            <h1 class="text-2xl font-semibold">Lista de Proyectos</h1>
            <input type="text" placeholder="Buscar proyectos..." class="px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($projects as $project)
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="px-6 py-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $project->ProjectName }}</h2>
                        <p class="text-gray-600 mb-4">Estado: {{ $project->Status }}</p>
                        <div class="flex justify-end">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded"
                                    onclick="openForm({{ $project->id }})">Unirme</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Formulario de Unirse al Proyecto -->
{{--        <div id="joinFormModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 hidden">--}}
{{--            <div class="w-full max-w-md m-auto bg-white rounded-lg shadow-lg p-6">--}}
{{--                <h2 class="text-xl font-semibold mb-4">Unirse al Proyecto</h2>--}}
{{--                <form action="{{ route('projects.join') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="project_id" id="project_id">--}}
{{--                    <div class="mb-4">--}}
{{--                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>--}}
{{--                        <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--                    </div>--}}
{{--                    <div class="mb-4">--}}
{{--                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>--}}
{{--                        <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--                    </div>--}}
{{--                    <div class="flex justify-end">--}}
{{--                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">Enviar Solicitud</button>--}}
{{--                        <button type="button" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded"--}}
{{--                                onclick="closeForm()">Cancelar</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <script>
        function openForm(projectId) {
            document.getElementById('project_id').value = projectId;
            // document.getElementById('joinFormModal').style.display = 'block';
        }

        function closeForm() {
            document.getElementById('joinFormModal').style.display = 'none';
        }
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 text-center">
                    Iniciar sesión
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="appearance-none rounded-none relative block w-full px-3 py-3 border
                               border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none
                               focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="Correo electrónico">
                    </div>
                    <div class="mt-4">
                        <label for="password" class="sr-only">Contraseña</label>
                        <input id="password" name="password" type="password" autocomplete="current-password"
                               required
                               class="appearance-none rounded-none relative block w-full px-3 py-3 border
                               border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none
                               focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="Contraseña">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Recordar sesión
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full py-3 px-4 border border-transparent text-sm font-medium rounded-md
                            text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2
                            focus:ring-offset-2 focus:ring-blue-500 mt-4">
                        Iniciar sesión
                    </button>
                </div>
            </form>
            <div class="text-sm text-center mt-4">
{{--                ¿No tienes una cuenta? <a href="{{ route('register') }}"--}}
{{--                                          class="font-medium text-blue-600 hover:text-blue-500">Crear una cuenta</a>--}}
            </div>
        </div>
    </div>
@endsection

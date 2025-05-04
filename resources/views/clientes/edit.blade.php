{{-- resources/views/clientes/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold text-white mb-6">Editar Cliente</h1>

    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" class="dark:bg-gray-800 shadow-md rounded-lg p-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div>
            <label for="nombre" class="block text-sm font-medium text-white">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $cliente->nombre) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        {{-- Apellido --}}
        <div>
            <label for="apellido" class="block text-sm font-medium text-white">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $cliente->apellido) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        {{-- Cédula --}}
        <div>
            <label for="cedula" class="block text-sm font-medium text-white">Cédula</label>
            <input type="text" name="cedula" id="cedula" value="{{ old('cedula', $cliente->cedula) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        {{-- Teléfono --}}
        <div>
            <label for="telefono" class="block text-sm font-medium text-white">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Dirección --}}
        <div>
            <label for="direccion" class="block text-sm font-medium text-white">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $cliente->direccion) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-white">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email', $cliente->email) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Botón de enviar --}}
        <div class="pt-4">
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Actualizar Cliente
            </button>
        </div>
    </form>
</div>
@endsection

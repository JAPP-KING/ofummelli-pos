<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Nueva Entrada Global') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-500 text-white rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- FORMULARIO DE ENTRADA GLOBAL -->
                <form method="POST" action="{{ route('inventarios.entrada.global.store') }}">
                    @csrf

                    <!-- SELECCIONAR PRODUCTO -->
                    <div class="mb-4">
                        <label class="block text-gray-800 dark:text-gray-200 mb-1">Producto:</label>
                        <select name="producto_id" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" required>
                            <option value="">-- Selecciona un producto --</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->codigo }} - {{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- CANTIDAD -->
                    <div class="mb-4">
                        <label class="block text-gray-800 dark:text-gray-200 mb-1">Cantidad a Ingresar:</label>
                        <input type="number" name="cantidad" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" required min="1">
                    </div>

                    <!-- BOTÓN GUARDAR -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Guardar Entrada
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

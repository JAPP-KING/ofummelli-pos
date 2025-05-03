<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Crear Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('productos.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-800 dark:text-gray-200">Código:</label>
                        <input type="text" name="codigo" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-800 dark:text-gray-200">Nombre:</label>
                        <input type="text" name="nombre" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-800 dark:text-gray-200">Unidad de Medida:</label>
                        <input type="text" name="unidad_medida" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-800 dark:text-gray-200">Precio de Venta:</label>
                        <input type="number" name="precio_venta" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" step="0.01" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

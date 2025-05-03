<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Registrar Nueva Entrada') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">
                    Producto: {{ $inventario->producto->nombre }}
                </h3>

                <form action="{{ route('inventarios.storeEntrada', $inventario) }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Cantidad a ingresar:</label>
                        <input type="number" name="cantidad" class="w-full border rounded px-4 py-2 dark:bg-gray-700 dark:text-white" required min="1">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Registrar Entrada
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

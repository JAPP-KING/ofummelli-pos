<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Editar Cuenta') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded p-6">
                <form action="{{ route('cuentas.update', $cuenta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Cliente -->
                    <div class="mb-4">
                        <label for="cliente_nombre" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Cliente
                        </label>
                        <input type="text" name="cliente_nombre" id="cliente_nombre"
                               value="{{ old('cliente_nombre', $cuenta->cliente_nombre) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Responsable -->
                    <div class="mb-4">
                        <label for="responsable_pedido" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Responsable del Pedido
                        </label>
                        <input type="text" name="responsable_pedido" id="responsable_pedido"
                               value="{{ old('responsable_pedido', $cuenta->responsable_pedido) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Estación -->
                    <div class="mb-4">
                        <label for="estacion" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Estación
                        </label>
                        <input type="text" name="estacion" id="estacion"
                               value="{{ old('estacion', $cuenta->estacion) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Total Estimado -->
                    <div class="mb-4">
                        <label for="total_estimado" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Total Estimado
                        </label>
                        <input type="number" step="0.01" name="total_estimado" id="total_estimado"
                               value="{{ old('total_estimado', $cuenta->total_estimado) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Fecha de Apertura -->
                    <div class="mb-4">
                        <label for="fecha_apertura" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Fecha de Apertura
                        </label>
                        <input type="datetime-local" name="fecha_apertura" id="fecha_apertura"
                               value="{{ old('fecha_apertura', \Carbon\Carbon::parse($cuenta->fecha_apertura)->format('Y-m-d\TH:i')) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('cuentas.index') }}"
                           class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md text-sm">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

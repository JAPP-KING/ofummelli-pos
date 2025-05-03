<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Historial de Movimientos') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- FORMULARIO DE FILTRO -->
                <form method="GET" action="{{ route('movimientos.index') }}" class="flex flex-wrap items-end justify-between gap-4 mb-6">
                    
                    <!-- Filtro Desde -->
                    <div class="flex flex-col">
                        <label for="fecha_inicio" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Desde</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio"
                            value="{{ request('fecha_inicio') }}"
                            class="w-48 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Filtro Hasta -->
                    <div class="flex flex-col">
                        <label for="fecha_fin" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hasta</label>
                        <input type="date" name="fecha_fin" id="fecha_fin"
                            value="{{ request('fecha_fin') }}"
                            class="w-48 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Filtro Productos -->
                    <div class="flex flex-col flex-1 min-w-[250px]">
                        <label for="producto_id" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Producto</label>
                        <select name="producto_id[]" id="producto_id" multiple
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" {{ is_array(request('producto_id')) && in_array($producto->id, request('producto_id')) ? 'selected' : '' }}>
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-2 mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Buscar
                        </button>
                        <a href="{{ route('movimientos.index') }}"
                            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Limpiar
                        </a>
                    </div>
                </form>

                <!-- TABLA -->
                <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <th class="py-2 px-4 border-b dark:border-gray-600">Producto</th>
                            <th class="py-2 px-4 border-b dark:border-gray-600">Cantidad Agregada</th>
                            <th class="py-2 px-4 border-b dark:border-gray-600">Fecha y Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($movimientos as $movimiento)
                            <tr class="hover:bg-gray-300 dark:hover:bg-gray-600 text-white">
                                <td class="py-2 px-4 border-b dark:border-gray-600">{{ $movimiento->inventario->producto->nombre ?? '-' }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-600">{{ $movimiento->cantidad ?? '-' }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-600">{{ $movimiento->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-4 text-center text-gray-500 dark:text-gray-400">
                                    No hay movimientos encontrados para los filtros seleccionados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $movimientos->links() }}
                </div>

            </div>
        </div>
    </div>

    <!-- Cargar Select2 CSS (local) -->
<link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" />

<!-- Cargar jQuery (local) -->
<script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>

<!-- Cargar Select2 JS (local) -->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

<!-- Activar Select2 en el filtro de productos -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#producto_id').select2({
            placeholder: "Selecciona uno o más productos",
            allowClear: true,
            width: '100%'
        });
    });
</script>


</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Listado de Cuentas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="mb-4 text-green-500 font-semibold">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Cliente</th>
                                <th class="px-4 py-2">Responsable</th>
                                <th class="px-4 py-2">Estación</th>
                                <th class="px-4 py-2">Total</th>
                                <th class="px-4 py-2">Fecha</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 text-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($cuentas as $cuenta)
                                <tr>
                                    <td class="px-4 py-2">{{ $cuenta->id }}</td>
                                    <td class="px-4 py-2">
                                    {{ $cuenta->cliente->nombre ?? $cuenta->cliente_nombre ?? 'Sin cliente' }}
                                    </td>
                                    <td class="px-4 py-2">{{ $cuenta->responsable_pedido ?? '—' }}</td>
                                    <td class="px-4 py-2">{{ $cuenta->estacion }}</td>
                                    <td class="px-4 py-2 text-green-400">${{ number_format($cuenta->total_estimado, 2) }}</td>
                                    <td class="px-4 py-2">{{ $cuenta->fecha_apertura }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('cuentas.show', $cuenta) }}" class="text-blue-500 hover:underline">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $cuentas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
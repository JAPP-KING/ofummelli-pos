<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Cuentas Pagadas') }}
        </h2>
    </x-slot>

    <div style="color: white;" class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($cuentas->count() > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <table class="min-w-full text-sm text-left">
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
                        <tbody>
                            @foreach ($cuentas as $cuenta)
                                <tr class="border-t dark:border-gray-700">
                                    <td class="px-4 py-2">{{ $cuenta->id }}</td>
                                    <td class="px-4 py-2">
                                        {{ $cuenta->cliente_nombre ?? 'No especificado' }}
                                    </td>
                                    <td class="px-4 py-2">{{ $cuenta->responsable_pedido }}</td>
                                    <td class="px-4 py-2">{{ $cuenta->estacion }}</td>
                                    <td class="px-4 py-2 font-bold text-green-400">${{ number_format($cuenta->total_estimado, 2) }}</td>
                                    <td class="px-4 py-2">{{ $cuenta->fecha_apertura->format('d/m/Y h:i A') }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('cuentas.show', $cuenta) }}" class="text-blue-500 hover:underline">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{ $cuentas->links() }}
                    </div>
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 p-4 shadow sm:rounded-lg">
                    <p class="text-gray-700 dark:text-gray-300">No hay cuentas pagadas registradas.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
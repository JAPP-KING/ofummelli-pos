<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Detalle de Cuenta') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div style="color: white;" class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <!-- Información General -->
                <p class="mb-2"><strong>Responsable:</strong> {{ $cuenta->responsable_pedido ?? 'No especificado' }}</p>

                <p class="mb-2">
                    <strong>Cliente:</strong>
                    {{ $cuenta->cliente_nombre ?? 'No especificado' }}
                </p>

                <p class="mb-2"><strong>Estación:</strong> {{ $cuenta->estacion }}</p>
                <p class="mb-4"><strong>Fecha:</strong> {{ $cuenta->fecha_apertura->format('d/m/Y h:i A') }}</p>

                <!-- Productos -->
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Pedido:</h3>
                <table class="w-full border mb-4">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-4 py-2 border">Producto</th>
                            <th class="px-4 py-2 border">Cantidad</th>
                            <th class="px-4 py-2 border">Precio</th>
                            <th class="px-4 py-2 border">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($cuenta->productos as $item)
                        @php
                            $producto = $productos[$item['producto_id']] ?? null;
                        @endphp
                        <tr>
                            <td class="border px-4 py-2">{{ $producto->nombre ?? 'Desconocido' }}</td>
                            <td class="border px-4 py-2">{{ $item['cantidad'] }}</td>
                            <td class="border px-4 py-2">${{ number_format($item['precio'] ?? 0, 2) }}</td>
                            <td class="border px-4 py-2">${{ number_format($item['subtotal'] ?? 0, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p class="font-bold text-green-400 mb-6">Total Estimado: ${{ number_format($cuenta->total_estimado, 2) }}</p>

                <!-- Métodos de Pago -->
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Métodos de Pago:</h3>
                <ul class="list-disc pl-6">
                    @foreach ($cuenta->metodos_pago as $pago)
                        <li class="mb-1 text-white">
                        @php
                            $nombreMetodo = match($pago['metodo']) {
                                'divisas' => 'Divisas ($)',
                                'pago_movil' => 'Pago Móvil (Bs o $)',
                                'bs_efectivo' => 'Bolívares en Efectivo',
                                'debito' => 'Tarjeta Débito',
                                'euros' => 'Euros en Efectivo',
                                default => ucfirst($pago['metodo']),
                            };
                        @endphp

                        <strong>{{ $nombreMetodo }}:</strong>
                            ${{ number_format($pago['monto'], 2) }}
                            @if (!empty($pago['referencia']))
                                <span class="ml-2 text-sm text-gray-300">(Ref: {{ $pago['referencia'] }})</span>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <!-- Botón de regreso -->
                <div class="mt-6 text-right">
                    <a href="{{ route('cuentas.index') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Volver
                    </a>

                    @if (!$cuenta->pagada)
                        <form method="POST" action="{{ route('cuentas.marcarPagada', $cuenta) }}" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                                onclick="return confirm('¿Marcar esta cuenta como pagada?')">
                                Marcar como Pagada
                            </button>
                        </form>
                    @else
                        <span class="text-green-400 font-semibold ml-4">Cuenta ya pagada</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nuevo Producto</a>
                </div>

                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <th class="py-2 px-4 border-b dark:border-gray-600">ID</th>
                            <th class="py-2 px-4 border-b dark:border-gray-600">Código</th>
                            <th class="py-2 px-4 border-b dark:border-gray-600">Nombre</th>
                            <th class="py-2 px-4 border-b dark:border-gray-600">Precio</th>
                            <th class="py-2 px-4 border-b dark:border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                            <tr class="hover:bg-gray-300 dark:hover:bg-gray-600">
                                <td class="py-2 px-4 border-b dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $producto->id }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $producto->codigo }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $producto->nombre }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-600 text-gray-800 dark:text-gray-200">${{ number_format($producto->precio_venta, 2) }}</td>
                                <td class="py-2 px-4 border-b dark:border-gray-600 flex space-x-2">
                                    <a href="{{ route('productos.edit', $producto) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-2 px-4 border-b text-center text-gray-800 dark:text-gray-200" colspan="5">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

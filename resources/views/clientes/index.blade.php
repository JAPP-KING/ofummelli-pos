<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Listado de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            

            <div class="flex flex-wrap justify-between items-center mb-4 gap-2">
    <span class="text-sm text-gray-700 dark:text-gray-300">
        Total de clientes registrados: <strong>{{ $clientes->total() }}</strong>
    </span>

    <form method="GET" action="{{ route('clientes.index') }}" class="flex items-center gap-2">
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar cliente..."
            class="rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-3 py-1 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 text-sm">
        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
            Buscar 🔍
        </button>
    </form>

    <div class="flex gap-2">
    <a href="{{ route('clientes.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
           Agregar Cliente
        </a>

        <a href="{{ route('clientes.exportar') }}"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
           📥 Exportar Excel
        </a>
    </div>
</div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white">
                            <tr>
                                <th class="py-2 px-4 border-b dark:border-gray-600">№</th>
                                <th class="py-2 px-4 border-b dark:border-gray-600">Nombre</th>
                                <th class="py-2 px-4 border-b dark:border-gray-600">Cédula</th>
                                <th class="py-2 px-4 border-b dark:border-gray-600">Teléfono</th>
                                <th class="py-2 px-4 border-b dark:border-gray-600">Dirección (Corta)</th>
                                <th class="py-2 px-4 border-b dark:border-gray-600">Email</th>
                                <th class="py-2 px-4 border-b dark:border-gray-600">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clientes as $index => $cliente)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-100">
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="text-align: center;">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="text-align: center;">{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="text-align: center;">{{ $cliente->cedula }}</td>
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="text-align: center;">{{ $cliente->telefono }}</td>
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="text-align: center;">{{ $cliente->direccion ?? 'No Especificado' }}</td>
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="text-align: center;">{{ $cliente->email ?? 'No Especificado' }}</td>
                                    <td class="py-2 px-4 border-b dark:border-gray-700" style="display: flex;justify-content: center;align-content: center;align-items: center;">
                                        <div class="flex justify-evenly items-center gap-2">
                                            <a href="{{ route('clientes.edit', $cliente) }}"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar 🖊️</a>
                                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                                onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar 🗑️</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 text-center text-gray-500 dark:text-gray-300">
                                        No hay clientes registrados aún.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $clientes->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
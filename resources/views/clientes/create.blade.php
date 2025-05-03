<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">
            {{ __('Registrar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('clientes.store') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}"
                                class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                            <input type="text" name="apellido" value="{{ old('apellido') }}"
                                class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cédula</label>
                            <input type="text" name="cedula" value="{{ old('cedula') }}"
                                class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}"
                                class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección (opcional)</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}"
                                class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email (opcional)</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('clientes.index') }}"
                            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Cancelar</a>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

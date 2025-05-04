@extends('layouts.app')

@section('content')

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (requerido por Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="max-w-5xl mx-auto py-10 px-6">
    <div class="bg-gray-800 shadow rounded-xl p-8">
        <h2 class="text-2xl font-bold text-white mb-6">Editar Cuenta #{{ $cuenta->id }}</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cuentas.update', $cuenta->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="cliente_nombre" class="block text-sm font-medium text-white mb-1">Nombre Manual</label>
                    <input type="text" name="cliente_nombre" id="cliente_nombre" value="{{ old('cliente_nombre', $cuenta->cliente_nombre) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="responsable" class="block text-sm font-medium text-white mb-1">Responsable</label>
                    <input type="text" name="responsable" id="responsable" value="{{ old('responsable', $cuenta->responsable_pedido) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="estacion" class="block text-sm font-medium text-white mb-1">Estación</label>
                    <input type="text" name="estacion" id="estacion" value="{{ old('estacion', $cuenta->estacion) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="fecha_hora" class="block text-sm font-medium text-white mb-1">Fecha y Hora</label>
                    <input type="datetime-local" name="fecha_hora" id="fecha_hora" value="{{ old('fecha_hora', \Carbon\Carbon::parse($cuenta->fecha_apertura)->format('Y-m-d\TH:i')) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- Productos -->
            <div>
                <label class="block text-sm font-medium text-white mb-2">Productos</label>
                <div id="productos-container" class="space-y-4">
                    @foreach ($productosSeleccionados as $producto)
                        <div class="grid grid-cols-12 gap-4 producto-item">
                            <div class="col-span-6">
                                <select name="productos[]" class="producto-select w-full border-gray-300 rounded-md">
                                    @foreach ($productos as $item)
                                        <option value="{{ $item->id }}" {{ $producto['producto_id'] == $item->id ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-4">
                                <input type="number" name="cantidades[]" value="{{ $producto['cantidad'] }}" min="1" class="w-full border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-2">
                                <button type="button" class="remove-producto w-full bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Eliminar</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="agregar-producto" class="mt-3 inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">+ Agregar Producto</button>
            </div>

            <!-- Métodos de Pago -->
            <div>
                <label class="block text-sm font-medium text-white mb-2">Métodos de Pago</label>
                <div id="metodos-pago-container" class="space-y-4">
                @foreach ($metodosPago as $index => $pago)
                    <div class="grid grid-cols-12 gap-4 metodo-pago-item mb-2">
                        <div class="col-span-4">
                            <select name="metodo_pago[]" class="w-full border-gray-300 rounded-md metodo-select form-select">
                                <option value="Divisas" {{ $pago['metodo'] == 'Divisas' ? 'selected' : '' }}>Divisas</option>
                                <option value="Pago Móvil" {{ $pago['metodo'] == 'Pago Móvil' ? 'selected' : '' }}>Pago Móvil</option>
                                <option value="Bolívares" {{ $pago['metodo'] == 'Bolívares' ? 'selected' : '' }}>Bolívares en Efectivo</option>
                                <option value="Tarjeta de Débito" {{ $pago['metodo'] == 'Tarjeta de Débito' ? 'selected' : '' }}>Tarjeta de Débito</option>
                                <option value="Euros" {{ $pago['metodo'] == 'Euros' ? 'selected' : '' }}>Euros en Efectivo</option>
                            </select>
                        </div>

                            <div class="col-span-3">
                                <input type="number" name="monto_pago[]" value="{{ $pago['monto'] }}" placeholder="Monto" class="w-full border-gray-300 rounded-md" min="0" step="0.01" required>
                            </div>
                            <div class="col-span-3">
                            <input type="text" name="referencia_pago[]" value="{{ $pago['referencia'] }}" placeholder="Referencia"
                            class="w-full border-gray-300 rounded-md referencia-input {{ $pago['metodo'] === 'Pago Móvil' ? '' : 'hidden' }}">
                            </div>
                            <div class="col-span-2">
                                <button type="button" class="remove-metodo w-full bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Eliminar</button>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <button type="button" id="agregar-metodo" class="mt-3 inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">+ Agregar Método de Pago</button>
                    </div>

            <!-- Botón Submit -->
            <div class="text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700">Actualizar Cuenta</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')

<script>
    // Inicializa Select2 para los productos existentes
    function inicializarSelect2Ajax(selectElement) {
    selectElement.select2({
        placeholder: 'Busca un producto...',
        ajax: {
            url: '/productos/buscar',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { term: params.term };
            },
            processResults: function (data) {
                return { results: data };
            },
            cache: true
        },
        width: '100%'
    });
}

    // Cuando se agrega un nuevo producto
    document.getElementById('agregar-producto').addEventListener('click', () => {
        const container = document.getElementById('productos-container');
        const div = document.createElement('div');
        div.className = 'grid grid-cols-12 gap-4 producto-item';
        div.innerHTML = `
            <div class="col-span-6">
                <select name="productos[]" class="producto-select w-full border-gray-300 rounded-md">
                    @foreach ($productos as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-4">
                <input type="number" name="cantidades[]" value="1" min="1" class="w-full border-gray-300 rounded-md">
            </div>
            <div class="col-span-2">
                <button type="button" class="remove-producto w-full bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Eliminar</button>
            </div>
        `;
        container.appendChild(div);

        // Inicializa Select2 en el nuevo select
        $(div).find('.producto-select').select2({
            placeholder: 'Busca un producto...',
            width: '100%'
        });
    });
</script>


<script>
    // Productos
    document.getElementById('agregar-producto').addEventListener('click', () => {
        const container = document.getElementById('productos-container');
        const div = document.createElement('div');
        div.className = 'grid grid-cols-12 gap-4 producto-item';
        // div.innerHTML = `
        //     <div class="col-span-6">
        //         <select name="productos[]" class="w-full border-gray-300 rounded-md">
        //             @foreach ($productos as $item)
        //                 <option value="{{ $item->id }}">{{ $item->nombre }}</option>
        //             @endforeach
        //         </select>
        //     </div>
        //     <div class="col-span-4">
        //         <input type="number" name="cantidades[]" value="1" min="1" class="w-full border-gray-300 rounded-md">
        //     </div>
        //     <div class="col-span-2">
        //         <button type="button" class="remove-producto w-full bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Eliminar</button>
        //     </div>
        // `;
        container.appendChild(div);
    });

    document.getElementById('productos-container').addEventListener('click', e => {
        if (e.target.classList.contains('remove-producto')) {
            e.target.closest('.producto-item').remove();
        }
    });

    // Métodos de pago
    document.getElementById('agregar-metodo').addEventListener('click', () => {
        const container = document.getElementById('metodos-pago-container');
        const div = document.createElement('div');
        div.className = 'grid grid-cols-12 gap-4 metodo-pago-item';
        div.innerHTML = `
            <div class="col-span-4">
                <select name="metodo_pago[]" class="w-full border-gray-300 rounded-md metodo-select">
                    <option value="">-- Selecciona --</option>
                    <option value="Divisas">Divisas ($)</option>
                    <option value="Pago Móvil">Pago Móvil</option>
                    <option value="Bolívares en Efectivo">Bolívares en Efectivo</option>
                    <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                    <option value="Euros en Efectivo">Euros en Efectivo</option>
                </select>
            </div>
            <div class="col-span-3">
                <input type="number" name="monto_pago[]" placeholder="Monto" class="w-full border-gray-300 rounded-md">
            </div>
            <div class="col-span-3">
                <input type="text" name="referencia_pago[]" placeholder="Referencia" class="w-full border-gray-300 rounded-md referencia-input" style="display: none;">
            </div>
            <div class="col-span-2">
                <button type="button" class="remove-metodo w-full bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Eliminar</button>
            </div>
        `;
        container.appendChild(div);
    });

    document.getElementById('metodos-pago-container').addEventListener('click', e => {
        if (e.target.classList.contains('remove-metodo')) {
            e.target.closest('.metodo-pago-item').remove();
        }
    });

    document.getElementById('metodos-pago-container').addEventListener('change', e => {
        if (e.target.classList.contains('metodo-select')) {
            const metodo = e.target.value;
            const referenciaInput = e.target.closest('.metodo-pago-item').querySelector('.referencia-input');
            if (metodo === 'Pago Móvil') {
                referenciaInput.style.display = 'block';
            } else {
                referenciaInput.style.display = 'none';
                referenciaInput.value = '';
            }
        }
    });
</script>
@endpush

@endsection

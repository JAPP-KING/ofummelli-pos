<div class="flex gap-2 mt-2 items-center">
    <select name="metodo_pago[]" class="metodo-select w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
        <option value="divisas">Divisas ($)</option>
        <option value="pago_movil">Pago Móvil</option>
        <option value="bs_efectivo">Bolívares en Efectivo</option>
        <option value="debito">Tarjeta Débito</option>
        <option value="euros">Euros en Efectivo</option>
    </select>
    <input type="number" name="monto_pago[]" step="0.01" placeholder="Monto" class="w-32 rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
    <input type="text" name="referencia_pago[]" placeholder="Referencia" class="referencia-input w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white hidden">
    <button type="button" onclick="this.parentNode.remove()" class="text-red-600 text-xl">🗑️</button>
</div>
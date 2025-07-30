<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Informacion del producto') }}
            </h2>
            <a href="{{ route('products.index') }}"
                class="text-sm text-blue-500 hover:underline">
                ← Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                        <input type="text" name="name" id="input-name"
                            value="{{ old('name', $product->name) }}"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
                            disabled required>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                        <textarea name="description" id="input-description" rows="4"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white @error('description') border-red-500 @enderror"
                            disabled required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Precio -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Precio</label>
                        <input type="number" name="price" id="input-price" step="0.01"
                            value="{{ old('price', $product->price) }}"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white @error('price') border-red-500 @enderror"
                            disabled required>
                        @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Stock</label>
                        <input type="number" name="stock" id="input-stock" step="1"
                            value="{{ old('stock', $product->stock) }}"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white @error('stock') border-red-500 @enderror"
                            disabled required>
                        @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Botones -->
                    <div class="mt-6 flex gap-3">
                        <button id="btn-guardar"
                            type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded disabled:opacity-50"
                            disabled>
                            Guardar cambios
                        </button>

                        <button type="button"
                            id="btn-modificar"
                            class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">
                            Modificar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const inputs = [
            document.getElementById('input-name'),
            document.getElementById('input-description'),
            document.getElementById('input-price'),
            document.getElementById('input-stock')
        ];
        const btnGuardar = document.getElementById('btn-guardar');
        const btnModificar = document.getElementById('btn-modificar');

      btnModificar.addEventListener('click', () => {
    const isDisabled = inputs[0].disabled;

    inputs.forEach(input => input.disabled = !isDisabled);
    btnGuardar.disabled = !btnGuardar.disabled;

    if (isDisabled) {
        // Cambia a modo "Cancelar"
        btnModificar.textContent = 'Cancelar';
        btnModificar.classList.remove('bg-orange-500');
        btnModificar.classList.add('bg-red-500');
    } else {
        // Regresa a modo "Modificar"
        btnModificar.textContent = 'Modificar';
        btnModificar.classList.remove('bg-red-500');
        btnModificar.classList.add('bg-orange-500');
    }
});

    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Crear producto') }}
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
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                        <input type="text" name="name" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                        <textarea name="description" rows="4" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
                    </div>

                    <!-- Precio -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Precio</label>
                        <input type="number" name="price" step="0.01" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    </div>
                     <!-- Precio -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Ingresan</label>
                        <input type="number" name="stock" step="0.01" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    </div>


                    <!-- Botón -->
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded" style="background-color: green;">
                            Guardar producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

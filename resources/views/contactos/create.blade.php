<x-layout title="Anadir contacto">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Anadir contacto</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('contactos.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="nombre" class="block font-semibold">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="border p-2 w-full rounded"
                       value="{{ old('nombre') }}">
            </div>

            <div>
                <label for="apellidos" class="block font-semibold">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="border p-2 w-full rounded"
                       value="{{ old('apellidos') }}">
            </div>

            <div>
                <label for="direccion" class="block font-semibold">Direccion:</label>
                <input type="text" name="direccion" id="direccion" class="border p-2 w-full rounded"
                       value="{{ old('direccion') }}">
            </div>

            <div>
                <label for="correo" class="block font-semibold">Correo:</label>
                <input type="email" name="correo" id="correo" class="border p-2 w-full rounded"
                       value="{{ old('correo') }}">
            </div>

            <div>
                <label for="telefono" class="block font-semibold">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="border p-2 w-full rounded"
                       value="{{ old('telefono') }}">
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Anadir
                </button>

                <a href="{{ route('contactos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-layout>

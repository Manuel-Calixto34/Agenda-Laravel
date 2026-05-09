<x-layout title="Ver contacto">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Detalle del contacto</h1>

        <div class="space-y-3">
            <p>
                <strong>Nombre:</strong>
                {{ $contacto->nombre }}
            </p>

            <p>
                <strong>Apellidos:</strong>
                {{ $contacto->apellidos }}
            </p>

            <p>
                <strong>Direccion:</strong>
                {{ $contacto->direccion }}
            </p>

            <p>
                <strong>Correo:</strong>
                {{ $contacto->correo }}
            </p>

            <p>
                <strong>Telefono:</strong>
                {{ $contacto->telefono }}
            </p>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('contactos.edit', $contacto) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Editar
            </a>

            <a href="{{ route('contactos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Volver al listado
            </a>
        </div>
    </div>
</x-layout>

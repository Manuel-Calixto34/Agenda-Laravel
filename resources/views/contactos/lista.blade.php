<x-layout title="Listado de contactos">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Mis contactos</h1>

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('contactos.create') }}"
           class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Nuevo contacto
        </a>

        <table class="w-full border-collapse bg-white shadow rounded">
            <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Nombre</th>
                <th class="p-2">Apellidos</th>
                <th class="p-2">Direccion</th>
                <th class="p-2">Correo</th>
                <th class="p-2">Telefono</th>
                <th class="p-2">Acciones</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($contactos as $contacto)
                <tr class="border-b">
                    <td class="p-2">{{ $contacto->nombre }}</td>
                    <td class="p-2">{{ $contacto->apellidos }}</td>
                    <td class="p-2">{{ $contacto->direccion }}</td>
                    <td class="p-2">{{ $contacto->correo }}</td>
                    <td class="p-2">{{ $contacto->telefono }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('contactos.show', $contacto) }}"
                           class="text-blue-600 hover:underline">
                            Ver
                        </a>

                        <a href="{{ route('contactos.edit', $contacto) }}"
                           class="text-yellow-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('contactos.destroy', $contacto) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Eliminar contacto?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600 hover:underline">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">
                        No hay contactos todavia.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $contactos->links() }}
        </div>
    </div>
</x-layout>

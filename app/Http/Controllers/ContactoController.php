<?php

namespace App\Http\Controllers;

use App\Actions\CreateContactoAction;
use App\Http\Requests\StoreContactoRequest;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contacto::latest()->paginate(10);

        return view('contactos.lista', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactoRequest $request, CreateContactoAction $action)
    {
        $action->execute($request->validated());

        return to_route('contactos.index')
            ->with('success', 'Contacto creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:2|max:50',
            'apellidos' => 'required|string|min:2|max:100',
            'direccion' => 'nullable|string|max:255',
            'correo' => [
                'required',
                'email',
                Rule::unique('contactos', 'correo')->ignore($contacto->id),
            ],
            'telefono' => 'required|regex:/^[0-9+\-\s()]+$/|min:9|max:20',
        ]);

        $contacto->update($data);

        return to_route('contactos.index')
            ->with('success', 'Contacto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return to_route('contactos.index')
            ->with('success', 'Contacto eliminado con exito');
    }
}

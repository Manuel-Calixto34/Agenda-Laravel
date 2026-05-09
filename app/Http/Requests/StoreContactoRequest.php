<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:2|max:50',
            'apellidos' => 'required|string|min:2|max:100',
            'direccion' => 'nullable|string|max:255',
            'correo' => 'required|email|unique:contactos,correo',
            'telefono' => 'required|regex:/^[0-9+\-\s()]+$/|min:9|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'correo.unique' => 'Este correo ya esta registrado',
            'telefono.regex' => 'El telefono contiene caracteres invalidos',
            'nombre.required' => 'El nombre es obligatorio',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cliente_user_id' => 'required|exists:users,id',
            'barbero_user_id' => 'required|exists:users,id',
            'fecha_hora' => 'required|date',
            'estado' => 'required|integer|in:1,2,3,4',
            'observaciones' => 'nullable|string|max:500'
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_user_id.required' => 'El cliente es obligatorio',
            'cliente_user_id.exists' => 'El cliente seleccionado no existe',
            'barbero_user_id.required' => 'El barbero es obligatorio',
            'barbero_user_id.exists' => 'El barbero seleccionado no existe',
            'fecha_hora.required' => 'La fecha y hora son obligatorias',
            'fecha_hora.date' => 'La fecha y hora deben ser válidas',
            'estado.required' => 'El estado es obligatorio',
            'estado.in' => 'El estado debe ser válido',
            'observaciones.max' => 'Las observaciones no pueden exceder 500 caracteres'
        ];
    }
}

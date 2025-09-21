<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
           'code' => 'required|max:50|unique:productos,code,' . $this->producto->id,
           'nombre' => 'required|max:80',
           'descripcion' => 'nullable|max:255',
           'stock' => 'required|integer|min:0',
           'fecha_vencimiento' => 'nullable|date|after:today',
           'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'marca_id' => 'required|exists:marcas,id',
           'presentacion_id' => 'required|exists:presentaciones,id'
        ];
    }
}

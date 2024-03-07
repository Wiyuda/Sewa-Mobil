<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarsRequest extends FormRequest
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
            'merek' => 'required|string',
            'model' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'plat' => 'required|string',
            'jumlah' => 'required|integer',
            'tarif' => 'required|integer',
        ];
    }
}
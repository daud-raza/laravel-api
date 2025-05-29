<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'        => 'required|unique:products|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|max:1000',
            'stock'       => 'required|integer|max:1000',
            'discount'    => 'nullable|numeric|max:100|min:0',
        ];
    }
}

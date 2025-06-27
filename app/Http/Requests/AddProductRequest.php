<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:15', 'unique:products'],
            'price' => ['required', 'numeric', 'min:1'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'image' => ['nullable', 'file']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'U must enter a name'
        ];
    }
}

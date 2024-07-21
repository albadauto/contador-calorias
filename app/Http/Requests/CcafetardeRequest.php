<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CcafetardeRequest extends FormRequest
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
            'alimento' => ['required', 'min:3', 'max:100'],
            'kcal' => ['required', 'min:3', 'max:100'],
            'gramas' => ['required', 'min:1', 'max:50']
        ];
    }
}

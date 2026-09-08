<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewShipmentRequest extends FormRequest
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
            'title'        => ['required', 'string', 'max:255'],
            'from_city'    => ['required', 'string', 'max:100'],
            'from_country' => ['required', 'string', 'max:100'],
            'to_city'      => ['required', 'string', 'max:100'],
            'to_country'   => ['required', 'string', 'max:100'],
            'price'        => ['required', 'integer', 'min:0'],
            'status'       => ['required', 'in:pending,in_transit,delivered,cancelled'],

            'details'      => ['nullable', 'string'],
            'documents'    => ['required', 'array'],
            'documents.*' => ['file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:10240'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ShopingRequest extends FormRequest
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

        $product = Product::find($this->id);
        return [
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($product) {
                    if ($product && $value > $product->amount) {
                        $fail('Nažalost, nemamo toliko proizvoda na stanju (dostupno: ' . $product->amount . ').');
                    }
                },
            ],
            'price' => 'required|decimal:0,2',
        ];
    }
}

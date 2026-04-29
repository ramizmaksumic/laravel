<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAvatarRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,web', 'max:4096'],
        ];
    }
}

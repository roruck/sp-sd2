<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // no auth in SD1
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'speakers' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}

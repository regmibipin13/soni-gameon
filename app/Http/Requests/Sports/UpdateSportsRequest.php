<?php

namespace App\Http\Requests\Sports;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSportsRequest extends FormRequest
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
            'title' => ['required'],
            'sport_category_id' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'description' => ['nullable'],
            'price_per_hour' => ['required'],
            'vendor_id' => ['required'],
            'filepond' => ['nullable'],
            'opening_time' => ['required'],
            'closing_time' => ['required'],
        ];
    }
}

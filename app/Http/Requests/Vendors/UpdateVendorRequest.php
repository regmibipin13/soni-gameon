<?php

namespace App\Http\Requests\Vendors;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $this->vendor->user_id],
            'phone' => ['required', 'unique:users,phone,' . $this->vendor->user_id],
            'name' => ['required', 'unique:vendors,name,' . $this->vendor->id],
            'password' => ['nullable'],
            'city' => ['required'],
            'address' => ['required'],
            'google_map_link' => ['required'],
            'status' => ['required'],
            'is_banned' => ['nullable'],
            'banned_reason' => ['nullable'],
            'is_close' => ['nullable'],
            'filepond' => ['nullable'],
            'tax_number' => ['required', 'unique:vendors,tax_number,' . $this->vendor->id],
        ];
    }
}
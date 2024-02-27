<?php

namespace App\Http\Requests\Api\Bookings;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingsRequest extends FormRequest
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
            'user_id' => 'nullable',
            'vendor_id' => 'required',
            'sport_id' => 'required',
            'date' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'total_billed_amount' => 'required',
            'paid_amount' => 'required',
            'total_discount' => 'required',
            'total_tax' => 'required',
            'grand_total_paid' => 'required',
            'payment_gateway' => 'required',
        ];
    }
}

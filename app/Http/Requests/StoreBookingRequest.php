<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'client_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_charges' => 'required|numeric',
            'booking_status' => 'required|in:pending,canceled,confirmed',
            'guest_count' => 'required|integer',
            'special_requests' => 'nullable',
            'payment_method' => 'required|in:Cash,Mpesa,Credit Card,Paypal',
            'payment_status' => 'required|in:Paid,Pending,Failed',
        ];
    }
}

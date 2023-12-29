<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
            'name' => 'required',
            'owner_id' => 'required|exists:accounts,id',
            'description' => 'required',
            'address' => 'required',
            'city' => 'nullable',
            'county' => 'nullable',
            'country' => 'nullable',
            'price_per_night' => 'required|numeric',
            'number_of_rooms' => 'required|integer',
            'number_of_bathrooms' => 'required|integer',
            'max_occupancy' => 'required|integer',
            'property_type' => 'required',
            'amenities' => 'required|json',
            'main_image' => 'required',
            'images' => 'nullable|json',
            'rating' => 'required|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingReviewRequest extends FormRequest
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
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'anonymous' => 'boolean',
            'verified_booking' => 'boolean',
            'recommended' => 'boolean',
            'response_comment' => 'nullable',
            'helpful_count' => 'integer',
            'reported' => 'boolean',
            'reported_count' => 'integer',
            'flagged' => 'boolean',
            'flagged_reason' => 'nullable',
            'images' => 'nullable|json',
        ];
    }
}

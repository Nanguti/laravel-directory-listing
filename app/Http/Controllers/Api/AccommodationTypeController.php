<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccommodationType;

class AccommodationTypeController extends Controller
{
    public function types()
    {
        $accommodationTypes = AccommodationType::all();
        return response()->json([
            'types' => $accommodationTypes,
            'message' => 'success'
        ], 201);
    }
    
}

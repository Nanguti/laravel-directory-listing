<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'price_per_night',
        'number_of_rooms',
        'number_of_bathrooms',
        'max_occupancy',
        'property_type',
        'amenities',
        'main_image',
        'images',
        'rating',
        'created_at',
        'updated_at',
        'accommodation_type_id'
    ];

    public function reviews()
    {
        return $this->hasMany(RatingReview::class, 'property_id');
    }


    public function accommodationType()
    {
        return $this->belongsTo(AccommodationType::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
}

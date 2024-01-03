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
        'county',
        'country',
        'zip_code',
        'main_image',
        'rating',
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

    public function account()
    {
        return $this->belongsTo(Account::class, 'owner_id');
    }
}

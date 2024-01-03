<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function getListByType($slug){
        return AccommodationType::with('listings')->where('slug',$slug)->first();
    }

}

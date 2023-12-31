<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'property_id',
        'rating',
        'comment',
        'anonymous',
        'verified_booking',
        'recommended',
        'response_comment',
        'helpful_count',
        'reported',
        'reported_count',
        'flagged',
        'flagged_reason',
        'images',    
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

}

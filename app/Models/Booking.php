<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'client_id', 'property_id', 'check_in_date', 'check_out_date', 'total_charges', 'booking_status', 'guest_count', 'special_requests', 'payment_status', 'payment_method', 'booking_code'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function proprty()
    {
        return $this->hasOne(Listing::class);
    }
}

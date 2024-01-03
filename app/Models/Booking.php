<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'client_id','phone_number', 'email', 'listing_id', 'check_in_date', 'check_out_date', 'total_charges', 'booking_status', 'guest_count', 'special_requests', 'payment_status', 'payment_method', 'booking_code'
    ];

    protected $casts =[
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'client_id');
    }
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'properties',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'properties' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(Account::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['full_name', 'email', 'phone_number', 'address', 'profile_picture', 'bio'];
}

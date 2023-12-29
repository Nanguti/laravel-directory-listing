<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $guard = 'account';

    protected $fillable = ['full_name', 'email', 'phone_number', 'password','address', 'profile_picture', 'bio'];
}

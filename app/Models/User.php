<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory; // Add this line for factory support
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone_number', 'country', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

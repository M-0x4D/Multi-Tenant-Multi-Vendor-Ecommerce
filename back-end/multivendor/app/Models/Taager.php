<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Taager extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'taager';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'phone_number', 'otp', 'otp_valid', 'email_verified_at', 'phone_verified_at', 'status', 'paid');



    public function reviews()
    {
        return $this->morphMany(Review::class , 'reviewable');
    }

}

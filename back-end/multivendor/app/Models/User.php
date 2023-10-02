<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    // protected $guard = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    function adresses()
    {
        return $this->hasMany(ShippingAddress::class);

    }

    function carts()
    {
        return $this->belongsToMany(Cart::class , 'product_cart' , 'user_id' , 'cart_id');

    }


    function favourites(){
        return $this->belongsToMany(Product::class , 'favourite_user');
    }


    function favouriteProducts(){
        return $this->belongsToMany(Product::class , 'favourite_user');
    }
}

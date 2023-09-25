<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;


    protected $table = 'favourites';
    public $timestamps = true;




    function users(){
        return $this->belongsToMany(User::class , 'favourite_user');
    }

    function products()
    {
        return $this->belongsToMany(Product::class,'favourite_user');
    }
}

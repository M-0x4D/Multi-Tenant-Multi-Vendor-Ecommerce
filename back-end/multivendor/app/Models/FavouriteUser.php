<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteUser extends Model
{
    use HasFactory;

    protected $table = 'favourite_user';
    public $timestamps = true;
    protected $fillable = array('product_id' , 'user_id' , 'favourite_id');
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'cart';
    public $timestamps = true;

    protected $fillable = array('user_id');

    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_cart' , 'user_id' , 'cart_id');
    }

}

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
        return $this->belongsToMany('App\Models\Product' , 'product_cart');
    }

}

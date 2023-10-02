<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{

    protected $table = 'product_cart';
    public $timestamps = true;
    protected $fillable = array('cart_id', 'product_id' , 'user_id' , 'qty');

}

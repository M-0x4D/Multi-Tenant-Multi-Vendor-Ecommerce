<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    protected $table = 'order_product';
    public $timestamps = true;
    protected $fillable = array('order_id', 'product_id', 'price_at_this_time' , 'qty');

}

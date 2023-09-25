<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingGovernrate extends Model
{

    protected $table = 'shipping_governrate';
    public $timestamps = true;
    protected $fillable = array('shipping_method_id', 'governrate_id', 'price');

}

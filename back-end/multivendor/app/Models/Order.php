<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('order_number', 'order_date_time', 'total_price' , 'user_id' , 'address_id' , 'payment_method_id' , 'shippment_method_id');

    public function products()
    {
        return $this->belongsToMany('App\models\Product');
    }

}

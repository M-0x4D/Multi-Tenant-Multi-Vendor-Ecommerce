<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{

    protected $table = 'shipping_addresses';
    public $timestamps = true;
    protected $fillable = array('rememberToken', 'user_id', 'phone_number', 'city', 'governrate_id');

    public function governrate()
    {
        return $this->belongsTo('App\models\Governrate');
    }

    function user(){
        return $this->belongsTo(User::class);
    }

}

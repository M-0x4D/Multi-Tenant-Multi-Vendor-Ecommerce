<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{

    protected $table = 'shipping_methods';
    public $timestamps = true;

    public function governrates()
    {
        return $this->belongsToMany('App\models\Governrate');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governrate extends Model
{

    protected $table = 'governrates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function shipping_methods()
    {
        return $this->belongsToMany('App\models\ShippingMethod');
    }

    public function shipping_adresses()
    {
        return $this->hasMany('App\models\ShippingAddress');
    }

}

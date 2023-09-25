<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array( 'product_id', 'percentage', 'from_date', 'to_date');

    public function products()
    {
        return $this->hasOne('App\models\Product');
    }

    public function categories()
    {
        return $this->hasMany('App\models\Category');
    }

}

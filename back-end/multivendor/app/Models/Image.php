<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';
    public $timestamps = true;
    protected $fillable = array('name', 'product_id');

    public function product()
    {
        return $this->belongsTo('App\models\Product');
    }

}

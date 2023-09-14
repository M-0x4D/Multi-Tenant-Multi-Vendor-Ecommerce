<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\error;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');

    public function products()
    {
        return $this->hasMany('App\models\Product');
    }

    public function offer()
    {
        return $this->belongsTo('App\models\Offer');
    }

}

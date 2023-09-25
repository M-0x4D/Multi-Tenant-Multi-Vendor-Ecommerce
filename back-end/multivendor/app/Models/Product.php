<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('category_id', 'name', 'price', 'description' , 'qty' , 'subcategory_id');


    // function image()
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //         set: fn (string $value) => strtolower($value),
    //     );
    // }
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size');
    }

    public function carts()
    {
        return $this->belongsToMany('App\Models\Cart');
    }

    public function offer()
    {
        return $this->hasOne('App\Models\Offer');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

}

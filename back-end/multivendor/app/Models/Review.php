<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';
    public $timestamps = true;
    protected $fillable = array('rate', 'comment', 'reviewable_id', 'reviewable_type', 'user_id' , 'name');


     /**
     * Get the parent reviewable model (product or taager).
     *
     * reviewable_id => product_id or taager_id
     *
     * reviewable_type => product_model or taager_model
     *
     */
    public function reviewable()
    {
        return $this->morphTo();
    }

}

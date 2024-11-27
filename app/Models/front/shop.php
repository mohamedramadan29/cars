<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    //

    protected $guarded = [];

    public function gallary()
    {
        return $this->hasMany(ProductGallary::class,'product_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

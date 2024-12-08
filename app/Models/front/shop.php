<?php

namespace App\Models\front;

use App\Models\admin\State;
use App\Models\admin\Country;
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

    public function Country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function City()
    {
        return $this->belongsTo(State::class,'city_id');
    }

}

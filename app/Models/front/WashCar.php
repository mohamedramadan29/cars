<?php

namespace App\Models\front;

use App\Models\admin\State;
use App\Models\admin\Country;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WashCar extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name','address','desc','work_time'];

    public function Country(){
        return $this->belongsTo(Country::class,'country');
    }
    public function City()
    {
        return $this->belongsTo(State::class,'city');
    }

}

<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AutoRepair extends Model
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

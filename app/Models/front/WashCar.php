<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WashCar extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name','address','desc','work_time'];
}

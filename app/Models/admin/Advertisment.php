<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Advertisment extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['c_title','more_info'];

    public function carImages()
    {
        return $this->hasMany(CarImage::class, 'adv_id');
    }

    public function carMark()
    {
        return $this->belongsTo(CarMark::class,'c_brand');
    }
}

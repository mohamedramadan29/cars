<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CarModels extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['name'];
    protected $guarded = [];
}

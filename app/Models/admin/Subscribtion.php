<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribtion extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['advantages','dis_advantages','title'];
}

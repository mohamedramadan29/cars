<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroBanner extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['title', 'desc'];
}
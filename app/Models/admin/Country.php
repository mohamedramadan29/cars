<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name'];

    public function states()
    {
        return $this->hasMany(State::class,'country_id');
    }
}

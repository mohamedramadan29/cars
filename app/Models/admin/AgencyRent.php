<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AgencyRent extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name','address','desc','work_time'];

    public function advs()
    {
        return $this->hasMany(Advertisment::class,'agency_rent');
    }
    public function City()
    {
        return $this->belongsTo(State::class,'city');
    }
}

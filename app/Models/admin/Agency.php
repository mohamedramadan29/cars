<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Agency extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name','address','desc','work_time'];


    public function branches()
    {
        return $this->hasMany(AgencyBranch::class,'agency_id');
    }
    public function advs()
    {
        return $this->hasMany(Advertisment::class,'agency');
    }
}

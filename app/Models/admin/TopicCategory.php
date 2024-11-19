<?php

namespace App\Models\admin;

use App\Models\front\Topic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TopicCategory extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name'];


    public function Topics(){
        return $this->hasMany(Topic::class,'category_id');
    }

}

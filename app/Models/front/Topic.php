<?php

namespace App\Models\front;

use App\Models\admin\TopicCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Category(){
        return $this->belongsTo(TopicCategory::class,'category_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Comments(){
        return $this->hasMany(TopicComment::class,'topic_id');
    }
}

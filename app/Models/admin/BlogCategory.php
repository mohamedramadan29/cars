<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Blog::class,'category_id');
    }
}

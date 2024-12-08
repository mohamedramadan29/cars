<?php

namespace App\Models\admin;

use App\Models\front\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarNumber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Country(){
        return $this->belongsTo(Country::class,'country');
    }
    public function City()
    {
        return $this->belongsTo(State::class,'city');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}

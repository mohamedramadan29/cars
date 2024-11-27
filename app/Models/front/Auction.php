<?php

namespace App\Models\front;

use App\Models\admin\Advertisment;
use App\Models\admin\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Auction extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    public $translatable = ['name','address','desc','work_time'];

    public function advs()
    {
        return $this->hasMany(Advertisment::class,'auction_id');
    }
    public function City()
    {
        return $this->belongsTo(State::class,'city');
    }
}

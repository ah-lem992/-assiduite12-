<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Groupe;

class Promo extends Model
{
    //use SoftDeletes;
    //
    //protected $dates = ['deleted_at'];
    public function groupe()
    {
        return $this->hasMany('App\Groupe');
    }
}

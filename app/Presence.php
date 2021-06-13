<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{

    protected $primaryKey = "presence_id";
    protected $fillable = [

        'id',
        'prof_id',
        'id',
       'etud_id',

        'created_at',
        'updated_at',
    ];
    public function profs(){
        return $this->belongsTo('App\Prof','prof_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{

    protected $primaryKey = "presence_id";
    protected $fillable = [
        'prof_id',
        'id',
        'etud_id',

        'created_at',
        'updated_at',
    ];
    public function profs(){
        return $this->belongsTo('App\Prof','prof_id');
    }
    public function seances(){
        return $this->belongsTo('App\Seance','id');
    }
    public function etudiants(){
        return $this->belongsTo('App\Etudiant','etud_id');
    }


}

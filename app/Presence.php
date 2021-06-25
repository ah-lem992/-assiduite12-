<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presence extends Model
{

    protected $primaryKey = "presence_id";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'promo_id',
        'specialite_id',
        'prof_id',
        'id',
        'etud_id',
        'groupe_id',
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
    public function groupes(){
        return $this->belongsTo('App\Groupe','groupe_id');
    }
    public function promo(){
        return $this->belongsTo('App\Promo','promo_id');
    }
    public function specialite(){
        return $this->belongsTo('App\Specialite','specialite_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Model
{


    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'groupe_id','nom', 'prenom','sexe','naissance','phone','email','adresse','photo','specialite_id','promo_id',
    ];
    protected $primaryKey = "etud_id";

    public function groupe()
    {
        return $this->belongsTo('App\Groupe','groupe_id');
    }
    public function prof()
    {
        return $this->belongsTo('App\Prof','prof_id');
    }
    public function presences()
    {
        return $this->hasMany('App\Presence','presence_id');
    }
    public function etudiant()
    {
        return $this->belongsTo('App\Specialite','specialite_id');
    }
    public function specialite()
    {
        return $this->belongsTo('App\Specialite','specialite_id');
    }
    public function promo()
    {
        return $this->belongsTo('App\Promo','promo_id');
    }


}

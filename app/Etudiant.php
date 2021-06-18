<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'groupe_id','nom', 'prenom','sexe','naissance','phone','email','adresse','photo',
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
}

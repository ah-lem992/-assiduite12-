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
}

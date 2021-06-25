<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Groupe;

class Promo extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
        'annee',
        'created_at',
        'updated_at',
    ];
    //use SoftDeletes;
    //
    //protected $dates = ['deleted_at'];
    public function groupe()
    {
        return $this->hasMany('App\Groupe','groupe_id');
    }
    public function specialite()
    {
        return $this->hasMany('App\Specialite','specialite_id');
    }
    public function etudiant()
    {
        return $this->hasMany('App\Etudiant','etud_id');
    }
    public function seance()
    {
        return $this->hasMany('App\Seance','id');
    }
    public function presence()
    {
        return $this->hasMany('App\Presence', 'presence_id');
    }
}

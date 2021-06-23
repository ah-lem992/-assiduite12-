<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialite extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = "specialite_id";
    protected $fillable = [
        'specialite',
        'promo_id',
        'created_at',
        'updated_at',
    ];
    public function promo()
    {
        return $this->belongsTo('App\Promo', 'promo_id');
    }
    public function groupe()
    {
        return $this->hasMany('App\Groupe', 'groupe_id');
    }
    public function etudiant()
    {
        return $this->hasMany('App\Etudiants', 'etud_id');
    }
    public function seance()
    {
        return $this->hasMany('App\Seance', 'id');
    }
}

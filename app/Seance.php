<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seance extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id";
    protected $fillable = [
        'cour_id',
         'type' ,
        'prof_id',
        'salle_id',
        'day',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'promo_id',
        'groupe_id',
        'specialite_id',
    ];
    protected $dates = ['deleted_at'];
    public function cour()
    {
        return $this->belongsTo('App\Cour','cour_id');
    }
    function salle()
    {
        return $this->belongsTo('App\Salle','salle_id');
    }
    public function prof()
    {
        return $this->belongsTo('App\Prof','prof_id');
    }
    public function groupe()
    {
        return $this->belongsTo('App\Groupe','groupe_id');
    }
    public function promo()
    {
        return $this->hasMany('App\Promo','promo_id');
    }
    public function specialite()
    {
        return $this->belongsTo('App\Specialite','speacialite_id');
    }



}

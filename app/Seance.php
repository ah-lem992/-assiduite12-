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


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Prof;
use App\Seance;

class Cour extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nom'
    ];
    protected $primaryKey = "cour_id";

    public function profs()
    {
        return $this->belongsToMany('App\Prof','cour_prof','cour_id','prof_id');
    }
    public function seance()
    {
        return $this->hasmany('App\Seance',);
    }
}

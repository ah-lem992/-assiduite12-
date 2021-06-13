<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Seance;

class Prof extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nom', 'grade'
    ];
    protected $primaryKey = "prof_id";

    public function cours()
    {
        return $this->belongsToMany('App\Cour','cour_prof','prof_id','cour_id');
    }
    public function seance()
    {
        return $this->hasmany('App\Seance');
    }
    public function etudiant()
    {
        return $this->hasmany('App\Etudiant','etud_id');
    }
    public function presences()
    {
        return $this->hasmany('App\Presence','presence_id');
    }

}

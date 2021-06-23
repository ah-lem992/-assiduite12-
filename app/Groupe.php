<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Promo;
use App\Etudiant;

class Groupe extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = "groupe_id";
    protected $fillable = ['groupe', 'promo_id','specialite_id'];

    public function promo()
    {
        return $this->belongsTo('App\Promo' ,'promo_id');
    }
    public function seances()
    {
        return $this->hasmany('App\Seance');
    }
    public function etudiant()
    {
        return $this->hasmany('App\Etudiant','etud_id');
    }
    public function presence()
    {
        return $this->hasmany('App\Presence');
    }
    public function specialite()
    {
        return $this->belongsTo('App\Specialite' ,'specialite_id');
    }
}

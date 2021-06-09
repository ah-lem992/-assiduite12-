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
    protected $fillable = ['groupe', 'promo_id'];

    public function promo()
    {
        return $this->belongsTo('App\Promo');
    }
    public function seances()
    {
        return $this->hasmany('App\Seance');
    }
    public function etudiant()
    {
        return $this->hasmany('App\Etudiant');
    }
}

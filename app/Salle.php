<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salle extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'num'
    ];
    protected $primaryKey = "salle_id";

    public function seance()
    {
        return $this->hasmany('App\Seance','id');
    }
}

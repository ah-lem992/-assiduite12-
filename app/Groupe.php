<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Promo;

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
}

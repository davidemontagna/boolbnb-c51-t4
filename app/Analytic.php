<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $fillable = ['apartment_id', 'search', 'view', 'like', 'user_ip'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}

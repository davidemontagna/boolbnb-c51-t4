<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ['address', 'city', 'country'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}

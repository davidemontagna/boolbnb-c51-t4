<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ['apartment_id', 'address', 'city', 'country', 'lat', 'lon'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ['address', 'city', 'country', 'lat', 'lon', 'apartment_id'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}

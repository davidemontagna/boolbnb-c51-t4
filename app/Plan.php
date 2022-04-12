<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['price', 'duration'];
    
    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}

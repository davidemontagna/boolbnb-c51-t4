<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['price', 'duration', 'title'];
    
    public function apartments() {
        return $this->belongsToMany('App\Apartment')->withPivot('date_start', 'date_end');
    }
}

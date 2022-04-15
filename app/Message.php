<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'sender_email', 'sender_name', 'visualized', 'answered'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}

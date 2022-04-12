<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['apartment_id', 'content', 'sender_email', 'sender_name', 'visualized', 'answered', 'filed'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}

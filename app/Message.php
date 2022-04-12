<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'sender_email', 'sender_name'];

    public function apartment() {    
        return $this->belongsTo('App\Apartment');
    }
}

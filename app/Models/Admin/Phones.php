<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
     protected $fillable = ['phone'];

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
}

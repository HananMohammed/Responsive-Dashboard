<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandClass2 extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function products(){

    return $this->hasMany(Fruits::class,'class_id');


}
}

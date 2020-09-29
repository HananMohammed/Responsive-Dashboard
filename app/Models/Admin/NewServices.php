<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class NewServices extends Model
{
    public  function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function sluggable(){
        return [
            'slug_en' =>[
                'source'=>'name_en'
            ]
        ];
    }
}

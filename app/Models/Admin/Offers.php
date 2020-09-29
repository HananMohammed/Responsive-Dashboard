<?php

namespace App\Models\Admin;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{   //Use Sluggable;
    public function user(){
        return $this->belongsTo(User::class ,'created_by');
    }

   // public function sluggable(){
//        return [
//            'slug_en' =>[
//                'source'=>'name_en'
//            ]
//        ];
//    }
}

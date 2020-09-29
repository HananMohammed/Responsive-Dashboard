<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class BrandName extends Model
{
    public  function user(){
        return $this->belongsTo(User::class,'created_by');
    }
//    public function deletBrand(){
//        return $this->belongsTo(BrandClass2::class ,'brand_id');
//}

    public function BrandClass(){
        return $this->hasmany(BrandClass2::class ,'brand_id');
    }

 }

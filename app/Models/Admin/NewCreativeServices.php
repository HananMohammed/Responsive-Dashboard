<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class NewCreativeServices extends Model
{
    protected $fillable  = ['name_en' , 'name_ar' ,'text_en' ,'text_ar' ,'created_by'] ;

    public  function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}

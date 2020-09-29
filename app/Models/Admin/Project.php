<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public  function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function category(){
        return $this->hasmany(category::class ,'id');
    }
    protected $fillable = ["images"] ;
}

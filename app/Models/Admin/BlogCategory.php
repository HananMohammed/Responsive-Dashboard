<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

     public function user(){
         return $this->belongsTo(User::class, 'created_by');
     }
}

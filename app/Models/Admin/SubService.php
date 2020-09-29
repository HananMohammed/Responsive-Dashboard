<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    public function user(){
       return $this->belongsTo(User::class ,'created_by');
}
}

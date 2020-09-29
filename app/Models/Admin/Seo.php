<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
                            "title_en" ,
                            "title_ar",
                            "description_en",
                            "description_ar",
                            "keyword_en" ,
                            "keyword_ar",
                            "script_head",
                            "script_footer",
                            "created_by",
                            ];
    public  function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}

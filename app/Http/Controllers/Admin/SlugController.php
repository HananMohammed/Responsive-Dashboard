<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SlugController extends Controller
{
    public function checkOffersSlug(Request $request){

        $slug = Str::slug($request->name_en , '-');
        return response()->json(['slug' => $slug]);

    }

}

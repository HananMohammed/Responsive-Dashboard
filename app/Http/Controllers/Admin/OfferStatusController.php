<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Offers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferStatusController extends Controller
{
    public function offerStatus(Request $request)
    {
        if($request->json()){

            $offer = Offers::find($request->id);
            $offer->offer_status = $request->offer_status ;
            $offer->save();
        return response()->json(['success'=>'Offer Status change successfully.']);

        }else{

        return response()->json(['Fail'=>'Fail change Offer Status .']);
        }


    }
}

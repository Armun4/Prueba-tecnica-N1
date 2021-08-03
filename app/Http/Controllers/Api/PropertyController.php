<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;



class PropertyController extends Controller
{
    public function index(){
       $properties = Property::all();

        return response()->json($properties, 200);
    }
    public function create(Request $request){
       
        $property = Property::create([
        'title'=>$request->title,
        'price'=>$request->price,
        'location'=>$request->location,
        'operationType'=>$request->operationType,
        'type'=>$request->type,
        'rooms'=>$request->rooms,
        'baths'=>$request->baths,
        'agencyID'=>$request->agencyID
        ]);
        $product->save();
        return response()->json($property, 200);
    }
    public function uptade(Request $request, $id){
       
        $property = Property::update([
            'title'=>$request->title,
            'price'=>$request->price,
            'location'=>$request->location,
            'operationType'=>$request->operationType,
            'type'=>$request->type,
            'rooms'=>$request->rooms,
            'baths'=>$request->baths,
            'agencyID'=>$request->agencyID
            ]);

        $property->save();


    }



}

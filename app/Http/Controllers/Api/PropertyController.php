<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Spatie\QueryBuilder\QueryBuilder;



class PropertyController extends Controller
{
    public function index()
    {
        $properties = QueryBuilder::for(Property::class)
            ->allowedFilters('agencyID')
            ->get();
        return response()->json($properties, 200);
    }
    public function create(Request $request)
    {

        $property = Property::create([
            'title' => $request->title,
            'price' => $request->price,
            'location' => $request->location,
            'operationType' => $request->operationType,
            'type' => $request->type,
            'rooms' => $request->rooms,
            'baths' => $request->baths,
            'agencyID' => $request->agencyID
        ]);
        $property->save();
        return response()->json($property, 200);
    }
    public function update(Request $request, $id)
    {

        $property = Property::find($id);


        $property->update([
            'title' => $request->title ? $request->title : $property->title,
            'price' => $request->price ? $request->price : $property->price,
            'location' => $request->location ? $request->location : $property->location,
            'operationType' => $request->operationType ? $request->operationType : $property->operationType,
            'type' => $request->type ? $request->type : $property->type,
            'rooms' => $request->rooms ? $request->rooms : $property->rooms,
            'baths' => $request->baths ? $request->baths : $property->baths,
            'agencyID' => $request->agencyID ? $request->agencyID : $property->agencyID
        ]);

        $property->save();
        return response()->json($property, 200);
    }
}

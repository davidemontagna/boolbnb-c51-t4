<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Apartment;
use App\Location;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        
        if (null !== $request->get('lat')) {
            $data['lat'] = $request->get('lat');
        }else {
            $data['lat'] = false;
        }

        if (null !== $request->get('lon')) {
            $data['lon'] = $request->get('lon');
        }else {
            $data['lon'] = false;
        }

        $apartments = Apartment::with('location', 'plans', 'services')->get();
        $filteredApartments = [];
        
        if ($data['lat'] && $data['lon']) {
            $R = 6372.79547;
            $latA = round($data['lat'] * (M_PI / 180), 14);
            $lonA = round($data['lon'] * (M_PI / 180), 14);
            foreach ($apartments as $apartment) {
    
                $latB = round($apartment->location['lat'] * (M_PI / 180), 14);
                $lonB = round($apartment->location['lon'] * (M_PI / 180), 14);
    
                $distance = $R * acos(sin($latA) * sin($latB) + cos($latA) * cos($latB) * cos($lonA - $lonB));
                
                if ($distance <= $data['range'] || $distance == $data['range']) {
                    array_push($filteredApartments, $apartment);
                }
            }
            $apartments = $filteredApartments;
        }

        return response()->json($apartments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->with('location', 'services')->first();

        if (empty($apartment)) {
            return response()->json(['message' => 'Apartment not found'], 404);
        }

        return response()->json($apartment);
    }

}

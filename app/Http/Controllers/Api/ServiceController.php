<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){

        $services = Service::with("apartments")->get();

        return response()->json($services);
    }

    public function show($slug){

        $services = Service::where("slug", $slug)->with(["apartments"])->first();

        // 404
        if( empty($services) ) {
            return response()->json(["message" => "Service Not FOund"], 404);
        }
        
        return response()->json($services);
    }
}

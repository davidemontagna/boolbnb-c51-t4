<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Apartment;
use App\Service;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ApartmentController extends Controller
{
    protected $validation = [
        'title'=>'required|max:255|string',
        'num_rooms'=>'required|int',
        'num_beds'=>'required|int',
        'num_bath'=>'required|int',
        'num_guest'=>'required|int',
        'price'=>'required|numeric|between:0.00,9999.99',
        'square_footage'=>'required|int',
        'preview'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'visible'=>'required|boolean',
        'description'=>'nullable',
        'address_obj' => 'required',        

        'services' => 'exists:services,id',        
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', auth()->user()->id)->get();
        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('user.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['address_obj'] == 'old'){
            $request['address_obj'] = ''; 
        };

        $request->validate($this->validation);
        $request['user_id'] = auth()->id();
        $form_data = $request->all();

        if(isset($form_data['preview'])){
            $img_path = Storage::put('uploads', $form_data['preview']);
            $form_data['preview'] = $img_path;
        }

        $tempSlug = Str::of($form_data['title'])->slug("-");
        $count = 1;
        while(Apartment::where('slug', $tempSlug)->first()){
            $tempSlug = Str::of($form_data['title'])->slug("-").'-'.$count;
            $count ++;
        }
        $form_data['slug'] = $tempSlug;

        $new_apartment = new Apartment();
        $new_apartment->fill($form_data);
        $new_apartment->save();

        if(isset($form_data['services'])){
            $new_apartment->services()->sync($form_data['services']);
        }


        $locationObj = json_decode($form_data['address_obj'], true);
        $dataLocation = [
            'apartment_id' => $new_apartment['id'],
            'address' => $locationObj['address']['streetName'].', '.$locationObj['address']['streetNumber'],
            'city' => $locationObj['address']['municipality'],
            'country' => $locationObj['address']['country'],
            'lat' => $locationObj['position']['lat'],
            'lon' => $locationObj['position']['lon'],
        ];

        $new_location = new Location();
        $new_location->fill($dataLocation);
        $new_location->save();
        
        return redirect()->route('user.apartments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        if(!$apartment){
            abort(404);
        }
        return view('user.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        $location = Location::where('apartment_id', $apartment['id'])->first();
        return view('user.apartments.edit', compact('apartment', 'services', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate($this->validation);

        $form_data = $request->all();

        if(isset($form_data['preview'])){
            $img_path = Storage::put('uploads', $form_data['preview']);
            $form_data['preview'] = $img_path;
        }

        if($apartment->title == $form_data['title']){
            $tempSlug = $apartment->slug;
        }else{
            $tempSlug = Str::of($form_data['title'])->slug("-");
            $count = 1;
            while(Apartment::where('slug', $tempSlug)->where('id', '!=', $apartment->id)->first()){
                $tempSlug = Str::of($form_data['title'])->slug("-").'-'.$count;
                $count ++;
            }
        }
        $form_data['slug'] = $tempSlug;

        $apartment->update($form_data);

        $apartment->services()->sync(isset($form_data['services']) ? $form_data['services'] : []);

        if ($form_data['address_obj'] != 'old') {
            $locationObj = json_decode($form_data['address_obj'], true);
    
            $dataLocation = [
                'apartment_id' => $apartment['id'],
                'address' => $locationObj['address']['streetName'].', '.$locationObj['address']['streetNumber'],
                'city' => $locationObj['address']['municipality'],
                'country' => $locationObj['address']['country'],
                'lat' => $locationObj['position']['lat'],
                'lon' => $locationObj['position']['lon'],
            ];
    
            $location = Location::where('apartment_id', $apartment['id'])->first();
            $location->update($dataLocation);
        }

        return redirect()->route('user.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('user.apartments.index');
    }
}

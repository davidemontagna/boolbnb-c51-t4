<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Apartment;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ApartmentController extends Controller
{
    protected $validation = [
        'title'=>'required|max:255|string',
        'num_rooms'=>'required|int',
        'num_beds'=>'required|int',
        'num_bath'=>'required|int',
        'square_footage'=>'required|int',
        'preview'=>'nullable',
        'visible'=>'required|boolean',
        'description'=>'nullable',
        

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
        $request->validate($this->validation);
        $request['user_id'] = auth()->id();
        $form_data = $request->all();

        $new_apartment = new Apartment();
        $new_apartment->fill($form_data);
        $new_apartment->save();

        if(isset($form_data['services'])){
            $new_apartment->services()->sync($form_data['services']);
        }

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
        return view('user.apartments.edit', compact('apartment', 'services'));
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

        if($apartment->id == $form_data['id']){
            $id = $apartment->id;
        }else{
            $count = 1;
            while(Apartment::where('id', $id)->where('id', '!=', $apartment->id)->first()){
                $id = $form_data['id']."-".$count;
                $count ++;
            }
        }
        $form_data['id'] = $id;

        $apartment->update($form_data);

        $apartment->services()->sync(isset($form_data['services']) ? $form_data['services'] : []);
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
        //
    }
}

@extends('layouts.app')


@section('content')
<div class="">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mt-5 p-0">
            <a href="{{route("user.apartments.index")}}"><button type="submit" class="mb-4 dm-button">Torna ai tuoi appartamenti</button></a>
        </div>
    </div> 
    <div class="row">
        <div class="col mt-5 p-0">
            <h2 class="mt-2">Seleziona il piano più adatto al tuo appartamento:</h2>
        </div>
    </div>    
    <div class="row d-flex justify-content-between">               
        @foreach ($plans as $plan)
            <div class="col-12 col-md-5 col-lg-3 my-5 dm-card-plan">
                <div class="p-4">
                    <a href="{{route("user.payment",  [$apartment->id, $plan->id])}}" class="d-flex justify-content-center flex-column align-items-center">
                        <h1 class="">{{$plan->title}}</h1>
                        <h4 class="my-3">Prezzo: {{$plan->price}} &euro;</h4>
                        <h5 class="">Valido: {{$plan->duration}} ore</h5>                        
                    </a>
                </div>
            </div>
        @endforeach
    </div>  
    
    <div class="row mb-5">
        <div class="col mt-4 p-0">
            <h4 class=>L'appartamento che vuoi sponsorizzare:</h4>
            <h3 class="mt-3 mb-5 pb-4 border-bottom">{{$apartment->title}}</h3>
            <h4>Anteprima appartamento:</h4>
            <img src="{{ asset("storage/{$apartment->preview}")}}" alt="{{$apartment->title}}" height="150" class="mt-3">
            <div class="pb-4 mb-5 border-bottom"></div>
        </div>
    </div>    
</div>
@endsection
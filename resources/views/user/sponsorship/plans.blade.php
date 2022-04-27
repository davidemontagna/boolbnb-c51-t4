@extends('layouts.app')


@section('content')
<div class="">
    <div class="row">
        <a href="{{route("user.apartments.index")}}">
            <button class="msg-button text-center my-3 p-3">
                <i class="fas fa-chevron-left"></i>
                Indietro
            </button>
        </a>
    </div> 
    
    <div class="row">
        <div class="col mt-5 p-0">
            <h2 class="mt-2">Seleziona il piano più adatto al tuo appartamento:</h2>
        </div>
    </div>    
    <div class="row d-flex justify-content-between align-items-center">               
        
            <div class="col-12 col-md-5 col-lg-3 my-5 dm-card-plan">
                <div class="p-4">
                    <a href="{{route("user.payment",  [$apartment->id, $plans[0]->id])}}" class="d-flex justify-content-center flex-column align-items-center">
                        <h1 class="title">{{$plans[0]->title}}</h1>
                        <h4 class="my-3">{{$plans[0]->price}} &euro;</h4>
                        <h5 class="">Valido {{$plans[0]->duration}} ore</h5>                        
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-3 my-5 dm-card-plan">
                <div class="p-4">
                    <a href="{{route("user.payment",  [$apartment->id, $plans[1]->id])}}" class="d-flex justify-content-center flex-column align-items-center">
                        <h1 class="title">{{$plans[1]->title}}</h1>
                        <h4 class="my-3">{{$plans[1]->price}} &euro;</h4>
                        <h5 class="">Valido {{$plans[1]->duration}} ore</h5>                        
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-3 my-5 dm-card-plan">
                <div class="p-4">
                    <a href="{{route("user.payment",  [$apartment->id, $plans[2]->id])}}" class="d-flex justify-content-center flex-column align-items-center">
                        <h1 class="title">{{$plans[2]->title}}</h1>
                        <h4 class="my-3">{{$plans[2]->price}} &euro;</h4>
                        <h5 class="">Valido {{$plans[2]->duration}} ore</h5>                        
                    </a>
                </div>
                <div class="favourite-tag p-relative text-center text-light"><i class="fa-solid fa-star text-warning"></i> il piu acquistato</div>
            </div>
        
    </div>  
    
    <div class="row mb-5">
        <div class="col mt-4 p-0">
            <h4 class=>L'appartamento che vuoi sponsorizzare:</h4>
            <h3 class="mt-3 mb-5 pb-4 border-bottom">{{$apartment->title}}</h3>
            <h4>Anteprima appartamento:</h4>
            <img src="{{ asset("storage/{$apartment->preview}")}}" alt="{{$apartment->title}}" height="150" class="mt-3 plans-anteprima">
            <div class="pb-4 mb-5 border-bottom"></div>
        </div>
    </div>    
</div>
@endsection
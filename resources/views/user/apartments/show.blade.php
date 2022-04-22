@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section class="ms_container_show_apartment">
        <div class="row justify-content-between mx-3 mt-3">
            <div class="col col-md-3">
                <a href="{{route("user.apartments.index")}}">
                    <button class="announcement-btn text-center my-3 p-3">
                        <i class="fas fa-chevron-left"></i>
                        Indietro
                    </button>
                </a>
            </div>
            <div class="col col-md-3">
                <a href="{{route("user.apartments.edit", $apartment->id)}}">
                    <button class="announcement-btn text-center my-3 p-3">
                        <i class="fas fa-pencil-alt"></i>
                        Modifica
                    </button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            @if ($apartment->user_id == auth()->id())
                <div class="title">
                    <div>{{$apartment->title}}</div>
                    <div>{{$apartment->location->city}}</div>
                </div>
                @if ($apartment->preview)
                    <div class="apartment-img">
                        <img src="{{ asset("storage/{$apartment->preview}")}}" alt="{{$apartment->title}}">
                    </div>
                @endif 
                <div class="structure row row-cols-3 text-center border-top border-bottom">
                    <div class="room col">
                        <div>
                            <i class="fas fa-couch"></i>
                        </div>
                        <div>
                            Stanze
                        </div>
                        {{$apartment->num_rooms}}
                    </div>
                    <div class="bath col">
                        <div>
                            <i class="fas fa-bath"></i>
                        </div>
                        <div>
                            Bagni
                        </div>
                        {{$apartment->num_bath}}
                    </div>
                    <div class="squarefootage col">
                        <div>
                            <i class="fas fa-ruler"></i>
                        </div>
                        <div>
                            Mq
                        </div>
                        {{$apartment->square_footage}}
                    </div>
                </div>
                <section class="description-section">
                    <div class="apartment-description my-3">
                        <h3 class="my-3">
                            Descrizione
                        </h3>
                        {{$apartment->description}}
                    </div>
                    {{-- <div class="apartment-description-button my-3">
                        <i class="fa-solid fa-chevron-down  a-d-button" @click="descriptionFunc()"></i>
                    </div> --}}
                </section>
                <div class="services">
                    Cosa troverai
                    <div class="row row-cols-3 mx-3">
                        @foreach ($apartment->services as $service)
                            <div class="col my-3">
                                <i class="{{$service->icon}}"></i>
                                {{$service->name}}
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h3>Non sei autorizzato a visualizzare questo appartamento.</h3>
                            <a href="{{ route("user.apartments.index") }}"><button type="submit" class="btn btn-primary">Torna alla Dashboard</button></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>



        {{--     <div class="row justify-content-center">
                <div class="col-md-12">

                     <!-- Controllo per vedere se l'utente e' autorizzato a visualizzare quel determinato appartamento -->
                    @if ($apartment->user_id == auth()->id())
                
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h3 class="card-title">Title: {{$apartment->title}}</h3>
                        <h6 class="card-text">ID: {{$apartment->id}}</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Numero di stanze: {{$apartment->num_rooms}}</li>
                            <li class="list-group-item">Posti letto: {{$apartment->num_beds}}</li>
                            <li class="list-group-item">Posti letto: {{$apartment->num_beds}}</li>
                            <li class="list-group-item">Bagni: {{$apartment->num_bath}}</li>
                            <li class="list-group-item">Metri quadri: {{$apartment->square_footage}}</li>
                            @if ($apartment->preview)
                                <li class="list-group-item">Anteprima:
                                    <img style="width: 250px" src="{{ asset("storage/{$apartment->preview}")}}" alt="{{$apartment->title}}">
                                </li>
                            @endif                            
                            <li class="list-group-item">Descrizione: {{$apartment->description}}</li>                       
                        </ul>  
                        <ul class="list-group list-group-flush">                            
                            <li class="list-group-item"> 
                                Servizi:
                                <ul>
                                    @foreach ($apartment->services as $service)
                                    <li>{{$service->name}}</li>
                                    @endforeach
                                </ul>
                                
                            </li>                                                   
                        </ul>                     
                        
                        <div class="card-body"> 
                            <a href="{{route("user.apartments.edit", $apartment->id)}}" ><button type="button" class="btn btn-success mr-2">Edit</button></a>                       
                            <form action="{{route("user.apartments.destroy", $apartment->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")                        
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Vuoi eliminare questo appartamento?')">
                            </form>                        
                        </div>

                        <div class="card-body">
                            <a href="{{route("user.apartments.index")}}" class="card-link"><button type="button" class="btn btn-info">Torna agli appartamenti</button></a>
                        
                        </div>
                    </div>
                    @else
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h3>Non sei autorizzato a visualizzare questo appartamento.</h3>
                                    <a href="{{ route("user.apartments.index") }}"><button type="submit" class="btn btn-primary">Torna alla Dashboard</button></a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div> --}}
    </section>
    
    
@endsection
@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section>
        <div class="container">
            <div class="row justify-content-center">
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
        </div>
    </section>
    
    
@endsection
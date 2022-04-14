@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                
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
                            <li class="list-group-item">Anteprima: {{$apartment->preview}}</li>
                            <li class="list-group-item">Descrizione: {{$apartment->description}}</li>                        
                        </ul>                       
            

                        <div class="card-body">
                            <a href="{{route("user.apartments.index")}}" class="card-link"><button type="button" class="btn btn-info">Torna agli appartamenti</button></a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
@endsection
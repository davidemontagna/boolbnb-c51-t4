@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section class="ms_container_show_apartment">
        <div class="container-fluid">
            <div class="row justify-content-between mx-3 mt-3">
                <div class="col col-md-3 col-xl-2">
                    <a href="{{route("user.apartments.index")}}">
                        <button class="announcement-btn text-center my-3 p-3">
                            <i class="fas fa-chevron-left"></i>
                            Indietro
                        </button>
                    </a>
                </div>
            </div>
            @if ($apartment->user_id == auth()->id())
                <div class="title mx-5">
                    <h1>{{$apartment->title}}</h1>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <h3>{{$apartment->location->city}}</h3>
                        </div>
                        <div class="col">
                            <h5>{{$apartment->location->address}}</h5>
                        </div>
                    </div>
                    
                </div>
                @if ($apartment->preview)
                    <div class="apartment-img my-5 mx-auto">
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
                <div>   
                    <h4>Messaggi:</h4>
                    @if (count($messages)== 0)
                    <p>
                        Nessun Messaggio
                    </p>
                    @endif
                    @foreach ($messages as $message)
                    @if ($message->visualized == 0)
                            <div class="card my-1 p-3">
                                <div class="d-flex justify-content-between m-1">
                                    <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i>
                                    <div class="row row-cols-2 justify-content-center align-intems-center my-1">
                                        <div class="col text-center">
                                            <a href="{{route('user.messages.show', $message->id)}}">
                                                <button class="announcement-btn text-center msg-button" style="width: 6rem">
                                                    Mostra
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col text-center">
                                            <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <input class="announcement-btn text-center msg-button" style="width: 6rem" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$message->id}}">
                                                
                                                <div class="modal modal-danger fade" id="ModalDelete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Elimina:</h5>                                      
                                                        </div>
                                                        <div class="modal-body">Sei sicuro di voler eliminare il messaggio?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                            <input type="submit" class="btn btn-danger" value="Elimina">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-3 ms_break-word font-weight-bold">{{$message->content}}</p>
                                <p class="mb-3 ms_break-word  font-weight-bold">Messaggio inviato da: {{$message->sender_email}}</p>
                                <p class="font-weight-bold">alle: {{$message->created_at}}</p>
                            </div>
                        @endif
                    @endforeach
                    @foreach ($messages as $message)
                    @if ($message->visualized == 1)
                        <div class="card my-1 p-3">
                            <div class="d-flex justify-content-between m-1">
                                <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i>
                                <div class="row row-cols-2 justify-content-center align-intems-center my-1">
                                    <div class="col text-center">
                                        <a href="{{route('user.messages.show', $message->id)}}">
                                            <button class="announcement-btn text-center msg-button" style="width: 6rem">
                                                Mostra
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <input class="announcement-btn text-center msg-button" style="width: 6rem" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$message->id}}">
                                            
                                            <div class="modal modal-danger fade" id="ModalDelete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Elimina:</h5>                                      
                                                    </div>
                                                    <div class="modal-body">Sei sicuro di voler eliminare il messaggio?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                        <input type="submit" class="btn btn-danger" value="Elimina">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-3 ms_break-word">{{$message->content}}</p>
                            <p class="mb-3 ms_break-word">Messaggio inviato da: {{$message->sender_email}}</p>
                            <p class="">alle: {{$message->created_at}}</p>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div>
                    <h4>Storico sponsorizzazioni:</h4>
                    @if ($closeEnd)
                    <div class="alert alert-danger" role="alert">
                        La tua sponsorizzazione sta per terminare!
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Piano</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Durata</th>
                                <th scope="col">Inizio</th>
                                <th scope="col">Fine</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apartment->plans as $index => $sponsorship)
                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$sponsorship->title}}</td>
                                    <td>{{$sponsorship->price}}</td>
                                    <td>{{$sponsorship->duration}}</td>
                                    <td>{{DateTime::createFromFormat('Y-m-d H:i:s', $sponsorship->pivot->date_start)->format('d-m-Y H:i')}}</td>
                                    <td>{{DateTime::createFromFormat('Y-m-d H:i:s', $sponsorship->pivot->date_end)->format('d-m-Y H:i')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>      
                    </div>
                </div>
                <div class="col col-lg-3 my-3 mx-auto">
                    <a href="{{route("user.apartments.edit", $apartment->id)}}">
                        <button class="announcement-btn text-center my-3 p-3">
                            <i class="fas fa-pencil-alt"></i>
                            Modifica
                        </button>
                    </a>
                </div>
            @else
                    <div class="text-center mt-3">
                        <h3>Non sei autorizzato a visualizzare questo appartamento.</h3>
                        {{-- <a href="{{ route("user.apartments.index") }}"><button type="submit" class="btn btn-primary">Torna alla Dashboard</button></a> --}}
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
                            <a href="{{route("user.apartments.edit", $apartment->id)}}" ><button type="button" class="btn btn-success mr-2">Modifica</button></a>                       
                            <form action="{{route("user.apartments.destroy", $apartment->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")                        
                                <input class="btn btn-danger" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$apartment->id}}">
                            
                                <div class="modal modal-danger fade" id="ModalDelete{{$apartment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Elimina:</h5>                                      
                                        </div>
                                        <div class="modal-body">Sei sicuro di voler eliminare {{$apartment->title}}?</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                            <input type="submit" class="btn btn-danger" value="Elimina">
                                        </div>
                                    </div>
                                    </div>
                                </div>
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
@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section>
        <a href="{{route("user.messages.index")}}" class="d-inline-block mt-2 mr-2">
            <button class="my-3 p-3 msg-button">
                <i class="fas fa-chevron-left"></i>
                Indietro
            </button>
        </a>  
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-7">
                    <!-- Controllo per vedere se l'utente e' autorizzato a visualizzare quel determinato messaggio -->
                    @if ($message->apartment->user_id == auth()->id())
                        <div class="card text-center ms_container_show_messages">
                            <div class="card-header">
                                <h3>Messaggio</h3>
                                <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}; font-size: 2rem"></i> 
                            </div>
                            <div class="card-body">
                                <h4>Da: {{$message->sender_name}} - {{$message->sender_email}}</h4>
                                <p class="card-text">{{$message->content}}</p>
                                <h6 class="card-title">Struttura: {{$message->apartment->title}}</h6>
                                <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img-top mb-3" alt="...">
                                <div>
                                    <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block"><button type="button" class="announcement-btn text-center msg-button" style="width: 6rem">Edit</button></a>
                                    <form action="{{route('user.messages.destroy', $message->id)}}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <input class="announcement-btn text-center msg-button" style="width: 6rem" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$message->id}}">
                                        
                                        <div class="modal modal-danger fade" id="ModalDelete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="myModalLabel">Elimina:</h5>                                      
                                                </div>
                                                <div class="modal-body text-dark">Sei sicuro di voler eliminare il messaggio?</div>
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
                            <div class="card-footer text-muted ms_data">
                                Ricevuto il: {{$message->created_at->format('j-m-Y h:m:s')}} 
                            </div>
                        </div>
                    @else
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h3>Non sei autorizzato a visualizzare questo messaggio.</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    
@endsection
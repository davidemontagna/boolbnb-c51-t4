@extends('layouts.app')

@section('title', 'Create')

@section('content')
<section>
    <div class="container-fluid ms_container_index_messages mt-2" id="messages">
        <a href="{{route('login')}}" class="d-inline-block mr-2">
            <button class="announcement-btn text-center my-3 p-3">
                <i class="fas fa-chevron-left"></i>
                Indietro
            </button>
        </a>                    
        <div class="row d-flex justify-content-center align-items-center m-4">
            <h1 class="container">Messaggi da leggere</h1>
            @foreach ($messages as $message)
                @if ($message->visualized == 0)
                <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-light">
                    <div class="card col-12 col-md-4 col-xl-3 m-1 messaggio msg-da-leggere {{ ($message->visualized == 0) ? 'text-white bg-dark' : '' }}" style="width: 20rem !important;">
                        <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img mt-3" alt="...">
                        <div class="card-body m-3">
                            <p class="card-text d-flex justify-content-between">{{$message->created_at}} <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i></p>
                            <h5 class="card-title msg-card-ellipsis">{{$message->apartment->title}}</h5>
                            <p class="card-text msg-card-ellipsis mb-3">{{$message->content}}</p>
                            <div class="d-flex justify-content-center align-intems-center">
                                <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block mr-2"><button type="button" class="announcement-btn text-center msg-button" style="width: 6rem">Edit</button></a>                    
                                <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
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
                    </div>
                </a> 
                @endif
            @endforeach
            <h1 class="container">Messaggi già letti</h1>
            @foreach ($messages as $message)
                @if ($message->visualized == 1)
                <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-dark">
                    <div class="card col-12 col-md-4 col-xl-3 m-1 messaggio msg-da-leggere {{ ($message->visualized == 0) ? 'text-white bg-dark' : '' }}" style="width: 20rem !important;">
                        <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img-top mt-3" alt="...">
                        <div class="card-body">
                            <p class="card-text d-flex justify-content-between">{{$message->created_at}} <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i></p>
                            <h5 class="card-title msg-card-ellipsis">{{$message->apartment->title}}</h5>
                            <p class="card-text msg-card-ellipsis mb-3">{{$message->content}}</p>
                            <div class="d-flex justify-content-center align-intems-center">
                                <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block mr-2"><button type="button" class="announcement-btn text-center msg-button" style="width: 6rem">Edit</button></a>                    
                                <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
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
                    </div>
                </a> 
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection


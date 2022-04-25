@extends('layouts.app')

@section('title', 'Create')

@section('content')
{{-- <section>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Apartment id</th>
                <th scope="col">Messaggio</th>
                <th scope="col">email</th>
                <th scope="col">nome</th>
                <th scope="col">visualizzato</th>
                <th scope="col">risposta</th>
                <th scope="col">user id</th>
                <th scope="col">azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td scope="row">{{$message->id}}</td>
                    <td>{{$message->apartment_id}}</td>
                    <td>{{$message->content}}</td>
                    <td>{{$message->sender_email}}</td>
                    <td>{{$message->sender_name}}</td>
                    <td>{{$message->visualized}}</td>
                    <td>{{$message->answered}}</td>
                    <td>{{$message->apartment->user_id}}</td>
                    <td>
                        <a href="{{route('user.messages.show', $message->id)}}" class="d-inline-block"><button type="button" class="btn btn-secondary">Show</button></a> 
                        <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block"><button type="button" class="btn btn-primary">Edit</button></a>                    
                        <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input class="btn btn-danger" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$message->id}}">
                            
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
                    </td> 
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</section>
@endsection --}}

<section>
    
    <div class="col col-md-3">
        <a href="{{route("login")}}">
            <button class="announcement-btn text-center my-3 p-3 msg-button">
                <i class="fas fa-chevron-left"></i>
                Indietro
            </button>
        </a>
    </div>

    <div class="container-fluid ms_container_index_messages mt-2" id="messages">
        <div class="m-4">
            @foreach ($messages as $message)
                <div class="msg-da-leggere mt-3 row row-cols-1 row-cols-md-2 align-items-start">
                    <div class="ms_img col p-3">
                        <img src="{{ asset("storage/{$message->apartment->preview}")}}" alt="">
                    </div>
                    <div class="col">
                        <h2>
                            {{$message->apartment->title}}
                        </h2>
                        <h3 class="d-inline-block">
                            {{$message->apartment->location->city}} -
                        </h3>
                        <h5 class="d-inline-block">
                            {{$message->apartment->location->address}}
                        </h5>

                        <div class="ms_text p-3">
                            <div class="row">
                                @if ($message->visualized == 0)
                                    <div class="col">
                                        Messaggi da leggere
                                        {{-- @foreach ($messages as $message) --}}
                                            <div class="card my-1">
                                                <div class="d-flex justify-content-between m-1">
                                                    <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i>
                                                    <div class="row row-cols-2 justify-content-center align-intems-center my-1">
                                                        <div class="col text-center">
                                                            <a href="{{route('user.messages.edit', $message->id)}}">
                                                                <button class="announcement-btn text-center msg-button" style="width: 6rem">
                                                                    Edit
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
                                        {{-- @endforeach --}}
                                    </div>
                                @endif
                            </div>
                            @if ($message->visualized == 1)
                                <div>
                                    Messaggi letti
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
                @endforeach




                    {{-- <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-light">
                        <div class="card col-12 col-md-6 col-xl-3 msg-da-leggere {{ ($message->visualized == 0) ? 'text-white bg-dark' : '' }}" style="width: 20rem !important; height:600px; border: 3px solid white; border-radius: 1rem">
                            <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img-top mt-3" alt="..." style="max-height:350px">
                            <div class="card-body">
                                <p class="card-text d-flex justify-content-between">{{$message->created_at}} <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i></p>
                                <h5 class="card-title msg-card-ellipsis mt-xl-3">{{$message->apartment->title}}</h5>
                                <p class="card-text msg-card-ellipsis mb-3 mt-xl-2">{{$message->content}}</p>
                                <div class="d-flex justify-content-center align-intems-center mt-xl-3">
                                    <div class="col-6 text-center">
                                        <a href="{{route('user.messages.edit', $message->id)}}">
                                            <button class="announcement-btn text-center my-3 p-3 msg-button" style="width: 6rem">
                                                Edit
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="announcement-btn text-center my-3 p-3 msg-button" style="width: 6rem">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif 
            @endforeach --}}
        </div>
    </div>

    <div class="container col-12 mt-2" id="messages">
        <div class="col-12 text-center">Messaggi visualizzati</div>
        <div class="row d-flex justify-content-start align-items-start m-4">
            @foreach ($messages as $message)
                @if ($message->visualized == 1)
                <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-dark">
                    <div class="card col-12 col-md-6 col-xl-3 {{ ($message->visualized == 0) ? 'text-white bg-dark' : '' }}" style="width: 20rem !important; height:600px; border: 3px solid white; border-radius: 1rem; box-shadow: inset 0 0 0 3px rgb(216, 216, 216)">
                        <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img-top mt-3" alt="..." style="max-height:350px">
                        <div class="card-body">
                            <p class="card-text d-flex justify-content-between">{{$message->created_at}} <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i></p>
                            <h5 class="card-title msg-card-ellipsis mt-xl-3">{{$message->apartment->title}}</h5>
                            <p class="card-text msg-card-ellipsis mb-3 mt-xl-2">{{$message->content}}</p>
                            <div class="d-flex justify-content-center align-intems-center mt-xl-3">
                                <div class="col-6 text-center">
                                    <a href="{{route('user.messages.edit', $message->id)}}">
                                        <button class="announcement-btn text-center my-3 p-3 msg-button" style="width: 6rem">
                                            Edit
                                        </button>
                                    </a>
                                </div>
                                <div class="col-6 text-center">
                                    
                                    <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <input class="announcement-btn text-center my-3 p-3 msg-button" style="width: 6rem" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$message->id}}">
                                        
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
                    </div>
                </a> 
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection

{{-- @foreach ($messages as $message)
@if ($message->visualized == 1)
<a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-dark">
    <div class="card col-12 col-md-4 col-xl-3 m-1 messaggio msg-da-leggere {{ ($message->visualized == 0) ? 'text-white bg-dark' : '' }}" style="width: 20rem !important;">
        <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img-top mt-3" alt="...">
        <div class="card-body">
            <p class="card-text d-flex justify-content-between">{{$message->created_at}} <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}"></i></p>
            <h5 class="card-title msg-card-ellipsis">{{$message->apartment->title}}</h5>
            <p class="card-text msg-card-ellipsis mb-3">{{$message->content}}</p>
            <div class="d-flex justify-content-center align-intems-center">
                <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block mr-2"><button type="button" class="btn btn-primary">Edit</button></a>                    
                <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</a> 
@endif
@endforeach --}}

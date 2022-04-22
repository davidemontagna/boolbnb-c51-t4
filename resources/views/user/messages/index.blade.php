<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Messaggi</title>
</head>
<body>
    
    <div class="col col-md-3">
        <a href="{{route("login")}}">
            <button class="announcement-btn text-center my-3 p-3 msg-button">
                <i class="fas fa-chevron-left"></i>
                Indietro
            </button>
        </a>
    </div>

    <div class="container col-12 mt-2" id="messages">
        <div class="col-12 text-center">Messaggi non visualizzati</div>
        <div class="row d-flex justify-content-start align-items-start m-4">
            @foreach ($messages as $message)
                @if ($message->visualized == 0)
                <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-light">
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
            @endforeach
        </div>
    </div>

    <div class="container col-12 mt-2" id="messages">
        <div class="col-12 text-center">Messaggi visualizzati</div>
        <div class="row d-flex justify-content-start align-items-start m-4">
            @foreach ($messages as $message)
                @if ($message->visualized == 0)
                <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-dark">
                    <div class="card col-12 col-md-6 col-xl-3 {{ ($message->visualized == 1) ? 'text-white bg-dark' : '' }}" style="width: 20rem !important; height:600px; border: 3px solid white; border-radius: 1rem; box-shadow: inset 0 0 0 3px rgb(216, 216, 216)">
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
            @endforeach
        </div>
    </div>
</body>
</html>

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
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
    
    <div class="container mt-2" id="messages">
        <a href="{{route('login')}}" class="d-inline-block mr-2"><button type="button" class="btn btn-danger">back</button></a>                    
        <div class="row d-flex justify-content-center align-items-center m-4">
            <h1 class="container">Messaggi da leggere</h1>
            @foreach ($messages as $message)
                @if ($message->visualized == 0)
                <a href="{{route('user.messages.show', $message->id)}}" class="text-decoration-none text-light">
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
            @endforeach
        </div>
</body>
</html>
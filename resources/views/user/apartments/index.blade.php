<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Test</title>
</head>
<body>
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('user.apartments.create') }}" class="btn btn-primary">Aggiungi appartamento</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                <tr>
                    <td scope="row">{{$apartment->id}}</td>
                    <td>{{$apartment->user_id}}</td>
                    <td>{{$apartment->title}}</td>
                    <td class="d-flex justify-content-start align-items-center">
                        <a href="{{route("user.apartments.show", $apartment->id)}}"><button type="button" class="btn btn-info">Show</button></a> 
                        <a href="{{route("user.apartments.edit", $apartment->id)}}" class="mx-2"><button type="button" class="btn btn-success">Edit</button></a>                       
                        <form action="{{route("user.apartments.destroy", $apartment->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                        
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</body>
</html>

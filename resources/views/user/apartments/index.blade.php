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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User id</th>
                <th scope="col">Titolo</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                <tr>
                    <td scope="row">{{$apartment->id}}</td>
                    <td>{{$apartment->user_id}}</td>
                    <td>{{$apartment->title}}</td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</body>
</html>

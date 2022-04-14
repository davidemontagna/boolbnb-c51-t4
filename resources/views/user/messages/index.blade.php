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
                <th scope="col">Apartment id</th>
                <th scope="col">Messaggio</th>
                <th scope="col">email</th>
                <th scope="col">nome</th>
                <th scope="col">visualizzato</th>
                <th scope="col">rispsota</th>
                <th scope="col">user id</th>
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
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</body>
</html>
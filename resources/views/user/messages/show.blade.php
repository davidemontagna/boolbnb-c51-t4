@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Controllo per vedere se l'utente e' autorizzato a visualizzare quel determinato messaggio -->
                    @if ($message->apartment->user_id == auth()->id())
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h3 class="card-title">Messaggio</h3>
                        <h5 class="card-text">ID: {{$message->id}}</h5>
                        <h5 class="card-text">ID Appartmento: {{$message->apartment_id}}</h5>
                        <h5>Email mittente: {{$message->sender_email}}</h5>
                        <h5>Nome mittente: {{$message->sender_name}}</h5>
                        <p>{{$message->content}}</p>
                        <h5>Visualizzato: {{$message->visualized}}</h5>
                        <h5>Risposto:{{$message->answered}}</h5>
                        <h5>User id:{{$message->apartment->user_id}}</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{route("user.messages.index")}}" class="card-link"><button type="button" class="btn btn-info">Torna ai Messaggi</button></a>
                        
                        </div>
                    </div>
                    @else
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h3>Non sei autorizzato a visualizzare questo messaggio.</h3>
                                    <a href="{{ route("user.messages.index") }}"><button type="submit" class="btn btn-primary">Torna ai Messaggi</button></a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    
@endsection
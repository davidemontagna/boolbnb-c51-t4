@extends('layouts.app')

@section('title', 'Show')

@section('content')    
    
    <section>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Controllo per vedere se l'utente e' autorizzato a visualizzare quel determinato messaggio -->
                    @if ($message->apartment->user_id == auth()->id())
                    <div class="card text-center" style="border: none">
                        <div class="card-header">
                          Da: {{$message->sender_name}} - {{$message->sender_email}}
                        </div>
                        <div class="card-body">
                            <img src="{{ asset("storage/{$message->apartment->preview}")}}" class="card-img-top m-4" alt="..." style="width: 35vw">
                            <h5 class="card-title">{{$message->apartment->title}}</h5>
                            <p class="card-text text-left">
                                <div class="card">
                                    <div class="card-header">Messaggio :</div>
                                    <div class="card-body text-secondary">
                                      <h5 class="card-title">Secondary card title</h5>
                                      <p class="card-text">{{$message->content}}</p>
                                    </div>
                                    <i class="fa-solid fa-comments" style="{{ ($message->answered == 0) ? 'color: red' : 'color: #9fff6b' }}; font-size: 2rem; margin-bottom: 2rem"></i>
                                  </div>
                            </p>
                            <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block mr-2"><button type="button" class="btn btn-danger">Edit</button></a>
                        </div>
                        <div class="card-footer text-muted">
                            {{$message->created_at}} 
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
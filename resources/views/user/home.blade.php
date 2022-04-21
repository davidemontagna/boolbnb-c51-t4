@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="profile px-5 py-4">
        <div class="mb-3">
            Bentornato, {{ Auth::user()->name }} {{ Auth::user()->surname }}
        </div>
        <a href="">
            <button class="announcement-btn text-center mb-3">
                <i class="fas fa-plus"></i> Pubblica annuncio  
            </button>
        </a>
    </div>
    <div class="row mx-3">
        <div class="dashboard col-4 mx-2 border rounded">
            <div class="message ">
                <i class="fas fa-comment"></i>
                Messaggi
            </div>
            <div class="">
                <i class="fas fa-edit"></i>
                Gestisci gli annunci
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col mr-2 border rounded">
                    <div>
                        {{-- {{$apartments->user_id}} --}}
                        Annunci
                        <i class="fas fa-home"></i>
                    </div>
                </div>
                <div class="col mr-2 border rounded">
                    <div>
                        {{-- {{apartment.user_id}} --}}
                        Messaggi
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="col mr-2 border rounded">
                    <div>
                        {{-- {{analytics.view}} --}}
                        Visualizzazioni Totali
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        
        {{-- <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div> --}}
        
    <a href="{{route("user.apartments.index")}}"><button type="button" class="btn btn-primary">Visualizza gli appartamenti</button></a>
    <a href="{{route("user.messages.index")}}"><button type="button" class="btn btn-primary">Visualizza i messaggi</button></a>
</div>
@endsection

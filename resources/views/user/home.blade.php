@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="profile px-5 py-4">
        <div class="mb-3">
            Bentornato, {{ Auth::user()->name }} {{ Auth::user()->surname }}
        </div>
        <a href="">
            <button class="announcement-btn text-center mb-3">
                <a href="{{ route('user.apartments.create') }}">
                    <i class="fas fa-plus"></i> 
                    Pubblica annuncio
                </a>
            </button>
        </a>
    </div>
    <div class="dashboard row m-4">
        <div class="col-6 mr-2 p-2 border rounded">
            <div class="row row-cols-1">
                <div class="col d-flex flex-column flex-sm-row text-center text-sm-left my-3">
                    <span class="dashboard-icon mx-3">
                        <i class="fas fa-comment"></i>
                    </span>
                    <a href="{{route("user.messages.index")}}" class="">
                        Tutti i messaggi
                    </a>
                </div>
                {{-- <div class="col d-flex flex-column flex-sm-row text-center text-sm-left my-3">
                    <span class="mx-3">
                        <i class="fas fa-edit"></i>
                    </span>
                    <a href="">
                        Gestisci gli annunci
                    </a>
                </div> --}}
            </div>
        </div>
        <div class="button col mt-2">
            <div class="row">
                <button class="col mr-2 border rounded">
                    <a href="{{route("user.apartments.index")}}">
                        <div class="row p-3">
                            <div class="col text-left">
                                {{-- numero appartamenti totali --}}
                                10
                                {{-- {{$apartments->user_id}} --}}
                                <div>
                                    Annunci
                                </div>
                            </div>
                            <div class="icon col position-relative m-3">
                                <i class="fas fa-home position-absolute"></i>
                            </div>
                        </div>
                    </a>
                </button>
                <button class="button-2 col mt-2 mr-2 border rounded">
                    <a href="">
                        <div class="row p-3">
                            <div class="col text-left">
                                {{-- numero messaggi non letti --}}
                                1
                                {{-- {{apartment.user_id}} --}}
                                <div>
                                    Messaggi non letti
                                </div>
                            </div>
                            <div class="icon col position-relative m-3">
                                <i class="fas fa-envelope position-absolute"></i>
                            </div>
                        </div>
                    </a>
                </button>
                <button class="button-3 col mt-2 mr-2 border rounded">
                    <div class="row p-3">
                        <div class="col text-left">
                            {{-- numero messaggi non letti --}}
                            100
                            {{-- {{analytics.view}} --}}
                            <div>
                                Visualizzazioni Totali
                            </div>
                        </div>
                        <div class="icon col position-relative m-3">
                            <i class="fas fa-eye position-absolute"></i>
                        </div>
                    </div>
                </button>
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
        
    {{-- <a href="{{route("user.apartments.index")}}"><button type="button" class="btn btn-primary">Visualizza gli appartamenti</button></a>
    <a href="{{route("user.messages.index")}}"><button type="button" class="btn btn-primary">Visualizza i messaggi</button></a> --}}
</div>
@endsection

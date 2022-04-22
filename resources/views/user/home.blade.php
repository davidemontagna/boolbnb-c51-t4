@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="profile px-5 py-4">
        <div class="mb-3">
            Bentornato, {{ Auth::user()->name }} {{ Auth::user()->surname }}
        </div>
        <button class="announcement-btn text-center mb-3">
            <a href="{{ route('user.apartments.create') }}">
                <i class="fas fa-plus"></i> 
                Pubblica annuncio
            </a>
        </button>
    </div>
    <div class="dashboard text-center">
        <div class="row row-cols-2 row-cols-lg-4 p-2">
            <div class="col">
                <button class="border rounded">
                    <a href="{{route("user.apartments.index")}}">
                        <div class="row p-3">
                            <div class="col">
                                {{-- numero appartamenti totali --}}
                                {{ count($apartments) }}
                                {{-- {{$apartments->user_id}} --}}
                                <div>
                                    Appartamenti
                                </div>
                            </div>
                            <div class="col m-3">
                                <i class="fas fa-home"></i>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
            <div class="col">
                <button class="border rounded">
                    <a href="{{route("user.messages.index")}}">
                        <div class="row row-cols-sm-12 p-3">
                            <div class="col">
                                {{-- numero appartamenti totali --}}
                                {{ count($messages) }} 
                                @if (count($notVisualized) >0 )
                                <span>({{ count($notVisualized) }}  da leggere)</span>
                                @endif
                                {{-- {{$user->messages}} --}}
                                <div>
                                    Tutti i messaggi
                                </div>
                            </div>
                            <div class="col m-3">
                                <i class="fas fa-comment"></i>
                            </div>
                        </div>
                    </a>
                </button>
                
            </div>
            <div class="col mt-3 mt-lg-0">
                <button class="border rounded">
                    <a href="">
                        <div class="row row-cols-sm-12 p-3">
                            <div class="col">
                                {{-- numero messaggi non letti --}}
                                {{ count($notVisualized) }}
                                {{-- {{apartment.user_id}} --}}
                                <div>
                                    Messaggi non letti
                                </div>
                            </div>
                            <div class="col m-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
            <div class="col mt-3 mt-lg-0">
                <button class="border rounded">
                    <div class="row row-cols-sm-12 p-3">
                        <div class="col">
                            {{-- numero messaggi non letti --}}
                            100
                            {{-- {{analytics.view}} --}}
                            <div>
                                Visualizzazioni Totali
                            </div>
                        </div>
                        <div class="col m-3">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
            {{-- <div class="row row-cols-1">
                <div class="col d-flex flex-column flex-sm-row text-center text-sm-left my-3">
                    <span class="dashboard-icon mx-3">
                        <i class="fas fa-comment"></i>
                    </span>
                    <a href="{{route("user.messages.index")}}" class="">
                        Tutti i messaggi
                    </a>
                </div> --}}
                {{-- <div class="col d-flex flex-column flex-sm-row text-center text-sm-left my-3">
                    <span class="mx-3">
                        <i class="fas fa-edit"></i>
                    </span>
                    <a href="">
                        Gestisci gli annunci
                    </a>
                </div> --}}
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

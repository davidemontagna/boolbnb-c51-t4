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
    <div class="dashboard row mx-3 ">
        <div class="col-4 mx-2 p-3 border rounded">
            <div class="my-3">
                <a href="">
                    <i class="fas fa-comment mx-3"></i>
                    Tutti i messaggi
                </a>
            </div>
            <div class="my-3">
                <a href="">
                    <i class="fas fa-edit mx-3"></i>
                    Gestisci gli annunci
                </a>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <button class="col mr-2 border rounded">
                    <div class="row">
                        <div class="col">
                            {{-- numero appartamenti totali --}}
                            10
                            {{-- {{$apartments->user_id}} --}}
                            <div>
                                Annunci
                            </div>
                        </div>
                        <div class="icon col position-relative">
                            <i class="fas fa-home position-absolute"></i>
                        </div>
                    </div>
                </button>
                <div class="col mr-2 border rounded">
                    <div>
                        <div>
                            {{-- numero messaggi non letti --}}
                            1
                            {{-- {{apartment.user_id}} --}}
                        </div>
                        <div>
                            Messaggi non letti
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="col mr-2 border rounded">
                    <div>
                        <div>
                            {{-- numero messaggi non letti --}}
                            100
                            {{-- {{analytics.view}} --}}
                        </div>
                        <div>
                            Visualizzazioni Totali
                        </div>
                    </div>
                    <div>
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

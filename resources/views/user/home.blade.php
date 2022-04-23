@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="profile px-5 py-4">
        <h2 class="mb-3">
            Bentornato, {{ Auth::user()->name }} {{ Auth::user()->surname }}
        </h2>
        <button class="announcement-btn text-center my-3 p-3">
            <a href="{{ route('user.apartments.create') }}">
                <i class="fas fa-plus"></i> 
                Pubblica annuncio
            </a>
        </button>
    </div>
    <div class="dashboard text-center mt-3">
        <div class="row justify-content-between m-2">
            <div class="col-12 col-md-6">
                <button class="border rounded">
                    <a href="{{route("user.apartments.index")}}">
                        <div class="d-flex justify-content-around align-items-center p-3">
                            <div>
                                <h3 class="text-left font-weight-bold">
                                    {{ count($apartments) }}
                                </h3>
                                <h5>
                                    Appartamenti
                                </h5>
                            </div>
                            <div class="ms_icon">
                                <i class="fas fa-home"></i>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
            <div class="col-12 col-md-4 col-xl-3 mt-3 mt-md-0">
                <button class="border rounded">
                    <a href="{{route("user.messages.index")}}">
                        <div class="d-flex justify-content-around align-items-center p-3">
                            <div>
                                <h3 class="text-left font-weight-bold">
                                    @if (count($notVisualized) >0 )
                                        <span>{{ count($notVisualized) }}  Non letti</span>
                                    @endif  
                                </h3>
                                {{-- {{ count($messages) }}  --}}
                                <h5>
                                    Tutti i messaggi
                                </h5>
                            </div>
                            <div class="ms_icon">
                                <i class="fas fa-comment"></i>
                            </div>
                        </div>
                    </a>
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

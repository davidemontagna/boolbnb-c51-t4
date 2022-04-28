@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="profile px-5 py-4">
        <h2 class="mb-3">
            Bentornato, {{ Auth::user()->name }} {{ Auth::user()->surname }}
        </h2>
        <a href="{{ route('user.apartments.create') }}">
            <button class="announcement-btn text-center my-3 p-3">
                <i class="fas fa-plus"></i> 
                Pubblica annuncio
            </button>
        </a>
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
        </div>
    </div>
</div>
@endsection

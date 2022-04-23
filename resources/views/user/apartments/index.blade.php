@extends('layouts.app')

@section('title', 'Create')

@section('content')
<section>
    <div class="ms_container_index_apartment container-fluid">
        <h2 class="m-3">
            I tuoi annunci
        </h2>
        <h4 class="m-3">
            Inserisci, visualizza, modifica o cancella gli annunci che hai inserito 
        </h4>
        <a href="{{ route('user.apartments.create') }}">
            <button class="announcement-btn text-center my-3 p-3">
                <i class="fas fa-plus"></i> 
                Aggiungi appartamento
            </button>
        </a>
        {{-- <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody> --}}
                <div class="row row-cols-xs-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mx-auto">
                    @foreach ($apartments as $apartment)
                        <div class="col my-3">
                            <div class="ms_card">
                                <div class="ms_img mx-auto position-relative">
                                        <div class="ms_dropdown dropdown position-absolute">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Azioni
                                            </button>
                                            <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                                                <a href="{{route("user.apartments.show", $apartment->id)}}">
                                                    <button class="dropdown-item" type="button">
                                                        Mostra appartamento
                                                    </button>
                                                </a>
                                                {{-- <a href="{{route("user.apartments.edit", $apartment->id)}}">
                                                    <button class="dropdown-item border-bottom" type="button">
                                                        Modifica
                                                    </button>
                                                </a> --}}
                                                <form class="m-2" action="{{route("user.apartments.destroy", $apartment->id)}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <input class="btn ms_delete" type="submit" value="Elimina Appartamneto" onclick="return confirm('Vuoi eliminare questo appartamento?')">
                                                </form>
                                            </div>
                                        </div>
                                        <img src="{{ asset("storage/{$apartment->preview}")}}" alt="">
                                        <div class="ms_shadow position-absolute"></div>
                                    <div class="ms_description position-absolute">
                                        <p class="ms_beds mx-2">Numero di letti: {{$apartment->num_beds}}</p>
                                    </div>
                                </div>
                                <div class="ms_text">
                                    <h2 class="ms_title mt-3">{{$apartment->title}}</h2>
                                    <h4 class="ms_city mt-3">{{$apartment->location->city}}</h4>
                                    <p class="ms_address">{{$apartment->location->address}}</p>
                                    <div class="ms_description2 d-flex justify-content-between mt-3">
                                        <p class="ms_rooms">Stanze: {{$apartment->num_rooms}}</p>
                                        <p class="ms_bath">Bagni: {{$apartment->num_bath}}</p>
                                        <p class="ms_square">Mq: {{$apartment->square_footage}}</p>
                                    </div>
                                </div>
                            </div>
                {{-- <tr>
                    <td scope="row">{{$apartment->id}}</td>
                    <td>{{$apartment->user_id}}</td>
                    <td>{{$apartment->title}}</td>
                    <td class="d-flex justify-content-start align-items-center">
                        <a href="{{route("user.apartments.show", $apartment->id)}}"><button type="button" class="btn btn-info">Mosta appartamento</button></a> 
                        <a href="{{route("user.apartments.edit", $apartment->id)}}" class="mx-2"><button type="button" class="btn btn-success">Modifica</button></a>                       
                        <form action="{{route("user.apartments.destroy", $apartment->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                        
                            <input class="btn btn-danger" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$apartment->id}}">
                            
                            <div class="modal modal-danger fade" id="ModalDelete{{$apartment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Elimina:</h5>                                      
                                    </div>
                                    <div class="modal-body">Sei sicuro di voler eliminare {{$apartment->title}}?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                        <input type="submit" class="btn btn-danger" value="Elimina">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr> --}}
                        </div>
                    @endforeach
                </div>
            
         {{--    </tbody>
        </table> --}}
    </div>
</section>
@endsection

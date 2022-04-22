@extends('layouts.app')

@section('title', 'Create')

@section('content')
<section>
    <div class="container">
        <div class="my-4">
            <a href="{{ route('user.apartments.create') }}" class="btn btn-primary">Aggiungi appartamento</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                <tr>
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
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</section>
@endsection

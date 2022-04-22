@extends('layouts.app')

@section('title', 'Create')

@section('content')
<section>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Apartment id</th>
                <th scope="col">Messaggio</th>
                <th scope="col">email</th>
                <th scope="col">nome</th>
                <th scope="col">visualizzato</th>
                <th scope="col">risposta</th>
                <th scope="col">user id</th>
                <th scope="col">azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td scope="row">{{$message->id}}</td>
                    <td>{{$message->apartment_id}}</td>
                    <td>{{$message->content}}</td>
                    <td>{{$message->sender_email}}</td>
                    <td>{{$message->sender_name}}</td>
                    <td>{{$message->visualized}}</td>
                    <td>{{$message->answered}}</td>
                    <td>{{$message->apartment->user_id}}</td>
                    <td>
                        <a href="{{route('user.messages.show', $message->id)}}" class="d-inline-block"><button type="button" class="btn btn-secondary">Show</button></a> 
                        <a href="{{route('user.messages.edit', $message->id)}}" class="d-inline-block"><button type="button" class="btn btn-primary">Edit</button></a>                    
                        <form action="{{route('user.messages.destroy', $message->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input class="btn btn-danger" type="button" value="Elimina" data-toggle="modal" data-target="#ModalDelete{{$message->id}}">
                            
                            <div class="modal modal-danger fade" id="ModalDelete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Elimina:</h5>                                      
                                    </div>
                                    <div class="modal-body">Sei sicuro di voler eliminare il messaggio?</div>
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
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>EMAIL</h1> 
    @if ($message->apartment->user_id == auth()->id())
    <form action="{{route("user.messages.update", $message->id)}}" method="POST">
        
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Visualizzato</label>
            <select name="visualized" class="form-control">
                <option value=1 {{$message->visualized == 1 ? 'selected' : ''}}>Si</option>
                <option value=0 {{$message->visualized == 0 ? 'selected' : ''}}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Risposta</label>
            <select name="answered" class="form-control">
                <option value=1 {{$message->answered == 0 ? 'selected' : ''}}>Si</option>
                <option value=0 {{$message->answered == 0 ? 'selected' : ''}}>No</option>
            </select>
        </div>
        

    <button type="submit" class="btn mr-3 msg-button p-3">Salva</button>
    <a href="{{route("user.apartments.show", $message->apartment->id)}}"><button type="button" class="btn msg-button p-3">Indietro</button></a> 
    </form>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3>Non sei autorizzato a modificare questo messaggio.</h3>
                    <a href="{{ route("user.messages.index") }}"><button type="submit" class="btn btn-primary">Torna ai Messaggi</button></a>
                </div>
            </div>
        </div>
    @endif

</div>
@endsection
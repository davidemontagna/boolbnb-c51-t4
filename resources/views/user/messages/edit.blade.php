@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h1>EMAIL</h1> 

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
        
      
      
      
      <button type="submit" class="btn btn-warning my-3">Salva</button>
  </form>

  <a href="{{route('user.messages.index')}}"><button type="button" class="btn btn-dark">Back</button></a> 
</div>
@endsection
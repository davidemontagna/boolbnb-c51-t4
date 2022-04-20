@extends('layouts.app')

@section('title', 'Create')

@section('content')    
    
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    
                    <h3>Inserisci un nuovo appartamento</h3>
                    <form action="{{ route("user.apartments.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                        <div id="location-app">
                            
                        </div>

                        <div class="mb-3">
                          <label for="title" class="form-label">Titolo:</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" id="title" name="title" placeholder="Inserisci il titolo">   
                          @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror         
                        </div>

                        <div class="mb-3">
                            <label for="num_guest" class="form-label">Numero di ospiti:</label>
                            <input type="number" min="1" max="50" class="form-control @error('num_guest') is-invalid @enderror" id="num_guest" name="num_guest"> 
                            @error('num_guest')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                        </div>
                        
                        <div class="mb-3">
                          <label for="num_rooms" class="form-label">Numero di stanze:</label>
                          <input type="number" min="1" max="30" class="form-control @error('num_rooms') is-invalid @enderror" id="num_rooms" name="num_rooms"> 
                          @error('num_rooms')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror       
                        </div>

                        <div class="mb-3">
                            <label for="num_beds" class="form-label">Numero di posti letto:</label>
                            <input type="number" min="1" max="50" class="form-control @error('num_beds') is-invalid @enderror" id="num_beds" name="num_beds"> 
                            @error('num_beds')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                        </div>

                        <div class="mb-3">
                            <label for="num_bath" class="form-label">Numero di bagni:</label>
                            <input type="number" min="1" max="6" class="form-control @error('num_bath') is-invalid @enderror" id="num_bath" name="num_bath"> 
                            @error('num_bath')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo:</label>
                            <input type="number" step="0.01" min="1" max="10000" class="form-control @error('price') is-invalid @enderror" id="price" name="price"> 
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                        </div>

                        <div class="mb-3">
                            <label for="square_footage" class="form-label">Numero di metri quadri:</label>
                            <input type="number" min="1" max="400" class="form-control @error('square_footage') is-invalid @enderror" id="square_footage" name="square_footage"> 
                            @error('square_footage')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                        </div>

                        <div class="mb-3">
                            <label for="preview" class="form-label">Immagine preview:</label>
                            <input type="file" class="form-control-file @error('preview') is-invalid @enderror" value="{{old('preview')}}" id="preview" name="preview" placeholder="Inserisci la preview">   
                            @error('preview')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror         
                        </div>

                        <div class="mb-3">                    
                            <label for="visible" class="form-label">Vuoi rendere disponibile il tuo appartamento?</label>
                            <select class="form-control @error('visible') is-invalid @enderror" id="visible" name="visible">
                                <option name="visible" value="1">Si</option>
                                <option name="visible" value="0">No</option>
                            </select>
                               
                            @error('visible')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror         
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione">{{old('description')}}</textarea>    
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                        </div>

                        <div class="form-group">
                            <label>Servizi</label>
                            @foreach ($services as $service)
                                <div class="form-check">
                                  <input type="checkbox" name="services[]" class="form-check-input" value="{{$service->id}}" id="{{$service->id}}" {{ old('services') && in_array($service->id, old('services')) ? " checked" : "" }}>
                                  <label class="form-check-label" for="{{$service->id}}" >{{$service->name}}</label>
                                </div>
                            @endforeach
                            @error('service_id')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        
                        <a href="{{ route("user.apartments.index") }}"><button type="submit" class="btn btn-primary">Submit</button></a>
                    </form>
            
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                        
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    
@endsection
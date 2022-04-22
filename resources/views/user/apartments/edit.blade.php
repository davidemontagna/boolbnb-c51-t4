@extends('layouts.app')

@section('title', 'Create')

@section('content')    
    
    <section>
        <div class="ms_container_edit_apartment container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Controllo per vedere se l'utente e' autorizzato a editare quel determinato appartamento -->
                    @if ($apartment->user_id == auth()->id())

                        <h3 class="mt-3">Modifica Appartamento</h3>
                        <form action="{{ route("user.apartments.update", $apartment->id) }}" method="POST" enctype="multipart/form-data">                        
                            @csrf
                            @method('PUT')
                
                            <div class="mb-3">
                            <label for="title" class="form-label">Titolo:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $apartment->title) }}" id="title" name="title" placeholder="Inserisci il titolo">   
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror         
                            </div>

                            <div class="mb-3">
                                <label for="num_guest" class="form-label">Numero di ospiti:</label>
                                <input type="number" min="1" max="50" class="form-control @error('num_guest') is-invalid @enderror" id="num_guest" name="num_guest" value="{{ old('num_guest', $apartment->num_guest) }}">    
                                @error('num_guest')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>
                            
                            <div class="mb-3">
                            <label for="num_rooms" class="form-label">Numero di stanze:</label>
                            <input type="number" min="1" max="30" class="form-control @error('num_rooms') is-invalid @enderror" id="num_rooms" name="num_rooms" value="{{ old('num_rooms', $apartment->num_rooms) }}">    
                            @error('num_rooms')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror       
                            </div>

                            <div class="mb-3">
                                <label for="num_beds" class="form-label">Numero di posti letto:</label>
                                <input type="number" min="1" max="50" class="form-control @error('num_beds') is-invalid @enderror" id="num_beds" name="num_beds" value="{{ old('num_beds', $apartment->num_beds) }}">    
                                @error('num_beds')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>

                            <div class="mb-3">
                                <label for="num_bath" class="form-label">Numero di bagni:</label>
                                <input type="number" min="1" max="6" class="form-control @error('num_bath') is-invalid @enderror" id="num_bath" name="num_bath" value="{{ old('num_bath', $apartment->num_bath) }}">    
                                @error('num_bath')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo:</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $apartment->price) }}">    
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>

                            <div class="mb-3">
                                <label for="square_footage" class="form-label">Numero di metri quadri:</label>
                                <input type="number" min="1" max="400" class="form-control @error('square_footage') is-invalid @enderror" id="square_footage" name="square_footage" value="{{ old('square_footage', $apartment->square_footage) }}">    
                                @error('square_footage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>

                            <div class="ms_selectimg mb-3">
                                <label for="preview" class="form-label">Immagine preview:</label>
                                <input type="file" class="form-control-file @error('preview') is-invalid @enderror" value="{{ old('preview', $apartment->preview) }}" id="preview" name="preview" placeholder="Inserisci il titolo">   
                                @error('preview')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror         
                            </div>
                            
                            <div class="mb-3">                    
                                <label for="visible" class="form-label">Vuoi rendere disponibile il tuo appartamento?</label>
                                <select id="visible" name="visible" class="form-control @error('visible') is-invalid @enderror" >
                                    <option name="visible" value="1" {{ $apartment->visible == old('visible', $apartment->visible) ? 'selected' : '' }}>Si</option>
                                    <option name="visible" value="0" {{ $apartment->visible == old('visible', $apartment->visible) ? 'selected' : '' }}>No</option>
                                </select>
                                
                                @error('visible')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror         
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea rows="13" type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Insert the content">{{ old('description', $apartment->description) }}</textarea>    
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>
                            
                            <div class="form-group">
                                <label>Servizi</label>
                                <div class="row row-cols-4">
                                    @foreach ($services as $service)
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="checkbox" name="services[]" class="form-check-input" value="{{$service->id}}" id="{{$service->id}}"
                                                    @if($errors->any())
                                                        {{ in_array($service->id, old('services', [])) ? " checked" : "" }}                                
                                                        
                                                    @else
                                                        
                                                    {{ $apartment->services->contains($service) ? " checked" : "" }}                                    
                                                    @endif
                                                >
                                                <label class="form-check-label" for="{{$service->id}}" >{{$service->name}}</label>
                                            </div> 
                                        </div>   
                                    @endforeach
                                    @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route("user.apartments.index") }}"><button type="submit" class="mb-4 btn">Modifica</button></a>
                        </form>
                
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>                            
                        @endif

                    @else
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h3>Non sei autorizzato a modificare questo appartamento.</h3>
                                    <a href="{{ route("user.apartments.index") }}"><button type="submit" class="btn btn-primary">Torna alla Dashboard</button></a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    
@endsection
@extends('layouts.app')


@section('content')
<div class="">
    <div class="row">
        <div class="col">
            <h2>Appartamento numero: {{$apartment_id}}</h2>
        </div>
        @foreach ($plans as $plan)
            <div class="col">
                <div class="">
                    <a href="{{route("user.payment",  [$apartment_id, $plan->id])}}">
                        <h3>{{$plan->title}}</h3>
                        <p>{{$plan->duration}}h</p>
                        <p>{{$plan->price}}$</p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>    
</div>
@endsection
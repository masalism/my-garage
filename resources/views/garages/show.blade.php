@extends('layouts.app')

@section('content')
    <a href="/garages">Go Back</a>
    <h1>{{$garage->garage_name}}</h1>
    <p>
        @if (count($garage->cars) >  0)
            @foreach ($garage->cars as $car)
                {{$car->manufacturer}} {{$car->model}} <br>
            @endforeach
        @endif
    </p>
@endsection

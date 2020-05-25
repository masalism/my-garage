@extends('layouts.app')
@include('inc.navbar')

@section('content')
<div class="show-container">
    <a class="btn-back" href="/garages">Go Back</a>
    <div class="show-garage">
        <h1>{{$garage->garage_name}}</h1>

            @if (count($garage->cars) >  0)
                <p class="in-garage">Cars in this Garage:</p>
                @foreach ($garage->cars as $car)
                   <p class="car-list"> {{$car->manufacturer}} {{$car->model}}</p>
                @endforeach
            @else
                <p class="in-garage">No cars in this garage</p>
            @endif

    </div>

</div>

@endsection

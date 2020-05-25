@extends('layouts.app')
@section('content')
@include('inc.navbar')

<div class="show-container">
    <a class="btn-back" href="/cars">Go Back</a>
    <div class="show">
        <p class="show-car">{{$car->manufacturer}} {{$car->model}}, made in {{$car->year}}. Cost {{$car->price}} $</p>
    </div>

</div>

@endsection

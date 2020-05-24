@extends('layouts.app')
@include('inc.navbar')

@section('content')
<div class="forms-container">
    <a class="btn-back" href="/cars">Go Back</a>
    <h1>Edit Your Car</h1>
    <form class="form" action="{{ route('cars.show', $car->id) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="manufacturer" value="{{ $car->manufacturer }}"><br>
        <input type="text" name="model" value="{{ $car->model }}"><br>
        <input type="number" name="year" value="{{ $car->year }}"><br>
        <input type="number" name="price" value="{{ $car->price }}"><br>
        <select name="garage_id" id="garage_id">
            <option value="">--------</option>
                @foreach ($garages as $garage)
                    <option value="{{$garage->id}}" {{ $car->garage_id == $garage->id ? 'selected' : '' }} >{{$garage->garage_name}}</option>
                @endforeach
        </select>
        <input class="submit" type="submit" value="Update">
    </form>
</div>

@endsection

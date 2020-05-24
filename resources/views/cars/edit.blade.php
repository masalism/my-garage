@extends('layouts.app')

@section('content')
<form action="{{ route('cars.show', $car->id) }}" method="POST">
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
    <input type="submit" value="Update">
</form>
@endsection

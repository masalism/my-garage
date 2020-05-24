@extends('layouts.app')

@section('content')
    <a href="/cars">Go Back</a>
    <h1>Add New Car</h1>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('cars.store') }}">
        @csrf
        <label for="manufacturer">Manufacturer:</label><br>
        <input type="text" id="manufacturer" name="manufacturer"><br>
        <label for="model">Model:</label><br>
        <input type="text" id="model" name="model"><br><br>
        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year"><br><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price"><br><br>
        <label for="garage_id">Garage:</label><br>
        <select name="garage_id" id="garage_id">
            <option value="">----------</option>
            @foreach ($garages as $garage)
                <option value="{{$garage->id}}">{{$garage->garage_name}}</option>
            @endforeach
        </select>
        {{-- <input type="text" id="garage_id" name="garage_id"><br><br> --}}
        <input type="submit" value="Submit">
    </form>

@endsection

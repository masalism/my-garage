@extends('layouts.app')
@section('content')
@include('inc.navbar')

<div class="forms-container">
    <a class="btn-back" href="/cars">Go Back</a>
    <h1>Add New Car</h1>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form class="form" method="POST" action="{{ route('cars.store') }}">
        @csrf
        <label for="manufacturer">Manufacturer:</label>
        <input type="text" id="manufacturer" name="manufacturer">
        <label for="model">Model:</label>
        <input type="text" id="model" name="model">
        <label for="year">Year:</label>
        <input type="number" id="year" name="year">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price">
        <label for="garage_id">Garage:</label>
        <select name="garage_id" id="garage_id">
            <option value="">----------</option>
            @foreach ($garages as $garage)
                <option value="{{$garage->id}}">{{$garage->garage_name}}</option>
            @endforeach
        </select>
        {{-- <input type="text" id="garage_id" name="garage_id"><br><br> --}}
        <input class="submit" type="submit" value="Submit">
    </form>
</div>


@endsection

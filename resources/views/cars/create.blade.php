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
    <form method="POST" action="/cars">
        @csrf
        <label for="manufacturer">Manufacturer:</label><br>
        <input type="text" id="manufacturer" name="manufacturer"><br>
        <label for="model">Model:</label><br>
        <input type="text" id="model" name="model"><br><br>
        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year"><br><br>
        <label for="price">price:</label><br>
        <input type="number" id="price" name="price"><br><br>
        <input type="submit" value="Submit">
    </form>

@endsection

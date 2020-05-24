@extends('layouts.app')

@section('content')
    <a href="/garages">Go Back</a>
    <h1>Create New Garage</h1>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('garages.store') }}">
        @csrf
        <label for="garage_name">Garage Name:</label><br>
        <input type="text" id="garage_name" name="garage_name"><br>
        <input type="submit" value="Submit">
    </form>

@endsection

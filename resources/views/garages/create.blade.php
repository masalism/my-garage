@extends('layouts.app')
@include('inc.navbar')
@section('content')
<div class="forms-container">
    <a class="btn-back" href="/garages">Go Back</a>
    <h1>Create New Garage</h1>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form class="form" method="POST" action="{{ route('garages.store') }}">
        @csrf
        <label for="garage_name">Garage Name:</label><br>
        <input type="text" id="garage_name" name="garage_name"><br>
        <input class="submit" type="submit" value="Submit">
    </form>
</div>


@endsection

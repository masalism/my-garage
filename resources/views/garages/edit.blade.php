@extends('layouts.app')

@section('content')
@include('inc.navbar')

<div class="forms-container">
    <a class="btn-back" href="/garages">Go Back</a>
    <h1>Update Garage</h1>
    <form class="form" action="{{ route('garages.show', $garage->id) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="garage_name" value="{{$garage->garage_name}}">
        <input class="submit" type="submit" value="Update">
    </form>
</div>
@endsection

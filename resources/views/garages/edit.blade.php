@extends('layouts.app')

@section('content')
<form action="{{ route('garages.show', $garage->id) }}" method="POST">
    @method('PUT') @csrf
    <input type="text" name="garage_name" value="{{$garage->garage_name}}">
    <input type="submit" value="Update">
</form>

@endsection

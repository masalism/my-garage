@extends('layouts.app')

@section('content')
    <h1>{{$car->manufacturer}}</h1>
    <h1>{{$car->model}}</h1>
    <h1>{{$car->year}}</h1>
    <h1>{{$car->price}}</h1>
@endsection

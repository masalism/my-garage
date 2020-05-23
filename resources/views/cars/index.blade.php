@extends('layouts.app')

@section('content')
<h1>Cars</h1>
@if (count($cars) > 0)
    <table>
        <thead>
            <tr>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                <td><a href="cars/{{$car->id}}">{{$car->manufacturer}}</a></td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->year}}</td>
                    <td>{{$car->price}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No cars found</p>
@endif
@endsection

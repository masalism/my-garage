@extends('layouts.app')

@section('content')
<h1>Cars</h1>
<a href="/cars/create">Add New Car</a>
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

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
                    <td>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @method('DELETE') @csrf
                            <input type="submit" value="Remove">
                        </form>
                    <a href="/cars/{{$car->id}}/edit">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No cars found</p>
@endif
@endsection

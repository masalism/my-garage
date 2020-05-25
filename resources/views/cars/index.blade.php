@extends('layouts.app')
@include('inc.navbar')

@section('content')


@if (count($cars) > 0)

    <div class="cars">
        @if (session('status_success'))
        <p class="success">{{ session('status_success') }}</p>
        @elseif (session('status_error'))
        <p class="error">{{ session('status_error') }}</p>
        @else
        <p></p>
        @endif
        <h1 class="white">Cars</h1>
        <a class="cars__new" href="/cars/create">Add New Car</a>
        <table>
            <thead>
                <tr>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Garage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                    <td><a class="td-link" href="cars/{{$car->id}}">{{$car->manufacturer}}</a></td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->year}}</td>
                        <td>{{$car->price}}</td>
                        <td>
                            @foreach ($garages as $garage)
                                @if ($car->garage_id == $garage->id)
                                    {{$garage->garage_name}}
                                @endif
                            @endforeach
                        </td>
                        <td class="actions">
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                @method('DELETE') @csrf
                                <input type="submit" value="Remove" class="btn__small btn__small--remove">
                            </form>
                        <button class="btn__small btn__small--edit"><a  href="/cars/{{$car->id}}/edit">Edit</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@else
<div class="cars">
    <p class="no">No cars found</p>
    <a class="cars__new" href="/cars/create">Add New Car</a>
</div>
@endif
@endsection

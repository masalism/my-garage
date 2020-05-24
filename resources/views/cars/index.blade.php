@extends('layouts.app')
@include('inc.navbar')

@section('content')
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

@if (count($cars) > 0)

    <div class="cars">
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
    <p>No cars found</p>
@endif
@endsection

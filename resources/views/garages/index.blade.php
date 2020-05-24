@extends('layouts.app')

@section('content')
<h1>Cars</h1>
<a href="/garages/create">Create New Garage</a>
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

@if (count($garages) > 0)
    <table>
        <thead>
            <tr>
                <th>Garage Name</th>
                <th>Cars</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($garages as $garage)
                <tr>
                <td><a href="garages/{{$garage->id}}">{{$garage->garage_name}}</a></td>
                <td>
                    @foreach ($garage->cars as $car)
                        {{$car['model']}}
                    @endforeach
                </td>
                    <td>
                        <form action="{{ route('garages.destroy', $garage->id) }}" method="POST">
                            @method('DELETE') @csrf
                            <input type="submit" value="Remove">
                        </form>
                    <a href="/garages/{{$garage->id}}/edit">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>You Have No Garages</p>
@endif
@endsection


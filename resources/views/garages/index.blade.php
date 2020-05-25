@extends('layouts.app')

@section('content')
@include('inc.navbar')


@if (count($garages) > 0)
    <div class="garages">
        @if (session('status_success'))
        <p class="success">{{ session('status_success') }}</p>
        @elseif (session('status_error'))
        <p class="error">{{ session('status_error') }}</p>
        @else
        <p></p>
        @endif
        <h1 class="white">Garages</h1>
        <a class="cars__new" href="/garages/create">Create New Garage</a>
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
                    <td><a class="td-link" href="garages/{{$garage->id}}">{{$garage->garage_name}}</a></td>
                    <td>
                        @foreach ($garage->cars as $car)
                            @if ($loop->last)
                                {{$car['model']}}
                            @else
                                {{$car['model']}},
                            @endif
                        @endforeach
                    </td>
                        <td class="actions">
                            <form action="{{ route('garages.destroy', $garage->id) }}" method="POST">
                                @method('DELETE') @csrf
                                <input type="submit" value="Remove" class="btn__small btn__small--remove">
                            </form>
                            <button class="btn__small btn__small--edit"><a  href="/garages/{{$garage->id}}/edit">Edit</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@else
<div class="garages">
    <p class="no">You Have No Garages</p>
    <a class="garages__new" href="/garages/create">Create New Garage</a>

</div>
@endif
@endsection


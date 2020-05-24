@extends('layouts.app')
@include('inc.navbar')

@section('content')
@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

@if (count($garages) > 0)
    <div class="garages">
        <h1>Garages</h1>
        <a class="garages__new" href="/garages/create">Create New Garage</a>
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
    <p>You Have No Garages</p>
@endif
@endsection


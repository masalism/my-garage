@extends('layouts.app')

@section('content')
<div class="container">
    <div class="home">
        <h1>Welcome To Your Garage</h1>
        <div class="home__p">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam illo libero natus architecto, quia quidem
                ducimus modi repellendus at corrupti!</p>
        </div>
        <div class="home__links">
            <a class="btn btn__cars" href="/cars">See Your Cars</a>
            <a class="btn btn__garages" href="/garages">Enter Garages</a>
        </div>
    </div>
</div>

@endsection

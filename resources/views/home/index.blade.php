@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('home.slider') <!-- Slider Section -->

    <div class="container my-5">
        <h1>PRODUCT</h1>
    </div>

    @include('home.product')
@endsection

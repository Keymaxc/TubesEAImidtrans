@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('home.slider') <!-- Slider Section -->

    <div class="container my-5">
        <h1>Welcome to MJ Shop</h1>
        <p>Your one-stop shop for amazing products.</p>
    </div>

    @include('home.product')
@endsection

@extends('layout')

@section('content')
<div class="hero">
    <div class="hero-text">
        <h1>Elevate Your Space with Ceramic Artistry</h1>
        <p>Discover Exquisite Handcrafted Creations for Every Corner of Your Home</p>
        <a href="/shop" class="link">Look At Our Products</a>
    </div>
</div>

<!-- Incluimos el componente carousel -->
@include('carrousel')

<!-- Incluimos el componente blog -->
@include('blog')

<!-- Incluimos el componente reviews -->
@include('reviews')

<!-- Incluimos el componente care -->
@include('care')

<!-- Incluimos el componente gallery -->
@include('gallery')

<!-- Incluimos el componente questions -->
@include('questions')

<!-- Incluimos el componente cta -->
@include('cta')

@endsection
@extends('layout')

@section('content')
<div class="container py-5 shop">
    <h2 class="section_title">Ceramics Products</h2>
    <div class="row">
        @foreach ($shop as $product)
        <div class="col-md-3 mb-5">
            <div class="card">
                @if ($product->seeded)
                <img src="{{ asset($imageUrl) }}" class="card-img-top" alt="{{ $product->name }} image">
                @else
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }} image">
                @endif
                <div class="card-body">
                    <h5 class="m-0">{{ $product->name }}</h5>
                    <p class="mb-4">${{ $product->price }}</p>
                    <a href="/shop/{{ $product->id }}" class="link">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

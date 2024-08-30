@extends('layout')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @if ($product->seeded) 
            <img src="{{ asset($imageUrl) }}" class="card-img-top" alt="{{ $product->name }} image">
            @else
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }} image">
            @endif
        </div>
        <div class="col-md-6">
            <div class="category-container">
                @if ($product->category)
                <p class="category">{{ $product->category->name }}</p>
                @else
                <p class="category">No category assigned</p>
                @endif
            </div>
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->desc }}</p>
            <p>{{ $product->text }}</p>
            
            <p><strong>Material:</strong>
                @if ($product->details && $product->details->material)
                {{ $product->details->material }}
                @else
                No material assigned
                @endif
            </p>
            
            <p><strong>Made By:</strong>
                @if ($product->details && $product->details->made_by)
                {{ $product->details->made_by }}
                @else
                No made by assigned
                @endif
            </p>
            
            <p><strong>Dimensions:</strong>
                @if ($product->details && $product->details->dimensions)
                {{ $product->details->dimensions }}
                @else
                No dimensions assigned
                @endif
            </p>

            <p class="mb-5">${{ $product->price }}</p>
            
            <form method="POST" action="{{ route('cart.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="link">Add to Cart</button>
            </form>            
        </div>
    </div>
</div>

@endsection

@extends('layout')

@section('content')

<div class="container py-5">
    <h1 class="section_title">Product Listing</h1>
    @if (!empty($products) && count($products) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->desc }}</td>
                <td>${{ $product->price }}</td>
                <td class="d-flex">
                    <a href="/products/{{ $product->id }}/edit" class="link-edit me-2 btn-sm">Edit</a>
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="link-delete me-2 btn-sm">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No products found.</p>
    @endif
</div>

@endsection

@extends('layout')

@section('content')

<div class="container py-5">
    <h1 class="section_title">Shopping Cart</h1>

    @auth
    @if (count($cartProducts) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartProducts as $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>${{ $product['price'] }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.destroy', ['cart' => $product['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <button type="submit" class="link-delete">Remove from Cart</button>
                    </form>                    
                </td>
            </tr>
            @endforeach
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>${{ $total }}</strong></td>
                <td>
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf
                        <button type="submit" class="link">Purchase</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    @else
    <p>Your shopping cart is empty.</p>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @else
        <p>Please log in to add products to your cart.</p>
    @endauth
</div>

@endsection

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="section_title">Order List</h1>

        <table class="table mb-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Email</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ optional($order->user)->email }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
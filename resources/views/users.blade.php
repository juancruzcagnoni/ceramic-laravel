@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1>Last <span class="name-profile">10</span> Registered Users</h1>
            <p class="name-profile">Total Users: {{ $totalUsers }}</p>
        </div>

        <table class="table mb-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($latestUsers as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

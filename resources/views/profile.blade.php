@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Welcome to your profile, <span class="name-profile">{{ $user->name }}!</span></h1>
        <p class="mb-5 name-profile">Here you can edit your data</p>

        <div class="mb-5">
            <div class="card mb-5">
                <div class="card-header">Edit Profile</div>
                <div class="abm-card-body">
                    <form action="{{ route('profile.update') }}" method="post" class="align-items-center">
                        @csrf
                        @method('patch') 

                        <div class="mb-3 abm-form-group form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 abm-form-group form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 abm-form-group form-group">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            @error('current_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 abm-form-group form-group">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 abm-form-group form-group">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="link">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

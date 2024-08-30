@extends('layout')

@section('content')

<div class="container mt-5">
    <h1 class="section_title">ABM</h1>

    <!-- Formulario de Creación -->
    <div class="card mb-5">
        <div class="card-header">Create New Product</div>
        <div class="abm-card-body">
            <form action="/admin" method="post" enctype="multipart/form-data" class="align-items-center">
                @csrf
                <div class="abm-form-group form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    <p class="text-danger">{{ $errors->first('description') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="image">Current Image</label>
                    @if(old('image'))
                    <img src="{{ old('image') }}" alt="{{ old('image') }}" class="img-thumbnail">
                    @else
                    <p>No image selected.</p>
                    @endif
                </div>
                <div class="abm-form-group form-group">
                    <label for="image">New Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" id="text" name="text">{{ old('text') }}</textarea>
                    <p class="text-danger">{{ $errors->first('text') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="material">Material</label>
                    <input type="text" class="form-control" id="material" name="material" value="{{ old('material') }}">
                    <p class="text-danger">{{ $errors->first('material') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="made_by">Made By</label>
                    <input type="text" class="form-control" id="made_by" name="made_by" value="{{ old('made_by') }}">
                    <p class="text-danger">{{ $errors->first('made_by') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="dimensions">Dimensions</label>
                    <input type="text" class="form-control" id="dimensions" name="dimensions" value="{{ old('dimensions') }}">
                    <p class="text-danger">{{ $errors->first('dimensions') }}</p>
                </div>
                <button type="submit" class="link">Save</button>
            </form>
        </div>
    </div>

<!-- Dashboard -->
<h2 class="section_title mt-5">Dashboard</h2>

<div class="row">
    <!-- Product Management Card -->
    <div class="col-md-4 col-12 mb-5">
        <div class="card-admin">
            <div class="card-body-admin">
                <h3 class="card-title-admin">Product Management</h3>
                <p class="card-text-admin">Explore and manage your products.</p>
                <a href="{{ route('products.index') }}" class="link">
                    <i class="fas fa-box"></i> View Product List
                </a>
            </div>
        </div>
    </div>

    <!-- Order Management Card -->
    <div class="col-md-4 col-12 mb-5">
        <div class="card-admin">
            <div class="card-body-admin">
                <h3 class="card-title-admin">Order Management</h3>
                <p class="card-text-admin">Track and manage customer orders.</p>
                <a href="{{ route('orders.index') }}" class="link">
                    <i class="fas fa-shopping-cart"></i> View Order List
                </a>
            </div>
        </div>
    </div>

    <!-- User Management Card -->
    <div class="col-md-4 col-12 mb-5">
        <div class="card-admin">
            <div class="card-body-admin">
                <h3 class="card-title-admin">User Management</h3>
                <p class="card-text-admin">Explore the list of registered users.</p>
                <a href="{{ route('users.index') }}" class="link">
                    <i class="fas fa-users"></i> View User List
                </a>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

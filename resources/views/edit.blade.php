@extends('layout')

@section('content')

<div class="container mt-5">
    <h1 class="section_title">Edit Panel</h1>

    <!-- Formulario de Edición -->
    <div class="card mb-5">
        <div class="card-header">Edit Product - {{ $product->name }}</div>
        <div class="abm-card-body">
            <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="align-items-center">
                @csrf
                @method('PUT') 

                <div class="abm-form-group form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="descripcion">Description</label>
                    <textarea class="form-control" id="descripcion" name="description">{{ old('desc', $product->desc) }}</textarea>
                    <p class="text-danger">{{ $errors->first('description') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="image">Current Image</label>
                    @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail">
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
                    <textarea class="form-control" id="text" name="text">{{ old('text', $product->text) }}</textarea>
                    <p class="text-danger">{{ $errors->first('text') }}</p>
                </div>
                <button type="submit" class="link">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection

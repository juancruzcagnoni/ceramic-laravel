@extends('layout')

@section('content')

<div class="container mt-5">
    <h1 class="section_title">Create a New Post</h1>

    <!-- Formulario de Creación -->
    <div class="card mb-5">
        <div class="card-header">Create New Post</div>
        <div class="abm-card-body">
            <form action="/abm-blog" method="post" enctype="multipart/form-data" class="align-items-center">
                @csrf
                <div class="abm-form-group form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="description">Subtitle</label>
                    <textarea class="form-control" id="subtitle" name="subtitle">{{ old('subtitle') }}</textarea>
                    <p class="text-danger">{{ $errors->first('subtitle') }}</p>
                </div>
                <div class="abm-form-group form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    <p class="text-danger">{{ $errors->first('description') }}</p>
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
                <button type="submit" class="link">Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
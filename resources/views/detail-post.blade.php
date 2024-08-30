@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <h1 class="mb-5">{{ $post->title }}</h1>
        <div class="col-md-6">
            @if ($post->seeded) 
                <img src="{{ asset($imageUrl) }}" class="card-img-top" alt="{{ $post->title }} image">
            @else
                <img src="{{ asset($post->image) }}" class="card-img-top" alt="{{ $post->title }} image">
            @endif
        </div>
        <div class="col-md-6">
            <p>{{ $post->subtitle }}</p>
            <p>{{ $post->desc }}</p>
            <p>Created by: {{ optional($post->user)->name ?? 'Anonymous' }}</p>
        </div>
        <p class="mt-5">{{ $post->text }}</p>
    </div>
</div>

@endsection

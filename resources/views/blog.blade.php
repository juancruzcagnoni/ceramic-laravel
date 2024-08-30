<!-- Header -->
<header class="mt-5">
    <div class="container">
        <h2 class="section_title">Welcome to Our Blog</h2>
        <p>Discover the beauty and craftsmanship of ceramic art. Dive into our blog for insights, tips, and inspiration.</p>
    </div>
</header>

<!-- Blog Posts -->
<div class="blog container my-5">
    <div class="row">
        @foreach ($blog as $post)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="img-blog-container"><img src="{{ $post->image }}" class="card-img-top" alt="..."></div>
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->desc }}</p>
                    <a href="/blog-page/{{ $post->id }}" class="link">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="container mt-5 text-center">
        <a href="{{ route('abm-blog.create') }}" class="link">Create New Post</a>
    </div>

</div>
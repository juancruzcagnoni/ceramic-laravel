<nav class="navbar navbar-expand-md py-3">
    <div class="container d-flex">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" width="120" height="auto" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/shop">Shop</a>
                <a class="nav-link" href="/blog-page">Blog</a>
                <a class="nav-link" href="/gallery-page">Gallery</a>
                <a class="nav-link" href="/cart">Cart</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @auth
                        @if (Auth::user()->role === 'admin')
                        <a class="dropdown-item" href="/admin">Admin</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="/profile">Profile</a>
                        @else
                        <a class="dropdown-item" href="/register">Register</a>
                        <a class="dropdown-item" href="/log">Log In</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
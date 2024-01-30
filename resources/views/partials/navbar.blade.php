<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
        <a class="navbar-brand" href="#">Trivia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">Button</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @if (session()->has('username'))
                            <a class="nav-link username" href="">Welcome {{ session('username') }}</a>
                    @else
                        <a class="nav-link">User not logged in</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Home.page') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

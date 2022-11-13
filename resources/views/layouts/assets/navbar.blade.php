<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm px-5">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
        <img src="{{ asset('/storage/images/logo.png') }}" width="38" height="38" class="d-inline-block" />
        Municipality of San Isidro
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    @guest
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
        </ul>
    @endguest
</nav>

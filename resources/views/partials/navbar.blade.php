<nav class="navbar navbar-expand-lg navcolor">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">NavbarGyatttttt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Admin Tools
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('article.create') }}">Create Article</a></li>
                            <li><a class="dropdown-item" href="{{ route('article.manage') }}">Manage Article</a></li>
                            <li><a class="dropdown-item" href="{{ route('manageuser') }}">Manage Users</a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
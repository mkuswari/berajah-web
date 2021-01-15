<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">Lumbung Ilmu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kelas') }}">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori') }}">Kategori</a>
                </li>
                <div class="nav-item">
                    <a href="{{ route('blog') }}" class="nav-link">Blogs</a>
                </div>
                <div class="nav-item">
                    <a href="" class="nav-link">Tentang</a>
                </div>

                @guest
                    <li class="nav-item">
                        <a class="btn btn-warning text-white px-4" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('home') }}" class="dropdown-item">
                                Home
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
<!-- end of navbar -->

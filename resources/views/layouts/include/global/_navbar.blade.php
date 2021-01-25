<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url("/") }}">Lumbung Kelas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item align-self-center active">
                    <a class="nav-link" href="{{ url("/") }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="{{ route('kelas') }}">Kelas</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="{{ route('kategori') }}">Kategori</a>
                </li>
                <div class="nav-item align-self-center">
                    <a href="{{ route('blog') }}" class="nav-link">Blogs</a>
                </div>
                <div class="nav-item align-self-center">
                    <a href="" class="nav-link">Tentang</a>
                </div>

                @guest
                    <li class="nav-item align-self-center">
                        <a class="btn btn-warning text-white px-4" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                <li class="nav-item align-self-center align-self-center dropdown">
                    <a class="nav-link" href="details.html#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      @if (Auth::user()->avatar)
                          <img src="{{ asset("storage/".Auth::user()->avatar) }}" class="rounded-circle mr-2 profile-picture" style="width: 45px; height: 45px; object-fit: cover; object-position: center;"/>
                      @else
                          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random&color=fff" class="rounded-circle mr-2 profile-picture" style="width: 45px; height: 45px; object-fit: cover; object-position: center;"/>
                      @endif
                      Hai, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                      @if (Auth::user()->roles == in_array("Admin" && "Staff", json_decode(Auth::user()->roles)))
                          <a class="dropdown-item" href="{{ route("dashboard") }}">Dashboard</a>
                          <a class="dropdown-item" href="{{ route("home") }}">Akun saya</a>
                      @else
                          <a class="dropdown-item" href="{{ route("home") }}">Akun saya</a>
                      @endif
                      <a class="dropdown-item" href="dashboard-account.html">Setting</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                      <form action="{{ route("logout") }}" method="POST" class="d-none" id="logout-form">
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

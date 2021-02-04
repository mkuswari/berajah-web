<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Lumbung Kelas</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">Lk</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Menu</li>
            @if (Auth::user()->roles == in_array("Admin", json_decode(Auth::user()->roles) ))
            <li>
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Kelola Users</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('instructors.index') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Kelola Instructor</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="fas fa-tags"></i>
                    <span>Kelola Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('courses.index') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Kelola Kelas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('enrolls.index') }}" class="nav-link">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Kelola Enroll Kelas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}" class="nav-link">
                    <i class="fas fa-file"></i>
                    <span>Kelola Artikel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile-saya') }}" class="nav-link">
                    <i class="fas fa-user-cog"></i>
                    <span>Profile Saya</span>
                </a>
            </li>
            <li>
                <a href="" class="nav-link">
                    <i class="fas fa-cogs"></i>
                    <span>Pengaturan Web</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="nav-link text-danger"
                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <i class=" fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>

            </li>
        </ul>
    </aside>
</div>

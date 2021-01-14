<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Lumbung Kelas</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Lk</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="credits.html">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Menu</li>
            <li>
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Kelola Users</span>
                </a>
            </li>
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
        </ul>
    </aside>
</div>

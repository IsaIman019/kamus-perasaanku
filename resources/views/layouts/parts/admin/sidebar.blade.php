<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kamus Perasaanku</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        -- Master --
    </div>

    <li class="nav-item {{ request()->routeIs('admin.master-users.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.master-users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Users</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.master-perasaan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.master-perasaan.index') }}">
            <i class="fas fa-fw fa-heart"></i>
            <span>Master Perasaan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.master-level.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.master-level.index') }}">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Master Level</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.master-soal.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.master-soal.index') }}">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Master Soal</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        -- Hasil --
    </div>
    <li class="nav-item {{ request()->routeIs('admin.skor-user.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.skor-user.index') }}">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Skor</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        -- Pengaturan --
    </div>
    <li class="nav-item {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile.index') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profile</span>
        </a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

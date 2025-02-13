<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Quiz App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage Content
    </div>

    <!-- Nav Item - Quizzes -->
    <li class="nav-item {{ request()->routeIs('quizzes.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('quizzes.index') }}">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Quizzes</span>
        </a>
    </li>

    <!-- Nav Item - Participants -->
    <li class="nav-item {{ request()->routeIs('participants.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('participants.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Participants</span>
        </a>
    </li>

    <!-- Nav Item - Questions -->
    <li class="nav-item {{ request()->routeIs('questions.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('questions.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Questions</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Nav Item - About -->
    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>About</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

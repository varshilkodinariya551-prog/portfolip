<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="admin-sidebar-header">
                <div class="logo">Portfolio Admin</div>
                <div class="sub">Portfolio Management</div>
            </div>
            <ul class="admin-nav">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-pie"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="fas fa-folder-open"></i> Projects
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                        <i class="fas fa-code"></i> Skills
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Messages
                        @php $unread = \App\Models\Contact::unread()->count(); @endphp
                        @if($unread > 0)
                            <span class="badge badge-warning" style="margin-left: auto;">{{ $unread }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </li>
                <li><div class="nav-divider"></div></li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-globe"></i> View Site
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <a href="#" onclick="this.closest('form').submit(); return false;" style="color: #ef4444;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Content -->
        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>

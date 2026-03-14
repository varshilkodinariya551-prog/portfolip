<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Varshil - Software Engineer | Portfolio showcasing full-stack development, system design, and cloud architecture projects.">
    <meta name="keywords" content="Software Engineer, Full Stack Developer, Laravel, PHP, React, Portfolio">
    <title>@yield('title', 'Varshil | Software Engineer')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Background Effects -->
    <div class="bg-grid"></div>
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="nav-logo">Portfolio</a>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}#hero" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('home') }}#projects">Projects</a></li>
                <li><a href="{{ route('home') }}#skills">Skills</a></li>
                <li><a href="{{ route('home') }}#contact">Contact</a></li>
                <li><a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">All Projects</a></li>
                @auth
                <li><a href="{{ route('admin.dashboard') }}" class="nav-cta"><i class="fas fa-cog"></i> Admin</a></li>
                @endauth
            </ul>
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Varshil. Built with <i class="fas fa-heart" style="color: var(--accent-pink);"></i> & Laravel</p>
            <div class="footer-links">
                <a href="{{ $settings['github_url'] ?? '#' }}" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                <a href="{{ $settings['linkedin_url'] ?? '#' }}" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                <a href="mailto:{{ $settings['email'] ?? '' }}"><i class="fas fa-envelope"></i> Email</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>

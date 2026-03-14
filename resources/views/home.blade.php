@extends('layouts.app')

@section('title', ($settings['hero_title'] ?? 'Varshil') . ' | Software Engineer')

@section('content')

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="dot"></span>
                Available for opportunities
            </div>
            <h1>
                Hi, I'm <span class="gradient-text">{{ $settings['hero_title'] ?? 'Varshil' }}</span>
            </h1>
            <div class="subtitle">
                <span class="typing-wrapper">
                    <span class="typing-text" data-words='["Software Engineer", "Full Stack Developer", "System Architect", "Problem Solver"]'></span>
                    <span class="cursor"></span>
                </span>
            </div>
            <p>{{ $settings['hero_description'] ?? 'I craft elegant, scalable software solutions that solve real-world problems.' }}</p>
            <div class="hero-buttons">
                <a href="#projects" class="btn btn-primary">
                    <i class="fas fa-rocket"></i> View My Work
                </a>
                <a href="#contact" class="btn btn-outline">
                    <i class="fas fa-envelope"></i> Get In Touch
                </a>
                @if(!empty($settings['resume_url']) && $settings['resume_url'] !== '#')
                <a href="{{ $settings['resume_url'] }}" class="btn btn-outline" target="_blank">
                    <i class="fas fa-download"></i> Resume
                </a>
                @endif
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="number counter" data-target="{{ $projects->count() > 0 ? $projects->count() * 5 : 20 }}">0+</span>
                    <span class="label">Projects</span>
                </div>
                <div class="hero-stat">
                    <span class="number counter" data-target="5">0+</span>
                    <span class="label">Years Experience</span>
                </div>
                <div class="hero-stat">
                    <span class="number counter" data-target="{{ $skills->flatten()->count() }}">0+</span>
                    <span class="label">Technologies</span>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-float">
        <div class="float-shape"></div>
        <div class="float-shape"></div>
        <div class="float-shape"></div>
    </div>
</section>

<!-- Projects Section -->
<section class="section" id="projects">
    <div class="container">
        <div class="section-header reveal">
            <span class="label">// My Work</span>
            <h2>Featured <span class="text-gradient">Projects</span></h2>
            <p>A selection of projects that showcase my expertise in building scalable, modern applications.</p>
        </div>
        <div class="projects-grid">
            @foreach($projects as $project)
            <div class="project-card reveal">
                <div class="project-card-image">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                        <i class="fas fa-code"></i>
                    @endif
                </div>
                <div class="project-card-body">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                    <div class="project-tags">
                        @foreach($project->tech_stack_array as $tech)
                            <span class="project-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <div class="project-links">
                        <a href="{{ route('projects.show', $project->slug) }}">
                            <i class="fas fa-arrow-right"></i> Details
                        </a>
                        @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Live
                        </a>
                        @endif
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank">
                            <i class="fab fa-github"></i> Code
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4 reveal">
            <a href="{{ route('projects.index') }}" class="btn btn-outline">
                <i class="fas fa-th-large"></i> View All Projects
            </a>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="section" id="skills" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="section-header reveal">
            <span class="label">// My Skills</span>
            <h2>Tech <span class="text-gradient">Stack</span></h2>
            <p>Technologies and tools I use to bring ideas to life.</p>
        </div>
        <div class="skills-categories">
            @foreach($skills as $category => $categorySkills)
            <div class="skill-category reveal">
                <h3>
                    <span class="icon">
                        @if($category === 'Backend')
                            <i class="fas fa-server"></i>
                        @elseif($category === 'Frontend')
                            <i class="fas fa-palette"></i>
                        @elseif($category === 'DevOps')
                            <i class="fas fa-cloud"></i>
                        @elseif($category === 'Database')
                            <i class="fas fa-database"></i>
                        @else
                            <i class="fas fa-tools"></i>
                        @endif
                    </span>
                    {{ $category }}
                </h3>
                @foreach($categorySkills as $skill)
                <div class="skill-item">
                    <div class="skill-info">
                        <span class="name"><i class="{{ $skill->icon }}"></i> {{ $skill->name }}</span>
                        <span class="percentage">{{ $skill->proficiency }}%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" data-width="{{ $skill->proficiency }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section" id="about">
    <div class="container">
        <div class="section-header reveal">
            <span class="label">// About Me</span>
            <h2>Who <span class="text-gradient">I Am</span></h2>
        </div>
        <div class="contact-grid">
            <div class="contact-info reveal">
                <p>{{ $settings['about_text'] ?? 'I\'m a passionate Software Engineer dedicated to building beautiful, functional, and scalable applications.' }}</p>
            </div>
            <div class="reveal">
                <div class="contact-details">
                    @if(!empty($settings['location']))
                    <div class="contact-detail">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info">
                            <div class="label">Location</div>
                            <div class="value">{{ $settings['location'] }}</div>
                        </div>
                    </div>
                    @endif
                    @if(!empty($settings['email']))
                    <div class="contact-detail">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="info">
                            <div class="label">Email</div>
                            <div class="value">{{ $settings['email'] }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section" id="contact" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="section-header reveal">
            <span class="label">// Get In Touch</span>
            <h2>Let's <span class="text-gradient">Connect</span></h2>
            <p>Have a project in mind or want to collaborate? Feel free to reach out!</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info reveal">
                <h3>Let's work together</h3>
                <p>I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision. Drop me a message!</p>
                <div class="contact-details">
                    @if(!empty($settings['email']))
                    <div class="contact-detail">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="info">
                            <div class="label">Email</div>
                            <div class="value">{{ $settings['email'] }}</div>
                        </div>
                    </div>
                    @endif
                    @if(!empty($settings['location']))
                    <div class="contact-detail">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info">
                            <div class="label">Location</div>
                            <div class="value">{{ $settings['location'] }}</div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="social-links">
                    @if(!empty($settings['github_url']))
                    <a href="{{ $settings['github_url'] }}" target="_blank" class="social-link" title="GitHub"><i class="fab fa-github"></i></a>
                    @endif
                    @if(!empty($settings['linkedin_url']))
                    <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="social-link" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if(!empty($settings['twitter_url']))
                    <a href="{{ $settings['twitter_url'] }}" target="_blank" class="social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            <div class="contact-form reveal">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul class="error-list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Project Discussion" value="{{ old('subject') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Tell me about your project..." required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

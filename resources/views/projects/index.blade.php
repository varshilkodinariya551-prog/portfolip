@extends('layouts.app')

@section('title', 'All Projects | Varshil')

@section('content')
<div class="projects-page">
    <div class="container">
        <div class="projects-page-header reveal">
            <h1>All <span class="text-gradient">Projects</span></h1>
            <p>Explore all my projects — from full-stack apps to developer tools and open-source contributions.</p>
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
    </div>
</div>
@endsection

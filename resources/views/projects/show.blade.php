@extends('layouts.app')

@section('title', $project->title . ' | Varshil')

@section('content')
<div class="project-detail">
    <div class="container">
        <div class="project-detail-header">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('projects.index') }}">Projects</a>
                <i class="fas fa-chevron-right"></i>
                <span>{{ $project->title }}</span>
            </div>
            <h1>{{ $project->title }}</h1>
            <div class="project-tags">
                @foreach($project->tech_stack_array as $tech)
                    <span class="project-tag">{{ $tech }}</span>
                @endforeach
            </div>
        </div>

        <div class="project-detail-image">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            @else
                <i class="fas fa-laptop-code"></i>
            @endif
        </div>

        <div class="project-detail-content">
            <div class="project-detail-body">
                <h2>About This Project</h2>
                <p>{{ $project->long_description ?? $project->description }}</p>
            </div>
            <div class="project-detail-sidebar">
                <div class="project-meta">
                    <div class="project-meta-item">
                        <div class="meta-label">Tech Stack</div>
                        <div class="project-tags" style="margin-top: 8px;">
                            @foreach($project->tech_stack_array as $tech)
                                <span class="project-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                    @if($project->live_url)
                    <div class="project-meta-item">
                        <div class="meta-label">Live Demo</div>
                        <a href="{{ $project->live_url }}" target="_blank" class="btn btn-primary btn-sm" style="margin-top: 8px; width: 100%; justify-content: center;">
                            <i class="fas fa-external-link-alt"></i> View Live
                        </a>
                    </div>
                    @endif
                    @if($project->github_url)
                    <div class="project-meta-item">
                        <div class="meta-label">Source Code</div>
                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline btn-sm" style="margin-top: 8px; width: 100%; justify-content: center;">
                            <i class="fab fa-github"></i> View on GitHub
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if($related->count() > 0)
        <div style="margin-top: 80px;">
            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 24px;">Other Projects</h2>
            <div class="projects-grid">
                @foreach($related as $rel)
                <div class="project-card">
                    <div class="project-card-image">
                        @if($rel->image)
                            <img src="{{ asset('storage/' . $rel->image) }}" alt="{{ $rel->title }}">
                        @else
                            <i class="fas fa-code"></i>
                        @endif
                    </div>
                    <div class="project-card-body">
                        <h3>{{ $rel->title }}</h3>
                        <p>{{ $rel->description }}</p>
                        <div class="project-links">
                            <a href="{{ route('projects.show', $rel->slug) }}">
                                <i class="fas fa-arrow-right"></i> Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
<div class="admin-header">
    <h1>Site Settings</h1>
</div>

<div class="admin-form" style="max-width: 800px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
            <i class="fas fa-star" style="color: var(--accent-violet);"></i> Hero Section
        </h3>

        <div class="form-group">
            <label for="hero_title">Name / Title</label>
            <input type="text" id="hero_title" name="hero_title" class="form-control" value="{{ $settings['hero_title'] ?? '' }}" placeholder="Your Name">
        </div>

        <div class="form-group">
            <label for="hero_subtitle">Subtitle / Role</label>
            <input type="text" id="hero_subtitle" name="hero_subtitle" class="form-control" value="{{ $settings['hero_subtitle'] ?? '' }}" placeholder="Software Engineer">
        </div>

        <div class="form-group">
            <label for="hero_description">Hero Description</label>
            <textarea id="hero_description" name="hero_description" class="form-control">{{ $settings['hero_description'] ?? '' }}</textarea>
        </div>

        <h3 style="font-size: 1.1rem; font-weight: 700; margin: 32px 0 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
            <i class="fas fa-user" style="color: var(--accent-cyan);"></i> About
        </h3>

        <div class="form-group">
            <label for="about_text">About Me Text</label>
            <textarea id="about_text" name="about_text" class="form-control" style="min-height: 120px;">{{ $settings['about_text'] ?? '' }}</textarea>
        </div>

        <h3 style="font-size: 1.1rem; font-weight: 700; margin: 32px 0 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
            <i class="fas fa-link" style="color: var(--accent-blue);"></i> Social Links
        </h3>

        <div class="form-row">
            <div class="form-group">
                <label for="github_url">GitHub URL</label>
                <input type="text" id="github_url" name="github_url" class="form-control" value="{{ $settings['github_url'] ?? '' }}" placeholder="https://github.com/...">
            </div>
            <div class="form-group">
                <label for="linkedin_url">LinkedIn URL</label>
                <input type="text" id="linkedin_url" name="linkedin_url" class="form-control" value="{{ $settings['linkedin_url'] ?? '' }}" placeholder="https://linkedin.com/in/...">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="twitter_url">Twitter URL</label>
                <input type="text" id="twitter_url" name="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '' }}" placeholder="https://twitter.com/...">
            </div>
            <div class="form-group">
                <label for="resume_url">Resume URL</label>
                <input type="text" id="resume_url" name="resume_url" class="form-control" value="{{ $settings['resume_url'] ?? '' }}" placeholder="https://...">
            </div>
        </div>

        <h3 style="font-size: 1.1rem; font-weight: 700; margin: 32px 0 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
            <i class="fas fa-map-marker-alt" style="color: var(--accent-pink);"></i> Contact Info
        </h3>

        <div class="form-row">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $settings['email'] ?? '' }}" placeholder="you@example.com">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}" placeholder="+91 ...">
            </div>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ $settings['location'] ?? '' }}" placeholder="City, Country">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 16px;">
            <i class="fas fa-save"></i> Save Settings
        </button>
    </form>
</div>
@endsection

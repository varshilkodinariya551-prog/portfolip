@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
<div class="admin-header">
    <h1>Create Project</h1>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline btn-sm">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="admin-form">
    @if($errors->any())
        <div class="alert alert-error">
            <ul class="error-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Project Title *</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required placeholder="My Awesome Project">
        </div>

        <div class="form-group">
            <label for="description">Short Description *</label>
            <textarea id="description" name="description" class="form-control" required placeholder="Brief description of your project...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="long_description">Detailed Description</label>
            <textarea id="long_description" name="long_description" class="form-control" style="min-height: 150px;" placeholder="Full project details...">{{ old('long_description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="tech_stack">Tech Stack * (comma-separated)</label>
            <input type="text" id="tech_stack" name="tech_stack" class="form-control" value="{{ old('tech_stack') }}" required placeholder="Laravel, React, MySQL, Docker">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="live_url">Live URL</label>
                <input type="url" id="live_url" name="live_url" class="form-control" value="{{ old('live_url') }}" placeholder="https://myproject.com">
            </div>
            <div class="form-group">
                <label for="github_url">GitHub URL</label>
                <input type="url" id="github_url" name="github_url" class="form-control" value="{{ old('github_url') }}" placeholder="https://github.com/...">
            </div>
        </div>

        <div class="form-group">
            <label for="image">Project Image</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="sort_order">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div class="form-group" style="display: flex; align-items: flex-end;">
                <div class="form-check">
                    <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                    <label for="featured">Featured Project (show on homepage)</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Create Project
        </button>
    </form>
</div>
@endsection

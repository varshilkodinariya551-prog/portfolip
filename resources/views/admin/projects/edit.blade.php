@extends('layouts.admin')

@section('title', 'Edit: ' . $project->title)

@section('content')
<div class="admin-header">
    <h1>Edit Project</h1>
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

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Project Title *</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Short Description *</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="long_description">Detailed Description</label>
            <textarea id="long_description" name="long_description" class="form-control" style="min-height: 150px;">{{ old('long_description', $project->long_description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tech_stack">Tech Stack * (comma-separated)</label>
            <input type="text" id="tech_stack" name="tech_stack" class="form-control" value="{{ old('tech_stack', $project->tech_stack) }}" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="live_url">Live URL</label>
                <input type="url" id="live_url" name="live_url" class="form-control" value="{{ old('live_url', $project->live_url) }}">
            </div>
            <div class="form-group">
                <label for="github_url">GitHub URL</label>
                <input type="url" id="github_url" name="github_url" class="form-control" value="{{ old('github_url', $project->github_url) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="image">Project Image</label>
            @if($project->image)
                <div style="margin-bottom: 8px;">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="max-height: 100px; border-radius: var(--radius-sm); border: 1px solid var(--border-color);">
                </div>
            @endif
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="sort_order">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $project->sort_order) }}">
            </div>
            <div class="form-group" style="display: flex; align-items: flex-end;">
                <div class="form-check">
                    <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                    <label for="featured">Featured Project</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update Project
        </button>
    </form>
</div>
@endsection

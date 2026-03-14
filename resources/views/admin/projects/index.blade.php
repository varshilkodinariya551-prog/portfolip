@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')
<div class="admin-header">
    <h1>Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> New Project
    </a>
</div>

<div class="admin-table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Title</th>
                <th>Tech Stack</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->sort_order }}</td>
                <td>
                    <strong>{{ $project->title }}</strong>
                    <br><small class="text-muted">{{ Str::limit($project->description, 60) }}</small>
                </td>
                <td>
                    <div class="project-tags">
                        @foreach(array_slice($project->tech_stack_array, 0, 3) as $tech)
                            <span class="project-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </td>
                <td>
                    @if($project->featured)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-info">No</span>
                    @endif
                </td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.projects.edit', $project) }}"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="delete-form" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted" style="padding: 40px;">
                    No projects yet. <a href="{{ route('admin.projects.create') }}">Create one</a>!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

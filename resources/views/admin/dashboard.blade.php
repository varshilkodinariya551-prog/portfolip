@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="admin-header">
    <h1>Dashboard</h1>
    <p style="color: var(--text-secondary);">Welcome back, {{ Auth::user()->name }}!</p>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon violet"><i class="fas fa-folder-open"></i></div>
        <div class="stat-value">{{ $stats['projects'] }}</div>
        <div class="stat-label">Total Projects</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon cyan"><i class="fas fa-code"></i></div>
        <div class="stat-value">{{ $stats['skills'] }}</div>
        <div class="stat-label">Skills</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-envelope"></i></div>
        <div class="stat-value">{{ $stats['messages'] }}</div>
        <div class="stat-label">Messages</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon pink"><i class="fas fa-bell"></i></div>
        <div class="stat-value">{{ $stats['unread'] }}</div>
        <div class="stat-label">Unread Messages</div>
    </div>
</div>

<!-- Recent Messages -->
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <div>
        <h2 style="font-size: 1.2rem; font-weight: 700; margin-bottom: 16px;">Recent Messages</h2>
        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentMessages as $message)
                    <tr>
                        <td>
                            <a href="{{ route('admin.contacts.show', $message) }}">{{ $message->name }}</a>
                        </td>
                        <td>{{ Str::limit($message->subject, 30) }}</td>
                        <td>
                            @if($message->is_read)
                                <span class="badge badge-success">Read</span>
                            @else
                                <span class="badge badge-warning">New</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No messages yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <h2 style="font-size: 1.2rem; font-weight: 700; margin-bottom: 16px;">Recent Projects</h2>
        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentProjects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>
                            @if($project->featured)
                                <span class="badge badge-success">Featured</span>
                            @else
                                <span class="badge badge-info">Normal</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" style="font-size: 0.85rem;">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No projects yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

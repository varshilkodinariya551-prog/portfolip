@extends('layouts.admin')

@section('title', 'Manage Skills')

@section('content')
<div class="admin-header">
    <h1>Skills</h1>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Add Skill
    </a>
</div>

@forelse($skills as $category => $categorySkills)
<div style="margin-bottom: 32px;">
    <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 12px; color: var(--accent-violet);">{{ $category }}</h3>
    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Skill</th>
                    <th>Proficiency</th>
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorySkills as $skill)
                <tr>
                    <td>{{ $skill->sort_order }}</td>
                    <td><strong>{{ $skill->name }}</strong></td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="skill-bar" style="width: 100px;">
                                <div class="skill-bar-fill" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                            <span style="font-size: 0.85rem; font-family: var(--font-mono);">{{ $skill->proficiency }}%</span>
                        </div>
                    </td>
                    <td><i class="{{ $skill->icon }}"></i></td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.skills.edit', $skill) }}"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="delete-form" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@empty
<div class="text-center text-muted" style="padding: 60px;">
    <i class="fas fa-code" style="font-size: 2rem; margin-bottom: 16px; display: block;"></i>
    No skills yet. <a href="{{ route('admin.skills.create') }}">Add your first skill</a>!
</div>
@endforelse
@endsection

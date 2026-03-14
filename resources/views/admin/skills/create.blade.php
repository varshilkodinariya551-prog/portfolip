@extends('layouts.admin')

@section('title', 'Add Skill')

@section('content')
<div class="admin-header">
    <h1>Add Skill</h1>
    <a href="{{ route('admin.skills.index') }}" class="btn btn-outline btn-sm">
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

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="name">Skill Name *</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Laravel">
            </div>
            <div class="form-group">
                <label for="category">Category *</label>
                <input type="text" id="category" name="category" class="form-control" value="{{ old('category') }}" required placeholder="Backend, Frontend, DevOps, Database">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="proficiency">Proficiency (0-100) *</label>
                <input type="number" id="proficiency" name="proficiency" class="form-control" value="{{ old('proficiency', 80) }}" min="0" max="100" required>
            </div>
            <div class="form-group">
                <label for="icon">Font Awesome Icon Class</label>
                <input type="text" id="icon" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="fab fa-laravel">
            </div>
        </div>

        <div class="form-group">
            <label for="sort_order">Sort Order</label>
            <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Add Skill
        </button>
    </form>
</div>
@endsection

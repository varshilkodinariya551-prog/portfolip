@extends('layouts.admin')

@section('title', 'Message from ' . $contact->name)

@section('content')
<div class="admin-header">
    <h1>Message Details</h1>
    <div style="display: flex; gap: 8px;">
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>

<div class="message-detail">
    <div class="message-meta">
        <div class="meta-item">
            <div class="meta-label">From</div>
            <div class="meta-value">{{ $contact->name }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Email</div>
            <div class="meta-value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Subject</div>
            <div class="meta-value">{{ $contact->subject }}</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Received</div>
            <div class="meta-value">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
    </div>
    <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 12px;">Message</h3>
    <div class="message-body">
        {!! nl2br(e($contact->message)) !!}
    </div>
</div>
@endsection

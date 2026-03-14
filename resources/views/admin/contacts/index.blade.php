@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="admin-header">
    <h1>Messages</h1>
</div>

<div class="admin-table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>From</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr>
                <td>
                    @if($contact->is_read)
                        <span class="badge badge-success">Read</span>
                    @else
                        <span class="badge badge-warning">New</span>
                    @endif
                </td>
                <td><strong>{{ $contact->name }}</strong></td>
                <td>{{ $contact->email }}</td>
                <td>{{ Str::limit($contact->subject, 40) }}</td>
                <td style="font-size: 0.85rem; color: var(--text-muted);">{{ $contact->created_at->diffForHumans() }}</td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('admin.contacts.show', $contact) }}"><i class="fas fa-eye"></i> View</a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="delete-form" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted" style="padding: 60px;">
                    <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 16px; display: block;"></i>
                    No messages yet. They'll appear here when someone contacts you!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($contacts->hasPages())
    <div style="margin-top: 24px;">
        {{ $contacts->links() }}
    </div>
@endif
@endsection

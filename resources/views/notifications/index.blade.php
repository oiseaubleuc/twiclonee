@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-6 space-y-4">
        <h1 class="text-2xl font-bold mb-4">Notifications</h1>

        @forelse ($notifications as $notification)
            <div class="bg-white p-4 rounded shadow">
                @if ($notification->type === 'like')
                    <p>
                        <strong>{{ \App\Models\User::find($notification->data['by'])->name }}</strong>
                        liked your <a href="{{ route('tweets.index') }}#tweet-{{ $notification->data['tweet_id'] }}" class="text-blue-500">tweet</a>.
                    </p>
                @elseif ($notification->type === 'comment')
                    <p><strong>{{ \App\Models\User::find($notification->data['by'])->name }}</strong> replied to your tweet.</p>
                @elseif ($notification->type === 'follow')
                    <p><strong>{{ \App\Models\User::find($notification->data['by'])->name }}</strong> started following you.</p>
                @endif
            </div>
        @empty
            <p class="text-gray-600">No notifications yet.</p>
        @endforelse
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-6 space-y-6">
        <!-- Gebruikersinfo -->
        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-500 text-sm">@{{ $user->username }}</p>
                </div>

                @auth
                    @if (auth()->id() !== $user->id)
                        <form action="{{ route('follow.toggle', $user) }}" method="POST">
                            @csrf
                            <button class="px-4 py-1 text-sm font-semibold rounded border
                            {{ auth()->user()->isFollowing($user) ? 'bg-white text-black border-gray-400' : 'bg-blue-500 text-white border-blue-500' }}">
                                {{ auth()->user()->isFollowing($user) ? 'Ontvolgen' : 'Volgen' }}
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <!-- Volgers -->
            <div class="mt-3 text-sm text-gray-600">
            <span class="mr-4">
                <strong>{{ $user->following()->count() }}</strong> volgend
            </span>
                <span>
                <strong>{{ $user->followers()->count() }}</strong> volgers
            </span>
            </div>
        </div>

        <!-- Tweets -->
        <div class="space-y-4">
            @forelse ($tweets as $tweet)
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-800">{{ $tweet->body }}</p>
                    <p class="text-xs text-gray-500 mt-2">Geplaatst op {{ $tweet->created_at->format('d/m/Y H:i') }}</p>
                </div>
            @empty
                <p class="text-gray-600">Nog geen tweets.</p>
            @endforelse
        </div>
    </div>
@endsection

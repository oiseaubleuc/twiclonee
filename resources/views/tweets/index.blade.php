@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-12 gap-6 max-w-7xl mx-auto px-4 mt-8">
        <!-- Sidebar -->
        <aside class="col-span-3 hidden lg:block">
            <nav class="bg-white p-4 rounded-xl shadow space-y-4 sticky top-6">
                <a href="{{ route('tweets.index') }}" class="block font-semibold text-lg text-blue-600">Home</a>
                <a href="{{ route('notifications.index') }}" class="block text-gray-700 hover:text-blue-500">Notifications</a>
                @auth
                    <a href="{{ route('profile.show', auth()->user()->username) }}" class="block text-gray-700 hover:text-blue-500">
                        Profile
                    </a>
                @endauth

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 hover:underline">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Feed -->
        <main class="col-span-12 lg:col-span-6">
            <!-- Tweet form -->
            <form method="POST" action="{{ route('tweets.store') }}" class="bg-white p-4 rounded-xl shadow mb-6">
                @csrf
                <textarea name="body" rows="3" class="w-full border border-gray-300 rounded p-3" placeholder="What's happening?" required></textarea>
                <div class="text-right mt-2">
                    <button class="bg-blue-500 text-white px-5 py-2 rounded-full hover:bg-blue-600">Tweet</button>
                </div>
            </form>

            <!-- Tweets list -->
            @forelse ($tweets as $tweet)
                <div class="bg-white p-4 rounded-xl shadow mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <a href="{{ route('profile.show', $tweet->user->username) }}" class="font-bold text-blue-600 hover:underline">
                                {{ $tweet->user->name }}
                            </a>
                            <span class="text-gray-500 text-sm">(@{{ $tweet->user->username }})</span>
                        </div>
                        <div class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="text-gray-700 mb-2">{{ $tweet->body }}</div>

                    <div class="flex items-center space-x-3 text-sm text-gray-600">
                        @if ($tweet->isLikedBy(auth()->user()))
                            <form method="POST" action="{{ route('tweets.unlike', $tweet) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">💔 Unlike</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('tweets.like', $tweet) }}">
                                @csrf
                                <button type="submit">❤️ Like</button>
                            </form>
                        @endif
                        <span>{{ $tweet->likes->count() }} likes</span>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Er zijn nog geen tweets.</p>
            @endforelse
        </main>

        <!-- Right Sidebar -->
        <aside class="col-span-3 hidden lg:block">
            <div class="bg-white p-4 rounded-xl shadow sticky top-6">
                <h2 class="font-semibold text-lg mb-4">Trends for you</h2>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>#Laravel</li>
                    <li>#Livewire</li>
                    <li>#TailwindCSS</li>
                    <li>#PHP</li>
                    <li>#WebDev</li>
                </ul>
            </div>
        </aside>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-5xl font-bold text-primary-800 mb-4">Welcome to My Blog</h1>
        <p class="text-xl text-primary-600 max-w-2xl mx-auto mb-8">Discover amazing stories, insights, and perspectives from our community of writers. Join the conversation and share your thoughts.</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('posts.create') }}" class="bg-accent-500 hover:bg-accent-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Create Post</span>
            </a>
            <a href="#posts" class="bg-white hover:bg-primary-50 text-primary-700 px-8 py-3 rounded-xl font-semibold border-2 border-primary-200 hover:border-primary-300 transition-all duration-200">
                Explore Posts
            </a>
        </div>
    </div>

    <!-- Posts Grid -->
    <div id="posts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($posts as $post)
            <article class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-primary-100 hover:border-primary-200">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-primary-800 group-hover:text-accent-600 transition-colors mb-2 line-clamp-2">
                                <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <div class="flex items-center space-x-2 text-primary-600 text-sm">
                                <div class="w-8 h-8 bg-accent-100 rounded-full flex items-center justify-center">
                                    <span class="text-accent-600 font-semibold text-xs">{{ substr($post->user->name, 0, 1) }}</span>
                                </div>
                                <span>By {{ $post->user->name }}</span>
                                <span>•</span>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-primary-700 mb-6 line-clamp-3">
                        {{ Str::limit($post->body ?? 'No description available.', 150) }}
                    </p>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center space-x-2 text-accent-600 hover:text-accent-700 font-semibold transition-colors group">
                            <span>Read More</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        @auth
                            @if(auth()->user()->id === $post->user_id)
                                <div class="flex space-x-2">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-primary-600 hover:text-primary-800 p-2 rounded-lg hover:bg-primary-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $posts->links() }}
    </div>

    @if($posts->isEmpty())
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-primary-800 mb-2">No posts yet</h3>
            <p class="text-primary-600 mb-6">Be the first to share your thoughts and create an amazing post!</p>
            <a href="{{ route('posts.create') }}" class="bg-accent-500 hover:bg-accent-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-200 inline-flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Create First Post</span>
            </a>
        </div>
    @endif
</div>
@endsection

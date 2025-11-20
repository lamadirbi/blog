@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <article class="max-w-4xl mx-auto">
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
            <div class="flex items-center text-gray-600 mb-4">
                <span>By {{ $post->user->name }}</span>
                <span class="mx-2">•</span>
                <span>{{ $post->created_at->format('F j, Y') }}</span>
            </div>
        </header>

        <div class="bg-white p-8 rounded-lg shadow-md mb-8">
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>

        <!-- Social Sharing -->
        <div class="flex items-center space-x-4 mb-8">
            <span class="text-gray-600">Share:</span>
            <a href="#" class="text-blue-600 hover:text-blue-800">Facebook</a>
            <a href="#" class="text-blue-400 hover:text-blue-600">Twitter</a>
            <a href="#" class="text-pink-600 hover:text-pink-800">Instagram</a>
        </div>

        @auth
            @if(auth()->user()->id === $post->user_id)
                <div class="flex gap-3 mb-8">
                    <a href="{{ route('posts.edit', $post) }}" class="bg-purple-500 text-white px-6 py-2 rounded-lg hover:bg-purple-600 transition">Edit Post</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">Delete Post</button>
                    </form>
                </div>
            @endif
        @endauth

        <!-- Comments Section -->
        <div class="bg-gray-50 p-6 rounded-lg">
            <h3 class="text-2xl font-bold mb-4">Comments</h3>
            @auth
                <form action="#" method="POST" class="mb-6">
                    @csrf
                    <textarea name="comment" rows="4" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Leave a comment..."></textarea>
                    <button type="submit" class="mt-2 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Post Comment</button>
                </form>
            @else
                <p class="text-gray-600 mb-4">Please <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800">log in</a> to leave a comment.</p>
            @endauth

            <!-- Comments List -->
            <div class="space-y-4">
                <!-- Placeholder for comments -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-gray-600">Comments feature coming soon!</p>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection

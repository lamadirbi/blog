@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" id="post-form">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="Enter an engaging title..." class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <textarea name="content" id="content" rows="12" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Write your post content here... (Rich text editor coming soon)" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('posts.show', $post) }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">Update Post</button>
            </div>
        </form>
    </div>
</div>

<script>
// Placeholder for rich text editor initialization
// In a real implementation, you'd initialize TinyMCE or Quill here
document.addEventListener('DOMContentLoaded', function() {
    console.log('Rich text editor will be initialized here');
});
</script>
@endsection

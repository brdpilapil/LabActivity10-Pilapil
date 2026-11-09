@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="bg-white rounded-lg shadow p-6 sm:p-8 max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-4">
        <span class="text-xs font-semibold px-3 py-1 rounded bg-blue-100 text-blue-800">
            {{ $post->category }}
        </span>
        @if ($post->is_pinned)
            <span class="text-xs font-bold px-3 py-1 rounded bg-amber-500 text-white">
                Pinned
            </span>
        @endif
    </div>

    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6 border-b pb-4">
        <span>Author ID: {{ $post->author_id }}</span>
        <span>•</span>
        <span>Published: {{ $post->published_at ? $post->published_at->format('F d, Y') : 'N/A' }}</span>
        <span>•</span>
        <span>Views: {{ $post->views }}</span>
    </div>

    <div class="prose max-w-none text-gray-800 leading-relaxed space-y-4 mb-8">
        {!! nl2br(e($post->body)) !!}
    </div>

    <a href="{{ route('posts.index') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
        ← Back to Posts
    </a>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Barangay Bulletin - Purok [Lastname]')

@section('content')
<div class="mb-6 bg-white p-4 rounded-lg shadow sm:p-6">
    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-3">
        <input 
            type="text" 
            name="q" 
            value="{{ request('q') }}" 
            placeholder="Search title..." 
            class="border border-gray-300 rounded px-3 py-2 w-full sm:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        
        <select 
            name="category" 
            class="border border-gray-300 rounded px-3 py-2 w-full sm:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            <option value="">All Categories</option>
            @foreach ($categories as $c)
                <option value="{{ $c }}" {{ request('category') === $c ? 'selected' : '' }}>
                    {{ $c }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded hover:bg-blue-800 transition">
            Filter
        </button>
    </form>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
@forelse ($posts as $post)
    <div class="bg-white rounded-lg shadow p-5 flex flex-col justify-between border-t-4 {{ $post->is_pinned ? 'border-amber-500' : 'border-blue-600' }}">
        <div>
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-100 text-blue-800">
                    {{ $post->category }}
                </span>
                @if ($post->is_pinned)
                    <span class="text-xs font-bold px-2 py-0.5 rounded bg-amber-500 text-white">
                        Pinned
                    </span>
                @endif
            </div>

            <h2 class="text-lg font-bold text-gray-900 mb-2">
                <a href="{{ route('posts.show', $post->id) }}" class="hover:text-blue-600">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                {{ $post->body }}
            </p>
        </div>

        <div class="text-xs text-gray-500 border-t pt-3 flex justify-between items-center">
            <span>Author ID: {{ $post->author_id }}</span>
            <span>Views: {{ $post->views }}</span>
            <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'N/A' }}</span>
        </div>
    </div>
@empty
    <div class="col-span-full bg-white p-6 text-center text-gray-500 rounded-lg shadow">
        <p>No posts match your search.</p>
    </div>
@endforelse
</div>

<div class="mt-4">
    {{ $posts->links() }}
</div>

<p class="text-sm text-gray-600 mt-2">
    Showing {{ $posts->firstItem() ?? 0 }}-{{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts
</p>
@endsection
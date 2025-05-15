@extends('layouts.app')

@section('content')
    <div class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-4xl font-semibold tracking-tight text-gray-900 mb-10">Promoted Posts</h2>
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                @forelse ($promotedPosts as $post)
                    <x-blog.post :post="$post" />
                @empty
                    <p>No promoted posts available.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

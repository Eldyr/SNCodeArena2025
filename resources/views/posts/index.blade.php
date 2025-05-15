@extends('layouts.app')

@section('content')
    <div class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Blog page</h2>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @if ($posts->isEmpty())
                    <p>No posts found.</p>
                @else
                    @foreach ($posts as $post)
                        @if ($post->image && $post->published_at)
                            <x-blog.post :post="$post" />
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')


    <section id="authors" class="mb-16 flex flex-col items-center text-center px-4">
        <h3 class="text-3xl sm:text-4xl font-bold mb-6">Authors</h3>
        <ul class="flex flex-wrap justify-center gap-4 sm:gap-8 text-base font-bold">
            @foreach ($authors as $author)
                <li class="px-3 py-1">{{ $author->name }}</li>
            @endforeach
        </ul>
    </section>




    <div class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Posts</h2>
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

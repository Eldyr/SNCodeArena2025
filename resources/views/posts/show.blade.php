@extends('layouts.app')
{{-- @dd($post) --}}
@section('content')
    <div class="bg-white px-6 py-32 lg:px-8">
        <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
            <h1 class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">
                {{ $post->title }}
            </h1>
            <p class="mt-6 text-xl/8">{{ $post->description }}</p>
            <img class="aspect-video rounded-xl bg-gray-50 object-cover mt-10" src="{{ $post->image }}"
                alt="{{ $post->title }}">
            <div class="mt-16 max-w-2xl">
                <p class="mt-6">{{ $post->body }}</p>
            </div>
            <div class="mt-16 font-bold "> created at
                <time datetime="2020-03-16" class="text-gray-500">{{ $post->published_at->format('d M Y') }}</time> by
                <a href="">{{ $post->author->name }}</a>
            </div>
        </div>
    </div>


    <section id="comment-form" class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion</h2>
            </div>

            {{-- Comment Form --}}
            <form method="POST" action="{{ route('comment', $post) }}" class="mb-6">
                @csrf
                <div
                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" id="name" required name="name"
                        class="w-full px-3 py-2 mb-4 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    @error('name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror

                    <label for="body"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment:</label>
                    <textarea id="body" required name="body"
                        class="w-full px-3 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                    @error('body')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Submit Comment
                </button>
            </form>



            @if ($comments->isNotEmpty())
                <div class="space-y-4">
                    @foreach ($comments as $comment)
                        <div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $comment->name }}</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $comment->body }}</p>
                            <form method="POST" action="{{ route('comment.delete', $comment) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500 dark:text-gray-400">No comments yet.</p>
            @endif
        </div>
    </section>

@endsection

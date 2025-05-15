<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex justify-around items-center space-x-4">
            <a href="{{ route('posts') }}">
                Blog Posts
            </a>
            |
            <a class="pl-4" href={{ route('posts.promoted') }}>Promoted Posts</a>
        </div>
        <div>
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Netstudio</span>
                <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <a href="/admin">
            Admin
        </a>
    </nav>
</header>

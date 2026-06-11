@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-black">Spiritual Blog Library</h1>
    <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($blogs as $blog)
            <a href="{{ route('blogs.show', $blog) }}" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-amber-100">
                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="h-56 w-full object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-bold">{{ $blog->title }}</h2>
                    <p class="mt-3 text-sm text-slate-600 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 140) }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $blogs->links() }}</div>
</section>
@endsection

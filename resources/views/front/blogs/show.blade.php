@extends('layouts.front')

@section('content')
<section class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">
    <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="h-[28rem] w-full rounded-[2rem] object-cover shadow-sm ring-1 ring-amber-100">
    <h1 class="mt-8 text-4xl font-black">{{ $blog->title }}</h1>
    <article class="prose prose-slate mt-6 max-w-none">
        {!! nl2br(e($blog->content)) !!}
    </article>
</section>
@endsection

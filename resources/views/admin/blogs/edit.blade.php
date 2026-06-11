@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Edit Blog</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.blogs.update', $blog) }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf @method('PATCH')
    <input name="title" class="w-full rounded-xl border-slate-300" value="{{ old('title', $blog->title) }}">
    <input name="slug" class="w-full rounded-xl border-slate-300" value="{{ old('slug', $blog->slug) }}">
    <textarea name="content" class="w-full rounded-xl border-slate-300" rows="8">{{ old('content', $blog->content) }}</textarea>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" value="{{ old('featured_image', $blog->featured_image) }}">
    <select name="status" class="w-full rounded-xl border-slate-300">
        <option value="draft" @selected($blog->status === 'draft')>Draft</option>
        <option value="published" @selected($blog->status === 'published')>Published</option>
    </select>
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Update Blog</button>
</form>
@endsection

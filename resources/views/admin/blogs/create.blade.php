@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Create Blog</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.blogs.store') }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf
    <input name="title" class="w-full rounded-xl border-slate-300" placeholder="Title">
    <input name="slug" class="w-full rounded-xl border-slate-300" placeholder="Slug">
    <textarea name="content" class="w-full rounded-xl border-slate-300" rows="8" placeholder="Content"></textarea>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" placeholder="Featured image URL">
    <select name="status" class="w-full rounded-xl border-slate-300">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Save Blog</button>
</form>
@endsection

@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Create Puja</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.pujas.store') }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf
    <select name="temple_id" class="w-full rounded-xl border-slate-300">
        <option value="">Select Temple</option>
        @foreach ($temples as $temple)
            <option value="{{ $temple->id }}">{{ $temple->name }}</option>
        @endforeach
    </select>
    <select name="category_id" class="w-full rounded-xl border-slate-300">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input name="name" class="w-full rounded-xl border-slate-300" placeholder="Name">
    <input name="slug" class="w-full rounded-xl border-slate-300" placeholder="Slug">
    <textarea name="description" class="w-full rounded-xl border-slate-300" rows="4" placeholder="Description"></textarea>
    <textarea name="benefits" class="w-full rounded-xl border-slate-300" rows="4" placeholder="Benefits"></textarea>
    <div class="grid gap-4 md:grid-cols-2">
        <input type="number" name="duration_minutes" class="w-full rounded-xl border-slate-300" placeholder="Duration minutes">
        <input type="number" step="0.01" name="price" class="w-full rounded-xl border-slate-300" placeholder="Price">
    </div>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" placeholder="Featured image URL">
    <select name="status" class="w-full rounded-xl border-slate-300">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>
    <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_featured" value="1"> Featured</label>
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Save Puja</button>
</form>
@endsection

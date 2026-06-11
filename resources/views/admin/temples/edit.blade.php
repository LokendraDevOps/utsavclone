@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Edit Temple</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.temples.update', $temple) }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf @method('PATCH')
    <input name="name" class="w-full rounded-xl border-slate-300" value="{{ old('name', $temple->name) }}">
    <input name="slug" class="w-full rounded-xl border-slate-300" value="{{ old('slug', $temple->slug) }}">
    <input name="location" class="w-full rounded-xl border-slate-300" value="{{ old('location', $temple->location) }}">
    <input name="state" class="w-full rounded-xl border-slate-300" value="{{ old('state', $temple->state) }}">
    <textarea name="description" class="w-full rounded-xl border-slate-300" rows="6">{{ old('description', $temple->description) }}</textarea>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" value="{{ old('featured_image', $temple->featured_image) }}">
    <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_featured" value="1" @checked($temple->is_featured)> Featured</label>
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Update Temple</button>
</form>
@endsection

@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Create Temple</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.temples.store') }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf
    <input name="name" class="w-full rounded-xl border-slate-300" placeholder="Name" value="{{ old('name') }}">
    <input name="slug" class="w-full rounded-xl border-slate-300" placeholder="Slug" value="{{ old('slug') }}">
    <input name="location" class="w-full rounded-xl border-slate-300" placeholder="Location" value="{{ old('location') }}">
    <input name="state" class="w-full rounded-xl border-slate-300" placeholder="State" value="{{ old('state') }}">
    <textarea name="description" class="w-full rounded-xl border-slate-300" rows="6" placeholder="Description">{{ old('description') }}</textarea>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" placeholder="Featured image URL" value="{{ old('featured_image') }}">
    <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_featured" value="1"> Featured</label>
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Save Temple</button>
</form>
@endsection

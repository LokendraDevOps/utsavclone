@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Edit Festival</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.festivals.update', $festival) }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf @method('PATCH')
    <input name="name" class="w-full rounded-xl border-slate-300" value="{{ old('name', $festival->name) }}">
    <input name="slug" class="w-full rounded-xl border-slate-300" value="{{ old('slug', $festival->slug) }}">
    <input type="date" name="festival_date" class="w-full rounded-xl border-slate-300" value="{{ old('festival_date', $festival->festival_date?->format('Y-m-d')) }}">
    <textarea name="description" class="w-full rounded-xl border-slate-300" rows="6">{{ old('description', $festival->description) }}</textarea>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" value="{{ old('featured_image', $festival->featured_image) }}">
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Update Festival</button>
</form>
@endsection

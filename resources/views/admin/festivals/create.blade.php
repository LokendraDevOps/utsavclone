@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Create Festival</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.festivals.store') }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf
    <input name="name" class="w-full rounded-xl border-slate-300" placeholder="Name">
    <input name="slug" class="w-full rounded-xl border-slate-300" placeholder="Slug">
    <input type="date" name="festival_date" class="w-full rounded-xl border-slate-300">
    <textarea name="description" class="w-full rounded-xl border-slate-300" rows="6" placeholder="Description"></textarea>
    <input name="featured_image" class="w-full rounded-xl border-slate-300" placeholder="Featured image URL">
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Save Festival</button>
</form>
@endsection

@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Create Testimonial</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.testimonials.store') }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf
    <input name="name" class="w-full rounded-xl border-slate-300" placeholder="Name">
    <input name="designation" class="w-full rounded-xl border-slate-300" placeholder="Designation">
    <textarea name="message" class="w-full rounded-xl border-slate-300" rows="6" placeholder="Message"></textarea>
    <input type="number" min="1" max="5" name="rating" class="w-full rounded-xl border-slate-300" placeholder="Rating">
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Save Testimonial</button>
</form>
@endsection

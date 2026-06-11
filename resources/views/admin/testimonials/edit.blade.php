@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-black">Edit Testimonial</h1>
@include('partials.flash')
<form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" class="mt-6 max-w-3xl space-y-4 rounded-[2rem] bg-white p-6 text-slate-950 shadow-sm">
    @csrf @method('PATCH')
    <input name="name" class="w-full rounded-xl border-slate-300" value="{{ old('name', $testimonial->name) }}">
    <input name="designation" class="w-full rounded-xl border-slate-300" value="{{ old('designation', $testimonial->designation) }}">
    <textarea name="message" class="w-full rounded-xl border-slate-300" rows="6">{{ old('message', $testimonial->message) }}</textarea>
    <input type="number" min="1" max="5" name="rating" class="w-full rounded-xl border-slate-300" value="{{ old('rating', $testimonial->rating) }}">
    <button class="rounded-full bg-amber-400 px-5 py-3 font-semibold text-slate-950">Update Testimonial</button>
</form>
@endsection

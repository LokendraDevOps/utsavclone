@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-3xl font-black">Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="rounded-full bg-amber-400 px-4 py-2 font-semibold text-slate-950">Add Testimonial</a>
</div>
<div class="mt-6 overflow-hidden rounded-[2rem] bg-white text-slate-950 shadow-sm">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50 text-left text-sm">
            <tr>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Designation</th>
                <th class="px-6 py-4">Rating</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td class="px-6 py-4 font-semibold">{{ $testimonial->name }}</td>
                    <td class="px-6 py-4">{{ $testimonial->designation }}</td>
                    <td class="px-6 py-4">{{ $testimonial->rating }}/5</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-4 text-sm">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="font-semibold text-amber-700">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}">
                                @csrf @method('DELETE')
                                <button class="font-semibold text-rose-600">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $testimonials->links() }}</div>
@endsection

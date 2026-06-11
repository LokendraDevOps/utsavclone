@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-3xl font-black">Festivals</h1>
    <a href="{{ route('admin.festivals.create') }}" class="rounded-full bg-amber-400 px-4 py-2 font-semibold text-slate-950">Add Festival</a>
</div>
<div class="mt-6 overflow-hidden rounded-[2rem] bg-white text-slate-950 shadow-sm">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50 text-left text-sm">
            <tr>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @foreach ($festivals as $festival)
                <tr>
                    <td class="px-6 py-4 font-semibold">{{ $festival->name }}</td>
                    <td class="px-6 py-4">{{ $festival->festival_date->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-4 text-sm">
                            <a href="{{ route('admin.festivals.edit', $festival) }}" class="font-semibold text-amber-700">Edit</a>
                            <form method="POST" action="{{ route('admin.festivals.destroy', $festival) }}">
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
<div class="mt-6">{{ $festivals->links() }}</div>
@endsection

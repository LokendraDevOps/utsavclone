@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-3xl font-black">Pujas</h1>
    <a href="{{ route('admin.pujas.create') }}" class="rounded-full bg-amber-400 px-4 py-2 font-semibold text-slate-950">Add Puja</a>
</div>
<div class="mt-6 overflow-hidden rounded-[2rem] bg-white text-slate-950 shadow-sm">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50 text-left text-sm">
            <tr>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Temple</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @foreach ($pujas as $puja)
                <tr>
                    <td class="px-6 py-4 font-semibold">{{ $puja->name }}</td>
                    <td class="px-6 py-4">{{ $puja->temple->name }}</td>
                    <td class="px-6 py-4">₹{{ number_format($puja->price, 0) }}</td>
                    <td class="px-6 py-4">{{ $puja->status }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-4 text-sm">
                            <a href="{{ route('admin.pujas.edit', $puja) }}" class="font-semibold text-amber-700">Edit</a>
                            <form method="POST" action="{{ route('admin.pujas.destroy', $puja) }}">
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
<div class="mt-6">{{ $pujas->links() }}</div>
@endsection

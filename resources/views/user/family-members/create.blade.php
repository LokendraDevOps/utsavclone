<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-black">Add Family Member</h2></x-slot>
    @include('partials.flash')
    <form method="POST" action="{{ route('user.family-members.store') }}" class="max-w-2xl space-y-4 rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
        @csrf
        <div><label class="text-sm font-semibold">Name</label><input name="name" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('name') }}"></div>
        <div><label class="text-sm font-semibold">Relation</label><input name="relation" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('relation') }}"></div>
        <div><label class="text-sm font-semibold">Date of Birth</label><input type="date" name="date_of_birth" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('date_of_birth') }}"></div>
        <div><label class="text-sm font-semibold">Gender</label><input name="gender" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('gender') }}"></div>
        <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Save</button>
    </form>
</x-app-layout>

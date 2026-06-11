<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-black">Edit Family Member</h2></x-slot>
    @include('partials.flash')
    <form method="POST" action="{{ route('user.family-members.update', $familyMember) }}" class="max-w-2xl space-y-4 rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
        @csrf @method('PATCH')
        <div><label class="text-sm font-semibold">Name</label><input name="name" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('name', $familyMember->name) }}"></div>
        <div><label class="text-sm font-semibold">Relation</label><input name="relation" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('relation', $familyMember->relation) }}"></div>
        <div><label class="text-sm font-semibold">Date of Birth</label><input type="date" name="date_of_birth" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('date_of_birth', optional($familyMember->date_of_birth)->format('Y-m-d')) }}"></div>
        <div><label class="text-sm font-semibold">Gender</label><input name="gender" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('gender', $familyMember->gender) }}"></div>
        <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Update</button>
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header"><h2 class="text-2xl font-black">Edit Gotra</h2></x-slot>
    @include('partials.flash')
    <form method="POST" action="{{ route('user.gotra-information.update', $gotra) }}" class="max-w-2xl space-y-4 rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
        @csrf @method('PATCH')
        <div><label class="text-sm font-semibold">Gotra</label><input name="gotra" class="mt-1 w-full rounded-xl border-slate-300" value="{{ old('gotra', $gotra->gotra) }}"></div>
        <div><label class="text-sm font-semibold">Description</label><textarea name="description" class="mt-1 w-full rounded-xl border-slate-300">{{ old('description', $gotra->description) }}</textarea></div>
        <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_default" value="1" @checked($gotra->is_default)> Make default</label>
        <button class="rounded-full bg-slate-900 px-5 py-3 font-semibold text-white">Update</button>
    </form>
</x-app-layout>

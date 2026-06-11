<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm uppercase tracking-[0.35em] text-amber-700">Gotra Information</div>
                <h2 class="text-2xl font-black">Manage family gotra records</h2>
            </div>
            <a href="{{ route('user.gotra-information.create') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Add Gotra</a>
        </div>
    </x-slot>
    @include('partials.flash')
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($gotras as $gotra)
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-amber-100">
                <div class="font-bold">{{ $gotra->gotra }}</div>
                <div class="text-sm text-slate-600">{{ $gotra->description }}</div>
                <div class="mt-4 flex gap-3 text-sm">
                    <a href="{{ route('user.gotra-information.edit', $gotra) }}" class="font-semibold text-amber-700">Edit</a>
                    <form method="POST" action="{{ route('user.gotra-information.destroy', $gotra) }}">
                        @csrf @method('DELETE')
                        <button class="font-semibold text-rose-600">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">{{ $gotras->links() }}</div>
</x-app-layout>

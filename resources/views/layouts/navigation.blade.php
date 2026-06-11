<nav x-data="{ open: false }" class="border-b border-amber-100 bg-white/80 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-amber-500 via-orange-500 to-rose-500 text-white">ॐ</div>
                <div>
                    <div class="text-xs uppercase tracking-[0.3em] text-amber-700">Divine Booking</div>
                    <div class="text-sm font-semibold">Member Portal</div>
                </div>
            </a>

            <div class="hidden items-center gap-6 text-sm font-medium md:flex">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('user.bookings.index') }}">Bookings</a>
                <a href="{{ route('user.family-members.index') }}">Family Members</a>
                <a href="{{ route('user.gotra-information.index') }}">Gotra</a>
                <a href="{{ route('profile.edit') }}">Profile</a>
            </div>

            <div class="hidden md:block">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Logout</button>
                </form>
            </div>

            <button @click="open = ! open" class="rounded-lg p-2 text-slate-700 md:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-amber-100 md:hidden">
        <div class="space-y-1 px-4 py-3 text-sm">
            <a class="block rounded-lg px-3 py-2" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="block rounded-lg px-3 py-2" href="{{ route('user.bookings.index') }}">Bookings</a>
            <a class="block rounded-lg px-3 py-2" href="{{ route('user.family-members.index') }}">Family Members</a>
            <a class="block rounded-lg px-3 py-2" href="{{ route('user.gotra-information.index') }}">Gotra</a>
            <a class="block rounded-lg px-3 py-2" href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="block rounded-lg px-3 py-2 text-left">Logout</button>
            </form>
        </div>
    </div>
</nav>

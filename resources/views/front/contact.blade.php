@extends('layouts.front')

@section('content')
<section class="mx-auto grid max-w-5xl gap-8 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8">
    <div>
        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-700">Contact Us</span>
        <h1 class="mt-4 text-4xl font-black">Talk to the team behind the demo.</h1>
        <p class="mt-6 text-lg text-slate-700">For client walkthroughs, enterprise requirements, or next-phase roadmap discussions, this page gives the platform a polished public contact surface.</p>
    </div>
    <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-amber-100">
        <div class="space-y-4 text-sm">
            <div><strong>Email:</strong> hello@divinebooking.test</div>
            <div><strong>Phone:</strong> +91 98765 43210</div>
            <div><strong>Hours:</strong> 9:00 AM - 7:00 PM</div>
            <div><strong>Location:</strong> India</div>
        </div>
    </div>
</section>
@endsection

<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\FamilyMember;
use App\Models\GotraEntry;
use App\Policies\BookingPolicy;
use App\Policies\FamilyMemberPolicy;
use App\Policies\GotraEntryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(FamilyMember::class, FamilyMemberPolicy::class);
        Gate::policy(GotraEntry::class, GotraEntryPolicy::class);
        Gate::policy(Booking::class, BookingPolicy::class);
    }
}

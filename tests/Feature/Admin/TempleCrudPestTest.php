<?php

use App\Models\Temple;
use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
});

it('allows super admin to create a temple', function () {
    $admin = User::factory()->create(['email_verified_at' => now()]);
    $admin->assignRole('Super Admin');

    $this->actingAs($admin);

    $this->post(route('admin.temples.store', absolute: false), [
        'name' => 'Demo Temple',
        'slug' => 'demo-temple',
        'description' => 'Temple description',
        'location' => 'Demo City',
        'state' => 'Demo State',
        'featured_image' => 'https://picsum.photos/seed/demo-temple/1200/800',
        'is_featured' => true,
    ])->assertRedirect(route('admin.temples.index', absolute: false));

    $this->assertDatabaseHas('temples', ['slug' => 'demo-temple']);
});

it('allows super admin to update a temple', function () {
    $admin = User::factory()->create(['email_verified_at' => now()]);
    $admin->assignRole('Super Admin');
    $temple = Temple::factory()->create(['name' => 'Old Temple']);

    $this->actingAs($admin);

    $this->patch(route('admin.temples.update', $temple, absolute: false), [
        'name' => 'Updated Temple',
        'slug' => 'updated-temple',
        'description' => 'Updated description',
        'location' => 'Updated City',
        'state' => 'Updated State',
        'featured_image' => 'https://picsum.photos/seed/updated-temple/1200/800',
        'is_featured' => false,
    ])->assertRedirect(route('admin.temples.index', absolute: false));

    $this->assertDatabaseHas('temples', ['slug' => 'updated-temple']);
});

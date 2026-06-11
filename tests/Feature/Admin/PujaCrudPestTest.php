<?php

use App\Models\Category;
use App\Models\Temple;
use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
});

it('allows super admin to create a puja', function () {
    $admin = User::factory()->create(['email_verified_at' => now()]);
    $admin->assignRole('Super Admin');
    $temple = Temple::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($admin);

    $this->post(route('admin.pujas.store', absolute: false), [
        'temple_id' => $temple->id,
        'category_id' => $category->id,
        'name' => 'Demo Puja',
        'slug' => 'demo-puja',
        'description' => 'Demo description',
        'benefits' => 'Peace and blessings',
        'duration_minutes' => 60,
        'price' => 1200,
        'featured_image' => 'https://picsum.photos/seed/demo-puja/1200/800',
        'status' => 'published',
        'is_featured' => true,
    ])->assertRedirect(route('admin.pujas.index', absolute: false));

    $this->assertDatabaseHas('pujas', ['slug' => 'demo-puja']);
});

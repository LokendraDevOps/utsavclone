<?php

use App\Models\User;

it('allows a user to register and reach the dashboard', function () {
    $response = $this->post('/register', [
        'name' => 'Test Devotee',
        'email' => 'devotee@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertRedirect(route('dashboard', absolute: false));
    $this->assertAuthenticated();
});

it('allows an existing user to log in', function () {
    $user = User::factory()->create([
        'email' => 'login@example.com',
        'email_verified_at' => now(),
    ]);

    $response = $this->post('/login', [
        'email' => 'login@example.com',
        'password' => 'password',
    ]);

    $response->assertRedirect(route('dashboard', absolute: false));
    $this->assertAuthenticatedAs($user);
});

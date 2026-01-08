<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertRedirect('/login'); // Redirects to combined auth page
});

test('new users can register', function () {
    $response = $this->withSession(['_token' => 'test-token'])
        ->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '081234567890',
            'password' => 'password',
            'password_confirmation' => 'password',
            '_token' => 'test-token',
        ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

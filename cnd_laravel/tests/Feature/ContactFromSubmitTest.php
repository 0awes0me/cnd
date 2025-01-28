<?php


use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('successfully submits the contact form', function () {
    $response = $this->postJson('/api/contact-form', [
        'name'    => 'John Doe',
        'email'   => 'john@example.com',
        'subject' => 'Inquiry',
        'message' => 'I need help with your service.',
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => __('Created !'),
            'success' => true,
        ]);
});

it('validates required fields', function () {
    $response = $this->postJson('/api/contact-form', [
        'name'    => '',
        'email'   => 'invalid-email',
        'subject' => '',
        'message' => '',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors([
            'name',
            'email',
            'subject',
            'message',
        ]);
});

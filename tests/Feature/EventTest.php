<?php

// test('example', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;


test('user can view events', function () {
    $event = Event::factory()->create();

    $response = get('/events');

    $response->assertStatus(200);
    $response->assertSee($event->name);
});

test('user can create event', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $eventData = [
        'title' => 'New Event',
        'description' => 'Event Description',
        'date' => '2023-12-31',
        'category_id' => $category->id,
        'location' => 'Event Location',
    ];

    $response = actingAs($user)->post('/events', $eventData);

    $response->assertRedirect('/events');
    $this->assertDatabaseHas('events', ['title' => 'New Event']);
});

test('user can update event', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create();

    $updatedData = [
        'title' => 'Updated Event Name',
        'description' => 'Updated Description',
        'date' => '2024-01-01',
        'category_id' => $event->category_id,
        'location' => 'Updated Location',
    ];

    $response = actingAs($user)->put("/events/{$event->id}", $updatedData);

    $response->assertRedirect('/events');
    $this->assertDatabaseHas('events', ['id' => $event->id, 'title' => 'Updated Event Title']);
});

test('user can delete event', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create();

    $response = actingAs($user)->delete("/events/{$event->id}");

    $response->assertRedirect('/events');
    $this->assertDatabaseMissing('events', ['id' => $event->id]);
});
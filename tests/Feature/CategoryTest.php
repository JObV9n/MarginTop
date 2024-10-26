<?php

use App\Models\User;
use App\Models\Category;
// test('example', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

use function Pest\Laravel\actingAs;

test('user can view categories', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $response = actingAs($user)->get('/categories');

    $response->assertStatus(200);
    $response->assertSee($category->name);
});

test('user can create category', function () {
    $user = User::factory()->create();

    $categoryData = [
        'name' => 'New Category',
        'description' => 'Category Description',
    ];

    $response = actingAs($user)->post('/categories', $categoryData);

    $response->assertRedirect('/categories');
    $this->assertDatabaseHas('categories', ['name' => 'New Category']);
});

test('user can update category', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $updatedData = [
        'name' => 'Updated Category Name',
        'description' => 'Updated Description',
    ];

    $response = actingAs($user)->put("/categories/{$category->id}", $updatedData);

    $response->assertRedirect('/categories');
    $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Updated Category Name']);
});

test('user can delete category', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $response = actingAs($user)->delete("/categories/{$category->id}");

    $response->assertRedirect('/categories');
    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
});
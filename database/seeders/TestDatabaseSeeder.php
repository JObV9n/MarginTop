<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Attendee;

class TestDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        Category::factory(5)->create();

        // Create events
        Event::factory(20)->create();

        // Create attendees
        Attendee::factory(50)->create();
    }
}
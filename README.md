# Event Management System

## Project Overview

This Event Management System is a Laravel-based application that allows users to create, manage, and attend events. It includes features for categorizing events and managing attendees by users. All the Models has it's respective Controllers, Migrations, Seeders, Factories,Policies,StoreREqust ,UpdateRequest and FeatureTests.

## Technologies used:
- Laravel 11
- PHP 8.3
- sqlite
- Built in Laravel Breeze for User Authentication
- Tailwind
- PEST
- FTP Deploy Github Actions

## Features

1. User Authentication
   - Register, login, and logout functionality
   - User can only access applicationif they are logged in

2. Event Management
   - CRUD operations for events

3. Category Management
   - CRUD operations for categories

4. Attendee Management
   - CRUD operations for attendees

5. API
   - RESTful API endpoints for events with routes:
    - /api/events -> returns all events in JSON format
    - /api/events/{id} -> returns a single event by id in JSON format

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/JObV9n/MarginTop.git
   cd MarginTop
   rm -rf vendor
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. compile frontend assets:
   ```
   npm run dev
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```

5. Run database migrations and seed the database:
   ```
   php artisan migrate --seed
   ```

6. Start the development server:
   ```
   php artisan serve
   ```

## Usage

1. User Registration and Login
   - Navigate to `/register` to create a new account
   - Log in at `/login` with your credentials

2. Event Management
   - Create a new event: Navigate to `/events/create`
   - View all events: Visit `/events`
   - Update an event: Go to `/events/edit/{event_id}`
   - Delete an event: Use the delete on the event details page

3. Category Management
   - CRUD operations for categories
   - Assign categories when creating or editing events

4. Attendee Management
   - CRUD operations for attendees

## Testing

Run the test suite using the following command:
```
vendor/bin/pest
```

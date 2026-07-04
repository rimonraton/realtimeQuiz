# Gyankosh

Gyankosh is a Laravel 7 application with a Vue 2 and Laravel Mix frontend build pipeline. This repository includes the PHP application, frontend assets, automated tests, and public build output needed for local development.

## Stack

- PHP 8.0+
- Laravel 7
- MySQL or another Laravel-supported database
- Redis PHP extension
- Node.js and npm
- Vue 2
- Laravel Mix 6

## Local Setup

1. Install PHP dependencies:

	```bash
	composer install
	```

2. Install frontend dependencies:

	```bash
	npm install
	```

3. Configure your environment variables in `.env`.

4. Generate an application key if needed:

	```bash
	php artisan key:generate
	```

5. Run database migrations when setting up a fresh environment:

	```bash
	php artisan migrate
	```

6. Start the application.

	If you are using Laravel Herd, serve the project through Herd. Otherwise, use the built-in Laravel server:

	```bash
	php artisan serve
	```

## Frontend Assets

Use Laravel Mix for frontend asset compilation:

```bash
npm run dev
```

Available scripts:

- `npm run dev` builds development assets
- `npm run watch` rebuilds on file changes
- `npm run hot` runs the hot-reload development server
- `npm run prod` builds production assets

## Tests

Run the automated test suite with either command:

```bash
php artisan test
```

```bash
vendor/bin/phpunit
```

The test configuration uses an in-memory SQLite database by default.

## Useful Commands

```bash
php artisan route:list
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## Project Structure

- `app/` contains application models, controllers, events, listeners, policies, and other domain code
- `resources/views/` contains Blade templates
- `resources/js/` contains frontend JavaScript and Vue components
- `routes/` contains web, API, admin, and feature-specific route definitions
- `database/migrations/` contains database schema changes
- `tests/` contains unit and feature tests

## Notes

- `public/` already contains built assets and uploaded/static content used by the application
- Some features are configured through environment variables and external services such as Redis, broadcasting, and search integrations


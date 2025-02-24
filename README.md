# Spy SPI API

This is a simple API built using Laravel to manage spy records. It includes authentication, CRUD operations for spy data, and additional functionalities like filtering, sorting, and rate-limited random spy retrieval.

Features:
User registration and login (using Laravel Sanctum)
CRUD operations for spy records
Filtering, sorting, and pagination for spy listings
Rate-limited random spy retrieval
API testing with Postman and unit tests

## Installation

Clone this repository to your local machine:
git clone <repo-url>

Navigate to the project directory:
cd <project-directory>

Install the necessary dependencies via Composer:
composer install

Copy the example environment file:
cp .env.example .env

### Environment Setup

Make sure to configure the following settings in your .env file according to your local setup
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:UyKmFEHc8QJ0fjOXgzmB7DkfQ+EbaGE4rGR0fNVTk24=
APP_DEBUG=true
APP_URL=http://localhost:8000
APP_CIPHER=AES-256-CBC

DB_CONNECTION=pgsql
DB_HOST=postgres_db
DB_PORT=5432
DB_DATABASE=spy_db
DB_USERNAME=postgres
DB_PASSWORD=arandomps

REDIS_HOST=redis_cache
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

### Database Setup

Run the migration to create the database schema
php artisan migrate

Optionally, you can seed the database with some initial data
php artisan db:seed

### Use Postman collection to initiate the api calls

### Testing
Run tests
php artisan test


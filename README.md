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
git clone https://github.com/ppascha/spy-api.git

Navigate to the project directory:
cd <project-directory>

Install the necessary dependencies via Composer:
composer install

Copy the example environment file:
cp .env.example .env

### Environment Setup

Generate the application key by running the following command
php artisan key:generate
Potential error php artisan key:generate needs an existing key to work. Fill the APP_KEY with 32 characters and rerun the command to make it work

Once you have generated your app key, it should appear in your .env file like so
APP_KEY=base64:YOUR_GENERATED_KEY_HERE

Make sure to configure the following settings in your .env file according to your local setup
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
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

### Postman Collection

To test the API endpoints, you can use the included Postman collection:

Navigate to the `postman` directory and import the `spy-api.postman_collection.json` file into Postman

#### Notes on how I would improve the system
Seed Data in App via Factories
Test All App Functions
Test Authenticated Functions with a Test Database
Dockerize Your Testing Environment
API Documentation with Swagger
On Spy creation send a Notification
Prevent deletion of spies if associated with open missions
Exception Handling
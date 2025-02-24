# Use PHP 8.3 FPM image as the base
FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpq-dev \
    libssl-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-source delete \
    && rm -rf /var/lib/apt/lists/*  # Clean up to reduce image size

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 for PHP-FPM
EXPOSE 9000

RUN composer install --no-dev --optimize-autoloader

CMD ["php-fpm"]

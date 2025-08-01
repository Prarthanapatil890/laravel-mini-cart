FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system packages
RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app files into container
COPY . /var/www
COPY --chown=www-data:www-data . /var/www

# ✅ Ensure SQLite file exists
RUN mkdir -p database && touch database/database.sqlite

# Set correct permissions
RUN chmod -R 755 /var/www

# Install Laravel PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# ⚠️ DO NOT COPY .env directly in production unless it's not managed by Render
# COPY .env.example .env

# Generate Laravel app key
#RUN php artisan key:generate

# Expose port used by Laravel's internal server (Render listens on 10000)
EXPOSE 10000

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000

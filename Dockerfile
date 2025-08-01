FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system packages
RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev

# Install PHP extensions needed by Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files into container
COPY . /var/www
COPY --chown=www-data:www-data . /var/www

# Set permissions
RUN chmod -R 755 /var/www

# Install Laravel PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy .env (or configure it in Render later)
COPY .env.example .env

# Generate app key (you can also do this in Render if needed)
RUN php artisan key:generate

# Expose port used by artisan serve (Render listens on 10000)
EXPOSE 10000

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=10000

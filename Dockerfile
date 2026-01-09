# 1. Base image PHP 8.3 + Apache
FROM php:8.3-apache

# 2. Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# 3. Enable Apache rewrite
RUN a2enmod rewrite

# 4. Set working directory
WORKDIR /var/www/html

# 5. Copy project files
COPY . .

# 6. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# 8. Install Node dependencies & build assets
RUN npm install && npm run build

# 9. Set permissions
RUN chown -R www-data:www-data \
    storage bootstrap/cache

# 10. Apache config for Laravel
RUN sed -i 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

# 11. Expose port
EXPOSE 80

# 12. Start Apache
CMD ["apache2-foreground"]

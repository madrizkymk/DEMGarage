FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip \
    libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev \
    nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring zip intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Copy app
COPY . .

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm ci && npm run build

# Storage permissions
RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs \
    && chmod -R 775 storage bootstrap/cache

# Railway uses PORT env
CMD php artisan serve --host=0.0.0.0 --port=${PORT}

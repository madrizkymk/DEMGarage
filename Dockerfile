FROM php:8.3-cli

# System dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libpng-dev libonig-dev libxml2-dev libzip-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Copy app
COPY . .

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Frontend build
RUN npm ci && npm run build

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Start Laravel (Railway PORT)
CMD php artisan serve --host=0.0.0.0 --port=${PORT}

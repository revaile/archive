FROM php:8.3

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set PHP configurations
RUN echo "upload_max_filesize=50M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size=50M" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "memory_limit=256M" >> /usr/local/etc/php/conf.d/uploads.ini

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Run Laravel application
CMD php artisan serve --host=0.0.0.0 --port=8000

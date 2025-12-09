FROM richarvey/nginx-php-fpm:latest

# Copy composer files (composer.lock might not exist)
COPY composer.json ./
COPY composer.lock* ./  # This will copy composer.lock if it exists

# Install PHP dependencies
RUN if [ -f composer.lock ]; then \
        composer install --no-dev --optimize-autoloader; \
    else \
        composer install --no-dev --optimize-autoloader --no-scripts; \
    fi

# Copy application files
COPY . .

# Install Node.js dependencies and build frontend assets
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

# Start server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
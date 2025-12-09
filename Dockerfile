FROM richarvey/nginx-php-fpm:latest

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy application files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

# Start server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
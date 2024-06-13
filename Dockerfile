# Use the official PHP with Apache image as the base
FROM php:8.3-apache

# Install the necessary dependencies for Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo_mysql

# Enable the Apache rewrite module
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Copy the Laravel project files to the container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install

# Copy the environment file
RUN cp .env.example .env

RUN chmod -R 775 /var/www/html/storage 
RUN chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

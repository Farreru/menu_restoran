# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable mod_rewrite for Apache (if needed)
RUN a2enmod rewrite

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Set the working directory inside the container
WORKDIR /var/www/html


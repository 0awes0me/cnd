FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    git \
    default-mysql-client \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install intl zip pdo pdo_mysql mysqli

# Install Node.js 22 and npm
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/frontend
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Set permissions as root user (to ensure proper ownership and access)
USER root

# Install npm dependencies and build assets
RUN npm install
RUN npm install -g vue-tsc
RUN npm run build

# Set ownership and permissions for the /var/www/html directory and the required subdirectories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html

RUN chown -R www-data:www-data /var/www/frontend \
    && chmod -R 775 /var/www/frontend

# Modify Apache config to support the custom domain
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Enable VirtualHost for custom domain
RUN echo '<VirtualHost *:80>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    ServerName cnd_laravel.test' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    DocumentRoot /var/www/html/public' >> /etc/apache2/sites-available/000-default.conf \
    && echo '</VirtualHost>' >> /etc/apache2/sites-available/000-default.conf


# Enable Apache rewrite module
RUN a2enmod rewrite

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache



# Use the entrypoint script

# Start Apache in the foreground
CMD ["apache2-foreground"]

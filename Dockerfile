# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install NVM, Node.js, and npm
ENV NVM_DIR=/root/.nvm
ENV NODE_VERSION=18.19.0
ENV NPM_VERSION=10.2.5
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash \
    && . $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default \
    && npm install -g npm@$NPM_VERSION

# Add node and npm to path so the commands are available
ENV NODE_PATH=$NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH=$NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Install application dependencies
RUN composer install

# Remove package-lock.json and node_modules (if they exist) to avoid npm issues
RUN rm -rf node_modules

# Install Node.js dependencies and build assets
RUN npm ci
RUN npm run build

# Generate application key
RUN php artisan key:generate

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 for Laravel
EXPOSE 3000

# TODO: don't serve with artisan, use nginx or something else
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "3000"]
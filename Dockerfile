# Use the PHP image as the base image
FROM php:latest

# Set the working directory to /app
WORKDIR /app

# Copy all files from the host's currency-rate-app directory to the /app directory inside the container
COPY /app /app

# Install required PHP extensions and tools
RUN apt-get update && apt-get install -y --no-install-recommends \
    unzip \
    libzip-dev \
 && docker-php-ext-configure zip \
 && docker-php-ext-install zip \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies using Composer
RUN composer install

# Create the usd_rate.txt file and set initial content to an empty string
RUN touch /app/public/usd_rate.txt && echo "" > /app/public/usd_rate.txt

# Expose port 80 for the web server
EXPOSE 80

# Start the web server with the PHP application
CMD php /app/app.php & php -S 0.0.0.0:80 -t public
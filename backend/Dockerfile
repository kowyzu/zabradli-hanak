FROM php:8.3-apache

# Install dependencies required by Composer
RUN apt-get update && apt-get install -y \
  unzip \
  git \
  && rm -rf /var/lib/apt/lists/*

# Copy Composer binary from the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

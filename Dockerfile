# ============================================
# Stage 1: Build Assets (Node.js)
# ============================================
FROM node:20-alpine AS node-builder

WORKDIR /app

# Copy package files
COPY package.json package-lock.json* ./

# Install dependencies
RUN npm ci --ignore-scripts

# Copy source files for build
COPY resources ./resources
COPY vite.config.js ./

# Build assets
RUN npm run build


# ============================================
# Stage 2: Install PHP Dependencies
# ============================================
FROM composer:2 AS composer-builder

WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# Install dependencies (no dev, optimized for production)
RUN composer install \
  --no-dev \
  --no-interaction \
  --no-progress \
  --no-scripts \
  --prefer-dist \
  --optimize-autoloader


# ============================================
# Stage 3: Production Image
# ============================================
FROM php:8.2-fpm-alpine AS production

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
  nginx \
  supervisor \
  curl \
  libpng-dev \
  libjpeg-turbo-dev \
  freetype-dev \
  oniguruma-dev \
  libxml2-dev \
  libpq-dev \
  zip \
  unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) \
  bcmath \
  gd \
  mbstring \
  pdo_pgsql \
  opcache \
  && rm -rf /var/cache/apk/*

# Configure PHP for production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Create optimized OPcache config
RUN echo "opcache.enable=1" >> "$PHP_INI_DIR/conf.d/opcache.ini" \
  && echo "opcache.memory_consumption=128" >> "$PHP_INI_DIR/conf.d/opcache.ini" \
  && echo "opcache.interned_strings_buffer=8" >> "$PHP_INI_DIR/conf.d/opcache.ini" \
  && echo "opcache.max_accelerated_files=10000" >> "$PHP_INI_DIR/conf.d/opcache.ini" \
  && echo "opcache.revalidate_freq=0" >> "$PHP_INI_DIR/conf.d/opcache.ini" \
  && echo "opcache.validate_timestamps=0" >> "$PHP_INI_DIR/conf.d/opcache.ini"

# Create non-root user
RUN addgroup -g 1000 -S www \
  && adduser -u 1000 -S www -G www

WORKDIR /var/www/html

# Copy application files
COPY --chown=www:www . .

# Copy built assets from node builder
COPY --from=node-builder --chown=www:www /app/public/build ./public/build

# Copy vendor from composer builder
COPY --from=composer-builder --chown=www:www /app/vendor ./vendor

# Remove unnecessary files
RUN rm -rf \
  node_modules \
  tests \
  .git \
  .gitignore \
  .gitattributes \
  .editorconfig \
  phpunit.xml \
  vite.config.js \
  package.json \
  package-lock.json \
  README.md

# Create necessary directories
RUN mkdir -p storage/framework/{sessions,views,cache} \
  && mkdir -p storage/logs \
  && mkdir -p bootstrap/cache \
  && chown -R www:www storage bootstrap/cache \
  && chmod -R 775 storage bootstrap/cache

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

# Copy supervisor config
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy entrypoint script
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

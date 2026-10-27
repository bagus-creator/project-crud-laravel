FROM php:8.5-cli

# Instal dependensi sistem & ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    sqlite3 \
    libsqlite3-dev

RUN docker-php-ext-install pdo_mysql mbstring bcmath gd pdo_sqlite

# Copy Composer dari image resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tentukan folder kerja di dalam container
WORKDIR /app

# Copy seluruh file proyek ke dalam container
COPY . .

# Jalankan instalasi dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# Buka port 10000 untuk Render
EXPOSE 10000

# Perintah untuk menjalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
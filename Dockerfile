# 1. Gunakan PHP 8.3-cli resmi & stabil (aman dari celah keamanan)
FROM php:8.3-cli

# 2. Instal dependensi sistem Linux yang dibutuhkan oleh Laravel & SQLite
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    sqlite3 \
    libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Instal ekstensi PHP yang wajib untuk Laravel 13 & Database (MySQL + SQLite)
RUN docker-php-ext-install pdo_mysql mbstring bcmath gd pdo_sqlite

# 4. Ambil Composer versi terbaru langsung dari image resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Tentukan direktori kerja di dalam container
WORKDIR /app

# 6. Salin seluruh berkas proyek Laravel kamu ke dalam container
COPY . .

# 7. Buat folder database dan berkas database.sqlite jika belum ada
RUN mkdir -p database && touch database/database.sqlite

# 8. Jalankan instalasi dependensi Laravel dengan optimasi mode produksi
RUN composer install --no-dev --optimize-autoloader

# 9. Atur hak akses (permission) folder storage, cache, dan database SQLite
RUN chmod -R 777 storage bootstrap/cache database/database.sqlite

# 10. Buka port 10000 (port standar untuk Render / Wasmer)
EXPOSE 10000

# 11. Perintah untuk menjalankan server Laravel saat container aktif
CMD php artisan serve --host=0.0.0.0 --port=10000
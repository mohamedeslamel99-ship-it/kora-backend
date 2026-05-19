FROM php:8.2-cli

# تسطيب بعض الأدوات اللي لارافيل بيحتاجها
RUN apt-get update && apt-get install -y git unzip curl

# تسطيب كومبوزر
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تحديد مسار العمل
WORKDIR /app

# نسخ ملفات المشروع
COPY . .

# تسطيب مكتبات لارافيل
RUN composer install --optimize-autoloader --no-dev

# تشغيل السيرفر
CMD php artisan serve --host=0.0.0.0 --port=$PORT
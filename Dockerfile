# ใช้ PHP และ Apache
FROM php:7.4-apache

# ติดตั้ง PHP extensions ที่จำเป็น
RUN docker-php-ext-install mysqli

# คัดลอกไฟล์โปรเจกต์ไปยัง /var/www/html
COPY . /var/www/html/

# เปิดพอร์ต 80
EXPOSE 80

# Dockerfile
FROM php:8.1-apache

# Copy mã nguồn vào container
COPY . /var/www/html/

# Cấp quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

# Bật mod_rewrite nếu cần
RUN a2enmod rewrite

EXPOSE 80

FROM richarvey/nginx-php-fpm:3.1.6

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

WORKDIR /var/www/html
COPY . .

# Instalar extensiones y permisos generales
RUN docker-php-ext-install bcmath \
    && chown -R nginx:nginx /var/www/html \
    && chmod -R 775 storage bootstrap/cache    

# Copiar certificados antes de ajustar permisos
COPY storage/certs /var/www/html/storage/certs
RUN chmod 644 /var/www/html/storage/certs/ca.pem \
    && chown -R nginx:nginx /var/www/html/storage/certs

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Cachear configuración de Laravel
RUN php artisan config:clear \
    && php artisan config:cache

# Copiamos la configuración del sitio
COPY nginx-site.conf /etc/nginx/sites-available/default.conf

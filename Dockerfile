FROM richarvey/nginx-php-fpm:8.2

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

WORKDIR /var/www/html
COPY . .

RUN chown -R nginx:nginx /var/www/html \
    && chmod -R 775 storage bootstrap/cache

RUN composer install --no-dev --optimize-autoloader

RUN php artisan config:clear \
    && php artisan config:cache

COPY nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
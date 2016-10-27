FROM php:5-apache
COPY src/ /var/www/html/
EXPOSE 80
RUN docker-php-ext-install mysql
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
CMD ["apache2-foreground"]

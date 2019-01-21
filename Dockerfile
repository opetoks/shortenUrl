FROM php:7.2-apache
COPY shortenedUrl/ /var/www/html/
EXPOSE 80
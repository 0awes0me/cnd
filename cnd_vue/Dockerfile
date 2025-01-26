
FROM node:lts-alpine as build-stage
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build


FROM php:8.2-apache as production-stage

COPY --from=build-stage /app/dist /var/www/frontend

RUN sed -i 's|/var/www/frontend|/var/www/frontend/assets|g' /etc/apache2/sites-available/000-default.conf

RUN echo '<VirtualHost *:80>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    ServerName cnd_vue.test' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    DocumentRoot /var/www/frontend' >> /etc/apache2/sites-available/000-default.conf \
    && echo '</VirtualHost>' >> /etc/apache2/sites-available/000-default.conf



# Use uma imagem base com PHP e Apache
FROM php:8.1-apache

# Instale dependências
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instale as dependências do Yii2 no diretório `/var/www/html`
WORKDIR /var/www/html
COPY . .

# Instale o Yii2 e dependências via Composer
RUN composer install

# Ative o mod_rewrite do Apache
RUN a2enmod rewrite

RUN apt-get update && apt-get install -y default-mysql-client

# Copie a configuração personalizada do Apache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Defina as permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponha a porta 80 para acesso ao Apache
EXPOSE 80
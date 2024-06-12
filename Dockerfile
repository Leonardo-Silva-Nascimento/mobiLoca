# Use a imagem oficial do PHP como base
FROM php:8.3-fpm

# Instale as dependências necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo_mysql

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie os arquivos do projeto para o contêiner
COPY . /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instale as dependências do Composer
RUN composer install

# Copie o arquivo de ambiente para o local correto
RUN cp .env.example .env

# Gere a chave de aplicativo do Laravel
RUN php artisan key:generate

# Defina as permissões corretas
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Exponha a porta 80 para o servidor web
EXPOSE 80

# Execute o servidor PHP-FPM
CMD ["php-fpm"]

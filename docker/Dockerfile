# --------------------------------------------------------------------------------
# Dockerfile para ambiente de desenvolvimento PHP 8.1-FPM
#
# Estrutura esperada do projeto:
# 
# meu-projeto/
# ├── app/
# │   └── index.php
# │   └── phpinfo.php
# │   └── … (demais arquivos PHP)
# ├── docker/
# │   ├── Dockerfile         ← este arquivo
# │   └── nginx/
# │       └── default.conf   ← config do Nginx
# └── docker-compose.yml
# 
# --------------------------------------------------------------------------------

FROM php:8.1-fpm

# 1) Instala dependências de SO e extensões PHP
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
         libzip-dev \
         libonig-dev \
         libpng-dev \
         libjpeg-dev \
         libfreetype6-dev \
         libxml2-dev \
         zip \
         git \
         unzip \
    && docker-php-ext-configure zip \
    && docker-php-ext-install -j$(nproc) \
         pdo_mysql \
         zip \
         mbstring \
         exif \
         pcntl \
         bcmath \
         gd \
         xml \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2) Define o diretório de trabalho dentro do container
WORKDIR /var/www/html

# 3) Copia todo o código-fonte da pasta “app/” para dentro de /var/www/html
COPY app/ ./

# 4) Ajusta permissões para www-data (usuário que roda o PHP-FPM)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# 5) Expõe a porta do PHP-FPM
EXPOSE 9000

# 6) Comando padrão ao iniciar o container
CMD ["php-fpm"]

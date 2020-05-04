FROM php:7.3.5-apache-stretch

RUN apt-get update && apt-get install -y \
  libicu-dev \
  libpq-dev \
  mysql-client \
  zip \
  unzip \
  libzip-dev \
  zlib1g-dev \

RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh && bash nodesource_setup.sh && apt-get -y --force-yes install nodejs  
  
RUN rm -r /var/lib/apt/lists/*

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
  && docker-php-ext-install \
  intl \
  mbstring \
  pcntl \
  pdo_mysql \
  zip \
  opcache

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer    

RUN sed -i -e "s/html/html\/webroot/g" /etc/apache2/sites-enabled/000-default.conf

RUN a2enmod rewrite
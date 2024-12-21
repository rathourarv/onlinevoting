FROM shinsenter/codeigniter4:dev-php8.2

ENV CI_ENV=production

WORKDIR /var/www/html

ADD . /var/www/html


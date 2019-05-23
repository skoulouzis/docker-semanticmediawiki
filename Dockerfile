FROM mediawiki:1.31.1

RUN apt-get update -y; apt-get upgrade -y

RUN  apt-get install -y unzip git

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer && composer self-update 


COPY composer.local.json .
RUN composer update --no-dev --prefer-source && composer update --no-dev --prefer-source


# WORKDIR extensions/SemanticMediaWiki/maintenance/
# RUN php setupStore.php --delete --backend SMWSparqlStore

# ENTRYPOINT if [ -f /var/www/html/LocalSettings.php ]; then cd /var/www/html/extensions/SemanticMediaWiki/maintenance && php setupStore.php; echo "------------Done------------"; fi && tail -f /dev/null


# docker build -t smw .


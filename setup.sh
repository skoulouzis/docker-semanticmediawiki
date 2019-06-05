#!/bin/bash

mysql -uroot -pexample -hmariadb -e'SELECT version();'
while (($?))
do
    sleep 0.2
    mysql -uroot -pexample -hmariadb -e'SELECT version();'  
done

echo "mysql is up"

cd /var/www/html
 
php maintenance/install.php \
	    --dbname my_wiki \
	    --dbpass example \
	    --dbserver mariadb \
	    --dbtype mysql \
	    --dbuser wikiuser \
	    --email mediawiki@mariadb \
	    --installdbpass example \
	    --installdbuser root \
	    --pass example \
	    --scriptpath /mediawiki \
	    Media_wiki


mv /tmp/LocalSettings.php .
composer update --no-dev --prefer-source 
composer update --no-dev --prefer-source
# composer require mediawiki/semantic-media-wiki

cd /var/www/html/extensions/SemanticMediaWiki/maintenance
php setupStore.php

cd /root/fuseki/
bash fuseki-server --update --mem /db &>/tmp/fuseki-server &


FROM ubuntu:16.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y; apt-get upgrade -y

RUN \
  apt-get update && \
  apt-get install -y \
	apache2 \
	apt-utils \
	curl \
	dialog \
	git \
	libapache2-mod-php7.0 \
	mysql-server \
	vim \
	unzip \
	php7.0 \
	php7.0-cli \
	php7.0-gd \
	php7.0-mbstring \
	php7.0-xml \
    php7.0-mysql \
    software-properties-common\
    wget
    
RUN apt-get update -qq
RUN service mysql start

RUN mkdir /opt/jdk
WORKDIR /opt/
RUN wget --header "Cookie: oraclelicense=accept-securebackup-cookie" https://github.com/QCAPI-DRIP/DRIP-integration/releases/download/0.2.1/jdk-8u151-linux-x64.tar.gz
RUN tar -zxf  jdk-8u151-linux-x64.tar.gz -C /opt/jdk
RUN update-alternatives --install /usr/bin/java java /opt/jdk/jdk1.8.0_151/bin/java 100
RUN update-alternatives --install /usr/bin/javac javac /opt/jdk/jdk1.8.0_151/bin/javac 100

WORKDIR /root

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer && composer self-update 

ENV FUSEKI=2.6.0
RUN wget https://github.com/mwjames/travis-support/raw/master/fuseki/$FUSEKI/apache-jena-fuseki-$FUSEKI.tar.gz
RUN tar -xf apache-jena-fuseki-$FUSEKI.tar.gz
RUN mv apache-jena-fuseki-$FUSEKI fuseki



RUN wget https://github.com/wikimedia/mediawiki/archive/1.32.0.tar.gz
RUN tar -zxf 1.32.0.tar.gz 
RUN mv mediawiki-1.32.0 mw
WORKDIR mw 
RUN composer install
RUN ls

RUN echo -e "Running MW root composer install build on $TRAVIS_BRANCH \n"
RUN composer require mediawiki/semantic-media-wiki "dev-master" --dev
WORKDIR extensions/SemanticMediaWiki
RUN wget https://github.com/SemanticMediaWiki/SemanticMediaWiki/archive/3.0.2.tar.gz
RUN tar -zxf 3.0.2.tar.gz
WORKDIR ../..
RUN composer dump-autoload

ADD LocalSettings.php .


ENTRYPOINT service mysql restart && mysql -e 'create database its_a_mw;' && composer update -vvv && cd /root/fuseki && bash fuseki-server --update --mem /db

# ENTRYPOINT service mysql restart && mysql -e 'create database its_a_mw;' && php maintenance/install.php --dbtype mysql --dbuser root --dbname its_a_mw --dbpath $(pwd) --pass nyan TravisWiki admin --scriptpath /TravisWiki && cd /root/fuseki && bash fuseki-server --update --mem /db

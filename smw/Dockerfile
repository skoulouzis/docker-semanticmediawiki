FROM mediawiki:1.31.1

RUN apt-get update -y; apt-get upgrade -y

RUN  apt-get install -y unzip git wget software-properties-common mysql-client

RUN mkdir /opt/jdk
WORKDIR /opt/
RUN wget --header "Cookie: oraclelicense=accept-securebackup-cookie" https://github.com/QCAPI-DRIP/DRIP-integration/releases/download/0.2.1/jdk-8u151-linux-x64.tar.gz
RUN tar -zxf  jdk-8u151-linux-x64.tar.gz -C /opt/jdk
RUN update-alternatives --install /usr/bin/java java /opt/jdk/jdk1.8.0_151/bin/java 100
RUN update-alternatives --install /usr/bin/javac javac /opt/jdk/jdk1.8.0_151/bin/javac 100

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer && composer self-update 

COPY LocalSettings.php /tmp
COPY composer.local.json /var/www/html

WORKDIR /root/
COPY setup.sh .
RUN chmod +x setup.sh

CMD /root/setup.sh && apache2-foreground

# docker build -t smw .

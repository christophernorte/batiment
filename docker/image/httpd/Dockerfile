FROM httpd:2.4.20

COPY config/httpd.conf /usr/local/apache2/conf/
COPY config/sites-enabled/batiment.conf /usr/local/apache2/conf/extra/

RUN mkdir /var/log/apache2

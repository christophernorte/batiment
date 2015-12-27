#!/bin/bash
sudo docker run -d -v `pwd`:/var/www/html -v `pwd`/docker/config/apache/sites-enabled:/etc/apache2/sites-enabled -p 80:80 --name batiment-php-run --link batiment-mysql-container batiment-php-image

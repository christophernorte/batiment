#!/bin/bash
sudo docker run -d -v `pwd`:/var/www/html -p 80:80 --name batiment-php-run --link batiment-mysql-container batiment-php-image

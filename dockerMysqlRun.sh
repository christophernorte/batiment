#!/bin/bash
sudo docker run -d -v ~/docker/batiment-v2/mysql-data:/var/lib/mysql -v /home/christopher/docker/batiment-v2/mysql-conf:/etc/mysql/conf.d -p 3306:3306 -e MYSQL_ROOT_PASSWORD=batiment --name batiment-mysql-container mysql:5.6

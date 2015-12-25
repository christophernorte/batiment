#!/bin/bash
sudo docker run --name batiment-mysql-run -v ~/docker/batiment-v2/mysql-data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=batiment -d mysql:5.6

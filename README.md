To run this web app, you only need to execute:

docker build -f Dockerfile -t docker-php .


docker run -dit -p 8080:80 --name docker-php docker-php


If you want to generate a zip to deploy manually in Apache

mvn clean install


copy zip in htdocs in apache


unzip the content


docker-compose up

docker-compose down --rmi all --volumes

docker exec -i mysqlphp mysql -uroot -phola < sqlscript.sql

To access to the web app you only need to access to:


http://<ip_server>:8080/docker-php/index.php


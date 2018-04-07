To run this web app, you only need to execute:

docker-compose up
docker exec -i mysqlphp mysql -uroot -phola < sqlscript.sql
To access to the web app you only need to access to:


http://<ip_server>:8080/docker-php/index.php


To stop application and delete database

docker-compose down --rmi all --volumes




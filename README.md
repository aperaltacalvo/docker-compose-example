# Docker compose example

Run a simple application with three different orchestrators:

- docker-compose
- kubernetes
- openshift

The platform consists of two services: a PHP web service and a MySQL database.

## Docker compose

1. Open a console, terminal or CMD, start the application and wait for for both services to complete its starting proccesses

    ```console
    $ docker-compose -f docker-compose/docker-compose.yml up --build

    [...]

    ```

    The application will start in "foreground" mode, so your cannot interact with the console and it will swow the platform logs

    ```console

    [...]

    database      | 2020-03-08T20:50:28.833725Z 0 [Warning] 'user' entry 'root@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.833774Z 0 [Warning] 'user' entry 'mysql.session@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.833782Z 0 [Warning] 'user' entry 'mysql.sys@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.833801Z 0 [Warning] 'db' entry 'performance_schema mysql.session@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.833805Z 0 [Warning] 'db' entry 'sys mysql.sys@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.833812Z 0 [Warning] 'proxies_priv' entry '@ root@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.836223Z 0 [Warning] 'tables_priv' entry 'user mysql.session@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.836271Z 0 [Warning] 'tables_priv' entry 'sys_config mysql.sys@localhost' ignored in --skip-name-resolve mode.
    database      | 2020-03-08T20:50:28.842528Z 0 [Note] Event Scheduler: Loaded 0 events
    database      | 2020-03-08T20:50:28.842733Z 0 [Note] mysqld: ready for connections.
    database      | Version: '5.7.25'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server (GPL)
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:52:25 +0000] "GET /docker-php/index.php HTTP/1.1" 200 1009 "-" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:52:26 +0000] "GET /docker-php/css/formulario.css HTTP/1.1" 200 695 "http://localhost:8080/docker-php/index.php" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:52:26 +0000] "GET /docker-php/images/lobo.jpg HTTP/1.1" 304 182 "http://localhost:8080/docker-php/index.php" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:52:26 +0000] "GET /favicon.ico HTTP/1.1" 404 489 "http://localhost:8080/docker-php/index.php" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:52:27 +0000] "GET /favicon.ico HTTP/1.1" 404 489 "http://localhost:8080/docker-php/index.php" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:53:17 +0000] "-" 408 0 "-" "-"

    [...]

    ```

2. Point your browser to the application endpoint at <http://localhost:8080/docker-php/index.php> and do some tests, sending new comments to the "User coments" list.

3. Stop your application using "ctrl-c" over the console. You can remove all stuff in addition with `docker-compose down --rmi all --volumes`:

    ```console

    [...]

    webservice    | 172.21.0.1 - - [08/Mar/2020:20:58:18 +0000] "GET /favicon.ico HTTP/1.1" 404 489 "http://localhost:8080/docker-php/" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:58:19 +0000] "GET /favicon.ico HTTP/1.1" 404 489 "http://localhost:8080/docker-php/" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36"
    webservice    | 172.21.0.1 - - [08/Mar/2020:20:59:08 +0000] "-" 408 0 "-" "-"
    ^CGracefully stopping... (press Ctrl+C again to force)
    Stopping webservice ... done
    Stopping database   ... done
    MacBook-Pro-de-Pedro-2:docker-compose-example pedro.rodriguez$ docker-compose down --rmi all --volumes
    ERROR:
            Can't find a suitable configuration file in this directory or any
            parent. Are you in the right directory?

            Supported filenames: docker-compose.yml, docker-compose.yaml

    MacBook-Pro-de-Pedro-2:docker-compose-example pedro.rodriguez$ docker-compose -f docker-compose/docker-compose.yml down --rmi all --volumes
    Removing webservice ... done
    Removing database   ... done
    Removing network docker-compose_default
    Removing image docker-compose_database
    Removing image docker-compose_webservice
    ```

## Kubernetes

1. Install minikube and prepare the images

    ```console
    $ minikube start

    [...]

    $ eval $(minikube docker-env)
    $ docker build -f docker-compose/Dockerfile -t webservice docker-compose

    [...]

    $ docker build -f docker-compose/DockerfileMysql -t database docker-compose

    [...]

    ```

    You can use a kubernetes installation instead minikube. Take a look at [Okteto](https://okteto.com/) or [k8spin](https://k8spin.cloud/).

2. Start to work

    ```console
    $ kubectl create -f kubernetes-openshift/database-deployment.yaml,kubernetes-openshift/database-service.yaml,kubernetes-openshift/webservice-deployment.yaml,kubernetes-openshift/webservice-service.yaml,kubernetes-openshift/webservice-ingress.yaml

    [...]

    ```

3. Show you the cluster status in kubernetes dashboard

    ```console
    $ minikube dashboard

    [...]

    ```

4. To stop everything

    ```console
    $ kubectl delete -f kubernetes-openshift/database-deployment.yaml,kubernetes-openshift/database-service.yaml,kubernetes-openshift/webservice-deployment.yaml,kubernetes-openshift/webservice-service.yaml,kubernetes-openshift/webservice-ingress.yaml

    [...]

    $ minikube stop

    [...]

    $ minikube delete

    [...]

    ```

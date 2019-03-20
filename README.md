To run this web app, you only need to execute:

docker-compose up --build


To access to the web app you only need to access to:


http://<ip_server>:8080/docker-php/index.php


To stop application and delete database

docker-compose down --rmi all --volumes



To execute a kubernetes deployment:

Install minikube or use a kubernetes installation provided

In case of minikube, run minikube start

kubectl create -f database-deployment.yaml,database-service.yaml,webservice-deployment.yaml,webservice-service.yaml,webservice-ingress.yaml

minikube dashboard show you the cluster status in kubernetes dashboard


to stop everything


kubectl delete -f database-deployment.yaml,database-service.yaml,webservice-deployment.yaml,webservice-service.yaml,webservice-ingress.yaml

minikube stop

minikube delete

To execute the containers

docker run -it --name "estoque_db" -v "/home/igor/PHP_Project/data:/var/lib/mysql" -v "/home/igor/PHP_Project/etc:/etc/mysql/" -e MYSQL_ROOT_PASSWORD=astronauta -d mysql

docker rm estoque_db

docker run -it --name "estoque_db" -e MYSQL_ROOT_PASSWORD=astronauta -d mysql

docker start -i estoque_db

docker run --name estoque_db -e MYSQL_ROOT_PASSWORD=astronauta -it mysql bash

docker run -it --name estoque -e MYSQL_ROOT_PASSWORD=astronauta -d mysql
docker start estoque
docker exec -it estoque bash
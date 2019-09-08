# PHP Docker with MySql

## Prerequisites
Done these steps: https://github.com/guushub/php-docker-xdebug

## Start
Open a terminal in the same folder as the Dockerfile and run
```bash
docker-compose up
```

And after that, browse to localhost:1880 (in our example) to see the query, or go to localhost:1881 to go to phpMyAdmin. 

Note that the host 'url' to the database between the containers is the same as the service names used in the docker-compose.yml. So for instance, the host of mysql is ```mysql-db```.

Also note that when you remove the mysql container (i.e. using `docker-compose down`), the data will be gone for good. To make sure the data persists we need to define volumes. The easiest way to do this during development is uncomment the volumes section in the mysql-db service:
```yml
services:
  mysql-db:
    volumes:
      - ./db:/var/lib/mysql
```

That way the database will be created in the db folder in this project. 

## TODO
So for now these containers still look at the host environment for the volumes. For the database some structure like this might be needed in production too (or maybe using some volume container?) but for the code this is not the best way. We would like to have that on the php container. 
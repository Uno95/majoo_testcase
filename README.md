## Run The Application using Docker
- Execute command <code>docker-compose up</code> to run the applications

## Migrate Databases
- Get in to installed docker container app then execute command <code>php artisan migrate</code>

To get in to a container you can execute the following command:
<code>docker exec -it [CONTAINER_NAME] /bin/sh</code>
# PHP Gentree CLI Application


##Prerequisites
Before you begin, ensure you have met the following requirements:

- PHP (>= 8.2) installed on your local machine
- Composer installed on your local machine (for non-Docker installation)
- Docker installed on your local machine (for Docker installation)

##Installation
###Using Docker

``cd project_folder``

``docker compose build``

``docker compose run``

**Docker volume is mounted to "data" folder. You should put your input file there**

###Using Composer(without docker)

``cd project_folder``

``composer install``

``php application start``


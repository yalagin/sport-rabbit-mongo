RabbitMQ and MongoDB example for symfony 
=================

How to run a local instance
---------------------------

### Prerequisites

Install [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/install).

#### OSX

Use [Docker for Mac](https://www.docker.com/docker-mac) which will provide you both `docker` and `docker-compose`.

#### Windows

Use [Docker for Windows](https://www.docker.com/docker-windows) which will provide you both `docker` and `docker-compose`.
Depending on your platform, Docker could be installed as Native or you have to install Docker toolbox which use VirtualBox instead of Hyper-V causing a lot a differences in implementations.
If you have the luck to have a CPU that supports native Docker you can [share your hard disk as a virtual volume for your appliances](https://blogs.msdn.microsoft.com/stevelasker/2016/06/14/configuring-docker-for-windows-volumes/).
 
Also, disabling WSL 2 engine, on docker, might help.
 
#### Linux

Follow [the instructions for your distribution](https://docs.docker.com/install/). `docker-compose` binary is to be installed independently.
Make sure:
- to install `docker-compose` [following instructions](https://docs.docker.com/compose/install/) to get the **latest version**.
- to follow the [post-installation steps](https://docs.docker.com/install/linux/linux-postinstall/).

### Run the application


    $ docker-compose up --build --force-recreate


when php_1 docker service will start pinging 
You can now go to https://localhost:8443 and see if everything all right

If consumer and php service collide and stop please start consumer and 
then php service  

####RabbitMQ

http://localhost:15672/

      default_user, "rabbitmq"
      default_pass, "rabbitmq"
      
####MongoDB

http://localhost:8081/

#!/bin/sh
docker run -d -v /home/winkar/Documents/docker/web3/src:/var/www/html -p 10082:80 --name "web3"  web3

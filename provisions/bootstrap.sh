#!/usr/bin/env bash

##
# The boostrap initialization for the Flat server
##

add-apt-repository -y ppa:ondrej/php

apt-get update
apt-get upgrade -y

apt-get install -y php7.0 php7.0-json php7.0-sqlite sqlite3

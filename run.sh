#!/usr/bin/env bash

# oop setup
function phpstorm_setup() {
  echo "Running phpstorm workshop setup..."
  ( cd workshops/phpstorm &&
    git checkout master &&
    git pull origin master &&
    sudo ln -sf /var/www/summercamp/workshops/phpstorm/installation/vhost /etc/apache2/sites-enabled/phpstorm.conf &&
    sudo sh ./installation/run.sh
  )
}

# ubiquitous setup
function ubiquitous_setup() {
  echo "Running ubiquitous workshop setup..."
  ( cd workshops/ubiquitous &&
    git checkout master &&
    git pull origin master &&
    sudo ln -sf /var/www/summercamp/workshops/ubiquitous/installation/vhost /etc/apache2/sites-enabled/ubiquitous.conf &&
    sudo sh ./installation/run.sh
  )
}

# httplug setup
function httplug_setup() {
  echo "Running httplug workshop setup..."
  ( cd workshops/httplug &&
    git checkout master &&
    git pull origin master &&
    sudo ln -sf /var/www/summercamp/workshops/httplug/installation/vhost /etc/apache2/sites-enabled/httplug.conf &&
    sudo sh ./installation/run.sh
  )
}

# sulu setup
function sulu_setup() {
  echo "Running sulu workshop setup..."
  ( cd workshops/sulu &&
    git checkout master &&
    git pull origin master &&
    sudo ln -sf /var/www/summercamp/workshops/sulu/installation/vhost /etc/apache2/sites-enabled/sulu.conf &&
    sudo sh ./installation/run.sh
  )
}

# api4ez setup
function api4ez_setup() {
  echo "Running api4ez workshop setup..."
  ( cd workshops/api4ez &&
    git checkout master &&
    git pull origin master &&
    sudo ln -sf /var/www/summercamp/workshops/api4ez/installation/vhost /etc/apache2/sites-enabled/api4ez.conf &&
    sudo sh ./installation/run.sh
  )
}

# headless setup
function headless_setup() {
  echo "Running headless workshop setup..."
  ( cd workshops/headless &&
    git checkout master &&
    git pull origin master &&
    sudo ln -sf /var/www/summercamp/workshops/headless/installation/vhost /etc/apache2/sites-enabled/headless.conf &&
    sudo sh ./installation/run.sh
  )
}

# ezsylius setup
#function ezsylius_setup() {
#  echo "Running ezsylius workshop setup..."
#  ( cd workshops/ezpublish-community-sylius &&
#    git checkout sylius_integration &&
#    git pull origin sylius_integration &&
#    sudo ln -sf /var/www/summercamp/workshops/ezpublish-community-sylius/installation/vhost /etc/apache2/sites-enabled/ezsylius.conf &&
#    sudo sh ./installation/run.sh
#  )
#}


function all() {
  phpstorm_setup
}

echo "Running github token setup..."
# PLEASE DO NOT USE THIS TOKEN IN YOUR OWN PROJECTS/FORKS",
# This token is reserved for fetching summer camp repositories",
# You create your own token without(!) any scope to use same approach",
composer config -g github-oauth.github.com "4dd9fefd938753073b2915b2ecd052d288370e8f"

# setup the submodules
git submodule init
git submodule update

# get argument
if [ -z "$1" ]
then
   all
else
  "$1_setup"
fi

source ~/.bashrc

echo "Reloading apache..."
sudo service apache2 restart

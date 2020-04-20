#!/bin/bash
# 우선 할일
# mkdir -p /game/scripts/config
# 위의 위치에 nginx.repo nginx.conf php.ini php-fpm.conf www.conf default.conf가 필요

# require 설치
rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm


# /etc/yum.repos.d/nginx.repo 파일 생성해서 아래 추가
# [nginx]
# name=nginx repo
# baseurl=http://nginx.org/packages/centos/$releasever/$basearch/
# gpgcheck=0
# enabled=1
cp /game/scripts/config/nginx.repo /etc/yum.repo.d/nginx.repo

# nginx 설치
yum install -y nginx

# config 설정
mkdir -p /game/config/nginx
cp -R /etc/nginx/* /game/config/nginx/
mv /game/config/nginx/nginx.conf /game/config/nginx/nginx.conf.org
cp /game/scripts/config/nginx.conf /game/config/nginx/nginx.conf
mv /game/config/nginx/conf.d/default.conf /game/config/nginx/conf.d/default.conf.org
cp /game/scripts/config/default.conf /game/config/nginx/conf.d/default.conf
mv /etc/nginx /etc/nginx.org
ln -s /game/config/nginx /etc/nginx

# php-fpm 설치 버전에 맞게 repo를 바꿔줄 것
yum --enablerepo=remi-php70 install -y 
php-fpm php-cli php-common php-devel php php-gd php-ldap php-mbstring 
php-mcrypt php-mysqlnd php-odbc php-pdo php-pear php-pecl-geoip php-pecl-igbinary 
php-pecl-memcache php-pecl-redis php-xml php-opcache php-pecl-apc

# config 설정
mkdir -p /game/config/php/php.d
cp -R /etc/php.d/* /game/config/php/php.d/
mv /etc/php.d /etc/php.d.org
ln -s /game/config/php/php.d /etc/php.d
cp /game/scripts/config/php.ini /game/config/php/php.ini
#cp /etc/php.ini /game/config/php/php.ini
mv /etc/php.ini /etc/php.ini.org
ln -s /game/config/php/php.ini /etc/php.ini

# config 설정
mkdir -p /game/config/php-fpm
cp /game/scripts/config/php-fpm.conf /game/config/php-fpm/php-fpm.conf
#cp /etc/php-fpm.conf /game/config/php-fpm/php-fpm.conf
mv /etc/php-fpm.conf /etc/php-fpm.conf.org
ln -s /game/config/php-fpm/php-fpm.conf /etc/php-fpm.conf
cp /game/scripts/config/www.conf /game/config/php-fpm/www.conf
#cp /etc/php-fpm.d/www.conf /game/config/php-fpm/www.conf
mv /etc/php-fpm.d/www.conf /etc/php-fpm.d/www.conf.org
ln -s /game/config/php-fpm/www.conf /etc/php-fpm.d/www.conf

#log 생성
mkdir -p /game/log/nginx
chmod 707 /game/log/nginx
mkdir -p /game/log/php-fpm
chmod 707 /game/log/php-fpm

mkdir /game/public_html

chkconfig --level 345 nginx on
chkconfig --level 345 php-fpm on

service nginx start
service php-fpm start

# socket 권한 설정
chmod 666 /dev/shm/php5-fpm.sock
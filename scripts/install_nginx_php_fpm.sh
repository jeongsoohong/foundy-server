#!/bin/bash
# 우선 할일
# mkdir -p /web/scripts/config
# 위의 위치에 nginx.repo nginx.conf php.ini php-fpm.conf www.conf default.conf가 필요

# require 설치
rpm -Uvh http://dl.fedoraproject.org/pub/epel/7/x86_64/Packages/e/epel-release-7-12.noarch.rpm
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm


# /etc/yum.repos.d/nginx.repo 파일 생성해서 아래 추가
# [nginx]
# name=nginx repo
# baseurl=http://nginx.org/packages/centos/$releasever/$basearch/
# gpgcheck=0
# enabled=1
cp /web/scripts/config/nginx.repo /etc/yum.repo.d/nginx.repo

# nginx 설치
yum install -y nginx

# config 설정
mkdir -p /web/config/nginx
cp -R /etc/nginx/* /web/config/nginx/
mv /web/config/nginx/nginx.conf /web/config/nginx/nginx.conf.org
cp /web/scripts/config/nginx.conf /web/config/nginx/nginx.conf
mv /web/config/nginx/conf.d/default.conf /web/config/nginx/conf.d/default.conf.org
cp /web/scripts/config/default.conf /web/config/nginx/conf.d/default.conf
mv /etc/nginx /etc/nginx.org
ln -s /web/config/nginx /etc/nginx

# php-fpm 설치 버전에 맞게 repo를 바꿔줄 것
yum --enablerepo=remi-php73 install -y php-fpm php-cli php-common php-devel php php-gd php-ldap php-mbstring php-mcrypt php-mysqlnd php-odbc php-pdo php-pear php-pecl-geoip php-pecl-igbinary php-pecl-memcache php-pecl-redis php-xml php-opcache php-pecl-apc php-zip

# config 설정
mkdir -p /web/config/php/php.d
cp -R /etc/php.d/* /web/config/php/php.d/
mv /etc/php.d /etc/php.d.org
ln -s /web/config/php/php.d /etc/php.d
cp /web/scripts/config/php.ini /web/config/php/php.ini
#cp /etc/php.ini /web/config/php/php.ini
mv /etc/php.ini /etc/php.ini.org
ln -s /web/config/php/php.ini /etc/php.ini

# config 설정
mkdir -p /web/config/php-fpm
cp /web/scripts/config/php-fpm.conf /web/config/php-fpm/php-fpm.conf
#cp /etc/php-fpm.conf /web/config/php-fpm/php-fpm.conf
mv /etc/php-fpm.conf /etc/php-fpm.conf.org
ln -s /web/config/php-fpm/php-fpm.conf /etc/php-fpm.conf
cp /web/scripts/config/www.conf /web/config/php-fpm/www.conf
#cp /etc/php-fpm.d/www.conf /web/config/php-fpm/www.conf
mv /etc/php-fpm.d/www.conf /etc/php-fpm.d/www.conf.org
ln -s /web/config/php-fpm/www.conf /etc/php-fpm.d/www.conf

#log 생성
mkdir -p /web/log/nginx
chmod 707 /web/log/nginx
mkdir -p /web/log/php-fpm
chmod 707 /web/log/php-fpm

mkdir /web/public_html

chkconfig --level 345 nginx on
chkconfig --level 345 php-fpm on

#service nginx start
#service php-fpm start

systemctl restart nginx
systemctl restart php-fpm

# socket 권한 설정
chmod 666 /dev/shm/php5-fpm.sock
#!/bin/bash

echo
echo -e "########## memcached 설치 스크립트를 시작합니다."

# require 설치
#rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
#rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm

# install
yum --enablerepo=remi install -y memcached-1.4.31 memcached-devel-1.4.31 php-pecl-memcache-3.0.9

# 설정파일 백업

# config 설정 
mkdir /game/config/memcached
mv /etc/sysconfig/memcached /etc/sysconfig/memcached.org
cp /game/scripts/config/memcached /game/config/memcached/memcached
ln -s /game/config/memcached/memcached /etc/sysconfig/memcached
mv /game/config/php/php.d/memcache.ini /game/config/php/php.d/memcache.ini.org
cp /game/scripts/config/memcache.ini /game/config/php/php.d/memcache.ini

# 서비스 등록
chkconfig --level 345 memcached on


# 데몬 시작
service memcached start

echo -e "########## memcached 설치 스크립트를 종료합니다."
echo

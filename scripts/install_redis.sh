#!/bin/bash

echo
echo -e "########## memcached 설치 스크립트를 시작합니다."

# require 설치
#rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
#rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm

# install
yum --enablerepo=remi install -y redis

# 설정파일 백업
mkdir /game/config/redis
mv /etc/redis.conf /etc/redis.conf.org
cp /game/scripts/config/redis.conf /game/config/redis/redis.conf
ln -s /game/config/redis/redis.conf /etc/redis.conf


# 데이터(백업) 디렉토리 생성 및 권한 - /game/data/redis/
mkdir -p /game/data/redis
chmod -R 707 /game/data/redis

# 로그 디렉토리 생성 및 권한 - /game/log/redis/
mkdir /game/log/redis
chown redis.redis /game/log/redis
chmod 707 /game/log/redis

# 서비스 등록
chkconfig --level 345 redis on

# 데몬 시작
/etc/init.d/redis start

echo -e "########## memcached 설치 스크립트를 종료합니다."
echo

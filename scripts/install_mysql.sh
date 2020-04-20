#!/bin/bash

echo
echo -e "########## mysql 설치 스크립트를 시작합니다."

# require 설치
rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm

# install mysql
yum --enablerepo=remi install -y mysql-5.5.51 mysql-server-5.5.51

# nginx 기본 설정 파일 백업
if [ ! -f /etc/my.cnf.orig ]
then
	if [ -f /etc/my.cnf ]
	then
		cp /etc/my.cnf /etc/my.cnf.orig
	else
		echo -e "cannot find /etc/my.cnf"
		exit 1
	fi
fi

# temp dir 생성
mkdir /var/lib/mysql/mysqltemp
chown -R mysql.mysql /var/lib/mysql/mysqltemp


# 설정파일 복사
mkdir /gla/config/mysql
cp /gla/scripts/config/my.cnf /gla/config/mysql/my.cnf
ln -s /gla/config/mysql/my.cnf /etc/my.cnf

# 서비스 등록
chkconfig --level 345 mysqld on

# server start
/etc/init.d/mysqld restart

# Mysql 보안 설정 
#/usr/bin/mysql_secure_installation

# Mysql 접속
#mysql -u root -p [위의 보안 설정에서 설정한 비번]

# 워크벤치에서 접속되게 하려면...
#mysql 쉘에 root로 접속한 후
#use mysql;
#create user 'gla_test'@'%' identified by '패스워드';
#grant all privileges on *.* to 'gla_test'@'%';
#flush privileges;

echo -e "########## mysql 설치 스크립트를 종료합니다."
echo
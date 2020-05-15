#!/bin/bash

echo
echo -e "########## mysql 설치 스크립트를 시작합니다."

# require 설치
#rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
#rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
#rpm -Uvh http://dl.fedoraproject.org/pub/epel/7/x86_64/Packages/e/epel-release-7-12.noarch.rpm
#rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm

# install mysql
#yum --enablerepo=remi install -y mysql-5.6.47 mysql-server-5.6.47

yum install -y wget

wget http://repo.mysql.com/mysql-community-release-el7-5.noarch.rpm
rpm -ivh mysql-community-release-el7-5.noarch.rpm
yum update

yum install -y mysql-community-server

# nginx 기본 설정 파일 백업
if [ ! -f /etc/my.cnf.orig ]
then
	if [ -f /etc/my.cnf ]
	then
		mv /etc/my.cnf /etc/my.cnf.orig
	else
		echo -e "cannot find /etc/my.cnf"
		exit 1
	fi
fi

# temp dir 생성
mkdir /var/lib/mysql/mysqltemp
chown -R mysql.mysql /var/lib/mysql/mysqltemp


# 설정파일 복사
mkdir /web/config/mysql
cp /web/scripts/config/my.cnf /web/config/mysql/my.cnf
ln -s /web/config/mysql/my.cnf /etc/my.cnf

# 서비스 등록
chkconfig --level 345 mysqld on

# server start
#/etc/init.d/mysqld restart
systemctl start mysql

# Mysql 보안 설정 
#/usr/bin/mysql_secure_installation

# Mysql 접속
#mysql -u root -p [위의 보안 설정에서 설정한 비번]

# 워크벤치에서 접속되게 하려면...
#mysql 쉘에 root로 접속한 후
# create database foit;
#use mysql;
#create user 'fivendime'@'%' identified by 'gkfndico33!';
#grant all privileges on *.* to 'fivendime'@'%';
#flush privileges;

echo -e "########## mysql 설치 스크립트를 종료합니다."
echo
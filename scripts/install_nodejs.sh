#!/bin/bash

# require 설치
# rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm

# yum 및 npm 설치 - 각 버전 꼭 확인 후 설치 할 것
# yum --enablerepo=epel install -y nodejs
# yum --enablerepo=epel install -y npm
# npm install -g express
# npm install -g express-generator@4
# npm install -g nodemon

# express 기본 template 생성 package.json에 정의된 node packages 설치
# mkdir -p /gla/node/test && cd /gla/node/test
# express -e
cd /gla/node/test && npm install

#!/bin/bash
# OPENSSL_VER=`rpm -qa | grep openssl | awk -Fopenssl- '{print $2}'`
# yum install -y geoip-devel git wget boost-devel libtool flex bison pkgconfig libevent-devel zlib-devel python-devel ruby-devel gcc-c++ openssl-devel-$OPENSSL_VER
# https://thrift.apache.org/docs/install/centos

yum install -y geoip-devel git wget boost-devel libtool flex bison pkgconfig libevent-devel zlib-devel python-devel ruby-devel gcc-c++ openssl-devel

cd /usr/local/src
wget repo.com2us.kr/tb/tar_repo/thrift-0.9.0.tar.gz
tar zxvf thrift-0.9.0.tar.gz
cd thrift-0.9.0
./configure
make && make install
# find /usr/local -name *thrift*

cd contrib/fb303
./bootstrap.sh
./configure
make && make install

cd /usr/local/src
git clone https://github.com/facebook/scribe
cd scribe
./bootstrap.sh
./configure --with-boost-system=boost_system-mt --with-boost-filesystem=boost_filesystem-mt CPPFLAGS="-DHAVE_INTTYPES_H -DHAVE_NETINET_IN_H"
make
make install

echo "/usr/local/lib" > /etc/ld.so.conf.d/scribed.conf
ldconfig

cp examples/scribe_cat /usr/local/bin
cp examples/scribe_ctrl /usr/local/bin
mkdir /etc/scribed

mkdir -p /game/config/scribed
cp examples/example1.conf /game/config/scribed/scribed.conf

cd /etc/scribed
ln -s /game/config/scribed/scribed.conf

echo "SCRIBED_CONFIG=/etc/scribed/scribed.conf" >> /etc/sysconfig/scribed

cd /etc/init.d
wget repo.com2us.kr/tb/conf/scribed
chmod ugo+x scribed
chkconfig scribed on
/etc/init.d/scribed start

#!/bin/bash

echo "gla_dev/api checkout"
svn co svn://52.69.195.66/repos/gla/sonsimung_server/program /gla/public_html/gla_dev

/etc/init.d/php-fpm restart
/etc/init.d/nginx restart


#echo "gla_dev/api checkout"
#svn co svn://52.69.195.66/repos/gla/sonsimung_server/program/api /gla/public_html/gla_dev/api

#echo "gla_dev/dao checkout"
#svn co svn://52.69.195.66/repos/gla/sonsimung_server/program/dao /gla/public_html/gla_dev/dao

#echo "gla_dev/require checkout"
#svn co svn://52.69.195.66/repos/gla/sonsimung_server/program/require /gla/public_html/gla_dev/require
#
#echo "gla_dev/info checkout"
#svn co svn://52.69.195.66/repos/gla/sonsimung_server/program/info/dev /gla/public_html/gla_dev/info
#
#echo "gla_dev/Gateway checkout"
#svn co svn://52.69.195.66/repos/gla/sonsimung_server/program/Gateway.php /gla/public_html/gla_dev/Gateway.php
#
#/etc/init.d/php-fpm restart
#/etc/init.d/nginx restart

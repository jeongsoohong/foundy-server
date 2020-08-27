#!/bin/bash

GIT_PATH=/home/centos/foit-svr
WEB_PATH=/web/public_html

echo
echo '----====---- git checkout start ----====----'
cd $GIT_PATH
git checkout release
git pull

echo
echo '----====---- application start ----====----'
rsync -avz --delete $GIT_PATH/application $WEB_PATH

echo
echo '----====---- system start ----====----'
rsync -avz --delete --exclude="logs" $GIT_PATH/system $WEB_PATH

echo
echo '----====---- template start ----====----'
rsync -avz --delete $GIT_PATH/template $WEB_PATH

echo
echo '----====---- uploads/banner_image start ----====----'
rsync -avz --delete $GIT_PATH/uploads/banner_image $WEB_PATH/uploads

echo
echo '----====---- uploads/icon start ----====----'
rsync -avz --delete $GIT_PATH/uploads/icon $WEB_PATH/uploads

echo
echo '----====---- uploads/icon_0504 start ----====----'
rsync -avz --delete $GIT_PATH/uploads/icon_0504 $WEB_PATH/uploads

echo
echo '----====---- uploads/icon_0604 start ----====----'
rsync -avz --delete $GIT_PATH/uploads/icon_0604 $WEB_PATH/uploads

echo
echo '----====---- uploads/logo_image start ----====----'
rsync -avz --delete $GIT_PATH/uploads/logo_image $WEB_PATH/uploads

echo
echo '----====---- uploads/others start ----====----'
rsync -avz --delete $GIT_PATH/uploads/others $WEB_PATH/uploads

echo
echo '----====---- uploads/shop start ----====----'
rsync -avz --delete $GIT_PATH/uploads/shop $WEB_PATH/uploads

echo
echo '----====---- uploads/user start ----====----'
rsync -avz --delete $GIT_PATH/uploads/user $WEB_PATH/uploads

echo
echo '----====---- uploads/vendor_logo_image start ----====----'
rsync -avz --delete $GIT_PATH/uploads/vendor_logo_image $WEB_PATH/uploads


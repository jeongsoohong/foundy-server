#!/bin/bash

echo
echo '----====---- was1 start ----====----'
rsync -avz --delete --exclude=".svn" --exclude="gms" --exclude="crontab" --exclude="monitor" /game/public_html/cpb2015 10.3.52.31::html.cpb2015

echo
echo '----====---- was2 start ----====----'
rsync -avz --delete --exclude=".svn" --exclude="gms" --exclude="crontab" --exclude="monitor" /game/public_html/cpb2015 10.3.52.32::html.cpb2015

echo
echo '----====---- was3 start ----====----'
rsync -avz --delete --exclude=".svn" --exclude="gms" --exclude="crontab" --exclude="monitor" /game/public_html/cpb2015 10.3.52.33::html.cpb2015

echo
echo '----====---- was4 start ----====----'
rsync -avz --delete --exclude=".svn" --exclude="gms" --exclude="crontab" --exclude="monitor" /game/public_html/cpb2015 10.3.52.34::html.cpb2015

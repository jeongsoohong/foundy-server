rm -rf /game/public_html/cpb2015/*

svn export svn://svn.phonegame.kr/Com2uSProBaseball3D_server/live/gameserver /game/public_html/cpb2015/gameserver
svn export svn://svn.phonegame.kr/Com2uSProBaseball3D_server/live/config/live_g /game/public_html/cpb2015/config
svn export svn://svn.phonegame.kr/Com2uSProBaseball3D_server/live/gms /game/public_html/cpb2015/gms
svn export svn://svn.phonegame.kr/Com2uSProBaseball3D_server/live/crontab /game/public_html/cpb2015/crontab
svn export svn://svn.phonegame.kr/Com2uSProBaseball3D_server/live/monitor /game/public_html/cpb2015/monitor
svn export svn://svn.phonegame.kr/Com2uSProBaseball3D_server/live/tailer /game/public_html/cpb2015/tailer
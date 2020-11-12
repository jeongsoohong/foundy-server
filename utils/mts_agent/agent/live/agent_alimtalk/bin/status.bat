title MAgent client
echo off

set MAGENT_HOME=C:\MTS\agent_alimtalk
set JAVA_HOME=C:\MTS\Java\jre

set middleware_cp=%MAGENT_HOME%\lib\mAgent.jar

set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\log4j-1.2.15.jar
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\commons-dbcp-1.2.1.jar
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\commons-pool-1.3.jar
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\fscontext.jar
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\providerutil.jar
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\log4j-1.2.15.jar
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\wrapper.jar

rem oracle
set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\ojdbc14.jar

rem mssql
rem set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\sqljdbc4_v2.jar
rem set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\jtds-1.2.jar

rem mysql
rem set middleware_cp=%middleware_cp%;%MAGENT_HOME%\lib\mysql-connector-java-5.1.6-bin.jar

set magent_min_heap=56M
set magent_max_heap=512M

set JAVA_OPT=-Xms%magent_min_heap%
set JAVA_OPT=%JAVA_OPT% -Xmx%magent_max_heap%
set JAVA_OPT=%JAVA_OPT% -classpath %middleware_cp%

rem %JAVA_HOME%\bin\java %JAVA_OPT% com.mts.magent.Main start
%JAVA_HOME%\bin\java %JAVA_OPT% com.mts.magent.InternalCommand status

pause

#!/bin/sh
#
#scribed - this script starts and stops the scribed daemon
#
# chkconfig:   - 84 16
# description:  Scribe is a server for aggregating log data \
#               streamed in real time from a large number of \
#               servers.
# processname: scribed
# config:      /etc/scribed/scribed.conf
# config:      /etc/sysconfig/scribed
# pidfile:     /var/run/scribed.pid

# Source function library
. /etc/rc.d/init.d/functions

SCRIBED_CONFIG="/etc/scribed/scribed.conf"
run="/usr/local/bin/scribed"
run_ctrl="/usr/local/bin/scribe_ctrl"
prog=$(basename $run)

[ -e /etc/sysconfig/$prog ] && . /etc/sysconfig/$prog

port=$(egrep "^port=" $SCRIBED_CONFIG | awk -F"=" '{ print $2 }')

lockfile=/var/lock/subsys/scribed

start() {
    echo -n $"Starting $prog: "

    # Make sure we're not already running.
    $run_ctrl status $port > /dev/null 2>&1
    retval=$?
    if [ $retval -eq 2 ]; then
        echo "A"
        failure
        echo
        exit 1
    fi

    daemon nohup $run -c $SCRIBED_CONFIG &> /dev/null &
    retval=$?
    [ $retval -eq 0 ] && touch $lockfile

    # Pause for a moment, then check to see if we're up
    # 1 second has been sufficient thus far.
    sleep 1
    $run_ctrl status $port > /dev/null 2>&1
    retval=$?
    [ $retval -eq 2 ] && success || failure

    echo
    return $retval
}

stop() {
    echo -n $"Stopping $prog: "
    $run_ctrl stop $port 2>/dev/null 1>&2 && success || failure $"$run_ctrl
	stop $port"
    retval=$?
    echo
    [ $retval -eq 0 ] && rm -f $lockfile
    return $retval
}

status() {
    $run_ctrl status $port
}

restart() {
    stop
    start
}

reload() {
    echo "Probably not implemented."
    $run_ctrl reload $port
}

case "$1" in
    start|stop|restart|status|reload)
        $1
        ;;
    *)
        echo $"Usage: $0 {start|stop|status|restart|reload}"
        exit 2
esac

exit $retval

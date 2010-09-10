#!/bin/sh
#

scriptdir=`dirname $0`
basedir=`cd $scriptdir/..; echo $PWD`
webdir=$basedir/www
defuser="www-data"
defgroup="bluebird"

for d in nyss nyssdev; do
  dirpath=$webdir/$d
  if [ -d $dirpath ]; then
    ( set -x
      chown -R $defuser:$defgroup $dirpath
      chmod -R ug+rw,o-w $dirpath
    )
  fi
done

for d in senateProduction senateDevelopment; do
  dirpath=$basedir/$d
  if [ -d $dirpath ]; then
    ( set -x
      chgrp -R $defgroup $dirpath
      chmod -R ug+rw,o-w $dirpath
    )
  fi
done

exit 0

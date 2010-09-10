#!/bin/sh
#
# rsync_bluebird.sh - Synchronize the local repo with the production codebase
#
# Author: Ken Zalewski
# Organization: New York State Senate
# Date: 2010-09-07
#

prog=`basename $0`
dry_run_opt=
delete_opt="--delete"

usage() {
  echo "Usage: $prog [--dry-run] [--no-delete]" >&2
}


while [ $# -gt 0 ]; do
  case "$1" in
    -n|--dry-run) dry_run_opt="-n" ;;
    --no-delete) delete_opt="" ;;
    *) echo "$prog: $1: Invalid option"; usage ; exit 1 ;;
  esac
  shift
done

# rsync the scripts/, senateProduction/, and www/ dirs, but exclude sync
# for all sites/ directories that are of the form *.*.  This will skip
# sd99.crm.nysenate.gov, but not "all" and "default".
rsync -av $dry_run_opt $delete_opt --exclude sites/*.* $HOME/Bluebird-CRM/* /data/

# Since the sites/ subdirs are skipped above (other than "all" and "default",
# the following rsync handles any "template" sites.
rsync -avR $dry_run_opt $delete_opt $HOME/Bluebird-CRM/./www/*/sites/template.* /data/


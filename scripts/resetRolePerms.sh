#!/bin/sh
#
# resetRolePerms.sh
#
# Project: BluebirdCRM
# Authors: Brian Shaughnessy and Ken Zalewski
# Organization: New York State Senate
# Date: 2013-05-06
#

prog=`basename $0`
script_dir=`dirname $0`
execSql=$script_dir/execSql.sh
readConfig=$script_dir/readConfig.sh
drush=$script_dir/drush.sh

. $script_dir/defaults.sh

if [ $# -ne 1 ]; then
  echo "Usage: $prog instanceName" >&2
  exit 1
fi

instance="$1"

if ! $readConfig --instance $instance --quiet; then
  echo "$prog: $instance: Instance not found in config file" >&2
  exit 1
fi

data_rootdir=`$readConfig --ig $instance data.rootdir` || data_rootdir="$DEFAULT_DATA_ROOTDIR"
app_rootdir=`$readConfig --ig $instance app.rootdir` || app_rootdir="$DEFAULT_APP_ROOTDIR"
webdir=`$readConfig --global drupal.rootdir` || webdir="$DEFAULT_DRUPAL_ROOTDIR"
base_domain=`$readConfig --ig $instance base.domain` || base_domain="$DEFAULT_BASE_DOMAIN"
db_basename=`$readConfig --ig $instance db.basename` || db_basename="$instance"
log_db_prefix=`$readConfig --ig $instance db.log.prefix` || log_db_prefix="$DEFAULT_BASE_DOMAIN"
civi_db_prefix=`$readConfig --ig $instance db.civicrm.prefix` || civi_db_prefix="$DEFAULT_BASE_DOMAIN"
cdb="$civi_db_prefix$db_basename"

## reset all role perms
sql="
  INSERT IGNORE INTO role_permission (rid, permission, module) VALUES
    (0, 'cancel users with no custom roles', 'administerusersbyrole'),
    (0, 'cancel users with role Administrator', 'administerusersbyrole'),
    (0, 'cancel users with role Administrator and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role DataEntry', 'administerusersbyrole'),
    (0, 'cancel users with role DataEntry and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role MailingApprover', 'administerusersbyrole'),
    (0, 'cancel users with role MailingApprover and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role MailingCreator', 'administerusersbyrole'),
    (0, 'cancel users with role MailingCreator and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role MailingScheduler', 'administerusersbyrole'),
    (0, 'cancel users with role MailingScheduler and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role MailingViewer', 'administerusersbyrole'),
    (0, 'cancel users with role MailingViewer and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role OfficeAdministrator', 'administerusersbyrole'),
    (0, 'cancel users with role OfficeAdministrator and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role OfficeManager', 'administerusersbyrole'),
    (0, 'cancel users with role OfficeManager and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role PrintProduction', 'administerusersbyrole'),
    (0, 'cancel users with role PrintProduction and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role PrintProductionStaff', 'administerusersbyrole'),
    (0, 'cancel users with role PrintProductionStaff and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role SOS', 'administerusersbyrole'),
    (0, 'cancel users with role SOS and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role Staff', 'administerusersbyrole'),
    (0, 'cancel users with role Staff and other roles', 'administerusersbyrole'),
    (0, 'cancel users with role Volunteer', 'administerusersbyrole'),
    (0, 'cancel users with role Volunteer and other roles', 'administerusersbyrole'),
    (0, 'edit users with no custom roles', 'administerusersbyrole'),
    (0, 'edit users with role Administrator', 'administerusersbyrole'),
    (0, 'edit users with role Administrator and other roles', 'administerusersbyrole'),
    (0, 'edit users with role DataEntry', 'administerusersbyrole'),
    (0, 'edit users with role DataEntry and other roles', 'administerusersbyrole'),
    (0, 'edit users with role MailingApprover', 'administerusersbyrole'),
    (0, 'edit users with role MailingApprover and other roles', 'administerusersbyrole'),
    (0, 'edit users with role MailingCreator', 'administerusersbyrole'),
    (0, 'edit users with role MailingCreator and other roles', 'administerusersbyrole'),
    (0, 'edit users with role MailingScheduler', 'administerusersbyrole'),
    (0, 'edit users with role MailingScheduler and other roles', 'administerusersbyrole'),
    (0, 'edit users with role MailingViewer', 'administerusersbyrole'),
    (0, 'edit users with role MailingViewer and other roles', 'administerusersbyrole'),
    (0, 'edit users with role OfficeAdministrator', 'administerusersbyrole'),
    (0, 'edit users with role OfficeAdministrator and other roles', 'administerusersbyrole'),
    (0, 'edit users with role OfficeManager', 'administerusersbyrole'),
    (0, 'edit users with role OfficeManager and other roles', 'administerusersbyrole'),
    (0, 'edit users with role PrintProduction', 'administerusersbyrole'),
    (0, 'edit users with role PrintProduction and other roles', 'administerusersbyrole'),
    (0, 'edit users with role PrintProductionStaff', 'administerusersbyrole'),
    (0, 'edit users with role PrintProductionStaff and other roles', 'administerusersbyrole'),
    (0, 'edit users with role SOS', 'administerusersbyrole'),
    (0, 'edit users with role SOS and other roles', 'administerusersbyrole'),
    (0, 'edit users with role Staff', 'administerusersbyrole'),
    (0, 'edit users with role Staff and other roles', 'administerusersbyrole'),
    (0, 'edit users with role Volunteer', 'administerusersbyrole'),
    (0, 'edit users with role Volunteer and other roles', 'administerusersbyrole'),
    (1, 'access content', 'node'),
    (1, 'use text format 1', 'filter'),
    (2, 'access content', 'node'),
    (2, 'change own e-mail', 'userprotect'),
    (2, 'change own openid', 'userprotect'),
    (2, 'change own password', 'userprotect'),
    (2, 'use text format 1', 'filter'),
    (2, 'view own unpublished content', 'node'),
    (3, 'access administration pages', 'system'),
    (3, 'access all cases and activities', 'civicrm'),
    (3, 'access all custom data', 'civicrm'),
    (3, 'access CiviCRM', 'civicrm'),
    (3, 'access CiviReport', 'civicrm'),
    (3, 'access Contact Dashboard', 'civicrm'),
    (3, 'access deleted contacts', 'civicrm'),
    (3, 'access my cases and activities', 'civicrm'),
    (3, 'access Report Criteria', 'civicrm'),
    (3, 'access uploaded files', 'civicrm'),
    (3, 'access user profiles', 'user'),
    (3, 'add cases', 'civicrm'),
    (3, 'add contacts', 'civicrm'),
    (3, 'administer blocks', 'block'),
    (3, 'administer CiviCase', 'civicrm'),
    (3, 'administer CiviCRM', 'civicrm'),
    (3, 'administer dedupe rules', 'civicrm'),
    (3, 'administer inbox polling', 'nyss_civihooks'),
    (3, 'administer permissions', 'user'),
    (3, 'administer Reports', 'civicrm'),
    (3, 'administer reserved groups', 'civicrm'),
    (3, 'administer reserved tags', 'civicrm'),
    (3, 'administer Tagsets', 'civicrm'),
    (3, 'administer userprotect', 'userprotect'),
    (3, 'administer users', 'user'),
    (3, 'assign roles', 'roleassign'),
    (3, 'create users', 'administerusersbyrole'),
    (3, 'delete activities', 'civicrm'),
    (3, 'delete contacts', 'civicrm'),
    (3, 'delete contacts permanently', 'nyss_civihooks'),
    (3, 'delete in CiviCase', 'civicrm'),
    (3, 'edit all contacts', 'civicrm'),
    (3, 'edit groups', 'civicrm'),
    (3, 'edit users with role Administrator', 'administerusersbyrole'),
    (3, 'edit users with role SOS', 'administerusersbyrole'),
    (3, 'edit users with role Staff', 'administerusersbyrole'),
    (3, 'edit users with role Volunteer', 'administerusersbyrole'),
    (3, 'export print production files', 'nyss_civihooks'),
    (3, 'import contacts', 'civicrm'),
    (3, 'merge duplicate contacts', 'civicrm'),
    (3, 'profile create', 'civicrm'),
    (3, 'profile edit', 'civicrm'),
    (3, 'profile listings', 'civicrm'),
    (3, 'profile listings and forms', 'civicrm'),
    (3, 'profile view', 'civicrm'),
    (3, 'translate CiviCRM', 'civicrm'),
    (3, 'use PHP for settings', ''),
    (3, 'use text format 1', 'filter'),
    (3, 'view all activities', 'civicrm'),
    (3, 'view all contacts', 'civicrm'),
    (3, 'view the administration theme', 'system'),
    (4, 'access administration pages', 'system'),
    (4, 'access all cases and activities', 'civicrm'),
    (4, 'access all custom data', 'civicrm'),
    (4, 'access CiviCRM', 'civicrm'),
    (4, 'access CiviMail', 'civicrm'),
    (4, 'access CiviReport', 'civicrm'),
    (4, 'access Contact Dashboard', 'civicrm'),
    (4, 'access deleted contacts', 'civicrm'),
    (4, 'access my cases and activities', 'civicrm'),
    (4, 'access Report Criteria', 'civicrm'),
    (4, 'access uploaded files', 'civicrm'),
    (4, 'add cases', 'civicrm'),
    (4, 'add contacts', 'civicrm'),
    (4, 'administer CiviCRM', 'civicrm'),
    (4, 'administer dedupe rules', 'civicrm'),
    (4, 'administer inbox polling', 'nyss_civihooks'),
    (4, 'administer Reports', 'civicrm'),
    (4, 'administer reserved groups', 'civicrm'),
    (4, 'administer reserved tags', 'civicrm'),
    (4, 'administer users', 'user'),
    (4, 'approve mailings', 'civicrm'),
    (4, 'assign roles', 'roleassign'),
    (4, 'create mailings', 'civicrm'),
    (4, 'delete activities', 'civicrm'),
    (4, 'delete contacts', 'civicrm'),
    (4, 'delete contacts permanently', 'nyss_civihooks'),
    (4, 'delete in CiviCase', 'civicrm'),
    (4, 'delete in CiviMail', 'civicrm'),
    (4, 'edit all contacts', 'civicrm'),
    (4, 'edit groups', 'civicrm'),
    (4, 'edit users with role DataEntry', 'administerusersbyrole'),
    (4, 'edit users with role MailingApprover', 'administerusersbyrole'),
    (4, 'edit users with role MailingCreator', 'administerusersbyrole'),
    (4, 'edit users with role MailingScheduler', 'administerusersbyrole'),
    (4, 'edit users with role MailingViewer', 'administerusersbyrole'),
    (4, 'edit users with role ManageBluebirdInbox', 'administerusersbyrole'),
    (4, 'edit users with role OfficeAdministrator', 'administerusersbyrole'),
    (4, 'edit users with role OfficeManager', 'administerusersbyrole'),
    (4, 'edit users with role SOS', 'administerusersbyrole'),
    (4, 'edit users with role Staff', 'administerusersbyrole'),
    (4, 'edit users with role Volunteer', 'administerusersbyrole'),
    (4, 'export print production files', 'nyss_civihooks'),
    (4, 'import contacts', 'civicrm'),
    (4, 'merge duplicate contacts', 'civicrm'),
    (4, 'profile listings', 'civicrm'),
    (4, 'profile listings and forms', 'civicrm'),
    (4, 'profile view', 'civicrm'),
    (4, 'schedule mailings', 'civicrm'),
    (4, 'use text format 1', 'filter'),
    (4, 'view all activities', 'civicrm'),
    (4, 'view all contacts', 'civicrm'),
    (4, 'view all notes', 'civicrm'),
    (4, 'view the administration theme', 'system'),
    (5, 'access all custom data', 'civicrm'),
    (5, 'access CiviCRM', 'civicrm'),
    (5, 'access CiviReport', 'civicrm'),
    (5, 'access Report Criteria', 'civicrm'),
    (5, 'administer Reports', 'civicrm'),
    (5, 'edit all contacts', 'civicrm'),
    (5, 'profile listings', 'civicrm'),
    (5, 'profile view', 'civicrm'),
    (5, 'use text format 1', 'filter'),
    (5, 'view all activities', 'civicrm'),
    (5, 'view all contacts', 'civicrm'),
    (6, 'access all custom data', 'civicrm'),
    (6, 'access CiviCRM', 'civicrm'),
    (6, 'access CiviReport', 'civicrm'),
    (6, 'access Report Criteria', 'civicrm'),
    (6, 'access uploaded files', 'civicrm'),
    (6, 'add contacts', 'civicrm'),
    (6, 'administer Reports', 'civicrm'),
    (6, 'delete contacts', 'civicrm'),
    (6, 'edit all contacts', 'civicrm'),
    (6, 'edit groups', 'civicrm'),
    (6, 'profile listings', 'civicrm'),
    (6, 'profile view', 'civicrm'),
    (6, 'use text format 1', 'filter'),
    (6, 'view all activities', 'civicrm'),
    (6, 'view all contacts', 'civicrm'),
    (7, 'access all custom data', 'civicrm'),
    (7, 'access CiviCRM', 'civicrm'),
    (7, 'access CiviReport', 'civicrm'),
    (7, 'access site in maintenance mode', 'system'),
    (7, 'administer reserved groups', 'civicrm'),
    (7, 'administer site configuration', 'system'),
    (7, 'edit groups', 'civicrm'),
    (7, 'export print production files', 'nyss_civihooks'),
    (7, 'import contacts', 'civicrm'),
    (7, 'import print production', 'nyss_civihooks'),
    (7, 'profile listings', 'civicrm'),
    (7, 'profile view', 'civicrm'),
    (7, 'use text format 1', 'filter'),
    (7, 'view all contacts', 'civicrm'),
    (8, 'access all custom data', 'civicrm'),
    (8, 'access CiviCRM', 'civicrm'),
    (8, 'access CiviReport', 'civicrm'),
    (8, 'access Report Criteria', 'civicrm'),
    (8, 'administer Reports', 'civicrm'),
    (8, 'profile listings', 'civicrm'),
    (8, 'profile view', 'civicrm'),
    (8, 'use text format 1', 'filter'),
    (8, 'view all activities', 'civicrm'),
    (8, 'view all contacts', 'civicrm'),
    (9, 'access administration pages', 'system'),
    (9, 'access all cases and activities', 'civicrm'),
    (9, 'access all custom data', 'civicrm'),
    (9, 'access CiviCRM', 'civicrm'),
    (9, 'access CiviReport', 'civicrm'),
    (9, 'access Contact Dashboard', 'civicrm'),
    (9, 'access deleted contacts', 'civicrm'),
    (9, 'access my cases and activities', 'civicrm'),
    (9, 'access Report Criteria', 'civicrm'),
    (9, 'access uploaded files', 'civicrm'),
    (9, 'add cases', 'civicrm'),
    (9, 'add contacts', 'civicrm'),
    (9, 'administer district', 'nyss_civihooks'),
    (9, 'administer inbox polling', 'nyss_civihooks'),
    (9, 'administer Reports', 'civicrm'),
    (9, 'administer reserved tags', 'civicrm'),
    (9, 'administer users', 'user'),
    (9, 'assign roles', 'roleassign'),
    (9, 'delete activities', 'civicrm'),
    (9, 'delete contacts', 'civicrm'),
    (9, 'delete contacts permanently', 'nyss_civihooks'),
    (9, 'delete in CiviCase', 'civicrm'),
    (9, 'edit all contacts', 'civicrm'),
    (9, 'edit groups', 'civicrm'),
    (9, 'edit users with role DataEntry', 'administerusersbyrole'),
    (9, 'edit users with role MailingApprover', 'administerusersbyrole'),
    (9, 'edit users with role MailingCreator', 'administerusersbyrole'),
    (9, 'edit users with role MailingScheduler', 'administerusersbyrole'),
    (9, 'edit users with role MailingViewer', 'administerusersbyrole'),
    (9, 'edit users with role ManageBluebirdInbox', 'administerusersbyrole'),
    (9, 'edit users with role OfficeManager', 'administerusersbyrole'),
    (9, 'edit users with role SOS', 'administerusersbyrole'),
    (9, 'edit users with role Staff', 'administerusersbyrole'),
    (9, 'edit users with role Volunteer', 'administerusersbyrole'),
    (9, 'merge duplicate contacts', 'civicrm'),
    (9, 'profile listings', 'civicrm'),
    (9, 'profile listings and forms', 'civicrm'),
    (9, 'profile view', 'civicrm'),
    (9, 'use text format 1', 'filter'),
    (9, 'view all activities', 'civicrm'),
    (9, 'view all contacts', 'civicrm'),
    (9, 'view the administration theme', 'system'),
    (10, 'access all cases and activities', 'civicrm'),
    (10, 'access all custom data', 'civicrm'),
    (10, 'access CiviCRM', 'civicrm'),
    (10, 'access CiviReport', 'civicrm'),
    (10, 'access Contact Dashboard', 'civicrm'),
    (10, 'access deleted contacts', 'civicrm'),
    (10, 'access my cases and activities', 'civicrm'),
    (10, 'access Report Criteria', 'civicrm'),
    (10, 'access uploaded files', 'civicrm'),
    (10, 'add cases', 'civicrm'),
    (10, 'add contacts', 'civicrm'),
    (10, 'administer inbox polling', 'nyss_civihooks'),
    (10, 'administer Reports', 'civicrm'),
    (10, 'delete activities', 'civicrm'),
    (10, 'delete contacts', 'civicrm'),
    (10, 'delete in CiviCase', 'civicrm'),
    (10, 'edit all contacts', 'civicrm'),
    (10, 'edit groups', 'civicrm'),
    (10, 'profile listings', 'civicrm'),
    (10, 'profile listings and forms', 'civicrm'),
    (10, 'profile view', 'civicrm'),
    (10, 'use text format 1', 'filter'),
    (10, 'view all activities', 'civicrm'),
    (10, 'view all contacts', 'civicrm'),
    (11, 'access all cases and activities', 'civicrm'),
    (11, 'access all custom data', 'civicrm'),
    (11, 'access CiviCRM', 'civicrm'),
    (11, 'access CiviReport', 'civicrm'),
    (11, 'access Contact Dashboard', 'civicrm'),
    (11, 'access deleted contacts', 'civicrm'),
    (11, 'access my cases and activities', 'civicrm'),
    (11, 'access Report Criteria', 'civicrm'),
    (11, 'access uploaded files', 'civicrm'),
    (11, 'add cases', 'civicrm'),
    (11, 'add contacts', 'civicrm'),
    (11, 'administer Reports', 'civicrm'),
    (11, 'delete activities', 'civicrm'),
    (11, 'delete contacts', 'civicrm'),
    (11, 'delete in CiviCase', 'civicrm'),
    (11, 'edit all contacts', 'civicrm'),
    (11, 'edit groups', 'civicrm'),
    (11, 'profile listings', 'civicrm'),
    (11, 'profile view', 'civicrm'),
    (11, 'use text format 1', 'filter'),
    (11, 'view all activities', 'civicrm'),
    (11, 'view all contacts', 'civicrm'),
    (12, 'access all custom data', 'civicrm'),
    (12, 'access CiviCRM', 'civicrm'),
    (12, 'access uploaded files', 'civicrm'),
    (12, 'add contacts', 'civicrm'),
    (12, 'edit all contacts', 'civicrm'),
    (12, 'profile listings', 'civicrm'),
    (12, 'profile listings and forms', 'civicrm'),
    (12, 'profile view', 'civicrm'),
    (12, 'use text format 1', 'filter'),
    (12, 'view all activities', 'civicrm'),
    (12, 'view all contacts', 'civicrm'),
    (13, 'access all custom data', 'civicrm'),
    (13, 'access CiviCRM', 'civicrm'),
    (13, 'access my cases and activities', 'civicrm'),
    (13, 'access uploaded files', 'civicrm'),
    (13, 'add contacts', 'civicrm'),
    (13, 'profile listings', 'civicrm'),
    (13, 'profile view', 'civicrm'),
    (13, 'use text format 1', 'filter'),
    (13, 'view all activities', 'civicrm'),
    (13, 'view all contacts', 'civicrm'),
    (14, 'create mailings', 'civicrm'),
    (14, 'use text format 1', 'filter'),
    (15, 'schedule mailings', 'civicrm'),
    (15, 'use text format 1', 'filter'),
    (16, 'approve mailings', 'civicrm'),
    (16, 'use text format 1', 'filter'),
    (17, 'use text format 1', 'filter'),
    (17, 'view mass email', 'nyss_civihooks'),
    (18, 'access all custom data', 'civicrm'),
    (18, 'access CiviCRM', 'civicrm'),
    (18, 'access CiviReport', 'civicrm'),
    (18, 'access site in maintenance mode', 'system'),
    (18, 'administer reserved groups', 'civicrm'),
    (18, 'administer site configuration', 'system'),
    (18, 'edit groups', 'civicrm'),
    (18, 'export print production files', 'nyss_civihooks'),
    (18, 'import contacts', 'civicrm'),
    (18, 'profile listings', 'civicrm'),
    (18, 'profile view', 'civicrm'),
    (18, 'use text format 1', 'filter'),
    (18, 'view all contacts', 'civicrm'),
    (19, 'administer inbox polling', 'nyss_civihooks');
"
$execSql -i $instance -c "$sql" --drupal -q

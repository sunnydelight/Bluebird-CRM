#!/bin/sh
#
# v122_workflowrules.sh
#
# Project: BluebirdCRM
# Author: Brian Shaughnessy
# Organization: New York State Senate
# Date: 2011-07-02
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
webdir=`$readConfig --global drupal.rootdir` || webdir="$DEFAULT_DRUPAL_ROOTDIR"
base_domain=`$readConfig --ig $instance base.domain` || base_domain="$DEFAULT_BASE_DOMAIN"

###### Begin Update Scripts ######

### Drupal ###

## set workflow rules
rules="TRUNCATE TABLE rules_rules;
INSERT INTO rules_rules VALUES
('rules_notify_creator_of_approval', 0x613a393a7b733a353a222374797065223b733a343a2272756c65223b733a343a2223736574223b733a32323a226576656e745f6d61696c696e675f617070726f766564223b733a363a22236c6162656c223b733a32363a224e6f746966792043726561746f72206f6620417070726f76616c223b733a373a2223616374697665223b693a313b733a373a2223776569676874223b733a313a2230223b733a31313a222363617465676f72696573223b613a303a7b7d733a373a2223737461747573223b733a363a22637573746f6d223b733a31313a2223636f6e646974696f6e73223b613a313a7b693a303b613a353a7b733a373a2223776569676874223b643a303b733a353a2223696e666f223b613a333a7b733a353a226c6162656c223b733a32353a22417070726f76616c205374617475733a20417070726f766564223b733a393a22617267756d656e7473223b613a313a7b733a31343a22617070726f76616c737461747573223b613a323a7b733a343a2274797065223b733a373a226d61696c696e67223b733a353a226c6162656c223b733a383a22417070726f766564223b7d7d733a363a226d6f64756c65223b733a31353a224369766943524d204d61696c696e67223b7d733a353a22236e616d65223b733a33323a2272756c65735f636f6e646974696f6e5f6369766963726d5f617070726f766564223b733a393a222373657474696e6773223b613a313a7b733a31333a2223617267756d656e74206d6170223b613a313a7b733a31343a22617070726f76616c737461747573223b733a373a226d61696c696e67223b7d7d733a353a222374797065223b733a393a22636f6e646974696f6e223b7d7d733a383a2223616374696f6e73223b613a313a7b693a303b613a353a7b733a373a2223776569676874223b643a303b733a353a2223696e666f223b613a333a7b733a353a226c6162656c223b733a31303a2253656e6420456d61696c223b733a393a22617267756d656e7473223b613a313a7b733a373a226d61696c696e67223b613a323a7b733a343a2274797065223b733a373a226d61696c696e67223b733a353a226c6162656c223b733a31303a2253656e6420456d61696c223b7d7d733a363a226d6f64756c65223b733a31353a224369766943524d204d61696c696e67223b7d733a353a22236e616d65223b733a33393a2272756c65735f616374696f6e5f6369766963726d5f6d61696c696e675f73656e645f656d61696c223b733a393a222373657474696e6773223b613a353a7b733a323a22746f223b733a32323a227b6d61696c696e672e63726561746f72456d61696c7d223b733a343a2266726f6d223b733a34373a222253656e61746f72204a6f686e20446f6522203c73643939746573742e6d61696c406e7973656e6174652e676f763e223b733a373a227375626a656374223b733a35323a225374617475733a207b6d61696c696e672e617070726f76616c5374617475737d20287b6d61696c696e672e7375626a6563747d29223b733a373a226d657373616765223b733a3436393a223c703e54686520666f6c6c6f77696e6720656d61696c20686173206265656e203c7374726f6e673e7b6d61696c696e672e617070726f76616c5374617475737d3c2f7374726f6e673e3a207b6d61696c696e672e6e616d657d3c2f703e0d0a0d0a3c703e54686520666f6c6c6f77696e6720656d61696c20617070726f76616c206d65737361676520686173206265656e20696e636c756465643a3c6272202f3e0d0a7b6d61696c696e672e617070726f76616c4e6f74657d3c2f703e0d0a0d0a3c703e596f752068617665206e6f206675727468657220737465707320746f2074616b652e2054686520656d61696c2077696c6c20656e74657220746865206d61696c696e6720717565756520616e642062652064656c6976657265642073686f72746c792e204e6f7465207468617420656d61696c73206d617920657870657269656e636520736f6d652064656c6179206261736564206f6e207468652073697a65206f662074686520656d61696c20616e6420766f6c756d65206f6620726563697069656e74732e3c2f703e0d0a0d0a3c703e54686520636f6e74656e74206f662074686520656d61696c2069733a3c2f703e0d0a3c6469763e0d0a7b6d61696c696e672e68746d6c7d0d0a3c2f6469763e223b733a31333a2223617267756d656e74206d6170223b613a313a7b733a373a226d61696c696e67223b733a373a226d61696c696e67223b7d7d733a353a222374797065223b733a363a22616374696f6e223b7d7d7d),
('rules_notify_creator_of_rejection', 0x613a393a7b733a353a222374797065223b733a343a2272756c65223b733a343a2223736574223b733a32323a226576656e745f6d61696c696e675f617070726f766564223b733a363a22236c6162656c223b733a32373a224e6f746966792043726561746f72206f662052656a656374696f6e223b733a373a2223616374697665223b693a313b733a373a2223776569676874223b733a313a2230223b733a31313a222363617465676f72696573223b613a303a7b7d733a373a2223737461747573223b733a363a22637573746f6d223b733a31313a2223636f6e646974696f6e73223b613a313a7b693a303b613a353a7b733a373a2223776569676874223b643a303b733a353a2223696e666f223b613a333a7b733a353a226c6162656c223b733a32353a22417070726f76616c205374617475733a2052656a6563746564223b733a393a22617267756d656e7473223b613a313a7b733a31343a22617070726f76616c737461747573223b613a323a7b733a343a2274797065223b733a373a226d61696c696e67223b733a353a226c6162656c223b733a383a2252656a6563746564223b7d7d733a363a226d6f64756c65223b733a31353a224369766943524d204d61696c696e67223b7d733a353a22236e616d65223b733a33323a2272756c65735f636f6e646974696f6e5f6369766963726d5f72656a6563746564223b733a393a222373657474696e6773223b613a313a7b733a31333a2223617267756d656e74206d6170223b613a313a7b733a31343a22617070726f76616c737461747573223b733a373a226d61696c696e67223b7d7d733a353a222374797065223b733a393a22636f6e646974696f6e223b7d7d733a383a2223616374696f6e73223b613a313a7b693a303b613a353a7b733a373a2223776569676874223b643a303b733a353a2223696e666f223b613a333a7b733a353a226c6162656c223b733a31303a2253656e6420456d61696c223b733a393a22617267756d656e7473223b613a313a7b733a373a226d61696c696e67223b613a323a7b733a343a2274797065223b733a373a226d61696c696e67223b733a353a226c6162656c223b733a31303a2253656e6420456d61696c223b7d7d733a363a226d6f64756c65223b733a31353a224369766943524d204d61696c696e67223b7d733a353a22236e616d65223b733a33393a2272756c65735f616374696f6e5f6369766963726d5f6d61696c696e675f73656e645f656d61696c223b733a393a222373657474696e6773223b613a353a7b733a323a22746f223b733a32323a227b6d61696c696e672e63726561746f72456d61696c7d223b733a343a2266726f6d223b733a34373a222253656e61746f72204a6f686e20446f6522203c73643939746573742e6d61696c406e7973656e6174652e676f763e223b733a373a227375626a656374223b733a35323a225374617475733a207b6d61696c696e672e617070726f76616c5374617475737d20287b6d61696c696e672e7375626a6563747d29223b733a373a226d657373616765223b733a3530303a223c703e54686520666f6c6c6f77696e6720656d61696c20686173206265656e203c7374726f6e673e7b6d61696c696e672e617070726f76616c5374617475737d3c2f7374726f6e673e3a207b6d61696c696e672e6e616d657d3c2f703e0d0a0d0a3c703e54686520666f6c6c6f77696e6720656d61696c2072656a656374696f6e206d65737361676520686173206265656e20696e636c756465643a3c6272202f3e0d0a7b6d61696c696e672e617070726f76616c4e6f74657d3c2f703e0d0a0d0a3c703e596f752077696c6c2066696e64207468652072656a656374656420656d61696c20696e20426c756562697264206f6e2074686520447261667420616e6420556e7363686564756c656420456d61696c20706167652e20596f752063616e2072657669657720616e64206564697420746865206d61696c20686572653a207b6d61696c696e672e6564697455726c7d2e204f6e636520796f7527766520757064617465642074686520656d61696c20796f752077696c6c206e65656420746f2072657363686564756c6520697420616e64207375626d697420666f7220617070726f76616c2e3c2f703e0d0a0d0a3c703e54686520636f6e74656e74206f662074686520656d61696c2069733a3c2f703e0d0a3c6469763e0d0a7b6d61696c696e672e68746d6c7d0d0a3c2f6469763e223b733a31333a2223617267756d656e74206d6170223b613a313a7b733a373a226d61696c696e67223b733a373a226d61696c696e67223b7d7d733a353a222374797065223b733a363a22616374696f6e223b7d7d7d);"
$execSql -i $instance -c "$rules" --drupal

### Cleanup ###

$script_dir/fixPermissions.sh
$script_dir/clearCache.sh $instance

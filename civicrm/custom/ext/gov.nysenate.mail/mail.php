<?php

require_once 'mail.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function mail_civicrm_config(&$config) {
  _mail_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function mail_civicrm_xmlMenu(&$files) {
  _mail_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function mail_civicrm_install() {
  _mail_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function mail_civicrm_uninstall() {
  _mail_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function mail_civicrm_enable() {
  _mail_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function mail_civicrm_disable() {
  _mail_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function mail_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _mail_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function mail_civicrm_managed(&$entities) {
  _mail_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function mail_civicrm_caseTypes(&$caseTypes) {
  _mail_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function mail_civicrm_angularModules(&$angularModules) {
_mail_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function mail_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _mail_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function mail_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function mail_civicrm_navigationMenu(&$menu) {
  _mail_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'gov.nysenate.mail')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _mail_civix_navigationMenu($menu);
} // */

function mail_civicrm_alterAngular(\Civi\Angular\Manager $angular) {
  //inject mailing form options
  $changeSet = \Civi\Angular\ChangeSet::create('inject_options')
    ->alterHtml('~/crmMailing/BlockMailing.html', '_mail_alterMailingBlock');
  $angular->add($changeSet);

  //inject wizard
  $changeSet = \Civi\Angular\ChangeSet::create('inject_wizard')
    ->alterHtml('~/crmMailing/EditMailingCtrl/workflow.html', '_mail_alterMailingWizard');
  $angular->add($changeSet);
}

function mail_civicrm_pageRun(&$page) {
  //Civi::log()->debug('mail_civicrm_pageRun', array('page' => $page));

  //11038
  if (is_a($page, 'Civi\Angular\Page\Main')) {
    CRM_Core_Resources::singleton()->addStyleFile('gov.nysenate.mail', 'css/mail.css');
  }
}

function mail_civicrm_entityTypes(&$entityTypes) {
  //Civi::log()->debug('mail_civicrm_entityTypes', array('entityTypes' => $entityTypes));

  //formally declare our additions to the mailing table as entity fields
  $entityTypes['CRM_Mailing_DAO_Mailing']['fields_callback'][] = function($class, &$fields) {
    //Civi::log()->debug('mail_civicrm_entityTypes', array('$class' => $class, 'fields' => $fields));

    $fields['all_emails'] = array(
      'name' => 'all_emails',
      'type' => CRM_Utils_Type::T_INT,
      'title' => 'All Emails',
    );

    $fields['exclude_ood'] = array(
      'name' => 'exclude_ood',
      'type' => CRM_Utils_Type::T_INT,
      'title' => 'Exclude Out of District Emails',
    );

    $fields['category'] = array(
      'name' => 'category',
      'type' => CRM_Utils_Type::T_STRING,
      'title' => 'Category',
      'maxlength' => 255,
    );
  };
}

function mail_civicrm_alterMailingRecipients($mailing_id, $job_id, $m) {
  Civi::log()->debug('', array(
    'mailing_id' => $mailing_id,
    'job_id' => $job_id,
    'm' => $m,
  ));
}

/**
 * @param phpQueryObject $doc
 *
 * construct custom wizard html
 */
function _mail_alterMailingWizard(phpQueryObject $doc) {
  $extDir = CRM_Core_Resources::singleton()->getPath('gov.nysenate.mail');
  $html = file_get_contents($extDir.'/html/workflow.html');
  $doc->find('div[ng-form=crmMailingSubform]')->html($html);
}

/**
 * @param phpQueryObject $doc
 *
 * inject custom fields
 */
function _mail_alterMailingBlock(phpQueryObject $doc) {
  //NYSS 5581 - mailing category options
  $catOptions = "<option value=''>- select -</option>";
  $opts = CRM_Core_DAO::executeQuery("
    SELECT ov.label, ov.value
    FROM civicrm_option_value ov
    JOIN civicrm_option_group og
      ON ov.option_group_id = og.id
      AND og.name = 'mailing_categories'
    ORDER BY ov.label
  ");
  while ($opts->fetch()) {
    $catOptions .= "<option value='{$opts->value}'>{$opts->label}</option>";
  }

  $doc->find('.crm-group')->append('
    <div crm-ui-field="{name: \'subform.nyss\', title: \'Mailing Category\', help: hs(\'category\')}">
      <select 
        crm-ui-id="subform.nyss" 
        crm-ui-select="{dropdownAutoWidth : true, allowClear: true, placeholder: ts(\'Category\')}"
        name="category" 
        ng-model="mailing.category"
      >'.$catOptions.'</select>
    </div>
    <div crm-ui-field="{name: \'subform.nyss\', title: \'All Emails?\', help: hs(\'all-emails\')}">
      <input
        type="checkbox"
        crm-ui-id="subform.nyss"
        name="all_emails" 
        ng-model="mailing.all_emails"
        ng-true-value="\'1\'"
        ng-false-value="\'0\'"
      >
    </div>
  ');
}

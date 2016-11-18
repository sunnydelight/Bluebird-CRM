<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2016                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2016
 *
 * Generated from xml/schema/CRM/Contact/Contact.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:27260577cac7dfa803107cb6f506b834)
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Contact_DAO_Contact extends CRM_Core_DAO {
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_contact';
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Unique Contact ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Type of Contact.
   *
   * @var string
   */
  public $contact_type;
  /**
   * May be used to over-ride contact view and edit templates.
   *
   * @var string
   */
  public $contact_sub_type;
  /**
   *
   * @var boolean
   */
  public $do_not_email;
  /**
   *
   * @var boolean
   */
  public $do_not_phone;
  /**
   *
   * @var boolean
   */
  public $do_not_mail;
  /**
   *
   * @var boolean
   */
  public $do_not_sms;
  /**
   *
   * @var boolean
   */
  public $do_not_trade;
  /**
   * Has the contact opted out from receiving all bulk email from the organization or site domain?
   *
   * @var boolean
   */
  public $is_opt_out;
  /**
   * May be used for SSN, EIN/TIN, Household ID (census) or other applicable unique legal/government ID.
   *
   * @var string
   */
  public $legal_identifier;
  /**
   * Unique trusted external ID (generally from a legacy app/datasource). Particularly useful for deduping operations.
   *
   * @var string
   */
  public $external_identifier;
  /**
   * Name used for sorting different contact types
   *
   * @var string
   */
  public $sort_name;
  /**
   * Formatted name representing preferred format for display/print/other output.
   *
   * @var string
   */
  public $display_name;
  /**
   * Nickname.
   *
   * @var string
   */
  public $nick_name;
  /**
   * Legal Name.
   *
   * @var string
   */
  public $legal_name;
  /**
   * optional URL for preferred image (photo, logo, etc.) to display for this contact.
   *
   * @var text
   */
  public $image_URL;
  /**
   * What is the preferred mode of communication.
   *
   * @var string
   */
  public $preferred_communication_method;
  /**
   * Which language is preferred for communication. FK to languages in civicrm_option_value.
   *
   * @var string
   */
  public $preferred_language;
  /**
   * What is the preferred mode of sending an email.
   *
   * @var string
   */
  public $preferred_mail_format;
  /**
   * Key for validating requests related to this contact.
   *
   * @var string
   */
  public $hash;
  /**
   * API Key for validating requests related to this contact.
   *
   * @var string
   */
  public $api_key;
  /**
   * where contact come from, e.g. import, donate module insert...
   *
   * @var string
   */
  public $source;
  /**
   * First Name.
   *
   * @var string
   */
  public $first_name;
  /**
   * Middle Name.
   *
   * @var string
   */
  public $middle_name;
  /**
   * Last Name.
   *
   * @var string
   */
  public $last_name;
  /**
   * Prefix or Title for name (Ms, Mr...). FK to prefix ID
   *
   * @var int unsigned
   */
  public $prefix_id;
  /**
   * Suffix for name (Jr, Sr...). FK to suffix ID
   *
   * @var int unsigned
   */
  public $suffix_id;
  /**
   * Formal (academic or similar) title in front of name. (Prof., Dr. etc.)
   *
   * @var string
   */
  public $formal_title;
  /**
   * Communication style (e.g. formal vs. familiar) to use with this contact. FK to communication styles in civicrm_option_value.
   *
   * @var int unsigned
   */
  public $communication_style_id;
  /**
   * FK to civicrm_option_value.id, that has to be valid registered Email Greeting.
   *
   * @var int unsigned
   */
  public $email_greeting_id;
  /**
   * Custom Email Greeting.
   *
   * @var string
   */
  public $email_greeting_custom;
  /**
   * Cache Email Greeting.
   *
   * @var string
   */
  public $email_greeting_display;
  /**
   * FK to civicrm_option_value.id, that has to be valid registered Postal Greeting.
   *
   * @var int unsigned
   */
  public $postal_greeting_id;
  /**
   * Custom Postal greeting.
   *
   * @var string
   */
  public $postal_greeting_custom;
  /**
   * Cache Postal greeting.
   *
   * @var string
   */
  public $postal_greeting_display;
  /**
   * FK to civicrm_option_value.id, that has to be valid registered Addressee.
   *
   * @var int unsigned
   */
  public $addressee_id;
  /**
   * Custom Addressee.
   *
   * @var string
   */
  public $addressee_custom;
  /**
   * Cache Addressee.
   *
   * @var string
   */
  public $addressee_display;
  /**
   * Job Title
   *
   * @var string
   */
  public $job_title;
  /**
   * FK to gender ID
   *
   * @var int unsigned
   */
  public $gender_id;
  /**
   * Date of birth
   *
   * @var date
   */
  public $birth_date;
  /**
   *
   * @var boolean
   */
  public $is_deceased;
  /**
   * Date of deceased
   *
   * @var date
   */
  public $deceased_date;
  /**
   * Household Name.
   *
   * @var string
   */
  public $household_name;
  /**
   * Optional FK to Primary Contact for this household.
   *
   * @var int unsigned
   */
  public $primary_contact_id;
  /**
   * Organization Name.
   *
   * @var string
   */
  public $organization_name;
  /**
   * Standard Industry Classification Code.
   *
   * @var string
   */
  public $sic_code;
  /**
   * the OpenID (or OpenID-style http://username.domain/) unique identifier for this contact mainly used for logging in to CiviCRM
   *
   * @var string
   */
  public $user_unique_id;
  /**
   * OPTIONAL FK to civicrm_contact record.
   *
   * @var int unsigned
   */
  public $employer_id;
  /**
   *
   * @var boolean
   */
  public $is_deleted;
  /**
   * When was the contact was created.
   *
   * @var timestamp
   */
  public $created_date;
  /**
   * When was the contact (or closely related entity) was created or modified or deleted.
   *
   * @var timestamp
   */
  public $modified_date;
  /**
   * class constructor
   *
   * @return civicrm_contact
   */
  function __construct() {
    $this->__table = 'civicrm_contact';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'primary_contact_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'employer_id', 'civicrm_contact', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID') ,
          'description' => 'Unique Contact ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_contact.id',
          'headerPattern' => '/internal|contact?|id$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'contact_type' => array(
          'name' => 'contact_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Type') ,
          'description' => 'Type of Contact.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'export' => true,
          'where' => 'civicrm_contact.contact_type',
          'headerPattern' => '',
          'dataPattern' => '',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_contact_type',
            'keyColumn' => 'name',
            'labelColumn' => 'label',
            'condition' => 'parent_id IS NULL',
          )
        ) ,
        'contact_sub_type' => array(
          'name' => 'contact_sub_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Subtype') ,
          'description' => 'May be used to over-ride contact view and edit templates.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contact.contact_sub_type',
          'headerPattern' => '/C(ontact )?(subtype|sub-type|sub type)/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_contact_type',
            'keyColumn' => 'name',
            'labelColumn' => 'label',
            'condition' => 'parent_id IS NOT NULL',
          )
        ) ,
        'do_not_email' => array(
          'name' => 'do_not_email',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Do Not Email') ,
          'import' => true,
          'where' => 'civicrm_contact.do_not_email',
          'headerPattern' => '/d(o )?(not )?(email)/i',
          'dataPattern' => '/^\d{1,}$/',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'do_not_phone' => array(
          'name' => 'do_not_phone',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Do Not Phone') ,
          'import' => true,
          'where' => 'civicrm_contact.do_not_phone',
          'headerPattern' => '/d(o )?(not )?(call|phone)/i',
          'dataPattern' => '/^\d{1,}$/',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'do_not_mail' => array(
          'name' => 'do_not_mail',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Do Not Mail') ,
          'import' => true,
          'where' => 'civicrm_contact.do_not_mail',
          'headerPattern' => '/^(d(o\s)?n(ot\s)?mail)|(\w*)?bulk\s?(\w*)$/i',
          'dataPattern' => '/^\d{1,}$/',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'do_not_sms' => array(
          'name' => 'do_not_sms',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Do Not Sms') ,
          'import' => true,
          'where' => 'civicrm_contact.do_not_sms',
          'headerPattern' => '/d(o )?(not )?(sms)/i',
          'dataPattern' => '/^\d{1,}$/',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'do_not_trade' => array(
          'name' => 'do_not_trade',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Undeliverable: Do Not Mail'), //NYSS #4766
          'import' => true,
          'where' => 'civicrm_contact.do_not_trade',
          'headerPattern' => '/d(o )?(not )?(trade)/i',
          'dataPattern' => '/^\d{1,}$/',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'is_opt_out' => array(
          'name' => 'is_opt_out',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('No Bulk Emails (User Opt Out)') ,
          'description' => 'Has the contact opted out from receiving all bulk email from the organization or site domain?',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_contact.is_opt_out',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'legal_identifier' => array(
          'name' => 'legal_identifier',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Legal Identifier') ,
          'description' => 'May be used for SSN, EIN/TIN, Household ID (census) or other applicable unique legal/government ID.
    ',
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'import' => true,
          'where' => 'civicrm_contact.legal_identifier',
          'headerPattern' => '/legal\s?id/i',
          'dataPattern' => '/\w+?\d{5,}/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'external_identifier' => array(
          'name' => 'external_identifier',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('External Identifier') ,
          'description' => 'Unique trusted external ID (generally from a legacy app/datasource). Particularly useful for deduping operations.',
          'maxlength' => 64,
          'size' => 8,
          'import' => true,
          'where' => 'civicrm_contact.external_identifier',
          'headerPattern' => '/external\s?id/i',
          'dataPattern' => '/^\d{11,}$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'sort_name' => array(
          'name' => 'sort_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Sort Name') ,
          'description' => 'Name used for sorting different contact types',
          'maxlength' => 128,
          'size' => 30,
          'export' => true,
          'where' => 'civicrm_contact.sort_name',
          'headerPattern' => '',
          'dataPattern' => '',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'display_name' => array(
          'name' => 'display_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Display Name') ,
          'description' => 'Formatted name representing preferred format for display/print/other output.',
          'maxlength' => 128,
          'size' => 30,
          'export' => true,
          'where' => 'civicrm_contact.display_name',
          'headerPattern' => '',
          'dataPattern' => '',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'nick_name' => array(
          'name' => 'nick_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Nickname') ,
          'description' => 'Nickname.',
          'maxlength' => 128,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.nick_name',
          'headerPattern' => '/n(ick\s)name|nick$/i',
          'dataPattern' => '/^\w+$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'legal_name' => array(
          'name' => 'legal_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Legal Name') ,
          'description' => 'Legal Name.',
          'maxlength' => 128,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.legal_name',
          'headerPattern' => '/^legal|(l(egal\s)?name)$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'image_URL' => array(
          'name' => 'image_URL',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Image Url') ,
          'description' => 'optional URL for preferred image (photo, logo, etc.) to display for this contact.',
          'import' => true,
          'where' => 'civicrm_contact.image_URL',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'File',
          ) ,
        ) ,
        'preferred_communication_method' => array(
          'name' => 'preferred_communication_method',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Preferred Communication Method') ,
          'description' => 'What is the preferred mode of communication.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contact.preferred_communication_method',
          'headerPattern' => '/^p(ref\w*\s)?c(omm\w*)|( meth\w*)$/i',
          'dataPattern' => '/^\w+$/',
          'export' => true,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'preferred_communication_method',
            'optionEditPath' => 'civicrm/admin/options/preferred_communication_method',
          )
        ) ,
        'preferred_language' => array(
          'name' => 'preferred_language',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Preferred Language') ,
          'description' => 'Which language is preferred for communication. FK to languages in civicrm_option_value.',
          'maxlength' => 5,
          'size' => CRM_Utils_Type::SIX,
          'import' => true,
          'where' => 'civicrm_contact.preferred_language',
          'headerPattern' => '/^lang/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'languages',
            'keyColumn' => 'name',
            'optionEditPath' => 'civicrm/admin/options/languages',
          )
        ) ,
        'preferred_mail_format' => array(
          'name' => 'preferred_mail_format',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Preferred Mail Format') ,
          'description' => 'What is the preferred mode of sending an email.',
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'import' => true,
          'where' => 'civicrm_contact.preferred_mail_format',
          'headerPattern' => '/^p(ref\w*\s)?m(ail\s)?f(orm\w*)$/i',
          'dataPattern' => '',
          'export' => true,
          'default' => 'Both',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'callback' => 'CRM_Core_SelectValues::pmf',
          )
        ) ,
        'hash' => array(
          'name' => 'hash',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Hash') ,
          'description' => 'Key for validating requests related to this contact.',
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'export' => true,
          'where' => 'civicrm_contact.hash',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'api_key' => array(
          'name' => 'api_key',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Api Key') ,
          'description' => 'API Key for validating requests related to this contact.',
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
        ) ,
        'contact_source' => array(
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Source') ,
          'description' => 'where contact come from, e.g. import, donate module insert...',
          'maxlength' => 255,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.source',
          'headerPattern' => '/(C(ontact\s)?Source)$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'first_name' => array(
          'name' => 'first_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('First Name') ,
          'description' => 'First Name.',
          'maxlength' => 64,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.first_name',
          'headerPattern' => '/^first|(f(irst\s)?name)$/i',
          'dataPattern' => '/^\w+$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'middle_name' => array(
          'name' => 'middle_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Middle Name') ,
          'description' => 'Middle Name.',
          'maxlength' => 64,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.middle_name',
          'headerPattern' => '/^middle|(m(iddle\s)?name)$/i',
          'dataPattern' => '/^\w+$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'last_name' => array(
          'name' => 'last_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Last Name') ,
          'description' => 'Last Name.',
          'maxlength' => 64,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.last_name',
          'headerPattern' => '/^last|(l(ast\s)?name)$/i',
          'dataPattern' => '/^\w+(\s\w+)?+$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'prefix_id' => array(
          'name' => 'prefix_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Individual Prefix') ,
          'description' => 'Prefix or Title for name (Ms, Mr...). FK to prefix ID',
          'import' => true,
          'where' => 'civicrm_contact.prefix_id',
          'headerPattern' => '/^(prefix|title)/i',
          'dataPattern' => '/^(mr|ms|mrs|sir|dr)\.?$/i',
          'export' => true,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'individual_prefix',
            'optionEditPath' => 'civicrm/admin/options/individual_prefix',
          )
        ) ,
        'suffix_id' => array(
          'name' => 'suffix_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Individual Suffix') ,
          'description' => 'Suffix for name (Jr, Sr...). FK to suffix ID',
          'import' => true,
          'where' => 'civicrm_contact.suffix_id',
          'headerPattern' => '/^suffix$/i',
          'dataPattern' => '/^(sr|jr)\.?|i{2,}$/',
          'export' => true,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'individual_suffix',
            'optionEditPath' => 'civicrm/admin/options/individual_suffix',
          )
        ) ,
        'formal_title' => array(
          'name' => 'formal_title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Formal Title') ,
          'description' => 'Formal (academic or similar) title in front of name. (Prof., Dr. etc.)',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'import' => true,
          'where' => 'civicrm_contact.formal_title',
          'headerPattern' => '/^title/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'communication_style_id' => array(
          'name' => 'communication_style_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Communication Style') ,
          'description' => 'Communication style (e.g. formal vs. familiar) to use with this contact. FK to communication styles in civicrm_option_value.',
          'export' => true,
          'where' => 'civicrm_contact.communication_style_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'communication_style',
            'optionEditPath' => 'civicrm/admin/options/communication_style',
          )
        ) ,
        'email_greeting_id' => array(
          'name' => 'email_greeting_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Email Greeting ID') ,
          'description' => 'FK to civicrm_option_value.id, that has to be valid registered Email Greeting.',
        ) ,
        'email_greeting_custom' => array(
          'name' => 'email_greeting_custom',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Email Greeting Custom') ,
          'description' => 'Custom Email Greeting.',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contact.email_greeting_custom',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => false,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'email_greeting_display' => array(
          'name' => 'email_greeting_display',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Email Greeting') ,
          'description' => 'Cache Email Greeting.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'postal_greeting_id' => array(
          'name' => 'postal_greeting_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Postal Greeting ID') ,
          'description' => 'FK to civicrm_option_value.id, that has to be valid registered Postal Greeting.',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'postal_greeting_custom' => array(
          'name' => 'postal_greeting_custom',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Postal Greeting Custom') ,
          'description' => 'Custom Postal greeting.',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contact.postal_greeting_custom',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => false,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'postal_greeting_display' => array(
          'name' => 'postal_greeting_display',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Postal Greeting') ,
          'description' => 'Cache Postal greeting.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'addressee_id' => array(
          'name' => 'addressee_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Addressee ID') ,
          'description' => 'FK to civicrm_option_value.id, that has to be valid registered Addressee.',
        ) ,
        'addressee_custom' => array(
          'name' => 'addressee_custom',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Addressee Custom') ,
          'description' => 'Custom Addressee.',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contact.addressee_custom',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => false,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'addressee_display' => array(
          'name' => 'addressee_display',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Addressee') ,
          'description' => 'Cache Addressee.',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'job_title' => array(
          'name' => 'job_title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Job Title') ,
          'description' => 'Job Title',
          'maxlength' => 255,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.job_title',
          'headerPattern' => '/^job|(j(ob\s)?title)$/i',
          'dataPattern' => '//',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'gender_id' => array(
          'name' => 'gender_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Gender') ,
          'description' => 'FK to gender ID',
          'import' => true,
          'where' => 'civicrm_contact.gender_id',
          'headerPattern' => '/^gender$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'gender',
            'optionEditPath' => 'civicrm/admin/options/gender',
          )
        ) ,
        'birth_date' => array(
          'name' => 'birth_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Birth Date') ,
          'description' => 'Date of birth',
          'import' => true,
          'where' => 'civicrm_contact.birth_date',
          'headerPattern' => '/^birth|(b(irth\s)?date)|D(\W*)O(\W*)B(\W*)$/i',
          'dataPattern' => '/\d{4}-?\d{2}-?\d{2}/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'is_deceased' => array(
          'name' => 'is_deceased',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Deceased') ,
          'import' => true,
          'where' => 'civicrm_contact.is_deceased',
          'headerPattern' => '/i(s\s)?d(eceased)$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'deceased_date' => array(
          'name' => 'deceased_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Deceased Date') ,
          'description' => 'Date of deceased',
          'import' => true,
          'where' => 'civicrm_contact.deceased_date',
          'headerPattern' => '/^deceased|(d(eceased\s)?date)$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'household_name' => array(
          'name' => 'household_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Household Name') ,
          'description' => 'Household Name.',
          'maxlength' => 128,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.household_name',
          'headerPattern' => '/^household|(h(ousehold\s)?name)$/i',
          'dataPattern' => '/^\w+$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'primary_contact_id' => array(
          'name' => 'primary_contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Household Primary Contact ID') ,
          'description' => 'Optional FK to Primary Contact for this household.',
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'html' => array(
            'type' => 'Select',
          ) ,
        ) ,
        'organization_name' => array(
          'name' => 'organization_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Organization Name') ,
          'description' => 'Organization Name.',
          'maxlength' => 128,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_contact.organization_name',
          'headerPattern' => '/^organization|(o(rganization\s)?name)$/i',
          'dataPattern' => '/^\w+$/',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'sic_code' => array(
          'name' => 'sic_code',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Sic Code') ,
          'description' => 'Standard Industry Classification Code.',
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'import' => true,
          'where' => 'civicrm_contact.sic_code',
          'headerPattern' => '/^sic|(s(ic\s)?code)$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'user_unique_id' => array(
          'name' => 'user_unique_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Unique ID (OpenID)') ,
          'description' => 'the OpenID (or OpenID-style http://username.domain/) unique identifier for this contact mainly used for logging in to CiviCRM',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_contact.user_unique_id',
          'headerPattern' => '/^Open\s?ID|u(niq\w*)?\s?ID/i',
          'dataPattern' => '/^[\w\/\:\.]+$/',
          'export' => false, //NYSS 2719
          'rule' => 'url',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'current_employer_id' => array(
          'name' => 'employer_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Current Employer') ,
          'description' => 'OPTIONAL FK to civicrm_contact record.',
          'export' => true,
          'where' => 'civicrm_contact.employer_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'html' => array(
            'type' => 'EntityRef',
          ) ,
        ) ,
        'contact_is_deleted' => array(
          'name' => 'is_deleted',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Contact is in Trash') ,
          'required' => true,
          'export' => true,
          'where' => 'civicrm_contact.is_deleted',
          'headerPattern' => '',
          'dataPattern' => '',
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'created_date' => array(
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Created Date') ,
          'description' => 'When was the contact was created.',
          'required' => false,
          'export' => true,
          'where' => 'civicrm_contact.created_date',
          'headerPattern' => '',
          'dataPattern' => '',
          'default' => 'NULL',
        ) ,
        'modified_date' => array(
          'name' => 'modified_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Modified Date') ,
          'description' => 'When was the contact (or closely related entity) was created or modified or deleted.',
          'required' => false,
          'export' => true,
          'where' => 'civicrm_contact.modified_date',
          'headerPattern' => '',
          'dataPattern' => '',
          'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ) ,
      );
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }
  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'contact', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'contact', $prefix, array());
    return $r;
  }
}

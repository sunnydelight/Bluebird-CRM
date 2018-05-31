<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2018
 *
 * Generated from xml/schema/CRM/Pledge/PledgeBlock.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:630f1a7378136b8cc3edcd82a96279d6)
 */

/**
 * Database access object for the PledgeBlock entity.
 */
class CRM_Pledge_DAO_PledgeBlock extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_pledge_block';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  static $_log = TRUE;

  /**
   * Pledge ID
   *
   * @var int unsigned
   */
  public $id;

  /**
   * physical tablename for entity being joined to pledge, e.g. civicrm_contact
   *
   * @var string
   */
  public $entity_table;

  /**
   * FK to entity table specified in entity_table column.
   *
   * @var int unsigned
   */
  public $entity_id;

  /**
   * Delimited list of supported frequency units
   *
   * @var string
   */
  public $pledge_frequency_unit;

  /**
   * Is frequency interval exposed on the contribution form.
   *
   * @var boolean
   */
  public $is_pledge_interval;

  /**
   * The maximum number of payment reminders to send for any given payment.
   *
   * @var int unsigned
   */
  public $max_reminders;

  /**
   * Send initial reminder this many days prior to the payment due date.
   *
   * @var int unsigned
   */
  public $initial_reminder_day;

  /**
   * Send additional reminder this many days after last one sent, up to maximum number of reminders.
   *
   * @var int unsigned
   */
  public $additional_reminder_day;

  /**
   * The date the first scheduled pledge occurs.
   *
   * @var string
   */
  public $pledge_start_date;

  /**
   * If true - recurring start date is shown.
   *
   * @var boolean
   */
  public $is_pledge_start_date_visible;

  /**
   * If true - recurring start date is editable.
   *
   * @var boolean
   */
  public $is_pledge_start_date_editable;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_pledge_block';
    parent::__construct();
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Dynamic(self::getTableName(), 'entity_id', NULL, 'id', 'entity_table');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Pledge Block ID'),
          'description' => 'Pledge ID',
          'required' => TRUE,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'entity_table' => [
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Table'),
          'description' => 'physical tablename for entity being joined to pledge, e.g. civicrm_contact',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'entity_id' => [
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Entity Id'),
          'description' => 'FK to entity table specified in entity_table column.',
          'required' => TRUE,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'pledge_frequency_unit' => [
          'name' => 'pledge_frequency_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Pledge Frequency Unit'),
          'description' => 'Delimited list of supported frequency units',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_SEPARATOR_TRIMMED,
        ],
        'is_pledge_interval' => [
          'name' => 'is_pledge_interval',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Expose Frequency Interval?'),
          'description' => 'Is frequency interval exposed on the contribution form.',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'max_reminders' => [
          'name' => 'max_reminders',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Maximum Number of Reminders'),
          'description' => 'The maximum number of payment reminders to send for any given payment.',
          'default' => '1',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'initial_reminder_day' => [
          'name' => 'initial_reminder_day',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Initial Reminder Day'),
          'description' => 'Send initial reminder this many days prior to the payment due date.',
          'default' => '5',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'additional_reminder_day' => [
          'name' => 'additional_reminder_day',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Additional Reminder Days'),
          'description' => 'Send additional reminder this many days after last one sent, up to maximum number of reminders.',
          'default' => '5',
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'pledge_start_date' => [
          'name' => 'pledge_start_date',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Pledge Start Date'),
          'description' => 'The date the first scheduled pledge occurs.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'is_pledge_start_date_visible' => [
          'name' => 'is_pledge_start_date_visible',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Show Recurring Donation Start Date?'),
          'description' => 'If true - recurring start date is shown.',
          'required' => TRUE,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
        'is_pledge_start_date_editable' => [
          'name' => 'is_pledge_start_date_editable',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Allow Edits to Recurring Donation Start Date?'),
          'description' => 'If true - recurring start date is editable.',
          'required' => TRUE,
          'table_name' => 'civicrm_pledge_block',
          'entity' => 'PledgeBlock',
          'bao' => 'CRM_Pledge_BAO_PledgeBlock',
          'localizable' => 0,
        ],
      ];
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
  public static function &fieldKeys() {
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
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'pledge_block', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'pledge_block', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [
      'index_entity' => [
        'name' => 'index_entity',
        'field' => [
          0 => 'entity_table',
          1 => 'entity_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_pledge_block::0::entity_table::entity_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

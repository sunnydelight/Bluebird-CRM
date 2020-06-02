<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Campaign/Campaign.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:f69a15a0b3ca2db78b4981c73b7d1757)
 */

/**
 * Database access object for the Campaign entity.
 */
class CRM_Campaign_DAO_Campaign extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_campaign';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * Unique Campaign ID.
   *
   * @var int
   */
  public $id;

  /**
   * Name of the Campaign.
   *
   * @var string
   */
  public $name;

  /**
   * Title of the Campaign.
   *
   * @var string
   */
  public $title;

  /**
   * Full description of Campaign.
   *
   * @var text
   */
  public $description;

  /**
   * Date and time that Campaign starts.
   *
   * @var datetime
   */
  public $start_date;

  /**
   * Date and time that Campaign ends.
   *
   * @var datetime
   */
  public $end_date;

  /**
   * Campaign Type ID.Implicit FK to civicrm_option_value where option_group = campaign_type
   *
   * @var int
   */
  public $campaign_type_id;

  /**
   * Campaign status ID.Implicit FK to civicrm_option_value where option_group = campaign_status
   *
   * @var int
   */
  public $status_id;

  /**
   * Unique trusted external ID (generally from a legacy app/datasource). Particularly useful for deduping operations.
   *
   * @var string
   */
  public $external_identifier;

  /**
   * Optional parent id for this Campaign.
   *
   * @var int
   */
  public $parent_id;

  /**
   * Is this Campaign enabled or disabled/cancelled?
   *
   * @var bool
   */
  public $is_active;

  /**
   * FK to civicrm_contact, who created this Campaign.
   *
   * @var int
   */
  public $created_id;

  /**
   * Date and time that Campaign was created.
   *
   * @var datetime
   */
  public $created_date;

  /**
   * FK to civicrm_contact, who recently edited this Campaign.
   *
   * @var int
   */
  public $last_modified_id;

  /**
   * Date and time that Campaign was edited last time.
   *
   * @var datetime
   */
  public $last_modified_date;

  /**
   * General goals for Campaign.
   *
   * @var text
   */
  public $goal_general;

  /**
   * The target revenue for this campaign.
   *
   * @var float
   */
  public $goal_revenue;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_campaign';
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
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'parent_id', 'civicrm_campaign', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'created_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'last_modified_id', 'civicrm_contact', 'id');
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
          'title' => ts('Campaign ID'),
          'description' => ts('Unique Campaign ID.'),
          'required' => TRUE,
          'import' => TRUE,
          'where' => 'civicrm_campaign.id',
          'export' => TRUE,
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Campaign Name'),
          'description' => ts('Name of the Campaign.'),
          'required' => TRUE,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => TRUE,
          'where' => 'civicrm_campaign.name',
          'export' => TRUE,
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Campaign Title'),
          'description' => ts('Title of the Campaign.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => TRUE,
          'where' => 'civicrm_campaign.title',
          'export' => TRUE,
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Campaign Description'),
          'description' => ts('Full description of Campaign.'),
          'rows' => 8,
          'cols' => 60,
          'where' => 'civicrm_campaign.description',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'TextArea',
          ],
        ],
        'start_date' => [
          'name' => 'start_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Campaign Start Date'),
          'description' => ts('Date and time that Campaign starts.'),
          'import' => TRUE,
          'where' => 'civicrm_campaign.start_date',
          'headerPattern' => '/^start|(s(tart\s)?date)$/i',
          'export' => TRUE,
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Select Date',
          ],
        ],
        'end_date' => [
          'name' => 'end_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Campaign End Date'),
          'description' => ts('Date and time that Campaign ends.'),
          'import' => TRUE,
          'where' => 'civicrm_campaign.end_date',
          'headerPattern' => '/^end|(e(nd\s)?date)$/i',
          'export' => TRUE,
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Select Date',
          ],
        ],
        'campaign_type_id' => [
          'name' => 'campaign_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign Type'),
          'description' => ts('Campaign Type ID.Implicit FK to civicrm_option_value where option_group = campaign_type'),
          'import' => TRUE,
          'where' => 'civicrm_campaign.campaign_type_id',
          'export' => TRUE,
          'default' => 'NULL',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'campaign_type',
            'optionEditPath' => 'civicrm/admin/options/campaign_type',
          ],
        ],
        'status_id' => [
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign Status'),
          'description' => ts('Campaign status ID.Implicit FK to civicrm_option_value where option_group = campaign_status'),
          'import' => TRUE,
          'where' => 'civicrm_campaign.status_id',
          'export' => TRUE,
          'default' => 'NULL',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'campaign_status',
            'optionEditPath' => 'civicrm/admin/options/campaign_status',
          ],
        ],
        'external_identifier' => [
          'name' => 'external_identifier',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Campaign External ID'),
          'description' => ts('Unique trusted external ID (generally from a legacy app/datasource). Particularly useful for deduping operations.'),
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'import' => TRUE,
          'where' => 'civicrm_campaign.external_identifier',
          'headerPattern' => '/external\s?id/i',
          'dataPattern' => '/^\d{11,}$/',
          'export' => TRUE,
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
        ],
        'parent_id' => [
          'name' => 'parent_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Parent Campaign'),
          'description' => ts('Optional parent id for this Campaign.'),
          'import' => TRUE,
          'where' => 'civicrm_campaign.parent_id',
          'export' => TRUE,
          'default' => 'NULL',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'FKClassName' => 'CRM_Campaign_DAO_Campaign',
          'html' => [
            'type' => 'EntityRef',
          ],
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Campaign Active?'),
          'description' => ts('Is this Campaign enabled or disabled/cancelled?'),
          'where' => 'civicrm_campaign.is_active',
          'default' => '1',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
        ],
        'created_id' => [
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign Created By'),
          'description' => ts('FK to civicrm_contact, who created this Campaign.'),
          'where' => 'civicrm_campaign.created_id',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'created_date' => [
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Campaign Created Date'),
          'description' => ts('Date and time that Campaign was created.'),
          'where' => 'civicrm_campaign.created_date',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Select Date',
          ],
        ],
        'last_modified_id' => [
          'name' => 'last_modified_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign Modified By'),
          'description' => ts('FK to civicrm_contact, who recently edited this Campaign.'),
          'where' => 'civicrm_campaign.last_modified_id',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'last_modified_date' => [
          'name' => 'last_modified_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Campaign Modified Date'),
          'description' => ts('Date and time that Campaign was edited last time.'),
          'where' => 'civicrm_campaign.last_modified_date',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
        ],
        'goal_general' => [
          'name' => 'goal_general',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Campaign Goals'),
          'description' => ts('General goals for Campaign.'),
          'where' => 'civicrm_campaign.goal_general',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'RichTextEditor',
          ],
        ],
        'goal_revenue' => [
          'name' => 'goal_revenue',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Goal Revenue'),
          'description' => ts('The target revenue for this campaign.'),
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_campaign.goal_revenue',
          'table_name' => 'civicrm_campaign',
          'entity' => 'Campaign',
          'bao' => 'CRM_Campaign_BAO_Campaign',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'campaign', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'campaign', $prefix, []);
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
      'UI_campaign_type_id' => [
        'name' => 'UI_campaign_type_id',
        'field' => [
          0 => 'campaign_type_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_campaign::0::campaign_type_id',
      ],
      'UI_campaign_status_id' => [
        'name' => 'UI_campaign_status_id',
        'field' => [
          0 => 'status_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_campaign::0::status_id',
      ],
      'UI_external_identifier' => [
        'name' => 'UI_external_identifier',
        'field' => [
          0 => 'external_identifier',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_campaign::1::external_identifier',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

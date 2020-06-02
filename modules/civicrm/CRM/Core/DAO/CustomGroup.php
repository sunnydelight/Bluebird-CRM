<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Core/CustomGroup.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:1e40fdbcc363c9b5e4c880a6838c7375)
 */

/**
 * Database access object for the CustomGroup entity.
 */
class CRM_Core_DAO_CustomGroup extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_custom_group';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique Custom Group ID
   *
   * @var int
   */
  public $id;

  /**
   * Variable name/programmatic handle for this group.
   *
   * @var string
   */
  public $name;

  /**
   * Friendly Name.
   *
   * @var string
   */
  public $title;

  /**
   * Type of object this group extends (can add other options later e.g. contact_address, etc.).
   *
   * @var string
   */
  public $extends;

  /**
   * FK to civicrm_option_value.id (for option group custom_data_type.)
   *
   * @var int
   */
  public $extends_entity_column_id;

  /**
   * linking custom group for dynamic object
   *
   * @var string
   */
  public $extends_entity_column_value;

  /**
   * Visual relationship between this form and its parent.
   *
   * @var string
   */
  public $style;

  /**
   * Will this group be in collapsed or expanded mode on initial display ?
   *
   * @var int
   */
  public $collapse_display;

  /**
   * Description and/or help text to display before fields in form.
   *
   * @var text
   */
  public $help_pre;

  /**
   * Description and/or help text to display after fields in form.
   *
   * @var text
   */
  public $help_post;

  /**
   * Controls display order when multiple extended property groups are setup for the same class.
   *
   * @var int
   */
  public $weight;

  /**
   * Is this property active?
   *
   * @var bool
   */
  public $is_active;

  /**
   * Name of the table that holds the values for this group.
   *
   * @var string
   */
  public $table_name;

  /**
   * Does this group hold multiple values?
   *
   * @var bool
   */
  public $is_multiple;

  /**
   * minimum number of multiple records (typically 0?)
   *
   * @var int
   */
  public $min_multiple;

  /**
   * maximum number of multiple records, if 0 - no max
   *
   * @var int
   */
  public $max_multiple;

  /**
   * Will this group be in collapsed or expanded mode on advanced search display ?
   *
   * @var int
   */
  public $collapse_adv_display;

  /**
   * FK to civicrm_contact, who created this custom group
   *
   * @var int
   */
  public $created_id;

  /**
   * Date and time this custom group was created.
   *
   * @var datetime
   */
  public $created_date;

  /**
   * Is this a reserved Custom Group?
   *
   * @var bool
   */
  public $is_reserved;

  /**
   * Is this property public?
   *
   * @var bool
   */
  public $is_public;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_custom_group';
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'created_id', 'civicrm_contact', 'id');
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
          'title' => ts('Custom Group ID'),
          'description' => ts('Unique Custom Group ID'),
          'required' => TRUE,
          'where' => 'civicrm_custom_group.id',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Custom Group Name'),
          'description' => ts('Variable name/programmatic handle for this group.'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_custom_group.name',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Custom Group Title'),
          'description' => ts('Friendly Name.'),
          'required' => TRUE,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_custom_group.title',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 1,
        ],
        'extends' => [
          'name' => 'extends',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Custom Group Extends'),
          'description' => ts('Type of object this group extends (can add other options later e.g. contact_address, etc.).'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_custom_group.extends',
          'default' => 'Contact',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'extends_entity_column_id' => [
          'name' => 'extends_entity_column_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Custom Group Subtype List'),
          'description' => ts('FK to civicrm_option_value.id (for option group custom_data_type.)'),
          'where' => 'civicrm_custom_group.extends_entity_column_id',
          'default' => 'NULL',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'custom_data_type',
            'optionEditPath' => 'civicrm/admin/options/custom_data_type',
          ],
        ],
        'extends_entity_column_value' => [
          'name' => 'extends_entity_column_value',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Custom Group Subtype'),
          'description' => ts('linking custom group for dynamic object'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_custom_group.extends_entity_column_value',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_SEPARATOR_BOOKEND,
        ],
        'style' => [
          'name' => 'style',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Custom Group Style'),
          'description' => ts('Visual relationship between this form and its parent.'),
          'maxlength' => 15,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_custom_group.style',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::customGroupStyle',
          ],
        ],
        'collapse_display' => [
          'name' => 'collapse_display',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Collapse Custom Group?'),
          'description' => ts('Will this group be in collapsed or expanded mode on initial display ?'),
          'where' => 'civicrm_custom_group.collapse_display',
          'default' => '0',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'help_pre' => [
          'name' => 'help_pre',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Custom Group Pre Text'),
          'description' => ts('Description and/or help text to display before fields in form.'),
          'rows' => 4,
          'cols' => 80,
          'where' => 'civicrm_custom_group.help_pre',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 1,
          'html' => [
            'type' => 'TextArea',
          ],
        ],
        'help_post' => [
          'name' => 'help_post',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Custom Group Post Text'),
          'description' => ts('Description and/or help text to display after fields in form.'),
          'rows' => 4,
          'cols' => 80,
          'where' => 'civicrm_custom_group.help_post',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 1,
          'html' => [
            'type' => 'TextArea',
          ],
        ],
        'weight' => [
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Order'),
          'description' => ts('Controls display order when multiple extended property groups are setup for the same class.'),
          'required' => TRUE,
          'where' => 'civicrm_custom_group.weight',
          'default' => '1',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Custom Group Is Active?'),
          'description' => ts('Is this property active?'),
          'where' => 'civicrm_custom_group.is_active',
          'default' => '1',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'table_name' => [
          'name' => 'table_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Table Name'),
          'description' => ts('Name of the table that holds the values for this group.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_custom_group.table_name',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'is_multiple' => [
          'name' => 'is_multiple',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Supports Multiple Records'),
          'description' => ts('Does this group hold multiple values?'),
          'where' => 'civicrm_custom_group.is_multiple',
          'default' => '0',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'min_multiple' => [
          'name' => 'min_multiple',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Minimum Multiple Records'),
          'description' => ts('minimum number of multiple records (typically 0?)'),
          'where' => 'civicrm_custom_group.min_multiple',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'max_multiple' => [
          'name' => 'max_multiple',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Maximum Multiple Records'),
          'description' => ts('maximum number of multiple records, if 0 - no max'),
          'where' => 'civicrm_custom_group.max_multiple',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'collapse_adv_display' => [
          'name' => 'collapse_adv_display',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Collapse Group Display'),
          'description' => ts('Will this group be in collapsed or expanded mode on advanced search display ?'),
          'where' => 'civicrm_custom_group.collapse_adv_display',
          'default' => '0',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'created_id' => [
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Custom Group Created By'),
          'description' => ts('FK to civicrm_contact, who created this custom group'),
          'where' => 'civicrm_custom_group.created_id',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'created_date' => [
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Custom Group Created Date'),
          'description' => ts('Date and time this custom group was created.'),
          'where' => 'civicrm_custom_group.created_date',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'is_reserved' => [
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Reserved Group?'),
          'description' => ts('Is this a reserved Custom Group?'),
          'where' => 'civicrm_custom_group.is_reserved',
          'default' => '0',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
          'localizable' => 0,
        ],
        'is_public' => [
          'name' => 'is_public',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Custom Group Is Public?'),
          'description' => ts('Is this property public?'),
          'where' => 'civicrm_custom_group.is_public',
          'default' => '1',
          'table_name' => 'civicrm_custom_group',
          'entity' => 'CustomGroup',
          'bao' => 'CRM_Core_BAO_CustomGroup',
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
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'custom_group', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'custom_group', $prefix, []);
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
      'UI_title_extends' => [
        'name' => 'UI_title_extends',
        'field' => [
          0 => 'title',
          1 => 'extends',
        ],
        'localizable' => TRUE,
        'unique' => TRUE,
        'sig' => 'civicrm_custom_group::1::title::extends',
      ],
      'UI_name_extends' => [
        'name' => 'UI_name_extends',
        'field' => [
          0 => 'name',
          1 => 'extends',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_custom_group::1::name::extends',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

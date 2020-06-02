<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Core/Menu.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:96c64cb8e13a36f16745aefaff64440a)
 */

/**
 * Database access object for the Menu entity.
 */
class CRM_Core_DAO_Menu extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_menu';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * @var int
   */
  public $id;

  /**
   * Which Domain is this menu item for
   *
   * @var int
   */
  public $domain_id;

  /**
   * Path Name
   *
   * @var string
   */
  public $path;

  /**
   * Arguments to pass to the url
   *
   * @var text
   */
  public $path_arguments;

  /**
   * @var string
   */
  public $title;

  /**
   * Function to call to check access permissions
   *
   * @var string
   */
  public $access_callback;

  /**
   * Arguments to pass to access callback
   *
   * @var text
   */
  public $access_arguments;

  /**
   * function to call for this url
   *
   * @var string
   */
  public $page_callback;

  /**
   * Arguments to pass to page callback
   *
   * @var text
   */
  public $page_arguments;

  /**
   * Breadcrumb for the path.
   *
   * @var text
   */
  public $breadcrumb;

  /**
   * Url where a page should redirected to, if next url not known.
   *
   * @var string
   */
  public $return_url;

  /**
   * Arguments to pass to return_url
   *
   * @var string
   */
  public $return_url_args;

  /**
   * Component that this menu item belongs to
   *
   * @var int
   */
  public $component_id;

  /**
   * Is this menu item active?
   *
   * @var bool
   */
  public $is_active;

  /**
   * Is this menu accessible to the public?
   *
   * @var bool
   */
  public $is_public;

  /**
   * Is this menu exposed to the navigation system?
   *
   * @var bool
   */
  public $is_exposed;

  /**
   * Should this menu be exposed via SSL if enabled?
   *
   * @var bool
   */
  public $is_ssl;

  /**
   * Ordering of the menu items in various blocks.
   *
   * @var int
   */
  public $weight;

  /**
   * Drupal menu type.
   *
   * @var int
   */
  public $type;

  /**
   * CiviCRM menu type.
   *
   * @var int
   */
  public $page_type;

  /**
   * skip this url being exposed to breadcrumb
   *
   * @var bool
   */
  public $skipBreadcrumb;

  /**
   * All other menu metadata not stored in other fields
   *
   * @var text
   */
  public $module_data;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_menu';
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'domain_id', 'civicrm_domain', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'component_id', 'civicrm_component', 'id');
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
          'title' => ts('Menu ID'),
          'required' => TRUE,
          'where' => 'civicrm_menu.id',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'domain_id' => [
          'name' => 'domain_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Domain'),
          'description' => ts('Which Domain is this menu item for'),
          'required' => TRUE,
          'where' => 'civicrm_menu.domain_id',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Domain',
          'pseudoconstant' => [
            'table' => 'civicrm_domain',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
        ],
        'path' => [
          'name' => 'path',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Path'),
          'description' => ts('Path Name'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_menu.path',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'path_arguments' => [
          'name' => 'path_arguments',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Arguments'),
          'description' => ts('Arguments to pass to the url'),
          'where' => 'civicrm_menu.path_arguments',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Menu Title'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_menu.title',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'access_callback' => [
          'name' => 'access_callback',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Access Callback'),
          'description' => ts('Function to call to check access permissions'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_menu.access_callback',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'access_arguments' => [
          'name' => 'access_arguments',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Access Arguments'),
          'description' => ts('Arguments to pass to access callback'),
          'where' => 'civicrm_menu.access_arguments',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'page_callback' => [
          'name' => 'page_callback',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Page Callback'),
          'description' => ts('function to call for this url'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_menu.page_callback',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'page_arguments' => [
          'name' => 'page_arguments',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Page Arguments'),
          'description' => ts('Arguments to pass to page callback'),
          'where' => 'civicrm_menu.page_arguments',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'breadcrumb' => [
          'name' => 'breadcrumb',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Breadcrumb'),
          'description' => ts('Breadcrumb for the path.'),
          'where' => 'civicrm_menu.breadcrumb',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'return_url' => [
          'name' => 'return_url',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Return Url'),
          'description' => ts('Url where a page should redirected to, if next url not known.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_menu.return_url',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'return_url_args' => [
          'name' => 'return_url_args',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Return Url Args'),
          'description' => ts('Arguments to pass to return_url'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_menu.return_url_args',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'component_id' => [
          'name' => 'component_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Component'),
          'description' => ts('Component that this menu item belongs to'),
          'where' => 'civicrm_menu.component_id',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Component',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_component',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Enabled?'),
          'description' => ts('Is this menu item active?'),
          'where' => 'civicrm_menu.is_active',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'is_public' => [
          'name' => 'is_public',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Public?'),
          'description' => ts('Is this menu accessible to the public?'),
          'where' => 'civicrm_menu.is_public',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'is_exposed' => [
          'name' => 'is_exposed',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Exposed?'),
          'description' => ts('Is this menu exposed to the navigation system?'),
          'where' => 'civicrm_menu.is_exposed',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'is_ssl' => [
          'name' => 'is_ssl',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Use SSL?'),
          'description' => ts('Should this menu be exposed via SSL if enabled?'),
          'where' => 'civicrm_menu.is_ssl',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'weight' => [
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Order'),
          'description' => ts('Ordering of the menu items in various blocks.'),
          'required' => TRUE,
          'where' => 'civicrm_menu.weight',
          'default' => '1',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'type' => [
          'name' => 'type',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Type'),
          'description' => ts('Drupal menu type.'),
          'required' => TRUE,
          'where' => 'civicrm_menu.type',
          'default' => '1',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'page_type' => [
          'name' => 'page_type',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Page Type'),
          'description' => ts('CiviCRM menu type.'),
          'required' => TRUE,
          'where' => 'civicrm_menu.page_type',
          'default' => '1',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'skipBreadcrumb' => [
          'name' => 'skipBreadcrumb',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Hide Breadcrumb?'),
          'description' => ts('skip this url being exposed to breadcrumb'),
          'where' => 'civicrm_menu.skipBreadcrumb',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
          'localizable' => 0,
        ],
        'module_data' => [
          'name' => 'module_data',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Other menu data'),
          'description' => ts('All other menu metadata not stored in other fields'),
          'where' => 'civicrm_menu.module_data',
          'table_name' => 'civicrm_menu',
          'entity' => 'Menu',
          'bao' => 'CRM_Core_DAO_Menu',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'menu', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'menu', $prefix, []);
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
      'UI_path_domain_id' => [
        'name' => 'UI_path_domain_id',
        'field' => [
          0 => 'path',
          1 => 'domain_id',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_menu::1::path::domain_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

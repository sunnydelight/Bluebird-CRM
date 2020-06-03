<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Contribute/Widget.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:5623f4ecd23646d12dd4278675006d7a)
 */

/**
 * Database access object for the Widget entity.
 */
class CRM_Contribute_DAO_Widget extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_contribution_widget';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Contribution Id
   *
   * @var int
   */
  public $id;

  /**
   * The Contribution Page which triggered this contribution
   *
   * @var int
   */
  public $contribution_page_id;

  /**
   * Is this property active?
   *
   * @var bool
   */
  public $is_active;

  /**
   * Widget title.
   *
   * @var string
   */
  public $title;

  /**
   * URL to Widget logo
   *
   * @var string
   */
  public $url_logo;

  /**
   * Button title.
   *
   * @var string
   */
  public $button_title;

  /**
   * About description.
   *
   * @var text
   */
  public $about;

  /**
   * URL to Homepage.
   *
   * @var string
   */
  public $url_homepage;

  /**
   * @var string
   */
  public $color_title;

  /**
   * @var string
   */
  public $color_button;

  /**
   * @var string
   */
  public $color_bar;

  /**
   * @var string
   */
  public $color_main_text;

  /**
   * @var string
   */
  public $color_main;

  /**
   * @var string
   */
  public $color_main_bg;

  /**
   * @var string
   */
  public $color_bg;

  /**
   * @var string
   */
  public $color_about_link;

  /**
   * @var string
   */
  public $color_homepage_link;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_contribution_widget';
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contribution_page_id', 'civicrm_contribution_page', 'id');
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
          'title' => ts('Widget ID'),
          'description' => ts('Contribution Id'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_widget.id',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'contribution_page_id' => [
          'name' => 'contribution_page_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contribution Page'),
          'description' => ts('The Contribution Page which triggered this contribution'),
          'where' => 'civicrm_contribution_widget.contribution_page_id',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contribute_DAO_ContributionPage',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Enabled?'),
          'description' => ts('Is this property active?'),
          'where' => 'civicrm_contribution_widget.is_active',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Widget Title'),
          'description' => ts('Widget title.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_widget.title',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'url_logo' => [
          'name' => 'url_logo',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Widget Image Url'),
          'description' => ts('URL to Widget logo'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_widget.url_logo',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'button_title' => [
          'name' => 'button_title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Button Title'),
          'description' => ts('Button title.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_widget.button_title',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'about' => [
          'name' => 'about',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Description'),
          'description' => ts('About description.'),
          'where' => 'civicrm_contribution_widget.about',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'url_homepage' => [
          'name' => 'url_homepage',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Homepage Url'),
          'description' => ts('URL to Homepage.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_widget.url_homepage',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_title' => [
          'name' => 'color_title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Title Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_title',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_button' => [
          'name' => 'color_button',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Button Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_button',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_bar' => [
          'name' => 'color_bar',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Bar Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_bar',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_main_text' => [
          'name' => 'color_main_text',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Main Text Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_main_text',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_main' => [
          'name' => 'color_main',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Main Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_main',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_main_bg' => [
          'name' => 'color_main_bg',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Background Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_main_bg',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_bg' => [
          'name' => 'color_bg',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Other Background Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_bg',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_about_link' => [
          'name' => 'color_about_link',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('About Link Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_about_link',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
          'localizable' => 0,
        ],
        'color_homepage_link' => [
          'name' => 'color_homepage_link',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Homepage Link Color'),
          'maxlength' => 10,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_contribution_widget.color_homepage_link',
          'table_name' => 'civicrm_contribution_widget',
          'entity' => 'Widget',
          'bao' => 'CRM_Contribute_BAO_Widget',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'contribution_widget', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'contribution_widget', $prefix, []);
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
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

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
 * Generated from xml/schema/CRM/Contact/Group.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Contact_DAO_Group extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_group';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Group ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Internal name of Group.
   *
   * @var string
   */
  public $name;
  /**
   * Name of Group.
   *
   * @var string
   */
  public $title;
  /**
   * Optional verbose description of the group.
   *
   * @var text
   */
  public $description;
  /**
   * Module or process which created this group.
   *
   * @var string
   */
  public $source;
  /**
   * FK to saved search table.
   *
   * @var int unsigned
   */
  public $saved_search_id;
  /**
   * Is this entry active?
   *
   * @var boolean
   */
  public $is_active;
  /**
   * In what context(s) is this field visible.
   *
   * @var string
   */
  public $visibility;
  /**
   * the sql where clause if a saved search acl
   *
   * @var text
   */
  public $where_clause;
  /**
   * the tables to be included in a select data
   *
   * @var text
   */
  public $select_tables;
  /**
   * the tables to be included in the count statement
   *
   * @var text
   */
  public $where_tables;
  /**
   * FK to group type
   *
   * @var string
   */
  public $group_type;
  /**
   * Date when we created the cache for a smart group
   *
   * @var datetime
   */
  public $cache_date;
  /**
   * Date and time when we need to refresh the cache next.
   *
   * @var datetime
   */
  public $refresh_date;
  /**
   * IDs of the parent(s)
   *
   * @var text
   */
  public $parents;
  /**
   * IDs of the child(ren)
   *
   * @var text
   */
  public $children;
  /**
   * Is this group hidden?
   *
   * @var boolean
   */
  public $is_hidden;
  /**
   *
   * @var boolean
   */
  public $is_reserved;
  /**
   * FK to contact table.
   *
   * @var int unsigned
   */
  public $created_id;
  /**
   * FK to contact table.
   *
   * @var int unsigned
   */
  public $modified_id;
  /**
   * class constructor
   *
   * @return civicrm_group
   */
  function __construct()
  {
    $this->__table = 'civicrm_group';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'saved_search_id', 'civicrm_saved_search', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'created_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'modified_id', 'civicrm_contact', 'id');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group ID') ,
          'description' => 'Group ID',
          'required' => true,
        ) ,
        'name' => array(
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Name') ,
          'description' => 'Internal name of Group.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'title' => array(
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Title') ,
          'description' => 'Name of Group.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'description' => array(
          'name' => 'description',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Description') ,
          'description' => 'Optional verbose description of the group.',
          'rows' => 2,
          'cols' => 60,
          'html' => array(
            'type' => 'TextArea',
          ) ,
        ) ,
        'source' => array(
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Source') ,
          'description' => 'Module or process which created this group.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'saved_search_id' => array(
          'name' => 'saved_search_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Saved Search ID') ,
          'description' => 'FK to saved search table.',
          'FKClassName' => 'CRM_Contact_DAO_SavedSearch',
        ) ,
        'is_active' => array(
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Group Enabled') ,
          'description' => 'Is this entry active?',
        ) ,
        'visibility' => array(
          'name' => 'visibility',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Visibility Setting') ,
          'description' => 'In what context(s) is this field visible.',
          'maxlength' => 24,
          'size' => CRM_Utils_Type::MEDIUM,
          'default' => 'User and User Admin Only',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'callback' => 'CRM_Core_SelectValues::groupVisibility',
          )
        ) ,
        'where_clause' => array(
          'name' => 'where_clause',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Where Clause') ,
          'description' => 'the sql where clause if a saved search acl',
        ) ,
        'select_tables' => array(
          'name' => 'select_tables',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Tables For Select Clause') ,
          'description' => 'the tables to be included in a select data',
        ) ,
        'where_tables' => array(
          'name' => 'where_tables',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Tables For Where Clause') ,
          'description' => 'the tables to be included in the count statement',
        ) ,
        'group_type' => array(
          'name' => 'group_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Type') ,
          'description' => 'FK to group type',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'cache_date' => array(
          'name' => 'cache_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Group Cache Date') ,
          'description' => 'Date when we created the cache for a smart group',
        ) ,
        'refresh_date' => array(
          'name' => 'refresh_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Next Group Refresh Time') ,
          'description' => 'Date and time when we need to refresh the cache next.',
        ) ,
        'parents' => array(
          'name' => 'parents',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Parents') ,
          'description' => 'IDs of the parent(s)',
        ) ,
        'children' => array(
          'name' => 'children',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Children') ,
          'description' => 'IDs of the child(ren)',
        ) ,
        'is_hidden' => array(
          'name' => 'is_hidden',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Group is Hidden') ,
          'description' => 'Is this group hidden?',
        ) ,
        'is_reserved' => array(
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Group is Reserved') ,
        ) ,
        'created_id' => array(
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group Created By') ,
          'description' => 'FK to contact table.',
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'modified_id' => array(
          'name' => 'modified_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group Modified By') ,
          'description' => 'FK to contact table.',
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'id',
        'name' => 'name',
        'title' => 'title',
        'description' => 'description',
        'source' => 'source',
        'saved_search_id' => 'saved_search_id',
        'is_active' => 'is_active',
        'visibility' => 'visibility',
        'where_clause' => 'where_clause',
        'select_tables' => 'select_tables',
        'where_tables' => 'where_tables',
        'group_type' => 'group_type',
        'cache_date' => 'cache_date',
        'refresh_date' => 'refresh_date',
        'parents' => 'parents',
        'children' => 'children',
        'is_hidden' => 'is_hidden',
        'is_reserved' => 'is_reserved',
        'created_id' => 'created_id',
        'modified_id' => 'modified_id',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName()
  {
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['group'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['group'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
